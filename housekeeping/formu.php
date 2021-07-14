<?php
require_once("../inc/core.god.php");
require_once("../inc/hk_session.php");

if(UserH == FALSE) {
    header("Location: " . $Holo['url'] ."/".$Holo['panel']."");
	exit;
}

if(Loged == TRUE && UserH == TRUE) {
if($myrow['rank'] >= $Holo['minhkr']) {


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
   <link rel="stylesheet" href="/assets/css/types.css" type="text/css" />
   <link rel="stylesheet" href="/assets/css/news.css" type="text/css" />
   <link rel="stylesheet" href="/assets/css/buttons.css" type="text/css" media="all">

    <script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/js/web/user_settings.js" type="text/javascript"></script>
	<script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/ckeditor/ckeditor.js"></script>
  
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
                        

<div class="kt-container  kt-grid__item kt-grid__item--fluid" style="margin-top:30px">
                      
<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
           <div class="kt-portlet__head-label">
              <span class="kt-portlet__head-icon">
              <i class="kt-font-brand flaticon2-rectangular"></i>
              </span>
              <h3 class="kt-portlet__head-title">Formulários</h3>
           </div>
           <div class="kt-portlet__head-toolbar">
              <div class="kt-portlet__head-wrapper">
                 <div class="col-md-4 kt-tablet-and-mobile">
                    <div class="kt-form__group kt-form__group--inline">
                       <div class="kt-form__label">
					        <form method="post" action="/housekeeping/formu.php">
                                <button class="btn btn-secondary" type="submit" id="kt_datatable_reload">Atualizar</button>
						    </form>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>

	<div class="kt-portlet__body">
	
                    <div class="form-group">
                        <label>Aqui estão os últimos <b>550</b> formulários enviados pelos usuários do hotel.</label>
                    </div>
					<?php
	$noticias = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM edge_formularios ORDER BY id DESC");
	while($noticia = mysqli_fetch_assoc($noticias)) {
	$user_n = mysqli_fetch_assoc(mysqli_query(connect::cxn_mysqli(),"SELECT id,username,look FROM users WHERE username = '". $noticia['author_post'] ."'"));
	
	$query_noticias = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE id = '".$id_post."' LIMIT 1");
        if(mysqli_num_rows($query_noticias) > 0)
        { 
            $columna = mysqli_fetch_assoc($query_noticias);
			$noticia6 = ''.$columna['author'].'';
		
		}
	?>
		<div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
		
<div class="row">
<div class="col-sm-12">
<table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="kt_table_1" role="grid" style="width: 987px;">

<thead>
<tr role="row">
              <th data-field="id">ID:</th>
              <th data-field="title">Notícia:</th>
              <th data-field="author">Autor:</th>
              <th data-field="user">Usuário</th>
			  <th data-field="see">Visualizar notícia:</th>
			  <th data-field="viewform">Visualizar formulário:</th>
</tr>
</thead>
			
<tbody>	
			
	
			<tr>
            <td><b><?php echo $noticia['id']; ?></b></td>
            <td><?php echo $noticia['title_post']; ?></td>
            <td><a> <?php echo $noticia['author_post']; ?></a></td>
			<td><a> <?php echo $noticia['user_send']; ?></a></td>
			<td><a href="/news/<?php echo $noticia['id_post']; ?>" target="_blank" class="flaticon-eye"> Visualizar Notícia</a></td>
			<td><a href="javascript:void(0)" data-toggle="modal" data-target="#formModal-<?php echo $noticia['id']; ?>">Visualizar Formulário</a></td>
			</tr>
	  	<div class="modal fade" id="formModal-<?php echo $noticia['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
					
                        <div class="modal-header">
							<icon icon="ballon" style="top: 5px;left: 0px;margin-right: -15px;"></icon>					
							<h4 class="bold gray margin-bottom-minm" style=" margin-top: 5px; margin-left: 15px; ">Formulário</h5>
							<small style="margin-left: -89px;margin-top: 23px;"> Lembre-se: Essa são as respostas dos formulários enviados pelos usuários de acordo com a última notícia postada, qualquer dúvida contate o Brytch.</small>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
								<div class="flex-column">
									<h4 class="bold gray margin-bottom-minm" style="margin-left: 17px;">Dados da notícia</h4>
									<div class="flex-wrap" id="news-modal-header-news-info" style=" width: 96%; margin-left: 16px; ">
									<div id="news-modal-header-news-info-habbo-author">
										<img src="<?php echo $Holo['avatar'] . $user_n['look']; ?>&direction=3&head_direction=3&size=m&gesture=srp&action=std,wav&frame=3">
									</div>

									<label class="gray margin-auto-top-bottom">
										<h5 class="bold margin-bottom-minm"><?php echo $noticia['title_post']; ?></h5>
										<h6>Por <b><?php echo $noticia['author_post']; ?></b> </h6>
									</label>
								</div>
							</div>
                        <form ng-submit="send_form" method="<?php echo $noticia['id']; ?>">
                            <div class="modal-body">
                    			<hr>
						<form class="flex-column margin-top-min" method="<?php echo $noticia['id']; ?>">
						<h4 class="bold gray margin-bottom-minm" style="margin-left: 2px;">Dados do formulário</h4>
							<div class="flex margin-bottom-minm">
								<icon icon="head-plus" style="top: 12px;left: 8px;margin-right: -17px;"></icon>
								<input type="text" name="form_participants" id="participants-modal-news" value="<?php echo $noticia['usernames']; ?>" disabled>
							</div>
							<div class="flex margin-bottom-minm">
								<icon icon="link" style="top: 12px;left: 8px;margin-right: -15px;"></icon>
								<input type="text" name="form_link" id="link-modal-news" value="<?php echo $noticia['link']; ?>"style="width: 85%;"disabled>
								<a onclick="window.open('<?php echo $noticia['link']; ?>', '_blank');"  class="btn btn-gradient" style="float: right;margin-top: -2px;background: #124ba1;color: rgb(255, 255, 255);height: 100%;margin-left: 17px;">Ir até o link</a>
							</div>
							<div class="flex margin-bottom-minm">
								<icon icon="mail" style="top: 11px;left: 7px;margin-right: -16px;"></icon>
								<input type="text" name="form_link" id="link-modal-news" value="<?php echo $noticia['message']; ?>" disabled>
							</div>
						   </form>
                           </div>
                           </div>
						   </div>
						   </div>
										
</tbody>
			
</table></div></div></div>

<?php } ?>
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