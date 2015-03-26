<div id="errors_div"></div>
<a><i class="fa fa-plus-square"> Adicionar dia libre </i></a>												
{{ Form::open(array('action'=>'SchedulesController@post_edit_freedays', 'class'=>'form-horizontal', 'id'=>'editionForm')) }}
	<div id="deletedFreedays"></div>
	{{ Form::hidden('worker', $worker) }}
	<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
		<thead>
			<tr>
				<th>Fecha libre (Año-Mes-Dia)</th>
				<th>Remover dia libre</th>						
			</tr>
		</thead>
		<tbody>
		<!-- Start: list_row -->
			@if ($freedays)
				@foreach($freedays as $freeday)
					<tr>
						{{ Form::hidden('id[]', $freeday->id) }}
						<td>
							{{ $freeday->exception_date }}
						</td>		
						<td>
							{{'<a id="remove'.$freeday->id.'"><i class="fa fa-minus-square" onclick="removeFreeday('.$freeday->id.',$(this).parent().parent().parent().get( 0 ))"> Remover</i></a>'}}
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

			var freedayDate = '<input class="date_pickers" type="text" name="freeday_date[]" title="Fecha del dia libre" data-placement="bottom" data-toggle="tooltip" readonly="readonly">';
			
			var removeIcon = '<a><i class="fa fa-minus-square" onclick="removeFreeday(-1,$(this).parent().parent().parent().get( 0 ))"> Remover </i></a>';

			table.fnAddData( [
				freedayDate,
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

	function removeFreeday(freedayId, row)
	{
	    // Remueve la fila
		$('#datatable-1').dataTable().fnDeleteRow($('#datatable-1').dataTable().fnGetPosition( row ));

		// Verifica si es un horario existente
		if (freedayId != -1)
		{
			// Establece el campo con el valor del horario removido
			var remFreedayId = '<input type="hidden" value="'+freedayId+'" name="removedFreedays[]">';

			// Se agrega al contenido del div de horarios a remover del trabajador
			$('#deletedFreedays').append(remFreedayId);
		}
	}

</script>