<?php
// class responsável pelo erros da aplicação

class erros{
   
    // construtor da class
    public function __construct (){
        
    }
    // métodos
    
    // método para apresentar alertas
    function alertas($cor,$titulo,$descricao){
        $html = <<< EOHTML
        <!-- erro de login -->
        <div class="alert $cor alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>$titulo</strong> $descricao</div>
        <!-- .erro de login -->
EOHTML;
        return $html;
        
    }
    
}

?>