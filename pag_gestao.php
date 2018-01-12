<?php 
// ligação à classe utilizador
require_once 'classes/utilizadores.class.php';
$users = new utilizadores();
require_once 'classes/paginas.class.php';
$paginas = new paginas();

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
              <h1>PÁGINAS | <small>GESTÃO</small></h1>
            </div> 
        </div>
        
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-hover" id="tabela">
                    <thead>
                        <th>Código Página</th>
                        <th class="text-right">Opções</th>
                    </thead>
                    <tbody>
                        <?php 
                        $listas = $paginas->mostraTudo();
                        foreach ($listas as $lista) {
                        ?>
                        <tr>
                            <td><?php echo $lista['codigo_pagina'];?></td>
                            <td class="pull-right">
                                <a href="pag_edit.php?id=<?php echo $lista['id_pagina'];?>"><button type="button" class="btn btn-info btn-sm">EDITAR</button></a>&nbsp;<button type="button" class="btn btn-danger btn-sm" onmousedown="confirmaApagar(<?php echo $lista['id_pagina'];?>,'pag_del.php');">APAGAR</button>
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