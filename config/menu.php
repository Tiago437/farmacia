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
  <link rel="stylesheet" href="style/css.css" type="text/css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>
<body>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Relatório Geral de Items</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="GET" class="itens-form">    
    
    <label for="dia">Diário</label>
    <input type="radio" name="tipor" value="dia" id="dia" onclick="showdia(1)" required>
    <label for="mes">Mensal</label>
    <input type="radio" name="tipor" value="mes" id="mes" onclick="showdia(2)" required>  
    
    <label for="ano">Anual</label>
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
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
          <button type="submit" name="relatorio" class="btn btn-primary" value="enviar"><i class="bi bi-list-ol"></i> Gerar Relatório</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL CADASTRO DE CONTA -->
<div class="modal fade" id="modalCaduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Conta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="caduser.php" method="POST" class="itens-form">    
    <div class="form-floating mb-2 ">
    
    <input type="text" name="nomecad" id="nomecad" class="form-control" required>
    <label for="nomecad">Nome:</label>
    </div>
    <div class="form-floating mb-2">
  
    <input type="text" name="logincad"  id="logincad" class="form-control" required>  
      <label for="logincad">ID de acesso:</label>
    </div>
    <div class="form-floating"> 
    <input type="password" name="senhacad" class="form-control" id="senhacad" required>
    <label for="senhacad">Senha</label>
    </div>
  
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
          <button type="submit" name="caduser" class="btn btn-primary" value="enviar">Cadastrar</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- modal sair -->
<div class="modal fade" id="modalSair" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sair da conta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">    
  <p>Deseja realmente sair da conta?</p>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a href="login.php?sair=ok" class="text-decoration-none"><button class="btn btn-danger">Sair</button></a>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- fim modal sair -->
<!-- modal alterar dados -->

<div class="modal fade" id="modalAlter" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Alterar senha da Conta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="caduser.php" method="POST" class="itens-form">    
    <div class="form-floating mb-2 ">
    
    <input type="text" name="nomecad" id="nomecad" value="<?=$_SESSION['nome']?>" class="form-control" disabled>
    <label for="nomecad">Nome:</label>
    </div>
    <div class="form-floating mb-2">
  
    <input type="text" name="novoLogin"  id="logincad" class="form-control" value="<?=$_SESSION['login']?>" readonly>  
      <label for="logincad">ID de acesso:</label>
    </div>
    <div class="form-floating"> 
    <input type="password" name="novaSenha" class="form-control" id="senhacad" required>
    <label for="senhacad">Senha</label>
    </div>
  
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
          <button type="submit" name="caduser" class="btn btn-primary" value="alterarSenha">Alterar Senha</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Apagar item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">    
  <p>Deseja realmente Apagar esse item?</p>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a href="" id="deletar" class="text-decoration-none"><button class="btn btn-danger">Delete</button></a>
      </div>
      </form>
    </div>
  </div>
</div>



<?php 
if(!isset($_SESSION['login'])){
echo "<div class='container vh-100 d-flex flex-column align-items-center'>
  <h2 class='fw-normal p-4'> Erro: conta não existe! <a href='entrar.php'>clique aqui para entrar</a></h2>
</div></body></html>";
die();
}
 ?>
 </body>
</html>