<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<a href="/">Inicio</a></li>
			<li>
				<a href="#">Horarios</a></li>
			<li>
				<a href="#">Edición Festivos</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Edición de Festivos</span>
				</div>
				<div class="box-icons">
					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					
				</div>
				<div class="no-move"></div>
			</div>

			<div class="box-content">
				<div id="errors_div"></div>
				<a><i class="fa fa-plus-square"> Adicionar festivo </i></a>												
				{{ Form::open(array('action'=>'ScheduleController@postEditHolidays', 'class'=>'form-horizontal', 'id'=>'editionForm')) }}
					<div id="deletedHolidays"></div>
					<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
						<thead>
							<tr>
								<th>Fecha festivo (Año-Mes-Dia)</th>
								<th>Remover Festivo</th>						
							</tr>
						</thead>
						<tbody>
						<!-- Start: list_row -->
							@if ($holidays)
								@foreach($holidays as $holiday)
									<tr>
										{{ Form::hidden('id[]', $holiday->id) }}
										<td>
											{{ $holiday->holiday_date }}											
											<!-- {{ Form::text('holiday_date', $holiday->holiday_date, array('disabled'=>'disabled', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Fecha del dia festivo')) }} -->
										</td>		
										<td>
											{{'<a id="remove'.$holiday->id.'"><i class="fa fa-minus-square" onclick="removeHoliday('.$holiday->id.',$(this).parent().parent().parent().get( 0 ))"> Remover</i></a>'}}
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

					<div class="text-center">
				   		{{ Form::submit('Guardar', array('class'=>'btn btn-primary'))}}
				    </div>
				   
				{{ Form::close() }}
				
			</div>
		</div>
	</div>
</div>

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
	 	
	 	// Agrega una nueva fila cuando le da clic en nuevo festivo
		$('.fa-plus-square').on( 'click', function () {

			var holidayDate = '<input class="date_pickers" type="text" name="holiday_date[]" title="Fecha del festivo" data-placement="bottom" data-toggle="tooltip" readonly="readonly">';
			
			var removeIcon = '<a><i class="fa fa-minus-square" onclick="removeHoliday(-1,$(this).parent().parent().parent().get( 0 ))"> Remover </i></a>';

			table.fnAddData( [
				holidayDate,
				removeIcon
			] );

			MakeSelect2();

			$('.date_pickers').datepicker( { dateFormat: 'yy-mm-dd' } );
		} );

		// Establece la función remover en los iconos
		$('#datatable-1 tbody').on( 'click', 'i.fa-minus-square', function () {
			
			// Obtiene la fila a remover
		    var row = $(this).parent().parent().parent().get( 0 );

		    // Remueve la fila
			table.fnDeleteRow(table.fnGetPosition( row ));   		    
		} );

		MakeSelect2();

		$('.date_pickers').datepicker( { dateFormat: 'yy-mm-dd' } );
	});

	function removeHoliday(holidayId, row)
	{
	    // Remueve la fila
		$('#datatable-1').dataTable().fnDeleteRow($('#datatable-1').dataTable().fnGetPosition( row ));

		// Verifica si es un horario existente
		if (holidayId != -1)
		{
			// Establece el campo con el valor del horario removido
			var remHolidayId = '<input type="hidden" value="'+holidayId+'" name="removedHolidays[]">';

			// Se agrega al contenido del div de horarios a remover del trabajador
			$('#deletedHolidays').append(remHolidayId);
		}
	}

</script>