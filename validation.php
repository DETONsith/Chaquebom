<?php 

require_once 'Connection.php';

$login = $_POST['login'];
$password = $_POST['password'];

$result = $conn->query("select * from logins where login = '$login' and password = '$password'");

if($result->num_rows > 0){ 
    session_start();
    $_SESSION['AdmOnline'] = true;
    header('Location: crud.php');
}
else{
    echo '<form id="myForm" action="secretlogin.php" method="post"><input type="hidden" name="error"'.'" value="'.'Falha ao fazer login, usuário ou senha incorretos!'.'"> </form>';
    ?>
<?php } ?>

<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>