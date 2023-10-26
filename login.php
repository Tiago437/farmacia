<?php
session_start();
require_once("config/class.func.cfg.php");

$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);


$q= new SQL();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- bootstrap 5.3.2 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="style/css.css">
	<title>Login</title>
</head>
<body class="d-flex flex-column align-items-center justify-content-center bg-dark py-3" style="background-image: url('style/bg.jpg');background-size: cover;">


<?php
if(!empty($dados['nomeent'])){
$q1=$q->conn->prepare("SELECT * FROM login WHERE login=? AND password=?");
$q1->bindvalue(1,$dados['nomeent']);
$q1->bindvalue(2,$dados['pwent']);
$q1->execute();
$result=$q1->fetch();

if($q1->rowCount()>0){
	$_SESSION['login'] =$result['login'];
	$_SESSION['nome'] =$result['nome'];
	$_SESSION['loginlvl'] =$result['loginlvl'];
	$_SESSION['status'] =$result['status'];

echo"<div class='loader'><div class='loader2'></div></div>";


echo "<meta http-equiv='refresh' content='3 home.php'>";

}else{
	echo "erro ao entrar";

}
}


if(isset($_GET['sair'])){
	session_destroy();
	echo"<div class='loader'><div class='loader2'></div></div>";


echo "<meta http-equiv='refresh' content='3 entrar.php'>";
}

?>

</body>
</html>