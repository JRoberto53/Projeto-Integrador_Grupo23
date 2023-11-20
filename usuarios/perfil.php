<?php 

require_once('./connections/config.php');
require_once('./erro/erros.php'); 
require_once('./connections/mssql_con.php'); 

header('Content-type: text/html; charset=utf-8');

if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
} else {
	
		    //$usu_email = $_SESSION["usu_email"];
			$usu_email =(isset($_SESSION["usu_email"])) ? $_SESSION["usu_email"] : '';
			$sql = "SELECT * FROM dbo.usu_usuario WHERE usu_email='".$usu_email."'";
			$stmt = sqlsrv_query( $conn, $sql );
			while( $select = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
				$usu_nome=trim(utf8_encode($select["usu_nome"]));
				$usu_cpf=trim(utf8_encode($select["usu_cpf"]));
				$usu_rg=trim(utf8_encode($select["usu_rg"]));
				$usu_cep=trim(utf8_encode($select["usu_cep"]));
				$usu_rua=trim(utf8_encode($select["usu_rua"]));
				$usu_numero=trim(utf8_encode($select["usu_numero"]));
				$usu_complemento=trim(utf8_encode($select["usu_complemento"]));
				$usu_bairro=trim(utf8_encode($select["usu_bairro"]));
				$usu_cidade=trim(utf8_encode($select["usu_cidade"]));
				$usu_uf=trim(utf8_encode($select["usu_uf"]));
				$usu_telefone=trim(utf8_encode($select["usu_telefone"]));
				$usu_celular=trim(utf8_encode($select["usu_celular"]));
				$usu_whatsapp=trim(utf8_encode($select["usu_whatsapp"]));
				$usu_tipo=trim(utf8_encode($select["usu_tipo"]));
				}
		}						
				
				$usu_tipo0="";
				$usu_tipo1="";
				$usu_tipo2="";
				$usu_tipo3="";
				switch ($usu_tipo){
					case "0":
						$usu_tipo0 = "checked=\"checked\"";
						break;
					case "1":
						$usu_tipo1 = "checked=\"checked\"";
						break;
					case "2":
						$usu_tipo2 = "checked=\"checked\"";
						break;
					case "3":
						$usu_tipo3 = "checked=\"checked\"";
						break;
			

	sqlsrv_close($conn);
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
	<div class="form_form">	
		  <?php if (isset($_SESSION["usu_id"])==""){
			if (file_exists('./erro/error.php')){
			$_SESSION['ERRO'] = '002';
			include './erro/error.php';	
			}

		} else { ?>
	<form  action="usuarios/cadastrarP.php"  ID="form_perfil" name="form_cadastro"  method="post" STYLE="word-spacing: 0; text-indent: 0; margin: 0; " onSubmit="return VerificaCampox(this)">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
    <tr style="border: 1px solid #CCC;">
      <td width="22" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" nowrap="nowrap" class="menu002b"><strong>&nbsp;Perfil do Usu&aacute;rio</strong></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" valign="bottom" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="right" class="menu002">Nome </td>
      <td height="20" valign="bottom" class="menu002"><input name="usu_nome" type="text" class="campoB" id="usu_nome" form="form_perfil" accesskey="u" size="40" maxlength="50" value="<?php echo $usu_nome;?>" /></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="right" class="menu002">CPF </td>
      <td height="20" valign="bottom" class="menu002"><input name="usu_cpf" type="text" class="campoB" id="usu_cpf" form="form_perfil" accesskey="u" size="15" maxlength="20" value="<?php echo $usu_cpf;?>"/></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" nowrap="nowrap" class="menu002">RG </td>
      <td height="20" valign="bottom" class="menu002"><input name="usu_rg" type="text" class="campoB" id="usu_rg" form="form_perfil" accesskey="u" size="15" maxlength="20" value="<?php echo $usu_rg;?>"/> 
        CEP 
        <input name="usu_cep" type="text" class="campoB" id="usu_cep" form="form_perfil" accesskey="u" size="10" maxlength="10" value="<?php echo $usu_cep;?>"/></td>
    </tr>
    <tr>
      <td width="22" align="right" nowrap="nowrap">&nbsp;</td>
      <td width="65" height="20" align="right" nowrap="nowrap" class="menu002">End/Rua </td>
      <td height="20" valign="bottom" class="menu002"><input name="usu_rua" type="text" class="campoB" id="usu_rua" form="form_perfil" accesskey="u" size="40" maxlength="50" value="<?php echo $usu_rua;?>"/></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" class="menu002">N&uacute;mero </td>
      <td height="20" valign="bottom" class="menu002"><input name="usu_numero" type="text" class="campoB" id="usu_numero" form="form_perfil" accesskey="u" size="5" maxlength="10" value="<?php echo $usu_numero;?>"/> 
        Complemento 
        <input name="usu_complemento" type="text" class="campoB" id="usu_complemento" form="form_perfil" accesskey="u" size="20" maxlength="50" value="<?php echo $usu_complemento;?>"/></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" class="menu002">Bairro </td>
      <td height="20" valign="bottom" class="menu002"><input name="usu_bairro" type="text" class="campoB" id="usu_bairro" form="form_perfil" accesskey="u" size="40" maxlength="50" value="<?php echo $usu_bairro;?>"/></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" nowrap="nowrap" class="menu002">Cidade </td>
      <td height="20"><span class="menu002">
        <input name="usu_cidade" type="text" class="campoB" id="usu_cidade" form="form_perfil" accesskey="u" size="20" maxlength="50" value="<?php echo $usu_cidade;?>"/>
      </span> <span class="menu002">UF
      <label for="usu_uf">:</label>
      </span>
      <select name="usu_uf" size="1" id="usu_uf" form="form_perfil">
		  		<option >----</option>
		  		<option value="<?php echo $usu_uf; ?>" selected ><?php echo $usu_uf; ?></option> 
				<option value="AC">AC</option>
				<option value="AL">AL</option>
				<option value="AP">AP</option>
				<option value="AM">AM</option>
				<option value="BA">BA</option>
				<option value="CE">CE</option>
				<option value="DF">DF</option>
				<option value="ES">ES</option>
				<option value="GO">GO</option>
				<option value="MA">MA</option>
				<option value="MT">MT</option>
				<option value="MS">MS</option>
				<option value="MG">MG</option>
				<option value="PA">PA</option>
				<option value="PB">PB</option>
				<option value="PR">PR</option>
				<option value="PE">PE</option>
				<option value="PI">PI</option>
				<option value="RJ">RJ</option>
				<option value="RN">RN</option>
				<option value="RS">RS</option>
				<option value="RO">RO</option>
				<option value="RR">RR</option>
				<option value="SC">SC</option>
			    <option value="SP">SP</option>	
				<option value="SE">SE</option>
				<option value="TO">TO</option>
		        

      </select></td>
      </tr>
    <tr>
      <td width="22" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" nowrap="nowrap" class="menu002">Tel. </td>
      <td height="20"><input name="usu_telefone" type="text" class="campoB" id="usu_telefone" form="form_perfil" accesskey="g" size="10" maxlength="20" value="<?php echo $usu_telefone;?>" />
        <span class="menu002">        Cel.</span>
        <input name="usu_celular" type="text" class="campoB" id="usu_celular" form="form_perfil" accesskey="g" size="10" maxlength="20" value="<?php echo $usu_celular;?>"/> 
		  <input name="usu_whatsapp" type="checkbox" id="usu_whatsapp" form="form_perfil" <?php echo $usu_whatsapp;?>/>
        <label for="usu_whatsapp" class="menu002">WhatsApp</label></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
	  <td height="31" align="right" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="31" align="left" nowrap="nowrap" class="menu002">
        <div style="width: 160px; padding-top: 10px;" >
          <fieldset >
            
              <legend><strong>* Tipo de Perfil  *</strong></legend>
            
            
              <label class="menu002">
                <input name="usu_tipo" type="radio" id="usu_tipo_0" form="form_perfil" value="0"  <?php echo $usu_tipo0; ?>/>
                Usuário</label>
              <label class="menu002">
                <input name="usu_tipo" type="radio" id="usu_tipo_1" form="form_perfil" value="1" <?php echo $usu_tipo1; ?>/>
                Fornecedor</label>
              <label class="menu002">
                <input name="usu_tipo" type="radio" id="usu_tipo_2" form="form_perfil" value="2" <?php echo $usu_tipo2; ?>/>
                Financeira </label>
			  <label class="menu002">
              <input name="usu_tipo" type="radio" id="usu_tipo_3" form="form_perfil" value="3" <?php echo $usu_tipo3; ?>/>
              Seguradora </label>
            
			  </br>Ao alterar esta opção, faça o login novamente.
        </fieldset></div></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="31" align="right" nowrap="nowrap" class="menu002">Msg.:</td>
      <td height="31" align="left" valign="middle" class="menu002">&nbsp;
        <?php 
				if (isset($_SESSION['DBERRO'])){
					echo($erro[0][$_SESSION['DBERRO']]);  
					unset($_SESSION['DBERRO']);
				}
		  ?>
        </td>
    </tr>
    <tr>
      <td width="22" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" valign="bottom" class="menu002">
		  
		  <input name="Perfil" type="submit" class="form_button" id="Perfil" form="form_perfil" accesskey="g" value="Salvar" />
		  <input form="form_perfil" type="hidden" name="usu_email" id="usu_email" accesskey="g" value="<?php echo((isset($_SESSION['usu_email'])) ? $_SESSION['usu_email'] : ''); ?>"/>
				 </td>
    </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td height="20" nowrap="nowrap">&nbsp;</td>
      <td height="20">&nbsp;</td>
    </tr>
    </table>
</form>
			<?php } ?> 
  </div>
</body>
</html>