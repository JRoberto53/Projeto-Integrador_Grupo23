<?php
require_once('./connections/config.php');
header('Content-type: text/html; charset=utf-8');
function random_color1($start = 0x000000, $end = 0xFFFFFF) {
   return sprintf('#%06x', mt_rand($start, $end));
}

//pg 15 página eventos.php
//tp 10 pasta produtos

	if (!isset($CARREGA_FORM)){
	$pg =(isset($_GET['pg'])) ? $_GET['pg'] : '' ;
	$tp = (isset($_GET['tp'])) ? $_GET['tp'] : '' ;
	$CARREGA = '';	
	switch ($tp){
		case '10':
			$CARREGA = 'produtos/';
			break;
		default:
			$CARREGA = '';
			break;	
	}	
	
	switch ($pg){
		case '15':
			$CARREGA = $CARREGA . 'eventos.php';
			break;
		default:
			$CARREGA = 'iniciar.php';
			break;	
	}
	$CARREGA_FORM = $CARREGA;
	}

?>



<!DOCTYPE html >
<html >
<head>

<script type="text/javascript" src="js/js_1.9/jquery-1.8.2.js"></script>  
<script type="text/javascript" src="js/js_1.9/jquery-ui-1.9.1.custom.min.js"></script>
<title>PI - Grupo 23 II</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="logo"><img src="images/logo_2.png" alt="" width="330" height="101" id="img_logo" border="0"/></div>

	
	
<div class="box">
    <div class="header">
        <img src="images/logo_traco.png" width="100%" height="100px" alt="" border="0"/>
    </div>
	<div id="segurados">
		<table width="9%" border="0" cellpadding="0" cellspacing="0">
		  <tbody>
		    <tr>
		      <td align="center" valign="middle" class="fontx" style="color:cornsilk;">Seu Evento</td>
	        </tr>
		    <tr>
		      <td align="center" valign="middle"><img src="./images/selo_garantia.png" width="120" height="78" alt=""/></td>
	        </tr>
		    <tr valign="top">
		      <td align="center" valign="middle" class="fontx" style="color:color:cornsilk;">Garantido</td>
	        </tr>
	      </tbody>
	  </table>
	</div>
    <div class="content">
        <?php if (isset($_SESSION['usu_id']) !== "") { 
		 include $CARREGA_FORM;
	   } else { 
		   include $CARREGA_FORM;
	  }   
         ?>
    </div>
    <div class="footer">
       <img src="images/logo_traco.png" width="100%" height="100px" alt="" border="0"/>
    </div>
</div>	
	
<div class="div_login" >
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
      <tr>
        <td colspan="2" align="center" valign="middle" nowrap="nowrap" class="fontx">Bem-vindo</td>
      </tr>
      <tr>
        <td height="42" colspan="2" align="center" valign="middle"><div id="div_ft" class="div_foto"><img src="images/foto_usu.png" alt="" width="44" height="44" id="usu_foto" border="0"/></div></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle" nowrap="nowrap" class="menu002a"><?php if (isset($_SESSION['usu_cordial'])){echo(utf8_encode($_SESSION['usu_cordial']));}else {echo('&nbsp;');} ?> </td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle" class="menu002a"><?php if (isset($_SESSION['usu_tipox'])){echo("&#8226; " . $_SESSION['usu_tipox']." &#8226;".$_SESSION['usu_id']);}else {echo('&nbsp;');} ?> </td>
      </tr>
		<?php {if (isset($_SESSION['usu_tipo'])&& $_SESSION['usu_id'] !== "" ){?>
			 <tr>
        <td align="right" valign="middle" nowrap="nowrap">
			<div class="botao1"><A href="?pg=<?php echo $_SESSION['usu_tipo']; ?> " class="link_claro" >Editar</A></div>
		 </td>
        <td align="left" valign="middle" nowrap="nowrap"><div style="margin-left: 2px;" class="botao1"><A href="usuarios/logout.php" class="link_claro" >Sair</A></div></td>
      </tr>
		<?php }else {?>
				<tr>
        <td colspan="2" align="center" valign="middle" nowrap="nowrap" ><div style="margin-right: 2px;" class="botao1"><A href="?pg=login" class="link_claro">Entrar</A></div></td>
      </tr>

	
		<?php }}?>
    </tbody>
  </table>
	
</div>

	
</body>

	
</html>