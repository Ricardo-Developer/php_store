<?php 
// ligação à classe utilizador
require_once 'classes/utilizadores.class.php';
// ligação à classe produtos
require_once 'classes/paginas.class.php';
$users = new utilizadores();
$paginas = new paginas();
// invocar o método segurança
$users->backdoor();

// apagar
if(isset($_GET['id'])){
    $paginas->apagaPag($_GET['id'],'pag_gestao.php');
}

?>