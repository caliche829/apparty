
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a class="ajax-link" href="/">Inicio</a></li>
			<li><a class="ajax-link" href="#">Editar Articulo</a></li>			
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
				<h4 class="page-header">Editar articulo</h4>
				<div id="errors_div"></div>

				<div class="form-group well well-lg" style="margin: 10px 20px;">
					<div class="row">
						<div class="col-sm-6">	
							<div class="col-sm-10">
								<label class="control-label">Imágenes Existentes:</label>
								<br>
							    <select id="icon" name="icon">
									@foreach($imgs as $img)
										<option value="{{$img->id}}" data-imagesrc="{{$img->img_url}}">{{$img->description}}</option>
								    @endforeach									    
								</select>
						    </div>
						</div>
						{{ Form::open(array('action' => 'FileController@postUploadPhoto', 'class'=>'form-horizontal', 'id' => 'qq-form', 'files' => true)) }}
							<div class="col-sm-6">	
								<div class="col-sm-10">
								    <div id="bootstrapped-fine-uploader"></div>
							    </div>
							</div>
							{{ Form::hidden('id', $product->id) }}
							{{ Form::hidden('type', 'products') }}
						{{ Form::close() }}
					</div>
					<br>
					{{ Form::open(array('action' => 'ProductController@postEditProduct', 'class'=>'form-horizontal', 'id' => 'submit')) }}				
						{{ Form::hidden('id', $product->id) }}
						<input type="hidden" name="hidCflag" id="hidCflag" value="{{$imageId}}" />
						<div class="row">
							<div class="col-sm-6">	
							    <label class="col-sm-2 control-label">Categoría:</label>
								<div class="col-sm-10">
								    {{Form::select('productType', $categories, $categoryId, array('class'=>'form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Categoría', 'id'=>'productType'));}}
							    </div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">	
							    <label class="col-sm-2 control-label">Nombre:</label>
								<div class="col-sm-10">
								    {{ Form::text('name', $product->name, array(
								    						'placeholder'=>'Nombre...', 
							    							'class'=>'form-control', 
							    							'data-toggle'=>'tooltip', 
							    							'data-placement'=>'bottom', 
							    							'title'=>'Nombre', 
							    							'id'=>'name')); }}
							    </div>
							</div>
							<div class="col-sm-6">	
							    <label class="col-sm-2 control-label">Descripción:</label>
								<div class="col-sm-10">
								    {{ Form::text('description', $product->description, array(
								    						'placeholder'=>'Descripción...', 
							    							'class'=>'form-control', 	
							    							'data-toggle'=>'tooltip', 
							    							'data-placement'=>'bottom', 
							    							'title'=>'Descripción', 
							    							'id'=>'description')); }}
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

<!-- Fine Uploader template
====================================================================== -->
<script type="text/template" id="qq-template-bootstrap">
	<div class="qq-uploader-selector qq-uploader">
		<ul class="qq-upload-list-selector qq-upload-list">
			<li>
				<img class="qq-thumbnail-selector" qq-max-size="80" qq-server-scale>
				<div class="qq-upload-filename">
					<span class="qq-upload-file-selector qq-upload-file"></span>
					<span class="qq-upload-size-selector qq-upload-size"></span>
					<span class="qq-upload-status-text-selector qq-upload-status-text"></span>
				</div>
			</li>
		</ul>
		<div class="qq-upload-button-selector btn btn-success" style="width: auto;">
			<div><i class="fa fa-upload icon-white"></i> Seleccionar foto</div>
		</div>
	</div>
</script>

<script type="text/javascript">
var imageCount = 0;

