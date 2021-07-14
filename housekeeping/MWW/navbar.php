<?php if(isset($myrow)) { if($myrow['rank'] >= $Holo['minhkr'] && UserH == TRUE) { ?>
 
 <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
       <ul class="kt-menu__nav ">
          <li class="kt-menu__item " aria-haspopup="true" ><a href="/housekeeping/home.php" class="kt-menu__link ajaxLoading"><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Início</span></a></li>
          <?php if($myrow['rank'] >= $Holo['hkr_manager']) { ?>
		  <li class="kt-menu__section ">
             <h4 class="kt-menu__section-text">Administração Geral</h4>
             <i class="kt-menu__section-icon flaticon-more-v2"></i>
          </li>
		  <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/maintenance.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon2-settings"></i><span class="kt-menu__link-text">Gestão de manutenção</span></a>
          </li>
		  <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/rank.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon-customer"></i><span class="kt-menu__link-text">Gestão de ranks</span></a>
          </li>
		    <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/catalog.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon2-supermarket"></i><span class="kt-menu__link-text">Gestão de catálogo</span></a>
          </li>
		  <?php } ?>
		  <?php if($myrow['rank'] >= $Holo['hkr_moderator']) { ?>
		  <li class="kt-menu__section ">
             <h4 class="kt-menu__section-text">Moderação</h4>
             <i class="kt-menu__section-icon flaticon-more-v2"></i>
          </li>
		  		  <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/bans.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon-globe"></i><span class="kt-menu__link-text">Gestão de banimentos</span></a>
          </li>
		  <?PHP } ?>
		  <?php if($myrow['rank'] >= $Holo['hkr_animator']) { ?>
<li class="kt-menu__section ">
             <h4 class="kt-menu__section-text">Entretenimento e comunidade</h4>
             <i class="kt-menu__section-icon flaticon-more-v2"></i>
          </li>
		  <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/news.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon-list"></i><span class="kt-menu__link-text">Criar notícia</span></a>
          </li>
		  <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/newsger.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon2-rectangular"></i><span class="kt-menu__link-text">Gerenciar notícias</span></a>
          </li>	    	
		  
		  <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/formu.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon2-document"></i><span class="kt-menu__link-text">Gerenciar formulários</span></a>
          </li>
		  		    <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/posts.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon2-file"></i><span class="kt-menu__link-text">Publicar posts</span></a>
          </li>
		  		    <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/postsger.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon-edit-1"></i><span class="kt-menu__link-text">Gerenciar posts</span></a>
          </li>
          <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/badges.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon-open-box"></i><span class="kt-menu__link-text">Hospedar emblema</span></a>
          </li>
		  
		  
		  <?PHP } ?>

		  <li class="kt-menu__section ">
             <h4 class="kt-menu__section-text">Logs</h4>
             <i class="kt-menu__section-icon flaticon-more-v2"></i>
          </li>
		  <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/commandlogs.php" class="kt-menu__link ">
                <i class="kt-menu__link-icon flaticon2-rectangular"></i><span class="kt-menu__link-text">Logs de comandos</span></a>
          </li>
          <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/errorlogs.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon2-rectangular"></i><span class="kt-menu__link-text">Logs de erros</span></a>
          </li>
		  <li class="kt-menu__item ajaxLoading" aria-haspopup="true" >
              <a href="/housekeeping/hklogs.php" class="kt-menu__link ">
              <i class="kt-menu__link-icon flaticon2-rectangular"></i><span class="kt-menu__link-text">Logs de Administração</span></a>
          </li>

       </ul>
    </div>
 </div>
<?PHP } } else { 
    header("Location: /");
exit; 
} ?>