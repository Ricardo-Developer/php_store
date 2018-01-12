<?php
// class responsável pelo acesso à base de dados

class database{
    // variável que vai guardar a string de ligação à bd
    private $connection;

    // construtor da class
    public function __construct (PDO $connection = null){
        $this->connection = $connection;
        // testa se a variável $connection vem null
        if ($this->connection == null) {
            try{
                $this->connection = new PDO(
                      'mysql:host=localhost;dbname=lojadotoni', 
                      'root', 
                      'mysql' );
                // UTF8 para suportar caracteres especiais
                $this->connection->exec('SET NAMES "utf8"');
                // error reporting
                $this->connection->setAttribute(
                    PDO::ATTR_ERRMODE, 
                    PDO::ERRMODE_EXCEPTION
                );
                
            }
                catch (PDOException $e){
                echo("Erro de ligação:" . $e);
                exit();    
            }
        }
    }
    // métodos
    
    // método para ir buscar o objecto pdo
    public function getCon(){
        return $this->connection;
    }
    
}

?>