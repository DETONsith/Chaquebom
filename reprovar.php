<?php 

require_once('connection.php');

$id = $_POST['idreceita'];
$sql = $pdo->prepare("DELETE from receita where idReceita = $id"); //adiciona uma relação entre o sintoma com a receita na tabela de relações
$sql->execute();

header("Location:judge.php");
die();
?>
