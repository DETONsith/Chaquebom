<?php
require_once('conexao.php');
require_once('Connection.php');
$id=$_POST['id'];
$nome=$_POST['nome1'];
$email=$_POST['email1'];
$preparo=$_POST['preparo1'];
$ingrediente=$_POST['ingredientes1'];


$sintomas_original=$_POST['sintomas1'];
$sintomas = explode(",", $sintomas_original);

//zera as relações com a receita atual para cria-las novamente a seguir:
$sql=$pdo->prepare("DELETE FROM rel_sintomareceita where idReceita=$id");
$sql->execute();

foreach($sintomas as $sint){ //para cada sintoma da lista vai adicionar uma relação entre eles e a receita no banco de relações



    echo "<br><br><br> realizando operação com sintoma $sint ";

    $SinpCheck = $conn->query("SELECT upper(nome) from sintoma where upper(nome) = (upper('".$sint."'))"); //pega o nome dos sintomas que já existem com os selecionados


    if($SinpCheck->num_rows == 0){ //caso não exista ainda um sintoma da lista de recebidos cadastrados insere eles na tabela de sintomas
        echo "Foi aceito na inserção";
        $stmt = $pdo->prepare("INSERT INTO sintoma (nome) values (upper('".$sint."'))");
        $stmt->execute();

    }

    

    $sinpSearch = $conn->query("SELECT * from Sintoma where upper(nome) = (upper('".$sint."'))"); //pega o nome e o id dos sintomas que correspondem ao sintoma solicitado
    $sinpresult = $sinpSearch->fetch_assoc();
    if($sinpresult != null){ //caso o sintoma exista
    

    $RelationCheck = $conn->query("SELECT * FROM REL_SintomaReceita where idSintoma_1 = ".$sinpresult['idSintoma']." and idReceita = $id "); //pega todas as relações que tem entre o sintoma em questão e a receita
    
    if($RelationCheck->num_rows == 0){ // caso não tenha nenhuma relação estabelecida ainda entre o sintoma e a receita, ela é criada.
        $InsertRelation = $pdo->prepare("INSERT INTO rel_sintomareceita (idReceita,idSintoma_1) VALUES ($id,".$sinpresult['idSintoma'].")");
        if($InsertRelation->execute() == true){
            echo "<a href='javascript:history.back()'><button  class='footerB'>Aprovação realizada com sucesso, clique aqui para voltar!</button></a>";
        }else{
            echo "Ocorreu um erro na operação: " . $conn->error . "<br> <a href='javascript:history.back()'><button  class='footerB'>Voltar</button></a>"; 
        }
    }
    }  
}


$sql=$pdo->prepare("UPDATE Receita SET Nome='$nome',Email='$email',Preparo='$preparo',Sintoma='$sintoma'
,Ingrediente='$ingrediente' WHERE idReceita='$id'");
$sql->execute();
header('location:crud1.php');
?>
