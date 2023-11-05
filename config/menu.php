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
    <input type="text" name="cod" value="<?=$cod?>" hidden>
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


<!-- relatorio individual modal -->
<div class="modal fade" id="modalrelatorioI" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Relatório individual:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
<form action="relatorios.php" method="GET">
    
    <div class="col mt-2">
    <label for="dia">Diário</label>
    <input type="radio" name="tipor" value="dia" id="diaI" onclick="showdia(1)" required>
    <label for="mes">Mensal</label>
    <input type="radio" name="tipor" value="mes" id="mesI" onclick="showdia(2)" required>  
    
    <label for="ano">Anual</label>
    <input type="radio" name="tipor" value="ano" id="anoI" onclick="showdia(3)" required>
    
    </div>
    <div class="row">
      <div class="col">
    <select name="mov" id="">
      <option value="0">Geral</option>
      <option value="1">Entrada</option>
    <option value="2">Saida</option>
      </select>

    <input type="date" name="diario" id="diariori" hidden>
    
    <select name="mensal" id="mensalri" hidden>
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
    <select name="anual" id="anualri" hidden>
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
    <input type="text" name="cod" id="cod" value="" hidden>
  
    </div>
   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" name="relatorio" class="btn btn-primary" value="enviar"><i class="bi bi-list-ol"></i> Gerar Relatório</button>
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
