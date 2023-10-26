<?php 
require_once("config/class.func.cfg.php");


$dadosCad= filter_input_array(INPUT_POST,FILTER_DEFAULT);



$query = new SQL();

$qr=$query->conn->prepare("INSERT INTO login (nome,login,password,loginlvl,status) VALUES (?,?,?,2,1)");
$qr->bindValue(1,$dadosCad['nomecad']);
$qr->bindValue(2,$dadosCad['logincad']);
$qr->bindValue(3,$dadosCad['senhacad']);

if($qr->execute()){
	die("<meta http-equiv='refresh' content='0.2 home.php?cad=ok'>");
}else{
	die("<meta http-equiv='refresh' content='0.2 home.php?cad=nook'>");
}

