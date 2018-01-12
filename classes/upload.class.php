<?php
// class responsável pelo upload

class upload{
   
    // construtor da class
    public function __construct (){
        
    }

    // função para inserir imagem do produto
    function uploadImgProd($picture,$nomeprod){

        // path directorio principal
        $currentDir = getcwd();
        // path para onde vai os uploads
        $uploadDirectory = 'uploads';

        $errors = []; // guarda os erros

        $fileExtensions = ['jpeg','jpg','png','JPEG','JPG','PNG']; // extensões permitidas
        var_dump($_FILES);
        // nome do ficheiro com a extensão
        $fileName = $_FILES[$picture]['name'];
        // tamanho do ficheiro
        $fileSize = $_FILES[$picture]['size'];
        // nome do ficheiro temporario
        $fileTmpName  = $_FILES[$picture]['tmp_name'];
        // tipo de ficheiro
        $fileType = $_FILES[$picture]['type'];
        // extensão do ficheiro que vai ser upload
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // caminho completo com o ficheiro + extensão
        $uploadPath =  $currentDir . '/' . $uploadDirectory . '/' .$nomeprod . '/'. basename($fileName); 
        // caminho apenas
        $path = $currentDir . '/'. $uploadDirectory . '/' .$nomeprod;

        // check se existe directorio
        if (file_exists($path)) {
            // existe pasta
            // verificar se existe ficheiro com o mesmo nome
            if (file_exists($uploadPath)){
                $newFileName = uniqid() . "." .  $fileExtension; 
                $fileName = $newFileName;
                $uploadPath = $currentDir . '/'. $uploadDirectory . '/' .$nomeprod . '/'. basename($fileName); 
            }
        } else {
            // não existe
            // cria pasta
            echo $path;
            // linux e mac
            mkdir($path, 0700);
        }

        // check se a extensão não é permitida
        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "Extensão de ficheiro não permitida. Por favor use JPEG ou PNG";
        }
        // check tamanho de ficheiro
        if ($fileSize > 2000000) {
            $errors[] = "Este ficheiro ultrapassa 2MB. Tem que introduzir uma imagem mais pequena. ";
        }

        // senão existir erros
        if (empty($errors)) {
            // faz upload
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                // echo "O ficheiro " . basename($fileName) . " foi gravado com sucesso";
                $dbpath = $uploadDirectory . '/' .$nomeprod . '/'. basename($fileName);
                return $dbpath;
            } else {
                // echo "Aconteceu um erro ao gravar o ficheiro";
            }
        } else {
            // lista erros
            foreach ($errors as $error) {
                echo $error . "Lista de Erros" . "\n";
            }
        }

    }




}
?>