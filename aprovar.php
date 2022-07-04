<?php 
require_once('connection.php');
//var_dump($_POST);
$id = $_POST['idreceita'];
$nome = $_POST['nome'];
$preparo = $_POST['preparo'];
$ingrediente = $_POST['ingrediente'];
$sintomas_original = $_POST['sintomas'];
$sintomas = explode(",", $sintomas_original);
var_dump($sintomas);

foreach($sintomas as $sint){ //para cada sintoma da lista vai adicionar uma relação entre eles e a receita no banco de relações

    echo "<br><br><br> realizando operação com sintoma $sint ";

    $SinpCheck = $conn->query("SELECT upper(nome) from sintoma where upper(nome) = (upper('".$sint."'))");


    if($SinpCheck->num_rows == 0){ //caso não exista ainda um sintoma da lista de recebidos cadastrados
        echo "Foi aceito na inserção";
        $stmt = $pdo->prepare("INSERT INTO sintoma (nome) values (upper('".$sint."'))");
        $stmt->execute();

    }

    

    $sinpSearch = $conn->query("SELECT * from Sintoma where upper(nome) = (upper('".$sint."'))");
    $sinpresult = $sinpSearch->fetch_assoc();
    if($sinpresult != null){
    

    $RelationCheck = $conn->query("SELECT * FROM REL_SintomaReceita where idSintoma_1 = ".$sinpresult['idSintoma']." and idReceita = $id ");
    
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

    $sql = $pdo->prepare("update receita set aprovado = '1', Nome = '".$nome."', Preparo = '".$preparo."', Ingrediente = '".$ingrediente."', Sintoma = '".$sintomas_original."' where idReceita = ".$id); //aprova e atualiza os dados da receita para que ela apareça nas buscas
    $sql ->execute();



    header("Location:judge.php");
    die();


?>
