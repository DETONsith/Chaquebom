<?php
require_once('conexao.php');
require_once('connectionchecker.php');
$sql=$pdo->prepare("SELECT * FROM Receita");
$sql->execute();
$dados=$sql->fetchAll();





?>
<!DOCTYPE html>
<head>

<style>
    body{
    background-color: #e6e4da;
}
        table{
            background-color:white;
  border-collapse:collapse;
  width:100%;
}
th{
   border-color:darkkhaki;
   background-color:darkkhaki;
   padding:10px;
   text-align:center;
   border:1px solid;
}
td{
    background-color:white;
   padding:10px;
   text-align:center;
   border:1px solid;

}
a:link{
    text-decoration:none;
    color:black;
}
button{
    border-radius: 30px;
    background-color: #dfe4e4;
    border-color:#4f8888;
    width:57px;
    height:25px;
   
    
}
.Voltar{
    border-radius: 30px;
    background-color: #dfe4e4;
    border-color:#4f8888;
    width:120px;
    height:30px;
}
img{
    width:120px;
    height:100px;
}


</style>
</head>
<body>

    <div class="ontainer">
    <a href="menu.php"><button class="Voltar">Voltar</button></a><br>
    </div>


<?php
    if(count($dados)>0){
        echo "<table>
        <tr>
        <th>Nome</th>
        <th>Imagem</th>
        <th>Ações</th>
        </tr>";
        
       
        foreach($dados as $chave=> $valor){
            echo '<tr>
            <td>'.$valor['Nome'].'</td>
            <td><img src="?><?php echo 'data:image/jpeg;base64,'.base64_encode($valor['Imagem']); ?>
            <?php echo"></td>
            <td>
            <button ><a href="editar.php? editarid='.$valor['idReceita'].'">Editar</a></button>
             <button> <a href="deletar.php? deletid='.$valor['idReceita'].'">Deletar</a></button>
                
                
            </td>
           
           
             </tr>';
        }
        echo"</table>";

    }else{
        echo "Nenhuma receita cadastrada";
    }
    ?>
    

</body>
</html>
