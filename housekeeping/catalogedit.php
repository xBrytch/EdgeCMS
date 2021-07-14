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
                        

<div class="row">
    <div class="col-xl-12" id="editNews">
        <div class="kt-portlet">
		
                <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-rectangular"></i>
                    </span>

                    <h3 class="kt-portlet__head-title">Gerenciar catálogo</h3>
                </div>
                </div>

                <div class="kt-portlet__body">

	<?php

	$do = filtro($_GET['do']);
	$key = filtro($_GET['key']);
	if($do == "dele"){
	if(isset($_GET['jeton']) && ($_GET['jeton'] == $_SESSION['jeton']))
    {
		$check = mysqli_query(connect::cxn_mysqli(),"SELECT id FROM catalog_pages WHERE id = '". $key ."' LIMIT 1");
		if(mysqli_num_rows($check) > 0){
			mysqli_query(connect::cxn_mysqli(),"DELETE FROM catalog_pages WHERE id = '". $key ."' LIMIT 1");
			mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'Catalog Edit', note = 'Deletou: $key do catálogo', author_name = '". $myrow['username'] ."', author_id = '". $myrow['id'] ."', author_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
			echo '<div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Sucesso! Esta página foi deletada! Aguarde...</div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/catalogedit.php">';
		} else {
			echo '<div class="form-group form-group-last"><div class="alert alert-danger" role="alert"><div class="alert-text">Algo deu errado, tente novamente.</div></div></div>';
		}
	} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Token de segurança inválido, relogue.</div>";
    }
	}
    
	if(isset($_POST['modificar'])) // Se o botão "modificar" for pressionado, ele executará o restante do código
	{ 
		if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {
		$idM = (int) mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['idM']); 
		$captionM = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['captionM']);
		$icon_imageM = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['icon_imageM']);
		$visibleM = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['visibleM']);
		$min_rankM = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['min_rankM']);

		
		$query_modificar = mysqli_query(connect::cxn_mysqli(),"UPDATE catalog_pages SET caption = '".$captionM."',icon_image = '".$icon_imageM."',visible = '".$visibleM."',min_rank = '".$min_rankM."' WHERE id = '".$idM."'");
		mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'CATALOG EDIT', note = 'EDIÇÃO de: $captionM', usuario_name = '". $myrow['username'] ."', usuario_id = '". $myrow['id'] ."', usuario_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'"); 
	  
		if($query_modificar) 
		{ 
			echo '<div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Sucesso! O catálogo foi alterado ! Aguarde...</div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/catalogedit.php">';
		} 
		else 
		{ 
			echo '<div class="form-group form-group-last"><div class="alert alert-danger" role="alert"><div class="alert-text">Algo deu errado, tente novamente.</div></div></div>';
		} 
	} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Token de segurança inválido, relogue.</div>";
    }
	}

	if(isset($_GET['catalog'])) 
	{ 
		$id = (int) filtro($_GET['catalog']); // ID da página no catálogo por meio de GET
		$query_catalog_pagesCompleto = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM catalog_pages WHERE id = '".$id."' LIMIT 1"); // Nós executamos a consulta
		$columna_catalog_pagesCompleto = mysqli_fetch_assoc($query_catalog_pagesCompleto); 
		?>
			<form action="" method="post">
		        <center><font size="4"><b><?php echo $myrow['username']; ?></b>, você está modificando a página: <b><?php echo $columna_catalog_pagesCompleto['caption']; ?></b>.</font><br><small> ATENÇÃO: Essas páginas são as páginas principais do catálogo, tome cuidado! </small></center><hr>

                <div class="kt-portlet__body">
				    
                    <div class="form-group">
                        <label>Nome da página:</label>
                        <input type="text" class="form-control" name="captionM" value="<?php echo $columna_catalog_pagesCompleto['caption']; ?>">
                    </div>

                 <div class="form-group">
                        <label>Icon da página:</label>
						<div class="form-control" style=" width: 6.2%; "> <img style="padding-left: 5px;margin-top: -5px;" src="/nitro/c_images/catalogue/icon_<?php echo $columna_catalog_pagesCompleto['icon_image']; ?>.png"></div>
						<input type="text" class="form-control" name="icon_imageM" value="<?php echo $columna_catalog_pagesCompleto['icon_image']; ?>" style="margin-top: -38px; margin-left: 60px; width: 93.5%;">
                    </div>  
						<div class="form-group">
							<?php $getrank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions ORDER BY rank_name ASC");
							while($ranks = mysqli_fetch_array($getrank)){
							?>
                        <label>Rank mínimo:</label><br>
						<small>Atual:</small>
						<div class="form-control" style="width: 6.4%;"> <?php echo $columna_catalog_pagesCompleto['min_rank']; ?></div>
								<select class="form-control" name="min_rankM" style="margin-top: -38px;margin-left: 62px;width: 93%;">
							<?php while($ranks = mysqli_fetch_assoc($getrank)) { ?>
							<option value="<?php echo $ranks['id']; ?>"><?php echo $ranks['rank_name']; ?></option>
							<?php } ?>
						</select>
                    </div>  <?php } ?> 			
					<div class="form-group">
                        <label>Página visível:</label>
									<select class="custom-select" name="visibleM" value="<?php echo $columna_catalog_pagesCompleto['visible']; ?>">
								<option value="1" selected="selected">Sim</option>
								<option value="0">Não</option>
							</select>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-lg-6 m--valign-middle">
                            Ação:
                        </div>
                        <div class="col-lg-6 kt-align-right">
                            <input type="hidden" name="newsId" value="<?php echo $columna_catalog_pagesCompleto['id']; ?>">
							<input type="hidden" name="idM" value="<?php echo $columna_catalog_pagesCompleto['id']; ?>" />
							<input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
                            <input class="btn btn-danger" type="button" value="Cancelar" name="Back2" onclick="history.back()" />
							<input class="btn btn-success" type="submit" name="modificar" value="Modificar" />
                        </div>
                    </div>
                </div>
				
		</form>
		
		<!-- FIM CATALOG EDIT -->

<?PHP		
	} else {  
	$catalogo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM catalog_pages WHERE parent_id = '-1' ORDER BY order_num ASC");
	while($catalog = mysqli_fetch_assoc($catalogo)) {
	?>    

<table class="table table-striped table-bordered table-condensed">
								<tbody>
        <thead>
          <tr>
              <th data-field="id">ID:</th>
              <th data-field="icon">Icon:</th>
              <th data-field="name">Nome:</th>
			  <th data-field="edit">Editar:</th>
			  <th data-field="delete">Apagar:</th>
          </tr>
        </thead>

        <tbody>	<?php
	$catalogo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM catalog_pages WHERE parent_id = '-1' ORDER BY order_num ASC");
	while($catalog = mysqli_fetch_assoc($catalogo)) {
	?>
          <tr>
            <td><b><?php echo $catalog['id']; ?></b></td>
            <td><img style="padding-left: 13px;padding-top: 2px;"src="/nitro/c_images/catalogue/icon_<?php echo $catalog['icon_image']; ?>.png"> </td>
            <td><?php echo $catalog['caption']; ?></td>
			<td><a href="catalogedit.php?catalog=<?php echo $catalog['id']; ?>&key=<?php echo $catalog['id']; ?>" class="btn btn-success"> Editar</a></td>
			<td><a href="catalogedit.php?do=dele&key=<?php echo $catalog['id']; ?>&jeton=<?php echo $_SESSION['jeton']; ?>" class="btn btn-danger"> Apagar</a></td>
          </tr>
	<?php } ?>
        </tbody>
</table>

<?php } } ?> 
					
                </div>

        </div>
    </div>
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