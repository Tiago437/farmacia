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


$q1= new SQL();

$q2=$q1->conn->prepare("SELECT cod,nome,quantidade,date_format(dataVencimento,'%d/%m/%Y') AS dataVencimento,datediff(dataVencimento,CURDATE()) AS diasRestantes,tipo,descricao FROM produtos order by diasRestantes asc;");
$q2->execute();

$result=$q2->fetchall();
?>
<div class="container">
<table class="table table-bordered">
	<thead>
	<tr>
		<th width="40px">Codigo</th>
		<th width="300px"><center>Nome</center></th>
		<th width="80px">Quantidade</th>
		<th width="200px">Embalagem</th>
		<th width="200px">Data de Vencimento</th>
		<th width="200px">Descrição/Observação</th>
		<th width="200px">Dias restantes</th>
		<th width="200px">Opções</th>
	</tr>
	</thead>
	<tbody>
	
<?php	

foreach ($result as $key => $value) {
	if($value['diasRestantes']<=5){
		$cor='red';
		$corletra='white';
	}else{
		$corletra='black';
		$cor='white';
	}
	echo "<tr style='background-color:".$cor.";color:".$corletra."'><td>".$value['cod']."</td><td>".$value['nome']."</td><td>".$value['quantidade']."</td><td>".$value['tipo']."</td><td>".$value['dataVencimento']."</td><td>".$value['descricao']."</td><td>".$value['diasRestantes']."</td><td> <a href=att.php?cod=".$value['cod']."><button class='but btn-success' title='Vizualizar'><i class='bi bi-search'></i> </button></a>  <a href=editar.php?edit=".$value['cod']."><button class='but btn-secondary' title='Editar'><i class='bi bi-pencil-square'></i></button></a> <a href=view.php?del=".$value['cod']." ><button class='but btn-danger' title='Excluir'><i class='bi bi-trash'></i></button></a></td></tr>";
}
if(isset($_GET['del'])){

	$coddel=$_GET['del'];
	$q3=$q1->conn->prepare("DELETE FROM produtos WHERE cod=?");
	$q3->bindvalue(1,$coddel);
	$q3->execute();
header("location: index.php");
}
?>
</tbody>
</table>
</div>

</body>
</html>