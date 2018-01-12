<?php 
// ligação à classe utilizador
require_once 'classes/utilizadores.class.php';
$users = new utilizadores();
// invocar o método segurança
$users->backdoor();

// apagar
if(isset($_GET['id'])){
    $users->apagaUser($_GET['id'],'users_gestao.php');
}

?>