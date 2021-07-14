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
    <title><?php echo $Holo['name']; ?>: Loja</title>
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
                    <li class="nav-item active ">
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
    <div class="webcenter flex-column">
			<div class="flex-column">
				<div class="flex">
					<div class="flex-column mr-right-3" style="max-width: 305px; width: 100%;">
						<label class="mr-bottom-2 color-4">
							<h4 class="bold uppercase">Planos disponíveis</h4>
							<h5>Escolha um plano que cabe no seu bolso.</h5>
						</label>
						<div class="vip-plans-container flex-column">
													<div class="vip-plan-item flex" data-plan-id="XlEDNdwBSx65h3EltRROGSNJvAmuTpZN">
								<label class="flex-column color-1 mr-auto-top-bottom mr-left-1">
									<h5 class="bold fs-14">100 eCash</h5>
									<h6>Por R$10,00</h6>
								</label>
								<button class="green-button-2 flex mr-auto-left" style="width: 80px;height: 35px;" data-open-modal="vip-payment-method-XlEDNdwBSx65h3EltRROGSNJvAmuTpZN">
									<label class="mr-auto pointer-none color-1">
										<h5>Adquirir</h5>
									</label>
								</button>
							</div>
													<div class="vip-plan-item flex" data-plan-id="orZZ8mE83txBEHJKqzRN2hfUy9ZiK7b4">
								<label class="flex-column color-1 mr-auto-top-bottom mr-left-1">
									<h5 class="bold fs-14">220 eCash</h5>
									<h6>Por R$20,00</h6>
								</label>
								<button class="green-button-2 flex mr-auto-left" style="width: 80px;height: 35px;" data-open-modal="vip-payment-method-orZZ8mE83txBEHJKqzRN2hfUy9ZiK7b4">
									<label class="mr-auto pointer-none color-1">
										<h5>Adquirir</h5>
									</label>
								</button>
							</div>
													<div class="vip-plan-item flex" data-plan-id="1mGOTGtf6EB0iQiIdso2HwHaJAVHQChG">
								<label class="flex-column color-1 mr-auto-top-bottom mr-left-1">
									<h5 class="bold fs-14">500 eCash</h5>
									<h6>Por R$40,00</h6>
								</label>
								<button class="green-button-2 flex mr-auto-left" style="width: 80px;height: 35px;" data-open-modal="vip-payment-method-1mGOTGtf6EB0iQiIdso2HwHaJAVHQChG">
									<label class="mr-auto pointer-none color-1">
										<h5>Adquirir</h5>
									</label>
								</button>
							</div>
													<div class="vip-plan-item flex" data-plan-id="8BNv1qfZIvZnQxgQ5wq5HKHAD3iTL9ws">
								<label class="flex-column color-1 mr-auto-top-bottom mr-left-1">
									<h5 class="bold fs-14">1300 eCash</h5>
									<h6>Por R$100,00</h6>
								</label>
								<button class="green-button-2 flex mr-auto-left" style="width: 80px;height: 35px;" data-open-modal="vip-payment-method-8BNv1qfZIvZnQxgQ5wq5HKHAD3iTL9ws">
									<label class="mr-auto pointer-none color-1">
										<h5>Adquirir</h5>
									</label>
								</button>
							</div>
													<div class="vip-plan-item flex" data-plan-id="LLZt4l4sPGzcywr6MC5lH0R4RZyWOpsv">
								<label class="flex-column color-1 mr-auto-top-bottom mr-left-1">
									<h5 class="bold fs-14">2800 eCash</h5>
									<h6>Por R$200,00</h6>
								</label>
								<button class="green-button-2 flex mr-auto-left" style="width: 80px;height: 35px;" data-open-modal="vip-payment-method-LLZt4l4sPGzcywr6MC5lH0R4RZyWOpsv">
									<label class="mr-auto pointer-none color-1">
										<h5>Adquirir</h5>
									</label>
								</button>
							</div>
							
													<div class="vip-plan-item flex" data-plan-id="KSj8rj090jsa0t9zlxajckb71783">
								<label class="flex-column color-1 mr-auto-top-bottom mr-left-1">
									<h5 class="bold fs-14">6100 eCash</h5>
									<h6>Por R$400,00</h6>
								</label>
								<button class="green-button-2 flex mr-auto-left" style="width: 80px;height: 35px;" data-open-modal="vip-payment-method-KSj8rj090jsa0t9zlxajckb71783">
									<label class="mr-auto pointer-none color-1">
										<h5>Adquirir</h5>
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
							<h3 class="bold">O que é o eCash?</h3>
							<h5>O eCash ou <?php echo $Holo['name']; ?> Cash é a moeda oficial do <?php echo $Holo['name']; ?>! Com ela sua experiência no <?php echo $Holo['name']; ?> será muito                  melhor!     </h5>
							<h4 class="bold mr-top-3">Benefícios gerais</h4>
							<p class="mr-top-1">
								<img src="https://i.imgur.com/dfTrL6K.png">&nbsp;Com eCash você pode se tornar um membro VIP dentro do servidor, desfrutando assim de benefícios exclusivos! Para saber mais sobre o VIP clique aqui;
								<br>
								<img src="https://i.imgur.com/dfTrL6K.png">&nbsp;Tem acesso a uma loja exclusiva com os melhores raros do hotel que são atualizados mensalmente;
								<br>
								<img src="https://i.imgur.com/dfTrL6K.png">&nbsp;Tem acesso a uma loja de emblemas exclusivos.
							</p>
							<h4 class="bold mr-top-3">Seja VIP no <?php echo $Holo['name']; ?>!</h4>
							<p class="mr-top-1">
								<img src="https://i.imgur.com/dfTrL6K.png">&nbsp;Sendo VIP no <?php echo $Holo['name']; ?> você tem acessos a áreas exclusivas tanto em salas públicas como em eventos realizados pela equipe. Esbanje glamour se tornando VIP agora mesmo!
								<br>
							</p>
							<h4 class="bold mr-top-3">Comandos VIP</h4>
							<p class="mr-top-1 mr-bottom-0">
								<img src="https://i.imgur.com/dfTrL6K.png">&nbsp;<b>:nsiga</b> - Proíbe qualquer usuário de te seguir
								<br>
								<img src="https://i.imgur.com/dfTrL6K.png">&nbsp;<b>:ncopiar</b> - Proíbe qualquer usuário de corpiar seu visual
								<br>
								<img src="https://i.imgur.com/dfTrL6K.png">&nbsp;<b>:flagme</b> - Permite que você mude seu nick quando quiser
								<br>
								<img src="https://i.imgur.com/dfTrL6K.png">&nbsp;<b>:userinfo</b> - Permite que você veja as informações básicas de qualquer usuário
								<br>
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
								<h4 class="bold text-nowrap">Método de pagamento</h4>
								<h6 class="text-nowrap">Você está prestes a comprar <b>100 eCash</b>!</h6>
							</label>
						</div>
						<div class="general-box-content flex-column mr-top-3">
							<div class="payment-warns"></div>
							<label class="color-4 mr-top-0 mr-bottom-0">
								<h5 class="mr-bottom-1">Adquira agora o plano de <b>100 eCash</b> por <b>R$ 10,00</b>!</h5>
	
							</label>
							<div class="payment-methods flex-column mr-top-2">
								<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SBU4UDJKLYSWS" target="_blank"  class="payment-method paypal flex" data-method="paypal">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PayPal</b></h5>
									</label>
								</a>
								<a href="https://picpay.me/<?php echo $Holo['name']; ?>hotel/10.0" target="_blank" class="payment-method picpay flex">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PicPay</b></h5>
									</label>
								</a>
								<a href="https://pag.ae/7VYEKCqS9" target="_blank" class="payment-method mercadopago flex" data-method="mercadopago">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PagSeguro</b></h5>
									</label>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-container flex" data-modal="vip-payment-method-orZZ8mE83txBEHJKqzRN2hfUy9ZiK7b4">
				<div class="modal-container-box mr-auto">
					<div class="general-box-3 pd-3 payment-method-modal">
						<div class="general-box-header flex pd-top-0 pd-left-0 pd-right-0 pd-bottom-3">
							<div class="general-box-header-icon">
								<icon name="plus-magic" class="flex mr-auto"></icon>
							</div>
							<label class="color-4 flex-column text-nowrap mr-auto-top-bottom">
								<h4 class="bold text-nowrap">Método de pagamento</h4>
								<h6 class="text-nowrap">Você está prestes a comprar <b>220 eCash</b>!</h6>
							</label>
						</div>
						<div class="general-box-content flex-column mr-top-3">
							<div class="payment-warns"></div>
							<label class="color-4 mr-top-0 mr-bottom-0">
								<h5 class="mr-bottom-1">Adquira agora o plano de <b>220 eCash</b> por <b>R$ 20,00</b>!</h5>
	
							</label>
							<div class="payment-methods flex-column mr-top-2">
								<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2NTA6KH3H7Z9A" target="_blank"  class="payment-method paypal flex" data-method="paypal">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PayPal</b></h5>
									</label>
								</a>
								<a href="https://picpay.me/<?php echo $Holo['name']; ?>hotel/20.0" target="_blank" class="payment-method picpay flex">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PicPay</b></h5>
									</label>
								</a>
								<a href="https://pag.ae/7VYEKYrb8" target="_blank" class="payment-method mercadopago flex" data-method="mercadopago">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PagSeguro</b></h5>
									</label>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-container flex" data-modal="vip-payment-method-1mGOTGtf6EB0iQiIdso2HwHaJAVHQChG">
				<div class="modal-container-box mr-auto">
					<div class="general-box-3 pd-3 payment-method-modal">
						<div class="general-box-header flex pd-top-0 pd-left-0 pd-right-0 pd-bottom-3">
							<div class="general-box-header-icon">
								<icon name="plus-magic" class="flex mr-auto"></icon>
							</div>
							<label class="color-4 flex-column text-nowrap mr-auto-top-bottom">
								<h4 class="bold text-nowrap">Método de pagamento</h4>
								<h6 class="text-nowrap">Você está prestes a comprar <b>500 eCash</b>!</h6>
							</label>
						</div>
						<div class="general-box-content flex-column mr-top-3">
							<div class="payment-warns"></div>
							<label class="color-4 mr-top-0 mr-bottom-0">
								<h5 class="mr-bottom-1">Adquira agora o plano de <b>500 eCash</b> por <b>R$ 40,00</b>!</h5>
	
							</label>
							<div class="payment-methods flex-column mr-top-2">
								<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FXKH2XV5WKJ44" target="_blank"  class="payment-method paypal flex" data-method="paypal">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PayPal</b></h5>
									</label>
								</a>
								<a href="https://picpay.me/<?php echo $Holo['name']; ?>hotel/40.0" target="_blank" class="payment-method picpay flex">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PicPay</b></h5>
									</label>
								</a>
								<a href="https://pag.ae/7VYEL9L68" target="_blank" class="payment-method mercadopago flex" data-method="mercadopago">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PagSeguro</b></h5>
									</label>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-container flex" data-modal="vip-payment-method-8BNv1qfZIvZnQxgQ5wq5HKHAD3iTL9ws">
				<div class="modal-container-box mr-auto">
					<div class="general-box-3 pd-3 payment-method-modal">
						<div class="general-box-header flex pd-top-0 pd-left-0 pd-right-0 pd-bottom-3">
							<div class="general-box-header-icon">
								<icon name="plus-magic" class="flex mr-auto"></icon>
							</div>
							<label class="color-4 flex-column text-nowrap mr-auto-top-bottom">
								<h4 class="bold text-nowrap">Método de pagamento</h4>
								<h6 class="text-nowrap">Você está prestes a comprar <b>1300 eCash</b>!</h6>
							</label>
						</div>
						<div class="general-box-content flex-column mr-top-3">
							<div class="payment-warns"></div>
							<label class="color-4 mr-top-0 mr-bottom-0">
								<h5 class="mr-bottom-1">Adquira agora o plano de <b>1300 eCash</b> por <b>R$ 100,00</b>!</h5>
	
							</label>
							<div class="payment-methods flex-column mr-top-2">
								<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LEVZNAEZY7HTS" target="_blank"  class="payment-method paypal flex" data-method="paypal">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PayPal</b></h5>
									</label>
								</a>
								<a href="https://picpay.me/<?php echo $Holo['name']; ?>hotel/100.0" target="_blank" class="payment-method picpay flex">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PicPay</b></h5>
									</label>
								</a>
								<a href="https://pag.ae/7VYELnihR" target="_blank" class="payment-method mercadopago flex" data-method="mercadopago">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PagSeguro</b></h5>
									</label>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-container flex" data-modal="vip-payment-method-LLZt4l4sPGzcywr6MC5lH0R4RZyWOpsv">
				<div class="modal-container-box mr-auto">
					<div class="general-box-3 pd-3 payment-method-modal">
						<div class="general-box-header flex pd-top-0 pd-left-0 pd-right-0 pd-bottom-3">
							<div class="general-box-header-icon">
								<icon name="plus-magic" class="flex mr-auto"></icon>
							</div>
							<label class="color-4 flex-column text-nowrap mr-auto-top-bottom">
								<h4 class="bold text-nowrap">Método de pagamento</h4>
								<h6 class="text-nowrap">Você está prestes a comprar <b>2800 eCash</b>!</h6>
							</label>
						</div>
						<div class="general-box-content flex-column mr-top-3">
							<div class="payment-warns"></div>
							<label class="color-4 mr-top-0 mr-bottom-0">
								<h5 class="mr-bottom-1">Adquira agora o plano de <b>2800 eCash</b> por <b>R$ 200,00</b>!</h5>
	
							</label>
							<div class="payment-methods flex-column mr-top-2">
								<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=L3G8VE7M7AJ8E" target="_blank"  class="payment-method paypal flex" data-method="paypal">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PayPal</b></h5>
									</label>
								</a>
								<a href="https://picpay.me/<?php echo $Holo['name']; ?>hotel/200.0" target="_blank" class="payment-method picpay flex">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PicPay</b></h5>
									</label>
								</a>
								<a href="https://pag.ae/7VYELy-64" target="_blank" class="payment-method mercadopago flex" data-method="mercadopago">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PagSeguro</b></h5>
									</label>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal-container flex" data-modal="vip-payment-method-KSj8rj090jsa0t9zlxajckb71783">
				<div class="modal-container-box mr-auto">
					<div class="general-box-3 pd-3 payment-method-modal">
						<div class="general-box-header flex pd-top-0 pd-left-0 pd-right-0 pd-bottom-3">
							<div class="general-box-header-icon">
								<icon name="plus-magic" class="flex mr-auto"></icon>
							</div>
							<label class="color-4 flex-column text-nowrap mr-auto-top-bottom">
								<h4 class="bold text-nowrap">Método de pagamento</h4>
								<h6 class="text-nowrap">Você está prestes a comprar <b>6100 eCash</b>!</h6>
							</label>
						</div>
						<div class="general-box-content flex-column mr-top-3">
							<div class="payment-warns"></div>
							<label class="color-4 mr-top-0 mr-bottom-0">
								<h5 class="mr-bottom-1">Adquira agora o plano de <b>6100 eCash</b> por <b>R$ 400,00</b>!</h5>
	
							</label>
							<div class="payment-methods flex-column mr-top-2">
								<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GN3RNPVJ2FG3Q" target="_blank" class="payment-method paypal flex" data-method="paypal">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PayPal</b></h5>
									</label>
								</a>
								<a href="https://picpay.me/<?php echo $Holo['name']; ?>hotel/400.0" target="_blank" class="payment-method picpay flex">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PicPay</b></h5>
									</label>
								</a>
								<a href="https://pag.ae/7VYELHi-t" target="_blank" class="payment-method mercadopago flex" data-method="mercadopago">
									<label class="mr-auto color-1 pointer-none">
										<h5>Comprar com <b>PagSeguro</b></h5>
									</label>
								</a>
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
</main>	
<?php require_once("Mawu/includes/index_footer.php"); ?>
</body>
</html>
