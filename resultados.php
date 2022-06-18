<?php 

$sintomas = $_POST['sintomas'];
$sintomas = explode(",", $sintomas);

require_once('connection.php');

$results = $conn->query("select * from receita where Sintoma_idSintoma like '%$_POST[palavra]%'");


?>