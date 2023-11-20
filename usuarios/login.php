
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript">
function VerificaCampox(form) 
{
	if (form.usu_email.value.length < 1) 
	{
	alert("O campo e-mail é obrigatório.");
	form.usu_email.focus();
	return false;	
	}
	
	if (form.usu_senha.value.length < 1) 
	{
	alert("É necessário digitar a sua senha de acesso.");
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
	
	<form  action="usuarios/login_exec.php"  ID="form_login" name="form_login"  method="post" STYLE="word-spacing: 0; text-indent: 0; margin: 0; " onSubmit="return VerificaCampox(this)">
 	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" >
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td colspan="2" valign="bottom" nowrap="nowrap" class="menu002b">&nbsp;</td>
      </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td colspan="2" valign="bottom" nowrap="nowrap" class="menu002b">&nbsp;</td>
      </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td colspan="2" valign="bottom" nowrap="nowrap" class="menu002b">Login de Usu&aacute;rio</td>
      </tr>
    <tr>
      <td width="12%" nowrap="nowrap">&nbsp;</td>
      <td width="4%" nowrap="nowrap">&nbsp;</td>
      <td width="84%" nowrap="nowrap">&nbsp;</td>
      </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td valign="bottom" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td valign="bottom" nowrap="nowrap" class="menu002">* e-mail</td>
      </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap"><input name="usu_email" type="text" class="campoB" id="usu_email" accesskey="u" autocomplete="on" size="40" maxlength="50" /></td>
      </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td valign="bottom" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td valign="bottom" nowrap="nowrap" class="menu002">* senha</td>
      </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap"><input name="usu_senha" type="password" class="campoB" id="usu_senha" accesskey="s" size="15" maxlength="20" /></td>
      </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap" class="menu002">&nbsp;</td>
      <td height="30" nowrap="nowrap" class="menu002"><input name="Logar" type="submit" class="form_button" id="Logar" accesskey="g" value="Login" /></td>
      </tr>
    <tr>
      <td height="30" colspan="3" align="center" valign="middle" nowrap="nowrap" class="menu002">Esqueceu a senha? 
		  	<a href="#" style="font-weight: bold;">Clique Aqui!</a> | 
	    	<a href="?pg=cadastro" style="font-weight: bold;">Novo Cadastro</a></td>
      </tr>
    <tr>
      <td height="30" colspan="3" nowrap="nowrap" class="menu002">&nbsp;</td>
      </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap">&nbsp;</td>
      <td height="30" nowrap="nowrap">&nbsp;</td>
      </tr>
  </table>
	
</form>
	<?php } ?> 
	  </div>
</body>
</html>