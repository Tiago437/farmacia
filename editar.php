<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Visualizar Items</title>
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
<?php 
require_once("config/class.func.cfg.php");

$cod=$_GET['edit'];
$cn=new SQL();
$query=$cn->conn->prepare("SELECT cod,nome,quantidade,dataVencimento,tipo,descricao FROM produtos where cod=?");
$query->bindvalue(1,$cod);
$query->execute();

$result=$query->fetch();

 ?>
<div class="container-cad">
	<form action="" method="POST">
		<input type="text" name="nomeItem"  class="form-input form-input-text"placeholder="Nome" value="<?= $result['nome']?>" required >
		<input type="date" name="datavencimentoItem" class="form-input form-input-outro" placeholder="Data de vencimento" value="<?= $result['dataVencimento']?>" required>
		<input type="number" name="quantidade" class="form-input form-input-outro" placeholder="
		Quantidade" value="<?= $result['quantidade']?>" required>
		<select name="tipoItem" class="form-input form-input-outro" value="<?= $result['tipo']?>" required>
			<option value="Caixa">Caixa</option>
			<option value="Unidade">Unidade</option>
			<option value="Gramas">Grama</option>			
		</select>
		<label class="form-label">Descrição/Observação:</label>
		<textarea rows="5" cols="75" class="form-input" name="desc" maxlength="450"><?= $result['descricao']?></textarea>
		<input type="number" name="cod" value="<?= $result['cod']?>" hidden>
		<button class="btn btn-primary" type="submit" value="enviar" name="enviar">Atualizar</button>

	</form>
	<?php
if(!empty($_POST['enviar'])){
		$nome=$_POST['nomeItem'];
		$quant=$_POST['quantidade'];
		$dataV= $_POST['datavencimentoItem'];//date("Y-m-d H:i:s");//
		$tipo=$_POST['tipoItem'];
		$cod1=$_POST['cod'];
		$desc=$_POST['desc'];

		$query = new SQL();
		$qt=$query->conn->prepare("UPDATE produtos SET nome=?,quantidade=?,dataVencimento=?,tipo=?,descricao=?  WHERE cod=?");
		$qt->bindvalue(1,$nome);
		$qt->bindvalue(2,$quant);
		$qt->bindvalue(3,$dataV);
		$qt->bindvalue(4,$tipo);
		$qt->bindvalue(5,$desc);
		$qt->bindvalue(6,$cod1);

		$qt->execute();
	
		header("location: view.php");
		 
	}
	?>
	</div>
</body>
</html>