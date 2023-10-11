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
<?php require_once("config/class.func.cfg.php");?>

<body>
	<nav class="nav-menu">
		<div class="div-menu">
			<ul>
				<a href="additem.php"><li><h4>Adicionar Item</h4></li></a>
				<a href="view.php"><li><h4>Lista de Items</h4></li></a>
				<a href="index.php"><li><h4>Pesquisar Item</h4></li></a>
				<a href="additem.php"><li><h4>Items a vencer</h4></li></a>		
			</ul>
		</div>			
	</nav>	
	<div class="container-cad">
	
<?php
if(!empty($_GET['cod'])){
$cod=$_GET['cod'];
	$qt=new SQL();
	$q1=$qt->conn->prepare("SELECT * FROM produtos WHERE cod=$cod");
	$q1->execute();
	$result=$q1->fetch();	
}
	?>
	<form action="" method="GET">
		<input type="text" name="nomeItem"  class="form-input form-input-text"placeholder="Nome" value="<?= $result['nome']?>" readonly>
		<label class="form-input-outro">Vencimento:</label>
		<input type="date" name="datavencimentoItem" class="form-input form-input-outro" placeholder="Data de vencimento" value="<?= $result['dataVencimento']?>" readonly>
		<label class="form-input-outro">Quantidade Atual:</label>
		<input type="number" name="quantidadeat" class="form-input form-input-outro" placeholder="
		Quantidade" value="<?= $result['quantidade']?>" readonly>
		
		<label class="form-input-outro">Quantidade:</label>
			<input type="number" name="quantidade" class="form-input form-input-outro" placeholder="
		Quantidade" min="0" max="1000">
		
		<input type="number" name="cod" value="<?= $result['cod']?>" hidden>
		<button class="btn btn-primary" type="submit" value="Adicionar" name="enviar"><i class='bi bi-plus-lg'></i> Adicionar</button>
		<button class="btn btn-danger" type="submit" value="Retirar" name="enviar"><i class='bi bi-dash-lg'></i> Retirar</button>

	</form>

	
	</div>
<?php 

if(!empty($_GET['enviar']) && strcmp($_GET['enviar'],"Adicionar")==0){
	$qtd=$_GET['quantidade'];	
	$cod=$_GET['cod'];
	$qt=new SQL();
	$q1=$qt->conn->prepare("UPDATE produtos SET quantidade=quantidade+? WHERE cod=?");

	$q1->bindvalue(1,$qtd);
	$q1->bindvalue(2,$cod);
	$q1->execute();
}
if(!empty($_GET['enviar']) && strcmp($_GET['enviar'],"Retirar")==0){
	$qtd=$_GET['quantidade'];
	$qtd1=$_GET['quantidadeat'];
	$cod=$_GET['cod'];
	if($qtd>$qtd1){
		echo "Erro sem saldo suficiente";
		header("location: index.php");
		die();
	}
	$qt=new SQL();
	$q1=$qt->conn->prepare("UPDATE produtos SET quantidade=quantidade-? WHERE cod=?");

	$q1->bindvalue(1,$qtd);
	$q1->bindvalue(2,$cod);
	$q1->execute();
}
 ?>
	

</body>
</html>