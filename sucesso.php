<?php

$nome= $_POST['nome'];
$email= $_POST['email'];
$sintomas= $_POST['sintomas'];
$ingredientes= $_POST['ingredientes'];
$preparo= $_POST['preparo'];
$fil= $_POST['file'];

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
       <a href="index.html"> <button  class="btn btn-primary" type="submit" >Voltar para a página principal</button></a>
    </div>

</div>
<?php

$pdo=new PDO("mysql:host=localhost;dbname=chaquebom","root","");
  $stmt = $pdo->prepare("INSERT INTO Receita(nome,email,preparo,imagem,ingrediente,sintoma)
  VALUES('$nome','$email','$preparo','$fil','$ingrediente','$sintoma')");
  $stmt->execute();
?>
</body>
</html>