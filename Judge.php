<?php 
require_once('connection.php');

$results1 = $conn->query("select * from Receita where aprovado = '0'");

?>






<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="DefaultBehaviour.js"></script>
       <!-- <script type="text/javascript"  src="JudgeTab.js"></script> -->
        <title>Julgamento das receitas</title>    
    </head>
    <body>
        <div class=container>
            <div class=row>
                <div></div>
                <div class=content>
                 <?php
                        
                        if($results1->num_rows > 0){
                            echo"<table>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Ingredientes</th>
                            <th>Preparo</th>
                            <th>Sintomas</th>";
                        while($row = $results1->fetch_assoc()){
                            
                            echo "
                            <tr>
                            <form id='".$row['idReceita']."' name='id".$row['idReceita']."' method='POST' action=''>
                            <td><img width='80vh' height='80vh' src='".$row['Imagem']."'>	</td>
                            <td><input type=text id='nome' name='nome' value='".$row['Nome']."'></td>
                            <td><input type=text id='ingrediente' name='ingrediente' value='".$row['Ingrediente']."'></td>
                            <td><input type=text id='preparo' name='preparo' value='".$row['Preparo']."' ></td>
                            <td><input type=text id='sintomas' name='sintomas' value='".$row['Sintoma']."' ></td>
                                <input hidden type=text id='idreceita' name='idreceita' value='".$row['idReceita']."'>
                            <td><button id='aprovar' iditem='".$row['idReceita']."'>Aprovar</button>    <button id='reprovar' iditem='".$row['idReceita']."'>Recusar</button></td>
                            </form>
                            </tr>
                            ";
                        }echo"</table>";
                    }
                    else{
                        echo
                        "
                        <h2>Nenhum resultado encontrado</h2>
                        ";
                    }
                        ?>
                    </tr>

                </div>
                <div class='footer'>
                <a href="menu.php"><button class="footerB">Voltar</button></a>	
                </div>
            </div>
        </div>        
    </body>
</html>

<script type="text/javascript">
$(document).ready(function(){

$("#aprovar").click(function(){
    var iditem = $(this).attr("iditem");
    document.forms["id"+iditem].action = "aprovar.php";
    document.forms[iditem].submit();
    
})

$("#reprovar").click(function(){
    var iditem = $(this).attr("iditem");
    document.forms["id"+iditem].action = "reprovar.php";
    document.forms["id"+iditem].submit();
    
})



})</script>