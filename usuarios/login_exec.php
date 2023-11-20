<?php
require_once('../connections/config.php');
require_once('../connections/mssql_con.php'); 
header('Content-type: text/html; charset=utf-8');
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

 $email = (isset($_POST['usu_email'])) ? $_POST['usu_email'] : ''; 
 $senha = (isset($_POST['usu_senha'])) ? $_POST['usu_senha'] : ''; 
 $_SESSION["usu_cordial"] = "Sem Cadastro";

	$sql = "SELECT * FROM dbo.usu_usuario WHERE usu_email='".$email."' AND usu_senha='".$senha."'";
	$stmt = sqlsrv_query( $conn, $sql );
	//$count = sqlsrv_num_rows($stmt); 
		 
	 if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
		 header('Location:../?pg=login');
	} else {
	
	
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	$_SESSION["usu_id"] = $row["usu_id"];
	$_SESSION["usu_cordial"] = $row["usu_cordial"];
	$_SESSION["usu_foto"] = $row["usu_foto"];
	$_SESSION["usu_email"] = $row["usu_email"];
	$_SESSION["usu_tipo"] = $row["usu_tipo"];	
	switch ($row["usu_tipo"]){
		case 0:
			$_SESSION["usu_tipox"] = "Usuário";
			break;
		case 1:
			$_SESSION["usu_tipox"] = "Fornecedor";
			break;
		case 2:
			$_SESSION["usu_tipox"] = "Financeira";
			break;
		case 3:
			$_SESSION["usu_tipox"] = "Seguradora";
			break;
	}

	}
		 
	header('Location:../?pg=');
	 }
 }

	sqlsrv_free_stmt( $stmt);
	sqlsrv_close($conn); 

?>