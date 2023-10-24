<?php
session_start();
require_once("config/class.func.cfg.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Items proximo do vencimento</title>
		
	<!-- bootstrap 5.3.2 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<!-- sweetalert -->
	<script src="style/sweetalert.js"></script>
	<!-- funções -->
	<script src="style/func.js"></script>
	<!-- estilo css -->
	<link rel="stylesheet" href="style/css.css" type="text/css">
</head>

<body>
<?php 
if(!isset($_SESSION['login'])){
echo "<div class='container vh-100 d-flex flex-column align-items-center'>
  <h2 class='fw-normal p-4'> Erro: conta não existe! <a href='entrar.php'>clique aqui para entrar</a></h2>
</div></body></html>";
die();
}

 ?>

			<main class="d-flex flex-nowrap">
				<!-- inicio menu responsivo -->
<nav class="navbar navbar-dark bg-dark fixed-top d-none" id="menu-responsivo">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sistema GFarm</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-block offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
       <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Sistema GFarm</h5> 
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">       
              <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="home.php" class="nav-link text-white" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="additem.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Adicionar Itens
        </a>
      </li>
      <li>
        <a href="view.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Lista de Items
        </a>
      </li>
      <li>
        <a href="index.php" class="nav-link active">
         <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg> 
          Pesquisar Items > Relatório
        </a>

      </li>
      <li>
        <a href="itemvenc.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Items a vencer
        </a>
      </li>
    </ul>
          </li>
        </ul>       
      </div>
         <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?=$_SESSION['nome']?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        
        <li><a class="dropdown-item" href="#">Alterar dados</a></li>
        <li><a class="dropdown-item" href="#">Cadastrar conta</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="login.php?sair=ok">Sair</a></li>
      </ul>
    </div>
    </div>
  </div>
</nav>

<!-- fim menu responsivo -->
  <div class="sidebar-menu d-flex flex-column flex-shrink-0 p-3 text-bg-dark vh-100">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Sistema GFarm</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="home.php" class="nav-link text-white" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="additem.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Adicionar Itens
        </a>
      </li>
      <li>
        <a href="view.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Lista de Items
        </a>
      </li>
      <li>
        <a href="index.php" class="nav-link active">
         <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg> 
          Pesquisar Items > Relatório
        </a>

      </li>
      <li>
        <a href="itemvenc.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Items a vencer
        </a>
      </li>
    </ul>
    <hr> 
       <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?=$_SESSION['nome']?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        
        <li><a class="dropdown-item" href="#">Alterar dados</a></li>
        <li><a class="dropdown-item" href="#">Cadastrar conta</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="login.php?sair=ok">Sair</a></li>
      </ul>
    </div>
  </div>

  <div class="b-example-divider b-example-vr"></div>
<?php 

$cod=$_GET['cod'];
?>
<div class="container vh-100">
	<div class="row">
	<form action="" method="GET">
		<div class="col mt-2">
		<label for="tipor" class="form-label"><h5>Relatório individual:</h5></label>
		</div>
		<div class="col mt-2">
		<label for="">Diário</label>
		<input type="radio" name="tipor" value="dia" id="dia" onclick="showdia(1)" required>
		<label for="">Mensal</label>
		<input type="radio" name="tipor" value="mes" id="mes" onclick="showdia(2)" required>  
		
		<label for="">Anual</label>
		<input type="radio" name="tipor" value="ano" id="ano" onclick="showdia(3)" required>
		
		</div>
		<div class="row">
			<div class="col">
		<select name="mov" id="">
	    <option value="0">Geral</option>
	    <option value="1">Entrada</option>
		<option value="2">Saida</option>
	    </select>

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
		</div>
		</div>
		<div class="col mt-2">
		<input type="text" name="cod" value="<?=$cod?>" hidden>
		<button type="submit" name="relatorio" class="btn btn-primary" value="enviar"><i class="bi bi-list-ol"></i> Gerar Relatório</button>
		</div>
	</form>
	</div>
	<hr>	
<?php 
$cnt=1;

if(!empty($_GET['relatorio']) && !empty($_GET['tipor'])){
$cod1=$_GET['cod'];
$tipo=$_GET['tipor'];
$dia=$_GET['diario'];
$mes=$_GET['mensal'];
$ano=$_GET['anual'];
$mov=$_GET['mov'];

echo "	<table class='table table-sm table-bordered'>
<thead>
	<tr>
		<th>#</th>
<th>Codigo</th>
<th>Nome</th>
<th>QTD Anterior</th>
<th>QTD</th>
<th>Data</th>
<th>Ação</th>	
<th>User</th>
</tr>
</thead>
<tbody class='table-group-divider'>";
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
	$car='Diário';
	$qt1=$qt->conn->prepare("SELECT cod,nome,qtdanterior,qtd,date_format(data,'%d/%m/%Y %H:%i' ) AS data,tipo,user FROM relatorio where data='$dia' AND $mov AND cod=$cod1");
}
if(strcmp($tipo,"mes")==0){
	$car='Mensal';
	$qt1=$qt->conn->prepare("SELECT cod,nome,qtdanterior,qtd,date_format(data,'%d/%m/%Y %H:%i') AS data,tipo,user FROM relatorio where MONTH(data)=$mes AND $mov AND cod=$cod1");
}
if(strcmp($tipo,"ano")==0){
		$car='Anual';
	$qt1=$qt->conn->prepare("SELECT cod,nome,qtdanterior,qtd,date_format(data,'%d/%m/%Y %H:%i') AS data,tipo,user FROM relatorio where YEAR(data)=$ano AND $mov AND cod=$cod1");
}

$qt1->execute();
$result=$qt1->fetchall();
echo "<h4>".$car."</h4>";
foreach ($result as $key => $relat) {
	echo "<tr>";
	 echo "<td>".$cnt++."</td>";
	echo "<td>".$relat['cod']."</td>";
	echo "<td>".$relat['nome']."</td>";
	echo "<td>".$relat['qtdanterior']."</td>";
	echo "<td>".$relat['qtd']."</td>";
	echo "<td>".$relat['data']."</td>";
	echo "<td>".$relat['tipo']."</td>";
	echo "<td>".$relat['user']."</td>";
	echo "</tr>";
}


}
?>
</tbody>
</table>
</div>
</main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>