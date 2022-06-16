<?php 

require_once 'Connection.php';

$login = $_POST['login'];
$password = $_POST['password'];

$result = $conn->query("select * from logins where login = $login and password = $password");

if($result->num_rows > 0){ 
    session_start();
    $_SESSION['AdmOnline'] = true; }
else{ 
    echo "<p id=error>Falha ao fazer login, usuário ou senha incorretos!</p>"
    ?><script>
        $(document).ready(function(){

$.post("secretlogin.php",{denied:true,error:$('#error').val()});
});
    </script>
<?php } ?>