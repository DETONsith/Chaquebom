<?php 

$sintomas = $_POST['sintomas'];
$sintomas = explode(",", $sintomas);

require_once('connection.php');

$recipelist = [];

foreach($sintomas as $sintoma){

$results = $conn->query("select idReceita from REL_SintomaReceita where Sintoma_idSintoma like '$sintoma'");

//if idReceita is not in the array, add it
foreach($results as $result){
    if(!in_array($result['idReceita'], $recipelist)){
        array_push($recipelist, $result['idReceita']);
    }
}
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

                    <div><img src=></div>

                    </div>
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
    </body>
</html>