<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<title></title>
<style type="text/css">
	#div_iniciar{
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
	position:fixed;
	top: 16px;
	z-index: 1000;
	width: 50%;
	height:90%;
	left: 45%;
}

	#img_logox {
                width:100%;
                height:auto;
                object-fit:cover;
}
	
    		h1{
	  font: normal 18px Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif" ;
	  font-style:italic ;
	  font-weight: bold;
	  text-decoration: none;
	  color: #000000;
	  text-align:right;
    }
		    h2{
	  font: normal 18px Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif" ;
	  font-style: normal;
	  font-weight: bold;
	  text-decoration: none;
	  color: #000000;
	  text-align:center;
    }

		    h3{
	  font: normal 18px Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif" ;
	  font-style: italic ;
	  font-weight: bold;
	  text-decoration: none;
	  color: #000000;
	  text-align:left;
    }


</style>
</head>

<body >
	
<div id="div_iniciar" >
  <table width="100%" height="400"  border="0" align="center" cellpadding="0" cellspacing="3">
    <tbody align="center">
      <tr>
        <td height="50" align="center" valign="top"><blockquote>
          <blockquote>
              <h1><p>Organizar um evento pode ser uma tarefa complexa e exigir 
				  muito tempo e esfor&ccedil;o, desde a escolha do local, fornecedores 
				  adequados e a gest&atilde;o dos convidados.</p></h1>

        </blockquote></td>
        <td width="50%" height="100%" rowspan="4" align="center" valign="top" >

				<?php
				$pg = (isset( $_GET['pg'] )) ? $_GET['pg'] : null; 
			
									
					switch ($pg){
							
						case "0":
							$pg = 'perfil';
							break;
						case "1" : 
							$pg = 'fornecedor';
							break;
						case "2" : 
							$pg = 'financeira';
							break;
						case "3" : 
							$pg = 'seguradora';
							break;
					}

				if ($pg==''){

				?>
					<div id="prop"><img src="images/inicio_prop.png" alt="" id="img_logox" border="0"/></div>
					
				<?php
				}elseif (file_exists('usuarios/'.$pg.'.php')){
				include 'usuarios/'.$pg.'.php';
				} elseif (file_exists($pg.'.php')){
				include $pg.'.php';	
				} else{
				?>
					<div id="prop"><img src="images/inicio_prop.png" alt="" id="img_logox" border="0"/></div>
				<?php 
				}
				?>
		
		  </td>
      </tr>
      <tr align="center" valign="top">
        <td height="50" valign="middle">
			<blockquote>
              <h2><p>Deixem isto conosco!</p></h2>

        </blockquote>
	    </td>
      </tr>
      <tr align="center" valign="top">
        <td height="150">
			
			 <h3>
			
			<blockquote> 
			  Temos as equipes certas para gerir todas as etapas: 
				 
			    <blockquote>  
				&#8226;&nbsp;Controle financeiro obedecendo os limites de gastos. <br>
			    &#8226;&nbsp;Execu&ccedil;&atilde;o do projeto em conjunto com empresas voltadas para cada etapa do evento.<br>
			    &#8226;&nbsp;Convites personalizados e normas internas que garantem a seguran&ccedil;a dos participantes.
				
		    </blockquote></blockquote>
      		</h3>
	    </td>
      </tr>
      <tr align="center" valign="top">
        <td>
			<table align="center" cellpadding="3" cellspacing="3">
          <tbody>
            <tr>
              <td colspan="6" class="menu002">&nbsp;</td>
              </tr>
            <tr>
              <td>
					<div class="containerxx buttonxx">
						<a href="?pg=plataforma" class="fontxx ">Quero</br>Conhecer</a>
					</div>  
				</td>
              <td>
			  	<div class="containerxx buttonxx">
					<a href="?pg=login" class="fontxx ">Entrar</br>Novo Cadastro</a>
					</div> 
				</td>
              <td>
					<div class="containerxx buttonxx">
						<a href="?pg=cadastro&x=1" class="fontxx ">Quero ser um</br>Fornecedor</a>
					</div> 
				</td>
	<?php 
	$btx = (isset($_SESSION['usu_tipo'])) ? $_SESSION['usu_tipo'] : '';
	if($btx == 0){ 
	?>
              <td>
				<div class="containerxx buttonxx">
				<a href="./?pg=15&tp=10" class="fontxx ">Adicionar</br>Eventos</a>
				</div> 
			  </td>
    <?php } elseif($btx == 1 || $btx == 2) { ?>
              <td>
				<div class="containerxx buttonxx">
				<a href="./?pg=15&tp=10" class="fontxx ">Localizar</br>Clientes</a>
				</div> 
			  </td>
	<?php } ?>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table></td>
      </tr>
    </tbody>
  </table>
	


</div>
		
</body>
</html>