<script type="text/javascript">
	
	// Cuando el documento se encuentre cargado
	$(document).ready(function() {

		// Captura evento submit del formulario
		$('#editionForm').submit(function() {
			
			// Guarda el contenido mediante petición ajax
			SaveContent('#editionForm');

			// Cancela el evento submit original
			return false; 
		});	
							
		// Agrega tool-tip a los elementos de clase form-control
		$('.form-control').tooltip();

		// Obtiene la tabla de datos
		var table = $('#datatable-1').dataTable({
	        "bPaginate": false,
	        "bLengthChange": false,
	        "bFilter": false,
	        "aaSorting": [[ 0, "asc" ]],
	        "sDom": "<'box-content'<'col-sm-6'f><'col-sm-6 text-right'l><'clearfix'>>rt<'box-content'<'col-sm-6'i><'col-sm-6 text-right'p><'clearfix'>>"
	    } );
	 	
	 	// Establece la función remover en los iconos
		$('.fa-plus-square').on( 'click', function () {

			var daySelect = '<select name="NewDays[]" title="Día a laborar" data-placement="bottom" data-toggle="tooltip">'+
								'<option value="L">Lunes</option>'+
								'<option value="M">Martes</option>'+
								'<option value="X">Miercoles</option>'+
								'<option value="J">Jueves</option>'+
								'<option value="V">Viernes</option>'+
								'<option value="S">Sabado</option>'+
								'<option value="D">Domingo</option>'+
								'<option value="F">Festivo</option>'+
							'</select>';

			var initHoursInput = '<input class="time_pickers" type="text" value="00:00:00" name="NewInitialHours[]" title="Hora inicial del periodo laboral" data-placement="bottom" data-toggle="tooltip" readonly="readonly">';

			var finalHoursInput = '<input class="time_pickers" type="text" value="00:00:00" name="NewFinalHours[]" title="Hora final del periodo laboral" data-placement="bottom" data-toggle="tooltip" readonly="readonly">';
			
			var removeIcon = '<a><i class="fa fa-minus-square" onclick="removeSchedule(-1,$(this).parent().parent().parent().get( 0 ))"> Remover </i></a>';

			table.fnAddData( [
				daySelect,
				initHoursInput,
				finalHoursInput,
				removeIcon
			] );

			MakeSelect2();

			$('.time_pickers').timepicker({			
				stepMinute: 1,
				secondStep: 1,
				showSeconds: true,			
				timeFormat: 'HH:mm:ss',
				timeOnlyTitle: 'Seleccione la hora deseada',
				timeText: 'Selección',
				hourText: 'Horas',
				minuteText: 'Minutos',
				secondText: 'Segundos',
				currentText: 'Hora actual',
				closeText: 'Seleccionar'
			});	

		} );

		// Crea la lista de valores para trabajadores
		/*$("#selectedCities").select2({
			placeholder: "Seleccione una ciudad",
			allowClear: false
		});*/

		//MakeSelect2();

		$('.time_pickers').timepicker({			
			stepMinute: 1,
			secondStep: 1,
			showSeconds: true,			
			timeFormat: 'HH:mm:ss',
			timeOnlyTitle: 'Seleccione la hora deseada',
			timeText: 'Selección',
			hourText: 'Horas',
			minuteText: 'Minutos',
			secondText: 'Segundos',
			currentText: 'Hora actual',
			closeText: 'Seleccionar'
		});	
	});

	function removeSchedule(scheduleId, row)
	{
	    // Remueve la fila
		$('#datatable-1').dataTable().fnDeleteRow($('#datatable-1').dataTable().fnGetPosition( row ));

		// Verifica si es un horario existente
		if (scheduleId != -1)
		{
			// Obtiene el contenido del div de horarios removidos
			var removedSchedulesHtml = $('#removedSchedules').html();

			// Establece el campo con el valor del horario removido
			var remSchId = '<input type="hidden" value="'+scheduleId+'" name="removedSchedules[]">';

			// Se agrega al contenido del div de horarios a remover del trabajador
			$('#removedSchedules').html(removedSchedulesHtml+remSchId);
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
				<a href="#">Edición de Datos</a>
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
								
				{{ Form::open(array('action'=>'ScheduleController@postEdit', 'class'=>'form-horizontal', 'id'=>'editionForm')) }}
					{{ Form::hidden('cityId', $selectedCity->id) }}
					<div id="removedSchedules"></div>
					<div class="row form-group">
						<div class="col-sm-6">
							<h4 class="page-header">Ciudad: {{ $selectedCity->name }}</h4>
						</div>
					</div>
					<a><i class="fa fa-plus-square"> Adicionar horario </i></a>
					<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
						<thead>
							<tr>
								<th>Día</th>
								<th>Hora Inicial</th>
								<th>Hora Final</th>		
								<th>Remover Horario</th>						
							</tr>
						</thead>
						<tbody>
						<!-- Start: list_row -->
							@if ($citySchedules)
								@foreach($citySchedules as $schedule)
									<tr>										
										<td>
											{{ Form::hidden('modifiedSchedIds[]', $schedule->id) }}
											{{ Form::select('day[]', $schedulesDaysArray, $schedule->day, array('data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Día a laborar')) }}
										</td>
										<td>											
											{{ Form::text('initial_hour[]', $schedule->initial_hour, array('readonly'=>'readonly', 'class'=>'time_pickers', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Hora inicial del periodo laboral')) }}
										</td>
										<td>
											{{ Form::text('final_hour[]', $schedule->final_hour, array('readonly'=>'true', 'class'=>'time_pickers', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Hora final del periodo laboral')) }}
										</td>		
										<td>
											{{'<a id="'.$schedule->id.'"><i class="btn btn-success" onclick="removeSchedule('.$schedule->id.',$(this).parent().parent().parent().get( 0 ))"> Remover</i></a>'}}
										</td>								
									</tr>
								@endforeach
							@else
								<tr>
									<td>-</td>
									<td>-</td>
									<td>-</td>									
								</tr>							
							@endif
						</tbody>					
					</table>

					<div id="errors_div"></div>

					<div class="text-center">
				   		{{ Form::submit('Guardar', array('class'=>'btn btn-primary'))}}
				    </div>
				   
				{{ Form::close() }}
				
			</div>
		</div>
	</div>
</div>