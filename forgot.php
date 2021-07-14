<?php
require_once("inc/core.god.php");
require_once("inc/class.recaptchalib.php");
require_once("inc/plugins/vendor/autoload.php");

if(Loged == TRUE)
{
	header("Location: error");
	exit;
}

$resetmsg = NULL;

if(isset($_POST['Pseudo']) && isset($_POST['Mail']))
{
	
	$Getuser = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '". filtro($_POST['Pseudo']) ."' AND mail = '". filtro($_POST['Mail']) ."'");
	
	if(isset($_POST['g-recaptcha-response'])){
          $captcha = $_POST['g-recaptcha-response'];
    }

	if(empty($_POST['Pseudo']) || empty($_POST['Mail']))
	{
		$resetmsg = '<p class="alert alert-danger">'.$Lang['forgot.resetmsg5'].'</p>';
	}

	elseif(mysqli_num_rows($Getuser) == 0)
	{
		$resetmsg = '<p class="alert alert-danger">'.$Lang['forgot.resetmsg4'].'</p>';
	}
	
	elseif (!$captcha && $Holo['recaptcha_on'] == "true") 
	{
        $resetmsg = '<p class="alert alert-danger">'.$Lang['login.error3'].'</p>';
    }

	else 
	{
		if(mysqli_num_rows($Getuser) > 0)
		{
        $expirereset = time()+3600;
		$pseudoreset = filtro($_POST['Pseudo']);
	    $mailreset = filtro($_POST['Mail']);
		$urlreset = $Holo['url'];
		$hotelreset = $Holo['name'];
		$linkreset = hash('sha256', openssl_random_pseudo_bytes(10).filtro($_POST['Pseudo']).md5(openssl_random_pseudo_bytes(15)).time());
		
		mysqli_query(connect::cxn_mysqli(),"INSERT INTO password_forgot (username, linkreset, mail, expire, ip) VALUES ('". $pseudoreset ."', '". $linkreset ."', '". $mailreset ."', '". $expirereset ."', '". $ip ."')");
        // Create the Transport
        $transport = (new Swift_SmtpTransport(SMTP_HOST, SMTP_PORT))        ### SMTP HOST and PORT
          ->setUsername(SMTP_USERNAME)                                      ### SMTP MAIL
          ->setPassword(SMTP_PASSWORD)                                      ### SMTP PASS
		  ->setEncryption(SMTP_ENCRYPTION)                                  ### SMTP Encryption (null / ssl / tls)
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message(''.$Lang['email.text6'].''))
          ->setFrom([SMTP_USERNAME => "$hotelreset"])
          ->setTo(["$mailreset" => "$pseudoreset"])
		  ->setBody(
            '<html>'.
            '<body>'.
            '<div style="color:transparent;visibility:hidden;opacity:0;font-size:0px;border:0;max-height:1px;width:1px;margin:0px;padding:0px;border-width:0px!important;display:none!important;line-height:0px!important;"><img height="1" width="1" border="0"></div>'.
            '<td style="color: #000000; font-family: "Ubuntu", "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif; border-collapse: collapse; padding: 32px 0 24px 0;" class="content" align="left">'.
			'<h1 style="font-family: "Ubuntu Condensed", "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif; font-size: 24px; font-weight: normal; line-height: 1; margin: 0; padding: 0 0 24px 0;" id="ol-wulles-">'.$Lang['email.text1'].' '.$pseudoreset.'!</h1>'.
			'<p style="color: #000000; font-family: "Ubuntu", "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif; font-size: 16px; line-height: 1.4; padding: 0; margin: 0 0 16px 0;">'.$Lang['email.text2'].' <b>'.$mailreset.'</b>.</p>'.
			'<p style="color: #000000; font-family: "Ubuntu", "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif; font-size: 16px; line-height: 1.4; margin: 16px 0 16px 0; padding: 0;">'.$Lang['email.text3'].'</p>'.
			'<p style="color: #000000; font-family: "Ubuntu", "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif; font-size: 16px; line-height: 1.4; margin: 16px 0 16px 0; padding: 0;"><a style="text-decoration: none; color: #ffffff; background-color: #00813e; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; display: inline-block; font-family: "Ubuntu Condensed", "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif; font-size: 18px; padding: 8px 24px;" rel="noopener noreferrer" href="'.$urlreset.'/forgotchange?linkchecker='.$linkreset.'">'.$Lang['email.text4'].'</a></p>'.
            '<p style="color: #000000; font-family: "Ubuntu", "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif; font-size: 16px; line-height: 1.4; margin: 16px 0 16px 0; padding: 0;">'.$Lang['email.text5'].'</p>'.
            '<p style="color: #000000; font-family: "Ubuntu", "Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif; font-size: 16px; line-height: 1.4; padding: 0; margin: 16px 0 0 0;">– '.$Holo['name'].' Staff</p>'.
            '</td>'.
            '</body>'.
            '</html>',
            'text/html' // Mark the content-type as HTML
                   );

        // Send the message
        $result = $mailer->send($message);
			$resetmsg = "<p class='alert alert-success'>".$Lang['forgot.alsuccess']."</p>";
	
			} else {
				$resetmsg = '<p class="alert alert-danger">'.$Lang['forgot.resetmsg6'].'</p>';
			}
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

<head>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php echo $Holo['name']; ?>: <?php echo $Lang['index.titulo']; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/indexbrytch.css" type="text/css" />
    <link href="/assets/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="/assets/css/animate.css">

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

<main>
<section>
	<div class="container pt-3">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="toggle-login">
					<div class="login">
						<h3 class="mb-4"><?php echo $Lang['forgot.titulo']; ?></h3>
						
						<?php if($resetmsg !== NULL) { echo $resetmsg; } else { echo ''.$Lang['forgot.alertlink'].''; } ?>
						<li class="list-group-item">
		<form id="loginform" method="POST">
			<p class="login-username">
				<label for="user_login"><?php echo $Lang['forgot.uremail']; ?></label>
				<input type="text" name="Pseudo" id="user_login" class="form-control" size="20" required>
			</p>
			<p class="login-password">
				<label for="user_pass"><?php echo $Lang['forgot.urusern']; ?></label>
				<input type="text" name="Mail" id="user_login" class="form-control" size="20" required>
			</p>
			<p class="login-submit">
			<?php if($Holo['recaptcha_on'] == "true") { ?>
			<label for="user_code"><?php echo $Lang['register.captcha']; ?></label>
                <script src="https://www.google.com/recaptcha/api.js"></script><center><div class="g-recaptcha" data-sitekey="<?php echo $Holo['recaptcha'] ?>" ></div></center>
		    <?php } ?>	
				<hr class="my-4">

				<input name="forgot" type="submit" id="wp-submit" class="btn btn-primary" value="<?php echo $Lang['forgot.confirm']; ?>" style=" margin-left: 198px;">
				<a href="/index" class="btn btn-danger" style="
    margin-top: -60px;
    margin-left: 120px;
">Voltar</a>
						<hr class="ou my-4">
		      
			</p>
		</form>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

	</main>
	
	<?php require_once("Mawu/includes/index_footer.php"); ?>
	
<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>

<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/jquery.cookie.js?ver=1.4.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/bootstrap.min.js?ver=4.4.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/swiper.min.js?ver=5.3.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/selectize.min.js?ver=0.12.6'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/moment.min.js?ver=2.22.2'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/jquery.page.js?ver=0.1'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/main.js?ver=1.0'></script>

</body>
</html>