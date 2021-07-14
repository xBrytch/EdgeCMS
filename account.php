<?php require_once("inc/core.god.php");

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
	header("Location: /login?redir=account");
	exit;
}

$aok = NULL;
$aerror = NULL;

if(isset($_POST['email_a']) && isset($_POST['email_n']) && isset($_POST['email_nr']))
{
    $EA = filtro($_POST['email_a']);
    $EN = filtro($_POST['email_n']);
    $ENR = filtro($_POST['email_nr']);

    $Checkmail = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE mail = '". $EN ."'");

    if(empty($EA) || empty($EN) || empty($ENR))
    {
        $aerror = 'Não deixe campos em branco.';
    }
    elseif(mysqli_num_rows($Checkmail) > 0) 
    {
        $aerror = 'Este já é seu e-mail atual, tente novamente.';
    }
    elseif($EN != $ENR)
    {
        $aerror = 'Os e-mails não são iguais, tente novamente.';
    }
    elseif($EA != $myrow['mail'])
    {
        $aerror = "Seu e-mail atual não está cprreto, tente novamente";
    }
    else
    {
        mysqli_query(connect::cxn_mysqli(),"UPDATE users SET mail = '". $EN ."' WHERE id = '". $myrow['id'] ."'");
        $aok = 'Seu e-mail foi alterado corretamente!<META http-equiv="refresh" content="2;URL=/account/correo">';
    }
}

if(isset($_POST['theme']))
{
    $THM = filtro($_POST['theme']);
	
	  if($THM == "auto") {
		    mysqli_query(connect::cxn_mysqli(),"UPDATE users SET theme = 'auto' WHERE id = '". $myrow['id'] ."'");
            $aok = 'Seu tema foi alterado para automático corretamente!!<META http-equiv="refresh" content="2;URL=/account/site">';
	} elseif($THM == "light") {
		    mysqli_query(connect::cxn_mysqli(),"UPDATE users SET theme = 'light' WHERE id = '". $myrow['id'] ."'");
            $aok = 'Seu tema foi alterado para claro corretamente!<META http-equiv="refresh" content="2;URL=/account/site">';
	} elseif($THM == "dark") {
		    mysqli_query(connect::cxn_mysqli(),"UPDATE users SET theme = 'dark' WHERE id = '". $myrow['id'] ."'");
            $aok = 'Seu tema foi alterado para escuro corretamente!<META http-equiv="refresh" content="2;URL=/account/site">';
	} else {
            $aerror = 'Seu tema não foi alterado corretamente, tente novamente!<META http-equiv="refresh" content="2;URL=/account/site">';
	}

}

if(isset($_POST['homecolor']))
{
    $HCL = filtro($_POST['homecolor']);

    mysqli_query(connect::cxn_mysqli(),"UPDATE users SET home_color = '". $HCL ."' WHERE id = '". $myrow['id'] ."'");
    $aok = 'Sua imagem de fundo no perfil foi alterada corretamente!.<META http-equiv="refresh" content="2;URL=/account/site">';
	
	
}

if(isset($_POST['blockvisible']))
{
    $BVS = filtro($_POST['blockvisible']);

	if($BVS == "1") {
		    mysqli_query(connect::cxn_mysqli(),"UPDATE users SET visible = '1' WHERE id = '". $myrow['id'] ."'");
            $aok = 'Suas preferências foram alteradas corretamente!<META http-equiv="refresh" content="2;URL=/account/prefer">';
	} elseif($BVS == "0") {
		    mysqli_query(connect::cxn_mysqli(),"UPDATE users SET visible = '0' WHERE id = '". $myrow['id'] ."'");
            $aok = 'Suas preferências foram alteradas corretamente!<META http-equiv="refresh" content="2;URL=/account/prefer">';
	} else {
            $aerror = 'Algo deu errado, tente novamente.<META http-equiv="refresh" content="2;URL=/account/prefer">';
	}
}

