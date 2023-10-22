<?php 

date_default_timezone_set('America/Porto_Velho');

class SQL{
private $host="mysql:host=localhost;";
private $dbname="dbname=farmacia";
private $user="root";
private $pw="";

public $conn;

		function __construct(){	
		try{	
			$this->conn = new PDO($this->host.$this->dbname,$this->user,$this->pw);
		}catch(PDOException $e){

			echo "Erro".$e."<br>";

		}
	}



}
 ?>