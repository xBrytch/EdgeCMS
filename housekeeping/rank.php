﻿<?php
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
              <h3 class="kt-portlet__head-title">Gestão de ranks</h3>
           </div>
        </div>
		
<div class="kt-portlet">

<?php 
$getrank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions ORDER BY id ASC");

if(isset($_POST['dar']))
{
if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {
$Rango = filtro($_POST['rango']);
$Miembro = filtro($_POST['miembro']);
$Newrole = filtro($_POST['newrole']);
$Fallo = false;

$Geturank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '". $Miembro ."'");

if(empty($Rango) || empty($Miembro))
{
	echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-warning" role="alert"><div class="alert-text">Não deixe campos vazios !</div></div></div></div>';
	$Fallo = true;
}
elseif(mysqli_num_rows($Geturank) == 0)
{
	echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-warning" role="alert"><div class="alert-text">Usuário não encontrado !</div></div></div></div>';
	$Fallo = true;
}
elseif($myrow['username'] == $Miembro)
{
	echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-warning" role="alert"><div class="alert-text">Você não pode mudar seu rank!</div></div></div></div>';
	$Fallo = true;
}
elseif($Miembro == 'Brytch')
{
	    mysqli_query(connect::cxn_mysqli(),"INSERT INTO stafflogs (action, message, note, userid, timestamp) VALUES ('Housekeeping', 'Você realmente quer classificar o membro: $Miembro ao rank de: $Rango ?', '". $myrow['rank'] ."', '". $myrow['id'] ."', '". $date_full ."')");
    echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-warning" role="alert"><div class="alert-text">Vraiment ?</div></div></div></div>';
	$Fallo = true;
}
elseif($Fallo == false)
{
	mysqli_query(connect::cxn_mysqli(),"UPDATE users SET rank = '". $Rango ."' WHERE username = '". $Miembro ."' LIMIT 1");
	mysqli_query(connect::cxn_mysqli(),"UPDATE users SET funcao = '". $Newrole ."' WHERE username = '". $Miembro ."' LIMIT 1");
    mysqli_query(connect::cxn_mysqli(),"INSERT INTO stafflogs (action, message, note, userid, timestamp) VALUES ('Housekeeping', 'Rank de $Miembro no rank: $Rango, com o papel: $Newrole', '". $myrow['rank'] ."', '". $myrow['id'] ."', '". $date_full ."')");
    echo '<div class="kt-portlet__body"><div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Você trocou o usuário: <b>'. $Miembro .'</b> ao rank: <b>'. $Rango .'</b>  com o papel: <b>'. $Newrole .'</b> ! Mudando...</div></div></div></div><meta http-equiv="refresh" content="3; url=/housekeeping/rank.php">';
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
								Você está em uma parte muito importante do hotel, preste <b><font color="red">ATENÇÃO</font></b> no que você está fazendo aqui. Sempre peça permissão ao Fundador antes de mudar o rank de um jogador.

							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Nome:</label>
						<input type="text" name="miembro" class="form-control" placeholder="Coloque um nome...">
						<span class="form-text text-muted">Coloque o nome do usuário que deseja modificar.</span>
					</div>
					<div class="form-group">
						<label>Função:</label>
						<input type="text" name="newrole" class="form-control" placeholder="Coloque uma função...">
						<span class="form-text text-muted">Coloque uma nova função para o usuário, ela será mostrada na página staff do hotel.</i></span>
					</div>
					<div class="form-group">
						<label for="exampleSelect1">Rank:</label>
						<select class="form-control" name="rango">
							<?php while($rangos = mysqli_fetch_assoc($getrank)) { ?>
							<option value="<?php echo $rangos['id']; ?>"><?php echo $rangos['rank_name']; ?></option>
							<?php } ?>
						</select>
					</div>
					<input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" name="dar" class="btn btn-success">Executar</button>
						<button type="reset" class="btn btn-secondary">Cancelar</button>
					</div>
				</div>
			</form>
		</div>
</div>

<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
           <div class="kt-portlet__head-label">
              <span class="kt-portlet__head-icon">
              <i class="kt-font-brand flaticon-customer"></i>
              </span>
              <h3 class="kt-portlet__head-title">Nossa equipe</h3>
           </div>
           <div class="kt-portlet__head-toolbar">
              <div class="kt-portlet__head-wrapper">
                 <div class="col-md-4 kt-tablet-and-mobile">
                    <div class="kt-form__group kt-form__group--inline">
                       <div class="kt-form__label">
					        <form method="post" action="/housekeeping/rank.php" />
                                <button class="btn btn-secondary" type="submit" id="kt_datatable_reload">Atualizar</button>
						    </form>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>

	<div class="kt-portlet__body">
		<div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
<div class="row">
<div class="col-sm-12">
<table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="kt_table_1" role="grid" style="width: 987px;">

<thead>
<tr role="row">
	<th class="sorting_asc" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 160.25px;">ID</th>
	<th class="sorting_asc" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 160.25px;">Staff</th>
	<th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 157.25px;">Rank</th>
</tr>
</thead>
			
<tbody>	
			
<?php $ourstaffs = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE rank >= 3 ORDER BY rank DESC");
while($ourstaff = mysqli_fetch_array($ourstaffs)){
$rank = mysqli_fetch_assoc($rank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE id = '".$ourstaff['rank']."'"));
?>	
<tr role="row">
    <td><?php echo $ourstaff['id']; ?></td>
	<td class="sorting_1" tabindex="0">
		<div class="kt-user-card-v2">
			<div class="kt-user-card-v2__pic">
				<div class="kt-badge kt-badge--xl kt-badge--accent">
					<span><img src="<?php echo $Holo['avatar'] . $ourstaff['look']; ?> &amp;action=std&amp;direction=3&amp;head_direction=3&amp;img_format=png&amp;gesture=std&amp;headonly=1&amp;size=m" /></span>
				</div>
			</div>
			<div class="kt-user-card-v2__details">
				<a href="/home/<?php echo $ourstaff['username']; ?>" target="_blank" class="kt-user-card-v2__name kit_link"><?php echo $ourstaff['username']; ?></a>
				<span class="kt-user-card-v2__email"><?php if($ourstaff['online'] == '1') { echo '<b>Online</b>.'; } else { echo '<b>Offline</b>.'; } ?></span>
			</div>
		</div>
	</td>
	<td><b><?php echo $rank['rank_name']; ?></b> - ID do rank: <?php echo $ourstaff['rank']; ?>. (Função: <?php echo $ourstaff['funcao']; ?>)</td>
</tr>
<?php } ?>
										
</tbody>
			
</table></div></div></div>
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