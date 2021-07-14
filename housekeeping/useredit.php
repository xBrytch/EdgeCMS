<?php
require_once('core.php');
require_once('session.php');
$user_id = $_GET['user'];
$stmtusuarioid = $dbConnection->prepare('SELECT COUNT(*) FROM users WHERE id= :id');
$stmtusuarioid->execute(array('id' => "$user_id"));
$usuarioid = $stmtusuarioid->fetchColumn();
														
if ($usuarioid == 0) {
	header ("Location: users.php?error=$w");
}
$stmtusuarioinfo = $dbConnection->prepare('SELECT * FROM users WHERE id= :id');
$stmtusuarioinfo->execute(array('id' => "$user_id"));
$usuarioinfo = $stmtusuarioinfo->fetch();

$stmtrecompensas = $dbConnection->prepare('SELECT achievement_score FROM users_settings WHERE user_id=:id LIMIT 1');
$stmtrecompensas->execute(array('id' => "$user_id"));
$recompensasmostrar = $stmtrecompensas->fetchColumn();

$diamantes=0;
$cacahuates=0;
$currency = $dbConnection->prepare('SELECT * FROM users_currency WHERE user_id= :id');
$currency->execute(array('id' => "$user_id"));
														
while($currency_q = $currency->fetch(PDO::FETCH_ASSOC)){
	if ($currency_q['type']=="102") {
		$cacahuates=$currency_q['amount'];
	}
	if ($currency_q['type']=="5") {
		$diamantes=$currency_q['amount'];
	}
}