$(document).ready(function() {

	var imageId = $('#hidCflag').val();
	$('#icon').ddslick({
	    width: 270,
	    height: 200,
	    defaultSelectedIndex: null,
	    selectText: "Seleccione una imagen",
	    onSelected: function (data) {
	    	
	    	if(imageCount > 0)
	    	{
	    		$('#bootstrapped-fine-uploader').fineUploader('reset');
	    		imageCount = 0;
	    	}

 			$('#hidCflag').val(data.selectedData.value);
	    }
	});
	
	if(imageId > 0)
	{
		var index = $('#icon li:has(input[value="' + imageId +'"])').index();
		if(index == -1)
		{
			index = $('#icon li:has(input[value="1"])').index();
		}
		$('#icon').ddslick('select', {index: index });
	}

	$('#productType').on('change', function() {
    	var categoryId = $('#productType').val();
    	var imageId = $('#hidCflag').val();
    	var id = $('#id').val();

		LoadAjaxContent('products/edit/'+id+'/'+categoryId+'/'+imageId);
    });

	// Captura evento submit del formulario
	$('#submit').submit(function() {
		
		$('#errors_div').html('<i class="fa fa-refresh fa-spin loading"></i>');

		var imageId = $('#hidCflag').val();

		if (imageCount < 1 && imageId == 1) 
		{
			var html = "<style>li.error{color: red}</style><ul><li class='error'>Debe subir una foto en formato PNG</li></ul>";
			$('#errors_div').html(html);
		}
		else
		{
			saveCategory('#submit');	
		}

		// Cancela el evento submit original
		return false; 
	});

	//SetMinBlockHeight($('.full-uploader'));
	$('.full-uploader').css('min-height', '50px').css('max-height', '100px');

	// Load and run Uploader
	$('#bootstrapped-fine-uploader').fineUploader({
		template: 'qq-template-bootstrap',
		multiple: false,
		autoUpload: false,
		classes: {
			success: 'alert alert-success',
			fail: 'alert alert-error'
		},
		validation: {
			acceptFiles: ['jpg', 'png'],
			allowedExtensions: ['jpg', 'png']
		},
		messages: {
	        typeError: '{file} formato invalido. Por favor suba una imagen con formato: {extensions}.',
	        sizeError: 'La imagen debe pesar máximo 100 kb.',
	        noFilesError: 'Seleccione una imagen({extensions})'
	        // other messages can go here as well ...
	    },
	    callbacks: {
	        onComplete: function(id, name, response, xhr) {
	        	
	        	if (response.success) 
				{					
					LoadAjaxContent(response.url);	
					
				}else {					
					var errorsData = response.errors;

					var html = "<style>li.error{color: red}</style><ul>";
					$(errorsData).each(function(i,val)
					{
						html += "<li class='error'>" + val + "</li>";
					});
					html += "</ul>";
					$('#errors_div').html(html);
					
					$('#bootstrapped-fine-uploader').fineUploader('reset');
					imageCount = 0;
				}
	        },
	        onSubmit: function(id, name){

				var file = this.getFile(id);

				var _URL = window.URL || window.webkitURL;
				var img = new Image();
		        img.onload = function () {
	            	var index = $('#icon li:has(input[value="1"])').index();
	            	$('#icon').ddslick('select', {index: index });

	            	imageCount++;
		        };
		        img.src = _URL.createObjectURL(file);
	        }
	    }
	});

	// Add tooltip to form-controls
	$('.form-control').tooltip();
	
});

function saveCategory(inFormId){

	// Se crea petición AJAX
	$.ajax({ 
	    data: $(inFormId).serialize(), // Serializa el formulario
		type: $(inFormId).attr('method'), // Obtiene el tipo de método GET o POST
		url: $(inFormId).attr('action'), // Obtiene la acción
		success: function(response) { // Si es exitosa la petición ejecuta lo siguiente
			
			// Se crea la variable con la respuesta de la petición
			var responseData = $.parseJSON(response);

			// Se obtiene el estado de exito de la respuesta
			var successVal = responseData.success;

			console.log(responseData);

			// Si la respuesta fue exitosa
			if (successVal == 1)
			{
				if (imageCount > 0) {
					$('#qq-form').submit();	
				}else{
					LoadAjaxContent(responseData.url);
				}					
			}
			else {
				// Se obtienen los errores
				var errorsData = responseData.errors;

				// Se crea lista de despliegue de errores
				var html = "<style>li.error{color: red}</style><ul>";

				// Se recorre cada error retornado
				$(errorsData).each(function(i,val)
				{
					console.log(val);
					// Se adiciona al cuadro de despliegue el mensaje de error
					html += "<li class='error'>" + val + "</li>";
				});

				// Se cierra la lista de despliegue
				html += "</ul>";

				// Se actualiza el div con la lista de despliegue de errores formada
				$('#errors_div').html(html);
			}
		}
	});

	// Add tooltip to form-controls
	$('.form-control').tooltip();
	
}
</script>

