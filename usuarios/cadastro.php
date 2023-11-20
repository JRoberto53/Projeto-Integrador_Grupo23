<?php 
require_once('./erro/erros.php'); 
header('Content-type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<SCRIPT language=javascript>
function VerificaCampox(form) 
{
	if (form.usu_cordial.value.length < 1) 
	{
	alert("Como gostaria de ser chamado? Escolha um nome curto.");
	form.usu_cordial.focus();
	return false;	
	}
	if (form.usu_email.value.length < 1) 
	{
	alert("Digite um e-mail válido.");
	form.usu_email.focus();
	return false;	
	}
	if (form.usu_email1.value.length < 1) 
	{
	alert("Confirme seu e-mail.");
	form.usu_email1.focus();
	return false;	
	}
	if (form.usu_senha.value.length < 1) 
	{
	alert("Digite uma senha de acesso.");
	form.usu_sennha.focus();
	return false;
	}
	
	if (form.usu_senha1.value.length < 1) 
	{
	alert("Confirme a senha.");
	form.usu_senha1.focus();
	return false;
	}
	if (form.usu_email.value != form.usu_email1.value) 
	{
	alert("Os e-mails que foram digitados são diferentes.");
	form.usu_e-mail.focus();
	return false;
	}
	if (form.usu_senha.value != form.usu_senha1.value) 
	{
	alert("As senhas que foram digitadas são diferentes.");
	form.usu_senha.focus();
	return false;
	}
		
}
</SCRIPT>
</head>

<body>
	<div class="form_form">	
		  <?php if (isset($_SESSION["usu_id"])!=""){
			if (file_exists('./erro/error.php')){
			$_SESSION['ERRO'] = '001';
			include './erro/error.php';	
			}

		} else { ?>
	<form  action="usuarios/cadastrarV.php"  ID="form_cadastro" name="form_cadastro"  method="post" STYLE="word-spacing: 0; text-indent: 0; margin: 0; " onSubmit="return VerificaCampox(this)">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr style="border: 1px solid #CCC;">
      <td width="22" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="3" nowrap="nowrap" class="menu002b"><strong>&nbsp;Novo Cadastro</strong></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" valign="bottom" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="right">&nbsp;</td>
      <td height="20" colspan="2" valign="bottom" class="menu002">*Como gostaria de ser chamado?</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td height="20" align="right">&nbsp;</td>
      <td height="20" colspan="2" valign="bottom" class="menu002"><input name="usu_cordial" type="text" class="campoB" id="usu_cordial" accesskey="u" size="10" maxlength="20" /></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" valign="bottom" class="menu002">*E-mail</td>
    </tr>
    <tr>
      <td width="22" align="right" nowrap="nowrap">&nbsp;</td>
      <td width="65" height="20" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2" valign="bottom" class="menu002"><input name="usu_email" type="text" class="campoB" id="usu_email" accesskey="u" size="15" maxlength="20" /></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right">&nbsp;</td>
      <td height="20" colspan="2" valign="bottom" class="menu002">*Confirme seu e-mail</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right">&nbsp;</td>
      <td height="20" colspan="2" valign="bottom" class="menu002"><input name="usu_email1" type="text" class="campoB" id="usu_email1" accesskey="u" size="15" maxlength="20" /></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" nowrap="nowrap">&nbsp;</td>
      <td width="70" height="20">*<span class="menu002">Senha</span></td>
      <td>*<span class="menu002">Confirme a senha</span></td>
    </tr>
    <tr>
      <td width="22" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="20"><input name="usu_senha" type="password" class="campoB" id="usu_senha" accesskey="s" size="8" maxlength="20" /></td>
		<td height="20"class="menu002">  <input name="usu_senha1" type="password" class="campoB" id="usu_senha1" accesskey="s" size="8" maxlength="20" />
		</td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="72" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="72" colspan="2" align="left" valign="middle" class="menu002"><p>
        <label class="menu002">
          <input name="usu_tipo" type="radio" id="usu_tipo_0" form="form_cadastro" value="0" checked="checked" />
          Novo Usuário</label>
     
        <label class="menu002">
          <input name="usu_tipo" type="radio" id="usu_tipo_1" form="form_cadastro" value="1" <?php if (isset($_GET["x"])=="1"){?> checked="checked"<?php }?> />
          Novo Fornecedor</label>
     
        <label class="menu002">
          <input name="usu_tipo" type="radio" id="usu_tipo_2" form="form_cadastro" value="2" />
          Nova Financeira</label>
     
        <label class="menu002">
          <input name="usu_tipo" type="radio" id="usu_tipo_3" form="form_cadastro" value="3" />
          Nova Seguradora
        </label>
      </p></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">&nbsp;</td>
      <td height="31" align="right" nowrap="nowrap">&nbsp;</td>
      <td height="31" colspan="2" align="left" valign="middle" class="menu002">&nbsp;
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
      <td height="20" colspan="2" valign="bottom" class="menu002"><input name="CadastroV" type="submit" class="form_button" id="CadastroV" form="form_cadastro" accesskey="g" value="Validar Cadastro" /></td>
    </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td height="20" nowrap="nowrap">&nbsp;</td>
      <td height="20" colspan="2">&nbsp;</td>
    </tr>
    </table>
</form>
			<?php } ?> 
  </div>
</body>
</html>