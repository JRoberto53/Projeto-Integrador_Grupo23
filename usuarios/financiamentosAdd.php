<?php
require_once('./connections/config.php');
require_once('./connections/mssql_con.php'); 
header('Content-type: text/html; charset=utf-8');

if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
}

$existe = 0;
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
$fin_usuid = (isset($_POST['fin_usuid'])) ? $_POST['fin_usuid'] : '' ;
$fin_pfisica = (isset($_POST['fin_pfisica'])) ? 'checked' : '';
$fin_pjuridica = (isset($_POST['fin_pjuridica'])) ? 'checked' : '';
$fin_tfinanciamento = (isset($_POST['fin_tfinanciamento'])) ? 'checked' : '';
$fin_tpessoal = (isset($_POST['fin_tpessoal'])) ? 'checked' : '';
$fin_tconsignado = (isset($_POST['fin_tconsignado'])) ? 'checked' : '';
$fin_tcartao = (isset($_POST['fin_tcartao'])) ? 'checked' : '';
$fin_tconsorcio = (isset($_POST['fin_tconsorcio'])) ? 'checked' : '';
$fin_tconsolidado = (isset($_POST['fin_tconsolidado'])) ? 'checked' : '';
$fin_tempresa = (isset($_POST['fin_tempresa'])) ? 'checked' : '';



	$sql = "SELECT * FROM dbo.fin_financiamentos WHERE fin_usuid='".$fin_usuid."'";
	$stmt = sqlsrv_query( $conn, $sql );
	//$count = sqlsrv_num_rows($stmt); 
		 
	 if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
		 header('Location:../?pg=ERRO');
	} else {
	
	
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	switch ($row["fin_usuid"]) {
		case $fin_usuid:
			$existe = 1;
			break;
	}
		
		echo $existe;
	}
//O CADASTRO FOI LOCALIZADO /////////////////////	 
if($existe == 1){ 
$sql = "UPDATE fin_financiamentos
SET 
	fin_pfisica =  ? ,
	fin_pjuridica =  ? ,
	fin_tfinanciamento =  ? ,
	fin_tpessoal =  ? ,
	fin_tconsignado =  ? ,
	fin_tcartao =  ? ,
	fin_tconsorcio =  ? ,
	fin_tconsolidado =  ? ,
	fin_tempresa =  ?  
WHERE 
	fin_usuid = ? ";

$params = array(
$fin_pfisica,
$fin_pjuridica,
$fin_tfinanciamento,
$fin_tpessoal,
$fin_tconsignado,
$fin_tcartao,
$fin_tconsorcio,
$fin_tconsolidado,
$fin_tempresa,
$fin_usuid
 );
	
$stmt = sqlsrv_query( $conn, $sql, $params);

	$rows_affected = sqlsrv_rows_affected( $stmt);

	 if( $rows_affected === false) {
		die( print_r( sqlsrv_errors(), true));
	} elseif( $rows_affected == -1) {
			$_SESSION['DBERRO'] = "DB_004"; //FALHA NO UPDATE
			header('Location:../?pg=fianciamentos');
	} else {
			$_SESSION['DBERRO'] = "DB_003"; // UPDATE OK
			header('Location:./?pg=financiamentos');
			}	
	
	
}

//O CADASTRO NÃO FOI LOCALIZADO ////////////////		 
		 
if($existe == 0){  

$sql = "INSERT INTO fin_financiamentos (
  fin_usuid
, fin_pfisica
, fin_pjuridica
, fin_tfinanciamento
, fin_tpessoal
, fin_tconsignado
, fin_tcartao
, fin_tconsorcio
, fin_tconsolidado
, fin_tempresa

) VALUES (".$fin_usuid.", ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$params = array(
$fin_pfisica,
$fin_pjuridica,
$fin_tfinanciamento,
$fin_tpessoal,
$fin_tconsignado,
$fin_tcartao,
$fin_tconsorcio,
$fin_tconsolidado,
$fin_tempresa
);
	
$stmt = sqlsrv_query( $conn, $sql, $params);

	if( $stmt === false ) {
	die( print_r( sqlsrv_errors(), true));
	} else {
			$_SESSION['DBERRO'] = "DB_005";
			header('Location:./?pg=financiamentos');
			}
	}
		 
		 
		 
 }
		 sqlsrv_close($conn);
 }
?>