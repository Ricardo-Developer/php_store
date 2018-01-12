<?php
// ligação à class
require_once 'classes/produtos.class.php';
$prod = new produtos();
// ligação à class
require_once 'classes/erros.class.php';
$erros = new erros();
$chave = "";
if(isset($_REQUEST['procura'])){
    $chave = $_REQUEST['procura'];
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
        
        
        <!-- titulo -->
        <div class="row">
            <div class="page-header">
              <h1>Procura Website <small>chave : <i><?php echo $chave; ?></i></small></h1>
            </div>
            
        </div>
        <!-- .titulo -->
        
        <!-- zona pesquisa -->
        <div class="row">
        <?php 
            // apresentar os meus dados
            $prodc = $prod->pesquisaProduto($chave);
            // testa se existme produtos
            if ($prodc != NULL) {
            foreach ($prodc as $prodcat) {
            ?>
            <!-- grelha de produto-->
            <div class="col-xs-12 col-md-3">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h5><?php echo $prodcat['nomeprod']; ?> <span class="label label-danger"><?php echo strtoupper($prodcat['nomecategoria']); ?></span></h5>
                    </div>
                    <div class="panel-body">
                        <a href="#" data-toggle="modal" data-target="#prodnov<?php echo $prodcat['id_produto']; ?>"><img src="<?php echo $prodcat['imagem']; ?>" class="img-responsive"></a>   
                    </div>
                    <div class="panel-footer">
                        <h4><span class="label label-success">&euro; <?php echo $prodcat['preco']; ?></span></h4> 
                    </div>
                </div>    
            </div>
            <!-- modal do produto-->
            <!-- Modal -->
            <div class="modal fade" id="prodnov<?php echo $prodcat['id_produto']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><span class="label label-danger"><?php echo $prodcat['nomecategoria']; ?></span> <?php echo $prodcat['nomeprod']; ?></h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-8">
                            <img src="<?php echo $prodcat['imagem']; ?>" class="img-responsive">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <?php echo $prodcat['descricao']; ?>
                            <!-- preço -->
                            <h3>Preço (c/iva): <span class="label label-success">&euro; <?php echo $prodcat['preco']; ?></span></h3>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- .modal do produto -->
            <!-- .grelha de produto -->
         <?php 
                }
            }else{
                // apresenta mensagem que não existem produtos
                echo $erros->alertas("alert-warning","Não existem <b>PRODUTOS</b> para a pesquisa <b>$chave</b> escolhida !","Neste Momento não existem produtos com esse critério na nossa loja, tente mais tarde... ");  
            }
            ?> 
        </div>    
        <!-- .zone pesquisa -->
        
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