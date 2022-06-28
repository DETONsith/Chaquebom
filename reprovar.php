<?php 

require_once('connection.php');

$id = $_POST['idreceita'];
$sql = $conn->query("DELETE from receita where idReceita = $id"); //adiciona uma relação entre o sintoma com a receita na tabela de relações
$sql->execute();
?>