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
	header("Location: index");
	exit;
}

if(mysqli_num_rows($chb) > 0) 
{
    header("Location: banned");
	exit;
}

if(MANTENIMIENTO == '1' && $myrow['rank'] < $Holo['minrank']) 
{
    header("Location: mantenimiento");
	exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/wvBIpr7.png"  />
    <title><?php echo $Holo['name']; ?>: Download</title>
    <meta name="keywords" content='habbinc, habblet, habbo pirata, habblethotel, habblive, habb, lella, lellahotel,lella hotel, habbinfo, habbinfo hotel, habblive, habblive hotel, habbolatino, habbletlatino, habblet, habblethotel, crazzy, habb, habbhotel , furnis , mobs, client, habbo privado, client hotel, clienthotel, atualizado, catalogo' />
    <meta name="robots" content="all">
    <meta name="Googlebot" content="index, follow">
    <meta property="image" content="">
    <meta name="description" content="">
	
<link rel='dns-prefetch' href='//code.jquery.com' />
<link rel='dns-prefetch' href='//cdn.jsdelivr.net' />
<link rel='dns-prefetch' href='//use.fontawesome.com' />
<link rel='dns-prefetch' href='//s.w.org' />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157343570-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-157343570-1');
    </script>


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link href="/assets/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/assets/css/indexbrytch.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/mebrytch.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/loja.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/buttons.css" type="text/css" />

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
                                        <li class="nav-item dropdown">
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
                    <li class="nav-item active">
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
<div class="webcenter flex-column">
			<div class="flex-column">
				<div class="flex">
					<div class="flex-column mr-right-3" style="max-width: 305px; width: 100%;">
						<label class="mr-bottom-2 color-4">
							<h4 class="bold uppercase">Aplicativos disponíveis</h4>
							<h5>Escolha o melhor aplicativo para melhorar sua experiência no <?php echo $Holo['name']; ?>.</h5>
						</label>
						<div class="vip-plans-container flex-column">
													<div class="vip-plan-item flex" data-plan-id="XlEDNdwBSx65h3EltRROGSNJvAmuTpZN">
								<label class="flex-column color-1 mr-auto-top-bottom mr-left-1">
									<h5 class="bold fs-14"><?php echo $Holo['name']; ?> APP v1 </h5>
									<h6 style="
    margin-left: 20px;
">Aplicativo próprio do <?php echo $Holo['name']; ?>.</h6>
								</label>
								<button class="green-button-2 flex mr-auto-left" style="width: 85px;height: 35px;" data-open-modal="vip-payment-method-XlEDNdwBSx65h3EltRROGSNJvAmuTpZN">
									<label class="mr-auto pointer-none color-1">
										<h5>DOWNLOAD</h5>
									</label>
								</button>
							</div>
													
													
													
													
							
													
												</div>
					</div>
					<div class="general-box pd-3 height-fit" style="max-width: 610px; width: 100%;">
						<label class="color-4">
							<p class="mr-0">
								<img src="https://cdn-lefrank.firebaseapp.com/img/uploads/12-04-2019/vip_discount_article.gif" style="float: right;">
							</p>
							<h3 class="bold">O que é o <?php echo $Holo['name']; ?> APP?</h3>
							<h5>O <?php echo $Holo['name']; ?> APP, é o aplicativo do hotel, que irá te dar uma experiência de outro nível jogando através do servidor flash sem precisar baixar outros navegadores, o aplicativo é 100% seguro e livre de vírus, é super leve, contendo apenas 6MB ou seja, você irá jogar o <?php echo $Holo['name']; ?> com uma facilidade e velocidade incríveis, baixe já!      </h5>
							<h4 class="bold mr-top-3">Benefícios gerais</h4>
							<p class="mr-top-1">
								<img src="https://i.imgur.com/dfTrL6K.png">&nbsp;Com <?php echo $Holo['name']; ?> APP você irá jogar com uma velocidade incrível;
								<br>
								<img src="https://i.imgur.com/dfTrL6K.png">&nbsp;Você não precisa baixar outros navegadores para poder entrar no servidor flash;
								<br>
								<img src="https://i.imgur.com/dfTrL6K.png">&nbsp;Alterne entre as clientes do <?php echo $Holo['name']; ?>, você poderá jogar tanto no servidor flash quanto os servidores em HTML5.
							</p>
						</label>
					</div>
				</div>
			</div>

			<div class="modal-container flex" data-modal="vip-payment-method-XlEDNdwBSx65h3EltRROGSNJvAmuTpZN">
				<div class="modal-container-box mr-auto">
					<div class="general-box-3 pd-3 payment-method-modal">
						<div class="general-box-header flex pd-top-0 pd-left-0 pd-right-0 pd-bottom-3">
							<div class="general-box-header-icon">
								<icon name="plus-magic" class="flex mr-auto"></icon>
							</div>
							<label class="color-4 flex-column text-nowrap mr-auto-top-bottom">
								<h4 class="bold text-nowrap">Métodos de download</h4>
								<h6 class="text-nowrap">Você está prestes a baixar <b>Habbum APP</b>!</h6>
							</label>
						</div>
						<div class="general-box-content flex-column mr-top-3">
							<div class="payment-warns"></div>
							<label class="color-4 mr-top-0 mr-bottom-0">
								<h5 class="mr-bottom-1">Veja abaixo os servidores disponíveis para você fazer download.</h5>
	
							</label>
							<div class="payment-methods flex-column mr-top-2">
								<a href="https://mega.nz/" target="_blank" class="payment-method paypal flex" data-method="paypal">
									<label class="mr-auto color-1 pointer-none">
										<h5>Baixar com <b>MEGA</b></h5>
									</label>
								</a>
								<a href="https://mediafire.com" target="_blank" class="payment-method picpay flex">
									<label class="mr-auto color-1 pointer-none">
										<h5>Baixar com <b>MediaFire</b></h5>
									</label>
								</a>
								<a href="<?php echo $Holo['url']; ?>/" target="_blank" class="payment-method mercadopago flex" data-method="mercadopago">
									<label class="mr-auto color-1 pointer-none">
										<h5>Baixar direto do <?php echo $Holo['name']; ?> <b>Recomendado</b></h5>
									</label>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
							</div>
						</div>
					</div>
				</div>
			</div>
</div>

<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/main.js'></script>
<script src="<?php echo $Holo['url']; ?>/assets/js/jquery.js"></script>
<script src="<?php echo $Holo['url']; ?>/assets/js/jquery-ui.js"></script>
<script src="<?php echo $Holo['url']; ?>/assets/js/main.js"></script>
<script src="<?php echo $Holo['url']; ?>/assets/js/ajax.js"></script>

</section>
</main><br><br><br><br>
<?php require_once("Mawu/includes/index_footer.php"); ?>
</body>
</html>