if(isset($_POST['blockfriendship']))
{
    $BFR = filtro($_POST['blockfriendship']);
	
	if($BFR == "1") {
		    mysqli_query(connect::cxn_mysqli(),"UPDATE users_settings SET block_friendrequests = '1' WHERE user_id = '". $myrow['id'] ."'");
            $aok = 'Suas preferências foram alteradas corretamente!<META http-equiv="refresh" content="2;URL=/account/prefer">';
	} elseif($BFR == "0") {
		    mysqli_query(connect::cxn_mysqli(),"UPDATE users_settings SET block_friendrequests = '0' WHERE user_id = '". $myrow['id'] ."'");
            $aok = 'Suas preferências foram alteradas corretamente!<META http-equiv="refresh" content="2;URL=/account/prefer">';
	} else {
            $aerror = 'Algo deu errado, tente novamente.<META http-equiv="refresh" content="2;URL=/account/prefer">';
	}

}

if(isset($_POST['blockfollow']))
{
    $RIN = filtro($_POST['blockfollow']);
	
	if($RIN == "1") {
		    mysqli_query(connect::cxn_mysqli(),"UPDATE users_settings SET block_roominvites = '1' WHERE user_id = '". $myrow['id'] ."'");
            $aok = 'Suas preferências foram alteradas corretamente!<META http-equiv="refresh" content="2;URL=/account/prefer">';
	} elseif($RIN == "0") {
		    mysqli_query(connect::cxn_mysqli(),"UPDATE users_settings SET block_roominvites = '0' WHERE user_id = '". $myrow['id'] ."'");
            $aok = 'Suas preferências foram alteradas corretamente!<META http-equiv="refresh" content="2;URL=/account/prefer">';
	} else {
            $aerror = 'Algo deu errado, tente novamente.<META http-equiv="refresh" content="2;URL=/account/prefer">';
	}

}

if(isset($_POST['blockalerts']))
{
    $BAL = filtro($_POST['blockalerts']);
	
	if($BAL == "1") {
		    mysqli_query(connect::cxn_mysqli(),"UPDATE users_settings SET block_alerts = '1' WHERE user_id = '". $myrow['id'] ."'");
            $aok = 'Suas preferências foram alteradas corretamente!<META http-equiv="refresh" content="2;URL=/account/prefer">';
	} elseif($BAL == "0") {
		    mysqli_query(connect::cxn_mysqli(),"UPDATE users_settings SET block_alerts = '0' WHERE user_id = '". $myrow['id'] ."'");
            $aok = 'Suas preferências foram alteradas corretamente!<META http-equiv="refresh" content="2;URL=/account/prefer">';
	} else {
            $aerror = 'Algo deu errado, tente novamente.<META http-equiv="refresh" content="2;URL=/account/prefer">';
	}

}

