<?php 
    // testar se o formulário foi submetido
    // $_GET -> SUPER GLOBAL QUERYSTRING
    // $_POST -> SUPER GLOBAL VIA FORMULÁRIO->SERVIDOR
    // $_REQUEST -> SUPER GLOBAL QUE PROCURA SE USA GET OU POST
    $erro = 0;
    // importar class erros
    require_once 'classes/erros.class.php';
    $mensagem = new erros();
    // se vem erro por aceder a páginas sem estar login
    if (isset($_GET['erro'])) { $erro = $_GET['erro']; }
    
    if (isset($_REQUEST['utilizador'])){
        // tem dados
        $u = $_REQUEST['utilizador'];
        $p = $_REQUEST['palavrapasse'];
        // ligação à class utilizadores
        require_once 'classes/utilizadores.class.php';
        $users = new utilizadores();
        
        if (!$users->login($u,$p,'backoffice.php')){
            // erro
            $erro = 1;
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-pt">
<!-- head -->
<?php require_once 'includes/head.inc.php'; ?>
<!-- .head -->
  <body>
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h1>BACKOFFICE <?php echo $GLOBALS['nomeloja']; ?> <small><?php echo $GLOBALS['versao']; ?></small></h1>
            </div>  
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <form action="admin.php" method="post">
                  <div class="form-group">
                    <label for="utilizador">Utilizador</label>
                    <input type="text" class="form-control" id="utilizador" name="utilizador">
                  </div>
                  <div class="form-group">
                    <label for="palavrapasse">Palavra Passe</label>
                    <input type="password" class="form-control" id="palavrapasse" name="palavrapasse">
                  </div>
                  <button type="submit" class="btn btn-default">Entrar</button>
                </form>
                <br>
                <?php 
                if ($erro==1){
                    echo $mensagem->alertas('alert-danger','LOGIN ERRADO','Utilizador ou Palavra Passe errados... contacte o Administrador.');
                } 
                if ($erro==2){
                    echo $mensagem->alertas('alert-warning','VIOLAÇÃO SEGURANÇA','Acesso não autorizado, faça login novamente...');
                } 
                ?>
            </div> 
        </div>
    </div>  
    <!-- scripts -->
    <?php require_once 'includes/scripts.inc.php'; ?>  
    <!-- .scripts -->
  </body>
</html>