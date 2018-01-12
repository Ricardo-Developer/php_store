<?php 
// ligação à classe utilizador
require_once 'classes/utilizadores.class.php';
$users = new utilizadores();

// invocar o método segurança
$users->backdoor();

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
              <h1>UTILIZADORES | <small>GESTÃO</small></h1>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover" id="tabela">
                    <thead>
                        <th>Username</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Activo</th>
                        <th>Inscrição</th>
                        <th>Opções</th>
                    </thead>
                    <tbody>
                        <?php 
                        $listas = $users->mostraTudo();
                        foreach ($listas as $lista) {
                        ?>
                        <tr>
                            <td><?php echo $lista['utilizador'];?></td>
                            <td><?php echo $lista['nome'];?></td>
                            <td><?php echo $lista['email'];?> €</td>
                            <td><input type="checkbox" <?php if ($lista['activo']==1){echo 'checked';}?> disabled></td>
                            <td><?php echo $lista['datainsc'];?></td>
                            <td>
                                <a href="users_edit.php?id=<?php echo $lista['id_utilizador'];?>"><button type="button" class="btn btn-info btn-sm">EDITAR</button></a>&nbsp;<button type="button" class="btn btn-danger btn-sm" onmousedown="confirmaApagar(<?php echo $lista['id_utilizador'];?>,'users_del.php');">APAGAR</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>                
            </div>    
        </div>
        
    </div>  
    <!-- scripts -->
    <?php require_once 'includes/scripts.inc.php'; ?> 
    <!-- .scripts -->
  </body>
</html>