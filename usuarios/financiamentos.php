<?php 

require_once('./connections/config.php');
require_once('./erro/erros.php'); 
require_once('./connections/mssql_con.php'); 

header('Content-type: text/html; charset=utf-8');

if( $conn === false) {
    //die( print_r( sqlsrv_errors(), true));
	echo "xxxxx";
} else {
	
		    //$usu_email = $_SESSION["usu_email"];
			$fin_usuid =(isset($_SESSION["usu_id"])) ? $_SESSION["usu_id"] : '';
			$sql = "SELECT * FROM dbo.fin_financiamentos WHERE fin_usuid='".$fin_usuid."'";
			$stmt = sqlsrv_query( $conn, $sql );
			$fin_pfisica = "";
			$fin_pjuridica = "";
			$fin_tfinanciamento = "";
			$fin_tpessoal = "";
			$fin_tconsignado = "";
			$fin_tcartao = "";
			$fin_tconsorcio = "";
			$fin_tconsolidado = "";
			$fin_tempresa = "";


	
			while( $select = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
					$fin_pfisica = trim(utf8_encode($select["fin_pfisica"]));
					$fin_pjuridica = trim(utf8_encode($select["fin_pjuridica"]));
					$fin_tfinanciamento = trim(utf8_encode($select["fin_tfinanciamento"]));
					$fin_tpessoal = trim(utf8_encode($select["fin_tpessoal"]));
					$fin_tconsignado = trim(utf8_encode($select["fin_tconsignado"]));
					$fin_tcartao = trim(utf8_encode($select["fin_tcartao"]));
					$fin_tconsorcio = trim(utf8_encode($select["fin_tconsorcio"]));
					$fin_tconsolidado = trim(utf8_encode($select["fin_tconsolidado"]));
					$fin_tempresa = trim(utf8_encode($select["fin_tempresa"]));
				}

};


?>
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN</title>
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
</head>

<body>
	<div class="form_form" >	
		  <?php if (isset($_SESSION["usu_id"])==""){
			if (file_exists('./erro/error.php')){
			$_SESSION['ERRO'] = '002';
			include './erro/error.php';	
			}

		} elseif (isset($_SESSION["usu_tipo"])=="2"){ ?>
		
	<form  action="?pg=financiamentosAdd"  ID="form_financiamentos" name="form_financiamentos"  method="post" STYLE="word-spacing: 0; text-indent: 0; margin: 0; " onSubmit="return VerificaCampox(this)">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
    <tr style="border: 1px solid #CCC;">
      <td width="14" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" nowrap="nowrap" class="menu002b"><strong>Tipos de Financiamentos</strong> &nbsp;</td>
      <td width="1188" height="20" nowrap="nowrap" class="menu002b">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="fundo1">&nbsp;&#8226; Linha de crédito para:</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="fundo1">&nbsp;&#8226; Tipo de crédito:</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="fin_pfisica" type="checkbox" id="fin_pfisica" form="form_financiamentos" <?php echo $fin_pfisica;?>>
		  &#8226;
        Pessoas Físicas
          <label for="fin_pfisica"></label></td>
      <td width="205" height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="fin_tfinanciamento" type="checkbox" id="fin_tfinanciamento" form="form_financiamentos" <?php echo $fin_tfinanciamento;?>>
        &#8226; Financiamento</td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="fin_pjuridica" type="checkbox" id="fin_pjuridica" form="form_financiamentos" <?php echo $fin_pjuridica;?>>
        &#8226;
<label for="fin_pjuridica">Pessoas Jurídicas</label></td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="fin_tpessoal" type="checkbox" id="fin_tpessoal" form="form_financiamentos" <?php echo $fin_tpessoal;?>>
        &#8226; Empréstimo Pessoal</td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="fin_tconsignado" type="checkbox" id="fin_tconsignado" form="form_financiamentos" <?php echo $fin_tconsignado;?> >

        &#8226; Empréstimo Consignado</td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td width="14" align="right" nowrap="nowrap">&nbsp;</td>
      <td width="179" height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="fin_tcartao" type="checkbox" id="fin_tcartao" form="form_financiamentos" <?php echo $fin_tcartao;?>>
        &#8226; Cartão de Crédito (Todos)</td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="fin_tconsorcio" type="checkbox" id="fin_tconsorcio" form="form_financiamentos" <?php echo $fin_tconsorcio;?>>
        &#8226; Consórcio</td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="fin_tconsolidado" type="checkbox" id="fin_tconsolidado" form="form_financiamentos" <?php echo $fin_tconsolidado;?>>
        &#8226; Crédito Consolidado</td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap">
		  <input name="fin_tempresa" type="checkbox" id="fin_tempresa" form="form_financiamentos" <?php echo $fin_tempresa;?>>
        <span class="menu002">&#8226; Crédito p/ Empresas</span></td>
      <td align="left" valign="middle">&nbsp;</td>
      </tr>
    <tr>
      <td width="14" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap">&nbsp;</td>
      <td align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" align="left" nowrap="nowrap" class="menu002">
		  <input form="form_financiamentos" type="hidden" name="fin_usuid" id="fin_usuid" accesskey="g" value="<?php echo((isset($_SESSION['usu_id'])) ? $_SESSION['usu_id'] : ''); ?>"/></td>
      <td valign="bottom" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" align="left" nowrap="nowrap" class="menu002">
		
			  Msg.: <?php 
				if (isset($_SESSION['DBERRO'])){
					echo($erro[0][$_SESSION['DBERRO']]);  
					unset($_SESSION['DBERRO']);
				}
		  ?>
		</td>
      <td valign="bottom" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td width="14" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="51" colspan="2" align="left" nowrap="nowrap">
       
        <input name="Financiamentos" type="submit" class="form_button" id="Financiamentos" form="form_financiamentos" formmethod="POST" accesskey="g" value="Salvar" />
            </td>
      <td valign="bottom" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td height="20" nowrap="nowrap">&nbsp;</td>
      <td height="20">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    </table>
</form>
			<?php } ?> 
  </div>
</body>
</html>