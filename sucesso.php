<?php
require_once("Connection.php");
$fastsql = $pdo->prepare("SET GLOBAL max_allowed_packet=1073741824;");
$fastsql->execute();
ini_set('wait_timeout','300');
ini_set('post_max_size','40M');
ini_set('upload_max_filesize','40M');

$nome= $_POST['nome'];
$email= $_POST['email'];
$sintomas= $_POST['sintomas'];
$ingredientes= $_POST['ingredientes'];
$preparo= $_POST['preparo'];

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilo2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="DefaultBehaviour.js"></script>

</head>
<body>
    <div class="ontainer">
    <div class="col-md-12">
        <img  src="projetocha_logo.png" class="logo" alt="logo">
    </div>
    <div class="letra">
        <div class="receita">
        <img  src="projetocha_logo.png" class="rosto" alt="logo">
        <h3>Obrigado pela sugestão, em breve daremos retorno atráves do e-mail para informar a situação da sua sugestão!
         Agradecemos a sua colaboração!</h3>
        
    </div>
       <div >
       <a href="RecipeForm.html"> <button  class="footerB" type="submit">Voltar</button></a>
    </div>
        </div>

</div>
<?php

$pdo=new PDO("mysql:host=localhost;dbname=chaquebom","root","");
  $stmt = $pdo->prepare("INSERT INTO Receita(nome,email,preparo,imagem,ingrediente,sintoma,aprovado)
  VALUES('$nome','$email','$preparo',?,'$ingredientes','$sintomas',0)");
  $stmt->execute([file_get_contents($_FILES['file']["tmp_name"])]);
?>
</body>
</html>
