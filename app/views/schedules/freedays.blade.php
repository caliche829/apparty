<script>

	// Se ejecuta cuando el documento esta listo
	$(document).ready(function() {

		// Establece el trabajador
		SetCurrentWorker(null);

		// Crea la lista de valores para trabajadores
		$("#selectedWorker").select2({
			placeholder: "Seleccione un trabajador",
			allowClear: true
		});

		MakeSelect2();
		
		$('#selectedWorker').on("change", function(e) {

			// Valida si se seleccionó algun valor
			if (e.val){
				
				// Obtiene el trabajador seleccionado
				var selectedOption = $("#selectedWorker").val();
				
				// Crea gif de cargando..
				var loadingif = "<div><img src='img/devoops_getdata.gif' alt='preloader'/></div>";

				// Despliega gif
				$('#freedaysDiv').html(loadingif);
				
				$.ajax({
					mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
					url: 'schedules/workerfreedays',
					data: {id: selectedOption},
					type: 'POST',
					success: function(data) {
						$('#freedaysDiv').html(data);

					},
					error: function (jqXHR, textStatus, errorThrown) {
						alert(errorThrown);
					},
					dataType: "html",
					async: false
				});

			}else {
				
				// Se limpia el div donde se cargan los trabajadores
				$('#freedaysDiv').html("");
			}

		});		
	});

	function removeFreeday(freedayId, row)
	{
	    // Remueve la fila
		$('#datatable-1').dataTable().fnDeleteRow($('#datatable-1').dataTable().fnGetPosition( row ));

		// Verifica si es un horario existente
		if (freedayId != -1)
		{
			// Establece el campo con el valor del horario removido
			var remFreedayId = '<input type="hidden" value="'+freedayId+'" name="removedHolidays[]">';

			// Se agrega al contenido del div de horarios a remover del trabajador
			$('#deletedHolidays').append(remFreedayId);
		}
	}

</script>

<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<a href="/">Inicio</a></li>
			<li>
				{{ 												
					HTML::link('#', 
					'Horarios', 
					$attributes = array('class'=>'ajax-link', 'onclick' => 'LoadAjaxContent("schedules"); return false;'), 
					$secure = null);
				}}					
			<li>
				<a href="#">Días libres</a>
			</li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Edición días libres</span>
				</div>
				<div class="box-icons">
					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					
				</div>
				<div class="no-move"></div>
			</div>
			
			<div class="box-content">
			
				<h4 class="page-header">Seleccione un trabajador</h4>
				<div class="row form-group">
					<div class="col-sm-12">
						<select id="selectedWorker">
							<option></option>
							@if ($workers)
								@foreach($workers as $worker)
									
									{{'<option id="option'.$worker->id.'" value="'.$worker->id.'">'}}
										{{ $worker->names.' '.$worker->lastname }}									
									</option>		
										
								@endforeach			
							@endif						
						</select>
					</div>
				</div>
		
				<div id="freedaysDiv"></div>	
			</div>
		</div>
	</div>
	
</div>
