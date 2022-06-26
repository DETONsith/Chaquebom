<?php 

if($_SESSION['AdmOnline'] == false){
    header('Location: secretlogin.php');
}
else{
    echo "<h1>Bem-vindo, Administrador!</h1>";
}
<html>
<div >
                <a href="index.html"><button class="footerB">Voltar</button></a>
        </div>
</html>
?>
