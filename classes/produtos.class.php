<?php
// class responsável pelo acesso à base de dados

class produtos{
    
    public $numNovidades; 
    // construtor da class
    public function __construct (){
        // ficheiro de configuração
        require_once 'includes/app.inc.php';
        $this->numNovidades =  $GLOBALS['nprodnovmontra'];
    }
    
    // métodos
    
    // Método que mostra produtos destaque
    function mostraDestaques(){
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        $sql = '
        SELECT PRODUTOS.id_produto, PRODUTOS.nomeprod, PRODUTOS.descricao, PRODUTOS.preco, PRODUTOS.imagem, CATEGORIAS.nomecategoria
        FROM PRODUTOS,CATEGORIAS
        WHERE PRODUTOS.id_categoria=CATEGORIAS.id_categoria AND PRODUTOS.destaque = true AND PRODUTOS.visivel = true';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // executa a minha querie
        $s->execute();
        // retornar os dados
        return $s->fetchAll();
    }
    
    // Método que mostra produtos novidades
    function mostraNovidades($n = NULL){
        // caso não venha com argumento $n vai à propriedade numNovidades
        if ($n==NULL){$n=$this->numNovidades;}
        // ligação à class database
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        $sql = '
        SELECT PRODUTOS.id_produto, PRODUTOS.nomeprod, PRODUTOS.descricao, PRODUTOS.preco, PRODUTOS.imagem, CATEGORIAS.nomecategoria 
        FROM PRODUTOS,CATEGORIAS
        WHERE PRODUTOS.id_categoria=CATEGORIAS.id_categoria AND PRODUTOS.visivel = true
        ORDER BY PRODUTOS.datains DESC 
        LIMIT :num ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // bind do parâmetro ao usar $GLOBALS Int -> PDO::PARAM_INT String -> PDO::PARAM_STR
        $s->bindValue(':num',$n,PDO::PARAM_INT);
        // executa a minha querie
        $s->execute();
        // retornar os dados
        return $s->fetchAll();
    }
    
    // Método que mostra produtos por categoria
    function mostraPorCategoria($cat){
        // ligação à class database
        require_once 'classes/database.class.php';
        $limite = $GLOBALS['maxprod'];
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        // detectar páginas e número de produtos
        $pdo = $db->getCon();
        $query = "SELECT PRODUTOS.id_produto, PRODUTOS.nomeprod, PRODUTOS.descricao, PRODUTOS.preco, PRODUTOS.imagem, CATEGORIAS.nomecategoria
        FROM PRODUTOS,CATEGORIAS
        WHERE PRODUTOS.id_categoria=CATEGORIAS.id_categoria AND PRODUTOS.visivel = true AND PRODUTOS.id_categoria = :c
        ORDER BY PRODUTOS.preco DESC";
        $s = $pdo->prepare($query);
        $s->bindValue(':c',$cat);
        $s->execute();
        // calcular numero de produtos total
        $total_produtos = $s->rowCount();
        // calcular o número de páginas
        // ceil - Arredonda número fracionarários para cima
        $total_paginas = ceil($total_produtos/$limite);
        // verificar o que vem da querystring
        if (!isset($_GET['pagina'])) {
            $pagina = 1;
        } else{
            $pagina = $_GET['pagina'];
        }
        // detectar o ponto inicial
        $limite_inicial = ($pagina-1)*$limite;

        
        // pergunta para produtos de destaque
        $sql = '
        SELECT PRODUTOS.id_produto, PRODUTOS.nomeprod, PRODUTOS.descricao, PRODUTOS.preco, PRODUTOS.imagem, CATEGORIAS.nomecategoria
        FROM PRODUTOS,CATEGORIAS
        WHERE PRODUTOS.id_categoria=CATEGORIAS.id_categoria AND PRODUTOS.visivel = true AND PRODUTOS.id_categoria = :c
        ORDER BY PRODUTOS.preco DESC LIMIT :li,:l';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // bind do parâmetro ao usar $GLOBALS Int -> PDO::PARAM_INT String -> PDO::PARAM_STR
        $s->bindValue(':c',$cat);
        $s->bindValue(':li',$limite_inicial,PDO::PARAM_INT);
        $s->bindValue(':l',$limite,PDO::PARAM_INT);
        // executa a minha querie
        $s->execute();
        // retornar os dados, mas com array para ir as páginas
        return array($s->fetchAll(),$total_paginas,$pagina);
    } 
    
