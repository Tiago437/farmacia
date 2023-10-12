<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style/css.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
	<nav class="nav-menu">
		<div class="div-menu">
			<ul>
				<a href="additem.php"><li><h4>Adicionar Item</h4></li></a>
				<a href="view.php"><li><h4>Lista de Items</h4></li></a>
				<a href="index.php"><li><h4>Pesquisar Item</h4></li></a>
				<a href="itemvenc.php"><li><h4>Items a vencer</h4></li></a>		
			</ul>
		</div>			
	</nav>	
	<div class="container">
	<form action="" method="GET" style="width: 400px;margin: 0 0 0 20px">
		<div class="input-group">
  <input type="text" name="nomeItem" class="form-control" placeholder="Pesquisar Item" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button type="submit" value="enviar" name="enviar" class="btn btn-success"><i class="bi bi-search"></i></button>
</div>
	</form>
	<br>
	<table class="table table-bordered">
	<thead>
		<tr>
			<th>Codigo</th>
		<th>Nome</th>
		<th>Quantidade</th>
		<th>Data de Vencimento</th>		
		<th>Descrição/Observação</th>
		<th>Opções</th>
		</tr>
	</thead>
	<tbody>
<?php 

require_once("config/class.func.cfg.php");

if(!empty($_GET['enviar'])){
$nome=$_GET['nomeItem'];
	$qt=new SQL();
	$q1=$qt->conn->prepare("SELECT * FROM produtos WHERE nome like '$nome%'");
	$q1->execute();

	$result=$q1->fetchall();

	foreach ($result as $key => $campo) {
		echo "<tr><td>".$campo['cod']."</td><td>".$campo['nome']."</td><td>".$campo['quantidade']."</td><td>".$campo['dataVencimento']."</td><td>".$campo['descricao']."</td><td><a href=att.php?cod=".$campo['cod']."><button class='but btn-success' title='Vizualizar'><i class='bi bi-search'></i></button></a> <a href=editar.php?edit=".$campo['cod']."> <button class='but btn-secondary' title='Editar'><i class='bi bi-pencil-square'></i></button></a> <a href=view.php?del=".$campo['cod']."> <button class='but btn-danger' title='Excluir'><i class='bi bi-trash'></i></button></a> <a href=relatorios.php?cod=".$campo['cod']."><button class='but btn-warning' title='Relatório'><i class='bi bi-list-ol'></i></button></a></tr>";
	}
}

 ?>
</tbody>
 </table>
 </div>
</body>
</html>