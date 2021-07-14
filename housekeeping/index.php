<?php
require_once("../inc/core.god.php");
require_once("../inc/hk_session.php");

if(UserH == TRUE) {
    header("Location: " . $Holo['url'] ."/".$Holo['panel']."/home.php");
	exit;
}

if(Loged == TRUE) {
if($myrow['rank'] >= $Holo['minhkr']) {


?>

<!DOCTYPE html>
<html lang="fr-FR" >
<head>
    <meta charset="utf-8"/>

    <title><?php echo $Holo['name']; ?> - Administração</title>
	<link rel="icon" type="image/png" href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/images/favicon.ico" />
    <meta name="description" content="Painel de Administração <?php echo $Holo['name']; ?> Hotel">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Asap+Condensed:500"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/login/login-3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/vendors/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<body  class="kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading"  >
<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background: url(https://habbo.city/habbo-imaging/avatarimage?figure=ch-215-82.hr-3256-42-40.lg-270-1408.hd-3101-1370&amp;action=wav&amp;direction=2&amp;head_direction=3&amp;gesture=sml&amp;size=b) 109px 488px no-repeat, url(https://i.imgur.com/1CAeKb6.png) 0px -351px no-repeat, url(https://habbum.biz/nitro/assets/images/hotelview/habbo15_background_right.png) no-repeat 750px 172px;color: #FFFFFF !important;background-color: #6bc5c2;">
         <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
				
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
						  <img src="https://habbofont.net/font/habbo_new_big/<?php echo $Holo['name']; ?>.gif" style=" margin-left: 90px; ">
                            <h3><center> Administração</center></h3>
                        </div>
                        <form class="kt-form" action="" method="post">
                            <?php echo $msg; ?>
                            <div class="input-group loginform">
                                <input type="text" name='HUsername' class="form-control" placeholder="Usuário" required>
                            </div>
                            <div class="input-group loginform">
                                <input type="password" name='HPassword' class="form-control" placeholder="Senha" required>
                            </div>
							    <input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>">
                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit" class="btn btn-success btn-elevate kt-login__btn-primary">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div style="font-weight: 14px;background: #1e262c; padding: 10px;border-top: 4px solid #1b2228;margin-top: 30px">
<div class="container" style="
    margin-left: 20px;
">
        
        <span style="color:#fff;font-weight:bold">EdgeCMS 1.0 BETAﾠ <i class="fa fa-bolt" aria-hidden="true"></i> </span> <br>
        <span style="color:#a7a7a7"> Desenvolvida por <b>Brytch </b></span>
    </div>
</div></div>
    </div>
</div>

<script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/js/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo $Holo['url']; ?>/<?php echo $Holo['panel']; ?>/hen/js/scripts.bundle.js" type="text/javascript"></script>

</body>
</html>
<?php } else { 
               header("Location: " . $Holo['url'] . "/");
	           exit;
             } } else {
                        header("Location: " . $Holo['url'] . "");
	                    exit;
                      } ?>