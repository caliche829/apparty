
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a class="ajax-link" href="/">Inicio</a></li>
			<li><a class="ajax-link" href="#">Crear Producto</a></li>			
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
				<h4 class="page-header">Nuevo producto</h4>
				
			    <div id="errors_div">

			    </div>

				{{ Form::open(array('action' => 'ProductController@postCreateProduct', 'class'=>'form-horizontal', 'id' => 'qq-form', 'files' => true)) }}				
					
					<div class="form-group">
						<div class="text-center">
							<div id="bootstrapped-fine-uploader"></div>
						</div>
					</div>
													
					<div class="form-group well well-lg" style="margin: 10px 20px;">
							
						<div class="row">
							<div class="col-sm-6">	
							    <label class="col-sm-2 control-label">Nombre</label>
								<div class="col-sm-10">
								    {{ Form::text('name', null, array(
								    						'placeholder'=>'Nombre...', 
							    							'class'=>'form-control', 
							    							'data-toggle'=>'tooltip', 
							    							'data-placement'=>'bottom', 
							    							'title'=>'Nombre')); }}
							    </div>
							</div>

							<div class="col-sm-6">	
							    <label class="col-sm-2 control-label">Descripcion</label>
								<div class="col-sm-10">
								    {{ Form::text('description', null, array(
								    						'placeholder'=>'Descripcion...', 
							    							'class'=>'form-control', 	
							    							'data-toggle'=>'tooltip', 
							    							'data-placement'=>'bottom', 
							    							'title'=>'Descripcion')); }}
							    </div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">	
							    <label class="col-sm-2 control-label">Categoria</label>
								<div class="col-sm-10">
								    {{Form::select('productType', $categories, null, array('class'=>'form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Categoria'));}}
							    </div>
							</div>
						</div>
						<br>
					    <div>
					    	<div class="text-center">
						   		{{ Form::submit('Crear', array('class'=>'btn btn-primary'))}}
						    </div>
						</div>
					</div>

				{{ Form::close() }}
				
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

$(document).ready(function() {

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
	        	
	        	//console.log('onComplete: '+JSON.stringify(response));
	        	
	        	if (response.success) 
				{
					alert(response.msg);
					
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
				}
	        },
	        onSubmit: function(id, name){

				var file = this.getFile(id);

				var _URL = window.URL || window.webkitURL;
				var img = new Image();
		        img.src = _URL.createObjectURL(file);
	        }
	    }
	});

	// Add tooltip to form-controls
	$('.form-control').tooltip();
	
});
</script>

