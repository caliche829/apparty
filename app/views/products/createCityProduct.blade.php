
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a class="ajax-link" href="/">Inicio</a></li>
			<li><a class="ajax-link" href="#">Crear articulo x ciudad</a></li>			
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
				<h4 class="page-header">Nuevo articulo x ciudad</h4>
				<div class="form-group well well-lg" style="margin: 10px 20px;">
				    @if($products != false)
					    <div id="errors_div"></div>
						{{ Form::open(array('action' => 'ProductByCityController@postCreateProduct', 'class'=>'form-horizontal', 'id' => 'submit')) }}
							<input type="hidden" name="idCity" id="idCity" value="{{$city->id}}" />
							<div class="row">
								<div class="col-sm-6">	
								    <label class="col-sm-2 control-label">Articulo:</label>
									<div class="col-sm-10">
										{{Form::select('product', $products, null, array('class'=>'form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Articulo', 'id'=>'product'));}}
								    </div>
								</div>
								<div class="col-sm-6">	
								    <label class="col-sm-2 control-label">Ciudad:</label>
								    <label class="col-sm-2 control-label">{{$city->name}}</label>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-6">	
								    <label class="col-sm-2 control-label">Precio:</label>
									<div class="col-sm-10">
									<div class="col-sm-10">
									    {{ Form::text('price', null, array(
									    						'placeholder'=>'Precio...', 
								    							'class'=>'form-control', 
								    							'data-toggle'=>'tooltip', 
								    							'data-placement'=>'bottom', 
								    							'title'=>'Precio')); }}
								    </div>
								    </div>
								</div>
								<div class="col-sm-6">	
								    <label class="col-sm-2 control-label">Cantidad:</label>
								    <div class="col-sm-10">
									    {{ Form::text('quantity', null, array(
									    						'placeholder'=>'Cantidad...', 
								    							'class'=>'form-control', 
								    							'data-toggle'=>'tooltip', 
								    							'data-placement'=>'bottom', 
								    							'title'=>'Cantidad')); }}
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
					@else
						<div id="errors_div">
							<style>li.error{color: red}</style>
							<ul><li class='error'>No hay articulos disponibles para {{$city->name}}</li></ul>
						</div>
					@endif
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