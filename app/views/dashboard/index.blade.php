<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Apparty</title>
		<meta name="description" content="Apparty... y sigue la rumba!">
		<meta name="author" content="DevOOPS">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		
		{{ HTML::style('plugins/jquery-ui/jquery-ui.min.css', array('media' => 'screen')) }}
		{{ HTML::style('plugins/fancybox/jquery.fancybox.css', array('media' => 'screen')) }}
		{{ HTML::style('plugins/xcharts/xcharts.min.css', array('media' => 'screen')) }}
		{{ HTML::style('plugins/select2/select2.css', array('media' => 'screen')) }}
		{{ HTML::style('css/style.css', array('media' => 'screen')) }}
		
		{{ HTML::script('plugins/jquery/jquery-2.1.0.min.js') }}
		{{ HTML::script('plugins/jquery-ui/jquery-ui.min.js') }}
						
	</head>
<body>
<!--Start Header-->
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span></span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="#">Apparty</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<a href="#" class="show-sidebar">
						  <i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Hola,</span>
										<span>
										{{-- Mostramos el nombre de usuario  --}}
								        {{Confide::user()->fullname}}
										</span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="users/logout">
											<i class="fa fa-power-off"></i>
											<span class="hidden-sm text">Salir</span>
										</a>
									</li>
								</ul>
								
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				@if (Confide::user()->hasRole('Administradorrrr'))
					<li class="dropdown">
						<a href="#" class="dropdown-toggle">
							<i class="fa fa-indent"></i>
							<span class="hidden-xs">Productos</span>
						</a>
						<ul class="dropdown-menu">						
							<li>
								<a class="ajax-link" href="producttypes/all">Categorias General</a>
							</li>
							<li>
								<a class="ajax-link" href="producttypes/cities">Categorias x Ciudad</a>
							</li>	
							<li>
								<a class="ajax-link" href="products/all">Artículos</a>
							</li>						
						</ul>
					</li>
				@endif
				@if (Authority::can('read', 'Schedule'))
					<li class="dropdown">
						<a href="#" class="dropdown-toggle">
							<i class="fa fa-clock-o"></i>
							<span class="hidden-xs">Horarios</span>
						</a>
						<ul class="dropdown-menu">						
							<li><a class="ajax-link" href="schedules/index">Horarios por Ciudad</a></li>
							@if (Authority::can('create', 'Holiday'))		
								<li><a class="ajax-link" href="schedules/holidays">Dias Festivos</a></li>
							@endif
						</ul>
					</li>		
				@endif
				@if (Authority::can('read', 'Order'))
					<li class="dropdown">
						<a href="#" class="dropdown-toggle">
							<i class="fa fa-book"></i>
							<span class="hidden-xs">Pedidos</span>
						</a>
						<ul class="dropdown-menu">						
							<li><a class="ajax-link" href="orders/orders-form">Pedidos por Ciudad</a></li>
							<li><a class="ajax-link" href="orders/orders-pending-form">Pedidos pendientes</a></li>
						</ul>
					</li>		
				@endif					
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div class="preloader">
				{{ HTML::image('img/devoops_getdata.gif', 'preloader', array('class'=>'devoops-getdata')) }}
			</div>
			<div id="ajax-content"></div>
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		{{ HTML::script('plugins/justified-gallery/jquery.justifiedgallery.min.js') }}
		{{ HTML::script('plugins/tinymce/tinymce.min.js') }}
		{{ HTML::script('plugins/tinymce/jquery.tinymce.min.js') }}
		{{ HTML::script('plugins/datatables/jquery.dataTables.js') }}
		{{ HTML::script('plugins/datatables/ZeroClipboard.js') }}
		{{ HTML::script('plugins/datatables/TableTools.js') }}
		{{ HTML::script('plugins/datatables/dataTables.bootstrap.js') }}
		{{ HTML::script('plugins/select2/select2.min.js') }}
		{{ HTML::script('plugins/moment/moment.min.js') }}		
		{{ HTML::script('plugins/fineuploader/jquery.fineuploader-4.3.1.min.js') }}
		{{ HTML::script('plugins/jquery-ui-timepicker-addon/jquery-ui-timepicker-addon.min.js') }}
		
		<!-- All functions for this theme + document.ready processing -->
		{{ HTML::script('js/devoops.js') }}

</body>
</html>
