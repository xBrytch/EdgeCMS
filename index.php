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
require_once("inc/class.recaptchalib.php");

if(Loged == TRUE)
{
	header("Location: me");
	exit;
}

if(isset($_POST['Username']) && isset($_POST['Password']))
{
	
	$Getuser = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '". filtro($_POST['Username']) ."' AND password = '". HashSecur($_POST['Password']) ."'");
	
	if(isset($_POST['g-recaptcha-response'])){
          $captcha = $_POST['g-recaptcha-response'];
    }

	if(empty($_POST['Username']) || empty($_POST['Password']))
	{
		$loginerror = '<p class="alert alert-danger">'.$Lang['login.error1'].'</p>';
	}

	elseif(mysqli_num_rows($Getuser) == 0)
	{
		$loginerror = '<p class="alert alert-danger">'.$Lang['login.error2'].'</p>';
	}
	
	elseif (!$captcha && $Holo['recaptcha_on'] == "true") 
	{
        $loginerror = '<p class="alert alert-danger">'.$Lang['login.error3'].'</p>';
    }

	else 
	{
		if(mysqli_num_rows($Getuser) > 0)
		{
			unset($_SESSION['jeton']);
			$_SESSION['Username'] = filtro($_POST['Username']);
			$_SESSION['Password'] = $_POST['Password'];
			header("Location: me");
	
			} else {
				$loginerror = '<p class="alert alert-danger">'.$Lang['login.error3'].'</p>';
			}
		}
}
?>
<script>
    var themed = new Date();
    var themeh = themed.getHours();

    if(themeh > <?php echo $Holo['in_auto_dark']; ?> || themeh < <?php echo $Holo['en_auto_dark']; ?>){
        document.write('<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="dark">');
    } else {
		document.write('<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="light">');
	};
</script>
<html class="no-js">	
﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Habbum -  Uma verdadeira explosão de diversão!</title>
<link rel="shortcut icon" href="/web/assets/img/favicon.ico" type="image/vnd.microsoft.icon" />
<meta name="viewport" content="width=device-width" />
<meta name="robots" content="index,follow,all" />
<meta name="description" content="Habbum -  Uma verdadeira explosão de diversão!" />
<meta name="keywords" content="Habbum,Habbo,habbocity, habbo-city, hbc, hcity, habbo city, habbum.biz, habbum hotel, habbo pirata, habbo pirata 2021, habbum, habbo-alpha, habbo alpha, habboalpha, habbolove, habbo-love, habbo love, hlove, habbolove inscription, habbo, HABBO, habboo, retro habbo, rétro habbo, serveur habbo, retro, jeux en ligne, jeu comme habbo, jeux comme habbo, site comme habbo, habbo site, serveur privé habbo, habbo beta, hbeta, habbobeta, habbo-beta, habbo-dreams, habbo dreams, habbo dream, habbo-dreams, cola-hotel, cola hotel, bobba, bobbaworld, bobba-world, world, worldhabbo, world-habbo, habbiworld, habbi-world, habbo-world, habbo world, hworld, zunny, abbo, habbi, abboz, habboz, habbo gratuit, habbo credit, habbo hotel, habbo hotel gratuit, jouer a habbo gratuitement, habbo en gratuit, habbo retro, recrutement staff, recrutement, mmorpg, vip, animateur, animation, jeu du celib, clack ou smack, staff, rencontre, celibataire, casino, rares, magots, enable, boutique, fifa, foot, cheval, chevaux, piscine, crédits gratuits,moedas gratis, habbo pirata, habblet, habblive, lella, crédit gratuit, staff club, virtuel, monde, réseau social, gratuit, communauté, avatar, chat, connecté, adolescence, jeu de rôle, rejoindre, social, groupes, forums, jouer, jeux, amis, ados, jeunes, collector, créer, connecter, meuble, mobilier, animaux, déco, design, appart, décorer, partager, création, badges, musique, célébrité, chat vip, fun, sortir, mmo, chat, youtube, facebook, twitter" />
<meta name="google-site-verification" content="8ccfbhMAYTDbX9uy49oZ2iwitVslMFDa7W7guXnrZbM" />
<meta name="Geography" content="Brasil" />
<meta name="country" content="Brasil" />
<meta name="Language" content="Português" />
<meta name="identifier-url" content="/" />
<meta name="Copyright" content="Habbum" />
<meta name="language" content="pt-BR" />
<meta name="hreflang" content="pt-BR" />
<meta name="category" content="Website">
<meta name="reply-to" content="djabo@godhotel.biz">
<meta property="og:site_name" content="Habbum" />
<meta property="og:url" content="/" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Habbum" />
<meta property="og:description" content="Habbum -  Uma verdadeira explosão de diversão!" />
<meta property="og:image" content="/web/assets/img/ads.png" />
<meta property="og:locale" content="pt_BR" />
<meta property="fb:page_id" content="0" />
<meta name="twitter:title" content="Habbum" />
<meta name="twitter:description" content="Habbum -  Uma verdadeira explosão de diversão!" />
<meta name="twitter:site" content="@Habbum" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:image:src" content="/web/assets/img/ads.png" />
<meta name="twitter:domain" content="/" />
<meta name="author" content="Brytch & Djabo">
<title><?php echo $Holo['name']; ?>: <?php echo $Lang['index.titulo']; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/aV2eNyK.png"  />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="/assets/css/indexbrytch.css" type="text/css" />
<link href="/assets/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="/assets/css/animate.css">
<link rel="stylesheet" href="/assets/css/styles.css">
<link rel="stylesheet" href="/assets/css/types.css">
<style type="text/css">
</head>

