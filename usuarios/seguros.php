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
			$seg_usuid =(isset($_SESSION["usu_id"])) ? $_SESSION["usu_id"] : '';
			$sql = "SELECT * FROM dbo.seg_seguradora WHERE seg_usuid='".$seg_usuid."'";
			$stmt = sqlsrv_query( $conn, $sql );
			$seg_pfisica = "";
			$seg_pjuridica = "";
			$seg_segtotal = "";
			$seg_segparcial = "";
			$seg_segespecial = "";


	
			while( $select = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
					$seg_pfisica = trim(utf8_encode($select["seg_pfisica"]));
					$seg_pjuridica = trim(utf8_encode($select["seg_pjuridica"]));
					$seg_segtotal = trim(utf8_encode($select["seg_segtotal"]));
					$seg_segparcial = trim(utf8_encode($select["seg_segparcial"]));
					$seg_segespecial = trim(utf8_encode($select["seg_segespecial"]));
					
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
		
	<form  action="?pg=segurosAdd"  ID="form_seguros" name="form_seguros"  method="post" STYLE="word-spacing: 0; text-indent: 0; margin: 0; " onSubmit="return VerificaCampox(this)">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
    <tr style="border: 1px solid #CCC;">
      <td width="11" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" nowrap="nowrap" class="menu002b"><strong>Tipos de Seguros</strong> &nbsp;</td>
      <td width="993" height="20" nowrap="nowrap" class="menu002b">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="fundo1">&nbsp;&#8226; Seguros para:</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="fundo1">&nbsp;&#8226; Tipo de Seguros:</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="seg_pfisica" type="checkbox" id="seg_pfisica" form="form_seguros" <?php echo $seg_pfisica;?>>
		  &#8226;
        Pessoas Físicas
          <label for="fin_pfisica"></label></td>
      <td width="399" height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="seg_segtotal" type="checkbox" id="seg_segtotal" form="form_seguros" <?php echo $seg_segtotal;?>>
        &#8226; Seguro Total (100% dos encargos)</td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="seg_pjuridica" type="checkbox" id="seg_pjuridica" form="form_seguros" <?php echo $seg_pjuridica;?>>
        &#8226;
<label for="fin_pjuridica">Pessoas Jurídicas</label></td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="seg_segparcial" type="checkbox" id="seg_segparcial" form="form_seguros" <?php echo $seg_segparcial;?>>
        &#8226; Seguro Parcial (40% dos encargos)</td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <input name="seg_segespecial" type="checkbox" id="seg_segepecial" form="form_seguros" <?php echo $seg_segespecial;?> >

        &#8226; Seguro Especial * (Abaixo) </td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td width="11" align="right" nowrap="nowrap">&nbsp;</td>
      <td width="173" height="109" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="109" align="justify"  valign="top" class="menu002" > <br> * Adquirindo o SEGURO ESPECIAL, você tem a garantia que o seu evento vai acontecer, você apenas programa a data, tipo de evento e a lista de convidados, o resto é por nossa conta. <BR>
              <BR>Você acompanha o andamento do seu evento a qualquer momento desejado, verifica se está de acordo com seu gosto e pode alterar qualquer detalhe desejado.</td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" align="left" nowrap="nowrap" class="menu002">
        <input form="form_seguros" type="hidden" name="seg_usuid" id="seg_usuid" accesskey="g" value="<?php echo((isset($_SESSION['usu_id'])) ? $_SESSION['usu_id'] : ''); ?>"/></td>
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
      <td width="11" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="51" colspan="2" align="left" nowrap="nowrap">
       
        <input name="Seguros" type="submit" class="form_button" id="Seguross" form="form_seguros" formmethod="POST" accesskey="g" value="Salvar" />
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