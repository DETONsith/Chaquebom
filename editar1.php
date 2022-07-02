<?php
require_once('conexao.php');
$id=$_POST['id'];
$nome=$_POST['nome1'];
$email=$_POST['email1'];
$preparo=$_POST['preparo1'];
$sintoma=$_POST['sintomas1'];
$ingrediente=$_POST['ingredientes1'];
$sql=$pdo->prepare("UPDATE Receita SET Nome='$nome',Email='$email',Preparo='$preparo',Sintoma='$sintoma'
,Ingrediente='$ingrediente' WHERE idReceita='$id'");
$sql->execute();
header('location:crud1.php');
?>