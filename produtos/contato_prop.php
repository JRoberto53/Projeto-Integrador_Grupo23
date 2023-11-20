<?php 

require_once('./connections/config.php');
require_once('./erro/erros.php'); 
require_once('./connections/mssql_con.php'); 

header('Content-type: text/html; charset=utf-8');

 function formataTelefone($numero){
        if(strlen($numero) == 10){
            $novo = substr_replace($numero, '(', 0, 0);
            $novo = substr_replace($novo, '9', 3, 0);
            $novo = substr_replace($novo, ')', 3, 0);
        }else{
            $novo = substr_replace($numero, '(', 0, 0);
            $novo = substr_replace($novo, ')', 3, 0);
        }
        return $novo;
    }


if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
} else {

	
$eve_codigo = "";
$eve_nome = "";
$eve_dtinicio = "";
$eve_hrinicio = "";
$eve_hrduracao = "";
$eve_descricao = "";
$eve_regiao = "";
$eve_uf = "";
$eve_tipoambiente = "";
$eve_qtdconvidado = "";
$eve_qtdcadeira = "";
$eve_vlringresso = "";
$eve_tipoparticular = "";
$eve_locambiente = "";
$eve_locambiente_sn = "";
$eve_locsom = "";
$eve_locsom_sn = "";
$eve_locseguranca = "";
$eve_locseguranca_sn = "";
$eve_locbuffet = "";
$eve_locbuffet_sn = "";
$eve_locgarcon = "";
$eve_locgarcon_sn = "";
$eve_crediario = "";
$usu_nome = "";
$usu_telefone = "";
$usu_celular = "";
$usu_whatsapp = "";
$usu_email = "";
$eve_seguradora = "";
	
	//$usu_email = $_SESSION["usu_email"];
			$eve_usuid =(isset($_GET["id"])) ? $_GET["id"] : '';
			$sql = "SELECT * FROM dbo.eve_eventos e INNER JOIN dbo.usu_usuario u ON e.eve_usuid = u.usu_id  WHERE eve_usuid='".$eve_usuid."'";
			$stmt = sqlsrv_query( $conn, $sql );
			while( $select = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
				
				
					$eve_codigo = trim(utf8_encode($select["eve_codigo"]));
					$eve_nome = trim(utf8_encode($select["eve_nome"]));
					$eve_dtinicio = trim(utf8_encode($select["eve_dtinicio"]));
					$eve_hrinicio = trim(utf8_encode($select["eve_hrinicio"]));
					$eve_hrduracao = trim(utf8_encode($select["eve_hrduracao"]));
					$eve_descricao = trim(utf8_encode($select["eve_descricao"]));
					$eve_regiao = trim(utf8_encode($select["eve_regiao"]));
					$eve_uf = trim(utf8_encode($select["eve_uf"]));
					$eve_tipoambiente = trim(utf8_encode($select["eve_tipoambiente"]));
					$eve_qtdconvidado = trim(utf8_encode($select["eve_qtdconvidado"]));
					$eve_qtdcadeira = trim(utf8_encode($select["eve_qtdcadeira"]));
					$eve_vlringresso = trim(utf8_encode($select["eve_vlringresso"]));
					$eve_tipoparticular = trim(utf8_encode($select["eve_tipoparticular"]));
					$eve_locambiente = trim(utf8_encode($select["eve_locambiente"]));
					$eve_locambiente_sn = trim(utf8_encode($select["eve_locambiente_sn"]));
					$eve_locsom = trim(utf8_encode($select["eve_locsom"]));
					$eve_locsom_sn = trim(utf8_encode($select["eve_locsom_sn"]));
					$eve_locseguranca = trim(utf8_encode($select["eve_locseguranca"]));
					$eve_locseguranca_sn = trim(utf8_encode($select["eve_locseguranca_sn"]));
					$eve_locbuffet = trim(utf8_encode($select["eve_locbuffet"]));
					$eve_locbuffet_sn = trim(utf8_encode($select["eve_locbuffet_sn"]));
					$eve_locgarcon = trim(utf8_encode($select["eve_locgarcon"]));
					$eve_locgarcon_sn = trim(utf8_encode($select["eve_locgarcon_sn"]));
					$eve_crediario = trim(utf8_encode($select["eve_crediario"]));
                    $eve_seguradora = trim(utf8_encode($select["eve_seguradora"]));
					$usu_nome = trim(utf8_encode($select["usu_nome"]));
					$usu_telefone = trim(utf8_encode($select["usu_telefone"]));	
					$usu_celular = trim(utf8_encode($select["usu_celular"]));	
					$usu_whatsapp = trim(utf8_encode($select["usu_whatsapp"]));	
					$usu_email = trim(utf8_encode($select["usu_email"]));	
				}

				
				$tipoA0="";
				$tipoA1="";
				$tipoA2="";
				switch ($eve_tipoambiente){
					case "0":
						$tipoA0 = "checked=\"checked\"";
						break;
					case "1":
						$tipoA1 = "checked=\"checked\"";
						break;
					case "2":
						$tipoA2 = "checked=\"checked\"";
						break;
				}
				$tipoP0="";
				$tipoP1="";
				switch ($eve_tipoparticular){
					case "0":
						$tipoP0 = "checked=\"checked\"";
						break;
					case "1":
						$tipoP1 = "checked=\"checked\"";
						break;
				}	
				$locamb0="";
				$locamb1="";
				switch ($eve_locambiente_sn){
					case "0":
						$locamb0 = "checked=\"checked\"";
						break;
					case "1":
						$locamb1 = "checked=\"checked\"";
						break;
				}
				$locsom0="";
				$locsom1="";
				switch ($eve_locsom_sn){
					case "0":
						$locsom0 = "checked=\"checked\"";
						break;
					case "1":
						$locsom1 = "checked=\"checked\"";
						break;
				}	
				$locseg0="";
				$locseg1="";
				switch ($eve_locseguranca_sn){
					case "0":
						$locseg0 = "checked=\"checked\"";
						break;
					case "1":
						$locseg1 = "checked=\"checked\"";
						break;
				}
				$locbuf0="";
				$locbuf1="";
				switch ($eve_locbuffet_sn){
					case "0":
						$locbuf0 = "checked=\"checked\"";
						break;
					case "1":
						$locbuf1 = "checked=\"checked\"";
						break;
				}
				$locgar0="";
				$locgar1="";
				switch ($eve_locgarcon_sn){
					case "0":
						$locgar0 = "checked=\"checked\"";
						break;
					case "1":
						$locgar1 = "checked=\"checked\"";
						break;
				}
}

