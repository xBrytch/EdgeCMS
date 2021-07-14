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

if(isset($_POST['Usuario']) && isset($_POST['Mail']) && isset($_POST['Contrasena']) && isset($_POST['RContrasena']))
{   

	$Getnombre = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '". filtro($_POST['Usuario']) ."'");
	$Getmail = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE mail = '". filtro($_POST['Mail']) ."'");

	if(isset($_POST['g-recaptcha-response'])){
          $captcha = $_POST['g-recaptcha-response'];
    }

	if(empty($_POST['Usuario']) || empty($_POST['Mail']) || empty($_POST['Contrasena']) || empty($_POST['RContrasena']))
	{
		$regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error1'].'</div>';
	}
	elseif(mysqli_num_rows($Getnombre) > 0)
	{
		$regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error2'].'</div>';
	}
	elseif(mysqli_num_rows($Getmail) > 0)
	{
		$regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error3'].'</div>';
	}
	elseif($_POST['Contrasena'] !== $_POST['RContrasena'])
	{
		$regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error4'].'</div>';
	}
    elseif(strlen($_POST['Usuario']) > 18 || strlen($_POST['Usuario']) < 3) 
	{
        $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error5'].'</div>';
	}
	elseif(strrpos($_POST['Usuario'], "á") || strrpos($_POST['Usuario'], "à") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "é") || strrpos($_POST['Usuario'], "è") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "í") || strrpos($_POST['Usuario'], "ì") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ó") || strrpos($_POST['Usuario'], "ò") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ú") || strrpos($_POST['Usuario'], "ù") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ㅤ") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "õ") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ã") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ñ") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ý") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ç") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "~") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "|") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "¤") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "[") || strrpos($_POST['Usuario'], "]") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "{") || strrpos($_POST['Usuario'], "}") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "!") || strrpos($_POST['Usuario'], "#") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "$") || strrpos($_POST['Usuario'], "%") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "&") || strrpos($_POST['Usuario'], "*") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ê") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "û") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "î") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "ô") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "â") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], "MOD-") || strrpos($_POST['Usuario'], "MOD_") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
    }
	elseif(strrpos($_POST['Usuario'], " ") || strrpos($_POST['Usuario'], " ") !== false) 
	{
	    $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error6'].'</div>';
	}
	elseif (!$captcha && $Holo['recaptcha_on'] == "true") 
	{
        $regerror = '<div class="alert alert-danger" role="alert">'.$Lang['register.error7'].'</div>';
    }
	else
	{
	mysqli_query(connect::cxn_mysqli(),"INSERT INTO users (username, password, mail, look, gender, motto, ip_register, credits, account_created, account_day_of_birth) VALUES ('". filtro($_POST['Usuario']) ."', '". HashSecur($_POST['Contrasena']) ."', '". filtro($_POST['Mail']) ."', '". $Holo['look'] ."', '". $Holo['gender'] ."', '". $Holo['mision'] ."', '". $ip ."', '". $Holo['monedas'] ."', '" . time() ."', '" . time() ."')");
		$_SESSION['Username'] = filtro($_POST['Usuario']);
		$_SESSION['Password'] = $_POST['Contrasena'];
                
        $RecupUserCree = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '". filtro($_SESSION['Username']) ."' AND password = '". HashSecur($_SESSION['Password']) ."'");
        $NewUserInsert = mysqli_fetch_assoc($RecupUserCree);
	mysqli_query(connect::cxn_mysqli(),"INSERT INTO users_currency (user_id, type, amount) VALUES ('". $NewUserInsert['id'] ."', '0', '". $Holo['duckets'] ."')");
	mysqli_query(connect::cxn_mysqli(),"INSERT INTO users_currency (user_id, type, amount) VALUES ('". $NewUserInsert['id'] ."', '5', '". $Holo['diamants'] ."')");
		header("Location: me");
	}
}

?>
<!DOCTYPE html>
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
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: <?php echo $Lang['register.titulo']; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/indexbrytch.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/types.css" type="text/css" />
    <link href="/assets/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
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

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link href="/assets/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
	
    </style>
</head>
	
<?php require_once('./Mawu/includes/sub_header.php'); ?>

