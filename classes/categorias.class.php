<?php
// class responsável pelas categorias

class categorias{
   
    // construtor da class
    public function __construct (){
        
    }
    // métodos
    
    // método para retornar a lista de categorias
    public function listaCategorias(){
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        // pergunta da lista de categorias
        $sql = '
        SELECT id_categoria, nomecategoria
        FROM CATEGORIAS
        WHERE CATEGORIAS.visivel = true
        ORDER BY nomecategoria
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // executa a minha querie
        $s->execute();
        // retornar os dados
        return $s->fetchAll();
    }
    
}

?>