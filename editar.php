<?php
require_once('conexao.php');
 
$id=$_GET['editarid'];
$sql=$pdo->prepare("SELECT * FROM Receita WHERE idReceita='$id'");
$sql->execute();
$dados=$sql->fetchAll();

foreach($dados as $chave=> $valor){
  $nome=$valor['Nome'];
  $email=$valor['Email'];
  $sintoma=$valor['Sintoma'];
  $ingrediente=$valor['Ingrediente'];
  $preparo=$valor['Preparo'];
}

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <link rel="stylesheet" href="estilo.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script type="text/javascript" src="DefaultBehaviour.js"></script>
 
</head>

<body>

<html>
    <body>
    <div class="col-md-12">
                    <img  src="projetocha_logo.png" class="logo" alt="logo">
                </div>

<form method="post" class="submit1" action="editar1.php">
    <div>
          <h3 align="center">Editar Chá</h3>
          <input hidden type="id" name="id" value="<?php echo $id ?>">
          <label for="nome1" class="form-label">Nome</label>
        
        <input type="nome1" class="form-control" id="nome1"  name="nome1" maxlength="50" value="<?php echo $nome?>" >
       <br><br>
        <label for="email" class="form-label">E-mail</label>
      
        <input type="email" class="form-control" id="email1" name="email1" value="<?php echo $email?>" maxlength="50" >
       <br><br>
        <label for="sintomas" class="form-label">Sintomas</label>
        
        <input type="text" class="form-control" id="sintomas1" name="sintomas1" maxlength="200" value="<?php echo $sintoma?>">
        
        <br><br><label for="ingredientes" class="form-label">Ingredientes</label>
        
        <input type="text" class="form-control" id="ingredientes1" name="ingredientes1" value="<?php echo $sintoma?>">
        <br><br>
      
        <label for="preparo" class="form-label">Preparo</label>
        
        <input type="text"  class="form-control" id="preparo1" name="preparo1" maxlength="500" value="<?php echo $preparo?>">
        <br><br>
   
          <div class="center">
          <button  class="btn btn-primary" type="submit1">Enviar</button><button><a href="crud1.php">Voltar</a></button>
        </div>
        </div>
 
    </form>
</body>
 </html>
