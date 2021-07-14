<?php
require_once("inc/core.god.php");

?>
<!DOCTYPE html>
<?php if(Loged == FALSE) { ?>
<script>
    var themed = new Date();
    var themeh = themed.getHours();

    if(themeh > <?php echo $Holo['in_auto_dark']; ?> || themeh < <?php echo $Holo['en_auto_dark']; ?>){
        document.write('<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="dark">');
    } else {
		document.write('<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="light">');
	};
</script>
<?php } ?>
<?php if(Loged == TRUE) { ?>
<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="<?php echo $myrow['theme']; ?>">
<?php } ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/wvBIpr7.png"  />

    <title><?php echo $Holo['name']; ?>: <?php echo $Lang['news.titulo']; ?></title>
    <meta name="keywords" content='habbinc, habblet, habbo pirata, habblethotel, habblive, habb, lella, lellahotel,lella hotel, habbinfo, habbinfo hotel, habblive, habblive hotel, habbolatino, habbletlatino, habblet, habblethotel, crazzy, habb, habbhotel , furnis , mobs, client, habbo privado, client hotel, clienthotel, atualizado, catalogo' />
    <meta name="robots" content="all">
    <meta name="Googlebot" content="index, follow">
    <meta property="image" content="">
    <meta name="description" content="">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157343570-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-157343570-1');
    </script>


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link href="/assets/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/assets/css/indexbrytch.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/mebrytch.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/material.css" type="text/css" />

	</head>

<div id="sound"></div>
<body ng-app="formApp" class="animated fadeIn">
<?php require_once('./Mawu/includes/sub_header.php'); ?>
<!-- Fixed navbar -->
<div ng-controller="notificationsController">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav w-100">
                                        <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> <?php echo $myrow['username']; ?>                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/me">Página Inicial</a>
							<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/account/prefer">Configurações</a>
							<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/perfil/<?php echo $myrow['username']; ?>">Meu Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Sair</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i> Comunidade <img src="https://i.imgur.com/lZWES30.png">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item " href="/staff">Equipe <img src="https://i.imgur.com/lZWES30.png"></a>
                            <div class="dropdown-divider"></div>
							<a class="dropdown-item" href="/news/1"><b>Notícias</b> <img src="https://i.imgur.com/lZWES30.png"></a>
							<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/etiqueta"><?php echo $Holo['name']; ?> Etiqueta</a>
							

                        </div>
                    </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/hall">
                                <i class="fas fa-star"></i> Hall
                            </a>
                        </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/market">
                            <i class="fas fa-gem"></i> Loja
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/download">
                            <i class="fas fa-download"></i> Download
                        </a>
						 <?php $isadmin = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank >= ".$Holo['minhkr']."");
        while($isadm = mysqli_fetch_assoc($isadmin)){ ?>
					<li class="nav-item ">
                        <a class="nav-link" href="<?php echo $Holo['url'] . '/' . $Holo['panel']; ?>">
                            <i class="fas fa-cogs"></i> Painel
                        </a>
                    </li><?php } ?>
                    </li>
                    <li class="nav-item ml-auto">
                        <ul class="navbar-nav w-100">
                            <li class="nav-item ">
                                <a class="nav-link" href="/discord">
                                    <i class="fab fa-discord" style="font-size: 20px"></i>
                                </a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="/hotel" target="_blank"><i class="far fa-building"></i> Entrar no Hotel</a>
                            </li>
                        </ul>
                    </li>
                                    </ul>
            </div>
        </div>
    </nav>
    </div>

<main>
<div style="cursor:default" class="jumbotron jumbotron-fluid  blue">
	<div class="container text-center">
		<div class="d-flex justify-content-center">
	
		<text>Você está na categoria</text>:
		</div>
		<h1><?php echo $Lang['news.cat5']; ?></h1>
	</div>
</div>

<section>

	<div class="container">
	
