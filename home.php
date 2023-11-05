<?php 
session_start();
require_once('config/class.func.cfg.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	
	<!-- bootstrap 5.3.2 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<script src="style/sweetalert.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="style/css.css" type="text/css">
</head>

<body>
  <?php 
require_once("config/menu.php");
 ?>
<?php 
if(isset($_GET['alter'])){
  if($_GET['alter']==1){
  echo "<script>
 Swal.fire({
  position: 'top',
  icon: 'success',
  title: 'Senha alterada com sucesso!',
  showConfirmButton: false,
  timer: 1500
})

</script>";
}else{
  echo "<script>
 Swal.fire({
  position: 'top',
  icon: 'error',
  title: 'Erro não foi possivel alterar a senha!',
  showConfirmButton: false,
  timer: 1500
})
</script>";
}

unset($_GET['alter']);
echo "<meta http-equiv='refresh' content='2 home.php'>";


}

if(isset($_GET['cad'])){

	if(strcmp($_GET['cad'],'ok')==0){
	echo "<script>
 Swal.fire({
  position: 'top',
  icon: 'success',
  title: 'Cadastro realizado com sucesso!',
  showConfirmButton: false,
  timer: 1500
})

</script>";}

if(strcmp($_GET['cad'],'ok')!=0){
	echo "<script>
 Swal.fire({
  position: 'top',
  icon: 'error',
  title: 'Erro cadastro não realizado!',
  showConfirmButton: false,
  timer: 1500
})

</script>";}

}

 ?>

 <?php 
$q=new SQL();

$c1=$q->conn->prepare("SELECT COUNT(*) AS cnt FROM PRODUTOS WHERE MONTH(dataCadastro)=MONTH(CURDATE())");
$c1->execute();
$r=$c1->fetch();

$c2=$q->conn->prepare("SELECT COUNT(*) AS cnt FROM relatorio WHERE tipo='Adicionado' AND MONTH(data)=MONTH(CURDATE())");
$c2->execute();
$r1=$c2->fetch();

$c3=$q->conn->prepare("SELECT COUNT(*) AS cnt FROM relatorio WHERE tipo='Retirado' AND MONTH(data)=MONTH(CURDATE())");
$c3->execute();
$r2=$c3->fetch();

$c4=$q->conn->prepare("SELECT COUNT(*) AS cnt FROM produtos WHERE datediff(dataVencimento,CURDATE()) <= 5");
$c4->execute();
$r3=$c4->fetch();

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
        <a href="home.php" class="nav-link active" aria-current="page">
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
        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalSair">Sair</a></li>
      </ul>
    </div>
    </div>

  </div>
</nav>

<!-- fim menu responsivo -->
  <div class="sidebar-menu d-flex flex-column flex-shrink-0 p-3 text-bg-dark vh-100">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Sistema GFarm</span> <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="home.php" class="nav-link active" aria-current="page">
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
        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalSair">Sair</a></li>
      </ul>
    </div>
  </div>


  <div class="b-example-divider b-example-vr"></div>
  <div class="container vh-100 home d-flex align-items-center flex-column">
  		<h2 class="mt-3">Estatisticas do Mês</h2>
  <div class="top-box d-flex justify-content-evenly align-items-center w-100">
  	
  	<a href="view.php" class="text-decoration-none"><div class="box box1 d-flex justify-content-center align-items-center text-bg-success"><p><?=$r['cnt']?></p></div></a>
  	
  	<a href="view.php?tipor=mes&mov=1&mensal=10&relatorio=enviar&cod&diario&anual" class="text-decoration-none"><div class="box box2 d-flex flex-column justify-content-center align-items-center text-bg-primary"><p><?=$r1['cnt']?></p>
  	</div></a>


  	<a href="view.php?tipor=mes&mov=2&mensal=10&relatorio=enviar&cod&diario&anual" class="text-decoration-none"><div class="box box3 d-flex flex-column justify-content-center align-items-center text-bg-warning"><p><?=$r2['cnt']?></p>
  </div></a>
  	<a href="itemvenc.php" class="text-decoration-none"><div class="box box4 d-flex justify-content-center align-items-center text-bg-danger"><p><?=$r3['cnt']?></p></div></a>
  </div>
  <div class="d-flex flex-row justify-content-center" id="grafico1">
  <canvas id="grafico">
  	
  </canvas>
  </div>

  </div>

</main>
</body>
<script>
  const ctx = document.getElementById('grafico');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Produtos Cadastrados', 'Entrada de Produtos', 'Saida Produtos', 'Proximos do Vencimento'],
      datasets: [{
        label: '# Items',
        data: [<?=$r['cnt']?>, <?=$r1['cnt']?>, <?=$r2['cnt']?>, <?=$r3['cnt']?>],
         backgroundColor: [
      'rgba(25, 135, 84, 0.5)',
      'rgba(13, 110, 253, 0.5)',
      'rgba(255, 193, 7, 0.5)',
      'rgba(220, 53, 69, 0.5)'   
    ],
    borderColor: [
      'rgb(25, 135, 84)',
      'rgb(255, 159, 64)',
      'rgb(255, 193, 7)',
      'rgb(220, 53, 69)',    
    ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>