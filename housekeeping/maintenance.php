<?php
require_once("../inc/core.god.php");
require_once("../inc/hk_session.php");

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

    <title><?php echo $Holo['name']; ?> - Manutenção</title>
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
              <i class="kt-font-brand flaticon2-settings"></i>
              </span>
              <h3 class="kt-portlet__head-title">Manutenção</h3>
           </div>
        </div>
		
<?php
if(isset($_POST['motivo']))
{
if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {
$Motivo = filtrolow($_POST['motivo']);

if(empty($Motivo))
{
echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-danger" role="alert"><div class="alert-text">Algo deu errado, tente novamente.
</div></div></div></div>';
} else {
mysqli_query(connect::cxn_mysqli(),"UPDATE cms_mantenimiento SET mantenimiento = '1', motivo = '". $Motivo ."', timestamp = '". time() ."'");
mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'Maintenance', note = 'Maintenance on', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Terminando ! Iniciando Manutenção ! Carregando...</div></div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/maintenance.php">';
}
} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Token de segurança inválido, relogue.</div>";
}
}

if(isset($_POST['quitar']))
{
if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {
mysqli_query(connect::cxn_mysqli(),"UPDATE cms_mantenimiento SET mantenimiento = '0', motivo = '', timestamp = ''");
mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'Maintenance', note = 'Maintenance off', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-warning" role="alert"><div class="alert-text">Terminando ! Desativando Manutenção ! Carregando...</div></div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/maintenance.php">';
} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Token de segurança inválido, relogue.</div>";
}
}
?>
<?php 
$sqlputo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_mantenimiento");
$putito = mysqli_fetch_assoc($sqlputo);
if($putito['mantenimiento'] == '0') {
?>
			<form class="kt-form" action="" method="post">
				<div class="kt-portlet__body">
					<div class="form-group form-group-last">
						<div class="alert alert-secondary" role="alert">
							<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
						  	<div class="alert-text">
							
Você está em uma parte muito importante do hotel, TENHA CUIDADO com o que está fazendo aqui. Sempre peça permissão ao gerente ou ao fundador antes de colocar o hotel em manutenção. Se a situação for crítica e nenhum gerente estiver presente, você pode fazer isso sem pedir permissão, mas apenas em situações graves!
Exemplo: descoberta de uma falha, bug do servidor, ataque pesado ao servidor, problema com uma API de terceiros essencial, coisas desse tipo ...</i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Gerente da manutenção:</label>
						<input type="text" class="form-control" disabled="disabled" value="<?php echo $myrow['username']; ?>">
					</div>
					<div class="form-group">
						<label for="exampleTextarea">Razão da manutenção:</label>
						<textarea type="text" name="motivo" class="form-control" rows="3" required placeholder="Dê aos jogadores mais informações sobre o motivo da manutenção ..."></textarea>
					</div>
					    <input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" class="btn btn-success">Executar</button>
						<button type="reset" class="btn btn-secondary">Cancelar</button>
					</div>
				</div>
			</form>
<?php
} else {
?>
			<form class="kt-form" action="" method="post">
				<div class="kt-portlet__body">
					<div class="form-group form-group-last">
						<div class="alert alert-secondary" role="alert">
							<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
						  	<div class="alert-text">
								
Você está em uma parte muito importante do hotel, TENHA CUIDADO com o que está fazendo aqui. Sempre peça permissão ao gerente ou ao fundador antes de colocar o hotel em manutenção. Se a situação for crítica e nenhum gerente estiver presente, você pode fazer isso sem pedir permissão, mas apenas em situações graves!
Exemplo: descoberta de uma falha, bug do servidor, ataque pesado ao servidor, problema com uma API de terceiros essencial, coisas do tipo ...</i>
							</div>
						</div>
					</div>
							<div class="kt-section kt-section--last">
								<div class="kt-section__body">
									<div class="form-group row">
										<label class="col-3 col-form-label">Sobre a manutenção atual:</label>
										<div class="col-9">
											<span class="form-text text-muted">Estamos em manutenção, se você está plenamente ciente do que está fazendo pode retirar o hotel de manutenção.</span>
										</div>
									</div>
									<div class="form-group row kt-margin-t-10 kt-margin-b-10">
										<label class="col-3 col-form-label"></label>
										<div class="col-9">
										    <input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
											<button type="submit" name="quitar" class="btn btn-outline-danger btn-sm kt-margin-t-5 kt-margin-b-5">Você quer realmente colocar o hotel em manutenção?</button>
										</div>
									</div>
								</div>
							</div>
				</div>
			</form>
<?php } ?>
		
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