<div id="sound"></div>
<body ng-app="formApp" class="animated fadeIn">
<!-- Fixed navbar -->
<div >
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <div class="collapse navbar-collapse">
          <ul class="navbar-nav w-100">
                                        <li class="nav-item ">
                        <a class="nav-link" href="/index"><i class="fa fa-home" aria-hidden="true"></i> Início</a></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/registro"><i class="fa fa-user-plus" aria-hidden="true"></i> Registre-se</a></a>
                    </li>
                   
                                    </ul>
            </div>
        </div>
    </nav>
  <div class="webcenter flex-column">
			<div class="flex">
				<div class="col-3 flex-column">
					<div class="general-box register-area margin-top-md height-auto">
						<div class="general-header-box flex">
							<div class="flex margin-auto-top-bottom margin-right-min">
								<icon name="search"></icon>
							</div>
							<label class="white flex-column" style=" left: 2px;">
								<h4 class="bold">Registre-se agora</h4>
								<h5>Junte-se a nós hoje!</h5>
							</label>
						</div>
						   <div id="alerts"></div>
								<?php if($regerror !== NULL) { echo $regerror; } ?>
						<form method="POST" id="loginform" class="padding-minm padding-top-none">							
						<div class="flex-column margin-bottom-min">
								<label class="gray margin-bottom-minm">
									<h6>Escolha seu nome de usuário sabiamente, <b>não toleramos vulgaridades em nomes de usuários!</b><br><br>E o seu nome, também, deve ter entre <b>4 e 15 letras e sem caracteres especiais</b>.</h6>
								</label>
								<div class="register-inputs width-content flex">
									<icon name="head-mini"></icon>
									<input type="text" name="Usuario" placeholder="<?php echo $Lang['register.yourname']; ?>" data-input="username" id="username">
									<div class="reg-status username pointer-none"></div>
								</div>										
							</div>
							<div class="flex-column margin-bottom-min">
								<label class="gray margin-bottom-minm">
									<h6>Certifique-se de utilizar um e-mail <b>válido</b> e <b>verdadeiro</b>, pois caso necessário para recuperação de senhas, entrar em contato e dentre outro, entraremos em contato pelo mesmo.</h6>
								</label>
								<div class="register-inputs width-content flex">
									<icon name="email"></icon>
									<input type="email" name="Mail" placeholder="E-mail: (Use um e-mail válido)." data-input="email" id="email">
									<div class="reg-status email pointer-none"></div>
								</div>
							</div>
							<div class="flex-column margin-bottom-min">
								<label class="gray margin-bottom-minm">
									<h6>Segurança nunca é demais! Utilize <b>uma senha segura</b> e fácil de você lembrar, outra opção é <b>aceitar sugestões de senhas pelo seu próprio navegador</b>, a senha fica salva nele ao fazer login, facilitando mais e te deixando seguro(a).</h6>
								</label>
								<div class="register-inputs width-content flex">
									<icon name="lock-2"></icon>
									<input type="password" name="RContrasena" placeholder="Senha:" data-input="password">
									<div class="reg-status password pointer-none"></div>
								</div>
							</div>
														<div class="flex-column margin-bottom-min">
								<label class="gray margin-bottom-minm">
									<h6>Segurança nunca é demais! Agora precisamos que você confirme a senha que foi digitada anteriormente.</h6>
								</label>
								<div class="register-inputs width-content flex">
									<icon name="lock-2"></icon>
									<input type="password" name="Contrasena" placeholder="Confirme sua senha:" data-input="password">
									<div class="reg-status password pointer-none"></div>
								</div>
							</div>
													<div class="flex margin-top-min">
								<div class="flex width-content">
									<div class="margin-top-min">
									  <input name="register" type="submit" id="wp-submit" class="btn btn-primary btn-lg btn-block" value="<?php echo $Lang['register.confirm']; ?>" style="width: 257%;">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="flex-column margin-left-max margin-top-max col-5">
					<label class="gray flex-column">
						<h2 class="bold margin-bottom-min">Venha conhecer o <?php echo $Holo['name']; ?> Hotel!</h2>
						<div class="flex margin-auto-bottom">
							<h5 class="fs-14">O <b><?php echo $Holo['name']; ?> Hotel</b> é um comunidade virtual de pixels onde você pode criar seu próprio avatar, fazer muitos amigos, participar de eventos do nosso hotel, construir e decorar seus próprios quartos, criar seus próprios jogos ou jogar os de outros usuários e ficar muito famoso...</h5>
							<img class="margin-auto-top-bottom" style="min-width:200px" height="123px" src="https://images.habbo.com/c_images/WhatIsHabbo/ill_17.png">
						</div>
						<div class="flex margin-top-md">
							<img class="margin-auto-top-bottom" style="min-width:200px" height="171px" src="https://images.habbo.com/c_images/WhatIsHabbo/ill_16.png">
							<h5 class="text-right fs-14">Criatividade e originalidade são super bem-vindas no <b><?php echo $Holo['name']; ?> Hotel</b>! Toda semana temos várias competições novas para você participar. De competições de quarto, atividades legais onde você pode expressar todos os seus dons artísticos e criativos e, ainda por cima, ganhar conquistas e prêmios! Bateu a inspiração? Dê uma olhada nas nossas <b>notícias</b> para ficar por dentro das últimas atividades e competições da semana!</h5>
						</div>
					</label>
				</div>
			</div>
		</div>
	</div>
<div style="font-weight: 14px;background: #1e262c;padding: 10px;border-top: 4px solid #1b2228;margin-top: 214px;">
    <div class="container">
        
        <span style="color:#fff;font-weight:bold">EdgeCMS 1.0 BETAﾠ <i class="fa fa-bolt" aria-hidden="true"></i> </span> <br>
        <span style="color:#a7a7a7"> Desenvolvida por <b><a class="link-underline link-dev" href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Discord: Brytch#5925">Brytch</a> </b></span> 
		
		
    </div>
</div></body>
<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/main.js'></script>