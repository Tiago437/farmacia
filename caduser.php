<?php 
require_once("config/class.func.cfg.php");



$dadosCad= filter_input_array(INPUT_POST,FILTER_DEFAULT);


$query = new SQL();
if(strcmp($dadosCad['caduser'],"alterarSenha")===0){
echo "aqui";
	$q1=$query->conn->prepare("UPDATE login SET password=? WHERE login=?");
	$q1->bindValue(1,$dadosCad['novaSenha']);
	$q1->bindValue(2,$dadosCad['novoLogin']);
	$q1->execute();
	
	if($q1->rowCount()){
		header("location: home.php?alter=1");
	}else{
		header("location: home.php?alter=2");
	}
		

}



$qr=$query->conn->prepare("INSERT INTO login (nome,login,password,loginlvl,status) VALUES (?,?,?,2,1)");
$qr->bindValue(1,$dadosCad['nomecad']);
$qr->bindValue(2,$dadosCad['logincad']);
$qr->bindValue(3,$dadosCad['senhacad']);

if($qr->execute()){
	die("<meta http-equiv='refresh' content='0.2 home.php?cad=ok'>");
}else{
	die("<meta http-equiv='refresh' content='0.2 home.php?cad=nook'>");
}

