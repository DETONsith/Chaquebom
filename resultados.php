
<?php 	
//echo $_POST['sintomas'];	
$current_page = $_POST['act_page'];	
$sintomas_original = $_POST['sintomas'];	
$sintomas = explode(",", $sintomas_original);	
//var_dump($sintomas);	

require_once('connection.php');	

$recipelist = [];	

   foreach($sintomas as $sintoma){	
    $results1 = $conn->query("select * from Sintoma where nome = '$sintoma'"); //pega todos os sintomas que batem com o nome	
    //var_dump($results1);	

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



}	
//echo '<br><br><br>';	
//var_dump($recipelist);	

if (sizeof($recipelist)%3 != 0){	
    $total_pages = (round(sizeof($recipelist)/3,0,PHP_ROUND_HALF_DOWN));	
} else {$total_pages = sizeof($recipelist)/3;}	

if (array_key_exists((($current_page-1)*3),$recipelist)){	
$receita1 = $conn->query("select * from Receita where idReceita =".$recipelist[(($current_page-1)*3)]);	
$receitaa1 = $receita1->fetch_assoc();	
if (array_key_exists((1+($current_page-1)*3),$recipelist)){	
$receita2 = $conn->query("select * from Receita where idReceita =".$recipelist[(1+($current_page-1)*3)]);	
$receitaa2 = $receita2->fetch_assoc();}	
if (array_key_exists((2+($current_page-1)*3),$recipelist)){	
$receita3 = $conn->query("select * from Receita where idReceita =".$recipelist[(2+($current_page-1)*3)]);	
$receitaa3 = $receita3->fetch_assoc();}	
//echo '<br><br><br><br>';	

//var_dump($receita1);	

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
                <img src="projetocha_logo.png" class="logo" alt="Logo">	
                    <h1>Resultados da pesquisa</h1>	
                </div>	

                <div class="content" id=recipecontent>	
                    <div class="searchresult">	



                        <?php	
                        //MOSTRA AS RECEITAS	

                            echo "<div class='recipe' id=".$receitaa1['idReceita'].">";	
                            //NOME DA RECEITA	
                            echo "<div class='titleRecipe'>	
                            <h2><span class='recipeId'>".$receitaa1['idReceita']."</span> -> ".$receitaa1['Nome']."</h2>	
                            </div>";	



                            //IMAGEM DA RECEITA	
                            echo "<div class='imgingred'>";	
                            echo "<div class='imageRecipe'>";	
                            echo "<img id='rcpimg' src='".$receitaa1['Imagem']."' alt='".$receitaa1['Nome']."'>	
                            </div>";	
                            //INGREDIENTES DA RECEITA	
                            echo "<div class='ingredientes'>	
                            <h2>Ingredientes</h2>	
                            <p>".$receitaa1['Ingrediente']."</p> 	
                            </div>";	

                            echo "</div></div>";	


                            if(isset($recipelist[(1+($current_page-1)*3)])){	
                            //RECEITA 2	

                            echo "<div class='recipe' id=".$receitaa2['idReceita'].">";	
                            //NOME DA RECEITA	
                            echo "<div>";	
                            echo "<div class='titleRecipe'>	
                            <h2><span class='recipeId'>".$receitaa2['idReceita']."</span> -> ".$receitaa2['Nome']."</h2>	
                            </div></div>";	



                            //IMAGEM DA RECEITA	
                            echo "<div class='imgingred'>";	
                            echo "<div class='imageRecipe'>";	
                            echo "<img id='rcpimg' src='".$receitaa2['Imagem']."' alt='".$receitaa2['Nome']."'>	
                            </div>";	
                            //INGREDIENTES DA RECEITA	
                            echo "<div class='ingredientes'>	
                            <h2>Ingredientes</h2>	
                            <p>".$receitaa2['Ingrediente']."</p> 	
                            </div>";	

                            echo "</div></div>";	
                            }	


                            if(isset($recipelist[(2+($current_page-1)*3)])){	
                                //RECEITA 3	

                                echo "<div class='recipe' id=".$receitaa3['idReceita'].">";	
                                //NOME DA RECEITA	

                                echo "<div class='titleRecipe'>	
                                <h2><span class='recipeId'>".$receitaa3['idReceita']."</span> -> ".$receitaa3['Nome']."</h2>	
                                </div>";	



                                //IMAGEM DA RECEITA	
                                echo "<div id='imgingred'>";	
                                echo "<div class='imageRecipe'>";	
                                echo "<img id='rcpimg' src='".$receitaa3['Imagem']."' alt='".$receitaa3['Nome']."'>	
                                </div>";	
                                //INGREDIENTES DA RECEITA	
                                echo "<div class='ingredientes'>	
                                <h2>Ingredientes</h2>	
                                <p>".$receitaa3['Ingrediente']."</p> 	
                                </div>";	

                                echo "</div></div>";	
                                }	

                        ?>	

                    </div>	
                    <div class="searchresultMenu">	

                            <img width="30vh" id='listback' src="goback_ico.png" class="icoclass">	
                            <div class="pagesCount"><?php echo $current_page.'/'.$total_pages;?></div>	
                            <img width="30vh" id='listnext' src="next_ico.png" class="icoclass">	

                    </div>	
                    </div>	
                    <div >	
                        <a href="RecipeSearch.html"><button class="footerB">Voltar</button></a>	
                    </div>	
                    <form method='post' hidden action='resultados.php' name='formparasintomas'><input type='text' name='sintomas' id='sintomas' value='<?php echo $sintomas_original ?>'><input type='text' name='act_page' id='act_page' value=''></form>	
                    <form method='post' hidden action='tempescolhida.php' name='formdetalhes'><input type='text' name='sintomas' id='sintomas' value='<?php echo $sintomas_original ?>'><input type="text" name='receitafordetail' id='receitafordetail'></form>  	
            </div>	



        </div>	
    </body>	
    
</html>	
<?php 	
} // fim da checagem de "se receita é maior que 0"	

?>	

<script type="text/javascript">	

$(document).ready(function() {  	

var sintomas = "<?php print_r($sintomas_original); ?>"	
var current_page = "<?php print_r($current_page); ?>"	
var total_page = "<?php print_r($total_pages); ?>"	
$("#listback").click(function(){	
    if (current_page != 1){	
    var new_current_page = parseInt(current_page)-1;
    $("#act_page").val(String(new_current_page));	
    document.forms['formparasintomas'].submit();	
    }	
})	
$("#listnext").click(function(){	
    if (current_page < total_page){	
    var new_current_page = parseInt(current_page)+1;
    $("#act_page").val(String(new_current_page));	
    document.forms['formparasintomas'].submit();	
    }	
})	


$(".recipe").click(function(){	
    var selectedRecipe =($(this).attr("id")); //get id from the clicked recipe	
    $("#receitafordetail").val(String(selectedRecipe));	
    document.forms['formdetalhes'].submit();	
    console.log(selectedRecipe);	
})	


})	
</script>	

