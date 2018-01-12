<?php
// class responsável pelo acesso à base de dados

class paginas{
    
   
    // construtor da class
    public function __construct (){
        // ficheiro de configuração
        require_once 'includes/app.inc.php';
        
    }
    
    // métodos
    
    
    
    // Método para Inserir Páginas
    function inserirPagina($codigo,$conteudo,$destino){
        // ligação à class database
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta à bd
        $sql = '
        INSERT INTO PAGINAS (codigo_pagina,conteudo) VALUES
        (:cp,:c)
        ';
        // prepara a ligação ao MySQL Server
        $insere = $pdo->prepare($sql);
        // binds dos parâmetros às variáveis
        $insere->bindValue(':cp',$codigo);
        $insere->bindValue(':c',$conteudo);
        // executa a minha querie
        $insere->execute();
        // salta para a pagina
        header('Location:' . $destino);
    }
    
    // Método que mostra todos as páginas por codigo
    function mostraPagina($codigo){
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        $sql = '
        SELECT codigo_pagina, conteudo
        FROM PAGINAS
        WHERE codigo_pagina = :c
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        $s->bindValue(':c',$codigo);
        // executa a minha querie
        $s->execute();
        // retornar os dados
        return $s->fetchAll();
    }
    
    // Método que mostra todos as páginas por id
    function mostraPagID($codigo){
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        $sql = '
        SELECT codigo_pagina, conteudo, id_pagina
        FROM PAGINAS
        WHERE id_pagina = :c
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        $s->bindValue(':c',$codigo);
        // executa a minha querie
        $s->execute();
        // retornar os dados
        return $s->fetch();
    }    
    
    // Método que mostra todos as páginas
    function mostraTudo(){
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        $sql = '
        SELECT codigo_pagina, conteudo, id_pagina
        FROM PAGINAS
        ORDER BY codigo_pagina
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // executa a minha querie
        $s->execute();
        // retornar os dados
        return $s->fetchAll();
    }
   
    // Método que apaga produto via id
    function apagaPag($id,$destino){
        // ligação à class database
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        $sql = '
        DELETE
        FROM PAGINAS
        WHERE id_paginas = :id
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        $s->bindValue(':id',$id);
        // executa a minha querie
        $s->execute();
        // salto para a página
        header('Location:' . $destino);  
    }    
    
    // Método para Editar Página via id
    function editarPag($id,$cp,$c,$destino){
        // ligação à class database
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta à bd
        $sql = '
        UPDATE PAGINAS
        SET codigo_pagina = :cp, conteudo = :c
        WHERE id_pagina = :id
        ';
        // prepara a ligação ao MySQL Server
        $edita = $pdo->prepare($sql);
        // binds dos parâmetros às variáveis
        $edita->bindValue(':id',$id);
        $edita->bindValue(':cp',$cp);
        $edita->bindValue(':c',$c);
        // executa a minha querie
        $edita->execute();
        // salta para a pagina
        header('Location:' . $destino);
    }   
    
    
// fim de classe produtos    
}







?>