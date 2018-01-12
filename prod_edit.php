<?php 
// ligação à classe utilizador
require_once 'classes/utilizadores.class.php';
$users = new utilizadores();
// invocar o método segurança
$users->backdoor();

// preenche formulário
// class produtos
require_once 'classes/produtos.class.php';
$prod = new produtos();
if (isset($_GET['id'])){
    $dados = $prod->mostraProduto($_GET['id']);
}

// testa se o formulário foi submetido
if (isset($_POST['nomeprod'])){
    try{
        // retirar os dados do formulário
        $id = $_POST['id_produto'];
        $idc = $_POST['id_categoria'];
        $n = $_POST['nomeprod'];
        $d = $_POST['descricao'];
        $p = $_POST['preco'];
        $i = 'imagem';
        // tratar das checkbox
        if (isset($_POST['destaque'])){ 
            $des = true; 
        }else{
            $des = false;
        }
        if (isset($_POST['visivel'])){ 
            $v = true; 
        }else{
            $v = false;
        }
        // class produtos
        require_once 'classes/produtos.class.php';
        $prod = new produtos();
        // editar produto
        $prod->editarProduto($id,$idc,$n,$d,$p,$i,$des,$v,'prod_gestao.php');    
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
              <h1>PRODUTOS | <small>GESTÃO / EDITAR</small></h1>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <form action="prod_edit.php" method="post" onsubmit="return validaProdutoEdit();" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="id_categoria">Categoria do Produto</label>
                    <select id="id_categoria" name="id_categoria" class="form-control">
                        <option value="0">:: escolha uma categoria</option>
                        <?php 
                            $categorias = $c->listaCategorias();
                            foreach ($categorias as $cat ){
                        ?>
                        <option value="<?php echo $cat['id_categoria']; ?>" <?php 
                        if ($cat['id_categoria']==$dados[0]['id_categoria']) {echo 'selected';}
                        ?>><?php echo $cat['nomecategoria']; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nomeprod">Nome do Produto</label>
                    <input type="text" class="form-control" id="nomeprod" name="nomeprod" value="<?php echo $dados[0]['nomeprod']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="descricao">Descrição</label><br>
                    <textarea id="descricao" name="descricao" row="10" cols="60"><?php echo $dados[0]['descricao']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <span>Imagem Atual :</span>
                    <img src="<?php echo $dados[0]['imagem']; ?>" class="fototabela"><br>
                    <label for="imagem">Alterar Nova Fotografia</label>
                    <input type="file" id="imagem" name="imagem">
                    <p class="help-block">Escolha uma nova simagem para o produto.</p>
                  </div>
                  <div class="form-group">
                    <label for="preco">Preço do Produto</label>
                    <input type="number" class="form-control" id="preco" name="preco" value="<?php echo $dados[0]['preco']; ?>" min="0" placeholder="Preço em €">
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="destaque" name="destaque" <?php 
                      if ($dados[0]['destaque'] == 1) { echo 'checked'; }         
                     ?>> Produto Destaque<br>
                      <input type="checkbox" id="visivel" name="visivel" <?php 
                      if ($dados[0]['visivel'] == 1) { echo 'checked'; }         
                     ?>> Ativo    
                    </label>
                  </div>
                  <hr>
                  <input type="hidden" name="id_produto" value="<?php echo $dados[0]['id_produto']; ?>">
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