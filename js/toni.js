// Ficheiro JavaScript para a Loja do Toni


//função validar Produto
function validaProduto(){
    var erros = "";
    if (document.getElementById('id_categoria').value==0){
            erros = "Por favor, escolha uma <b>Categoria</b>";
        }
        if (document.getElementById('nomeprod').value==""){
            erros += "<br>Por favor, introduza um <b>Nome Produto</b>";
        }
        if (document.getElementById('imagem').value==""){
            erros += "<br>Por favor, introduza uma <b>Imagem </b>";
        }
        if (document.getElementById('preco').value==""){
            erros += "<br>Por favor, introduza um <b>Preço </b>";
        }else if (isNaN(document.getElementById('preco').value)){
            erros += "<br>Por favor, introduza um valor numérico no <b>Preço </b>";
        }
            
        if (erros == ""){
            return true;
        }else{
            swal(
                    'Erro',
                  erros,
                  'error'
                );
            return false;
            }          
}

//função validar Produto
function validaProdutoEdit(){
    var erros = "";
    if (document.getElementById('id_categoria').value==0){
            erros = "Por favor, escolha uma <b>Categoria</b>";
        }
        if (document.getElementById('nomeprod').value==""){
            erros += "<br>Por favor, introduza um <b>Nome Produto</b>";
        }
        if (document.getElementById('preco').value==""){
            erros += "<br>Por favor, introduza um <b>Preço </b>";
        }else if (isNaN(document.getElementById('preco').value)){
            erros += "<br>Por favor, introduza um valor numérico no <b>Preço </b>";
        }
            
        if (erros == ""){
            return true;
        }else{
            swal(
                    'Erro',
                  erros,
                  'error'
                );
            return false;
            }          
}

//função pergunta se pode apagar produto
function confirmaApagar(id,caminho){    
        swal({
          title: 'Deseja Apagar Registo ?',
          text: "Esta acção não poderá ser anulada...",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sim',
          cancelButtonText: 'Não'    
        }).then(function () {
            c = caminho + '?id=' + id;
            window.location = c;
        })
     }  

//função validar Perfil
function validaPerfil(){
    var erros = "";
    if (document.getElementById('nome').value==''){
            erros = "Por favor, escolha um <b>Nome</b>";
        }
        if (document.getElementById('passe').value==""){
            erros += "<br>Por favor, introduza uma <b>Palavra Passe </b>";
        }
        if (document.getElementById('passe2').value!=document.getElementById('passe').value){
            erros += "<br>Palavra Passe não coincide <b>Repita Palavra Passe</b>";
        }
        if (document.getElementById('email').value==""){
            erros += "<br>Por favor, introduza um <b>Email </b>";
        }
        
            
        if (erros == ""){
            return true;
        }else{
            swal(
                    'Erro',
                  erros,
                  'error'
                );
            return false;
            }          
}


//função validar Produto
function validaPagina(){
    var erros = "";
   
        if (document.getElementById('codigo_pagina').value==""){
            erros += "<br>Por favor, introduza um <b>Código para a Página</b>";
        }
       
            
        if (erros == ""){
            return true;
        }else{
            swal(
                    'Erro',
                  erros,
                  'error'
                );
            return false;
            }          
}