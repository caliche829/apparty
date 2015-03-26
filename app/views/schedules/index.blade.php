<script type="text/javascript">
	
	// Se ejecutan los plug-in de la tabla de datos y los combos
	$(document).ready(function() {	
		TestTable1();
		MakeSelect2();
	});

</script>
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="/">Inicio</a></li>
			<li><a href="#">Horarios</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<h3>					
						<span>Horarios</span>
					</h3>
				</div>
				<div class="box-icons">					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>					
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th>Ciudad</th>
							<th>Lunes</th>
							<th>Martes</th>
							<th>Miercoles</th>
							<th>Jueves</th>
							<th>Viernes</th>
							<th>Sabado</th>
							<th>Domingo</th>
							<th>Festivo</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
						@if ($cities)
							@foreach($cities as $city)
								<tr>
									<td>
										{{ 												
										 	HTML::link('#', 
										 	$city->name, 
										 	$attributes = array('class'=>'ajax-link', 'onclick' => 'LoadAjaxContent("schedules/edit/'.$city->id.'"); return false;'), 
										 	$secure = null); 
										 }}
									</td>
									@if ($citiesSchedsArray[$city->id])
										@foreach($citiesSchedsArray[$city->id] as $citySched)
											<td>{{$citySched}}</td>
										@endforeach
									@else										
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>										
									@endif									
								</tr>
							@endforeach
						@else
							<tr>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
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