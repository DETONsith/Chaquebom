<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecretLogin</title>
</head>
<body>
    <div class="container">
        <div class=row>
            <div class=logo>
                <img src="logo.png" alt="logo">
            </div>
            <div class=content>
    <form action="CrudRecipes.php" method="post">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Password">
        <button id=trylogin>Login</button>
    </form>
            </div>
            <div class="footer">
                <?php if($_POST['denied']==true){echo $_POST['ErrorMsg'];}) ?>
            </div>
        </div>
    </div>
</body>

<script src="validate.js"></script>
