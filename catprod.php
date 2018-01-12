<?php
// detecta querystring
if(isset($_GET['cat']) && $_GET['cat']!=''){
    $idc = $_GET['cat'];
    // ligação à class
    require_once 'classes/produtos.class.php';
    $prod = new produtos();
}
 // ligação à class
    require_once 'classes/erros.class.php';
    $erros = new erros();
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

        
        <!-- categoria especifica -->
        <div class="row">
            <div class="page-header">
              <h1><?php echo mb_strtoupper($nomecategoria,'UTF-8');?></h1>
            </div>
 
            <?php 
            // apresentar os meus dados
            $prodc = $prod->mostraPorCategoria($idc)[0];
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
                } ?> 
            <!-- paginação -->
            <?php 
            // número de páginas
            $total_paginas = $prod->mostraPorCategoria($idc)[1];
            // pagina
            $pagina = $prod->mostraPorCategoria($idc)[2];
            // detecta página seguintes e anteriores
            $seguinte = 1;
            $anterior = 1;
            // pagina anterior
            if (isset($_GET['pagina']) && $_GET['pagina']>1){$anterior = $_GET['pagina'] - 1;}
            // pagina seguinte
            if (isset($_GET['pagina']) && $_GET['pagina']!=$total_paginas){$seguinte = $_GET['pagina'] + 1;}
            if (isset($_GET['pagina']) && $_GET['pagina']==$total_paginas){$seguinte = $_GET['pagina'];}    
            ?>
            <div class="col-xs-12">
            <hr>
            <nav aria-label="Page navigation" >
              <ul class="pagination pull right">
                <li>
                  <a href="catprod.php?cat=<?php echo $_GET['cat'];?>&pagina=<?php echo $anterior;?>" aria-label="Anterior">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <?php for ($pagina=1; $pagina <= $total_paginas ; $pagina++):?>
                <li><a href="catprod.php?cat=<?php echo $_GET['cat'];?>&pagina=<?php echo $pagina;?>" class="<?php if ($_GET['pagina'] == $pagina){ echo 'pagselect'; }?>"><?php echo $pagina; ?></a></li>
                <?php endfor ?>
                <li>
                  <a href="catprod.php?cat=<?php echo $_GET['cat'];?>&pagina=<?php echo $seguinte;?>" aria-label="Seguinte">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
            </div>    
            <!-- .paginação -->
            <?php
            }else{
                // apresenta mensagem que não existem produtos
                echo $erros->alertas("alert-warning","Não existem <b>PRODUTOS</b> para a <b>CATEGORIA</b> escolhida !","Neste Momento não existem produtos na nossa loja, tente mais tarde... ");  
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