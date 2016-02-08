<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a class="ajax-link" href="/">Inicio</a></li>
			<li><a class="ajax-link" href="#">Editar ciudad</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Registro de Datos</span>
				</div>
				<div class="box-icons">
					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<h4 class="page-header">Editar ciudad</h4>
				
				{{ Form::open(array('action' => 'CityController@editCity', 'class'=>'form-horizontal', 'id' => 'submit')) }}
										
					{{ Form::hidden('id', $city->id) }}

					<div class="form-group">
					    <label class="col-sm-2 control-label">Pais</label>
						<div class="col-sm-4">
						    {{Form::select('country_id', $countries, $city->country_id, array('class'=>'form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Pais'));}}							
					    </div>
											
					    <label class="col-sm-2 control-label">Ciudad</label>
						<div class="col-sm-4">
						    {{ Form::text('city', $city->name,  array('placeholder'=>'Nombre ciudad', 'class'=>'form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Nombre de la cidad')) }}
					    </div>					
						
					</div>

					<div id="errors_div"></div>

					<div class="text-center">
				   		{{ Form::submit('Guardar', array('class'=>'btn btn-primary'))}}
				    </div>
				   
				{{ Form::close() }}
				
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

$(document).ready(function() {
	
	// Captura evento submit del formulario
	$('#submit').submit(function() {
		
		$('#errors_div').html('<img src="img/devoops_getdata.gif" />');

		SaveContent('#submit');

		// Cancela el evento submit original
		return false; 
	});

	// Add tooltip to form-controls
	$('.form-control').tooltip();
	
});

</script>