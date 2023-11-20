<?php 

require_once('./connections/config.php');
require_once('./erro/erros.php'); 
require_once('./connections/mssql_con.php'); 

header('Content-type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$email_para = "";
	$email_nome = "";
	$email_cpf = "";
	$email_cel = "";
	
	$email_para = (isset($_POST['conv_email'])) ? $_POST['conv_email'] : '';
	$email_nome = (isset($_POST['conv_nome'])) ? $_POST['conv_nome'] : '';
	$email_cpf = (isset($_POST['conv_cpf'])) ? $_POST['conv_cpf'] : '';
	$email_cel = (isset($_POST['conv_cel'])) ? $_POST['conv_cel'] : '';
}



if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
} else {
$eve_codigo = "";
$eve_nome = "";
$eve_dtinicio = "";
$eve_hrinicio = "";
$eve_hrduracao = "";
$eve_descricao = "";
$eve_regiao = "";
$eve_uf = "";
$eve_tipoambiente = "";
$eve_qtdconvidado = "";
$eve_qtdcadeira = "";
$eve_vlringresso = "";
$eve_tipoparticular = "";
$eve_locambiente = "";
$eve_locambiente_sn = "";
$eve_locsom = "";
$eve_locsom_sn = "";
$eve_locseguranca = "";
$eve_locseguranca_sn = "";
$eve_locbuffet = "";
$eve_locbuffet_sn = "";
$eve_locgarcon = "";
$eve_locgarcon_sn = "";
$eve_crediario = "";

	
	//$usu_email = $_SESSION["usu_email"];
			$eve_usuid =(isset($_SESSION["usu_id"])) ? $_SESSION["usu_id"] : '';
			$sql = "SELECT * FROM dbo.eve_eventos WHERE eve_usuid='".$eve_usuid."'";
			$stmt = sqlsrv_query( $conn, $sql );
			while( $select = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
				
				
					$eve_codigo = trim(utf8_encode($select["eve_codigo"]));
					$eve_nome = trim(utf8_encode($select["eve_nome"]));
					$eve_dtinicio = trim(utf8_encode($select["eve_dtinicio"]));
					$eve_hrinicio = trim(utf8_encode($select["eve_hrinicio"]));
					$eve_hrduracao = trim(utf8_encode($select["eve_hrduracao"]));
					$eve_descricao = trim(utf8_encode($select["eve_descricao"]));
					$eve_regiao = trim(utf8_encode($select["eve_regiao"]));
					$eve_uf = trim(utf8_encode($select["eve_uf"]));
					$eve_tipoambiente = trim(utf8_encode($select["eve_tipoambiente"]));
					$eve_qtdconvidado = trim(utf8_encode($select["eve_qtdconvidado"]));
					$eve_qtdcadeira = trim(utf8_encode($select["eve_qtdcadeira"]));
					$eve_vlringresso = trim(utf8_encode($select["eve_vlringresso"]));
					$eve_tipoparticular = trim(utf8_encode($select["eve_tipoparticular"]));
					$eve_locambiente = trim(utf8_encode($select["eve_locambiente"]));
					$eve_locambiente_sn = trim(utf8_encode($select["eve_locambiente_sn"]));
					$eve_locsom = trim(utf8_encode($select["eve_locsom"]));
					$eve_locsom_sn = trim(utf8_encode($select["eve_locsom_sn"]));
					$eve_locseguranca = trim(utf8_encode($select["eve_locseguranca"]));
					$eve_locseguranca_sn = trim(utf8_encode($select["eve_locseguranca_sn"]));
					$eve_locbuffet = trim(utf8_encode($select["eve_locbuffet"]));
					$eve_locbuffet_sn = trim(utf8_encode($select["eve_locbuffet_sn"]));
					$eve_locgarcon = trim(utf8_encode($select["eve_locgarcon"]));
					$eve_locgarcon_sn = trim(utf8_encode($select["eve_locgarcon_sn"]));
					$eve_crediario = trim(utf8_encode($select["eve_crediario"]));	
				}

				
				$tipoA0="";
				$tipoA1="";
				$tipoA2="";
				switch ($eve_tipoambiente){
					case "0":
						$tipoA0 = "checked=\"checked\"";
						break;
					case "1":
						$tipoA1 = "checked=\"checked\"";
						break;
					case "2":
						$tipoA2 = "checked=\"checked\"";
						break;
				}
				$tipoP0="";
				$tipoP1="";
				switch ($eve_tipoparticular){
					case "0":
						$tipoP0 = "checked=\"checked\"";
						break;
					case "1":
						$tipoP1 = "checked=\"checked\"";
						break;
				}	
				$locamb0="";
				$locamb1="";
				switch ($eve_locambiente_sn){
					case "0":
						$locamb0 = "checked=\"checked\"";
						break;
					case "1":
						$locamb1 = "checked=\"checked\"";
						break;
				}
				$locsom0="";
				$locsom1="";
				switch ($eve_locsom_sn){
					case "0":
						$locsom0 = "checked=\"checked\"";
						break;
					case "1":
						$locsom1 = "checked=\"checked\"";
						break;
				}	
				$locseg0="";
				$locseg1="";
				switch ($eve_locseguranca_sn){
					case "0":
						$locseg0 = "checked=\"checked\"";
						break;
					case "1":
						$locseg1 = "checked=\"checked\"";
						break;
				}
				$locbuf0="";
				$locbuf1="";
				switch ($eve_locbuffet_sn){
					case "0":
						$locbuf0 = "checked=\"checked\"";
						break;
					case "1":
						$locbuf1 = "checked=\"checked\"";
						break;
				}
				$locgar0="";
				$locgar1="";
				switch ($eve_locgarcon_sn){
					case "0":
						$locgar0 = "checked=\"checked\"";
						break;
					case "1":
						$locgar1 = "checked=\"checked\"";
						break;
				}
};
?>
<!DOCTYPE html >
<html >
<head>

