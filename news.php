<?php require_once("inc/core.god.php");
/*========================================*\
| EdgeCMS for Arcturus MorningStar         |
| v1.0.0 HTML5 - BETA                               
| #########################################|
| Copyright (c) 2021, by Brytch 
| #########################################|
| Based in MawuCMS and MegaCMS 2021     
\*========================================*/
if(maintenance == '1' && $myrow['rank'] < $Holo['minrank']) 
{
    header("Location: maintenance");
	exit;
}

if(isset($_GET['url'])) 
{ 
    if(!empty($_GET['url']))
    { 
        $id_noticia = (int) filtro($_GET['url']); 
        $query_noticias = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE id = '".$id_noticia."' LIMIT 1");
        if(mysqli_num_rows($query_noticias) > 0)
        { 
            $columna = mysqli_fetch_assoc($query_noticias);
			$user_n = mysqli_fetch_assoc(mysqli_query(connect::cxn_mysqli(),"SELECT id,username,look FROM users WHERE username = '". $columna['author'] ."'"));
			$noticia  = ''.$columna['id'].'';
			$noticia2 = ''.$columna['image'].'';
			$noticia3 = ''.$columna['title'].'';
			$noticia4 = ''.$columna['shortstory'].'';
			$noticia5 = ''.$columna['longstory'].'';
			$noticia6 = ''.$columna['author'].'';
			$noticia7 = ''.$columna['date'].'';
			$noticia8 = ''.$columna['sendform'].'';
			$noticia9 = ''.$columna['formvisible'].'';
			
		} 
        else 
        { 
            header("Location: /articles");
            exit;
        } 
    } 
    else 
    { 
        header("Location: /articles");
        exit;
    } 
} 
else
{ 
        header("Location: /articles");
        exit;  
}

