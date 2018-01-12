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
    echo $mensagem->alertas('alert-success','PÁGINA INSERIDO','Página inserido na base de dados.');
}

// testa se o formulário foi submetido
if (isset($_POST['codigo_pagina'])){
    try{
        // retirar os dados do formulário
        $cp = $_POST['codigo_pagina'];
        $c = $_POST['conteudo'];
        // class paginas
        require_once 'classes/paginas.class.php';
        $paginas = new paginas();
        // inserir página
        $paginas->inserirPagina($cp,$c,'pag_inserir.php?ok=true');
        
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
              <h1>PÁGINAS | <small>INSERIR</small></h1>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <form action="pag_inserir.php" method="post" onsubmit="return validaPagina();" enctype="multipart/form-data">
                 
                  <div class="form-group">
                    <label for="codigo_pagina">Código da Página</label>
                    <input type="text" class="form-control" id="codigo_pagina" name="codigo_pagina">
                  </div>
                  <div class="form-group">
                    <label for="conteudo">Conteúdo</label><br>
                    <textarea id="conteudo" name="conteudo" row="10" cols="60"></textarea>
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
        //activar o ckeditor
        CKEDITOR.replace('conteudo');
        
    </script>  
    <!-- .scripts -->
  </body>
</html>