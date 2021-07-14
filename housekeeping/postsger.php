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

                    <h3 class="kt-portlet__head-title">Gerenciar posts</h3>
                </div>
                </div>

                <div class="kt-portlet__body">

	<?php

	$do = filtro($_GET['do']);
	$key = filtro($_GET['key']);
	if($do == "dele"){
	if(isset($_GET['jeton']) && ($_GET['jeton'] == $_SESSION['jeton']))
    {
		$check = mysqli_query(connect::cxn_mysqli(),"SELECT id FROM edge_posts WHERE id = '". $key ."' LIMIT 1");
		if(mysqli_num_rows($check) > 0){
			mysqli_query(connect::cxn_mysqli(),"DELETE FROM edge_posts WHERE id = '". $key ."' LIMIT 1");
			mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'Posts', note = 'Delete de: $key', usuario_name = '". $myrow['username'] ."', usuario_id = '". $myrow['id'] ."', usuario_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'");
			echo '<div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Sucesso ! O post foi apagado ! Aguarde...</div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/postsger.php">';
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
		$tituloM = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['tituloM']);
		$postagemM = mysqli_real_escape_string(connect::cxn_mysqli(),$_POST['postagemM']);

		
		$query_modificar = mysqli_query(connect::cxn_mysqli(),"UPDATE edge_posts SET title = '".$tituloM."',postagem = '".$postagemM."' WHERE id = '".$idM."'");
		mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_hklogs SET type = 'News', note = 'Edição de: $tituloM', usuario_name = '". $myrow['username'] ."', usuario_id = '". $myrow['id'] ."', usuario_rank = '". $myrow['rank'] ."', timestamp = '". time() ."'"); 
	  
		if($query_modificar) 
		{ 
			echo '<div class="form-group form-group-last"><div class="alert alert-success" role="alert"><div class="alert-text">Sucesso ! O post foi editado ! Aguarde...</div></div></div><meta http-equiv="refresh" content="2; url=/housekeeping/postsger.php">';
		} 
		else 
		{ 
			echo '<div class="form-group form-group-last"><div class="alert alert-danger" role="alert"><div class="alert-text">Algo deu errado, tente novamente.</div></div></div>';
		} 
	} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Token de segurança inválido, relogue.</div>";
    }
	}

	if(isset($_GET['posts'])) 
	{ 
		$id = (int) filtro($_GET['posts']); // Recebemos o ID dos posts por meio de GET
		$query_edge_postsCompleto = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM edge_posts WHERE id = '".$id."' LIMIT 1"); // Nós executamos a consulta
		$columna_edge_postsCompleto = mysqli_fetch_assoc($query_edge_postsCompleto); 
		?>
		<form action="" method="post">
		        <center><font size="4"><b><?php echo $myrow['username']; ?></b>, tu modifie l'article: <b><?php echo $columna_edge_postsCompleto['title']; ?></b>.</font></center><hr>
                <div class="kt-portlet__body">
				    
                    <div class="form-group">
                        <label>Titre:</label>
                        <input type="text" class="form-control" name="tituloM" value="<?php echo $columna_edge_postsCompleto['title']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Conteúdo:</label>
                        <textarea name="postagemM"><?php echo $columna_edge_postsCompleto['postagem']; ?></textarea>
						<script>CKEDITOR.replace( "postagemM" );</script>
                    </div>
					
					<div class="form-group">
                        <label>Auteur:</label>
                        <input type="text" class="form-control" value="<?php echo $columna_edge_postsCompleto['usuario']; ?>" disabled>
						<span class="form-text text-muted">Il n'est pas possible de modifier l'auteur de ce contenu.</span>
                    </div>
					
                </div>
				
                <div class="kt-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-lg-6 m--valign-middle">
                            Action:
                        </div>
                        <div class="col-lg-6 kt-align-right">
                            <input type="hidden" name="newsId" value="<?php echo $columna_edge_postsCompleto['id']; ?>">
							<input type="hidden" name="idM" value="<?php echo $columna_edge_postsCompleto['id']; ?>" />
							<input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
                            <input class="btn waves-effect waves-light" type="button" value="Annuler" name="Back2" onclick="history.back()" />
			<input class="btn waves-effect waves-light" type="submit" name="modificar" value="Modifier" />
                        </div>
                    </div>
                </div>
		</form>
<?PHP		
	} else {  
	$postss = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM edge_posts ORDER BY id DESC");
	while($columnas = mysqli_fetch_assoc($postss)) {
	?>    

<table class="table table-striped table-bordered table-condensed">
								<tbody>
          <tr>
              <th data-field="id">ID:</th>
              <th data-field="title">Título:</th>
              <th data-field="usuario">Autor:</th>
              <th data-field="date">Data:</th>
			  <th data-field="see">Visualizar:</th>
			  <th data-field="edit">Editar:</th>
			  <th data-field="delete">Apagar:</th>
          </tr>
        </thead>

        <tbody>	<?php
	$postss = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM edge_posts ORDER BY id DESC");
	while($posts = mysqli_fetch_assoc($postss)) {
	?>
          <tr>
            <td><b><?php echo $posts['id']; ?></b></td>
            <td><?php echo filtro(mb_strimwidth($posts['title'], 0, 33, "...")); ?></td>
            <td><a href="/home/<?php echo $posts['usuario']; ?>" target="_blank"><?php echo $posts['usuario']; ?></a></td>
            <td><?php echo date('d/m/Y', $posts['date']); ?></td>
			<td><a href="/posts/<?php echo $posts['id']; ?>" target="_blank" class="flaticon-eye"> Visualizar</a></td>
			<td><a href="postsger.php?posts=<?php echo $posts['id']; ?>&key=<?php echo $posts['id']; ?>" class="flaticon-edit-1"> Editar</a></td>
			<td><a href="postsger.php?do=dele&key=<?php echo $posts['id']; ?>&jeton=<?php echo $_SESSION['jeton']; ?>" class="flaticon-delete"> Apagar</a></td>
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