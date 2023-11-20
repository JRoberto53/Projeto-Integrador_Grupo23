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
			$ser_usuid =(isset($_SESSION["usu_id"])) ? $_SESSION["usu_id"] : '';
			$sql = "SELECT * FROM dbo.ser_servicos WHERE ser_usuid='".$ser_usuid."'";
			$stmt = sqlsrv_query( $conn, $sql );
			$ser_local = "";
			$ser_totpessoa = "";
			$ser_m2 = "";
			$ser_banheiro = "";
			$ser_cozinha = "";
			$ser_palco = "";
			$ser_estacionamento = "";
			$ser_playground = "";
			$ser_camarim = "";
			$ser_picinaadulto = "";
			$ser_picinainfantil = "";
			$ser_cadeira = "";
			$ser_camarote = "";
			$ser_descr = "";
			$ser_seguradora = "";

	
			while( $select = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
					$ser_local=trim(utf8_encode($select["ser_local"]));
					$ser_totpessoa=trim(utf8_encode($select["ser_totpessoa"]));
					$ser_m2=trim(utf8_encode($select["ser_m2"]));
					$ser_banheiro=trim(utf8_encode($select["ser_banheiro"]));
					$ser_cozinha=trim(utf8_encode($select["ser_cozinha"]));
					$ser_palco=trim(utf8_encode($select["ser_palco"]));
					$ser_estacionamento=trim(utf8_encode($select["ser_estacionamento"]));
					$ser_playground=trim(utf8_encode($select["ser_playground"]));
					$ser_camarim=trim(utf8_encode($select["ser_camarim"]));
					$ser_picinaadulto=trim(utf8_encode($select["ser_picinaadulto"]));
					$ser_picinainfantil=trim(utf8_encode($select["ser_picinainfantil"]));
					$ser_cadeira=trim(utf8_encode($select["ser_cadeira"]));
					$ser_camarote=trim(utf8_encode($select["ser_camarote"]));
					$ser_descr=trim(utf8_encode($select["ser_descr"]));
					$ser_seguradora=trim(utf8_encode($select["ser_seguradora"]));

				}
							
				
				$ser_tipo0="";
				$ser_tipo1="";
				$ser_tipo2="";
				switch ($ser_local){
					case "0":
						$ser_tipo0 = "checked=\"checked\"";
						break;
					case "1":
						$ser_tipo1 = "checked=\"checked\"";
						break;
					case "2":
						$ser_tipo2 = "checked=\"checked\"";
						break;
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
		
	<form  action="?pg=ambientesAdd"  ID="form_ambientes" name="form_ambientes"  method="post" STYLE="word-spacing: 0; text-indent: 0; margin: 0; " onSubmit="return VerificaCampox(this)">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
    <tr style="border: 1px solid #CCC;">
      <td width="8" nowrap="nowrap">&nbsp;</td>
      <td height="20" nowrap="nowrap" class="menu002b"><strong>Locação de Ambientes</strong> &nbsp;</td>
      <td height="20" align="right" nowrap="nowrap" class="menu002b">&nbsp;<span class="menu002">Local n° : 
		  
		  
          <select name="ser_num" id="ser_num" form="form_ambientes">
            
         
<?php

if( $conn === false) {
die( print_r( sqlsrv_errors(), true));
} else {

//$usu_email = $_SESSION["usu_email"];
$ser_usuid = (isset($_SESSION["usu_id"])) ? $_SESSION["usu_id"] : '';
$sql = "SELECT * FROM ser_servicos WHERE ser_usuid= ?";
$params = array($ser_usuid);
$stmt = sqlsrv_query( $conn, $sql, $params );
$x = 0;
	

if ($stmt === false) { 

} else {  


while( $select = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
$x = $select["ser_num"];
echo "<option value=\"".$select["ser_num"]."\">".(str_pad(intval($x), 3, '0', STR_PAD_LEFT))."</option>";
}	

}
	if ($x==0){echo "<option value=\"1\">001</option>";} 
}						

?>
          </select>
      </span></td>
      <td height="20" nowrap="nowrap" class="menu002b">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="38" colspan="3" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <p>
          
          <input name="ser_local" type="radio" id="RadioGroup1_1" form="form_ambientes" value="0" <?php echo $ser_tipo0; ?>>
          <label>Local Aberto</label>
        
          <input name="ser_local" type="radio" id="RadioGroup1_2" form="form_ambientes" value="1" <?php echo $ser_tipo1; ?>>
          <label>Local Fechado</label>
        
          <input name="ser_local" type="radio" id="RadioGroup1_3" form="form_ambientes" value="2" <?php echo $ser_tipo2; ?>>
          <label>Local Aberto/Fechado</label>
      </p></td>
      </tr>
    <tr>
      <td align="right">&nbsp;</td>
		
      <td height="20" colspan="2" align="right" valign="middle" class="menu002">
		  <img src="/pi_facu/images/ico_garantia.png"  width="60" height="39" alt="Evento Garantido" style="vertical-align: middle;" />Trabalhamos com Seguradoras
        <input name="ser_seguradora" type="checkbox" id="ser_seguradora" form="form_ambientes" <?php echo $ser_seguradora;?>>
		
		
		</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002"><label for="ser_m2">M²:</label>
        <input name="ser_m2" type="text" id="ser_m2" form="form_ambientes" value="<?php echo $ser_m2; ?>" size="15" maxlength="10"/></td>
      <td height="20" align="right" valign="middle" nowrap="nowrap" class="menu002"> Qtd. total de pessoas  
        <input name="ser_totpessoa" type="text" id="ser_totpessoa" form="form_ambientes" value="<?php echo $ser_totpessoa;?>" size="10" maxlength="10"></td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
      </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">Banheiros </td>
      <td width="194" height="20" align="right" valign="middle" class="menu002">Qtd. 
        <input name="ser_banheiro" type="text" id="ser_banheiro" form="form_ambientes" value="<?php echo $ser_banheiro;?>" size="10" maxlength="10"/></td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">Cozinhas / Copa</td>
      <td height="20" align="right" valign="middle" class="menu002">Qtd.
        <input name="ser_cozinha" type="text" id="ser_cozinha" form="form_ambientes" value="<?php echo $ser_cozinha;?>" size="10" maxlength="10"/></td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">Palco</td>
      <td height="20" align="right" valign="middle" class="menu002">Qtd. Áreas
        <input name="ser_palco" type="text" id="ser_palco" form="form_ambientes" value="<?php echo $ser_palco;?>" size="10" maxlength="10"/></td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td width="8" align="right" nowrap="nowrap">&nbsp;</td>
      <td width="270" height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">Estacionamento</td>
      <td height="20" align="right" valign="middle" class="menu002">Qtd. Veículos
        <input name="ser_estacionamento" type="text" id="ser_estacionamento" form="form_ambientes" value="<?php echo $ser_estacionamento;?>" size="10" maxlength="10"/> </td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">PlayGround</td>
      <td height="20" align="right" valign="middle" class="menu002">Qtd. Áreas
        <input name="ser_playground" type="text" id="ser_playground" form="form_ambientes" value="<?php echo $ser_playground;?>" size="10" maxlength="10"/></td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">Camarim</td>
      <td height="20" align="right" valign="middle" class="menu002">Qtd. Áreas
        <input name="ser_camarim" type="text" id="ser_camarim" form="form_ambientes" value="<?php echo $ser_camarim;?>" size="10" maxlength="10"/></td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">Picina Adulto</td>
      <td height="20" align="right" valign="middle"><span class="menu002">Qtd. Áreas
          <input name="ser_picinaadulto" type="text" id="ser_picinaadulto" form="form_ambientes" value="<?php echo $ser_picinaadulto;?>" size="10" maxlength="10"/>
      </span></td>
      <td align="left" valign="middle">&nbsp;</td>
      </tr>
    <tr>
      <td width="8" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="left" valign="middle" nowrap="nowrap" class="menu002">Picina Infantil</td>
      <td height="20" align="right" valign="middle"><span class="menu002">Qtd.
           Áreas
        <input name="ser_picinainfantil" type="text" id="ser_picinainfantil" form="form_ambientes" <?php echo $ser_picinainfantil;?> size="10" maxlength="10">
      </span></td>
      <td align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="31" align="left" valign="middle" nowrap="nowrap" class="menu002">Cadeiras</td>
      <td height="31" align="right" valign="middle" class="menu002">Qtd.
        <input name="ser_cadeiras" type="text" id="ser_cadeiras" form="form_ambientes" <?php echo $ser_cadeira;?> size="10" maxlength="10"/></td>
      <td align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="31" align="left" valign="middle" nowrap="nowrap" class="menu002">Camarotes</td>
      <td height="31" align="right" valign="middle" class="menu002">Qtd. Áreas
        <input name="ser_camarotes" type="text" id="ser_camarotes" form="form_ambientes" <?php echo $ser_camarote;?> size="10" maxlength="10"/></td>
      <td align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="31" colspan="2" align="left" valign="middle" nowrap="nowrap" class="menu002">Breve descrição do local:</td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="31" colspan="2" align="left" valign="middle" nowrap="nowrap" class="menu002">
		  <textarea name="ser_descr" cols="70" rows="5" maxlength="50" class="menu002" id="ser_descr" form="form_ambientes"/><?php echo $ser_descr;?></textarea></td>
      <td align="left" valign="middle" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" valign="bottom" class="menu002">&nbsp;</td>
      <td valign="bottom" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" align="left" nowrap="nowrap" class="menu002">Formas de pagamento: <strong>Boleto / Cartão de Crédito / Pix / Financeiras.</strong>
		<input form="form_ambientes" type="hidden" name="ser_usuid" id="ser_usuid" accesskey="g" value="<?php echo((isset($_SESSION['usu_id'])) ? $_SESSION['usu_id'] : ''); ?>"/></td>
      <td valign="bottom" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" align="left" valign="middle" nowrap="nowrap" class="menu002">&nbsp;</td>
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
      <td width="8" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" align="left" nowrap="nowrap">
       
        <input name="Ambientes" type="submit" class="form_button" id="Ambientes" form="form_ambientes" formmethod="POST" accesskey="g" value="Salvar Ambiente" />
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