<?php
require_once('../connections/config.php');
require_once('../connections/mssql_con.php'); 
header('Content-type: text/html; charset=utf-8');

if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));

}

$existe = 0;
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
		$eve_usuid = (isset($_POST['eve_usuid'])) ? $_POST['eve_usuid'] : '' ;
		$eve_codigo = (isset($_POST['eve_codigo'])) ? $_POST['eve_codigo'] : '' ;
		$eve_nome = (isset($_POST['eve_nome'])) ? $_POST['eve_nome'] : '' ;
		$eve_dtinicio = (isset($_POST['eve_dtinicio'])) ? $_POST['eve_dtinicio'] : '' ;
		$eve_hrinicio = (isset($_POST['eve_hrinicio'])) ? $_POST['eve_hrinicio'] : '' ;
		$eve_hrduracao = (isset($_POST['eve_hrduracao'])) ? $_POST['eve_hrduracao'] : '' ;
		$eve_descricao = (isset($_POST['eve_descricao'])) ? $_POST['eve_descricao'] : '' ;
		$eve_regiao = (isset($_POST['eve_regiao'])) ? $_POST['eve_regiao'] : '' ;
		$eve_uf = (isset($_POST['eve_uf'])) ? $_POST['eve_uf'] : '' ;
		$eve_tipoambiente = (isset($_POST['eve_tipoambiente'])) ? $_POST['eve_tipoambiente'] : '' ;
		$eve_qtdconvidado = (isset($_POST['eve_qtdconvidado'])) ? $_POST['eve_qtdconvidado'] : '' ;
		$eve_qtdcadeira = (isset($_POST['eve_qtdcadeira'])) ? $_POST['eve_qtdcadeira'] : '' ;
		$eve_vlringresso = (isset($_POST['eve_vlringresso'])) ? $_POST['eve_vlringresso'] : '' ;
		$eve_tipoparticular = (isset($_POST['eve_tipoparticular'])) ? $_POST['eve_tipoparticular'] : '' ;
		$eve_locambiente = (isset($_POST['eve_locambiente'])) ? 'checked' : ''; 
		$eve_locambiente_sn = (isset($_POST['eve_locambiente_sn'])) ? $_POST['eve_locambiente_sn'] : '' ;
		$eve_locsom = (isset($_POST['eve_locsom'])) ? 'checked' : '';
		$eve_locsom_sn = (isset($_POST['eve_locsom_sn'])) ? $_POST['eve_locsom_sn'] : '' ;
		$eve_locseguranca = (isset($_POST['eve_locseguranca'])) ? 'checked' : ''; 
		$eve_locseguranca_sn = (isset($_POST['eve_locseguranca_sn'])) ? $_POST['eve_locseguranca_sn'] : '' ;
		$eve_locbuffet = (isset($_POST['eve_locbuffet'])) ? 'checked' : ''; 
		$eve_locbuffet_sn = (isset($_POST['eve_locbuffet_sn'])) ? $_POST['eve_locbuffet_sn'] : '' ;
		$eve_locgarcon = (isset($_POST['eve_locgarcon'])) ? 'checked' : ''; 
		$eve_locgarcon_sn = (isset($_POST['eve_locgarcon_sn'])) ? $_POST['eve_locgarcon_sn'] : '' ;
	 	$eve_crediario = (isset($_POST['eve_crediario'])) ? 'checked' : ''; 
	 	$eve_seguradora = (isset($_POST['eve_seguradora'])) ? 'checked' : ''; 


	$sql = "SELECT * FROM dbo.eve_eventos WHERE eve_usuid='".$eve_usuid."'";
	$stmt = sqlsrv_query( $conn, $sql );
	//$count = sqlsrv_num_rows($stmt); 
		 
	 if( $stmt === false) {
	die( print_r( sqlsrv_errors(), true) );
		 header('Location:../?pg=ERRO');
	} else {
	
	
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	switch ($row["eve_usuid"]) {
		case $eve_usuid:
			$existe = 1;
			break;
	}
		
		echo $existe;
	}
