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
	<title>Items proximo do vencimento</title>
	
	<!-- bootstrap 5.3.2 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="style/css.css" type="text/css">
</head>
<body>
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
        <a href="additem.php" class="nav-link active">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Adicionar Itens
        </a>
      </li>
      <li>
        <a href="view.php" class="nav-link  text-white">
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

  <h1 class="visually-hidden">Sidebars examples</h1>

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
        <a href="index.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Pesquisar Items
        </a>
      </li>
      <li>
        <a href="itemvenc.php" class="nav-link active">
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
<?php 

$q1= new SQL();

$q2=$q1->conn->prepare("SELECT cod,nome,quantidade,date_format(dataVencimento,'%d/%m/%Y') AS dataVencimento,datediff(dataVencimento,CURDATE()) AS diasRestantes,tipo,descricao FROM produtos order by diasRestantes asc");
$q2->execute();

$result=$q2->fetchall();
?>
<div class="container vh-100">
	<div class="top-venc mx-auto p-2">
		<h2 class="text-center">Items proximo ao vencimento</h2>
	</div>
	<div> 
<table class="table table-sm table-bordered">
	<thead>
	<tr>
		<th>Codigo</th>
		<th><center>Nome</center></th>
		<th>Quantidade</th>
		<th>Embalagem</th>
		<th>Data de Vencimento</th>
		<th id='desc'>Descrição/Observação</th>
		<th>Dias restantes</th>
		<th>Opções</th>
	</tr>
	</thead>
	<tbody>
	
<?php	

foreach ($result as $key => $value) {
	if($value['diasRestantes']<=5){
		$cor='table-danger';
		$corletra='white';
	}else{
		$cor='table-light';
	}
	echo "<tr class=".$cor."><td>".$value['cod']."</td><td>".$value['nome']."</td><td>".$value['quantidade']."</td><td>".$value['tipo']."</td><td>".$value['dataVencimento']."</td><td id='desc'>".$value['descricao']."</td><td>".$value['diasRestantes']."</td><td> <a href=att.php?cod=".$value['cod']."><button class='btn btn-success btn-sm' title='Vizualizar'><i class='bi bi-search'></i> </button></a> <a href=view.php?del=".$value['cod']." ><button class='btn btn-danger btn-sm' title='Excluir'><i class='bi bi-trash'></i></button></a></td></tr>";
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
</div>
</main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>