<?php if(maintenance == '1') { ?>
	<div class="alert alert-danger" role="alert"><div id="p141"></div><br><center><?php echo $Lang['maintenance.text1']; ?> <b><?php echo $main['motivo']; ?></b>.<br><?php echo $Lang['maintenance.text2']; ?></center><br></div>
<?php } ?>
	
	<div class="section-title" style="cursor:default"><h3 style="margin-left: -15px;"><?php echo $Lang['news.have1']; ?> <b><?php echo mysqli_num_rows(mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'sistema'")) ?></b> <?php echo $Lang['news.have2']; ?></h3></div>
		<div class="row">
		<div class="list-group" style="margin-bottom: 20px">
                <div class="list-group-item list-header" style="background: black">Categoria das Notícias</div>
				 <a class="list-group-item config-controller" href="/articles/promocao">
                    <?php echo $Lang['news.cat1']; ?> »
                </a>  
				 <a class="list-group-item config-controller" href="/articles/gratis">
                   <?php echo $Lang['news.cat2']; ?>»
                </a>  
					 <a class="list-group-item config-controller" href="/articles/mobis">
                    <?php echo $Lang['news.cat3']; ?>»
                </a>  
					 <a class="list-group-item config-controller" href="/articles/hotel">
					<?php echo $Lang['news.cat4']; ?> »
                </a>  
					 <a class="list-group-item config-controller" href="/articles/sistema">
                    <b><?php echo $Lang['news.cat5']; ?></b>»
                </a> 
            </div>		
			<div class="col-md-9 pl-md-3">
				<div>
					<div id="custom_widget_noticias-2" class="widget widget_custom_widget_noticias mb-4">
					<div class="row row-news">
<?php $news = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'sistema'ORDER BY id DESC LIMIT 60");
while($new = mysqli_fetch_array($news)){
	
$authorinfo = mysqli_fetch_assoc($authorinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '".$new['author']."'"));	
?>
				<div class="col">
		<div class="card news post-<?php echo $new['id']; ?>"style="background:url(<?php echo $new['image']; ?> )center 0px;;">
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'sistema'AND id = '".$new['id']."' AND livenews = '0'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>">
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="<?php echo $Holo['name']; ?> Hotel"><?php echo $Holo['name']; ?> Hotel</div></a>
<?php } ?>
<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'sistema'AND id = '".$new['id']."' AND livenews = '1'");
while($newscategory = mysqli_fetch_array($newscategorys)){	
?>
	<a href="/news/<?php echo $new['id']; ?>" class="cover"><img src="<?php echo $new['image']; ?>"><div class="live"><?php echo $Lang['news.cat6']; ?></div>
	<div class="cat <?php echo $new['category']; ?>" data-toggle="tooltip" data-html="true" title="" data-original-title="<?php echo $Holo['name']; ?> Hotel"><?php echo $Holo['name']; ?> Hotel</div></a>
<?php } ?>
	<div class="card-body">
<?php $newsbadges = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE active_badge = '1' AND id = '".$new['id']."'");
while($newsbadge = mysqli_fetch_array($newsbadges)){	
?>
		<div class="box" data-toggle="tooltip" title="" data-original-title="<?php echo $Lang['news.winbadge']; ?>"><img src="<?php echo $Holo['url_badges']; ?><?php echo $newsbadge['badge']; ?>.gif"></div>
<?php } ?>
				<h5 class="card-title mb-4"><a href="/news/<?php echo $new['id']; ?>" data-toggle="tooltip" title="" data-original-title="<?php echo filtro($new['title']); ?>"><span class="profile-news"> <?php echo filtro(mb_strimwidth($new['title'], 0, 46, "...")); ?></span></a></h5>
		<div class="card-text">
			<div class="avatar pixel sm mr-2">
				<img src="<?php echo $Holo['avatar'] . $authorinfo['look']; ?>&action=std&direction=2&head_direction=2&img_format=png&gesture=std&headonly=0&size=s" alt="<?php echo $new['author']; ?>">
			</div>
<?php if(Loged == TRUE) { ?>
<a href="/home/<?php echo $new['author']; ?>" data-toggle="tooltip" title=""><span class="profile-news"> <?php echo $new['author']; ?></span></a> 
<?php } ?>
<?php if(Loged == FALSE) { ?>
<a style="cursor:default" data-toggle="tooltip" title=""><?php echo $new['author']; ?></a> 
<?php } ?>
			<span style="cursor:default;color: white!important;" class="ml-auto text-muted"><i class="fas fa-calendar-alt ml-3 mr-1"></i>  <?php echo GetLast($new['date']); ?></span>			
		</div>
	</div>
		</div>
				</div>
<?php } ?>

					</div>

	</div>
</section>

	</main>
	
	<?php require_once("Mawu/includes/index_footer.php"); ?>
	
<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>

<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/jquery.cookie.js?ver=1.4.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/bootstrap.min.js?ver=4.4.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/swiper.min.js?ver=5.3.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/selectize.min.js?ver=0.12.6'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/moment.min.js?ver=2.22.2'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/jquery.page.js?ver=0.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/main.js?ver=1.0'></script>
		
</body>
</html>