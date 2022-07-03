<?php 

require_once('connection.php');
//var_dump($_POST);
$id = $_POST['idreceita'];
$nome = $_POST['nome'];
$preparo = $_POST['preparo'];
$ingrediente = $_POST['ingrediente'];
$sintomas_original = $_POST['sintomas'];
$sintomas = explode(",", $sintomas_original);


foreach($sintomas as $sint){ //para cada sintoma da lista vai adicionar uma relação entre eles e a receita no banco de relações


    $SinpCheck = $conn->query("select upper(nome) from sintoma");
    $exist = false;
    while($tempcheck = $SinpCheck->fetch_assoc()){
        $nometemp = strtoupper($sint);
        if($tempcheck['upper(nome)'] == $nometemp){
            $exist = true;
        }
    }
    if ($exist == false){ //se não tiver um sintoma com o mesmo nome adiciona ele na tabela de sintomas
    $sql = $conn->query("insert into Sintoma ('nome') values ('".$sint."')");
    $sql->execute();
    }

    $sinpSearch = $conn->query("select * from Sintoma where upper(nome) = upper('".$sint."')");
    $sinpresult = $sinpSearch->fetch_assoc();
    $sql = $conn->query("insert into rel_sintomareceita (idReceita,idSintoma_1) values (".$id.",".$sinpresult['idSintoma'].") "); //adiciona uma relação entre os sintomas com a receita na tabela de relações
    
    $sql->execute();
    /*if ($sql->execute() == TRUE) {
        echo "<a href='javascript:history.back()'><button  class='footerB'>Aprovação realizada com sucesso, clique aqui para voltar!</button></a>";
    } else {
        echo "Ocorreu um erro na operação: " . $conn->error . "<br> <a href='javascript:history.back()'><button  class='footerB'>Voltar</button></a>"; 
    }*/
    
    



    
}
    $sql = $conn->query("update receita set aprovado = '1', Nome = '".$nome."', Preparo = '".$preparo."', Ingrediente = '".$ingrediente."', Sintoma = '".$sintomas_original."' where idReceita = ".$id); //aprova e atualiza os dados da receita para que ela apareça nas buscas
    $sql ->execute();


?>
