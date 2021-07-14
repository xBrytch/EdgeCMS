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

if(maintenance == '1' && $myrow['rank'] < $Holo['minrank']) 
{
    header("Location: maintenance");
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

    <title><?php echo $Holo['name']; ?>: Equipe</title>
    <meta name="keywords" content='habbinc, habblet, habbo pirata, habblethotel, habblive, habb, lella, lellahotel,lella hotel, habbinfo, habbinfo hotel, habblive, habblive hotel, habbolatino, habbletlatino, habblet, habblethotel, crazzy, habb, habbhotel , furnis , mobs, client, habbo privado, client hotel, clienthotel, atualizado, catalogo' />
    <meta name="robots" content="all">
    <meta name="Googlebot" content="index, follow">
    <meta property="image" content="">
    <meta name="description" content="">

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "b93c1d26-f458-42e9-8307-5ff438af7d4b",
            });
        });
    </script>

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
                    <li class="nav-item dropdown active ">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i> Comunidade <img src="https://i.imgur.com/lZWES30.png">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/staff"><strong>Equipe </strong><img src="https://i.imgur.com/lZWES30.png"></a>
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
	<main>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
var $a = jQuery.noConflict();

function toggleMenu(id) {
	if ($a('#element-' + id).height() != 60) {
		$a('#elementButton-' + id).css("background-image", "url(https://i.imgur.com/spgxTyi.png)");
		$a('#element-' + id).animate({ height: 60 }, 1000);
	}else{
		var curHeight = $a('#element-' + id).height();
		$a('#element-' + id).css('height', 'auto');
		var autoHeight = $a('#element-' + id).height();
		
		$a('#elementButton-' + id).css("background-image", "url(https://i.imgur.com/tNnAMsI.png)");
		$a('#element-' + id).height(curHeight).animate({ height: autoHeight }, 1000);
	}
}
</script>
<section>
<style>
.contentStaffBox {
	margin:-12px 0px 0px -20px;
}

.contentStaffBox u {
	font-size:12px;
	font-weight:bold;
}

.contentStaffBox span {
	color:#7F7F7F;
}

.spacerStaff {
	margin:3px;
}

.buttonRight {
	background-image:url('https://i.imgur.com/spgxTyi.png');
	float:right;
	height:12px;
	width:14px;
	margin-right: 66px;
}

.showOnly {
	height:60px;
	overflow:hidden;
}

.staffClearFix {
	border-bottom:1px dashed #CCC;
	margin:5px 0px 0px 14px;
}

.avatarImageStaff {
	float:left;
	height:110px;
	margin:-84px 0px 0px 0px;
	width:64px;
}

.startSpaceStaff {
	margin:10px 0px 0px 0px;
}

