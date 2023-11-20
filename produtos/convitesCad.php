<?php 

require_once('./connections/config.php');
require_once('./erro/erros.php'); 
require_once('./connections/mssql_con.php'); 

header('Content-type: text/html; charset=utf-8');

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
	if (form.conv_nome.value.length < 1) 
	{
	alert("Digite o nome do convidado.");
	form.conv_nome.focus();
	return false;	
	}
	if (form.conv_email.value.length < 1) 
	{
	alert("Digite o e-mail do convidado.");
	form.conv_email.focus();
	return false;	
	}

		
}
// Initialization for ES Users
</SCRIPT>
</head>
	
<body>

	
	<div class="form_form" >	
		  <?php if (isset($_SESSION["usu_id"])==""){
			if (file_exists('../erro/error.php')){
			$_SESSION['ERRO'] = '002';
			include '../erro/error.php';	
			}

		} elseif (isset($_SESSION["usu_tipo"])=="2"){ ?>
		
	 <form  action="?pg=15&tp=10&ev=2"  ID="form_convites" name="form_convites"  method="post" STYLE="word-spacing: 0; text-indent: 0; margin: 0; " onSubmit="return VerificaCampox(this)">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
    <tr style="border: 1px solid #CCC;">
      <td height="30" colspan="2" nowrap="nowrap" class="fundo1">&nbsp;<strong>Adicionar Evento (Status)</strong></td>
      </tr>
    <tr>
      <td width="25" align="left" nowrap="nowrap">&nbsp;</td>
      <td width="1565" height="38" align="left" valign="middle" nowrap="nowrap" class="menu002">
        <table width="100%" border="0" cellspacing="4" cellpadding="0">
          <tbody>
            <tr>
              <td width="4%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Código : <?php echo (str_pad(intval($eve_codigo), 3, '0', STR_PAD_LEFT)); ?></td>
              <td width="12%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Evento: <?php echo $eve_nome; ?></td>
              <td width="6%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Data início: <?php echo $eve_dtinicio; ?></td>
              <td width="6%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Hora de início: <?php echo $eve_hrinicio; ?></td>
              <td width="72%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Duração: <?php echo $eve_hrduracao.' hr' ; ?></td>
            </tr>
            </tbody>
        </table>
		  <table width="100%" border="0" cellspacing="4" cellpadding="0">
    <tbody>
      <tr>
        <td width="12%" height="20" nowrap="nowrap">&nbsp;&nbsp;Descrição do Evento: <span class="menu002d"><?php echo $eve_descricao; ?></span></td>
        <td width="12%" height="20" nowrap="nowrap">&nbsp;&nbsp;Região: <span class="menu002d"><?php echo $eve_regiao; ?></span></td>
        <td width="6%" height="20" nowrap="nowrap">&nbsp;&nbsp;Estado/UF: <span class="menu002d"><?php echo $eve_uf; ?></span></td>
        <td width="22%" height="20" align="left" nowrap="nowrap" class="menu002">&nbsp;&nbsp;Tipo de Ambiente: <span class="menu002d">
          <?php 
					if ($tipoA0 !=""){ echo 'Aberto'; }
					elseif ($tipoA1 !=""){ echo 'Fechado'; }							 
					elseif ($tipoA2 !=""){ echo 'Misto'; }									 
			?>
        </span></td>
        <td width="48%" height="20" nowrap="nowrap">&nbsp;</td>
      </tr>
    </tbody>
  </table>
		  <table width="100%" border="0" cellspacing="4" cellpadding="0">
		    <tbody>
		      <tr>
		        <td width="8%" height="20" nowrap="nowrap">&nbsp;&nbsp;Qtd. Convidados: <span class="menu002d"><?php echo $eve_qtdconvidado; ?></span></td>
		        <td width="7%" height="20" nowrap="nowrap">&nbsp;&nbsp;Qtd. Cadeiras: <span class="menu002d"><?php echo $eve_qtdcadeira; ?></span></td>
		        <td width="8%" height="20" nowrap="nowrap">&nbsp;&nbsp;Valor do Ingresso: <span class="menu002d">R$ <?php echo $eve_vlringresso; ?></span></td>
		        <td width="10%" height="20" nowrap="nowrap">&nbsp;&nbsp;
		          <?php 
					if ($tipoP0 !=""){ echo 'Evento Particular'; }
					elseif ($tipoP1 !=""){ echo 'Evento Livre ao Público'; }							 
 				    ?></td>
		        <td width="67%" height="20" nowrap="nowrap">&nbsp;</td>
	          </tr>
	        </tbody>
	      </table>
		  <table width="99%" border="0" cellspacing="4" cellpadding="0">
		    <tr>
		      <td width="6%" height="20" nowrap="nowrap">&nbsp;</td>
		      <td width="18%" height="20">&nbsp;</td>
		      <td width="17%">&nbsp;</td>
		      <td width="59%">&nbsp;</td>
	        </tr>
		    <tr>
		      <td height="20" align="right" nowrap="nowrap" class="menu002">Cód.  </td>
		      <td height="20"><input name="conv_condigo" type="text" id="conv_condigo" form="form_convites" value="001" size="3" maxlength="3" readonly="readonly"></td>
		      <td rowspan="6" align="center" valign="top"><img src="/pi_facu/images/qrcode.png" width="140" height="140" alt=""/>
	          <td rowspan="7" align="left" valign="top"><table width="482" border="0" cellpadding="0" cellspacing="4">
		          <tbody>
		            <tr >
		              <td width="15%" height="35" align="center" valign="middle" nowrap="nowrap" class="form_button">Convidado</td>
		              <td width="15%" height="35" align="center" valign="middle" nowrap="nowrap" class="form_button">Status</td>
		              <td width="15%" height="35" align="center" valign="middle" nowrap="nowrap" class="form_button">Confirmado</td>
		              <td width="15%" height="35" align="center" valign="middle" nowrap="nowrap" class="form_button">Cadeira</td>
	                </tr>
		            <tr>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">001</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">enviado</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">Não</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">31</td>
	                </tr>
		            <tr>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">002</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">enviado</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">Não</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">16</td>
	                </tr>
		            <tr>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">003</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">enviado</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">Sim</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">29</td>
	                </tr>
		            <tr>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
		              <td align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>
	                </tr>
	              </tbody>
	          </table></td>
	        </tr>
		    <tr>
		      <td height="20" align="right" nowrap="nowrap" class="menu002">Para </td>
		      <td height="20"><input name="conv_nome" type="text" id="conv_nome" form="form_convites" size="30" maxlength="50"></td>
	        </tr>
		    <tr>
		      <td height="20" align="right" nowrap="nowrap" class="menu002">E-mail </td>
		      <td height="20"><input name="conv_email" type="text" id="conv_email" form="form_convites" size="30" maxlength="50"></td>
	        </tr>
		    <tr>
		      <td height="20" align="right" nowrap="nowrap" class="menu002">CPF n&deg; </td>
		      <td height="20"><input name="conv_cpf" type="text" id="conv_cpf" form="form_convites" size="16" maxlength="14"></td>
	        </tr>
		    <tr>
		      <td height="20" align="right" nowrap="nowrap" class="menu002">Cel. n&deg; </td>
		      <td height="20"><input name="conv_cel" type="text" id="conv_cel" form="form_convites" size="13" maxlength="12"></td>
	        </tr>
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap">Msg.:
		        <?php 
					if (isset($_SESSION['DBERRO'])){
					echo($erro[0][$_SESSION['DBERRO']]);  
					unset($_SESSION['DBERRO']);
					}
					?></td>
	        </tr>
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap"><input form="form_eventosCad" type="hidden" name="eve_usuid" id="eve_usuid" accesskey="g" value="<?php echo((isset($_SESSION['usu_id'])) ? $_SESSION['usu_id'] : ''); ?>"/>
		        <input name="Perfil" type="submit" class="form_button" id="Perfil" form="form_convites" formmethod="POST" accesskey="g" value="Enviar E-mail" /></td>
		      <td align="center" valign="top" class="menu002a">Código único por convidado.	                                    
	        </tr>
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap">

				  					
				</td>
		      <td align="center" valign="top">              
		      <td>&nbsp;</td>
	        </tr>
	      </table>
		  <p>&nbsp;</p>
        </td>
    </tr>
    </table>
  
    </form>
			<?php } ?> 
  </div>
			
</body>
</html>