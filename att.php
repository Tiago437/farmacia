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
        <a href="additem.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Adicionar Itens
        </a>
      </li>
      <li>
        <a href="view.php" class="nav-link text-white ">
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
        <a href="view.php" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Lista de Items
        </a>
      </li>
      <li>
        <a href="index.php" class="nav-link active">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Pesquisar Items > Atualizar
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
	
<?php
if(!empty($_GET['cod'])){
$cod=$_GET['cod'];
	$qt=new SQL();
	$q1=$qt->conn->prepare("SELECT * FROM produtos WHERE cod=$cod");
	$q1->execute();
	$result=$q1->fetch();	
}
	?>
<div class="d-flex align-items-center justify-content-center">
	<form action="" method="GET" class="col-sm-6 mt-5 p-2">
		<div class="row">
		<div class="col mb-2">			
		<label for="nome">Nome:</label>	
		</div>
		<div class="col mb-2">
		<input type="text" name="nomeItem"  class="form-control form-input-text"placeholder="Nome" value="<?= $result['nome']?>" id="nome" readonly>	</div>	
		</div>
		<div class="row">
			<div class="col mb-2">
		<label class="form-label" for="datav">Vencimento:</label>
		</div>
		<div class="col mb-2">
		
		<input type="date" id="datav" name="datavencimentoItem" class="form-control form-input-outro" placeholder="Data de vencimento" value="<?= $result['dataVencimento']?>" readonly>
		</div>
		</div>
	
		<div class="row">
			<div class="col mb-2">
		<label for="qtdat">Quantidade Atual:</label>
	</div>
	<div class="col mb-2">	
		<input type="number" name="quantidadeat" class="form-control form-input-outro" placeholder="
		Quantidade" value="<?= $result['quantidade']?>" id="qtdat" readonly>
		</div>
		</div>
		<div class="row">
			<div class="col mb-2">
		<label class="form-label" for="qtd">Quantidade:</label>
		</div>
		<div class="col mb-2">
			<input type="number" name="quantidade" class="form-control form-input-outro" placeholder="
		Quantidade" min="0" max="1000" id="qtd">
		</div>
		</div>
		
		<input type="number" name="cod" value="<?= $result['cod']?>" hidden>
		<button class="btn btn-primary" type="submit" value="Adicionar" name="enviar"><i class='bi bi-plus-lg'></i> Adicionar</button>
		<button class="btn btn-danger" type="submit" value="Retirar" name="enviar"><i class='bi bi-dash-lg'></i> Retirar</button>

	</form>
</div>
	
	
<?php 

if(!empty($_GET['enviar'])){
  $qtdat=$_GET['quantidadeat']; 
	$qtd=$_GET['quantidade'];	
	$cod=$_GET['cod'];

  if($qtd>1000){
    echo "<h5 class='text-danger'>Erro: quantidade acima do permitido!</h5>";
    die("<meta http-equiv='refresh' content='2 att.php?cod=".$cod."'>");
  }

  if($qtdat<$qtd && strcmp($_GET['enviar'],"Retirar")==0){
    echo "<h5 class='text-danger'>Erro saldo insuficiente!</h5>";
    die("<meta http-equiv='refresh' content='2 att.php?cod=".$cod."'>");
  }

	$qt=new SQL();
	
  if(strcmp($_GET['enviar'],"Adicionar")==0){    
    $tipo="Adicionado";
      $queryupdt="UPDATE produtos SET quantidade=quantidade+? WHERE cod=?";
  }
  if(strcmp($_GET['enviar'],"Retirar")==0){    
    $tipo="Retirado";
    $queryupdt="UPDATE produtos SET quantidade=quantidade-? WHERE cod=?";
  }

	$q2=$qt->conn->prepare("INSERT INTO relatorio (cod,nome,qtdanterior,qtd,data,tipo,user) SELECT cod,nome,quantidade,?,NOW(),?,? from produtos WHERE cod=?");

	$q2->bindvalue(1,$qtd);
	$q2->bindvalue(2,$tipo);
	$q2->bindvalue(4,$cod);
  $q2->bindvalue(3,$_SESSION['nome']);
	
	$q2->execute();

	$q1=$qt->conn->prepare($queryupdt);

	$q1->bindvalue(1,$qtd);
	$q1->bindvalue(2,$cod);
	$q1->execute();
	echo "<meta http-equiv='refresh' content='0.5 att.php?cod=".$cod."'>";
}

 ?>
	</div>
</main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>