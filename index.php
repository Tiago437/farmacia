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
	<title>Document</title>
	
		<!-- bootstrap 5.3.2 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<script src="style/sweetalert.js"></script>
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
	<main class="d-flex flex-nowrap">
  <div class="sidebar-menu d-flex flex-column flex-shrink-0 p-3 text-bg-dark vh-100">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"></svg>
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
        <li><a class="dropdown-item"  href="#" data-bs-toggle="modal" data-bs-target="#modalSair">Sair</a></li>
      </ul>
    </div>
  </div>

  <div class="b-example-divider b-example-vr"></div>
	<div class="container vh-100">
<div class="box-form d-flex align-items-center mt-4">
	<form action="" method="GET" style="width: 360px">
		<div class="input-group mb-3">
  <input type="text" name="nomeItem" class="form-control" placeholder="Pesquisar Item" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button type="submit" value="enviar" name="enviar" class="btn btn-success"><i class="bi bi-search"></i></button>
</div>
	</form>
	</div>
	
	<table class="table table-bordered">
	<thead>
		<tr>
			<th>Codigo</th>
		<th>Nome</th>
		<th>Quantidade</th>
		<th>Data de Vencimento</th>		
		<th id="desc">Descrição/Observação</th>
		<th>Opções</th>
		</tr>
	</thead>
	<tbody>
<?php
if(!empty($_GET['enviar'])){
$nome=$_GET['nomeItem'];
	$qt=new SQL();
	$q1=$qt->conn->prepare("SELECT * FROM produtos WHERE nome like '$nome%'");
	$q1->execute();

	$result=$q1->fetchall();

	foreach ($result as $key => $campo) {
		echo "<tr><td>".$campo['cod']."</td><td>".$campo['nome']."</td><td>".$campo['quantidade']."</td><td>".$campo['dataVencimento']."</td><td id='desc'>".$campo['descricao']."</td><td><a href=att.php?cod=".$campo['cod']."><button class='btn btn-success btn-sm' title='Vizualizar'><i class='bi bi-search'></i></button></a> <a href=editar.php?edit=".$campo['cod']."> <button class='btn btn-secondary btn-sm' title='Editar'><i class='bi bi-pencil-square'></i></button></a> <a href=view.php?del=".$campo['cod']." id='del' data-bs-toggle='modal' data-bs-target='#modalDelete'> <button class='btn btn-danger btn-sm' title='Excluir'><i class='bi bi-trash'></i></button></a> <a href=relatorios.php?cod=".$campo['cod']."><button class='btn btn-warning btn-sm' title='Relatório'><i class='bi bi-list-ol'></i></button></a></td></tr>";
	}
}

 ?>
</tbody>
 </table>
 </div>
</main>
</body>
  <script src="style/func.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>