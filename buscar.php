<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="" method="GET">
		<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
</div>
		<input type="text" name="nomeItem" placeholder="Nome do Item">
		<button type="submit" value="enviar" name="enviar">Pesquisar</button>
	</form>
<a href="index.php"><button>Voltar</button></a>
<table border="2px">
	<tr>
		<td>Nome</td>
		<td>Quantidade</td>
		<td>Data de Vencimento</td>
		<td>Options</td>
	</tr>
<?php 

require_once("config/class.func.cfg.php");

if(!empty($_GET['enviar'])){
$nome=$_GET['nomeItem'];
	$qt=new SQL();
	$q1=$qt->conn->prepare("SELECT * FROM produtos WHERE nome like '$nome%'");
	$q1->execute();

	$result=$q1->fetchall();

	foreach ($result as $key => $campo) {
		echo "<tr><td>".$campo['nome']."</td><td>".$campo['quantidade']."</td><td>".$campo['dataVencimento']."</td><td>Abrir Apagar + -</td>
		</tr>";
	}
}

 ?>
 </table>
</body>
</html>