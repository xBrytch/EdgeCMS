<?php

/*========================================*\
| EdgeCMS for Arcturus MorningStar         |
| v1.0.0 HTML5 - BETA                               
| #########################################|
| Copyright (c) 2021, by Brytch 
| #########################################|
| Based in MawuCMS and NitroClient     
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
                                        <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> <?php echo $myrow['username']; ?>                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/me">Página Inicial</a>
							<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/account/prefer">Configurações</a>
							<div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/perfil/<?php echo $myrow['username']; ?>"><b>Meu Perfil</b></a>
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
	<?php
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
 <title><?php echo $Holo['name']; ?>: Home de <?php echo filtro($usr->username); ?> </title>
   <?php if($exits == '0')
            {
                echo '<main>
<section class="e404">
	<div class="container text-center">
		<i class="fas fa-unlink fa-4x mb-4"></i>
		<h5>Página não encontrada</h5>
		<p class="text-muted">O link pode estar quebrado ou a página pode ter sido removida. Verifique se o link que você está tentando abrir está correto.</p>
		<a href="/index" class="btn btn-primary">Voltar a página inicial</a>
		<hr class="ou my-4">

	</div>
</section>
</main>';
            }else{   
      ?>
	  <?php $isvisibles = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".filtro($usr->id)."' AND visible = '0'");
while($isvisible = mysqli_fetch_assoc($isvisibles)){ ?>
<main>
<section class="e404">
	<div class="container text-center">
		<i class="fas fa-unlink fa-4x mb-4"></i>
		<h5>Página não encontrada ou oculta</h5>
		<p class="text-muted">O link pode estar quebrado ou a página pode ter sido removida. Verifique se o link que você está tentando abrir está correto.</p>
		<a href="/index" class="btn btn-primary">Voltar a página inicial</a>
		<hr class="ou my-4">
		
	</div>
</section>
</main>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<?php require_once("Mawu/includes/index_footer.php"); ?>
<?php } ?>

<?php $isvisibles = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".filtro($usr->id)."' AND visible = '1'");
while($isvisible = mysqli_fetch_assoc($isvisibles)){ ?>
<div class="webcenter flex-column">
			<div class="flex-column">
				<div class="profile-card-main general-box pd-none">
				<?php $homecolors = mysqli_query(connect::cxn_mysqli(),"SELECT home_color,home_image FROM users WHERE id = '".filtro($usr->id)."'");
while($homecolor = mysqli_fetch_assoc($homecolors)){ ?>
					<div class="profile-card-main-cover" style="background: url('<?php echo $homecolor['home_color']; ?>');background-repeat no-repeat;     position: relative}">
						<img alt="" src="">
					</div>
	
					<div class="profile-card-main-about flex">
						<div class="flex-column pd-brytch width-content" 
						<!--  BACKGROUND COLOR - FALSE <?php echo $homecolor['home_image']; ?>">   --> <?php } ?>
							<div class="flex mr-bottom-4">
						
								<div class="profile-card-main-about-friends flex mr-auto-top-bottom mr-auto-left" style="top: -20px;">
									<icon name="friends" class="mr-right-1"></icon>
									<label class="fs-14 white"><?php echo filtro($usr->username); ?> tem <?php echo mysqli_num_rows(mysqli_query(connect::cxn_mysqli(),"SELECT * FROM messenger_friendships WHERE user_one_id = '".filtro($usr->id)."'")) ?> amigos</label>
									
								</div>
							</div>
							<div class="flex">

								<div class="flex-column">
																			<div class="profile-card-main-about-picture default ">
											<div class="profile-card-main-about-picture-imager">
												<img alt="<?php echo $Holo['name']; ?>: Home de <?php echo filtro($usr->username); ?>" src="<?php echo $Holo['avatar']; ?><?php echo filtro($usr->look); ?>&action=wav&direction=2&head_direction=3&gesture=sml&size=l">
												
											</div>
										</div>
																		<div class="profile-card-main-about-lastlogin flex mr-top-1">
										<icon name="clock-mini" class="mr-right-1"></icon>
																					<label class="color-5">
												<h5>	<?php if($usr->online == '1') { 
					        echo '<strong>Está no Hotel agora mesmo.</strong>';
					    } elseif($usr->last_online == '0') { 
				            echo 'Nunca entrou no Hotel.';
					    } else {
					        echo 'Última conexão foi à ' .GetLast($usr->last_online). '.';
					    } ?></h5>
											</label>
																			</div>
								</div>
								<div class="profile-card-main-about-infos flex-column mr-left-4 mr-auto-top">
									<div class="flex-column">
										<div class="profile-card-main-about-display-infos flex white">
											<icon class="mr-right-1" name="<?php echo filtro($usr->gender); ?>"></icon>
											
											<label class="flex">
				
												<h4 class="bold"><?php echo filtro($usr->username); ?>&nbsp;|&nbsp; 
												
												
																			<?php $tags = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".filtro($usr->id)."' AND rank > '5' ORDER BY id DESC LIMIT 1");
																			while($tag = mysqli_fetch_array($tags)){
																				?>
																			<a class="navbar-brand"><span class="staff" style="position: relative;top: 5px;right: 5px;">STAFF</span></a>	

																			<?php } ?> <?php $tags = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".filtro($usr->id)."' AND rank < '5' ORDER BY id DESC LIMIT 1");
																			while($tag = mysqli_fetch_array($tags)){
																				?>
																			<a class="navbar-brand"><span class="user" style="position: relative;top: 0px;right: 5px;">USUÁRIO</span></a>	

																			<?php } ?></h4>
												<h6 class="fs-12 mr-auto-top-bottom">

											</label>
										</div>
										<label class="mr-top-1 mr-bottom-1 white">
											<h5><img src="/assets/img/icons/motto.gif">  <?php echo filtro($usr->motto); ?></h5>
										</label>
									</div>
									<div class="profile-card-main-about-another-infos flex-column mr-top-4">
										<div class="flex mr-bottom-1">
											<icon name="room" class="mr-right-1"></icon>
											<label class="color-5">
												<h5>Brasil</h5>
											</label>
										</div>
										<div class="flex mr-bottom-1">
											<icon name="link" class="mr-right-1"></icon>
											<label class="color-5">
												<h5><?php echo $Holo['url']; ?></h5>
											</label>
										</div>
										<div class="flex">
											<icon name="display-identity" class="mr-right-1"></icon>
											<label class="color-5">
												<h5>Ingressou em <?php echo date("d/m",mysqli_real_escape_string($usr->account_created)); ?> de 2021</h5>
											</label>
										</div>
									</div>
								</div>
								<div class="flex-column mr-auto-left">
								

									<div class="profile-card-main-about-badges flex">
									<?php $friends = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM messenger_friendships WHERE user_one_id = '".filtro($usr->id)."' ORDER BY friends_since DESC LIMIT 6");
while($friend = mysqli_fetch_array($friends)){

$friendinfo = mysqli_fetch_assoc($friendinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$friend['user_two_id']."'"));
?>
										<div class="profile-card-main-about-badges-display not-badge"<div class="profile-badges-display" 	data-toggle="tooltip" title="" data-original-title="<?php echo $friendinfo['username']; ?>"><img src="<?php echo $Holo['avatar']; ?><?php echo $friendinfo['look']; ?>&action=std&direction=2&head_direction=3&img_format=png&gesture=std&headonly=1&size=n" style=" margin-top: -13px; margin-left: -8px; "></div><?php } ?>
</div>
																				
																													
																												</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="flex-column">

					<div class="flex">
						<div class="general-box-3 pd-none height-auto overflow-hidden profile-badges mr-top-1" style="margin-right:5px;">
							<div class="general-box-header pd-3">
																	<label class="color-4">
										<h5 class="bold">Emblemas de <?php echo filtro($usr->username); ?></h5>
										<h6><text><?php echo filtro($usr->username); ?> tem <?php echo mysqli_num_rows(mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_badges WHERE user_id = '".filtro($usr->id)."'")) ?> emblemas </h6>
									</label>
								 <?php $badges = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_badges WHERE user_id = '".filtro($usr->id)."' ORDER BY slot_id DESC");
while($badge = mysqli_fetch_array($badges)){
?>
							</div>
							<div class="general-box-content flex-wrap pd-2 bg-2 height-auto">

															<div class="profile-badges-display" data-toggle="tooltip" title="" data-original-title="<?php echo $badge['badge_code']; ?>"><img alt="<?php echo $badge['badge_code']; ?>" src="<?php echo $Holo['url_badges']; ?><?php echo $badge['badge_code']; ?>.gif"></div>
											

<?php } ?>
															
							</div>

						</div>

						<div class="general-box-3 pd-none height-auto overflow-hidden profile-rooms mr-top-1" style="margin-right:5px;">
							<div class="general-box-header pd-3">
																	<label class="color-4">
										<h5 class="bold">Quartos de <?php echo filtro($usr->username); ?></h5>
										<h6><text><?php echo filtro($usr->username); ?> tem <?php echo mysqli_num_rows(mysqli_query(connect::cxn_mysqli(),"SELECT * FROM rooms WHERE owner_id = '".filtro($usr->id)."'")) ?> quartos</h6>
									</label>
								 
							</div>
							<div class="general-box-content flex-column pd-2">
							<?php $rooms = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM rooms WHERE owner_id = '".filtro($usr->id)."' ORDER BY id ASC ");
while($room = mysqli_fetch_array($rooms)){
?>
																	<div class="profile-rooms-box flex">
											<label class="color-4 mr-auto-top-bottom">
												<h5><?php echo filtro(mb_strimwidth($room['name'], 0, 23, "...")); ?></h5>
											</label>
												<a href="" target="_blank" class="green-button-2 no-link mr-auto-left" style="width: 80px;height: 30px">
													<label class="mr-auto white">
													
													
													</label>
												</a>
									</div>
									
																			<?php } ?>		</div>
						</div>

						<div class="general-box-3 pd-none height-auto overflow-hidden profile-groups mr-top-1">
							<div class="general-box-header pd-3">
							
									<label class="color-4">
										<h5 class="bold">Grupos de <?php echo filtro($usr->username); ?></h5>
										<h6><?php echo filtro($usr->username); ?> tem <?php echo mysqli_num_rows(mysqli_query(connect::cxn_mysqli(),"SELECT * FROM guilds WHERE user_id = '".filtro($usr->id)."'")) ?> grupos</h6>
									</label>
								 
							</div>
											 <?php $grupos = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM guilds WHERE user_id = '".filtro($usr->id)."' ORDER BY id DESC");
while($grupo = mysqli_fetch_array($grupos)){
?>	
							<div class="general-box-content flex-wrap pd-2 bg-2 height-auto">	
							<div class="profile-group-display flex not-group" data-toggle="tooltip" title="" data-original-title="<?php echo $grupo['name']; ?>"><img alt="<?php echo $grupo['badge']; ?>" src="/badge/<?php echo $grupo['badge']; ?>.gif"></div>

															
							</div> <?php } ?>
						</div>
					</div>
				</div>
			</div>

						</div>
	<?php require_once("Mawu/includes/index_footer.php"); ?>
	
<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/main.js'></script>
<?php } ?>
<?php } ?>
		
</body>
</html>