if (isset($_POST['save'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$credits = $_POST['credits'];
$motto = $_POST['motto'];
$rank = $_POST['rank'];
$diamantes = $_POST['diamantes'];
$cacahuates = $_POST['cacahuates'];
$recompensas = $_POST['recompensas'];

$stmtsave = $dbConnection->prepare("UPDATE users SET mail = :email WHERE mail = :emailid");
$stmtsave->bindParam(":email", $email);
$stmtsave->bindParam(":emailid", $usuarioinfo['mail']);
$stmtsave->execute();

$stmtsave = $dbConnection->prepare("UPDATE chocolatey_users_id SET mail = :email WHERE mail = :emailid");
$stmtsave->bindParam(":email", $email);
$stmtsave->bindParam(":emailid", $usuarioinfo['mail']);
$stmtsave->execute();

$stmtsave = $dbConnection->prepare("UPDATE users SET username=:username, credits=:credits, motto=:motto, rank=:rank WHERE id=:id");
$stmtsave->bindParam(":username", $username);
$stmtsave->bindParam(":credits", $credits);
$stmtsave->bindParam(":motto", $motto);
$stmtsave->bindParam(":rank", $rank);
$stmtsave->bindParam(":id", $user_id);
$stmtsave->execute();

$stmtsave = $dbConnection->prepare("UPDATE users_settings SET achievement_score=:recompensas WHERE user_id=:id");
$stmtsave->bindParam(":recompensas", $recompensas);
$stmtsave->bindParam(":id", $user_id);
$stmtsave->execute();

$cacacount = $dbConnection->prepare('SELECT COUNT(*) FROM users_currency WHERE user_id=:id AND type=:tipo');
$cacacount->bindParam(":id", $user_id);
$cacacount->bindValue(":tipo",102);
$cacacount->execute();
$cacacount_count = $cacacount->fetchColumn();

$diamcount = $dbConnection->prepare('SELECT COUNT(*) FROM users_currency WHERE user_id=:id AND type=:tipo');
$diamcount->bindParam(":id", $user_id);
$diamcount->bindValue(":tipo", 5);
$diamcount->execute();
$diamcount_count = $diamcount->fetchColumn();

if ($diamcount_count == 0) { 
	$stmtsave = $dbConnection->prepare("INSERT INTO users_currency (type,amount,user_id) VALUES (:tipo,:cantidad,:id)");
	$stmtsave->bindParam(":cantidad", $diamantes);
	$stmtsave->bindValue(":tipo", 5);
	$stmtsave->bindParam(":id", $user_id);
	$stmtsave->execute();
}
else{
	$stmtsave = $dbConnection->prepare("UPDATE users_currency SET amount=:cantidad WHERE user_id=:id AND type=:tipo");
	$stmtsave->bindParam(":cantidad", $diamantes);
	$stmtsave->bindValue(":tipo", 5);
	$stmtsave->bindParam(":id", $user_id);
	$stmtsave->execute();
}

if ($cacacount_count == 0) { 
	$stmtsave = $dbConnection->prepare("INSERT INTO users_currency (type,amount,user_id) VALUES (:tipo,:cantidad,:id)");
	$stmtsave->bindParam(":cantidad", $cacahuates);
	$stmtsave->bindValue(":tipo", 102);
	$stmtsave->bindParam(":id", $user_id);
	$stmtsave->execute();
}
else{
	$stmtsave = $dbConnection->prepare("UPDATE users_currency SET amount=:cantidad WHERE user_id=:id AND type=:tipo");
	$stmtsave->bindParam(":cantidad", $cacahuates);
	$stmtsave->bindValue(":tipo", 102);
	$stmtsave->bindParam(":id", $user_id);
	$stmtsave->execute();
}

header ("Location: users.php?saved=$w");
}
?>
<!DOCTYPE html>
<html lang="es"> 
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Housekeeping - Editar Usuario ~ <?php echo $usuarioinfo['username']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link href="assets/css/fontawesome-all.css" rel="stylesheet">
		<link href="assets/css/hebbo.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="assets/js/ace-extra.min.js"></script>
	</head>

	<body class="no-skin">
	
		<?php
			include_once('include/menu.php');
		?>
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="home.php">Inicio</a>
							</li>
							<li class=""><a href="users.php">Usuarios</a></li>
							<li class="active">Editar Usuario: <?php echo $usuarioinfo['username']; ?></li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content" style="padding-top:-20px;">

						<div class="page-header">
							<h1>
								<i class="ace-icon fa fa-angle-double-right"></i> Editar Usuario
								<small>
									<br>
									Edita cuidadosamente el perfil del usuario antes de guardar cambios.
								</small>
							</h1>
						</div><!-- /.page-header -->


						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

<div class="row">
									<div class="col-xs-12">
									<form method="post" class="form-horizontal">
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="username">Nombre:</label>
										<div class="col-sm-9">
											<input type="text" name="username" value="<?php echo $usuarioinfo['username']; ?>" id="username" class="col-xs-10 col-sm-5" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="email">Email:</label>
										<div class="col-sm-9">
											<input type="email" name="email" value="<?php echo $usuarioinfo['mail']; ?>" id="email" class="col-xs-10 col-sm-5" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="motto">Misión:</label>
										<div class="col-sm-9">
											<input type="text" id="motto" name="motto" value="<?php echo $usuarioinfo['motto']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="credits">Créditos:</label>
										<div class="col-sm-9">
											<input type="text" id="credits" name="credits" value="<?php echo $usuarioinfo['credits']; ?>" class="col-xs-10 col-sm-5" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="diamantes">Diamantes:</label>
										<div class="col-sm-9">
											<input type="text" id="diamantes" name="diamantes" value="<?php echo $diamantes; ?>" class="col-xs-10 col-sm-5" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="cacahuates">Cacahuates:</label>
										<div class="col-sm-9">
											<input type="text" id="cacahuates" name="cacahuates" value="<?php echo $cacahuates; ?>" class="col-xs-10 col-sm-5" required>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="recompensas">Puntuación Recompensas:</label>
										
										<div class="col-sm-9">
											<input type="text" id="recompensas" name="recompensas" value="<?php echo $recompensasmostrar; ?>" class="col-xs-10 col-sm-5" required>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="rank">Rango:</label>
										<div class="col-sm-9">
															<select class="col-xs-10 col-sm-5" name="rank" id="rank">
																<?php 
																$stmtrank = $dbConnection->prepare('SELECT id,rank_name FROM permissions ORDER BY id ASC');
																$stmtrank->execute();
																



																
																	
																	while($rangos_q = $stmtrank->fetch(PDO::FETCH_ASSOC)){
																		if ($rangos_q['id'] <= $user_q['rank']){
																?>
																<option <?php if ($usuarioinfo['rank'] == $rangos_q['id']) { ?> selected <?php } ?> value="<?php echo $rangos_q['id']; ?>"> <?php echo $rangos_q['id']; ?>: <?php echo $rangos_q['rank_name']; ?></option>
																<?php
																}
																}
																?>
																</select>
										</div>
										
									</div>
									
									
										<div class="col-md-offset-3 col-md-9">
											<button name="save" class="boton2 botonazul" type="submit">
												<p style="margin:0px;"><i class="fa fa-check"></i> Guardar Cambios</p>
											</button>
										</div>
									</form>
									</div><!-- /.span -->
								</div>

								<div class="hr hr32 hr-dotted"></div>
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>
									</div><!-- /.col -->
								</div><!-- /.row -->

						<?php
							include_once('include/inferior.php');
						?>