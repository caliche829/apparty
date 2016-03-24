
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a class="ajax-link" href="/">Inicio</a></li>
			<li><a class="ajax-link" href="#">Editar Imágen</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Edición de Datos</span>
				</div>
				<div class="box-icons">
					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<h4 class="page-header">Editar imágen</h4>
				<div id="errors_div"></div>

				<div class="form-group well well-lg" style="margin: 10px 20px;">
					<div class="row">
						
					</div>
					<br>
					{{ Form::open(array('action' => 'ImageController@postEditImage', 'class'=>'form-horizontal', 'id' => 'submit')) }}				
						{{ Form::hidden('id', $image->id) }}
						<div class="row">
							<div class="col-sm-6">	
								<img src="{{ $image->img_url }}" height="100" class="col-sm-2 control-label">
							    <label class="col-sm-2 control-label">Descripción:</label>
								<div class="col-sm-10">
								    {{ Form::text('description', $image->description, array(
								    						'placeholder'=>'Descripción...', 
							    							'class'=>'form-control', 
							    							'data-toggle'=>'tooltip', 
							    							'data-placement'=>'bottom', 
							    							'title'=>'Descripción')); }}
							    </div>
							</div>
						</div>						
						<br>
					    <div>
					    	<div class="text-center">
						   		{{ Form::submit('Guardar', array('class'=>'btn btn-primary'))}}
						    </div>
						</div>
					{{ Form::close() }}
				</div>				
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

$(document).ready(function() {

	// Captura evento submit del formulario
	$('#submit').submit(function() {
		
		$('#errors_div').html('<i class="fa fa-refresh fa-spin loading"></i>');

		SaveContent('#submit');

		// Cancela el evento submit original
		return false; 
	});	

	// Add tooltip to form-controls
	$('.form-control').tooltip();
	
});
</script>

