<?php 

require_once('./connections/config.php');
require_once('./erro/erros.php'); 
require_once('./connections/mssql_con.php'); 

header('Content-type: text/html; charset=utf-8');

function random_color($start = 0x000000, $end = 0xFFFFFF) {
   return sprintf('#%06x', mt_rand($start, $end));
}

?>
<!DOCTYPE html >
<html >
<head>

<title></title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />

</head>
<style>
	
.LADO {
    width: 230px;
    height: 200px;
	display: inline-block;
	border-radius: 8px;
	background-image: radial-gradient( circle farthest-corner at 22.4% 21.7%, rgba(4,189,228,1) 0%, rgba(2,83,185,1) 100.2% );
	padding: 3px;
	
}
	.FONTE {
  font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif" ;
  text-decoration:none;
  font-weight:bold;
  font-size: 24px;
  text-decoration: none;
  text-shadow: 1px 1px white, -1px -1px #444;
}

</style>


	
	
<body>

	
	<div class="form_form" >	
		  <?php if (isset($_SESSION["usu_id"])==""){
			if (file_exists('../erro/error.php')){
			$_SESSION['ERRO'] = 'EM_002';
			include '../erro/error.php';	
			}

		} elseif (isset($_SESSION["usu_tipo"])=="2"){ ?>
		
	 
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
    <tr style="border: 1px solid #CCC;">
      <td height="19" nowrap="nowrap" style="color:white;">&nbsp;</td>
      </tr>
    <tr>
      <td height="38" align="center" valign="top" >
		  
		<div >
			  
<?php if( $conn === false) {
die( print_r( sqlsrv_errors(), true));
} else {

//$usu_email = $_SESSION["usu_email"];
$row1 = 0;	
$eve_usuid =(isset($_SESSION["usu_id"])) ? $_SESSION["usu_id"] : '';
$sql = "SELECT * FROM dbo.usu_usuario WHERE usu_tipo <> '0'";
$stmt = sqlsrv_query( $conn, $sql );
while( $select = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
// text_limiter_caracter(trim(utf8_encode($select["eve_nome"])), 15, '...');
		++$row1 ;
			?>
<div class="LADO" id="div<?php echo $row1;?>"> 
<table id="tb<?php echo $row1;?>"  width="100%" height="197" border="0" align="left" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td height="70"  align="center" valign="middle" class="FONTE" style="color:<?php echo random_color();?>;">&nbsp;<?php echo substr(trim(utf8_encode($select["usu_cordial"])), 0, 25).""; ?></td>
</tr>
<tr>
<td  align="center" valign="middle" class="menu002d">&nbsp;<?php  echo 'Região de '.trim(utf8_encode($select["usu_cidade"])).' '.trim(utf8_encode($select["usu_uf"]));?></td>
</tr>
<tr>
<td  align="center" valign="middle" class="menu002d">&nbsp;<?php switch ($select["usu_tipo"]){ case "3": echo "<img src='/pi_facu/images/ico_garantia.png'  width='60' height='39' alt='Evento Garantido' style='vertical-align: middle;' /> Seguradora"; break; case "2": echo "Financeira"; break; case "1": echo "Aluguel em Geral"; break; }; ?></td>
</tr>
<tr>
<td align="center" valign="middle" class="menu002">&nbsp;WebSite: <a href="#" class="link_escuro">Acessar</a> </td>
</tr>
<tr>
<td align="center" valign="middle" class="menu002a">&nbsp;Para mais informações: <a href="?pg=15&tp=10&ev=4&tpu=<?php echo trim(utf8_encode($select["usu_tipo"]));?>&id=<?php echo trim(utf8_encode($select["usu_id"]));?>" class="link_escuro">Clique aqui</a></td>
</tr>
</tbody>
</table>
</div>
<?php }}; ?>			  
<?php if( $conn === false) {
die( print_r( sqlsrv_errors(), true));
} else {

//$usu_email = $_SESSION["usu_email"];
$row = 0;	
$eve_usuid =(isset($_SESSION["usu_id"])) ? $_SESSION["usu_id"] : '';
$sql = "SELECT * FROM dbo.eve_eventos e INNER JOIN dbo.usu_usuario u ON e.eve_usuid = u.usu_id";
$stmt = sqlsrv_query( $conn, $sql );
while( $select = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
// text_limiter_caracter(trim(utf8_encode($select["eve_nome"])), 15, '...');
		++$row ;
			?>
<div class="LADO" id="div<?php echo $row;?>"> 
<table id="tb<?php echo $row1;?>" width="100%" height="197" border="0" align="left" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td height="70" align="center" valign="middle" class="FONTE" style="color: <?php echo random_color();?>;">&nbsp;<?php echo substr(trim(utf8_encode($select["eve_descricao"])), 0, 25).""; ?></td>
</tr>
<tr>
<td  align="center" valign="middle" class="menu002d">&nbsp;<?php  echo 'Região de '.trim(utf8_encode($select["eve_regiao"])).' '.trim(utf8_encode($select["eve_uf"]));?></td>
</tr>
<tr>
<td  align="center" valign="middle" class="menu002d">&nbsp;<?php echo trim(utf8_encode($select["eve_qtdconvidado"])).' Convidado(s)'; ?></td>
</tr>
<tr>
<td align="center" valign="middle" class="menu002">&nbsp;Está procurando por<br> serviços de terceiros.</td>
</tr>
<tr>
<td align="center" valign="middle" class="menu002a">&nbsp;Para mais informações: <a href="?pg=15&tp=10&ev=4&tpu=<?php echo trim(utf8_encode($select["usu_tipo"]));?>&id=<?php echo trim(utf8_encode($select["eve_usuid"]));?>" class="link_escuro">Clique aqui</a></td>
</tr>
</tbody>
</table>
</div>
<?php }}; ?>
			  

				
		</div>
	
		  
		</td>
    </tr>
    <tr>
      <td height="38" align="center" valign="middle">
	

		
	  </td>
    </tr>
    </table>
  
 
			<?php } ?> 
  </div>
		
</body>
</html>