<?php 
require_once('config/class.func.cfg.php');


$qt=new SQL();

$entrada='medicamento';

for($i=0;$i<40;$i++){
$remedio=str_shuffle($entrada);
$q1=$qt->conn->prepare("INSERT INTO produtos (nome,quantidade,dataCadastro,dataVencimento,tipo,descricao) VALUES ('$remedio',500,NOW(),'2023-11-08','Caixa','prateleira 3')");
$q1->execute();
if($i==200){
	break;
	echo "fim";
}


}