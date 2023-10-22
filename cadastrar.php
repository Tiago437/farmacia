<?php 

require_once("config/class.func.cfg.php");
$dados=filter_input_array(INPUT_POST,FILTER_DEFAULT);


if(empty($dados['nomeItem'])){
	$retorna =['status' => false, 'msg' => "Erro preencha o campo nome!"];
}else{
		$query= new SQL();
		$qt=$query->conn->prepare("INSERT INTO produtos (nome,quantidade,dataCadastro,dataVencimento,tipo,descricao) VALUES (?,?,CURDATE(),?,?,?)");
		$qt->bindvalue(1,$dados['nomeItem']);
		$qt->bindvalue(2,$dados['quantidade']);
		$qt->bindvalue(3,$dados['datavencimentoItem']);
		$qt->bindvalue(4,$dados['tipoItem']);
		$qt->bindvalue(5,$dados['descItem']);
		$qt->execute();	

if($qt->rowCount()){
$retorna =['status' => true, 'msg' => "Item cadastrado com sucesso!"];
}
}
echo json_encode($retorna);
 ?>