<body>
<div id="overlay"></div>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157343570-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-157343570-1');
    </script>
	
<!-- CSS BOOSTRAP AND FONTAWESOME - EDGECMS -->
	
    </style>
</head>
	
<?php require_once('./Mawu/includes/sub_header.php'); ?>
<body ng-app="formApp" class="animated fadeIn" style=" margin-top: -18px; ">
<!-- Fixed navbar -->
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav w-100">
                                        <li class="nav-item  active">
                        <a class="nav-link" href="/index"><i class="fa fa-home" aria-hidden="true"></i> Início</a></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/registro"><i class="fa fa-user-plus" aria-hidden="true"></i> Registre-se</a></a>
                    </li>
                   
                                    </ul>
            </div>
        </div>
    </nav>
    </div><div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="color:#1e262c;font-weight: bold;margin-top:0px;font-size: 30px;">Seja bem-vindo ao <?php echo $Holo['name']; ?></h3>
            <h5 style="color: #a7a7a7;margin-bottom:30px">Crie sua conta, construa quartos, converse e faça novos amigos!</h5>
        </div>
		
<div class="col-md-4">
            <div class="card">
                <ul class="list-group list-group-flush">
                <div id="articleTopImage" class="card-body" style="background: linear-gradient(to right, rgb(20 83 179) 10%, rgba(0, 0, 0, 0)), url(https://i.imgur.com/Vr74ioI.png) right center no-repeat;color: rgb(255, 255, 255);">
                    <img src="https://i.imgur.com/Vr74ioI.png" style="display: none" id="articleImageSrc">
                     Entrar</div>
                    <li class="list-group-item">
                         <?php if($loginerror !== NULL) { echo $loginerror; } ?>
                          
						    <form id="loginform" method="POST" class="ng-pristine ng-valid">
                      <b> <label for="user_login"><?php echo $Lang['login.username']; ?></label></b>
						<div class="width-content flex inputs-login margin-bottom-min">
							<div class="identification-look"></div>
							 <input tabindex="2" type="text" name="Username" placeholder="Seu usuário..."id="user_login"  class="form-control">
						</div>
                            <div class="form-group">
                               <label for="user_pass"><?php echo $Lang['login.password']; ?></label>
							  <div class="width-content flex inputs-login margin-bottom-min">
							<div class="password-big" style=" top: 38px; left: 10px; "></div>
                                <input  type="password" name="Password" placeholder="Sua senha..." id="user_pass" class="form-control">	

                            </div>
                        
                            <a href="/forgot"><b>Esqueceu sua senha?</b></a>
							   <button name="login" type="submit" id="wp-submit"  class="btn btn-primary" style="float: right">
							   <?php echo $Lang['login.confirm']; ?></button>
                            
                        </form>
                    </li>
                </ul>
            </div>
        </div>
		<div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" id="master-indexbigbg">
                        <div class="card-body" style="padding: 26px;">
						<!-- <img src="https://i.imgur.com/AXXeSeg.gif" style="position: absolute; right: -46px;bottom: 171px;"> frank -->
                            <i class="fa fa-check-circle" aria-hidden="true"></i> Divirta-se com seus amigos pixelados, com total segurança!
							<br>
                            <i class="fa fa-check-circle" aria-hidden="true"></i> Monte seu visual e seu quarto com moedas ilimitadas!
							<br>
                            <i class="fa fa-check-circle" aria-hidden="true"></i> Cadastre-se agora e ganhe milhares de moedas!
							<br>
                            <i class="fa fa-check-circle" aria-hidden="true"></i> Jogue eventos todos os dias da semana!
							<br>
                            <i class="fa fa-check-circle" aria-hidden="true"></i> Não pague nada, é tudo de graça!
							<br>
                            <i class="fa fa-check-circle" aria-hidden="true"></i> Ganhe moedas ficando online!
							<br>
                            <i class="fa fa-check-circle" aria-hidden="true"></i> Vagas na equipe!
							<br>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                  <a href="/registro" class="btn btn-primary btn-lg btn-block" style="color: #fff; margin-top: 8px;">
                        O que está esperando?
                        <h3 style="margin:0;padding:0; color: #fff;font-weight: bold;">CRIE SUA CONTA!</h3>
                    </a>
                </div>
            </div>
        </div>

</div>
<br>
<br>
<br>
<br>
</div>
<?php require_once("Mawu/includes/index_footer.php"); ?>
</body>
<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/main.js'></script>

<script type="text/javascript">

jQuery(document).on('keyup', '#user_login', function() {
    name = $("#user_login").val();
    if (name != "") {
        $.ajax({
            type: "POST",
            url: "/avatar-registro.php",
            data: {
                "username": name
            },
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			},
            success: function(data) {
				if (data == "0") {
					$(".identification-look").css("background", "/assets/img/ghost.png");
				} else {
					$(".identification-look").css("background", "url('https://avatar.habblive.net/habbo-imaging/avatarimage?figure=" + data + "&action=std&direction=2&head_direction=3&gesture=std&size=n&img_format=png&frame=0&headonly=0')");
				}
            }
        });
    }
});

</script>
