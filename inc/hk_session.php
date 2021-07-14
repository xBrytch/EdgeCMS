<?php 
/*========================================*\
| EdgeCMS for Arcturus MorningStar         |
| v1.0.0 HTML5 - BETA                               
| Copyright (c) 2021, by Brytch 
| Based in MawuCMS and MegaCMS 2021     
\*========================================*/
if(isset($_POST['HUsername']) && isset($_POST['HPassword']))
{
if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {

$HU = $_POST['HUsername'];
$HP = $_POST['HPassword'];

$GetuserH = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '". filtro($myrow['username']) ."' AND password = '". HashSecur($HP) ."'");

if(empty($HU) || empty($HP))
{
    $msg = '<div class="alert alert-danger alert-dismissible" role="alert"><div class="alert-text">Ne laissez pas les champs vides.</div></div>';
}

elseif($myrow['rank'] <= $Holo['minhkr']) 
{
    $msg = '<div class="alert alert-danger alert-dismissible" role="alert"><div class="alert-text">Tu ne peux pas ou plus accéder ici.</div></div><meta http-equiv="refresh" content="5; url=#">';
}

elseif(mysqli_num_rows($GetuserH) == 0)
{
    $msg = '<div class="alert alert-danger alert-dismissible" role="alert"><div class="alert-text">Senha ou usuário incorretos.</div></div>';
}

else
{
	if(mysqli_num_rows($GetuserH) > 0)
	{
	$_SESSION['HUsername'] = $HU;
	$_SESSION['HPassword'] = $HP;
	mysqli_query(connect::cxn_mysqli(),"INSERT INTO stafflogs (action, message, note, userid, timestamp) VALUES ('Housekeeping', 'Entrer dans le panel', '". $myrow['rank'] ."', '". $myrow['id'] ."', '". $date_full ."')");
	}
}
} else {
	echo "<div class='alert alert-danger' role='alert'>Anti-CSRF: Jeton de sécurité invalide.</div>";
}
}

if(isset($_SESSION['HUsername']) && isset($_SESSION['HPassword']))
{
$HSU = $_SESSION['HUsername'];
$HSP = $_SESSION['HPassword'];

$GetUserH = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '". filtro($myrow['username']) ."' AND password = '". HashSecur($HSP) ."'");
if(mysqli_num_rows($GetUserH) > 0)
{
   $myrow = mysqli_fetch_assoc($GetUserH);
   define("UserH", TRUE);
} else {
	define("UserH", FALSE);
	session_destroy();	
	   }
} else {
   define("UserH", FALSE);
}
?>