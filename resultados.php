<?php 
echo $_POST['sintomas'];
$sintomas = $_POST['sintomas'];
$sintomas = explode(",", $sintomas);
var_dump($sintomas);

require_once('connection.php');

$recipelist = [];

foreach($sintomas as $sintoma){
$results1 = $conn->query("select * from Sintoma where nome = '$sintoma'"); //pega todos os sintomas que batem com o nome
var_dump($results1);

while($row = $results1->fetch_assoc()) {

    $results2 = $conn->query("select * from REL_SintomaReceita where idSintoma_1 =".$row['idSintoma']);//usa o id do sintoma para pegar o id da receita
    while($row2 = $results2->fetch_assoc()){

        if(!in_array($row2['idReceita'],$recipelist)){ //checa se o idReceita já está no array
            array_push($recipelist,$row2['idReceita']); //se não estiver coloca ele no array de id's de receitas não repetidos (podia ter usado select distinct mas ai não teria graça)
        }

    }

    

}

//tradução dos dados
//row = sintomas -> (idSintoma / nome)
//row2 = REL_SintomaReceita -> (idSintoma / idReceita)



//if idReceita is not in the array, add it
}
echo '<br><br><br>';
var_dump($recipelist);

if (sizeof($recipelist) > 0){
foreach($recipelist as $recipinho){
    $results = $conn->query("select * from RECEITA where idReceita like '$recipinho'"); //coloca na variável results todos os "Objetos" receita encontrados.
}

?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="DefaultBehaviour.js"></script>
    <title>Resultados da pesquisa</title>    
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Resultados da pesquisa</h1>
                </div>
                
                <div class="content">
                    <div class="searchresult">

                        

                        <?php
                        //MOSTRA AS RECEITAS
                        
                            echo "<div class='recipe'>";
                            //NOME DA RECEITA
                            echo "<div class='titleRecipe'>
                            <h2><span class='recipeId'>".$result['idReceita']."</span> -> ".$result['nome']."</h2>
                            </div>";
                            


                            //IMAGEM DA RECEITA
                            echo "<div class='imageRecipe'>";
                            echo "<img src='".$result['imagem']."' alt='".$result['nome']."'>
                            </div>";
                            //INGREDIENTES DA RECEITA
                            echo "<div class='ingredientes'>
                            <p>".$result['ingrediente']."</p> 
                            </div>";

                            echo "</div>";
                        
                        
                        ?>

                    </div>
                    <div class="searchresultMenu">
                        <p>
                            <img src="goback_ico.png" class="icoclass">
                            <div class="pagesCount"></div>
                            <img src="next_ico.png" class="icoclass">
                        </p>
                    </div>
                    </div>
                    <div class="footer">
                    </div>
                </div>

                
        
        </div>
    </body>
</html>
<?php 
}

?>

<script type="text/javascript">

    var current_page = 1;
    var total_page = <?php print(sizeof($recipelist)); ?>;
    $(".pagesCount").html = current_page+"/"+total_page;



</script>