<?php 
// ligação à classe utilizador
require_once 'classes/utilizadores.class.php';
// ligação à classe produtos
require_once 'classes/produtos.class.php';
$users = new utilizadores();
$prod = new produtos();
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
              <h1>PRODUTOS | <small>GESTÃO</small></h1>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover" id="tabela">
                    <thead>
                        <th></th>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Destaque</th>
                        <th>Visivel</th>
                        <th>Opções</th>
                    </thead>
                    <tbody>
                        <?php 
                        $listas = $prod->mostraTudo();
                        foreach ($listas as $lista) {
                        ?>
                        <tr>
                            <td><img src="<?php echo $lista['imagem'];?>" class="fototabela"></td>
                            <td><?php echo $lista['nomeprod'];?></td>
                            <td><?php echo $lista['nomecategoria'];?></td>
                            <td><?php echo $lista['preco'];?> €</td>
                            <td><input type="checkbox" <?php if ($lista['destaque']==1){echo 'checked';}?> disabled></td>
                            <td><input type="checkbox" <?php if ($lista['visivel']==1){echo 'checked';}?> disabled></td>
                            <td>
                                <a href="prod_edit.php?id=<?php echo $lista['id_produto'];?>"><button type="button" class="btn btn-info btn-sm">EDITAR</button></a>&nbsp;<button type="button" class="btn btn-danger btn-sm" onmousedown="confirmaApagar(<?php echo $lista['id_produto'];?>,'prod_del.php');">APAGAR</button>
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