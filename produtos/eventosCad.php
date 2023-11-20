<?php 

require_once('./connections/config.php');
require_once('./erro/erros.php'); 
require_once('./connections/mssql_con.php'); 

header('Content-type: text/html; charset=utf-8');

if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
} else {
$eve_codigo = "1";
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
$eve_seguradora = "";
	
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
					$eve_seguradora = trim(utf8_encode($select["eve_seguradora"]));
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
/*function VerificaCampox(form) 
{
	 if (form.usu_cordial.value.length < 1) 
	{
	alert("Como gostaria de ser chamado? Escolha um nome curto.");
	form.usu_cordial.focus();
	return false;	
	}

		
}*/
	function goBack() {
    window.history.back()
}

</SCRIPT>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="form_form" >	
		  <?php if (isset($_SESSION["usu_id"])==""){
			if (file_exists('../erro/error.php')){
			$_SESSION['ERRO'] = '002';
			include '../erro/error.php';	
			}

		} elseif (isset($_SESSION["usu_tipo"])=="2"){ ?>
		
	<form  action="produtos/eventosAdd.php"  ID="form_eventosCad" name="form_eventosCad"  method="post" STYLE="word-spacing: 0; text-indent: 0; margin: 0; " onSubmit="return VerificaCampox(this)">
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
              <td width="4%" height="20" nowrap="nowrap">Código </td>
              <td width="12%" height="20" nowrap="nowrap">Nome do evento</td>
              <td width="6%" height="20" nowrap="nowrap">Data início </td>
              <td width="6%" height="20" nowrap="nowrap">Hora de início </td>
              <td width="72%" height="20" nowrap="nowrap">Duração</td>
            </tr>
            <tr>
              <td height="20">
                <input name="eve_codigo" type="text" id="eve_codigo" form="form_eventosCad" value="<?php echo (str_pad(intval($eve_codigo), 3, '0', STR_PAD_LEFT)); ?>" size="5" maxlength="5" readonly="readonly">
                </td>
              <td height="20"><input name="eve_nome" type="text" id="eve_nome" form="form_eventosCad" value="<?php echo $eve_nome; ?>" size="30" maxlength="50"></td>
              <td height="20"><input name="eve_dtinicio" type="text" id="eve_dtinicio" form="form_eventosCad" value="<?php echo $eve_dtinicio; ?>" size="10" maxlength="10"></td>
              <td height="20"><input name="eve_hrinicio" type="text" id="eve_hrinicio" form="form_eventosCad" value="<?php echo $eve_hrinicio; ?>" size="5" maxlength="5"></td>
              <td height="20"><input name="eve_hrduracao" type="text" id="eve_hrduracao" form="form_eventosCad" value="<?php echo $eve_hrduracao; ?>" size="2" maxlength="2"></td>
            </tr>
            </tbody>
        </table>
		  <table width="100%" border="0" cellspacing="4" cellpadding="0">
    <tbody>
      <tr>
        <td width="12%" height="20" nowrap="nowrap">Descrição do Evento</td>
        <td width="12%" height="20" nowrap="nowrap">Região</td>
        <td width="6%" height="20" nowrap="nowrap">Estado/UF</td>
        <td width="22%" height="20" align="center" nowrap="nowrap" class="menu002">&#8226;Tipo de Ambiente&#8226;</td>
        <td width="48%" height="20" nowrap="nowrap">&nbsp;</td>
      </tr>
      <tr>
        <td height="20"><input name="eve_descricao" type="text" id="eve_descricao" form="form_eventosCad" value="<?php echo $eve_descricao; ?>" size="30" maxlength="50"></td>
        <td height="20"><input name="eve_regiao" type="text" id="eve_regiao" form="form_eventosCad" value="<?php echo $eve_regiao; ?>" size="30" maxlength="50"></td>
        <td height="20"><input name="eve_uf" type="text" id="eve_uf" form="form_eventosCad" value="<?php echo $eve_uf; ?>" size="3" maxlength="2"></td>
        <td height="20" nowrap="nowrap">
			<label for="eve_tipoambiente">
			<input name="eve_tipoambiente" type="radio" id="radio" form="form_eventosCad" value="0" <?php echo $tipoA0; ?>>
            Local Aberto 
            <input name="eve_tipoambiente" type="radio" id="radio2" form="form_eventosCad" value="1" <?php echo $tipoA1; ?>>
            Local Fechado
            <input name="eve_tipoambiente" type="radio" id="radio3" form="form_eventosCad" value="2" <?php echo $tipoA2; ?>>
            Local Misto
			</label></td>
        <td height="20">&nbsp;</td>
      </tr>
    </tbody>
  </table>
		  <table width="100%" border="0" cellspacing="4" cellpadding="0">
		    <tbody>
		      <tr>
		        <td width="8%" height="20" nowrap="nowrap">Qtd. Convidados	              </td>
		        <td width="7%" height="20" nowrap="nowrap">Qtd. Cadeiras </td>
		        <td width="8%" height="20" nowrap="nowrap">Cobrar Ingresso </td>
		        <td width="10%" height="20" nowrap="nowrap">&nbsp;</td>
		        <td width="67%" height="20" nowrap="nowrap">&nbsp;</td>
	          </tr>
		      <tr>
		        <td height="20" nowrap="nowrap"><input name="eve_qtdconvidado" type="text" id="eve_qtdconvidado" form="form_eventosCad" value="<?php echo $eve_qtdconvidado; ?>" size="8" maxlength="5"></td>
		        <td height="20" nowrap="nowrap"><input name="eve_qtdcadeira" type="text" id="eve_qtdcadeira" form="form_eventosCad" value="<?php echo $eve_qtdcadeira; ?>" size="8" maxlength="5"></td>
		        <td height="20" nowrap="nowrap">R$
		          <input name="eve_vlringresso" type="text" id="eve_vlringresso" form="form_eventosCad" value="<?php echo $eve_vlringresso; ?>" size="15" maxlength="10"></td>
		        <td height="20" nowrap="nowrap">
				  <label class="menu002">
					<input name="eve_tipoparticular" type="radio" id="eve_partucular_0" form="form_eventosCad" value="0" <?php echo $tipoP0; ?>>		         
				  Evento Particular</label>
				</td>
		        <td height="20" nowrap="nowrap">
					<label class="menu002">
					<input name="eve_tipoparticular" type="radio" id="eve_partucular_1" form="form_eventosCad" value="1" <?php echo $tipoP1; ?>>		          
					Evento Público </label>
			    </td>
	          </tr>
	        </tbody>
	      </table>
		  <table width="100%" border="0" cellspacing="4" cellpadding="0">
		    <tbody>
		      <tr>
		        <td width="16%" height="20" nowrap="nowrap">
					<input name="eve_locambiente" type="checkbox" id="eve_locambiente" form="form_eventosCad" <?php echo $eve_locambiente; ?>> 
                <label for="eve_locambiente">Locar Ambiente</label></td>
		        <td width="11%" height="20" nowrap="nowrap">
					<input name="eve_locambiente_sn" type="radio" id="Ambiente_0" form="form_eventosCad" value="0" <?php echo $locamb0; ?>> 
		          Concorrência Aberta
</td>
		        <td width="13%" height="20" nowrap="nowrap">
					<input name="eve_locambiente_sn" type="radio" id="Ambiente_1" form="form_eventosCad" value="1" <?php echo $locamb1; ?>>  
		          Concorrência Finalizada
</td>
		        <td width="4%">&nbsp;</td>
		        <td width="56%" rowspan="8" valign="top">
					<table width="29%" height="168" border="0" cellpadding="0" cellspacing="0" >
		          <tbody>
		            <tr>
		              <td align="center" valign="middle" class="menu002c" style="color: dimgrey;">20%</td>
		              <td width="40%" class"">
						  <div class="txt_180G menu002d" style="color: dimgrey;" >Concluído</div>
						</td>
		              </tr>
		            <tr>
						<td colspan="2" align="center" class="menu002d" style="color: dimgrey;">
							<p>Faltam (05) dias para </br>
						o início do Evento </p></td>
		              </tr>
		            </tbody>
	            </table>
		</td>
	          </tr>
		      <tr>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locsom" type="checkbox" id="eve_locsom" form="form_eventosCad" <?php echo $eve_locsom; ?>> 
                <label for="eve_locsom">Locar Equipamento de Som</label></td>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locsom_sn" type="radio" id="Ambiente_0" form="form_eventosCad" value="0" <?php echo $locsom0; ?>> 
		          Concorrência Aberta </td>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locsom_sn" type="radio" id="Ambiente_1" form="form_eventosCad" value="1" <?php echo $locsom1; ?>> 
		          Concorrência Finalizada </td>
		        <td>&nbsp;</td>
	          </tr>
		      <tr>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locseguranca" type="checkbox" id="eve_locseguranca" form="form_eventosCad" <?php echo $eve_locseguranca; ?>> 
		          Contratar Equipe de Segurancas
		            <label for="eve_locseguranca"> </label></td>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locseguranca_sn" type="radio" id="Ambiente_0" form="form_eventosCad" value="0" <?php echo $locseg0; ?>> 
		          Concorrência Aberta </td>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locseguranca_sn" type="radio" id="Ambiente_1" form="form_eventosCad" value="1" <?php echo $locseg1; ?>> 
		          Concorrência Finalizada </td>
		        <td>&nbsp;</td>
	          </tr>
		      <tr>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locbuffet" type="checkbox" id="eve_locbuffet" form="form_eventosCad" <?php echo $eve_locbuffet; ?>> 
                <label for="eve_locbuffet">Contratar Buffet </label></td>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locbuffet_sn" type="radio" id="Ambiente_0" form="form_eventosCad" value="0" <?php echo $locbuf0; ?>> 
		          Concorrência Aberta </td>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locbuffet_sn" type="radio" id="Ambiente_1" form="form_eventosCad" value="1" <?php echo $locbuf1; ?>> 
		          Concorrência Finalizada </td>
		        <td>&nbsp;</td>
	          </tr>
		      <tr>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locgarcon" type="checkbox" id="eve_locgarcon" form="form_eventosCad" <?php echo $eve_locgarcon; ?>> 
                <label for="eve_locgarcon">Contratar Garçons Freelancer</label></td>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locgarcon_sn" type="radio" id="Ambiente_0" form="form_eventosCad" value="0" <?php echo $locgar0; ?>> 
		          Concorrência Aberta </td>
		        <td height="20" nowrap="nowrap">
					<input name="eve_locgarcon_sn" type="radio" id="Ambiente_1" form="form_eventosCad" value="1" <?php echo $locgar1; ?>> 
		          Concorrência Finalizada </td>
		        <td>&nbsp;</td>
	          </tr>
		      <tr>
		        <td height="20" colspan="3" nowrap="nowrap">&nbsp;</td>
		        <td>&nbsp;</td>
	          </tr>
		      <tr>
		        <td height="20" align="right" valign="middle" nowrap="nowrap">Solicitar Linhas de Crédito: 
		          <input name="eve_crediario" type="checkbox" id="eve_crediario" form="form_eventosCad" <?php echo $eve_crediario; ?>> 
				  </td>
		        <td height="20" align="right" valign="middle" nowrap="nowrap">&nbsp;</td>
		        <td height="20" align="right" valign="middle" nowrap="nowrap">&nbsp;</td>
		        <td>&nbsp;</td>
	          </tr>
		      <tr>
		        <td align="right" valign="middle"><img src="/pi_facu/images/ico_garantia.png"  width="60" height="39" alt="Evento Garantido" style="vertical-align: middle;" />Evento Segurado: 
	              <input name="eve_seguradora" type="checkbox" id="eve_seguradora" form="form_eventosCad" <?php echo $eve_seguradora; ?>></td>
		        <td height="20" align="right" valign="middle" nowrap="nowrap">&nbsp;</td>
		        <td height="20" align="right" valign="middle" nowrap="nowrap">&nbsp;</td>
		        <td>&nbsp;</td>
	          </tr>
		      <tr>
		        <td height="20" colspan="3" nowrap="nowrap">Msg.: 
					<?php 
					if (isset($_SESSION['DBERRO'])){
					echo($erro[0][$_SESSION['DBERRO']]);  
					unset($_SESSION['DBERRO']);
					}
					?>
				  </td>
		        <td>&nbsp;</td>
		        <td>&nbsp;</td>
	          </tr>
		      <tr>
		        <td height="20" colspan="3" nowrap="nowrap">
					 <input form="form_eventosCad" type="hidden" name="eve_usuid" id="eve_usuid" accesskey="g" value="<?php echo((isset($_SESSION['usu_id'])) ? $_SESSION['usu_id'] : ''); ?>"/>
				  <input name="Perfil" type="submit" class="form_button" id="Perfil" form="form_eventosCad" formmethod="POST" accesskey="g" value="Salvar" />
				  </td>
		        <td>&nbsp;</td>
		        <td>&nbsp;</td>
	          </tr>
	        </tbody>
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