<?php
// ligação à class
require_once 'classes/produtos.class.php';
$prod = new produtos();

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
        <div class="row">
            <div class="jumbotron">
                <h1><?php echo $GLOBALS['nomeloja']; ?> <small><?php echo $GLOBALS['versao']; ?></small></h1>
                <small><?php echo $GLOBALS['slogan']; ?></small>
            </div>  
        </div> 
        
        <!-- destaques -->
        <div class="row">
            <div class="page-header">
              <h1>DESTAQUES <small>...pelo toni</small></h1>
            </div>
            <?php 
            // apresentar os meus dados
            $destaque = $prod->mostraDestaques();
            foreach ($destaque as $destaques) {
            ?>
            <!-- grelha de produto-->
            <div class="col-xs-12 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5><?php echo $destaques['nomeprod'];?> <span class="label label-danger"><?php echo mb_strtoupper($destaques['nomecategoria'],'UTF8');?></span></h5>
                    </div>
                    <div class="panel-body">
                        <a href="#" data-toggle="modal" data-target="#produto<?php echo $destaques['id_produto'];?>"><img src="<?php echo $destaques['imagem'];?>" class="img-responsive"></a>
                        
                    </div>
                    <div class="panel-footer">
                        <h4><span class="label label-success">&euro; <?php echo $destaques['preco'];?></span></h4> 
                    </div>
                </div>    
            </div>
            <!-- modal do produto-->
            <!-- Modal -->
            <div class="modal fade" id="produto<?php echo $destaques['id_produto'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><span class="label label-danger"><?php echo mb_strtoupper($destaques['nomecategoria'],'UTF8');?></span> <?php echo $destaques['nomeprod'];?></h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-8">
                            <img src="<?php echo $destaques['imagem'];?>" class="img-responsive">
                            <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <?php echo $destaques['descricao'];?>
                            <!-- preço -->
                            <h3>Preço (c/iva): <span class="label label-success">&euro; <?php echo $destaques['preco'];?></span></h3>
                            
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
            // fim do while
                }
            ?>
        </div>
        <!-- .destaques -->
        
        <!-- novidades -->
        <div class="row">
            <div class="page-header">
              <h1>NOVIDADES <small>...frescas pelo toni</small></h1>
            </div>
            <?php 
            // apresentar os meus dados
            $novidade = $prod->mostraNovidades();
            foreach ($novidade as $novidades) {
            ?>
            <!-- grelha de produto-->
            <div class="col-xs-12 col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h5><?php echo $novidades['nomeprod']; ?> <span class="label label-danger"><?php echo mb_strtoupper($novidades['nomecategoria'],'UTF8'); ?></span></h5>
                    </div>
                    <div class="panel-body">
                        <a href="#" data-toggle="modal" data-target="#prodnov<?php echo $novidades['id_produto']; ?>"><img src="<?php echo $novidades['imagem']; ?>" class="img-responsive"></a> 
                    </div>
                    <div class="panel-footer">
                        <h4><span class="label label-success">&euro; <?php echo $novidades['preco']; ?></span></h4>
                         
                    </div>
                </div>    
            </div>
            <!-- modal do produto-->
            <!-- Modal -->
            <div class="modal fade" id="prodnov<?php echo $novidades['id_produto']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><span class="label label-danger"><?php echo mb_strtoupper($novidades['nomecategoria'],'UTF8'); ?></span> <?php echo $novidades['nomeprod']; ?></h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-8">
                            <img src="<?php echo $novidades['imagem']; ?>" class="img-responsive">
                            <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <?php echo $novidades['descricao']; ?>
                            <!-- preço -->
                            <h3>Preço (c/iva): <span class="label label-success">&euro; <?php echo $novidades['preco']; ?></span></h3>
                            
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
            ?>
        </div>
        <!-- .novidades -->
        
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