<?php 
// ligação à classe utilizador
require_once 'classes/utilizadores.class.php';
$users = new utilizadores();
// invocar o método segurança
$users->backdoor();

// testa mensagem de sucesso
if (isset($_GET['ok']) && $_GET['ok']) {
    // indicar mensagem de sucesso
    require_once 'classes/erros.class.php';
    $mensagem = new erros();
    echo $mensagem->alertas('alert-success','UTILIZADOR INSERIDO','Utilizador inserido na base de dados.');
}

// testa se o formulário foi submetido
if (isset($_POST['utilizador'])){
    try{
        
        // retirar os dados do formulário
        $u = $_POST['utilizador'];
        $n = $_POST['nome'];
        $p = $_POST['passe'];
        $e = $_POST['email'];    
        // tratar das checkbox
        if (isset($_POST['activo'])){ 
            $a = true; 
        }else{
            $a = false;
        }
        // inserir produto
        $users->inserirNovo($u,$n,$p,$e,$a,'users_inserir.php?ok=true');
        
    }
    catch (PDOException $e) {
        echo("Erro: " . $e);
        exit();    
    }
}



?>
<!DOCTYPE html>
<html lang="pt-pt">
<!-- head -->
<?php require_once 'includes/head.inc.php'; ?>
<!-- .head -->
  <body>
    <!-- menu principal do backoffice -->
    <?php require_once 'includes/menuadmin.inc.php'; ?>  
    <!-- .menu principal do backoffice -->
    <div class="container">
        <div class="row">
            <div class="page-header">
              <h1>UTILIZADORES | <small>INSERIR</small></h1>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <form action="users_inserir.php" method="post" onsubmit="return validaUser();" >
                  
                  <div class="form-group">
                    <label for="utilizador">Utilizador</label>
                    <input type="text" class="form-control" id="utilizador" name="utilizador">
                  </div>
                    
                  <div class="form-group">
                    <label for="passe">Palavra Passe</label>
                    <input type="password" class="form-control" id="passe" name="passe">
                  </div>
                    
                <div class="form-group">
                    <label for="nome">Nome Utilizador</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                  </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="activo" name="activo" checked> Utilizador activo<br>
                    </label>
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-success">INSERIR</button>
                  <button type="reset" class="btn btn-default">LIMPAR</button>
                  <hr>
                </form>            
            </div>    
        </div>
    </div>  
    <!-- scripts -->
    <?php require_once 'includes/scripts.inc.php'; ?>
    <script>
        //activar o chosen
        $("#id_categoria").chosen();
        //activar o ckeditor
        CKEDITOR.replace('descricao');
        
    </script>  
    <!-- .scripts -->
  </body>
</html>