<?php
require_once("inc/core.god.php");
/*========================================*\
| EdgeCMS for Arcturus MorningStar         |
| v1.0.0 HTML5 - BETA                               
| #########################################|
| Copyright (c) 2021, by Brytch 
| #########################################|
| Based in MawuCMS and MegaCMS 2021     
\*========================================*/
if(Loged == FALSE)
{
	header("Location: /");
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

    <title><?php echo $Holo['name']; ?>: Hall da Fama</title>
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

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript">
	var $a = jQuery.noConflict();
	function toggleMenu(id) {
		if ($a('#' + id).height() != 200) {
			$a('#' + id).animate({ marginTop: 12 }, {duration: 1000, queue: false});
			$a('#' + id).animate({ height: 200 }, 1000);
		}else{
			$a('#' + id).animate({ marginTop: 12 }, {duration: 1000, queue: false});
			$a('#' + id).animate({ height: 50 }, 1000);
		}
	}
	</script>
	<style type="text/css">
	.supertext {
    background-color: #FFF;
    height: 13px;
    overflow: hidden;
    padding: 10px 10px 5px 1px;
    position: relative;
    z-index: 9;
	}
	</style>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link href="/assets/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/assets/css/indexbrytch.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/styles.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/types.css" type="text/css" />

	
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
                        <li class="nav-item active">
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
<div class="webcenter flex-column"style="left: -3px;">

			<div class="flex">
							<div class="general-box hall-of-fame promos padding-none overflow-hidden flex-column margin-right-min">
	
			<?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT promos,username,look from users WHERE rank < 6 ORDER BY promos + 0 DESC LIMIT 0,1");
                while($user = mysqli_fetch_array($users)){ ?>
                 						<div class="first-famous-habbo">
							<div class="first-famous-habbo-banner credits">
								<label>TOP 5 Promoções</label>
							</div>
							<div class="flex">
								<div class="first-famous-habbo-imager">
									<img alt="" src="<?php echo $Holo['avatar'] . $user['look']; ?>&action=wav&direction=2&head_direction=3&gesture=sml&size=b;img_format=png">
								</div>
								<div class="flex margin-auto-top-bottom width-content">
									<label class="gray flex-column margin-auto-top-bottom"style="  left: -5px;">
									<h5 class="bold"><a class="no-link" href="/perfil/<?php echo $user['username']; ?>">
									<?php echo $user['username']; ?></a></h5>
										<h6>Por ter ganho <b><?php echo $user['promos']; ?></b> promoções</h6>
									</label>
									<div class="trophy flex">
										<icon name="gold-promos-trophy"></icon>
									</div>
								</div>
							</div>
						</div><?php } ?>
						<?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT promos,username,look from users WHERE rank < 6 ORDER BY promos + 0 DESC LIMIT 1,1");
                while($user = mysqli_fetch_array($users)){ ?>
											<div class="others-famous-habbo flex">
							<div class="others-famous-habbo-imager">
								<img alt="" src="<?php echo $Holo['avatar'] . $user['look']; ?>&action=crr=667&direction=2&head_direction=2&gesture=sml&size=b">
							</div>
							<div class="flex margin-auto-top-bottom width-content">
								<label class="gray flex-column margin-auto-top-bottom"style="  left: -5px;">
									<h5 class="bold"><a class="no-link" href="/perfil/<?php echo $user['username']; ?>"><?php echo $user['username']; ?></a></h5>
										<h6>Por ter ganho <b><?php echo $user['promos']; ?></b> promoções</h6>
								</label>
								<div class="trophy flex">
									<icon name="silver-promos-trophy"></icon>
								</div>
							</div>
						</div><?php } ?>
								<?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT promos,username,look from users WHERE rank < 6 ORDER BY promos + 0 DESC LIMIT 2,1");
                while($user = mysqli_fetch_array($users)){ ?>
											<div class="others-famous-habbo flex">
							<div class="others-famous-habbo-imager">
								<img alt="" src="<?php echo $Holo['avatar'] . $user['look']; ?>&action=crr=667&direction=2&head_direction=2&gesture=sml&size=b">
							</div>
							<div class="flex margin-auto-top-bottom width-content">
								<label class="gray flex-column margin-auto-top-bottom"style="  left: -5px;">
									<h5 class="bold"><a class="no-link" href="/perfil/<?php echo $user['username']; ?>"><?php echo $user['username']; ?></a></h5>
									<h6>Por ter ganho <b><?php echo $user['promos']; ?></b> promoções</h6>
								</label>
								<div class="trophy flex">
									<icon name="bronze-promos-trophy"></icon>
								</div>
							</div>
						</div>	<?php } ?>
								<?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT promos,username,look from users WHERE rank < 6 ORDER BY promos + 0 DESC LIMIT 3,2");
                while($user = mysqli_fetch_array($users)){ ?>
											<div class="others-famous-habbo flex">
							<div class="others-famous-habbo-imager">
								<img alt="" src="<?php echo $Holo['avatar'] . $user['look']; ?>&action=crr=667&direction=2&head_direction=2&gesture=sml&size=b">
							</div>
							<div class="flex margin-auto-top-bottom width-content">
								<label class="gray flex-column margin-auto-top-bottom"style="  left: -5px;">
									<h5 class="bold"><a class="no-link" href="/perfil/<?php echo $user['username']; ?>"><?php echo $user['username']; ?></a></h5>
											<h6>Por ter ganho <b><?php echo $user['promos']; ?></b> promoções</h6>
								</label>
							</div>
						</div><?php } ?>
								<div class="supertexs" id="fPromocoes" style="margin-top: 12px; height: 50px; margin-left: 5px;">
									<center>	<div class="trophy flex">
									<icon name="help" style=" left: 7px; "></icon>
									<center style=" margin-top: 10px; margin-left: 13px; ">
									<a href="javascript:void();" onclick="toggleMenu('fPromocoes')">
									<b>Como ganhar pontos de promoções?</b>
									</a>
									</center>
								</div></center>
									<br>
									Para adquirir estes pontos é necessário vencer uma promoção elaborada pela Equipe Habbum.
									<br>
									<br>
									Para saber se uma promoção vale ou não para este sistemas, basta conferir se ela pertence a uma destas categorias: Competições, Promoções ou Campanhas temáticas.
									</div>
									</div>
									
				<div class="general-box hall-of-fame diamonds padding-none overflow-hidden flex-column margin-right-min">
	
			<?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT eventos,username,look from users WHERE rank < 6 ORDER BY eventos + 0 DESC LIMIT 0,1");
                while($user = mysqli_fetch_array($users)){ ?>
                 						<div class="first-famous-habbo">
							<div class="first-famous-habbo-banner diamonds">
								<label>TOP 5 Eventos</label>
							</div>
							<div class="flex">
								<div class="first-famous-habbo-imager">
									<img alt="" src="<?php echo $Holo['avatar'] . $user['look']; ?>&action=wav&direction=2&head_direction=3&gesture=sml&size=b;img_format=png">
								</div>
								<div class="flex margin-auto-top-bottom width-content">
									<label class="gray flex-column margin-auto-top-bottom"style="  left: -5px;">
									<h5 class="bold"><a class="no-link" href="/perfil/<?php echo $user['username']; ?>">
									<?php echo $user['username']; ?></a></h5>
										<h6>Por ter ganho <b><?php echo $user['eventos']; ?></b> eventos</h6>
									</label>
									<div class="trophy flex">
										<icon name="gold-events-trophy"></icon>
									</div>
								</div>
							</div>
						</div><?php } ?>
						<?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT eventos,username,look from users WHERE rank < 6 ORDER BY eventos + 0 DESC LIMIT 1,1");
                while($user = mysqli_fetch_array($users)){ ?>
											<div class="others-famous-habbo flex">
							<div class="others-famous-habbo-imager">
								<img alt="" src="<?php echo $Holo['avatar'] . $user['look']; ?>&action=crr=667&direction=2&head_direction=2&gesture=sml&size=b">
							</div>
							<div class="flex margin-auto-top-bottom width-content">
								<label class="gray flex-column margin-auto-top-bottom"style="  left: -5px;">
									<h5 class="bold"><a class="no-link" href="/perfil/<?php echo $user['username']; ?>"><?php echo $user['username']; ?></a></h5>
										<h6>Por ter ganho <b><?php echo $user['eventos']; ?></b> eventos</h6>
								</label>
								<div class="trophy flex">
									<icon name="silver-events-trophy"></icon>
								</div>
							</div>
						</div><?php } ?>
						
							<?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT eventos,username,look from users WHERE rank < 6 ORDER BY eventos + 0 DESC LIMIT 2,1");
                while($user = mysqli_fetch_array($users)){ ?>
											<div class="others-famous-habbo flex">
							<div class="others-famous-habbo-imager">
								<img alt="" src="<?php echo $Holo['avatar'] . $user['look']; ?>&action=crr=667&direction=2&head_direction=2&gesture=sml&size=b">
							</div>
							<div class="flex margin-auto-top-bottom width-content">
								<label class="gray flex-column margin-auto-top-bottom"style="  left: -5px;">
									<h5 class="bold"><a class="no-link" href="/perfil/<?php echo $user['username']; ?>"><?php echo $user['username']; ?></a></h5>
										<h6>Por ter ganho <b><?php echo $user['eventos']; ?></b> eventos</h6>
								</label>
								<div class="trophy flex">
									<icon name="bronze-events-trophy"></icon>
								</div>
							</div>
						</div>	<?php } ?>
							<?php $users = mysqli_query(connect::cxn_mysqli(),"SELECT eventos,username,look from users WHERE rank < 6 ORDER BY eventos + 0 DESC LIMIT 3,2");
                while($user = mysqli_fetch_array($users)){ ?>
											<div class="others-famous-habbo flex">
							<div class="others-famous-habbo-imager">
								<img alt="" src="<?php echo $Holo['avatar'] . $user['look']; ?>&action=crr=667&direction=2&head_direction=2&gesture=sml&size=b">
							</div>
							<div class="flex margin-auto-top-bottom width-content">
								<label class="gray flex-column margin-auto-top-bottom"style="  left: -5px;">
									<h5 class="bold"><a class="no-link" href="/perfil/<?php echo $user['username']; ?>"><?php echo $user['username']; ?></a></h5>
										<h6>Por ter ganho <b><?php echo $user['eventos']; ?></b> eventos</h6>
								</label>
							</div>
						</div><?php } ?>
						<tr>
						
						<div class="supertexs" id="fEventos" style="margin-top: 12px;height: 50px; margin-left: 5px;">
						<div class="trophy flex">
									<icon name="help" style=" left: 7px; "></icon>
									<center style=" margin-top: 10px; margin-left: 13px; ">
									<a href="javascript:void();" onclick="toggleMenu('fEventos')">
									<b>Como ganhar pontos de eventos?</b>
									</a>
									</center>
								</div>
					
						<br/>
						Para adquirir estes pontos &eacute; necess&aacute;rio vencer um evento proporcionado pela equipe, ap&oacute;s ter obtido todos os cem n&iacute;veis de emblemas GAMES.
						<br/>
						<br/>
						Lembrando que os pontos de eventos no final do Hall da Fama, irão te dar vários prêmios. Por isso, fiquem atento aos alertas e boa sorte.
						</div>
									</div>
					<div id="column1" class="card" style="margin-right: -326px;width: 331px;margin-left: -19px;">
						<style>
							.error {
								padding: 7px;
								background-color: #fff4f2;
								border: 1px solid #a63c29;
								color: #E2001A;
								margin-top: 5px;
							}

							.error > h3 {
								font-weight: bold;
								margin: 0px;
								padding: 0px;
								font-size: 13px;
							}
							div.goodmsg {
								padding: 7px;
								background-color: #d8f3d8;
								border: 1px solid #4da04d;
								color: #205220;
								margin-top: 5px;
							}

							div.goodmsg > h3 {
								font-weight: bold;
								margin: 0px;
								padding: 0px;
								font-size: 13px;
							}
							div.display_none {
								display: none;
							}
							</style>
							<style type="text/css">
							<!--
							.Estilo1 {
								font-family: Verdana, Arial, Helvetica, sans-serif;
								font-size: 12px;
							}
							-->
							</style>

							<div class="habblet-container ">
							<div class="cb clearfix blue "><div class="bt"><div></div></div><div class="i1"><div class="i2"><div class="i3"> 
							<div id="icon-aanbevolen"></div>
						<div class="first-famous-habbo">
							</div>

							<div class="box-content" style="margin-left: 6px;">
					<p style="text-align: center;"><img src="https://i.imgur.com/CoOt7Pp.png" style="
					height: 204px;">&ZeroWidthSpace;</p>

				<label class="gray">
						<h5>O Hall da Fama de <b>conquistas</b> foi criado com intuito de promover os melhores jogadores de eventos ou os mais empenhados em ganhar promoções onde você tem a chance de ficar entre os 5 usuários que fazem mais pontos em eventos ou que participaram e ganharam promoções!<br><br>Ao final de todo mês este hall da fama é resetado, assim dando uma nova chance para que as outras pessoas possam aparecer por aqui, sem contar que após ser resetado os usuários que ficaram no pódio (5 lugares) ganharam prêmios sendo eles rubis, gemas, emblemas ou até raros. Não perca essa chance e participe dos eventos e ganhe promoções para receber prêmios e ficar famoso!</h5>
					</label>
							</p></div>
							</div></div></div><div class="bb"><div></div></div></div>

							</div>

					</div>		
						</div>
						
						<br><br><br><br><br><br><br> </main>
							<?php require_once("Mawu/includes/index_footer.php"); ?>
							
<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/main.js'></script>