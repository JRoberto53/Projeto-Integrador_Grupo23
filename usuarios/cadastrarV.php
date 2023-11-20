<?php
require_once('../connections/config.php');
require_once('../connections/mssql_con.php'); 
header('Content-type: text/html; charset=utf-8');
$existe = 0;
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
	$cordial = (isset($_POST['usu_cordial'])) ? utf8_decode($_POST['usu_cordial']) : ''; 
	$email = (isset($_POST['usu_email'])) ? utf8_decode($_POST['usu_email']) : ''; 
	$senha = (isset($_POST['usu_senha'])) ? utf8_decode($_POST['usu_senha']) : '';
	$tipo = (isset($_POST['usu_tipo'])) ? utf8_decode($_POST['usu_tipo']) : '';

	$sql = "SELECT * FROM dbo.usu_usuario WHERE usu_email='".$email."'";
	$stmt = sqlsrv_query( $conn, $sql );
	//$count = sqlsrv_num_rows($stmt); 
		 
	 if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
		 header('Location:../?pg=ERRO');
	} else {
	
	
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	switch ($row["usu_email"]) {
		case $email:
			$existe = 1;
			$_SESSION['DBERRO'] = "DB_001";
			echo "teste xxxxxxxxxxxxx".$_SESSION['DBERRO'];
			header('Location:../?pg=cadastro');
			break;
	}
	}
	 
	 
if($existe == 0){	 

$sql = "INSERT INTO usu_usuario (usu_cordial, usu_email, usu_senha, usu_tipo)
VALUES ('".$cordial."','".$email."', '".$senha."', '".$tipo."')";

$stmt = sqlsrv_query( $conn, $sql);

	if( $stmt === false ) {
	die( print_r( sqlsrv_errors(), true));
	} else {
			$_SESSION['DBERRO'] = "DB_002";
			echo "teste xxxxxxxxxxxxx".$_SESSION['DBERRO'].$_SESSION['usu_email'];
			header('Location:../?pg=cadastro');
			}
	}
	 }
		 sqlsrv_close($conn);
 }
?>