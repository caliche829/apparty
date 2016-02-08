
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a class="ajax-link" href="/">Inicio</a></li>
			<li><a class="ajax-link" href="#">Editar categoria</a></li>			
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
				<h4 class="page-header">Editar categoria</h4>
							    
				{{ Form::open(array('action' => 'ProductTypeController@postEditCategory', 'class'=>'form-horizontal', 'id' => 'submit')) }}				
					
					{{ Form::hidden('id', $category->id) }}
													
					<div class="form-group well well-lg" style="margin: 10px 20px;">
	
						<div class="col-sm-8">	
						    <label class="col-sm-4 control-label">Categoria</label>
							<div class="col-sm-8">
							    {{ Form::text('category', $category->description, array(
							    						'placeholder'=>'Nombre...', 
						    							'class'=>'form-control', 					    							
						    							'data-toggle'=>'tooltip', 
						    							'data-placement'=>'bottom', 
						    							'title'=>'Nombre categoria')); }}
						    </div>
						</div>
					</div>

					<div id="errors_div"></div>
					<br>
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
		
		$('#errors_div').html('<i class="fa fa-refresh fa-spin loading"></i>');

		SaveContent('#submit');

		// Cancela el evento submit original
		return false; 
	});

	// Add tooltip to form-controls
	$('.form-control').tooltip();
	
});

</script>

