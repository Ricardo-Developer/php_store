<?php
// PHP MAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendors/PHPMailer/src/Exception.php';
require 'vendors/PHPMailer/src/PHPMailer.php';
require 'vendors/PHPMailer/src/SMTP.php';

// ligação à class
require_once 'classes/erros.class.php';
$erros = new erros();


// se submeteu o formulário
if (isset($_POST['form_email'])){
    try {
        // cria um array de campos para facilitar o texto do email
        $campos = array('form_pnome' => 'Nome', 'form_unome' => 'Último Nome', 'form_telefone' => 'Telefone', 'form_email' => 'Email', 'form_mensagem' => 'Mensagem Website'); 
        // pequeno testa para contar os campos que vem do $_POST se vier a 0/vazio envia um erro para o try/catch
        if(count($_POST) == 0) throw new \Exception('Formulário está vazio...');
        // cabeçalho do Email em HTML
        $emailTexto = "Email enviado da LOJA TONI<hr>";
        // ciclo para colocar na string do corpo os campos de forma dinâmica
        foreach ($_POST as $key => $valor) {
            if (isset($campos[$key])) {
                $emailTexto .= "<b>$campos[$key]:</b> $valor\n<br>";
            }
        }
    // instancia da classe PHPmailer
    $mail = new PHPMailer(true);                                // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                   // Enable verbose debug output
        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->Host = 'mail.pirexya.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $mail->Username = 'cesae@pirexya.com';                  // SMTP username
        $mail->Password = '4*TTH55HHlo[';                       // SMTP password
        
        $mail->SMTPSecure = false;
        //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25;                                       // TCP port to connect to
        $mail->CharSet = 'UTF-8';                               // Suporte de UTF8
        //Recipients
        $mail->setFrom('cesae@pirexya.com', 'Toni');
        $mail->addAddress($_POST['form_email'], $_POST['form_unome']);      // Add a recipient
        //$mail->addAddress('ellen@example.com');                           // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = 'Loja do toni';
        $mail->Body    = $emailTexto;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // apresenta mensagem de envio de email
        echo $erros->alertas("alert-success","EMAIL ENVIADO","Email foi enviado com sucesso, obrigado. "); 
        } catch (Exception $e) {
            echo $erros->alertas("alert-danger","EMAIL NÃO FOI ENVIADO","Motivo : $mail->ErrorInfo "); 
        }
    }
    catch (\Exception $e)
    {
        echo("Erro formulário:" . $e);
    }

}

?>
<!DOCTYPE html>
<html lang="pt-pt">
<!-- head -->
<?php require_once 'includes/head.inc.php'; ?>
<!-- .head -->
  <body>
    <!-- menu principal -->
    <?php require_once 'includes/menu.inc.php'; ?>
    <!-- .menu principal -->
      
    <!-- loja -->
    <div class="container">
       <div class="row">
            <div class="jumbotron">
                <h1><?php echo $GLOBALS['nomeloja']; ?> <small><?php echo $GLOBALS['versao']; ?></small></h1>
                <small>ENTRE EM CONTACTO COM O TONI</small>
            </div>  
        </div> 
        <form id="feedback" method="post" action="feedback.php">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_pnome">Primeiro Nome *</label>
                    <input id="form_pnome" type="text" name="form_pnome" class="form-control" placeholder="Por favor introduza o primeiro nome *" required="required" >
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_unome">Último Nome *</label>
                    <input id="form_unome" type="text" name="form_unome" class="form-control" placeholder="Por favor introduza o segundo nome *" required="required" >
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email *</label>
                    <input id="form_email" type="email" name="form_email" class="form-control" placeholder="Por favor introduza o seu email *" required="required" >
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_phone">Telefone</label>
                    <input id="form_telefone" type="tel" name="form_telefone" class="form-control" placeholder="Por favor introduza o telefone">
                
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_mensagem">Mensagem *</label>
                    <textarea id="form_mensagem" name="form_mensagem" class="form-control" placeholder="Mensagem *" rows="4" required="required" ></textarea>
                    
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Enviar Mensagem">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted"><strong>*</strong> Campos Necessários.</p>
            </div>
        </div>
    </div>

</form>
        <!-- rodapé -->
        <?php require_once 'includes/rodape.inc.php'; ?>
        <!-- .rodapé -->
    </div>  
    <!-- .loja -->

    <!-- scripts -->
    <?php require_once 'includes/scripts.inc.php'; ?>  
    <!-- .scripts -->
  </body>
</html>