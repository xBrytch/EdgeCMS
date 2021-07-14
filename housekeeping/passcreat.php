<?php
require_once("../inc/core.god.php");
require_once("../inc/hk_session.php");
require_once("../inc/plugins/vendor/autoload.php");

if(UserH == FALSE) {
    header("Location: " . $Holo['url'] ."/".$Holo['panel']."");
	exit;
}

if(Loged == TRUE && UserH == TRUE) {
if($myrow['rank'] >= $Holo['hkr_manager']) {



?>
<!DOCTYPE html>
<html lang="fr-FR" >
<head>
    <meta charset="utf-8"/>

    <title><?php echo $Holo['name']; ?> - Administração</title>
	<link rel="icon" type="image/png" href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/images/favicon.ico" />
    <meta name="description" content="Panel administrateur <?php echo $Holo['name']; ?> Hotel">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <style>
     html {overflow-y: scroll;}
     .toast {
       opacity: 1 !important;
     }

     #toast-container > div {
       opacity: 1 !important;
     }

     .modal-open{
       margin-right:0px !important;
     }
   </style>

   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/select2.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/toastr.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/line-awesome.css?v=8" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/flaticon.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/flaticon2.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/fontawesome.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/vendors.bundle.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/style.bundle.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/css/wizard.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/jstree.bundle.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/js/web/user_settings.js" type="text/javascript"></script>
  
   <script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
</head>
<body class="kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed">

   <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
      <div class="kt-header-mobile__toolbar">
         <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
         <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
      </div>
   </div>

   <div class="kt-grid kt-grid--hor kt-grid--root">
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
         <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<?php require_once("../housekeeping/MWW/header.php"); ?>
			
            <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
               <div class="kt-container  kt-grid kt-grid--ver">
                  <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
                  <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
				    <?php require_once("../housekeeping/MWW/navbar.php"); ?>
                  </div>
                  <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                     <div class="kt-container  kt-grid__item kt-grid__item--fluid" style="margin-top:30px">
                      
<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
           <div class="kt-portlet__head-label">
              <span class="kt-portlet__head-icon">
              <i class="kt-font-brand flaticon-customer"></i>
              </span>
              <h3 class="kt-portlet__head-title">Gerar / alterar um passe para uma equipe</h3>
           </div>
        </div>
		
<div class="kt-portlet">

<?php				  
if(isset($_POST['staffname']) && isset($_POST['staffmail']))
{
	if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {	
    $staffname = filtro($_POST['staffname']);
    $staffmail = filtro($_POST['staffmail']);

    $Checkuser = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '". $staffname ."' AND mail = '". $staffmail ."'");
    $userrr = mysqli_fetch_assoc($Checkuser);

    if(empty($staffname) || empty($staffmail))
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Não deixe os campos em branco.
	</div></div></div>";
    }
	elseif($staffname != $userrr['username'])
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Nome de usuário incorreto</div></div></div>";
    }
	elseif($myrow['rank'] < $userrr['rank'])
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Você não pode gerar / alterar um passe para esse usuário, ele tem um rank maior ou igual ao seu.
		</div></div></div>";
    }
	elseif($userrr['rank'] < 4)
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>Você não pode gerar um passe para um usuário que ainda não faz parte da equipe.
		</div></div></div>";
    }
    elseif($staffmail != $userrr['mail'])
    {
		echo "<div class='form-group form-group-last'><div class='alert alert-danger' role='alert'><div class='alert-text'>O email está incorreto.
		</div></div></div>";
    }
    else
    {
        function passegenerator($nbChar){
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1, $nbChar); 
                                        }	
	    $generatedpasse = passegenerator(15);
		$hotelreset = $Holo['name'];
		
        mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'Passegenerate', note = 'Atribuiu um passe à: ". $staffname ."', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
	    mysqli_query(connect::cxn_mysqli(),"UPDATE users SET passcode = '". HashSecurBis($generatedpasse) ."' WHERE username = '". $staffname ."' AND mail = '". $staffmail ."'");
        // Create the Transport
        $transport = (new Swift_SmtpTransport(SMTP_HOST, SMTP_PORT))        ### SMTP HOST and PORT
          ->setUsername(SMTP_USERNAME)                                      ### SMTP MAIL
          ->setPassword(SMTP_PASSWORD)                                      ### SMTP PASS
		  ->setEncryption(SMTP_ENCRYPTION)                                  ### SMTP Encryption (null / ssl / tls)
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Seu novo passe de equipe
		' . $Holo['name'] .''))
          ->setFrom([SMTP_USERNAME => "$hotelreset"])
          ->setTo(["$staffmail" => "$staffname"])
		  ->setBody(
            '<html>' .
            ' <body>' .
			'  Hey ' . $staffname . ' !<br>' .
            '  <br>Aqui está o seu novo passe de equipe
			:<br><b>' . $generatedpasse . '</b><br>' .
			"  <br><i>Observe o email e o exclua permanentemente este e-mail. Você também pode alterar acessando a seção de administração, 				Alterar minha senha.
			</i>" .
            '  <br><br>PS: Esta é uma mensagem automática, por favor não responda.
			' .
            ' </body>' .
            '</html>',
            'text/html' // Mark the content-type as HTML
                   );

        // Send the message
        $result = $mailer->send($message);
		echo "<div class='kt-portlet__body'><div class='form-group form-group-last'><div class='alert alert-success' role='alert'><div class='alert-text'>O passe da equipe foi gerado! Ele irá recebê-lo por e-mail em
		<b><u></u>$staffmail</b></div></div></div></div>";
    }
	} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Token de segurança inválido, relogue.</div>";
    }
}
?>

			<form class="kt-form" action="" method="post">
				<div class="kt-portlet__body">
					<div class="form-group form-group-last">
						<div class="alert alert-secondary" role="alert">
							<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
						  	<div class="alert-text">
								O novo passe será gerado aleatoriamente. Pergunte se o email associado à sua conta é válido, pois o novo passe pessoal será enviado para o email dele. Se não for este o caso, peça-lhe que coloque um email válido nas configurações da sua conta.
							</div>
						</div>
					</div>
					<div class="form-group">
                        <label>Nome do staff:</label>
                        <input class="form-control" type="text" name="staffname" required>
                    </div>

                    <div class="form-group">
                        <label>eMail do staff:</label>
                        <input class="form-control" type="text" name="staffmail" required>
                    </div>
					<input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" name="dar" class="btn btn-success">Gerar e enviar</button>
						<button type="reset" class="btn btn-secondary">Cancelar</button>
					</div>
				</div>
			</form>
		</div>
</div>

			
</div></div></div>
	</div>
</div>

                  </div>
               </div>
            </div>
			
<?php require_once("../housekeeping/MWW/footer.php"); ?>
			
         </div>
      </div>
	  
	  
   </div>

   <div id="kt_scrolltop" class="kt-scrolltop"><font color="#FFFFFF" size="4"><b>^</b></font></div>

   <script src="https://use.fortawesome.com/349cfdf6.js"></script>
   <script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/js/vendors.bundle.js" type="text/javascript"></script>
   <script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/js/scripts.bundle.js" type="text/javascript"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   <script>if (window.module) module = window.module;</script>
   
</body>
</html>
<?PHP } else { 
               header("Location: " . $Holo['url'] . "/");
	           exit;
             } } else {
                        header("Location: " . $Holo['url'] . "/");
	                    exit;
                      } ?>