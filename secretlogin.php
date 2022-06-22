

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="DefaultBehaviour.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecretLogin</title>
</head>
<body>
    <div class="container">
        <div class=row>
            <div class="col-md-12">
                <img src="projetocha_logo.png" class="logo" alt="Logo">
            </div>
            <div class=content id=loginForm>
    <form action="validation.php" method="post">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Password">
        <button id=trylogin>Login</button>
    </form>
            </div>
            <div class="footer">
                <?php if(isset($_POST['error'])==true){echo $_POST['error'];} ?>
            </div>
        </div>
    </div>
</body>
