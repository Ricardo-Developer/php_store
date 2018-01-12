<?php
// ligação à classe utilizador
require_once 'classes/utilizadores.class.php';
$users = new utilizadores();
// invocar o método segurança
$users->backdoor();


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
            <div class="jumbotron">
                <h1>BACKOFFICE <?php echo $GLOBALS['nomeloja']; ?> <small><?php echo $GLOBALS['versao']; ?></small></h1>
            </div>  
        </div>
        

    </div>  
    <!-- scripts -->
    <?php require_once 'includes/scripts.inc.php'; ?>  
    <!-- .scripts -->
  </body>
</html>