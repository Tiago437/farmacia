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
<?php require_once("config/class.func.cfg.php");
 ?>
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
	<form action="additem.php" method="POST">
		
		<input type="text" name="nomeItem" placeholder="Nome" required class="form-input form-input-text">
			
		<input type="date" name="datavencimentoItem" placeholder="Data de vencimento" class="form-input form-input-outro" required>
		
	
		<input type="number" name="quantidade" placeholder="
		Quantidade" class="form-input form-input-outro" required>
		
		<select name="tipoItem" required class="form-input form-input-outro">
			<option value="Caixa">Caixa</option>
			<option value="Ampola">Ampola</option>
			<option value="Comprimido">Comprimido</option>	
			<option value="Frasco">Frasco</option>	
			<option value="Bisnaga">Bisnaga</option>	
			<option value="Lata">Lata</option>	
			<option value="Bolsa">Bolsa</option>			
		</select>
		<label class="form-label">Descrição/Observação:</label>
		<textarea rows="5" cols="75" class="form-input" name="descItem" maxlength="450">
			
		</textarea>
		
		<button type="submit" value="enviar" name="enviar" class="btn btn-primary">Cadastrar</button>
	</form>	
	</div>
	

	<?php 


	if(!empty($_POST['enviar'])){
		$nome=$_POST['nomeItem'];
		$quant=$_POST['quantidade'];
		$dataV= $_POST['datavencimentoItem'];
		$tipo=$_POST['tipoItem'];
		$desc=$_POST['descItem'];

		$query = new SQL();
		$qt=$query->conn->prepare("INSERT INTO produtos (nome,quantidade,dataVencimento,tipo,descricao) VALUES (?,?,?,?,?)");
		$qt->bindvalue(1,$nome);
		$qt->bindvalue(2,$quant);
		$qt->bindvalue(3,$dataV);
		$qt->bindvalue(4,$tipo);
		$qt->bindvalue(5,$desc);
		$qt->execute();
	
		header("location: additem.php");
		 
	}
	?>
</body>
</html>