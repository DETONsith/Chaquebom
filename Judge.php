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
                        
                        while($row = $results1->fetch_assoc()){
                            echo "
                            <tr>
                            <td><img id='rcpimg' src='data:image/jpeg;base64,".base64_encode($row['Imagem'])."' ></td>
                            <td>".$row['Nome']."</td>
                            <td>".$row['Ingrediente']."</td>
                            <td>".$row['Preparo']."</td>
                            <td><input type=text id='sintomas' value='".$row['Sintoma']."'></td>
                            </tr>
                            ";
                        }

                        ?>
                    </tr>
                </div>
                <div></div>
            </div>
        </div>        
    </body>
</html>