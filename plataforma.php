<?php 

header('Content-type: text/html; charset=utf-8');

?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
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
<form  action=""  ID="form_plataforma" name="form_plataforma"  method="post" STYLE="word-spacing: 0; text-indent: 0; margin: 0; " onSubmit="return VerificaCampox(this)">
  <div class="form_form">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td height="51" colspan="5" align="center" valign="middle" nowrap="nowrap" class="menu002b">Nossa Plataforma</td>
    </tr>
    <tr>
      <td width="6%" nowrap="nowrap">&nbsp;</td>
      <td width="5%" nowrap="nowrap">&nbsp;</td>
      <td colspan="2" align="center" valign="middle" class="fontx" style="background-color:#247FEA; border-radius: 7px; padding:10px;"> <p style="text-align: justify; line-height: 1.3;"> &nbsp;&nbsp;&nbsp;&nbsp;Sistema especializado na organiza&ccedil;&atilde;o de eventos, estamos aqui direcionar e facilitar seu acesso a um grande cadastro de empresas que reduzir&aacute; seu trabalho nas tarefas para a realiza&ccedil;&atilde;o do seu evento, n&atilde;o perca tempo procurando pre&ccedil;os e  empresas do ramo, somos associados &agrave; v&aacute;rias empresas prontas para garantir o sucesso do seu evento.</p></td>
      <td width="5%" nowrap="nowrap">&nbsp; </td>
    </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap">&nbsp;</td>
      <td width="78%" valign="bottom" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td width="6%" valign="bottom" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td valign="bottom" nowrap="nowrap" class="menu002">&nbsp;</td>
      </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td colspan="2" class="fontx" style="background-color:#247FEA; border-radius: 7px; text-align: justify; padding:10px;"><p style="text-align: justify; line-height: 1.3;"> &nbsp;&nbsp;&nbsp;&nbsp;Acompanhe diretamente por aqui todas as fases no planejamento, custos, envio de convites, layout do local, tudo  personalizado  para que seu projeto tenha o maior sucesso.</p></td>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap">&nbsp;</td>
      </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap">&nbsp;</td>
      <td valign="bottom" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td valign="bottom" nowrap="nowrap" class="menu002">&nbsp;</td>
      <td valign="bottom" nowrap="nowrap" class="menu002">&nbsp;</td>
    </tr>
    <tr>
      <td nowrap="nowrap">&nbsp;</td>
      <td nowrap="nowrap">&nbsp;</td>
      <td colspan="2" class="fontx" style="background-color:#247FEA; border-radius: 7px; text-align: justify; padding:10px;"><p style="text-align: justify; line-height: 1.3;"> &nbsp;&nbsp;&nbsp;&nbsp;&ldquo;N&atilde;o basta fazer uma festa incr&iacute;vel, &eacute; preciso gerenci&aacute;-la de forma extraordin&aacute;ria para que se torne inesquec&iacute;vel.&rdquo;</p></td>
      <td valign="bottom" nowrap="nowrap" class="menu002">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="5" nowrap="nowrap">&nbsp;</td>
      </tr>
    </table>
	</div>
</form>
</body>
</html>