<?php
// class responsável pelo utilizadores

class utilizadores{
    
    // construtor da class
    public function __construct (){

    }
    
    // método de login
    function login($user,$pass,$destino){
        // acesso à base dados
        require_once 'classes/database.class.php';
        require_once 'includes/app.inc.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta
        $sql = '
        SELECT id_utilizador,nome
        FROM UTILIZADORES
        WHERE utilizador = :u AND passe = md5(:p) AND activo = true
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // parâmetros
        $pass = $GLOBALS['salt'] . $pass . $GLOBALS['salt'];
        $s->bindValue(':u',$user);
        $s->bindValue(':p',$pass);
        // executa a minha querie
        $s->execute();
        $resultado = $s->fetch();
        // testar se encontrou utilizador
        if ($resultado['id_utilizador']){
            print("entrou");
            // entrou e prepara as sessions
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['nomeutilizador'] = $resultado['nome'];
            $_SESSION['id'] = $resultado['id_utilizador'];
            // saltar para a página do backoffice
            header('Location:' . $destino);
            return true;
        }else{
            return false;
        }
        
    }
    
    // método logout
    function logout($destino){
        // ficheiro responsável pelo logout do utilizador
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();
        // salta para a página 
        header('Location:' . $destino);

    }
    
    // método segurança backdoor
    function backdoor(){
        // segurança
        session_start();
        // segurança nas id
        session_regenerate_id();
        if(!$_SESSION['login']){
            // falso
            header('Location:admin.php?erro=2');
        }     
    }
    
    
    // ler utilizador especifico
    function dadosUtilizador($id){
        // acesso à base dados
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta
        $sql = '
        SELECT id_utilizador,nome, passe, email, datainsc, activo
        FROM UTILIZADORES
        WHERE id_utilizador = :u 
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // parâmetros
        $s->bindValue(':u',$id);
        // executa a minha querie
        $s->execute();
        // retornar os dados
        return $s->fetchAll();  
    }
    
    // edita perfil
    function editaPerfil($n,$p,$e,$destino){
        // acesso à base dados
        require_once 'classes/database.class.php';
        require_once 'includes/app.inc.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta
        $sql = '
        UPDATE UTILIZADORES
        SET nome = :n, passe = md5(:p), email = :e
        WHERE id_utilizador = :i
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // parâmetros
        $s->bindValue(':i',$_SESSION['id']);
        $s->bindValue(':n',$n);
        $p = $GLOBALS['salt'] . $p . $GLOBALS['salt'];
        $s->bindValue(':p',$p);
        $s->bindValue(':e',$e);
        // executa a minha querie
        $s->execute();
        // salta para a pagina
        header('Location:' . $destino);
    }
    
    // função mostra todos os utilizadores
    function mostraTudo(){
        // acesso à base dados
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta
        $sql = '
        SELECT id_utilizador,utilizador,nome, email, datainsc, activo
        FROM UTILIZADORES
        WHERE id_utilizador > 1
        ORDER BY nome, utilizador
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // executa a minha querie
        $s->execute();
        // retornar os dados
        return $s->fetchAll();  
    }
    
    // Método que apaga utilizador via id
    function apagaUser($id,$destino){
        // ligação à class database
        require_once 'classes/database.class.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta para produtos de destaque
        $sql = '
        DELETE
        FROM UTILIZADORES
        WHERE id_utilizador = :id
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        $s->bindValue(':id',$id);
        // executa a minha querie
        $s->execute();
        // salto para a página
        header('Location:' . $destino);  
    }
    
    // inserir utilizador 
    function inserirNovo($utilizador,$n,$p,$e,$a,$destino){
        // acesso à base dados
        require_once 'classes/database.class.php';
        require_once 'includes/app.inc.php';
        // instancio a class
        $db = new database();
        // crio o pdo com o método getCon
        $pdo = $db->getCon();
        // pergunta
        $sql = '
        INSERT INTO UTILIZADORES
        (utilizador, nome, passe, email, activo)
        VALUES (:u,:n,md5(:p),:e,:a)
        ';
        // prepara a ligação ao MySQL Server
        $s = $pdo->prepare($sql);
        // parâmetros
        $s->bindValue(':u',$utilizador);
        $s->bindValue(':n',$n);
        $p = $GLOBALS['salt'] . $p . $GLOBALS['salt'];
        $s->bindValue(':p',$p);
        $s->bindValue(':e',$e);
        $s->bindValue(':a',$a);
        // executa a minha querie
        $s->execute();
        // salta para a pagina
        header('Location:' . $destino);
    }
    
// fim de class    
}






?>