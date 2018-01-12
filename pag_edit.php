<?php 
// ligação à classe utilizador
require_once 'classes/utilizadores.class.php';
$users = new utilizadores();
// invocar o método segurança
$users->backdoor();

// preenche formulário
// class produtos
require_once 'classes/paginas.class.php';
$paginas = new paginas();
if (isset($_GET['id'])){
    $dados = $paginas->mostraPagID($_GET['id']);
}

// testa se o formulário foi submetido
if (isset($_POST['codigo_pagina'])){
    try{
        // retirar os dados do formulário
        $id = $_POST['id_pagina'];
        $cp = $_POST['codigo_pagina'];
        $c = $_POST['conteudo'];
      
       
        // class produtos
        require_once 'classes/paginas.class.php';
        $paginas = new paginas();
        // editar produto
        $paginas->editarPag($id,$cp,$c,'pag_gestao.php');    
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
              <h1>PÁGINAS | <small>GESTÃO / EDITAR</small></h1>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <form action="pag_edit.php" method="post" onsubmit="return validaPagina();" >
                  
                  <div class="form-group">
                    <label for="codigo_pagina">Código da Página</label>
                    <input type="text" class="form-control" id="codigo_pagina" name="codigo_pagina" value="<?php echo $dados['codigo_pagina']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="conteudo">Conteúdo</label><br>
                    <textarea id="conteudo" name="conteudo" row="10" cols="60"><?php echo $dados['conteudo']; ?></textarea>
                  </div>
                 
                  <hr>
                  <input type="hidden" name="id_pagina" value="<?php echo $dados['id_pagina']; ?>">
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

        //activar o ckeditor
        CKEDITOR.replace('conteudo');
    </script>  
    <!-- .scripts -->
  </body>
</html>