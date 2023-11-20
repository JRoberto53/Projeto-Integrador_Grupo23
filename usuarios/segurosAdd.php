<?php
require_once('./connections/config.php');
require_once('./connections/mssql_con.php'); 
header('Content-type: text/html; charset=utf-8');

if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
}

$existe = 0;
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
$seg_usuid = (isset($_POST['seg_usuid'])) ? $_POST['seg_usuid'] : '' ;
$seg_pfisica = (isset($_POST['seg_pfisica'])) ? 'checked' : '';
$seg_pjuridica = (isset($_POST['seg_pjuridica'])) ? 'checked' : '';
$seg_segtotal = (isset($_POST['seg_segtotal'])) ? 'checked' : '';
$seg_segparcial = (isset($_POST['seg_segparcial'])) ? 'checked' : '';
$seg_segespecial = (isset($_POST['seg_segespecial'])) ? 'checked' : '';




	$sql = "SELECT * FROM dbo.seg_seguradora WHERE seg_usuid='".$seg_usuid."'";
	$stmt = sqlsrv_query( $conn, $sql );
	//$count = sqlsrv_num_rows($stmt); 
		 
	 if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
		 header('Location:../?pg=ERRO');
	} else {
	
	
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	switch ($row["seg_usuid"]) {
		case $seg_usuid:
			$existe = 1;
			break;
	}
		
		echo $existe;
	}
//O CADASTRO FOI LOCALIZADO /////////////////////	 
if($existe == 1){ 
$sql = "UPDATE seg_seguradora
SET 
	seg_pfisica =  ? ,
	seg_pjuridica =  ? ,
	seg_segtotal =  ? ,
	seg_segparcial =  ? ,
	seg_segespecial =  ? 
WHERE 
	seg_usuid = ? ";

$params = array(
$seg_pfisica,
$seg_pjuridica,
$seg_segtotal,
$seg_segparcial,
$seg_segespecial,
$seg_usuid
 );
	
$stmt = sqlsrv_query( $conn, $sql, $params);

	$rows_affected = sqlsrv_rows_affected( $stmt);

	 if( $rows_affected === false) {
		die( print_r( sqlsrv_errors(), true));
	} elseif( $rows_affected == -1) {
			$_SESSION['DBERRO'] = "DB_004"; //FALHA NO UPDATE
			header('Location:../?pg=seguros');
	} else {
			$_SESSION['DBERRO'] = "DB_003"; // UPDATE OK
			header('Location:./?pg=seguros');
			}	
	
	
}

//O CADASTRO NÃO FOI LOCALIZADO ////////////////		 
		 
if($existe == 0){  

$sql = "INSERT INTO seg_seguradora (
  seg_usuid
, seg_pfisica
, seg_pjuridica
, seg_segtotal
, seg_segparcial
, seg_segespecial


) VALUES (".$seg_usuid.", ?, ?, ?, ?, ?)";

$params = array(
$seg_pfisica,
$seg_pjuridica,
$seg_segtotal,
$seg_segparcial,
$seg_segespecial
);
	
$stmt = sqlsrv_query( $conn, $sql, $params);

	if( $stmt === false ) {
	die( print_r( sqlsrv_errors(), true));
	} else {
			$_SESSION['DBERRO'] = "DB_005";
			header('Location:./?pg=seguros');
			}
	}
		 
		 
		 
 }
		 sqlsrv_close($conn);
 }
?>