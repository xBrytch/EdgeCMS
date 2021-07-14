<?php
/*========================================*\
| EdgeCMS for Arcturus MorningStar         |
| v1.0.0 HTML5 - BETA                               
| #########################################|
| Copyright (c) 2021, by Brytch 
| #########################################|
| Based in MawuCMS and MegaCMS 2021     
\*========================================*/

require_once("inc/core.god.php");

if(Loged == FALSE)
{
	header("Location: /");
	exit;
}

$idd = filtro($_GET['idd']);
$get = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '".$idd."' ");


if(mysqli_num_rows($get) == 1)
{
	$exits = '1'; 
    $usr = mysqli_fetch_object($get);
}else
	
{
    $exits = '0';   
}

$user_n = mysqli_fetch_assoc(mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_settings WHERE user_id = '".filtro($usr->id)."'"));
$user_dia = mysqli_fetch_assoc(mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_currency WHERE user_id = '".filtro($usr->id)."' AND type = '5'"));
$user_duc = mysqli_fetch_assoc(mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_currency WHERE user_id = '".filtro($usr->id)."' AND type = '0'"));
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
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/wvBIpr7.png"  />

    <title><?php echo $Holo['name']; ?>: <?php echo $Lang['me.titulo']; ?></title>
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
	    <link rel="stylesheet" href="/assets/css/types.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/news.css" type="text/css" />
	<link rel="stylesheet" href="/assets/css/buttons.css" type="text/css" media="all">
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
                                        <li class="nav-item dropdown active">
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
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i> Comunidade <img src="https://i.imgur.com/lZWES30.png">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/staff">Equipe <img src="https://i.imgur.com/lZWES30.png"></a>
                            <div class="dropdown-divider"></div>
							<a class="dropdown-item" href="/news/1">Notícias <img src="https://i.imgur.com/lZWES30.png"></a>
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
	<div class="container">
        <div class="row">
            <div class="col-md-8" style="margin-bottom: 20px">
                                    <div class="alert alert-me">
                        <center>O <?php echo $Holo['name']; ?> ainda está em versão BETA na nova client, se prefrerir jogue pelo nosso <a href='/download'><b>aplicativo</b></a></center>                    </div>  
                              <div class="card mebg brytch">
<div class="ripping" style="position: absolute;z-index: 0;margin-top: -25px;margin-left: -20px;"><img src="<?php echo $Holo['avatar'] . $myrow['look']; ?>&size=l&direction=3&head_direction=3&gesture=sml&action=wav"></div>
<div class="body">
 <div class="profile-header__avatar__position">
                            <span style="font-size:25px;"><b><?php echo $myrow['username']; ?></b></span>
                            <div class="motto"><b>Missão:</b> <?php echo $myrow['motto']; ?></div>
                            <div class="lastLogin"><b>Último login em: </b><?php echo date('d/m/Y', $myrow['last_online']) . ' às ' . date('H:i:s', $myrow['last_online']) ?></div>
                            <div class="creditsAvailable">
                                <div class="credits">
                                    <div class="creditsIcon"></div>
                                     <?php echo $myrow['credits']; ?>                                </div>
                                <div class="duckets">
                                    <div class="ducketsIcon"></div>
									<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_currency WHERE user_id = '".$myrow['id']."' AND type = '0' LIMIT 1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                                     <?php echo $users_currencys['amount']; ?>
<?php } ?>									 </div>
                                <div class="diamonds">
                                    <div class="diamondsIcon"></div>
										<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_currency WHERE user_id = '".$myrow['id']."' AND type = '5' LIMIT 1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                                      <?php echo $users_currencys['amount']; ?>
<?php } ?>									 </div>
                            </div>
                        </div>
</div>
<a style="position: relative;">  <div onclick="window.open('/hotel', '_blank');" class="panel-footer client-btn">ENTRAR PELO HTML5 (BETA) </div>
                    <div onclick="window.open('/hotel', '_blank');" class="panel-footer client-btn">ENTRAR PELO FLASH</div></a>
</div>
<div class="general-header-box flex" style=" top: 15px; position: relative; background: rgb(21 84 179); width: 100%; min-height: 50px; border-radius: 5px; padding: 10px; margin: -25px 0 10px 0; "> <div class="flex margin-auto-top-bottom margin-right-min"> <icon name="feed"></icon> </div> <label class="white flex-column mr-top-05"> <h4 class="bold" style=" margin-left: 20px; ">Posts</h4> <h5 style="margin-left: 20px;">Confira as atualizações sobre o <?php echo $Holo['name']; ?> !</h5> </label> </div>
<?php $posts = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM edge_posts ORDER BY id DESC LIMIT 5");
while($post = mysqli_fetch_array($posts)){
	
$authorinfo = mysqli_fetch_assoc($authorinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '".$post['usuario']."'"));	
$usuarioinfo = mysqli_fetch_assoc($usuarioinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '".$post['usuario']."'"));
?>

<li class="list-group-item feed-item animated fadeInDown ng-scope">
                            <div id="postIdPanel<?php echo filtro($post['id']); ?>">
							
                                <div class="feed-item-image" style="background-image: url(<?php echo $Holo['avatar']; ?><?php echo filtro($usuarioinfo['look']); ?>&amp;head_direction=2&amp;gesture=sml);margin-top: -30px;"></div>
                                <div class="feed-item-body">
                                    <div class="feed-item-timestamp ng-binding">Publicado em: <?php echo date('d/m/Y', $post['data']) . ' às ' . date('H:i:s', $post['data']) ?> </div>
                                    <div class="feed-item-title"><a href="perfil/<?php echo filtro($post['usuario']); ?>" class="ng-binding"><?php echo filtro($post['usuario']); ?></a>  <i class="fas fa-info-circle" data-toggle="tooltip" title="" data-original-title="Esta é uma publicação staff sobre as atualizações do <?php echo $Holo['name']; ?>."></i></div>
                                    <div class="feed-item-content">
                                        <div class="more-less"id="contentId<?php echo filtro($post['id']); ?>">
                                            <div class="more-block ng-binding">
											<b> <?php echo filtro($post['title']); ?> </b><br><br>
											<span> <?php echo $post['postagem']; ?></div></span>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </li>	<?php } ?> <br>
						<div onclick="window.open('/posts.php', '_blank');" class="panel-footer client-btn">VEJA TODOS OS POSTS</div>
                                <div id="feedController" ng-controller="feedController" ng-cloak>
                </div>
            </div>

            <div class="col-md-4" style="max-width: 300px; left:37px;">
                <div class="list-group"  style="margin-bottom: 20px">
                    <div class="list-group-item" style="padding: 0;overflow: hidden">
                        <div id="articlesSlide" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">			
							
							<?php $news = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news ORDER BY id + 0 DESC LIMIT 0,1");
							while($new = mysqli_fetch_array($news)){		
?>
                                                                    <a href="news/<?php echo $new['id']; ?>" class="carousel-item active" style="background: url(<?php echo $new['image']; ?>);height:186px;padding: 20px 15px;overflow:hidden;    background-position: right">
                                        <span class="carousel-title"><?php echo $new['title']; ?></span><br>
                                        <span class="carousel-desc"><?php echo $new['shortstory']; ?></span>
                                    </a>
                                      <?php } ?>	
									  
									  <?php $news = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news ORDER BY id + 0 DESC LIMIT 1,1");
                                      while($new = mysqli_fetch_array($news)){
?>
                                                                    <a href="news/<?php echo $new['id']; ?>" class="carousel-item" style="background: url(<?php echo $new['image']; ?>);height:186px;padding: 20px 15px;overflow:hidden;background-position: right">
                                        <span class="carousel-title"><?php echo $new['title']; ?></span><br>
                                        <span class="carousel-desc"><?php echo $new['shortstory']; ?></span>
                                    </a>
                                      <?php } ?>
									  
									   <?php $news = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news ORDER BY id + 0 DESC LIMIT 2,1");
                                       while($new = mysqli_fetch_array($news)){
?>
                                                                    <a href="news/<?php echo $new['id']; ?>" class="carousel-item" style="background: url(<?php echo $new['image']; ?>);height:186px;padding: 20px 15px;overflow:hidden;background-position: right">
                                        <span class="carousel-title"><?php echo $new['title']; ?></span><br>
                                        <span class="carousel-desc"><?php echo $new['shortstory']; ?></span>
                                    </a>
                                      <?php } ?>
                                                                </div>
                            <a class="carousel-control-prev" href="#articlesSlide" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next" href="#articlesSlide" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                                        <a style="padding: 5px 1.25rem; font-size: 10px; font-weight: bold; background: #1e262c; color: #fff;margin-right: 1px;margin-left: 1px;" class="list-group-item">NOTÍCIAS FIXAS</a>
																		  
									   <?php $news = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news ORDER BY id + 0 DESC LIMIT 3,1");
                                       while($new = mysqli_fetch_array($news)){
?>
                                        <a href="/news/<?php echo $new['id']; ?>" class="list-group-item list-group-item-action"><?php echo $new['title']; ?>» </a> <?php } ?>
																		   <?php $news = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news ORDER BY id + 0 DESC LIMIT 4,1");
                                       while($new = mysqli_fetch_array($news)){
?>
                                        <a href="/news/<?php echo $new['id']; ?>" class="list-group-item list-group-item-action"><?php echo $new['title']; ?>  »</a>       <?php } ?>
                                    </div>
<div class="panel panel-success">
<div class="general-header-box flex" style=" top: 15px; position: relative; background: rgb(21 84 179); width: 100%; min-height: 50px; border-radius: 5px; padding: 10px; margin: -25px 0 10px 0; "> <div class="flex margin-auto-top-bottom margin-right-min"> <icon name="fame" class="margin-auto"></icon> </div> <label class="white flex-column mr-top-05"> <h4 class="bold" style=" margin-left: 20px; ">Celebridades</h4> <h5 style="margin-left: 20px;width: 100%;">Confira o TOP 5 dos usuários do momento no <?php echo $Holo['name']; ?>!</h5> </label> </div>
    <div class="top-images">
        <div class="diamantes box-image" onclick="changeTop(this)">
            <img class="image" src="https://imgur.com/NU8R5mL.png" style="transform: rotateY(0deg); transition: all 0s ease 0s;">
            <div class="counter" style="transition: all 0s ease 0s; left: -100%;background-color: rgb(21, 84, 179)"></div>
        </div>
        <div class="moedas box-image" onclick="changeTop(this)">
            <img class="image" src="https://imgur.com/1kwRA45.png" style="transform: rotateY(0deg); transition: all 0s ease 0s;">
            <div class="counter" style="transition: all 0s ease 0s; left: -100%;background-color: rgb(21, 84, 179);"></div>
        </div>
        <div class="Duckets box-image" onclick="changeTop(this)">
            <img class="image" src="https://imgur.com/hYjDRwr.png" style="transform: rotateY(0deg); transition: all 0s ease 0s;">
            <div class="counter" style="transition: all 0s ease 0s; left: -100%;background-color: rgb(21, 84, 179)"></div>
        </div>
        <div class="respeitos box-image this-selected" onclick="changeTop(this)">
            <img class="image" src="https://habbok.me/template/habbinc/images/likehand.gif" style="transform: rotateY(360deg); transition: all 2s ease 0s;">
            <div class="counter" style="transition: all 9s ease 0s; left: 0px;background-color: rgb(21, 84, 179)"></div>
        </div>
    </div>

    <div class="top-users-list">
        <div class="top top-diamantes">
         	<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND users.rank < 2 ORDER BY users_currency.amount DESC LIMIT 1,1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_currencys['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">1. <a href="/perfil/<?php echo $users_currencys['username']; ?>" class="ng-binding"><?php echo $users_currencys['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_currencys['amount']; ?></b> Diamantes
                        </div> 
                    </div>
                </div> <?php } ?>
				
             
           	<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND users.rank < 2 ORDER BY users_currency.amount DESC LIMIT 2,1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_currencys['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">2. <a href="/perfil/<?php echo $users_currencys['username']; ?>" class="ng-binding"><?php echo $users_currencys['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_currencys['amount']; ?></b> Diamantes
                        </div> 
                    </div>
                </div> <?php } ?>
             
                     
           	<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND users.rank < 2 ORDER BY users_currency.amount DESC LIMIT 3,1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_currencys['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">3. <a href="/perfil/<?php echo $users_currencys['username']; ?>" class="ng-binding"><?php echo $users_currencys['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_currencys['amount']; ?></b> Diamantes
                        </div> 
                    </div>
                </div> <?php } ?>
             
              
           	<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND users.rank < 2 ORDER BY users_currency.amount DESC LIMIT 4,1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_currencys['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">4. <a href="/perfil/<?php echo $users_currencys['username']; ?>" class="ng-binding"><?php echo $users_currencys['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_currencys['amount']; ?></b> Diamantes
                        </div> 
                    </div>
                </div> <?php } ?>
                     
           	<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND users.rank < 2 ORDER BY users_currency.amount DESC LIMIT 5,1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_currencys['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">5. <a href="/perfil/<?php echo $users_currencys['username']; ?>" class="ng-binding"><?php echo $users_currencys['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_currencys['amount']; ?></b> Diamantes
                        </div> 
                    </div>
                </div> <?php } ?>
                    </div>

        <div class="top top-moedas">
         <?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE rank < 4 ORDER BY credits DESC LIMIT 1,1");
		 while($user = mysqli_fetch_array($users)){ ?>
        <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($user['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding"> 1.
							<a href="/perfil/<?php echo $user['username']; ?>" class="ng-binding"><?php echo $user['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $user['credits']; ?></b> Moedas
                        </div> 
                    </div>
                </div> <?php } ?>
             
                 <?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE rank < 4 ORDER BY credits DESC LIMIT 2,1");
		 while($user = mysqli_fetch_array($users)){ ?>
        <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($user['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding"> 2.
							<a href="/perfil/<?php echo $user['username']; ?>" class="ng-binding"><?php echo $user['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $user['credits']; ?></b> Moedas
                        </div> 
                    </div>
                </div> <?php } ?>
             
                <?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE rank < 4 ORDER BY credits DESC LIMIT 3,1");
		 while($user = mysqli_fetch_array($users)){ ?>
        <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($user['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding"> 3.
							<a href="/perfil/<?php echo $user['username']; ?>" class="ng-binding"><?php echo $user['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $user['credits']; ?></b> Moedas
                        </div> 
                    </div>
                </div> <?php } ?>
             
                 <?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE rank < 4 ORDER BY credits DESC LIMIT 4,1");
		 while($user = mysqli_fetch_array($users)){ ?>
        <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($user['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding"> 4.
							<a href="/perfil/<?php echo $user['username']; ?>" class="ng-binding"><?php echo $user['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $user['credits']; ?></b> Moedas
                        </div> 
                    </div>
                </div> <?php } ?>
              <?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE rank < 4 ORDER BY credits DESC LIMIT 5,1");
		 while($user = mysqli_fetch_array($users)){ ?>
        <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($user['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding"> 5.
							<a href="/perfil/<?php echo $user['username']; ?>" class="ng-binding"><?php echo $user['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $user['credits']; ?></b> Moedas
                        </div> 
                    </div>
                </div> <?php } ?>
             
                    </div>

        <div class="top top-Duckets">
             
                   	<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND users.rank < 2 ORDER BY users_currency.amount DESC LIMIT 1,1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_currencys['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">1. <a href="/perfil/<?php echo $users_currencys['username']; ?>" class="ng-binding"><?php echo $users_currencys['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_currencys['amount']; ?></b> Duckets
                        </div> 
                    </div>
                </div> <?php } ?>
				
             
           	<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND users.rank < 2 ORDER BY users_currency.amount DESC LIMIT 2,1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_currencys['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">2. <a href="/perfil/<?php echo $users_currencys['username']; ?>" class="ng-binding"><?php echo $users_currencys['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_currencys['amount']; ?></b> Duckets
                        </div> 
                    </div>
                </div> <?php } ?>
             
                     
           	<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND users.rank < 2 ORDER BY users_currency.amount DESC LIMIT 3,1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_currencys['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">3. <a href="/perfil/<?php echo $users_currencys['username']; ?>" class="ng-binding"><?php echo $users_currencys['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_currencys['amount']; ?></b> Duckets
                        </div> 
                    </div>
                </div> <?php } ?>
             
              
           	<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND users.rank < 2 ORDER BY users_currency.amount DESC LIMIT 4,1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_currencys['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">4. <a href="/perfil/<?php echo $users_currencys['username']; ?>" class="ng-binding"><?php echo $users_currencys['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_currencys['amount']; ?></b> Duckets
                        </div> 
                    </div>
                </div> <?php } ?>
                     
           	<?php $users_currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND users.rank < 2 ORDER BY users_currency.amount DESC LIMIT 5,1");
while($users_currencys = mysqli_fetch_array($users_currency)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_currencys['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">5. <a href="/perfil/<?php echo $users_currencys['username']; ?>" class="ng-binding"><?php echo $users_currencys['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_currencys['amount']; ?></b> Duckets
                        </div> 
                    </div>
                </div> <?php } ?>
                    </div>

        <div class="top top-respeitos this-top">
                         
         <?php $users_settings = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_settings WHERE rank < 4 ORDER BY respects_received DESC LIMIT 1,1");
		 while($users_setting = mysqli_fetch_array($users_settings)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_settings['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">1. 
							<a href="/perfil/<?php echo $users_settings['username']; ?>" class="ng-binding"><?php echo $users_settings['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_settings['amount']; ?></b> Diamantes
                        </div> 
                    </div>
                </div> <?php } ?>
             
                  <?php $users_settings = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_settings WHERE rank < 4 ORDER BY respects_received DESC LIMIT 1,1");
		 while($users_setting = mysqli_fetch_array($users_settings)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_settings['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">1. 
							<a href="/perfil/<?php echo $users_settings['username']; ?>" class="ng-binding"><?php echo $users_settings['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_settings['amount']; ?></b> Diamantes
                        </div> 
                    </div>
                </div> <?php } ?>
             
                     <?php $users_settings = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_settings WHERE rank < 4 ORDER BY respects_received DESC LIMIT 1,1");
		 while($users_setting = mysqli_fetch_array($users_settings)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_settings['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">1. 
							<a href="/perfil/<?php echo $users_settings['username']; ?>" class="ng-binding"><?php echo $users_settings['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_settings['amount']; ?></b> Diamantes
                        </div> 
                    </div>
                </div> <?php } ?>
             
                  <?php $users_settings = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_settings WHERE rank < 4 ORDER BY respects_received DESC LIMIT 1,1");
		 while($users_setting = mysqli_fetch_array($users_settings)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_settings['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">1. 
							<a href="/perfil/<?php echo $users_settings['username']; ?>" class="ng-binding"><?php echo $users_settings['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_settings['amount']; ?></b> Diamantes
                        </div> 
                    </div>
                </div> <?php } ?>
				
                    <?php $users_settings = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_settings WHERE rank < 4 ORDER BY respects_received DESC LIMIT 1,1");
		 while($users_setting = mysqli_fetch_array($users_settings)){ ?>
                    <div class="list-group-item feed-item ng-scope">
            <div class="feed-item-image" style="background-image: url('<?php echo $Holo['avatar']; ?><?php echo filtro($users_settings['look']); ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3');"></div>
                    <div>
                        <p>
                       <div class="feed-item-body ng-binding">
                            <div class="feed-item-title ng-binding">1. 
							<a href="/perfil/<?php echo $users_settings['username']; ?>" class="ng-binding"><?php echo $users_settings['username']; ?></a></div>
                            <b class="ng-binding"><?php echo $users_settings['amount']; ?></b> Diamantes
                        </div> 
                    </div>
                </div> <?php } ?>
                    </div>
    </div>
</div>
                </div>
				
            </div>
        </div>
    </div>
	
    <a href="#" class="animated shake" target="_blank" style="box-shadow: 2px 2px 10px rgba(0,0,0,.2);display: block; position: fixed; bottom: 15px; left: 15px; border-radius: 100px; padding: 10px 15px; background: #1453b3;font-size: 14px;color: #fff;"><i class="fas fa-question-circle"></i> Reportar Bug's</a>

   <br><br>
<?php require_once('./Mawu/includes/index_footer.php'); ?>
<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/main.js'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/assets/js/top-users-component.js'></script>

<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6164db757825cf9a',m:'9bb20a237b562475479ac3a16ceea72c32247473-1611439957-1800-AdQTad+jxP/8Mibm+xl6qtkWBtiEJHuK3dpUXLhb8uCvSReWs/NhAJxWBcYnkmC1FV4LGpdNm8QnsJ8uZSK1K2tEEZy6Q3201pU57oXl/vZ+5HwP2IsdgEQ8PyYL9z9r2w==',s:[0xa4950f3586,0x575eb3866d],}})();</script></body>