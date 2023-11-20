<?php
require_once('../connections/config.php');
require_once('../connections/mssql_con.php'); 
header('Content-type: text/html; charset=utf-8');
$existe = 0;
echo ($_POST['usu_email']);

if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
}
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$pg = (isset($_POST['pg'])) ? $_POST['pg'] : ''; // forn / fin 
	$usu_email= (isset($_POST['usu_email'])) ? $_POST['usu_email'] : ''; //NAO ADICIONAR
 	$usu_nome= (isset($_POST['usu_nome'])) ? $_POST['usu_nome'] : ''; 
	$usu_cnpj= (isset($_POST['usu_cnpj'])) ? $_POST['usu_cnpj'] : ''; 
	$usu_iestadual= (isset($_POST['usu_iestadual'])) ? $_POST['usu_iestadual'] : '';
	$usu_website= (isset($_POST['usu_website'])) ? $_POST['usu_website'] : ''; 
	$usu_cep= (isset($_POST['usu_cep'])) ? $_POST['usu_cep'] : ''; 
	$usu_rua= (isset($_POST['usu_rua'])) ? $_POST['usu_rua'] : ''; 
	$usu_numero= (isset($_POST['usu_numero'])) ? $_POST['usu_numero'] : ''; 
	$usu_complemento= (isset($_POST['usu_complemento'])) ? $_POST['usu_complemento'] : ''; 
	$usu_bairro= (isset($_POST['usu_bairro'])) ? $_POST['usu_bairro'] : ''; 
	$usu_cidade= (isset($_POST['usu_cidade'])) ? $_POST['usu_cidade'] : ''; 
	$usu_uf= (isset($_POST['usu_uf'])) ? $_POST['usu_uf'] : ''; 
	$usu_telefone= (isset($_POST['usu_telefone'])) ? $_POST['usu_telefone'] : ''; 
	$usu_celular= (isset($_POST['usu_celular'])) ? $_POST['usu_celular'] : ''; 
	$usu_whatsapp= (isset($_POST['usu_whatsapp'])) ? 'checked' : ''; 
	$usu_tipo= (isset($_POST['usu_tipo'])) ? $_POST['usu_tipo'] : '';  

$sql = "UPDATE usu_usuario 
SET 
	usu_nome = ?, 
	usu_cnpj = ?, 
	usu_iestadual = ?,
	usu_website = ?, 
	usu_cep = ?, 
	usu_rua = ?, 
	usu_numero = ?, 
	usu_complemento = ?, 
	usu_bairro = ?, 
	usu_cidade = ?, 
	usu_uf = ?, 
	usu_telefone = ?, 
	usu_celular = ?, 
	usu_whatsapp = ?,
	usu_tipo = ? 
WHERE 
	usu_email = ?";
	 
	 
$params = array(
utf8_decode($usu_nome),
utf8_decode($usu_cnpj),
utf8_decode($usu_iestadual),
utf8_decode($usu_website),
utf8_decode($usu_cep),
utf8_decode($usu_rua),
utf8_decode($usu_numero),
utf8_decode($usu_complemento),
utf8_decode($usu_bairro),
utf8_decode($usu_cidade),
utf8_decode($usu_uf),
utf8_decode($usu_telefone),
utf8_decode($usu_celular),
utf8_decode($usu_whatsapp),
utf8_decode($usu_tipo),
utf8_decode($usu_email));



	 //echo($sql);
	 //echo($params[0], $params[1]);

$stmt = sqlsrv_query( $conn, $sql, $params);

	$rows_affected = sqlsrv_rows_affected( $stmt);
	

	 
	 
	 if( $rows_affected === false) {
	
		die( print_r( sqlsrv_errors(), true));
	
	} elseif( $rows_affected == -1) {
			$_SESSION['DBERRO'] = "DB_004"; //FALHA NO UPDATE
			echo "teste xxxxxxxxxxxxx".$_SESSION['DBERRO'].$_SESSION['usu_email'];
			header('Location:../?pg='.$pg.'');
	} else {
			$_SESSION['DBERRO'] = "DB_003"; // UPDATE OK
			echo "teste xxxxxxxxxxxxx".$_SESSION['DBERRO'].$_SESSION['usu_email'];
			header('Location:../?pg='.$pg.'');
			}
	}
		 sqlsrv_free_stmt( $stmt); 
		 sqlsrv_close( $conn);

?>