<?php
require_once("../inc/core.god.php");
require_once("../inc/hk_session.php");
if ($_GET['error'] == $w) {
$message = '<div class="alert alert-block alert-info"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-times blue"></i> Este usuario no existe.</div>';
}
if ($_GET['saved'] == $w) {
$message = '<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i> Usuario editado correctamente.</div>';
}
if ($_GET['badgesaved'] == $w) {
$message = '<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i> Placa dada correctamente.</div>';
}

$i=1;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Housekeeping - Usuarios</title>
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
							<li class="active">Usuarios</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="page-header">
							<h1>
								<i class="ace-icon fa fa-angle-double-right"></i> Usuarios
								<small>
									<br>
									Lista de los usuarios existentes ordenados por último inicio de sesión.
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<?php echo $message; ?>
<div class="row">	
														
									<div class="col-xs-12">
									<form method="post" action="users.php" class="form-horizontal">
												<input placeholder="Nombre de Usuario" class="col-sm-10" type="text" style="margin:3px 4px 10px 0px;" name="searchcaption" id="searchcaption" required>
										
												<button name="search" type="submit" class="boton3 botonazul" style="margin-bottom:14px;">
													<p style="margin:1px;"><i class="fa fa-search"></i> Buscar</p>
												</button>
										</form>
									<div class="rwd">
										<table id="simple-table" style="font-size:12px;" class="table table-striped table-bordered">
											<thead>
												<tr>
												<th>ID</th>
													<th>Nombre</th>
													<th>Email</th>
													<th>Créditos</th>
													<th>Diamantes</th>
													<th>Cacahuates</th>
													<th>Rango</th>
													<th>IP</th>
													<th>Registro</th>
													<th>Último Login</th>
													<th>Editar</th>
												</tr>
											</thead>
											<tbody>
											<?php
											
											if (isset($_POST['search'])) {
											$searchcaption = $_POST['searchcaption'];
											
											$stmtsearch = mysqli_query(connect::cxn_mysqli(),"SELECT * from users WHERE username LIKE ? LIMIT 100");
											$stmtsearch -> bindValue(1, "%$searchcaption%", PDO::PARAM_STR);
											$stmtsearch -> execute();
										
											//$users_a = mysqli_query($db,"SELECT * from users WHERE username LIKE '%$searchcaption%' ORDER BY last_login DESC LIMIT 500");
											
											while ($row = $stmtsearch->fetch(PDO::FETCH_ASSOC))
											{
												$id = $row['id'];
												$nombre = $row['username'];
												$email = $row['mail'];
												$creditos = $row['credits'];
												$rango = $row['rank'];
												$ip = $row['ip_current'];
												$registro = $row['account_created'];
												$login = $row['last_online'];
											
											$diamantes=0;
											$cacahuates=0;
											$currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_currency WHERE user_id= :id");
											$currency->execute(array('id' => "$id"));
														
											while($currency_q = $currency->fetch(PDO::FETCH_ASSOC)){
											if ($currency_q['type']=="102") {
											$cacahuates=$currency_q['amount'];
											}
											if ($currency_q['type']=="5") {
											$diamantes=$currency_q['amount'];
											}
											}

											?>
											
												<tr>
												<td><?php echo $id;?></td>
													<td><?php echo $nombre;?></td>
													<td><?php echo $email;?></td>
													<td><?php echo $creditos;?></td>
													<td><?php echo $diamantes;?></td>
													<td><?php echo $cacahuates;?></td>
													<td><?php echo $rango;?></td>
													<td><?php echo $ip; ?></td>
													<td><?php echo date('d/m/Y', $registro); ?></td>
													<td><?php echo date('d/m/Y', $login); ?></td>
													<td>
													<form method="post">
															<center><button formaction="useredit.php?user=<?php echo $id; ?>" class="boton botonazul" style="width:100%;">
																<i class="iconogrande menu-icon fa fa-pencil-alt"></i>
															</button></center>
													</form>
														</div>
													</td>
												</tr>
												
											<?php
											}
											} 
											else{
											$stmtuser = mysqli_query(connect::cxn_mysqli(),"SELECT * from users ORDER BY last_login DESC LIMIT 200");
											$stmtuser -> execute();
										
											//$users_a = mysqli_query($db,"SELECT * from users WHERE username LIKE '%$searchcaption%' ORDER BY last_login DESC LIMIT 500");
											
											while ($row = $stmtuser->fetch())
											{
												$id = $row['id'];
												$nombre = $row['username'];
												$email = $row['mail'];
												$creditos = $row['credits'];
												$rango = $row['rank'];
												$ip = $row['ip_current'];
												$registro = $row['account_created'];
												$login = $row['last_online'];
											
											$diamantes=0;
											$cacahuates=0;
											$currency = mysqli_query(connect::cxn_mysqli(),"SELECT * FROM users_currency WHERE user_id= :id");
											$currency->execute(array('id' => "$id"));
														
											while($currency_q = $currency->fetch(PDO::FETCH_ASSOC)){
											if ($currency_q['type']=="102") {
											$cacahuates=$currency_q['amount'];
											}
											if ($currency_q['type']=="5") {
											$diamantes=$currency_q['amount'];
											}
											}


											?>
												<tr>
												<td><?php echo $id;?></td>
													<td><?php echo $nombre;?></td>
													<td><?php echo $email;?></td>
													<td><?php echo $creditos;?></td>
													<td><?php echo $diamantes;?></td>
													<td><?php echo $cacahuates;?></td>
													<td><?php echo $rango;?></td>
													<td><?php echo $ip; ?></td>
													<td><?php echo date('d/m/Y', $registro); ?></td>
													<td><?php echo date('d/m/Y', $login); ?></td>
													<td>
													<form method="post">
															<center><button formaction="useredit.php?user=<?php echo $id; ?>" class="boton botonazul" style="width:100%;">
																<i class="iconogrande menu-icon fa fa-pencil-alt"></i>
															</button></center>
													</form>
														</div>
													</td>
												</tr>
											<?php }
											}?>
											</tbody>
										</table>
									</div>
									</div><!-- /.span -->
								</div>

								<div class="hr hr32 hr-dotted"></div>
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>
									</div><!-- /.col -->
								</div><!-- /.row -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>
	</body>
</html>