if(isset($_POST['Pass']) && isset($_POST['NPass']) && isset($_POST['RNPass']))
{
    $Pass = $_POST['Pass'];
    $NPass = $_POST['NPass'];
    $RNPass = $_POST['RNPass'];

    $Checkpass = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '". $myrow['id'] ."'");
    $passss = mysqli_fetch_assoc($Checkpass);

    if(empty($Pass) || empty($NPass) || empty($RNPass))
    {
        $aerror = 'Não deixe campos em branco.';
    }
    elseif($NPass != $RNPass)
    {
        $aerror = 'Suas novas senhas não coincidem, tente novamente.';
    }
    elseif(HashSecur($Pass) != $passss['password'])
    {
        $aerror = "Sua senha atual não está correta, tente novamente.";
    }
	elseif($Pass == $NPass)
    {
        $aerror = "Sua nova senha está idêntica à antiga.";
    }
    else
    {
        mysqli_query(connect::cxn_mysqli(),"UPDATE users SET password = '". HashSecur($NPass) ."' WHERE id = '". $myrow['id'] ."'");
		$aok = 'Sua senha foi alterada. Você será desconectado para aplicar as alterações ...<META http-equiv="refresh" content="3;URL=/login">';
    }
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

    <title><?php echo $Holo['name']; ?>: Configurações </title>
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
	</head>

<div id="sound"></div>
<body ng-app="formApp" class="animated fadeIn">
<?php require_once('./Mawu/includes/sub_header.php'); ?>
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
                            <a class="dropdown-item " href="/configs"><strong>Configurações</strong></a>
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
                            <a class="dropdown-item" href="#"><?php echo $Holo['name']; ?> Etiqueta</a>
							

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
<div class="container ng-scope" ng-controller="configController">
    <div class="row justify-content-md-center">
		<div class="col-md-3" style="right: 36px;">
            <div class="list-group" style="margin-bottom: 20px">
                <div class="list-group-item list-header">Menu de Configurações</div>
				
				<?php if($_GET['item'] == "correo"){ ?>
              <a class="list-group-item config-controller" href="/account/prefer">
                    Preferências »
                </a>  
				<a class="list-group-item config-controller" href="/account/site">
                    Preferências do Site »
                </a>
				<a class="list-group-item config-controller" href="/account/correo">
                    E-Mail »
                </a>
				<a class="list-group-item config-controller" href="/account/contra">
                    Senha »
                </a>
<?php }elseif($_GET['item'] == "contra"){ ?>
		      <a class="list-group-item config-controller" href="/account/prefer">
                    Preferências »
                </a>  
				<a class="list-group-item config-controller" href="/account/site">
                    Preferências do Site »
                </a>
				<a class="list-group-item config-controller" href="/account/correo">
                    E-Mail »
                </a>
				<a class="list-group-item config-controller" href="/account/contra">
                    Senha »
                </a>
<?php }elseif($_GET['item'] == "site"){ ?>
		      <a class="list-group-item config-controller" href="/account/prefer">
                    Preferências »
                </a>  
				<a class="list-group-item config-controller" href="/account/site">
                    Preferências do Site »
                </a>
				<a class="list-group-item config-controller" href="/account/correo">
                    E-Mail »
                </a>
				<a class="list-group-item config-controller" href="/account/contra">
                    Senha »
                </a>
<?php }elseif($_GET['item'] == "prefer"){ ?>
		      <a class="list-group-item config-controller" href="/account/prefer">
                    Preferências »
                </a>  
				<a class="list-group-item config-controller" href="/account/site">
                    Preferências do Site »
                </a>
				<a class="list-group-item config-controller" href="/account/correo">
                    E-Mail »
                </a>
				<a class="list-group-item config-controller" href="/account/contra">
                    Senha »
                </a>
<?php } ?>
            </div>
        </div>
        <div class="col-md-8" style="right: 40px;">
            <div id="alerts"></div>
            <div id="config" class="config-tab list-group open" style="">
                <div class="list-group-item list-header">Configurações</div>
                <div class="list-group-item">
              <?php if($_GET['item'] == "correo"){ ?>
				<div class="col-md-6" style="max-width: 100%;">
				    <h3 class="mb-3 mt-4"> E-mail</h3>
		
        <?php 
            if($aerror !== NULL)
            {
             echo  '<div class="alert alert-danger" role="alert">'.$aerror.'</div>';   
            }
			if($aok !== NULL)
			{
				echo  '<div class="alert alert-success" role="alert">'.$aok.'</div>'; 
			}
        ?>
		
        <?php
			$mailacacher = $myrow['mail'];
			$nb_caractere_visible = 2;
			$remplacement = '*';
			$longueur_mail = strlen($mailacacher);

			$partie_visible = substr($mailacacher, 0, $nb_caractere_visible);
			$mail_final = str_pad($partie_visible, $longueur_mail, $remplacement);
        ?>	
		
					<form action="" id="adduser" method="post">
						<div class="form-group form-username">
							<label for="inputEmail">Seu e-mail atual</label>
							<input class="form-control" type="email" name="email_a" id="inputEmail" value="<?php echo $myrow['mail']; ?>" required >
						</div>
						
						<hr>
						
						<div class="form-group form-username">
							<label for="inputEmail">Agora o seu novo e-mail</label>
							<input class="form-control" type="email" name="email_n" id="inputEmail" required >
						</div>
						
						<div class="form-group form-username">
							<label for="inputEmail">Repita o seu novo e-mail</label>
							<input class="form-control" type="email" name="email_nr" id="inputEmail" required >
						</div>

						<p class="form-submit">
							<input type="submit" name="account" class="btn btn-primary" value="Atualizar e-mail">
						</p>
					</form>
					
				</div>
<?php }elseif($_GET['item'] == "contra"){ ?>
				<div class="col-md-6" style="
    max-width: 100%;
">
				    <h3 class="mb-3 mt-4">Senha</h3>
					
        <?php 
            if($aerror !== NULL)
            {
             echo  '<div class="alert alert-danger" role="alert">'.$aerror.'</div>';   
            }
			if($aok !== NULL)
			{
				echo  '<div class="alert alert-success" role="alert">'.$aok.'</div>'; 
			}
        ?>
					
					<form action="" id="adduser" method="post">
						<div class="form-group form-password">
							<label for="pass1">Sua senha atual</label>
							<input class="form-control" type="password" name="Pass" id="inputPassword" required >
						</div>
						
						<hr>
						
						<div class="form-group form-password">
							<label for="pass2">Agora crie uma nova senha</label>
							<input class="form-control" type="password" name="NPass" id="inputPassword" required >
						</div>
						
						<div class="form-group form-password">
							<label for="pass2">Repita a sua nova senha</label>
							<input class="form-control" type="password" name="RNPass" id="inputPassword" required >
							<small class="form-text text-muted">Tenha certeza que não errou nenhuma letra e que não vai esquecer.</small>
						</div>

						<p class="form-submit">
							<input type="submit" name="account" class="btn btn-primary" value="Atualizar senha">
						</p>
					</form>
					
				</div>
<?php }elseif($_GET['item'] == "site"){ ?>
				<div class="col-md-6" style="
    max-width: 100%;
">
				    <h3 class="mb-3 mt-4">Preferências do Site</h3>
					
        <?php 
            if($aerror !== NULL)
            {
             echo  '<div class="alert alert-danger" role="alert">'.$aerror.'</div>';   
            }
			if($aok !== NULL)
			{
				echo  '<div class="alert alert-success" role="alert">'.$aok.'</div>'; 
			}
        ?>
					
					<form action="" id="adduser" method="post">
						<div class="form-group form-display_name">
						  <fieldset disabled="disabled">
							<label for="display_name">Escolha o Tema que deseja</label>
<?php $actuals = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$myrow['id']."' AND theme = 'light'");
while($actual = mysqli_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="theme" id="theme">
								<option value="light" selected="selected">Tema Claro</option>
								<option value="dark">Tema Escuro</option>
							</select>
<?php } ?>
<?php $actuals = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$myrow['id']."' AND theme = 'dark'");
while($actual = mysqli_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="theme" id="theme">
								<option value="dark" selected="selected">Tema Escuro</option>
								<option value="light">Tema Claro</option>
							</select>
<?php } ?>
							<!--
							<small class="form-text text-muted">Se você alterar isso, mudaremos totalmente as cores de como você vê o site atual do <?php echo $Holo['name']; ?> Hotel, adaptaremos tanto para o tema Escuro, quanto para o tema Claro(visto por padrão).</strong></small>
							-->
							<small class="form-text text-muted">Está função está temporariamente desabilitada.</strong></small>
						</fieldset>
						</div>
						
						<div class="form-group form-display_name"> 
							<label for="display_name">Escolha um <b><a href="http://imgur.com/">link no imgur</a></b> com a imagem que deseja exibir na sua <a href="/home/<?php echo $myrow['username']; ?>"><?php echo $Holo['name']; ?> Home</a>  <i class="fas fa-question-circle text-muted" data-toggle="tooltip" title="" data-original-title="Você também pode usar outro servidor de hospedar imagem, ou qualquer outra imagem com o final .png, o imgur é a preferência, esse link servirá para a imagem de fundo no seu perfil do <?php echo $Holo['name']; ?>."></i></label>
							<input class="form-control" type="text" value="<?php echo $myrow['home_color']; ?>" name="homecolor" id="homecolor">
							<small class="form-text text-muted">As medidas para uma imagem perfeita são: 930x185px </strong></small>
						</div>

						<p class="form-submit">
							<input type="submit" name="account" id="updateuser" class="btn btn-primary" value="Atualizar preferências">
						</p>
					</form><br>
					
				</div>