//O CADASTRO FOI LOCALIZADO /////////////////////	 
if($existe == 1){ 
$sql = "UPDATE eve_eventos 
SET 
	eve_nome = ? , 
	eve_dtinicio = ? , 
	eve_hrinicio = ? , 
	eve_hrduracao = ? , 
	eve_descricao = ? , 
	eve_regiao = ? , 
	eve_uf = ? , 
	eve_tipoambiente = ? , 
	eve_qtdconvidado = ? , 
	eve_qtdcadeira = ? , 
	eve_vlringresso = ? , 
	eve_tipoparticular = ? , 
	eve_locambiente = ? , 
	eve_locambiente_sn = ? , 
	eve_locsom = ? , 
	eve_locsom_sn = ? , 
	eve_locseguranca = ? , 
	eve_locseguranca_sn = ? , 
	eve_locbuffet = ? , 
	eve_locbuffet_sn = ? , 
	eve_locgarcon = ? , 
	eve_locgarcon_sn = ?,  
	eve_crediario = ?,
	eve_seguradora = ?

WHERE 
	eve_usuid = ? and eve_codigo = ? ";

$params = array(
utf8_decode($eve_nome),
utf8_decode($eve_dtinicio),
utf8_decode($eve_hrinicio),
utf8_decode($eve_hrduracao),
utf8_decode($eve_descricao),
utf8_decode($eve_regiao),
utf8_decode($eve_uf),
utf8_decode($eve_tipoambiente),
utf8_decode($eve_qtdconvidado),
utf8_decode($eve_qtdcadeira),
utf8_decode($eve_vlringresso),
utf8_decode($eve_tipoparticular),
utf8_decode($eve_locambiente),
utf8_decode($eve_locambiente_sn),
utf8_decode($eve_locsom),
utf8_decode($eve_locsom_sn),
utf8_decode($eve_locseguranca),
utf8_decode($eve_locseguranca_sn),
utf8_decode($eve_locbuffet),
utf8_decode($eve_locbuffet_sn),
utf8_decode($eve_locgarcon),
utf8_decode($eve_locgarcon_sn),
utf8_decode($eve_crediario),
utf8_decode($eve_seguradora),
utf8_decode($eve_usuid),
utf8_decode($eve_codigo)

 );
	
$stmt = sqlsrv_query( $conn, $sql, $params);

	$rows_affected = sqlsrv_rows_affected( $stmt);

	 if( $rows_affected === false) {
		die( print_r( sqlsrv_errors(), true));
		 
	} elseif( $rows_affected == -1) {
			$_SESSION['DBERRO'] = "DB_004"; //FALHA NO UPDATE
			header('Location:.../?pg=15&tp=10&ev=0');
	} else {
			$_SESSION['DBERRO'] = "DB_003"; // UPDATE OK
			header('Location:../?pg=15&tp=10&ev=0');
			}	
	
	
}

//O CADASTRO NÃO FOI LOCALIZADO ////////////////		 
		 
if($existe == 0){  

$sql = "INSERT INTO eve_eventos (
 eve_usuid
,eve_codigo
,eve_nome
,eve_dtinicio
,eve_hrinicio
,eve_hrduracao
,eve_descricao
,eve_regiao
,eve_uf
,eve_tipoambiente
,eve_qtdconvidado
,eve_qtdcadeira
,eve_vlringresso
,eve_tipoparticular
,eve_locambiente
,eve_locambiente_sn
,eve_locsom
,eve_locsom_sn
,eve_locseguranca
,eve_locseguranca_sn
,eve_locbuffet
,eve_locbuffet_sn
,eve_locgarcon
,eve_locgarcon_sn
,eve_crediario
,eve_seguradora
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$params = array(
utf8_decode($eve_usuid),
utf8_decode($eve_codigo),
utf8_decode($eve_nome),
utf8_decode($eve_dtinicio),
utf8_decode($eve_hrinicio),
utf8_decode($eve_hrduracao),
utf8_decode($eve_descricao),
utf8_decode($eve_regiao),
utf8_decode($eve_uf),
utf8_decode($eve_tipoambiente),
utf8_decode($eve_qtdconvidado),
utf8_decode($eve_qtdcadeira),
utf8_decode($eve_vlringresso),
utf8_decode($eve_tipoparticular),
utf8_decode($eve_locambiente),
utf8_decode($eve_locambiente_sn),
utf8_decode($eve_locsom),
utf8_decode($eve_locsom_sn),
utf8_decode($eve_locseguranca),
utf8_decode($eve_locseguranca_sn),
utf8_decode($eve_locbuffet),
utf8_decode($eve_locbuffet_sn),
utf8_decode($eve_locgarcon),
utf8_decode($eve_locgarcon_sn),
utf8_decode($eve_crediario),
utf8_decode($eve_seguradora)
);
	
$stmt = sqlsrv_query( $conn, $sql, $params);

	if( $stmt === false ) {
	die( print_r( sqlsrv_errors(), true));
	} else {
			$_SESSION['DBERRO'] = "DB_005";
			header('Location:../?pg=15&tp=10&ev=0');
			}
	}
		 
		 
		 
 }
		 sqlsrv_close($conn);
 }
?>