[data-tooltip]{position:relative;z-index:2;cursor:pointer}[data-tooltip]:after,[data-tooltip]:before{visibility:hidden;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:progid: DXImageTransform.Microsoft.Alpha(Opacity=0);opacity:0;pointer-events:none}[data-tooltip]:before{position:absolute;bottom:150%;left:50%;margin-bottom:5px;margin-left:-80px;padding:7px;width:160px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;background-color:#000;background-color:hsla(0,0%,20%,.9);color:#fff;content:attr(data-tooltip);text-align:center;font-size:14px;line-height:1.2}[data-tooltip]:after{position:absolute;bottom:150%;left:50%;margin-left:-5px;width:0;border-top:5px solid #000;border-top:5px solid hsla(0,0%,20%,.9);border-right:5px solid transparent;border-left:5px solid transparent;content:" ";font-size:0;line-height:0}[data-tooltip]:hover:after,[data-tooltip]:hover:before{visibility:visible;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";filter:progid: DXImageTransform.Microsoft.Alpha(Opacity=100);opacity:1}
</style>

	<div class="container">
   <div class="webcenter flex-column" style="right: 5px;">
			<div class="flex">
				<div class="col-13 flex-column margin-right-min">
					<div class="general-box flex-column padding-none margin-bottom-min overflow-hidden">
						<div class="general-box-header-3 flex">
							<div class="general-box-header-3-icon">
								<img src="https://i.imgur.com/F1kMMnA.png" style="float:left">
							</div>
							<label class="gray flex-column text-nowrap">
								<h4 class="bold text-nowrap">Gerência</h4>
								<h6 class="text-nowrap">Responsáveis pelas contratações, demissões &amp; organização geral da equipe.</h6>
							</label>
						</div>
						<div class="general-box-content staff flex-column bg-2">
							<?php $valores = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE visible = '0' ORDER BY id DESC LIMIT 1");
			while($valor = mysqli_fetch_assoc($valores)){ ?>
			<?php $isadmin = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank >= 5");
			while($isadm = mysqli_fetch_assoc($isadmin)){
			$rank = mysqli_fetch_assoc($rank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE id = '".$isadm['rank']."'")); ?>
			<div id="custom_widget_parceiro-2" class="widget widget_custom_widget_parceiro mb-4">
			<div class="alert alert-secondary" role="alert"><?php echo $Lang['team.hide1']; ?> <b><?php echo $rank['rank_name']; ?></b>, <?php echo $Lang['team.hide2']; ?> <?php $isadmin = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE visible = '0'");
			while($isadm = mysqli_fetch_assoc($isadmin)){ ?><b><?php echo $isadm['rank_name']; ?></b> <?php } ?></div>
			</div>
			</div>
			<?php } ?>
			<?php } ?>
			
			<?php $staffs = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE rank = 8 ORDER BY username");
while($staff = mysqli_fetch_array($staffs)){
$rank = mysqli_fetch_assoc($rank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE id = '".$staff['rank']."'"));
?>
													<div class="display-staff-box flex">
				<div id="element-<?php echo $staff['id']; ?>" class="showOnly" style="height: 60px;">
							<table width="100%">
								<tbody><tr>
									<td width="64px">
										<div class="avatarImageStaff" style="background:url('<?php echo $Holo['avatar'] . $staff['look']; ?>&amp;gesture=sml')"></div>
									</td>
									<td>
										<div class="startSpaceStaff">
										<a href="javascript:void();" onclick="toggleMenu(<?php echo $staff['id']; ?>)"><div id="elementButton-<?php echo $staff['id']; ?>" class="buttonRight" style="    background-image: url(https://i.imgur.com/spgxTyi.png);
    position: absolute;
    right: 2px;"></div></a>
										
																				
																				<div style="font-weight: bold; font-size: 16px;margin-bottom: 5px; " class="ng-binding">
                                        <a href="/perfil/<?php echo $staff['username']; ?>" class="card-title username"><?php echo $staff['username']; ?></a>
                                                                                  <div class="nv<?php if($staff['online'] == '1') { echo '1'; } else { echo '0'; } ?>"><?php if($staff['online'] == '1') { echo 'Online'; } else { echo 'Offline'; } ?></div>
                                                                            </div>
										
										<div class="spacerStaff"></div>
										
										
										<img style="vertical-align:bottom;margin:0px 1px 0px 1px" src="https://i.imgur.com/LfNKAPI.png">
										<span><?php echo $staff['funcao']; ?></span>
										
										<br>
										<br>
										
										<img style="vertical-align:bottom" src="https://i.imgur.com/RiqVBQ5.png">
										<span><?php echo $staff['motto']; ?></span>
										
										<div class="spacerStaff"></div>
																				<img style="vertical-align:bottom" src="https://i.imgur.com/8xOxPUU.png">
										<span>Último login: <?php echo date('d/m/Y', $staff['last_online']) . ' às ' . date('H:i:s', $staff['last_online']) ?></span><br>
										<img style="vertical-align:bottom" src="https://i.imgur.com/x2AnXM0.png">
										<span>Na equipe há: 1 mês</span>
										
										<br>
										<br>
										
										
									</div></td>
								</tr>
							</tbody></table>
						</div>
						
				</div><?php } ?>	
						
												</div>
					</div>
					
					
					<div class="general-box flex-column padding-none margin-bottom-min overflow-hidden">
						<div class="general-box-header-3 flex">
							<div class="general-box-header-3-icon">
								<img src="https://i.imgur.com/F1kMMnA.png" style="float:left">
							</div>
							<label class="gray flex-column text-nowrap">
								<h4 class="bold text-nowrap">Administração</h4>
								<h6 class="text-nowrap">Responsáveis pelas atividades externas, promoções & administração do hotel.</h6>
							</label>
						</div>
						<div class="general-box-content staff flex-column bg-2">
									<?php $valores = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE visible = '0' ORDER BY id DESC LIMIT 1");
			while($valor = mysqli_fetch_assoc($valores)){ ?>
			<?php $isadmin = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank >= 5");
			while($isadm = mysqli_fetch_assoc($isadmin)){
			$rank = mysqli_fetch_assoc($rank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE id = '".$isadm['rank']."'")); ?>
			<div id="custom_widget_parceiro-2" class="widget widget_custom_widget_parceiro mb-4">
			<div class="alert alert-secondary" role="alert"><?php echo $Lang['team.hide1']; ?> <b><?php echo $rank['rank_name']; ?></b>, <?php echo $Lang['team.hide2']; ?> <?php $isadmin = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE visible = '0'");
			while($isadm = mysqli_fetch_assoc($isadmin)){ ?><b><?php echo $isadm['rank_name']; ?></b> <?php } ?></div>
			</div>
			</div>
			<?php } ?>
			<?php } ?>
			
			<?php $staffs = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE rank = 7 ORDER BY username");
while($staff = mysqli_fetch_array($staffs)){
$rank = mysqli_fetch_assoc($rank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE id = '".$staff['rank']."'"));
?>
							
													<div class="display-staff-box flex">
				<div id="element-<?php echo $staff['id']; ?>" class="showOnly" style="height: 60px;">
							<table width="100%">
								<tbody><tr>
									<td width="64px">
										<div class="avatarImageStaff" style="background:url('<?php echo $Holo['avatar'] . $staff['look']; ?>&amp;gesture=sml')"></div>
									</td>
									<td>
										<div class="startSpaceStaff">
										<a href="javascript:void();" onclick="toggleMenu(<?php echo $staff['id']; ?>)"><div id="elementButton-<?php echo $staff['id']; ?>" class="buttonRight" style="    background-image: url(https://i.imgur.com/spgxTyi.png);
    position: absolute;
    right: 2px;"></div></a>
										
																				
																				<div style="font-weight: bold; font-size: 16px;margin-bottom: 5px; " class="ng-binding">
                                        <a href="/perfil/<?php echo $staff['username']; ?>" class="card-title username"><?php echo $staff['username']; ?></a>
                                                                                  <div class="nv<?php if($staff['online'] == '1') { echo '1'; } else { echo '0'; } ?>"><?php if($staff['online'] == '1') { echo 'Online'; } else { echo 'Offline'; } ?></div>
                                                                            </div>
										
										<div class="spacerStaff"></div>
										
										
										<img style="vertical-align:bottom;margin:0px 1px 0px 1px" src="https://i.imgur.com/LfNKAPI.png">
										<span><?php echo $staff['funcao']; ?></span>
										
										<br>
										<br>
										
										<img style="vertical-align:bottom" src="https://i.imgur.com/RiqVBQ5.png">
										<span><?php echo $staff['motto']; ?></span>
										
										<div class="spacerStaff"></div>
																				<img style="vertical-align:bottom" src="https://i.imgur.com/8xOxPUU.png">
										<span>Último login: <?php echo date('d/m/Y', $staff['last_online']) . ' às ' . date('H:i:s', $staff['last_online']) ?></span><br>
										<img style="vertical-align:bottom" src="https://i.imgur.com/x2AnXM0.png">
										<span>Na equipe há: 1 mês</span>
										
										<br>
										<br>
										
										
									</div></td>
								</tr>
							</tbody></table>
						</div>
						
				</div><?php } ?>	
						
												</div>
					</div>
					<div class="general-box flex-column padding-none margin-bottom-min overflow-hidden">
						<div class="general-box-header-3 flex">
							<div class="general-box-header-3-icon">
								<img src="https://i.imgur.com/F1kMMnA.png" style="float:left">
							</div>
							<label class="gray flex-column text-nowrap">
								<h4 class="bold text-nowrap">Moderação</h4>
								<h6 class="text-nowrap">Responsáveis pelas atividades internas, eventos & suporte no hotel.</h6>
							</label>
						</div>
						<div class="general-box-content staff flex-column bg-2">
													<?php $valores = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE visible = '0' ORDER BY id DESC LIMIT 1");
			while($valor = mysqli_fetch_assoc($valores)){ ?>
			<?php $isadmin = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank >= 5");
			while($isadm = mysqli_fetch_assoc($isadmin)){
			$rank = mysqli_fetch_assoc($rank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE id = '".$isadm['rank']."'")); ?>
			<div id="custom_widget_parceiro-2" class="widget widget_custom_widget_parceiro mb-4">
			<div class="alert alert-secondary" role="alert"><?php echo $Lang['team.hide1']; ?> <b><?php echo $rank['rank_name']; ?></b>, <?php echo $Lang['team.hide2']; ?> <?php $isadmin = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE visible = '0'");
			while($isadm = mysqli_fetch_assoc($isadmin)){ ?><b><?php echo $isadm['rank_name']; ?></b> <?php } ?></div>
			</div>
			</div>
			<?php } ?>
			<?php } ?>
			
			<?php $staffs = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE rank = 6 ORDER BY username");
while($staff = mysqli_fetch_array($staffs)){
$rank = mysqli_fetch_assoc($rank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE id = '".$staff['rank']."'"));
?>
								
													<div class="display-staff-box flex">
				<div id="element-<?php echo $staff['id']; ?>" class="showOnly" style="height: 60px;">
							<table width="100%">
								<tbody><tr>
									<td width="64px">
										<div class="avatarImageStaff" style="background:url('<?php echo $Holo['avatar'] . $staff['look']; ?>&amp;gesture=sml')"></div>
									</td>
									<td>
										<div class="startSpaceStaff">
										<a href="javascript:void();" onclick="toggleMenu(<?php echo $staff['id']; ?>)"><div id="elementButton-<?php echo $staff['id']; ?>" class="buttonRight" style="    background-image: url(https://i.imgur.com/spgxTyi.png);
    position: absolute;
    right: 2px;"></div></a>
										
																				
																				<div style="font-weight: bold; font-size: 16px;margin-bottom: 5px; " class="ng-binding">
                                        <a href="/perfil/<?php echo $staff['username']; ?>" class="card-title username"><?php echo $staff['username']; ?></a>
                                                                                  <div class="nv<?php if($staff['online'] == '1') { echo '1'; } else { echo '0'; } ?>"><?php if($staff['online'] == '1') { echo 'Online'; } else { echo 'Offline'; } ?></div>
                                                                            </div>
										
										<div class="spacerStaff"></div>
										
										
										<img style="vertical-align:bottom;margin:0px 1px 0px 1px" src="https://i.imgur.com/LfNKAPI.png">
										<span><?php echo $staff['funcao']; ?></span>
										
										<br>
										<br>
										
										<img style="vertical-align:bottom" src="https://i.imgur.com/RiqVBQ5.png">
										<span><?php echo $staff['motto']; ?></span>
										
										<div class="spacerStaff"></div>
																				<img style="vertical-align:bottom" src="https://i.imgur.com/8xOxPUU.png">
										<span>Último login: <?php echo date('d/m/Y', $staff['last_online']) . ' às ' . date('H:i:s', $staff['last_online']) ?></span><br>
										<img style="vertical-align:bottom" src="https://i.imgur.com/x2AnXM0.png">
										<span>Na equipe há: 1 mês</span>
										
										<br>
										<br>
										
										
									</div></td>
								</tr>
							</tbody></table>
						</div>
						
				</div><?php } ?>	
						
												</div>
					</div>
					</div>
				<div class="col-14 flex-column height-fit">
					<div class="general-box flex-column padding-none margin-bottom-min overflow-hidden">
						<div class="general-box-header-3 flex">
							<div class="general-box-header-3-icon">
								<img src="https://i.imgur.com/htyD8vP.png" style="float:left">
							</div>
							<label class="gray flex-column text-nowrap">
								<h4 class="bold text-nowrap">Desenvolvimento</h4>
								<h6 class="text-nowrap">Responsáveis pelo funcionamento geral do hotel.</h6>
							</label>
						</div>
						<div class="general-box-content staff flex-column bg-2">
						<?php $valores = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE visible = '0' ORDER BY id DESC LIMIT 1");
			while($valor = mysqli_fetch_assoc($valores)){ ?>
			<?php $isadmin = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank >= 5");
			while($isadm = mysqli_fetch_assoc($isadmin)){
			$rank = mysqli_fetch_assoc($rank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE id = '".$isadm['rank']."'")); ?>
			<div id="custom_widget_parceiro-2" class="widget widget_custom_widget_parceiro mb-4">
			<div class="alert alert-secondary" role="alert"><?php echo $Lang['team.hide1']; ?> <b><?php echo $rank['rank_name']; ?></b>, <?php echo $Lang['team.hide2']; ?> <?php $isadmin = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE visible = '0'");
			while($isadm = mysqli_fetch_assoc($isadmin)){ ?><b><?php echo $isadm['rank_name']; ?></b> <?php } ?></div>
			</div>
			</div>
			<?php } ?>
			<?php } ?>
			<?php $staffs = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE rank = 9 ORDER BY username");
while($staff = mysqli_fetch_array($staffs)){
$rank = mysqli_fetch_assoc($rank = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM permissions WHERE id = '".$staff['rank']."'"));
?>
																			<div class="display-staff-box flex">
																			<div id="element-<?php echo $staff['id']; ?>" class="showOnly" style="height: 60px;">
							<table width="100%">
								<tbody><tr>
									<td width="64px">
										<div class="avatarImageStaff" style="background:url('<?php echo $Holo['avatar'] . $staff['look']; ?>&amp;gesture=sml')"></div>
									</td>
									<td>
										<div class="startSpaceStaff">
										<a href="javascript:void();" onclick="toggleMenu(<?php echo $staff['id']; ?>)"><div id="elementButton-<?php echo $staff['id']; ?>" class="buttonRight" style="    background-image: url(https://i.imgur.com/spgxTyi.png);position: absolute;right: 2px;"></div></a>
										
																				
																				<div style="font-weight: bold; font-size: 16px;margin-bottom: 5px; " class="ng-binding">
                                        <a href="/perfil/<?php echo $staff['username']; ?>" class="card-title username"><?php echo $staff['username']; ?></a>
                                                                                  <div class="nv<?php if($staff['online'] == '1') { echo '1'; } else { echo '0'; } ?>"><?php if($staff['online'] == '1') { echo 'Online'; } else { echo 'Offline'; } ?></div>
                                                                            </div>
										
										<div class="spacerStaff"></div>
										
										
										<img style="vertical-align:bottom;margin:0px 1px 0px 1px" src="https://i.imgur.com/LfNKAPI.png">
										<span><?php echo $staff['funcao']; ?></span>
										
										<br>
										<br>
										
										<img style="vertical-align:bottom" src="https://i.imgur.com/RiqVBQ5.png">
										<span><?php echo $staff['motto']; ?></span>
										
										<div class="spacerStaff"></div>
																				<img style="vertical-align:bottom" src="https://i.imgur.com/8xOxPUU.png">
										<span>Último login: <?php echo date('d/m/Y', $staff['last_online']) . ' às ' . date('H:i:s', $staff['last_online']) ?></span><br>
										<img style="vertical-align:bottom" src="https://i.imgur.com/x2AnXM0.png">
										<span>Na equipe há: 1 mês</span>
										
										<br>
										<br>
										
										
									</div></td>
								</tr>
							</tbody></table>
						</div>
						
				</div><?php } ?>	
					</div>
					<div class="col-14 flex-column height-fit" style="margin-left: 20px;width: 410px;">
						<div class="general-box flex-column padding-none margin-bottom-min overflow-hidden">
							<div class="general-box-header-3 flex bg-2">
								<div class="general-box-header-3-icon">
									<icon name="help" class="flex margin-auto"></icon>
								</div>
								<label class="gray flex-column text-nowrap">
									<h4 class="bold text-nowrap">Equipe <?php echo $Holo['name']; ?></h4>
									<h6 class="text-nowrap">Quem nós somos, o que fazemos?</h6>
								</label>
							</div>
							<div class="general-box-content staff flex-column padding-md">
								<label class="flex-column gray">
									<h5 class="margin-bottom-min">A equipe sempre está a sua disposição para anteder todas as necessidades possíveis de todos os usuários da comunidade.</h5>
									<h5 class="margin-bottom-min">Para a segurança de todos, e principalmente evitar enganos dentro do hotel, todos os staffs possuem um emblema como identificação que pode ser visto claramente em seu perfil. </h5>
									<h5 class="margin-bottom-md">Então caso alguém se passe por um membro da equipe denuncie o mas rápido possível!</h5>
									<h6 class="bold fs-12">CUIDADO!</h6>
									<h6>Os staffs nunca vão pedir a sua senha, caso alguém à peça denuncie a um membro superior da equipe</h6>
								</label>
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

</main>	
<?php require_once("Mawu/includes/index_footer.php"); ?>
</body>
</html>