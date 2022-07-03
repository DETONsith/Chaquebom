<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "chaquebom";
$conn = mysqli_connect($host, $user, $pass, $db);
$pdo=new PDO("mysql:host=$host;dbname=$db","$user","$pass");
?>