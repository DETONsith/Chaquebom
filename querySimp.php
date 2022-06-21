<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "chaquebom";
$conn = mysqli_connect($host, $user, $pass, $db);
$results = $conn->query("select nome from sintoma where nome like '%$_POST[palavra]%'");

?>

<?php while($data = $results->fetch_assoc()): ?>

    <li class="sugest-name"><?php echo $data['nome'] ?></li>

<?php endwhile; ?>
