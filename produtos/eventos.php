<?php
require_once('./connections/config.php');
require_once('./connections/mssql_con.php'); 
header('Content-type: text/html; charset=utf-8');
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
	#div_eventos{
		z-index: 0;
   		width: auto;
		padding-top: 15px;
		padding-bottom: 30px;
		padding-left: 50px;
		padding-right: 50px;
		display : flex;
        flex-direction : row;


	}
	#prop{
	position:absolute;
	top: 50px;
	z-index: 5;
	width: 45%;
	height:50%;
	left:30%;
	}
	#img_logox {
	width:100%;
	height:auto;
	object-fit:cover;
	}
    
</style>
<link href="../css/estilo.css" rel="stylesheet" type="text/css">
<title></title>
</head>

<body>
	<div id="div_eventos" >
		<table width="100%" border="0" cellspacing="3" cellpadding="0">
		<tbody>
		<tr>
		<td width="10%" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
		<tbody>
		<tr>
		<td nowrap="nowrap">
			<div class="containerxx buttonxx">
			<a href="?" class="fontxx ">Home</a>
			</div> 
		</td>
		</tr>
		<tr>
		  <td nowrap="nowrap">
			 <div class="containerxx buttonxx"> 
			  <a href="?pg=15&tp=10&ev=3" class="fontxx ">Localizar</a> 
			</div>
			</td>
		  </tr>
		<tr>
		<td nowrap="nowrap">
			<?php if ($_SESSION['usu_tipo']=='0'){ ?>
			<div class="containerxx buttonxx">
			<a href="?pg=15&tp=10&ev=0" class="fontxx ">Add Eventos</a>
			</div> 
			<?php } else { echo '&nbsp;';}?>	
		</td>
		</tr>
		<tr>
		<td nowrap="nowrap">
			<?php if ($_SESSION['usu_tipo']=='0'){ ?>
			<div class="containerxx buttonxx">
				<a href="?pg=15&tp=10&ev=1" class="fontxx ">Enviar</br>Convites</a>
			</div>
			<?php } else { echo '&nbsp;';}?>	
		</td>
		</tr>
		<tr>
		  <td nowrap="nowrap">&nbsp;</td>	 
		  </tr>
		<tr>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		</tbody>
		</table></td>
		<td width="90%" align="left" valign="top">
			
			<?php
				$pg = (isset( $_GET['ev'] )) ? $_GET['ev'] : ''; 
			    $tpu= (isset( $_GET['tpu'] )) ? $_GET['tpu'] : ''; 
								
					switch ($pg){
							
						case "0":
							$pg = 'eventosCad';
							break;
						case "1" : 
							$pg = 'convitesCad';
							break;
						case "2" : 
							$pg = 'conviteEmail';
							break;
						case "3" : 
							$pg = 'propagandas';
							break;
						case "4" :
							if ($tpu=='0'){$pg = 'contato_prop';}
							if ($tpu=='1'){$pg = 'contato_prop1';}
                            if ($tpu=='2'){$pg = 'contato_prop2';}
                            if ($tpu=='3'){$pg = 'contato_prop3';}
							break;
					}

				if ($pg==''){
					echo '<div id="prop"><img src="./images/inicio_prop.png" id="img_logox" border="0"/></div>';
			
				}elseif (file_exists('produtos/'.$pg.'.php')){
				include 'produtos/'.$pg.'.php';
				} elseif (file_exists($pg.'.php')){
				include $pg.'.php';	
				} else{
				
			     echo '<div id="prop"><img src="./images/inicio_prop.png" id="img_logox" border="0"/></div>';
					//<div id="prop"><img src="../images/inicio_prop.png" alt="" id="img_logox" border="0"/></div>
				
				}
				?>
		
		</td>
		</tr>
		</tbody>
		</table>
		
		
	</div>
</body>
</html>