<?php }elseif($_GET['item'] == "prefer"){ ?>
		<div class="col-md-6" style="
    max-width: 100%;
">
<?php $actuals = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE online = '1' AND id = '". $myrow['id'] ."'");
while($actual = mysqli_fetch_assoc($actuals)){ ?>
        <div class="alert alert-danger" role="alert">Eita <?php echo $myrow['username']; ?>, você está <b>Conectado</b> no <?php echo $Holo['name']; ?> Hotel, e então a gente não vai poder realizar modificações nas suas preferências, para acessar as mudanças de preferências você precisa estar <b>Desconectado</b> do <?php echo $Holo['name']; ?> Hotel, mas fique à vontade para alterar suas outras configurações.</div>
<?php } ?> 
<?php $actuals = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE online = '0' AND id = '". $myrow['id'] ."'");
while($actual = mysqli_fetch_assoc($actuals)){ ?>
				    <h3 class="mb-3 mt-4"> Preferências</h3>
					
        <?php 
            if($aerror !== NULL)
            {
             echo  '<div class="alert alert-danger" role="alert">'.$aerror.'</div>';   
            }
			if($aok !== NULL)
			{
				echo  '<div class="alert alert-success" role="alert">'.$aok.'</div>'; 
			}
        ?>
					
					<form action="" id="adduser" method="post">
					
						<div class="form-group form-display_name">
							<label for="display_name">Visibilidade do Perfil <i class="fas fa-question-circle text-muted" data-toggle="tooltip" title="" data-original-title="Se você escolher Não ter Perfil, nem você mesmo vai conseguir visualizar a sua <?php echo $Holo['name']; ?> Home."></i></label>
<?php $actuals = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE visible = '1' AND id = '". $myrow['id'] ."'");
while($actual = mysqli_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockvisible" id="blockvisible">
								<option value="1" selected="selected">Todo mundo pode ver meu perfil</option>
								<option value="0">Não quero ter perfil</option>
							</select>
<?php } ?>
<?php $actuals = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE visible = '0' AND id = '". $myrow['id'] ."'");
while($actual = mysqli_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockvisible" id="blockvisible">
								<option value="1">Todo mundo pode ver meu perfil</option>
								<option value="0" selected="selected">Não quero ter perfil</option>
							</select>
<?php } ?>
						</div>

						<div class="form-group form-display_name">
							<label for="display_name">Pedidos de Amizade</label>
<?php $actuals = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_settings WHERE block_friendrequests = '0' AND user_id = '". $myrow['id'] ."'");
while($actual = mysqli_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockfriendship" id="blockfriendship">
								<option value="0" selected="selected">Outros <?php echo $Holo['name']; ?> podem enviar-me pedidos de amizade</option>
								<option value="1">Não quero receber pedidos de amizade</option>
							</select>
<?php } ?>
<?php $actuals = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_settings WHERE block_friendrequests = '1' AND user_id = '". $myrow['id'] ."'");
while($actual = mysqli_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockfriendship" id="blockfriendship">
								<option value="0">Outros <?php echo $Holo['name']; ?> podem enviar-me pedidos de amizade</option>
								<option value="1" selected="selected">Não quero receber pedidos de amizade</option>
							</select>
<?php } ?>
						</div>
						
						<div class="form-group form-display_name">
							<label for="display_name">Alertas dentro do Hotel <i class="fas fa-question-circle text-muted" data-toggle="tooltip" title="" data-original-title="Desativando as alertas de dentro do Hotel, você não vai conseguir ver alertas de Eventos e nem alertas normais como avisos de membros da nossa equipe."></i></label>
<?php $actuals = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_settings WHERE block_alerts = '0' AND user_id = '". $myrow['id'] ."'");
while($actual = mysqli_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockalerts" id="blockalerts">
								<option value="0" selected="selected">Eu quero ver alertas dentro do <?php echo $Holo['name']; ?></option>
								<option value="1">Não quero ver alertas</option>
							</select>
<?php } ?>
<?php $actuals = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_settings WHERE block_alerts = '1' AND user_id = '". $myrow['id'] ."'");
while($actual = mysqli_fetch_assoc($actuals)){ ?>
							<select class="custom-select" name="blockalerts" id="blockalerts">
								<option value="0">Eu quero ver alertas dentro do <?php echo $Holo['name']; ?></option>
								<option value="1" selected="selected">Não quero ver alertas</option>
							</select>
<?php } ?>
						</div>
						
						<p class="form-submit">
							<input type="submit" name="account" id="updateuser" class="btn btn-primary" value="Atualizar preferências">
						</p>
						
					</form>
<?php  } ?>
			</div>
<?php  } ?>
	</main>
	
	<?php require_once("Mawu/includes/index_footer.php"); ?>
	
	
<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/main.js'></script>
		
</body>
</html>