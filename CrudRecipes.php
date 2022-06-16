<?php 

if($_SESSION['AdmOnline'] == false){
    header('Location: secretlogin.php');
}
else{
    echo "<h1>Bem-vindo, Administrador!</h1>";
}


?>