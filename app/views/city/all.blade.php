<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="/">Inicio</a></li>
			<li><a href="#">Ciudades</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<h3>					
						<span>Ciudades</span>
					</h3>
				</div>
				<div class="box-icons">
					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>							
							<th>Pais</th>							
							<th>Ciudad</th>							
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
						@if ($cities)
							@foreach($cities as $city)
								<tr>
									<td>
										{{ $city->country->name }}
									</td>
									<td>
										{{ 												
										 	HTML::link('#', 
										 	$city->name, 
										 	$attributes = array('class'=>'ajax-link', 'onclick' => 'LoadAjaxContent("cities/edit'.$city->id.'"); return false;'), 
										 	$secure = null); 
										 }}
									</td>							
								</tr>
							@endforeach
						@else
							<tr>
								<td>-</td>
								<td>-</td>								
							</tr>							
						@endif

					</tbody>					
				</table>
			</div>			
		</div>
	</div>
</div>

<script type="text/javascript">
	// Se ejecutan los plug-in de la tabla de datos y los combos
	$(document).ready(function() {	
		TestTable1();
		MakeSelect2();
	});

</script>