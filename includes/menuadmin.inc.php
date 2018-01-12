   <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">BACKOFFICE <?php echo $GLOBALS['nomeloja']; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu">
 
   
          <ul class="nav navbar-nav navbar-right">
            <li><a href="backoffice.php">HOME</a></li>
            <li><a href="index.php">LOJA</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> PÁGINAS <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="pag_inserir.php">Inserir</a></li>
                <li><a href="pag_gestao.php">Gestão</a></li>
              </ul>
            </li>   
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> PRODUTOS <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="prod_inserir.php">Inserir</a></li>
                <li><a href="prod_gestao.php">Gestão</a></li>
              </ul>
            </li> 
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> UTILIZADORES <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="users_inserir.php">Inserir</a></li>
                <li><a href="users_gestao.php">Gestão</a></li>
              </ul>
            </li>  
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Olá <b><?php echo $_SESSION['nomeutilizador']; ?></b> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>