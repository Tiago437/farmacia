<?php 
session_start();
require_once('config/class.func.cfg.php');
require_once("config/menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Visualizar Items</title>
	
	<!-- bootstrap 5.3.2 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<!-- sweetalert -->
	<script src="style/sweetalert.js"></script>
	<!-- funções -->

	<link rel="stylesheet" href="style/css.css" type="text/css">

</head>

<body id="body"> 
<?php 
require_once("config/menu.php");
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
        <a href="view.php" class="nav-link active">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Lista de Items
        </a>
      </li>
      <li>
        <a href="index.php" class="nav-link text-white">
         <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg> 
          Pesquisar Items
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
      <hr>
        <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?=$_SESSION['nome']?></strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        
         <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalAlter">Alterar dados</a></li>
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalCaduser">Cadastrar conta</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalSair">Sair</a></li>
      </ul>
    </div>
    </div>

  </div>
</nav>
<!-- fim menu responsivo -->

  <div class="sidebar-menu d-flex flex-column flex-shrink-0 p-3 text-bg-dark">
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
        <a href="view.php" class="nav-link active">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Lista de Items
        </a>
      </li>
      <li>
        <a href="index.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Pesquisar Items
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
        
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalAlter">Alterar dados</a></li>
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalCaduser">Cadastrar conta</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalSair">Sair</a></li>
      </ul>
    </div>
  </div>

  <div class="b-example-divider b-example-vr"></div>

	<div class="container vh-100">

	<div class="d-grid gap-1 d-md-flex justify-content-md-end mt-2">
	<button type="button" class="btn btn-warning" onclick="window.print()">Imprimir</button>
<button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-list-ol"></i> Relatório
</button>

</div>
<hr>

<?php
$cnt=1;

if(!empty($_GET['relatorio']) && !empty($_GET['tipor'])){
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
<th>Quantidade</th>
<th>Data </th>
<th>Ação</th>	
<th>User</th>
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
	$car='Diário';
	$qt1=$qt->conn->prepare("SELECT cod,nome,qtdanterior,qtd,date_format(data,'%d/%m/%Y %H:%i') AS data,tipo,user FROM relatorio where data='$dia' AND $mov");
}
if(strcmp($tipo,"mes")==0){
	$car='Mensal';
	$qt1=$qt->conn->prepare("SELECT cod,nome,qtdanterior,qtd,date_format(data,'%d/%m/%Y %H:%i') AS data,tipo,user FROM relatorio where MONTH(data)=$mes AND $mov");
}
if(strcmp($tipo,"ano")==0){
	$car='Anual';
	$qt1=$qt->conn->prepare("SELECT cod,nome,qtdanterior,qtd,date_format(data,'%d/%m/%Y %H:%i') AS data,tipo,user FROM relatorio where YEAR(data)=$ano AND $mov");
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
if(!empty($_GET['relatorio']))
	goto fim;
if(!empty($_GET['page'])){
$pageinit=filter_input(INPUT_GET,"page",FILTER_SANITIZE_NUMBER_INT);
if(!$pageinit){
  $pageinit=1;
}
}else{
  $pageinit=1;
}

$limitepg=12;

$offset=$pageinit*$limitepg-$limitepg;



$q1= new SQL();

$query1=$q1->conn->prepare("SELECT COUNT(cod) AS totresult FROM produtos");
$query1->execute();

$totres=$query1->fetch();

$totpg=ceil($totres['totresult']/$limitepg);


$q2=$q1->conn->prepare("SELECT cod,nome,quantidade,date_format(dataVencimento,'%d/%m/%Y') AS dataVencimento,tipo,descricao FROM produtos LIMIT $limitepg OFFSET $offset");
$q2->execute();

$result=$q2->fetchall();
?>
<table class="table table-sm table-bordered">
	<thead>
	<tr>
		<th>Codigo</th>
		<th><center>Nome</center></th>
		<th>Quantidade</th>
		<th>Embalagem</th>
		<th>Data de Vencimento</th>
		<th id="desc">Descrição/Observação</th>
		<th>Opções</th>
	</tr>
	</thead>
	<tbody>
	
<?php	

foreach ($result as $key => $value) {
	echo "<tr><td>".$value['cod']."</td><td>".$value['nome']."</td><td>".$value['quantidade']."</td><td>".$value['tipo']."</td><td>".$value['dataVencimento']."</td><td id='desc'>".$value['descricao']."</td><td> <a href=editar.php?edit=".$value['cod']."><button class='btn btn-secondary btn-sm' title='Editar'><i class='bi bi-pencil-square'></i></button></a> <a href=view.php?del=".$value['cod']." data-bs-toggle='modal' data-bs-target='#modalDelete' id='del'><button class='btn btn-danger btn-sm' title='Excluir'><i class='bi bi-trash'></i></button></a></td></tr>";
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

<nav aria-label="..." <?php if(!isset($pageinit)){echo "hidden";}?> >
  <ul class="pagination">
    <li class="page-item <?php if($pageinit==1){echo"disabled";}?>">
      <a class="page-link" <?php if($pageinit>1){echo "href=view.php?page=".($pageinit-1)."";}?>>Anterior</a>
    </li>
    <?php if($pageinit>1){
 echo "<li class='page-item'><a class='page-link' href=view.php?page=".($pageinit-1).">".($pageinit-1)."</a></li>";
}

?>

    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#"><?=$pageinit?></a>
    </li>

    <?php 
    if($pageinit<$totpg){
      echo "
    <li class='page-item'><a class='page-link' href=view.php?page=".($pageinit+1).">".($pageinit+1)."</a></li>
    <li class='page-item'>
      <a class='page-link' href=view.php?page=".($pageinit+1).">Proxima</a>
    </li>";}
    ?>
  </ul>
</nav>
</div>
</main>
</body>

  <script src="style/func.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>