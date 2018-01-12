<?php 
// ligação à base de dados
require_once 'classes/categorias.class.php';
$catmenu = new categorias();
?>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><?php echo $GLOBALS['nomeloja']; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu">
 
   
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">HOME</a></li>
            <li><a href="pagina.php?pag=acerca">ACERCA</a></li>  
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUTOS <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php 
                    $categoria = $catmenu->listaCategorias();
                    foreach ($categoria as $categoriamenu){
                        // se existe via querystring a var "cat" e se a var "cat é igual à categoria que vem da bd.
                        if (isset($_GET['cat']) && $_GET['cat']==$categoriamenu['id_categoria']) {
                            $nomecategoria =  $categoriamenu['nomecategoria'];
                        }
                ?>
                <li><a href="catprod.php?cat=<?php echo $categoriamenu['id_categoria'];?>"><?php echo $categoriamenu['nomecategoria'];?></a></li>
                <?php 
                    }
                ?>
              </ul>
            </li>
            <li><a href="pagina.php?pag=contactos">CONTACTOS</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li> 
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- pesquisa -->
    <div class="container" style="background:grey;margin-top:-22px;margin-bottom:10px;height:45px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
        <div class="col-xs-12 col-md-4">
                <form method="post" action="procurar.php">
                <div class="input-group" style="margin:6px;">
                  <input type="text" class="form-control" placeholder="Procurar por..." name="procura">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Ir</button>
                  </span>
                </div><!-- /input-group -->
                </form>    
    
        </div>
    </div>
    <!-- .pesquisa -->