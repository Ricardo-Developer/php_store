<?php
// ligação à class
require_once 'classes/paginas.class.php';
$paginas = new paginas();
// ligação à class
require_once 'classes/erros.class.php';
$erros = new erros();

if (isset($_GET['pag'])){
    $codigo_pagina = $_GET['pag'];
}else{
    $codigo_pagina = "";
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
        <!-- apresentação da página -->
        <?php 
        $conteudo = $paginas->mostraPagina($codigo_pagina);
        if ($conteudo==NULL){
            // erro 
            // apresenta mensagem que não existem produtos 
            echo $erros->alertas("alert-warning","Página <b>$codigo_pagina</b> não existe","Contacte por favor o administrador do website. ");  
        }else{
            // print página
             echo $conteudo[0]['conteudo'];   
        }
       
        ?>
        <!-- .apresentação da página -->
        
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