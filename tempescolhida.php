<?php 

$sintomas_guardar = $_POST['sintomas'];
$receita_consulta = $_POST['receitafordetail'];


require_once('connection.php');
$receitashow = $conn->query("select * from Receita where idReceita = ".$receita_consulta);
$receita = $receitashow->fetch_assoc();


?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="DefaultBehaviour.js"></script>
    </head>
    <body>
        <div class="container">

            <div class="row">
            
            <div class="col-md-12">
                <img src="projetocha_logo.png" class="logo" alt="Logo">
            </div>
    
    
            <div class="content">
                <div id="imagem">
                    <img id='rcpimg' src="<?php echo 'data:image/jpeg;base64,'.base64_encode($receita['Imagem']); ?>" alt="">
                </div>
                <div id="texto">
                    <div id="texto1">
                        <h1 center>Ingredientes</h1>
                        <div id="recetexto">
                            <?php echo $receita['Ingrediente']; ?>
                        </div>
                    </div>
                    <div id="texto2">
                        <h1 center>Modo de preparo</h1>
                        <div id="recetexto2">
                            <?php echo $receita['Preparo']; ?>
                        </div>

                    </div>
                </div>
           
            </div>
            
            <div>
                <a href=""><button  class="footerB">Voltar</button></a>
          
            </div>
            
            </div> 
            </div>
           
        </body>


</html>