<title></title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<SCRIPT language=javascript>
	
function VerificaCampox(form) 
{
/* 	 if (form.conv_.value.length < 1) 
	{
	alert("Como gostaria de ser chamado? Escolha um nome curto.");
	form.usu_cordial.focus();
	return false;	
	} */

		
}
// Initialization for ES Users


</SCRIPT>

</head>



	
	
<body>

	
	<div class="form_form" >	
		  <?php if (isset($_SESSION["usu_id"])==""){
			if (file_exists('../erro/error.php')){
			$_SESSION['ERRO'] = 'EM_002';
			include '../erro/error.php';	
			}

		} elseif (isset($_SESSION["usu_tipo"])=="2"){ ?>
		
	 
  <table width="62%" border="0" align="center" cellpadding="0" cellspacing="5" class="form_form">
    <tr style="border: 1px solid #CCC;">
      <td height="20" nowrap="nowrap" class="fundo1 menu002d" style="color:white;">&nbsp;E-mail</td>
      </tr>
    <tr>
      <td height="38" align="center" valign="middle">
		  
		<table width="60%" border="0" align="center" cellpadding="0" cellspacing="4">
    	<tbody>
          <tr>
            <td width="39" align="left" valign="middle" class="menu002">De:</td>
            <td colspan="2" class="menu002"><?php echo $_SESSION['usu_email']; ?></td>
            <td align="right" class="menu002"><?php $hoje = date('d/m/Y H:i'); echo $hoje;?> </td>
            <td width="5">&nbsp;</td>
          </tr>
          <tr>
            <td width="39" align="left" valign="middle" class="menu002">Para: </td>
            <td colspan="3" class="menu002"><?php echo $email_para; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3" align="center" valign="middle" class="menu002">Convite Personalizado para o Evento</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3" align="center" valign="middle" class="menu002" ><?php echo $eve_nome; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="76">&nbsp;</td>
            <td colspan="3" valign="top" class="menu002" align="justify" >
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Você <?php echo $email_nome; ?>, está convidado(a) a participar de um evento cultural incrível! Junte-se a nós no dia <?php echo $eve_dtinicio; ?> as <?php echo $eve_hrinicio; ?>hr com duração prevista de <?php echo $eve_hrduracao; ?>hr, teremos uma noite de música, dança e arte, enquanto celebramos a rica diversidade cultural da nossa comunidade de escritores brasileiros. Não perca essa oportunidade de se conectar com novas pessoas e expandir seus horizontes culturais. Esperamos vê-lo(a) lá!
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="20" colspan="2">&nbsp;</td>
            <td width="140" rowspan="6" align="right" valign="top"><img src="/pi_facu/images/qrcode.png" width="140" height="140" alt=""/></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="20" colspan="2">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="20" colspan="2" align="right" valign="middle" class="menu002a">Favor apresentar na entrada</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="20" colspan="2" align="right" valign="middle" class="menu002a">munido de um documento</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="menu002">&nbsp;</td>
            <td height="20" colspan="2" align="right" valign="middle" class="menu002a">com foto.</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td width="115" height="20" align="center" valign="middle" ><div class="form_button" style="vertical-align: middle; padding-top: 10px;"><a href="?pg=15&tp=10&ev=1" style="text-decoration: none;">Enviar ››</a></div></td>
            <td width="629">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="20" colspan="3" class="menu002a">Local: Rua Passa Longe, 255 Bairro São João / Campinas / SP - CEP 08300-000</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20" colspan="5" align="center" valign="middle" class="fundo1">Obs.: É necessário confirmar presença com 02 dias de antecedência.</td>
          </tr>
          </tbody>
      </table>
		
	  </td>
    </tr>
    </table>
  
 
			<?php } ?> 
  </div>
		
</body>
</html>