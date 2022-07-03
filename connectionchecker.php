<?php
session_start();
if($_SESSION['AdmOnline'] != "true"){
    echo '<form id="myForm" action="secretlogin.php" method="post"><input type="hidden" name="error"'.'" value="'.'Falha na autenticação de admnistrador, por favor, realize o login para entrar na página!'.'"> </form>';
    ?>
<?php } ?>

<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>
