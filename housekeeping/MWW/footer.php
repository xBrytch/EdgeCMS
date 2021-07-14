 <?php if(isset($Holo)) { ?>     
		<div class="kt-footer kt-grid__item" id="kt_footer" kt-hidden-height="65" style="">
               <div class="kt-container ">
				  <div class="kt-footer__wrapper">EDGECMS V1.0 BETA <br>Powered by Arcturus Emulator.</div>
               </div>
            </div>
 <?PHP } else { 
    header("Location: /");
    exit; 
              } ?>