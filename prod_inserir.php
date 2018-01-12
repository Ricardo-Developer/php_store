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
    echo $mensagem->alertas('alert-success','PRODUTO INSERIDO','Produto inserido na base de dados.');
}

// testa se o formulário foi submetido
if (isset($_POST['nomeprod'])){
    try{
        // retirar os dados do formulário
        $idc = $_POST['id_categoria'];
        $n = $_POST['nomeprod'];
        $d = $_POST['descricao'];
        $p = $_POST['preco'];
        //$i = $_POST['imagem'];
        // nome do campo para enviar para a função
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
        // inserir produto
        $prod->inserirProduto($idc,$n,$d,$p,$i,$des,$v,'prod_inserir.php?ok=true');
        
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
              <h1>PRODUTOS | <small>INSERIR</small></h1>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <form action="prod_inserir.php" method="post" onsubmit="return validaProduto();" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="id_categoria">Categoria do Produto</label>
                    <select id="id_categoria" name="id_categoria" class="form-control">
                        <option value="0">:: escolha uma categoria</option>
                        <?php 
                            $categorias = $c->listaCategorias();
                            foreach ($categorias as $cat ){
                        ?>
                        <option value="<?php echo $cat['id_categoria']; ?>"><?php echo $cat['nomecategoria']; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nomeprod">Nome do Produto</label>
                    <input type="text" class="form-control" id="nomeprod" name="nomeprod">
                  </div>
                  <div class="form-group">
                    <label for="descricao">Descrição</label><br>
                    <textarea id="descricao" name="descricao" row="10" cols="60"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="imagem">Fotografia</label>
                    <input type="file" id="imagem" name="imagem">
                    <p class="help-block">Escolha uma imagem para o produto.</p>
                  </div>
                  <div class="form-group">
                    <label for="preco">Preço do Produto</label>
                    <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço em €">
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="destaque" name="destaque"> Produto Destaque<br>
                      <input type="checkbox" id="visivel" name="visivel" checked> Ativo    
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