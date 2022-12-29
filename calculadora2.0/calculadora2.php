<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculadora 2</title>

</head>
<body>
<form enctype="multipart/form-data" name="calculadora" method="post">
<nav> 
    <div>
        
         <input type="file" name="receber">
         <input type="submit" name="enviar">
    </div>

<?php
if(isset($_POST["enviar"])) {
    $uploadfile=basename($_FILES['receber']['name']);
    $a=file_get_contents($_FILES['receber']['name']);
}
if(file_exists($_FILES['receber']['name'])){
    $arquivo = file_get_contents($_FILES['receber']['name']);
    $arquivo_array = explode("\r\n",$arquivo);
    foreach($arquivo_array as $arquivo_item) {
        if((strpos($arquivo_item,"=")==false)){
            if(($arquivo_item != "")){
                $b = explode("+", $arquivo_item);
                if((strpos($arquivo_item,"+")!=false)){
                    $resultado= $b[0]+$b[1];
                }
                $b = explode("-", $arquivo_item);
                if((strpos($arquivo_item,"-")!=false)){
                    $resultado= $b[0]-$b[1];
                }
                $b = explode("*", $arquivo_item);
                if((strpos($arquivo_item,"*")!=false)){
                    $resultado= $b[0]*$b[1];
                }
                $b = explode("/",$arquivo_item);
                if((strpos($arquivo_item,"/")!=false)){
                    $resultado = $b[0]/$b[1];
                }
                $arquivo_item = $arquivo_item.'='.$resultado;
                echo $arquivo_item; 
                file_put_contents("arquivo_txt", $arquivo_item.PHP_EOL, FILE_APPEND);
            }
            
        }
    }
}
?>
    <a href="arquivo_txt"download>Download</a> 
</form>
</nav>
</body>
</html>