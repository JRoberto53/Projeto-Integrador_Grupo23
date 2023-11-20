<?php
require_once('./connections/config.php');
require_once('./connections/mssql_con.php'); 
header('Content-type: text/html; charset=utf-8');

if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
}

$existe = 0;
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
$ser_usuid = (isset($_POST['ser_usuid'])) ? $_POST['ser_usuid'] : '' ;
$ser_num = (isset($_POST['ser_num'])) ? $_POST['ser_num'] : '' ;
$ser_local = (isset($_POST['ser_local'])) ? $_POST['ser_local'] : '' ;
$ser_totpessoa = (isset($_POST['ser_totpessoa'])) ? $_POST['ser_totpessoa'] : '' ;	 
$ser_m2 = (isset($_POST['ser_m2'])) ? $_POST['ser_m2'] : '' ;
$ser_banheiro = (isset($_POST['ser_banheiro'])) ? $_POST['ser_banheiro'] : '' ;
$ser_cozinha = (isset($_POST['ser_cozinha'])) ? $_POST['ser_cozinha'] : '' ;
$ser_palco = (isset($_POST['ser_palco'])) ? $_POST['ser_palco'] : '' ;
$ser_estacionamento = (isset($_POST['ser_estacionamento'])) ? $_POST['ser_estacionamento'] : '' ;
$ser_playgroud = (isset($_POST['ser_playgroud'])) ? $_POST['ser_playgroud'] : '' ;
$ser_camarim = (isset($_POST['ser_camarim'])) ? $_POST['ser_camarim'] : '' ;
$ser_picinaadulto = (isset($_POST['ser_picinaadulto'])) ? $_POST['ser_picinaadulto'] : '' ;
$ser_picinainfantil = (isset($_POST['ser_picinainfantil'])) ? $_POST['ser_picinainfantil'] : '' ;
$ser_cadeira = (isset($_POST['ser_cadeira'])) ? $_POST['ser_cadeira'] : '' ;
$ser_camarote = (isset($_POST['ser_camarote'])) ? $_POST['ser_camarote'] : '' ;
$ser_descr = (isset($_POST['ser_descr'])) ? $_POST['ser_descr'] : '' ;
$ser_seguradora= (isset($_POST['ser_seguradora'])) ? 'checked' : ''; 	 


	$sql = "SELECT * FROM dbo.ser_servicos WHERE ser_usuid='".$ser_usuid."'";
	$stmt = sqlsrv_query( $conn, $sql );
	//$count = sqlsrv_num_rows($stmt); 
		 
	 if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
		 header('Location:../?pg=ERRO');
	} else {
	
	
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	switch ($row["ser_usuid"]) {
		case $ser_usuid:
			$existe = 1;
			break;
	}
		
		echo $existe;
	}
//O CADASTRO FOI LOCALIZADO /////////////////////	 
if($existe == 1){ 
$sql = "UPDATE ser_servicos 
SET 
	ser_local = ? , 
	ser_totpessoa = ? , 
	ser_m2 = ? , 
	ser_banheiro = ? , 
	ser_cozinha = ? , 
	ser_palco = ? , 
	ser_estacionamento = ? , 
	ser_playground = ? , 
	ser_camarim = ? , 
	ser_picinaadulto = ? , 
	ser_picinainfantil = ? , 
	ser_cadeira = ? , 
	ser_camarote = ? , 
	ser_descr = ? ,
	ser_seguradora = ?
WHERE 
	ser_usuid = ? and ser_num = ? ";

$params = array(
$ser_local,
$ser_totpessoa,
$ser_m2,
$ser_banheiro,
$ser_cozinha,
$ser_palco,
$ser_estacionamento,
$ser_playgroud,
$ser_camarim,
$ser_picinaadulto,
$ser_picinainfantil,
$ser_cadeira,
$ser_camarote,
$ser_descr,
$ser_seguradora,	
$ser_usuid,
$ser_num );
	
$stmt = sqlsrv_query( $conn, $sql, $params);

	$rows_affected = sqlsrv_rows_affected( $stmt);

	 if( $rows_affected === false) {
		die( print_r( sqlsrv_errors(), true));
	} elseif( $rows_affected == -1) {
			$_SESSION['DBERRO'] = "DB_004"; //FALHA NO UPDATE
			header('Location:../?pg=ambientes');
	} else {
			$_SESSION['DBERRO'] = "DB_003"; // UPDATE OK
			header('Location:./?pg=ambientes');
			}	
	
	
}

//O CADASTRO NÃO FOI LOCALIZADO ////////////////		 
		 
if($existe == 0){  

$sql = "INSERT INTO ser_servicos (
  ser_usuid
, ser_num
, ser_local
, ser_totpessoa
, ser_m2
, ser_banheiro
, ser_cozinha
, ser_palco
, ser_estacionamento
, ser_playground
, ser_camarim
, ser_picinaadulto
, ser_picinainfantil
, ser_cadeira
, ser_camarote
, ser_descr
, ser_seguradora
) VALUES (".$ser_usuid.", ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$params = array(
$ser_num,
$ser_local,
$ser_totpessoa,
$ser_m2,
$ser_banheiro,
$ser_cozinha,
$ser_palco,
$ser_estacionamento,
$ser_playgroud,
$ser_camarim,
$ser_picinaadulto,
$ser_picinainfantil,
$ser_cadeira,
$ser_camarote,
$ser_descr,
$ser_seguradora)	;
	
$stmt = sqlsrv_query( $conn, $sql, $params);

	if( $stmt === false ) {
	die( print_r( sqlsrv_errors(), true));
	} else {
			$_SESSION['DBERRO'] = "DB_005";
			header('Location:./?pg=ambientes');
			}
	}
		 
		 
		 
 }
		 sqlsrv_close($conn);
 }
?>