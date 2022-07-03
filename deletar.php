<?php
require_once('conexao.php');
require_once('connectionchecker.php');
if(isset($_GET['deletid'])){

    $id=$_GET['deletid'];
    $sql=$pdo->prepare("DELETE FROM rel_sintomareceita where idReceita = $id");
    $sql->execute();
    $sql = "";
    $sql=$pdo->prepare("DELETE FROM Receita WHERE idReceita=$id");
    $sql->execute();
    header('location:crud1.php');


}

?>
