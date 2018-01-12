<?php 
// ligação à classe utilizador
require_once 'classes/utilizadores.class.php';
// ligação à classe produtos
require_once 'classes/produtos.class.php';
$users = new utilizadores();
$prod = new produtos();
// invocar o método segurança
$users->backdoor();

// apagar
if(isset($_GET['id'])){
    $prod->apagaProd($_GET['id'],'prod_gestao.php');
}

?>