<?php 
// ligação à classe utilizador
require_once 'classes/utilizadores.class.php';
$users = new utilizadores();
// invocar o método segurança
$users->backdoor();

// preenche formulário
$olduser = $users->dadosUtilizador($_SESSION['id']);


// testa se o formulário foi submetido
if (isset($_POST['nome'])){
    try{
        // retirar os dados do formulário
        
        $n = $_POST['nome'];
        $p = $_POST['passe'];
        $e = $_POST['email'];
        // editar perfil
        $users->editaPerfil($n,$p,$e,'backoffice.php');    
    }
    catch (PDOException $e) {
        echo("Erro: " . $e);
        exit();    
    }
}

// ligação à classe categorias
require_once 'classes/categorias.class.php';
$c = new categorias();

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
              <h1><?php echo $_SESSION['nomeutilizador']; ?> | <small>PERFIL </small></h1>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <form action="perfil.php" method="post" onsubmit="return validaPerfil();" >
                  
                  <div class="form-group">
                    <label for="nome">Nome do Utilizador</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $olduser[0]['nome'];?>">
                  </div>
                    
                  <div class="form-group">
                    <label for="passe">Palavra Passe Utilizador</label>
                    <input type="password" class="form-control" id="passe" name="passe" value="">
                  </div>
                    
                  <div class="form-group">
                    <label for="passe2">Repita a Palavra Passe </label>
                    <input type="password" class="form-control" id="passe2" name="passe2" value="">
                  </div>    
                  
                  <div class="form-group">
                    <label for="passe">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $olduser[0]['email'];?>">
                  </div>    
                    
                  <hr>
                  <button type="submit" class="btn btn-success">EDITAR</button>
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