?>
<!DOCTYPE html >
<html >
<head>

<title></title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<SCRIPT language=javascript>
	
function VerificaCampox(form) 
{
	if (form.conv_nome.value.length < 1) 
	{
	alert("Digite o nome do convidado.");
	form.conv_nome.focus();
	return false;	
	}
	if (form.conv_email.value.length < 1) 
	{
	alert("Digite o e-mail do convidado.");
	form.conv_email.focus();
	return false;	
	}

		
}
// Initialization for ES Users
</SCRIPT>
</head>
	
<body>

	
	<div class="form_form" >	
		  <?php if (isset($_SESSION["usu_id"])==""){
			if (file_exists('../erro/error.php')){
			$_SESSION['ERRO'] = '002';
			include '../erro/error.php';	
			}

		} elseif (isset($_SESSION["usu_tipo"])=="2"){ ?>
		
	 <form  action="?pg=15&tp=10&ev=2"  ID="form_contato_prop" name="form_contato_prop"  method="post" STYLE="word-spacing: 0; text-indent: 0; margin: 0; " onSubmit="return VerificaCampox(this)">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
    <tr style="border: 1px solid #CCC;">
      <td height="30" colspan="2" nowrap="nowrap" class="fundo1">&nbsp;<strong>Dados do Anunciante</strong></td>
      </tr>
    <tr>
      <td width="25" align="left" nowrap="nowrap">&nbsp;</td>
      <td width="1565" height="38" align="left" valign="middle" nowrap="nowrap" class="menu002">
        <table width="100%" border="0" cellspacing="4" cellpadding="0">
          <tbody>
            <tr>
              <td width="4%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Código : <?php echo (str_pad(intval($eve_codigo), 3, '0', STR_PAD_LEFT)); ?></td>
              <td width="12%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Evento: <?php echo $eve_nome; ?></td>
              <td width="6%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Data início: <?php echo $eve_dtinicio; ?></td>
              <td width="6%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Hora de início: <?php echo $eve_hrinicio; ?></td>
              <td width="72%" height="20" nowrap="nowrap" class="form_button">&nbsp;&nbsp;Duração: <?php echo $eve_hrduracao.' hr' ; ?></td>
            </tr>
            </tbody>
        </table>
		  <table width="100%" border="0" cellspacing="4" cellpadding="0">
    <tbody>
      <tr>
        <td width="12%" height="20" nowrap="nowrap">&nbsp;&nbsp;Descrição do Evento: <span class="menu002d"><?php echo $eve_descricao; ?></span></td>
        <td width="12%" height="20" nowrap="nowrap">&nbsp;&nbsp;Região: <span class="menu002d"><?php echo $eve_regiao; ?></span></td>
        <td width="6%" height="20" nowrap="nowrap">&nbsp;&nbsp;Estado/UF: <span class="menu002d"><?php echo $eve_uf; ?></span></td>
        <td width="22%" height="20" align="left" nowrap="nowrap" class="menu002">&nbsp;&nbsp;Tipo de Ambiente: <span class="menu002d">
          <?php 
					if ($tipoA0 !=""){ echo 'Aberto'; }
					elseif ($tipoA1 !=""){ echo 'Fechado'; }							 
					elseif ($tipoA2 !=""){ echo 'Misto'; }									 
			?>
        </span></td>
        <td width="48%" height="20" nowrap="nowrap">&nbsp;</td>
      </tr>
    </tbody>
  </table>
		  <table width="100%" border="0" cellspacing="4" cellpadding="0">
		    <tbody>
		      <tr>
		        <td width="10%" height="20" nowrap="nowrap">&nbsp;&nbsp;Qtd. Convidados: <span class="menu002d"><?php echo $eve_qtdconvidado; ?></span></td>
		        <td width="8%" height="20" nowrap="nowrap">&nbsp;&nbsp;Qtd. Cadeiras: <span class="menu002d"><?php echo $eve_qtdcadeira; ?></span></td>
		        <td width="16%" height="20" nowrap="nowrap">&nbsp;&nbsp;Valor do Ingresso: <span class="menu002d">R$ <?php echo $eve_vlringresso; ?></span></td>
		        <td width="3%" height="20" nowrap="nowrap">&nbsp;&nbsp;
		          <?php 
					if ($tipoP0 !=""){ echo 'Evento Particular'; }
					elseif ($tipoP1 !=""){ echo 'Evento Livre ao Público'; }							 
 				    ?></td>
		        <td width="63%" height="20" nowrap="nowrap">&nbsp; </td>
	          </tr>
	        </tbody>
	      </table>
		  <table width="100%" border="0" cellspacing="4" cellpadding="0">
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap">&nbsp;</td>
		      <td>&nbsp;</td>
		      <td align="left" valign="middle">&nbsp;</td>
	        </tr>
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap" class="menu002d">Deseja Locar:</td>
		      <td width="6%" align="right" valign="middle">&nbsp;</td>
		      <td width="70%" align="left" valign="middle">&nbsp;</td>
	        </tr>
		    <tr>
		      <td width="11%" height="20" align="left" nowrap="nowrap" class="menu002">Ambiente</td>
		      <td width="13%" height="20">&nbsp;<?php if ($eve_locambiente_sn == '0'){ echo '<span class="menu002d">&#8226;&#8226;Em Aberto</span>';} else { echo 'Finalizado';} ?> </td>
		      <td width="6%" align="left" valign="middle">Nome: 
	            
              <td width="70%" align="left" valign="middle" class="menu002d"><?php echo $usu_nome; ?>              
</tr>
		    <tr>
		      <td height="20" align="left" nowrap="nowrap" class="menu002">Equipamento de Som</td>
		      <td height="20">&nbsp;<?php if ($eve_locsom_sn == '0'){ echo '<span class="menu002d">&#8226;&#8226;Em Aberto</span>';} else { echo 'Finalizado';} ?> </td>
		      <td align="left" valign="middle">Telefone:              
	            
              <td align="left" valign="middle" class="menu002d"><?php echo formataTelefone($usu_telefone); ?>               
</tr>
		    <tr>
		      <td height="20" align="left" nowrap="nowrap" class="menu002">Equipe de Seguranças</td>
		      <td height="20">&nbsp;<?php if ($eve_locseguranca_sn == '0'){ echo '<span class="menu002d">&#8226;&#8226;Em Aberto</span>';} else { echo 'Finalizado';} ?></td>
		      <td align="left" valign="middle">Celular:              
	            
              <td align="left" valign="middle" class="menu002d"><?php echo formataTelefone($usu_celular); ?>&nbsp;<?php if ($usu_whatsapp == 'checked'){ echo '<img src="./images/whatsapp.png" width="20" height="20" alt=""/>'; }  ?>               
            </tr>
		    <tr>
		      <td height="20" align="left" nowrap="nowrap" class="menu002">Buffet</td>
		      <td height="20">&nbsp;<?php if ($eve_locbuffet_sn == '0'){ echo '<span class="menu002d">&#8226;&#8226;Em Aberto</span>';} else { echo 'Finalizado';} ?></td>
		      <td align="left" valign="middle">E-mail: </td>
	          <td align="left" valign="middle" class="menu002d"><?php echo $usu_email; ?></td>
		    </tr>
		    <tr>
		      <td height="20" align="left" nowrap="nowrap" class="menu002">Garçons Freelancers</td>
		      <td height="20">&nbsp;<?php if ($eve_locgarcon_sn == '0'){ echo '<span class="menu002d">&#8226;&#8226;Em Aberto</span>';} else { echo 'Finalizado';} ?></td>
		      <td align="left" valign="middle">Seguradora: </td>
		      <td align="left" valign="middle" class="menu002d">&nbsp;
                <?php if ($eve_seguradora == 'checked'){ echo '<img src="/pi_facu/images/ico40_garantia.png" width="" height="" alt="" style="vertical-align: middle;"/>' . '  Seguradora Contratada.'; } ?>
            
                </td>
		    </tr>
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap"><input form="form_eventosCad" type="hidden" name="eve_usuid" id="eve_usuid" accesskey="g" value="<?php echo((isset($_SESSION['usu_id'])) ? $_SESSION['usu_id'] : ''); ?>"/></td>
		      <td align="right" valign="middle">&nbsp;</td>
		      <td align="left" valign="middle">&nbsp;</td>
	        </tr>
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap">Msg.:
		        <?php 
					if (isset($_SESSION['DBERRO'])){
					echo($erro[0][$_SESSION['DBERRO']]);  
					unset($_SESSION['DBERRO']);
					}
					?></td>
		      <td align="right" valign="middle">&nbsp;</td>
	          <td align="left" valign="middle">&nbsp;</td>
		    </tr>
		    <tr>
		      <td height="20" colspan="2" nowrap="nowrap">&nbsp;</td>
		      
			  <td align="right" valign="middle">&nbsp;</td>
		      <td align="left" valign="middle">&nbsp;</td>
		    </tr>
	      </table></td>
    </tr>
    </table>
  
    </form>
			<?php } ?> 
  </div>
			
</body>
</html>