<?php require_once('erros.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html >
<head>
	<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
		<table width="500" border="0" align="center" cellpadding="10" cellspacing="2" >
				<tr>
		<td  align="center"  valign="middle" ><span class="fontx">Grupo 23 - Ocorrência de Erro.</span></td>
	  </tr>
			<tr>
		<td  align="center"  valign="middle" ><span class="fontx"><?php echo( $erro[0][''.$_SESSION['ERRO'].'']); ?></span></td>
	  </tr>
	</table>

</body>
</html>