    // Método para Inserir Produtos
    function inserirProduto($idc,$n,$d,$p,$i,$des,$v,$destino){
        // ligação à class database
        require_once 'classes/database.class.php';
        require_once 'classes/upload.class.php';
        // instancio a class
        $db = new database();
        $upload = new upload();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta à bd
        $sql = '
        INSERT INTO PRODUTOS (id_categoria,nomeprod,descricao,preco,imagem,destaque,visivel) VALUES
        (:idc,:n,:d,:p,:i,:des,:v)
        ';
        // prepara a ligação ao MySQL Server
        $insere = $pdo->prepare($sql);
        // binds dos parâmetros às variáveis
        $insere->bindValue(':idc',$idc);
        $insere->bindValue(':n',$n);
        $insere->bindValue(':d',$d);
        $insere->bindValue(':p',$p);
        $insere->bindValue(':des',$des);
        $insere->bindValue(':v',$v);
        // função para upload
        $dbpath = $upload->uploadImgProd($i,$n);
        $insere->bindValue(':i',$dbpath);
        // executa a minha querie
        $insere->execute();
        // salta para a pagina
        header('Location:' . $destino);
    }
    
    // Método que mostra todos os produtos
    function mostraTudo(){
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        $sql = '
        SELECT PRODUTOS.id_produto, PRODUTOS.nomeprod, PRODUTOS.preco, PRODUTOS.imagem, CATEGORIAS.nomecategoria, PRODUTOS.visivel, PRODUTOS.destaque
        FROM PRODUTOS,CATEGORIAS
        WHERE PRODUTOS.id_categoria=CATEGORIAS.id_categoria
        ORDER BY PRODUTOS.nomeprod, CATEGORIAS.id_categoria, PRODUTOS.preco';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // executa a minha querie
        $s->execute();
        // retornar os dados
        return $s->fetchAll();
    }
    
    
    // Método que pesquisar os produtos
    function pesquisaProduto($string){
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        $sql = '
        SELECT PRODUTOS.id_produto, PRODUTOS.nomeprod, PRODUTOS.preco, PRODUTOS.imagem, CATEGORIAS.nomecategoria, PRODUTOS.visivel, PRODUTOS.destaque, PRODUTOS.descricao
        FROM PRODUTOS,CATEGORIAS
        WHERE PRODUTOS.id_categoria=CATEGORIAS.id_categoria AND PRODUTOS.visivel = true AND (PRODUTOS.nomeprod LIKE :s OR PRODUTOS.descricao LIKE :s)
        ORDER BY PRODUTOS.nomeprod, CATEGORIAS.id_categoria, PRODUTOS.preco';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        $s->bindValue(':s','%'.$string.'%');
        // executa a minha querie
        $s->execute();
        // retornar os dados
        return $s->fetchAll();
    }    
    
    // Método que apaga produto via id
    function apagaProd($id,$destino){
        // ligação à class database
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        $sql = '
        DELETE
        FROM PRODUTOS
        WHERE id_produto = :id
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        $s->bindValue(':id',$id);
        // executa a minha querie
        $s->execute();
        // salto para a página
        header('Location:' . $destino);  
    } 
    
    // Método que mostra produtos por id
    function mostraProduto($id){
        // ligação à class database
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        $sql = '
        SELECT PRODUTOS.id_produto, PRODUTOS.nomeprod, PRODUTOS.descricao, PRODUTOS.preco, PRODUTOS.imagem, PRODUTOS.id_categoria, PRODUTOS.visivel, PRODUTOS.destaque
        FROM PRODUTOS
        WHERE PRODUTOS.id_produto = :id
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // bind do parâmetro ao usar $GLOBALS Int -> PDO::PARAM_INT String -> PDO::PARAM_STR
        $s->bindValue(':id',$id);
        // executa a minha querie
        $s->execute();
        // retornar os dados
        return $s->fetchAll();
    } 
   
    // Método para Editar Produto via id
    function editarProduto($id,$idc,$n,$d,$p,$i,$des,$v,$destino){
        // ligação à class database
        require_once 'classes/database.class.php';
        require_once 'classes/upload.class.php';
        // instancio a class
        $db = new database();
        $upload = new upload();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta à bd
        // testar se tem imagem
        
        if ($_FILES[$i]){
            $sql = '
            UPDATE PRODUTOS
            SET id_categoria = :idc, nomeprod = :n, descricao = :d, preco = :p, imagem = :i, destaque = :des, visivel = :v
            WHERE id_produto = :id
            ';   
        }else{
            $sql = '
            UPDATE PRODUTOS
            SET id_categoria = :idc, nomeprod = :n, descricao = :d, preco = :p,  destaque = :des, visivel = :v
            WHERE id_produto = :id
            ';   
        }
        // prepara a ligação ao MySQL Server
        $edita = $pdo->prepare($sql);
        // binds dos parâmetros às variáveis
        $edita->bindValue(':idc',$idc);
        $edita->bindValue(':n',$n);
        $edita->bindValue(':d',$d);
        $edita->bindValue(':p',$p);
        if ($_FILES[$i]){
            $dbpath = $upload->uploadImgProd($i,$n);
            $edita->bindValue(':i',$dbpath);
        }
        $edita->bindValue(':des',$des);
        $edita->bindValue(':v',$v);
        $edita->bindValue(':id',$id);
        // executa a minha querie
        $edita->execute();
        // salta para a pagina
        header('Location:' . $destino);
    }
    
    
    
    
// fim de classe produtos    
}







?>