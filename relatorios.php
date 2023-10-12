<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Items proximo do vencimento</title>
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
$cod=$_GET['cod'];


?>
<div class="container">

	<form action="" method="GET">
		<label for="tipor" class="form-label"><h4>Tipo de relatório:</h4></label>
	
		<label for="">Diário</label>
		<input type="radio" name="tipor" value="dia">
		<label for="">Mensal</label>
		<input type="radio" name="tipor" value="mes">  
		<label for="">Anual</label>
		<input type="radio" name="tipor" value="ano"><br>
	
		<hr>
		<input type="text" name="cod" value="<?=$cod?>" hidden>
		<button type="submit" name="relatorio" class="btn btn-primary" value="enviar"><i class="bi bi-list-ol"></i> Gerar Relatório</button>
	</form>
<br>

<table class="table table-bordered">
<thead>
	<tr>
		<th>#</th>
<th>Codigo</th>
<th>Nome</th>
<th>Quantidade</th>
<th>Data</th>
<th>Ação</th>	
</tr>
</thead>
<tbody>
<?php 
$cnt=1;
if(!empty($_GET['relatorio']) && strcmp($_GET['tipor'],"dia")==0){
$cod1=$_GET['cod'];
$tipo=$_GET['tipor'];


$qt=new SQL();
$qt1=$qt->conn->prepare("SELECT cod,nome,qtd,date_format(data,'%d/%m/%Y') AS data,tipo FROM relatorio where data=CURDATE() AND cod=$cod1");
$qt1->execute();
$result=$qt1->fetchall();
echo "<h4>Diário</h4>";
foreach ($result as $key => $relat) {
	echo "<tr>";
	 echo "<td>".$cnt++."</td>";
	echo "<td>".$relat['cod']."</td>";
	echo "<td>".$relat['nome']."</td>";
	echo "<td>".$relat['qtd']."</td>";
	echo "<td>".$relat['data']."</td>";
	echo "<td>".$relat['tipo']."</td>";
	echo "</tr>";
}

}
if(!empty($_GET['relatorio']) && strcmp($_GET['tipor'],"mes")==0){
$cod1=$_GET['cod'];
$tipo=$_GET['tipor'];


$qt=new SQL();
$qt1=$qt->conn->prepare("SELECT cod,nome,qtd,date_format(data,'%d/%m/%Y') AS data,tipo FROM relatorio where MONTH(CURDATE())= MONTH(data) AND cod=$cod1 ORDER BY data ASC");
$qt1->execute();
$result=$qt1->fetchall();
echo "<h4>Mensal</h4>";
foreach ($result as $key => $relat) {

	echo "<tr>";
	echo "<td>".$cnt++."</td>";
	echo "<td>".$relat['cod']."</td>";
	echo "<td>".$relat['nome']."</td>";
	echo "<td>".$relat['qtd']."</td>";
	echo "<td>".$relat['data']."</td>";
	echo "<td>".$relat['tipo']."</td>";
	echo "</tr>";
}

}
if(!empty($_GET['relatorio']) && strcmp($_GET['tipor'],"ano")==0){
$cod1=$_GET['cod'];
$tipo=$_GET['tipor'];


$qt=new SQL();
$qt1=$qt->conn->prepare("SELECT cod,nome,qtd,date_format(data,'%d/%m/%Y') AS data,tipo FROM relatorio where YEAR(CURDATE()) = YEAR(data) AND cod=$cod1 ORDER BY data ASC");
$qt1->execute();
$result=$qt1->fetchall();
echo "<h4>Anual</h4>";
foreach ($result as $key => $relat) {
	echo "<tr>";
	echo "<td>".$cnt++."</td>";
	echo "<td>".$relat['cod']."</td>";
	echo "<td>".$relat['nome']."</td>";
	echo "<td>".$relat['qtd']."</td>";
	echo "<td>".$relat['data']."</td>";
	echo "<td>".$relat['tipo']."</td>";
	echo "</tr>";
}

}
?>
</tbody>
</table>
</div>
</body>
</html>