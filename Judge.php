<?php 
require_once('connection.php');

$results1 = $conn->query("select * from Receita where aprovado = '1'");

?>






<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="DefaultBehaviour.js"></script>
        <script type="text/javascript"  src="JudgeTab.js"></script>
        <title>Julgamento das receitas</title>    
    </head>
    <body>
        <div class=container>
            <div class=row>
                <div></div>
                <div class=content>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Ingredientes</th>
                    <th>Preparo</th>
                    <th>Sintomas</th>
                    
                        <?php
                        echo "<table>";
                        while($row = $results1->fetch_assoc()){
                            echo "
                            <tr>
                            <form name='".$row['idReceita']."' method='POST'>
                            <td><input type='file' id='imagem name='imagem' accept='image/png, image/jpeg' value='data:image/jpeg;base64,".base64_encode($row['Imagem'])."' ></td>
                            <td><input type=text id='nome' name='nome' value='".$row['Nome']."'></td>
                            <td><input type=text id='ingrediente' name='ingrediente' value='".$row['Ingrediente']."'></td>
                            <td><input type=text id='preparo' name='preparo' value='".$row['Preparo']."' ></td>
                            <td><input type=text id='sintomas' name='sintomas' value='".$row['Sintoma']."' ></td>
                                <input hidden type=text id='idreceita' name='idreceita' value='".$row['idReceita']."'>
                            <td><button id='aprovar' iditem='".$row['idReceita']."'></button>    <button id='reprovar' iditem='".$row['idReceita']."'></button></td>
                            </form>
                            </tr>
                            ";
                        }
                        ?>
                    </tr>
                </div>
                <div class='footer'></div>
            </div>
        </div>        
    </body>
</html>