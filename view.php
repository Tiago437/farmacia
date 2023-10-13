<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Visualizar Items</title>
	<link rel="stylesheet" href="style/css.css" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


	
	<script src="style/sweetalert.js"></script>
	<script src="style/func.js"></script>
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


	<form action="" method="GET">
		<label for="tipor" class="form-label"><h5>Relatório Geral de Items:</h5></label>
		
		<label for="">Diário</label>
		<input type="radio" name="tipor" value="dia" id="dia" onclick="showdia(1)" required>
		<label for="">Mensal</label>
		<input type="radio" name="tipor" value="mes" id="mes" onclick="showdia(2)" required>  
		
		<label for="">Anual</label>
		<input type="radio" name="tipor" value="ano" id="ano" onclick="showdia(3)" required><br>
		<select name="mov" id="">
	    <option value="0">Geral</option>
	    <option value="1">Entrada</option>
		<option value="2">Saida</option>
	    </select>

		<br>
		<br>
		<input type="date" name="diario" id="diario" hidden>
		<select name="mensal" id="mensal" hidden>
			<option value="1">Janeiro</option>
			<option value="2">Fevereiro</option>
			<option value="3">Março</option>
			<option value="4">Abril</option>
			<option value="5">Maio</option>
			<option value="6">Junho</option>
			<option value="7">Julho</option>
			<option value="8">Agosto</option>
			<option value="9">Setembro</option>
			<option value="10">Outubro</option>
			<option value="11">Novembro</option>
			<option value="12">Dezembro</option>
		</select>
		<select name="anual" id="anual" hidden>
			<option value="">Selecione o Ano</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option>
			<option value="2027">2027</option>
		</select>
		
		<input type="text" name="cod" value="<?=$cod?>" hidden>
		<button type="submit" name="relatorio" class="btn btn-primary" value="enviar"><i class="bi bi-list-ol"></i> Gerar Relatório</button>
	</form>
	<br>


<?php
require_once("config/class.func.cfg.php");
$cnt=1;

if(!empty($_GET['relatorio']) && !empty($_GET['tipor'])){
$cod1=$_GET['cod'];
$tipo=$_GET['tipor'];
$dia=$_GET['diario'];
$mes=$_GET['mensal'];
$ano=$_GET['anual'];
$mov=$_GET['mov'];

echo "	<table class='table table-bordered'>
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
<tbody>";
$qt=new SQL();
switch ($mov) {
	case 0:
		$mov='1=1';
		break;
	
	case 1:
		$mov="tipo='Adicionado'";
		break;
		case 2:
		$mov="tipo='Retirado'";
		break;
}
if(strcmp($tipo,"dia")==0){
	$qt1=$qt->conn->prepare("SELECT cod,nome,qtd,date_format(data,'%d/%m/%Y') AS data,tipo FROM relatorio where data='$dia' AND $mov");
}
if(strcmp($tipo,"mes")==0){
	$qt1=$qt->conn->prepare("SELECT cod,nome,qtd,date_format(data,'%d/%m/%Y') AS data,tipo FROM relatorio where MONTH(data)=$mes AND $mov");
}
if(strcmp($tipo,"ano")==0){
	$qt1=$qt->conn->prepare("SELECT cod,nome,qtd,date_format(data,'%d/%m/%Y') AS data,tipo FROM relatorio where YEAR(data)=$ano AND $mov");
}


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
if(!empty($_GET['relatorio']))
	goto fim;

$q1= new SQL();

$q2=$q1->conn->prepare("SELECT cod,nome,quantidade,date_format(dataVencimento,'%d/%m/%Y') AS dataVencimento,tipo,descricao FROM produtos");
$q2->execute();

$result=$q2->fetchall();
?>
<table class="table table-bordered">
	<thead>
	<tr>
		<th width="40px">Codigo</th>
		<th width="300px"><center>Nome</center></th>
		<th width="80px">Quantidade</th>
		<th width="200px">Embalagem</th>
		<th width="200px">Data de Vencimento</th>
		<th width="200px">Descrição/Observação</th>
		<th width="200px">Opções</th>
	</tr>
	</thead>
	<tbody>
	
<?php	

foreach ($result as $key => $value) {
	echo "<tr><td>".$value['cod']."</td><td>".$value['nome']."</td><td>".$value['quantidade']."</td><td>".$value['tipo']."</td><td>".$value['dataVencimento']."</td><td>".$value['descricao']."</td><td> <a href=editar.php?edit=".$value['cod']."><button class='but btn-secondary' title='Editar'><i class='bi bi-pencil-square'></i></button></a> <a href=view.php?del=".$value['cod']." ><button class='but btn-danger' title='Excluir'><i class='bi bi-trash'></i></button></a></td></tr>";
}
if(isset($_GET['del'])){

	$coddel=$_GET['del'];
	$q3=$q1->conn->prepare("DELETE FROM produtos WHERE cod=?");
	$q3->bindvalue(1,$coddel);
	$q3->execute();
	unset($_GET);
echo"<meta http-equiv='refresh' content='0.5 view.php'>";
}
fim:
?>
</tbody>
</table>
</div>

</body>
</html>