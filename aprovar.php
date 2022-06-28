<?php 

require_once('connection.php');

$id = $_POST['idreceita'];
$nome = $_POST['Nome'];
$imagem = $_POST['imagem'];
$preparo = $_POST['preparo'];
$ingrediente = $_POST['ingrediente'];
$sintomas_original = $_POST['sintomas'];
$sintomas = explode(",", $sintomas_original);


foreach($sintomas as $sint){ //para cada sintoma da lista vai adicionar uma relação entre eles e a receita no banco de relações


    $SinpCheck = $conn->query("select upper(nome) from sintoma");
    $exist = false;
    while($tempcheck = $sinpCheck->fetch_assoc()){
        $nometemp = strtoupper($sint);
        if($tempcheck['nome'] == $nometemp){
            $exist = true;
        }
    }
    if ($exist == false){ //se não tiver um sintoma com o mesmo nome adiciona ele na tabela de sintomas
    $sql = $conn->query("insert into Sintoma ('nome') values ('".$sint."')");
    $sql->execute();
    }

    $sinpSearch = $conn->query("select * from Sintoma where upper(nome) = upper('".$sint."')");
    $sinpresult = $sinpSearch->fetch_assoc();
    $sql = $conn->query("insert into REL_SintomaReceita('idReceita','idSintoma_1')values('".$id."','".$sinpresult['idSintoma']."')"); //adiciona uma relação entre os sintomas com a receita na tabela de relações
    $sql->execute();


    



    
}
    $sql = $conn->query("update receita set aprovado = '1', Nome = '".$nome."', Preparo = '".$preparo."', Ingrediente = '".$ingrediente."', Sintoma = '".$sintomas_original."' where idReceita = ".$id); //aprova e atualiza os dados da receita para que ela apareça nas buscas
    $sql ->execute();


?>