if(isset($_POST['resultado']))
{
	$urlresultado = filtro($_POST['urlresultado']);

    mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_news_form SET user_id = '". $myrow['id'] ."', news_id = '". $noticia8 ."', urlresultado = '". $urlresultado ."', date = '". time() . "'");
    $aok = 'Sucesso.';
}
?>
<!DOCTYPE html>
<?php if(Loged == FALSE) { ?>
<script>
    var themed = new Date();
    var themeh = themed.getHours();

    if(themeh > <?php echo $Holo['in_auto_dark']; ?> || themeh < <?php echo $Holo['en_auto_dark']; ?>){
        document.write('<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="dark">');
    } else {
		document.write('<html lang="<?php echo $Holo['htmllang']; ?>" data-theme="light">');
	};
</script>
<?php } ?>
<?php if(Loged == TRUE) { ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/wvBIpr7.png"  />

    <title><?php echo $Holo['name']; ?>: <?php echo $Lang['news.titulo']; ?></title>
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


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link href="/assets/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/assets/css/indexbrytch.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/mebrytch.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/types.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/news.css" type="text/css" />
	<link rel="stylesheet" href="/assets/css/buttons.css" type="text/css" media="all">


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
                    <li class="nav-item dropdown active  ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users" aria-hidden="true"></i> Comunidade <img src="https://i.imgur.com/lZWES30.png">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/staff">Equipe <img src="https://i.imgur.com/lZWES30.png"></a>
                            <div class="dropdown-divider"></div>
							<a class="dropdown-item" href="/news/1"><b>Notícias</b> <img src="https://i.imgur.com/lZWES30.png"></a>
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
                    </li> <?php $isadmin = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE id = '".$myrow['id']."' AND rank >= ".$Holo['minhkr']."");
        while($isadm = mysqli_fetch_assoc($isadmin)){ ?>
					<li class="nav-item ">
                        <a class="nav-link" href="<?php echo $Holo['url'] . '/' . $Holo['panel']; ?>">
                            <i class="fas fa-cogs"></i> Painel
                        </a>
                    </li><?php } ?>
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
<section>
<div class="row justify-content-md-center">
  <div class="col-md-3" style=" right: -94px;max-width: 20%;">
            <div class="list-group">
                <div class="list-group-item list-header" style="background: #1e262c;">Outras Notícias</div>
				<?php $news = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news ORDER BY id DESC LIMIT 45");
while($new = mysqli_fetch_array($news)){
	
$authorinfo = mysqli_fetch_assoc($authorinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '".$new['author']."'"));	
?>
      <a href="/news/<?php echo $new['id']; ?>" class="list-group-item list-group-item-action" style="color: #212529">
                        <span title="Promoção Ativa" style="font-size: 8px;color: #4CAF50;position:absolute;margin-left: -15px;margin-top: 5px;"></span>                        <?php echo filtro($new['title']); ?> »
                    </a>	<?php } ?> 
            </div>	
        </div>

      <div class="col-md-8 ng-scope" ng-controller="articleController">
                                    <div class="card" style="width: 560px; margin-bottom: 10px; left: 100px;">

                <div id="articleTopImage" class="card-body"  style="
    background: url(<?php echo ($noticia2); ?> );
    color: rgb(255, 255, 255);
    background-position: right 135px;
    margin-top: -10px;
    width: 103.54%;
    margin-left: -10px;
">
                    <img src="<?php echo $noticia2; ?>" style="display: none" id="articleImageSrc" crossorigin="" onload="setTopImage()">
                    <?php echo filtro($noticia3); ?>                </div>
              	<div style="cursor:default" class="article-text">
						<p><?php echo $noticia5; ?></p>
					</div>
                <div id="article-footer" class="card-body">
                    <div class="row">
                     <div id="infos" style="margin-left:5px; background-image: url('https://i.imgur.com/4XuX37M.png'); background-repeat: no-repeat;">
 
<div style="width:40px; height:70px; background: url(); margin-top:0px; margin-left:20px; float:left;"><div style="background: url(<?php echo $Holo['avatar'] . $user_n['look']; ?>&amp;direction=2&amp;head_direction=2&amp;gesture=sml&amp;size=sm)-3px -6px;
    width: 50px;
    height: 61px;
    border-radius: 00px 00px 20px 40px;
}"></div></div>
<div style="width:205px; height:56px; margin-top:-4px; float:left; margin-left:40px; font-size:10px; color:#666666; margin-right: 230px;">
<div style="margin-top:2px;"><br></div>
<div style="margin-top:3px;">
    <input type="hidden" name="autor" value="<?php echo $user_n['username']; ?>">
    <input type="hidden" name="btnSubmitUserSearch" value="1">
   Publicada por: <a href="/perfil/<?php echo $user_n['username']; ?>"><b><?php echo $user_n['username']; ?></b></a>
    </form>
</div>
<div style="margin-top:3px;padding-bottom:5px;">Publicada à: <b><?php echo GetLast($noticia7); ?></b></div>

<div style="margin-top:-3px;padding-bottom:5px;">Categoria: 
<b><?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'gratis' AND id = '".$noticia."'");
						while($newscategory = mysqli_fetch_array($newscategorys)){	
						?>
						    <a href="/articles/gratis" rel="category tag"><?php echo $Lang['news.cat2']; ?></a>
						<?php } ?>
						<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'hotel' AND id = '".$noticia."'");
						while($newscategory = mysqli_fetch_array($newscategorys)){	
						?>
						    <a href="/articles/hotel" rel="category tag"><?php echo $Lang['news.cat4']; ?></a>
						<?php } ?>
						<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'mobis' AND id = '".$noticia."'");
						while($newscategory = mysqli_fetch_array($newscategorys)){	
						?>
						    <a href="/articles/mobis" rel="category tag"><?php echo $Lang['news.cat3']; ?></a>
						<?php } ?>
						<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'promocao' AND id = '".$noticia."'");
						while($newscategory = mysqli_fetch_array($newscategorys)){	
						?>
						    <a href="/articles/promocao" rel="category tag"><?php echo $Lang['news.cat1']; ?></a>
						<?php } ?>
						<?php $newscategorys = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news WHERE category = 'sistema' AND id = '".$noticia."'");
						while($newscategory = mysqli_fetch_array($newscategorys)){	
						?>
						    <a href="/articles/sistema" rel="category tag"><?php echo $Lang['news.cat5']; ?></a>
						<?php } ?> </b></div>
</div>		
	<?php if($columna['formvisible'] == "1") { ?>
<a href="javascript:void(0)" class="btn btn-gradient" data-toggle="modal" data-target="#formModal" style="float: right;margin-top: -35px;background: #124ba1 ;color: rgb(255, 255, 255);margin-right: 11px;">Formulário</a> 
</div><?php } ?>
	<?php if($columna['formvisible'] == "2") { ?>
	
</div>
	<?php } ?>
	<?php if($columna['formvisible'] == "0") { ?>
<a class="btn btn-gradient" data-toggle="modal" data-target="#" style="float: right;margin-top: -35px;background: rgb(255 193 7);color: rgb(255, 255, 255);margin-right: 11px;">Formulário indisponível</a>
</div><?php } ?>
</div>
                    </div>
                </div>
                                <div class="card" style="width: 560px; margin-bottom: 10px; left: 100px;">
                <div id="cardnews" class="card-body" />
           
                    <div class="row">
                     <div id="infos" style="margin-left:5px; background-image: url('https://i.imgur.com/4XuX37M.png'); background-repeat: no-repeat;">

		</div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

			

<?PHP if($columna['active_comment'] == "1") { ?>
<div style="cursor:default" class="reading-content">
					
	
	
	<div class="mb-3"><h5 id="comments"><b><?php echo mysqli_num_rows(mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news_comment WHERE newsid = '".$id_noticia."'")) ?></b> <?php echo $Lang['news.comments']; ?></h5></div>

	<ul class="commentlist">

<?php
$comments = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news_comment WHERE newsid = '".$id_noticia."' ORDER BY id DESC LIMIT 45");
while($comment = mysqli_fetch_array($comments)){
$commentinfo = mysqli_fetch_assoc($commentinfo = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users WHERE username = '".$comment['author']."'"));
?>
	<li class="comment byuser comment-author-<?php echo $comment['author']; ?> bypostauthor even thread-even depth-1 parent" id="comment-<?php echo $comment['id']; ?>">
				<div id="div-comment-<?php echo $comment['id']; ?>" class="comment-body">
					<div class="comment-author">
				<a href="/home/<?php echo $comment['author']; ?>">
					<div class="avatar pixel mx-auto data-toggle="tooltip" title="" data-original-title="<?php echo $comment['author']; ?>">
						<a href="/home/<?php echo $comment['author']; ?>"><img src="<?php echo $Holo['avatar'] . $commentinfo['look']; ?>&action=std&direction=2&head_direction=3&img_format=png&gesture=std&headonly=0&size=s" alt="<?php echo $comment['author']; ?>"></a>
					</div>
				</a>
					</div>
			<div class="comment-details">
				<div class="comment-meta commentmetadata">
					<div class="author" 	data-toggle="tooltip" title="" data-original-title="<?php echo $comment['author']; ?>"><a href="/home/<?php echo $comment['author']; ?>"><b><?php echo $comment['author']; ?></b></a></div>
				</div>
				<div class="comment-text"><p><?php echo filtronosql($comment['commentaire']); ?></p></div>
				<div class="reply"><a class="time"><?php echo GetLast($comment['thedate']); ?></a></div>
			</div>
				</div>
	</li>
<?php } ?>
	
	</ul>

<?php if(Loged == TRUE) { ?>
	<div id="respond" class="comment-respond">
		<h5 id="reply-title" class="comment-reply-title"><?php echo $Lang['news.makecomment']; ?>:</h5>
		
<?php 
if(isset($_POST['addcomment']))
{ 
    $commentaire = filtrolow($_POST['Commentaire']);
	if(isset($_POST['jeton']) && ($_POST['jeton'] == $_SESSION['jeton'])) {
    if(!empty($commentaire))
    { 
        $checkspam = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM cms_news_comment WHERE author = '". $myrow['username'] ."' AND newsid = '".$id_noticia."'");
		
		if(mysqli_num_rows($checkspam) >= 3 && $myrow['rank'] < $Holo['minrank'])
		{
			$commentmsg = "<div class='alert alert-danger' role='alert'>".$Lang['news.alertc6']."</div>";
		} 
		else 
		{
        $query_AddComment = mysqli_query(connect::cxn_mysqli(),"INSERT INTO cms_news_comment SET newsid = '".$id_noticia."', author = '". $myrow['username'] ."' , commentaire = '".$commentaire."', thedate = '". time() . "'");
  
        if($query_AddComment) 
        { 
echo '<div class="alert alert-success" role="alert">
<div class="alert-text">Sucesso! Seu comentário foi postado.
			</div></div><meta http-equiv="refresh" content="2; url=#">';
        } 
        else 
        { 
            $commentmsg = "<div class='alert alert-danger' role='alert'>".$Lang['news.alertc2']."</div>";

        } 
		}
    } 
    else 
    { 
        $commentmsg = "<div class='alert alert-danger' role='alert'>".$Lang['news.alertc3']."</div>";
    }	
} else {
	$commentmsg = "<div class='alert alert-danger' role='alert'>".$Lang['news.alertc4']."</div>";
}
} 

?>

<?php if($commentmsg !== NULL) { echo $commentmsg; } else { echo "<div class='alert alert-warning' role='alert'>".$Lang['news.alertc5']."</div>"; } ?>
					<form action="" id="addcomment" method="post">
						<div class="form-group form-username">
							<input class="form-control" type="text" name="Commentaire" MAXLENGTH="280" placeholder="<?php echo $Lang['news.makecomment']; ?>..." required>
						</div>
                            <input type="hidden" name="jeton" value="<?php echo $_SESSION['jeton']; ?>"> 
						<p class="form-submit">
							<input type="submit" name="addcomment" class="btn btn-primary" value="<?php echo $Lang['news.confirm']; ?>">
						</p>
					</form>

	</div>
<?php } ?>
	
				</div>
<?php } else { ?>
<?php if(Loged == TRUE) { ?>
	<div style="cursor:default" class="card">
		<div class="card-body text-center text-muted">
			<strong><?php echo $Lang['news.alertcant']; ?></strong>
		</div>
	</div>
<?php } ?>

<?php } ?>

<?php if(Loged == FALSE) { ?>
		<br>
	<div style="cursor:default" class="card">
		<div class="card-body text-center text-muted">
			<strong><?php echo $Lang['news.alertlogin']; ?></strong>
		</div>
	</div>
<?php } ?>

</div>
</div>
                    </div>
                
				
				</div>
                    </div>
                </div>
            </div>
                    </div>
    </div>
<?php if($columna['formvisible'] == "1") { ?>
<?php 		    
						if(isset($_POST['send_form']))
						{ 
						$id_post = $columna['id'];
						$title_post = $columna['title'];
						$author_post = $columna['author'];
						$user_send = $myrow['username'];
						$participants = $_POST['form_participants'];
						$data = time();
						$link = $_POST['form_link'];
						$message = $_POST['form_message'];

						$send_form = mysqli_query(connect::cxn_mysqli(),"INSERT INTO edge_formularios (id_post, title_post, author_post, user_send, usernames, data, link, message) VALUES ('" . $id_post . "','" . $title_post . "','" . $author_post . "','" . $user_send . "'  ,'" . $participants . "', '" . $data . "', '" . $link . "', '" . $message . "')");
					
						 }
?> 

	<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
					
                        <div class="modal-header">
							<icon icon="ballon" style="top: -5px; left: 0px; margin-right: -15px;"></icon>						
							<h4 class="bold gray margin-bottom-minm" style=" margin-top: 5px; margin-left: 15px; ">Formulário</h5>
							<small style=" margin-left: -87px; margin-top: 20px; "> Lembre-se: Você só pode enviar <b>2</b> formulários por notícia, certifique-se de estar tudo correto antes de enviar</small>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
								<div class="flex-column">
									<h4 class="bold gray margin-bottom-minm" style="margin-left: 17px;">Dados da Notícia</h4>
									<div class="flex-wrap" id="news-modal-header-news-info" style=" width: 96%; margin-left: 16px; ">
									<div id="news-modal-header-news-info-habbo-author">
										<img src="<?php echo $Holo['avatar'] . $user_n['look']; ?>&direction=3&head_direction=3&size=m&gesture=sml&action=std,wav,drk=6&frame=3">
									</div>
									<label class="gray margin-auto-top-bottom">
										<h5 class="bold margin-bottom-minm"><?php echo $noticia3; ?></h5>
										<h6>Por <b><?php echo $user_n['username']; ?></b> á <?php echo GetLast($noticia7); ?></h6>
									</label>
								</div>
							</div>
                        <form ng-submit="send_form" method="post">
                            <div class="modal-body">
                    			<hr>
						<form class="flex-column margin-top-min" method="POST">
							<div class="flex margin-bottom-minm">
								<icon icon="head-plus" style="top: 12px;left: 8px;margin-right: -17px;"></icon>
								<input type="text" name="form_participants" id="participants-modal-news" placeholder="Participantes" value="" required>
							</div>
							<div class="flex margin-bottom-minm">
								<icon icon="link" style="top: 12px;left: 8px;margin-right: -15px;"></icon>
								<input type="text" name="form_link" id="link-modal-news" placeholder="Link" required>
							</div>
							<div class="flex margin-bottom-minm">
								<icon icon="mail" style="top: 11px;left: 7px;margin-right: -16px;"></icon>
								<textarea id="message-modal-news" name="form_message" MAXLENGTH="200" placeholder="Mensagem"></textarea>
							</div>
							<small>  O envio de uma mensagem não é obrigatório, mas, se você preferir escrever, utilize no máximo 200 caracteres. </small>
							<div class="margin-top-min">
								<button class="green-button-2" type="submit" name="send_form" style="width: 100%; height: 45px;">
									<label class="margin-auto white bold">Enviar</label>
								</button>
							</div>
						   </form>
                           </div>
                           </div>
						   </div>
						   </div>
						   <?php } ?>
						   
</head>
<?php require_once("Mawu/includes/index_footer.php"); ?>
<script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.3.min.js?ver=3.4.1'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js?ver=1.16.0'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/bootstrap.min.js'></script>
<script type='text/javascript' src='<?php echo $Holo['url']; ?>/Mawu/js/main.js'></script>
</body>
</html><?php } ?>