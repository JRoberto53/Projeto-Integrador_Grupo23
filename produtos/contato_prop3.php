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

		    //$usu_email = $_SESSION["usu_email"];
			$usu_id =(isset($_GET["id"])) ? $_GET["id"] : '';
			$sql = "SELECT * FROM dbo.usu_usuario u INNER JOIN dbo.seg_seguradora g ON u.usu_id = g.seg_usuid WHERE usu_id='".$usu_id."'";
			$stmt = sqlsrv_query( $conn, $sql );
			while( $select = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
			$usu_nome=trim(utf8_encode($select["usu_nome"]));
			$usu_cnpj= trim(utf8_encode($select["usu_cnpj"]));
			$usu_iestadual=trim(utf8_encode($select["usu_iestadual"]));
			$usu_website=trim(utf8_encode($select["usu_website"]));
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
			$usu_email=trim(utf8_encode($select["usu_email"]));
			$usu_tipo=trim(utf8_encode($select["usu_tipo"]));	
            $seg_pfisica=trim(utf8_encode($select["seg_pfisica"]));
            $seg_pjuridica=trim(utf8_encode($select["seg_pjuridica"]));
            $seg_segtotal=trim(utf8_encode($select["seg_segtotal"]));
            $seg_segparcial=trim(utf8_encode($select["seg_segparcial"]));
            $seg_segespecial=trim(utf8_encode($select["seg_segespecial"]));
			}
		}						
				
				$usu_tipo0="";
				$usu_tipo1="";
				$usu_tipo2="";
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
      <td height="30" colspan="3" nowrap="nowrap" class="fundo1">&nbsp;<strong>Dados do Anunciante</strong></td>
      </tr>
    <tr>
      <td width="20" rowspan="3" align="left" nowrap="nowrap">&nbsp;</td>
      <td width="648" height="38" align="left" nowrap="nowrap"><table width="100%" border="0" cellspacing="4" cellpadding="0">
        <tbody>
          <tr>
            <td width="90" height="30" align="left" valign="baseline" nowrap="nowrap" class="fontxx">&nbsp;&nbsp;Código : <?php echo (str_pad(intval("1"), 3, '0', STR_PAD_LEFT)); ?></td>
            <td width="1455" height="30" align="left" valign="baseline" nowrap="nowrap" class="fontx">&nbsp;&nbsp;S E G U R A D O R A -  Especializada em SEGUROS para Eventos em Geral.<strong></strong></td>
          </tr>
        </tbody>
      </table></td>
      <td width="908" height="38" rowspan="3" align="left" valign="top" nowrap="nowrap" class="menu002">
          
          <table width="49%" border="0" align="left" cellspacing="3">
    
          <tr>
            <td width="336" height="41">&nbsp;</td>
          </tr>
          <tr>
            <td class="fontx">(*) Seguro Especial:</td>
          </tr>
          <tr>
            <td width="336" height="285" align="left" valign="top">
               Adquirindo o SEGURO ESPECIAL, você tem a garantia que o seu <BR>
                evento vai acontecer, você apenas programa a data, tipo de <BR>
                evento e a lista de convidados, o resto é por nossa conta. <BR>
              <BR>Você acompanha o andamento do seu evento a qualquer <BR>
                momento desejado, verifica se está de acordo com <BR>
                seu gosto e pode alterar qualquer detalhe desejado.
              
              </td>
          </tr>
          <tr>
            <td height="24">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
    
      </table></td>
    </tr>
    <tr>
      <td height="88" align="left" nowrap="nowrap"><table width="100%" border="0" cellspacing="4" cellpadding="0">
        <tbody>
          <tr>
            <td height="20" nowrap="nowrap" class="fundo1">&nbsp;Atendemos:</td>
            <td width="1" height="20" nowrap="nowrap">&nbsp;</td>
            <td height="20" align="left" nowrap="nowrap" class="fundo1">&nbsp;Tipos de seguros:</td>
            </tr>
          <tr>
            <td width="134" height="20" nowrap="nowrap"><?php if ($seg_pfisica == 'checked')
            { echo '<img src="./images/ico_ok.png" width="22" height="22" alt="" style="vertical-align: middle;"/>'; }
            else
            { echo '<img src="./images/ico_no.png" width="22" height="22" alt="" style="vertical-align: middle;"/>'; }
            ?>
              &nbsp;
              Pessoas Físicas</td>
            <td width="1" height="20" nowrap="nowrap">&nbsp;</td>
            <td width="217" align="left" nowrap="nowrap" class="menu002"><?php if ($seg_segtotal == 'checked')
            { echo '<img src="./images/ico_ok.png" width="22" height="22" alt="" style="vertical-align: middle;"/>'; }
            else
            { echo '<img src="./images/ico_no.png" width="22" height="22" alt="" style="vertical-align: middle;"/>'; }
            ?>
              &nbsp; Seguro Total 100% do Valor Gasto</td>
            </tr>
          <tr>
            <td width="134" height="20" nowrap="nowrap"><?php if ($seg_pjuridica == 'checked')
            { echo '<img src="./images/ico_ok.png" width="22" height="22" alt="" style="vertical-align: middle;"/>'; }
            else
            { echo '<img src="./images/ico_no.png" width="22" height="22" alt="" style="vertical-align: middle;"/>'; }
            ?>
              &nbsp;            
              Pessoas Jurídicas</td>
            <td width="1" height="20" nowrap="nowrap">&nbsp;</td>
            <td width="217" align="left" nowrap="nowrap" class="menu002"><?php if ($seg_segparcial == 'checked')
            { echo '<img src="./images/ico_ok.png" width="22" height="22" alt="" style="vertical-align: middle;"/>'; }
            else
            { echo '<img src="./images/ico_no.png" width="22" height="22" alt="" style="vertical-align: middle;"/>'; }
            ?>
              &nbsp;             
              Seguro Parcial 40% do Valor Gasto</td>
            </tr>
          <tr>
            <td width="134" height="20" nowrap="nowrap">&nbsp;</td>
            <td width="1" height="20" nowrap="nowrap">&nbsp;</td>
            <td width="217" align="left" nowrap="nowrap" class="menu002"><?php if ($seg_segespecial == 'checked')
            { echo '<img src="./images/ico_ok.png" width="22" height="22" alt="" style="vertical-align: middle;"/>'; }
            else
            { echo '<img src="./images/ico_no.png" width="22" height="22" alt="" style="vertical-align: middle;"/>'; }
            ?>
              &nbsp;             
              Seguro Especial  (*)</td>
            </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="left" nowrap="nowrap"><table width="100%" border="0" cellspacing="4" cellpadding="0">
        <tr>
          <td height="20" align="left" valign="middle">      
          <td align="left" valign="middle" nowrap="nowrap" class="menu002d">      
          <td height="20" align="left" valign="middle">      
          <td width="312" rowspan="6" align="center" valign="middle" nowrap="nowrap" class="menu002d"></tr>
        <tr>
          <td width="85" height="20" align="left" valign="middle">Razão Social: 
            
          <td width="110" align="left" valign="middle" nowrap="nowrap" class="menu002d"><?php echo $usu_nome; ?>
          <td width="121" height="20" align="left" valign="middle">          </tr>
        <tr>
          <td height="20" align="left" valign="middle">Telefone:              
            
          <td align="left" valign="middle" nowrap="nowrap" class="menu002d"><?php echo formataTelefone($usu_telefone); ?>
          <td height="20" align="left" valign="middle">          </tr>
        <tr>
          <td height="20" align="left" valign="middle">Celular:              
            
          <td align="left" valign="middle" nowrap="nowrap" class="menu002d"><?php echo formataTelefone($usu_celular); ?>&nbsp;
            <?php if ($usu_whatsapp == 'checked'){ echo '<img src="./images/whatsapp.png" width="20" height="20" alt=""/>'; }  ?>
          <td height="20" align="left" valign="middle">          </tr>
        <tr>
          <td align="left" valign="middle">E-mail: </td>
          <td align="left" valign="middle" nowrap="nowrap" class="menu002d"><?php echo $usu_email; ?></td>
          <td align="left" valign="middle">&nbsp;</td>
          </tr>
        <tr>
          <td height="20" nowrap="nowrap">&nbsp;</td>
          <td align="right" valign="middle">&nbsp;</td>
          <td align="right" valign="middle">&nbsp;</td>
          </tr>
        <tr>
          <td height="20" colspan="4" nowrap="nowrap">Msg.:
            <?php 
					if (isset($_SESSION['DBERRO'])){
					echo($erro[0][$_SESSION['DBERRO']]);  
					unset($_SESSION['DBERRO']);
					}
					?></td>
        </tr>
        <tr>
          <td height="20" nowrap="nowrap">&nbsp;</td>
          <td align="right" valign="middle">&nbsp;</td>
          <td align="right" valign="middle">&nbsp;</td>
          <td align="left" valign="middle" nowrap="nowrap">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    </table>
  
    </form>
			<?php } ?> 
  </div>
			
</body>
</html>