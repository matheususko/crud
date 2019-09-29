<?php 
//para usar em casa
	/*$sn = "69.162.69.19";
	$pr = "3306";
	$pass = "cep2019+";
	$db = "esporte2_aula_banco";
	$user = "esporte2_mat";
*/
//para usar no curso
	
	$sn = "localhost";
	$pass = "";
	$db = "bancos";
	$user = "root";
	
	try {
		//para usar em casa
		
		//$conn = new PDO("mysql:host=$sn;port=$pr;dbname=$db;",$user,$pass);

		//para usar no curso

		$conn = new PDO("mysql:host=$sn;dbname=$db;",$user,$pass);

	} catch (Exception $e) {

		echo $e->getMessage();
		
	}
 ?>