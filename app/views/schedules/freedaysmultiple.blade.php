<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<a href="/">Inicio</a></li>
			<li>
				<a href="#">Horarios</a></li>
			<li>
				<a href="#">Edición días libres</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Edición días libres varios trabajadores</span>
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
																
				{{ Form::open(array('action'=>'SchedulesController@post_edit_freedaysmultiple', 'class'=>'form-horizontal', 'id'=>'editionForm')) }}
				
					<h4 class="page-header">Seleccione uno o varios trabajadores</h4>
					<div class="row form-group">
						<div class="col-sm-12">
							<select id="selectedWorkers" name="selectedWorkers[]" multiple>
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
				
					<a><i class="fa fa-plus-square"> Adicionar día libre </i></a>
				
					<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
						<thead>
							<tr>
								<th>Fecha día libre (Año-Mes-Dia)</th>
								<th>Remover día</th>						
							</tr>
						</thead>
						<tbody>
						
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

			var freedayDate = '<input class="date_pickers" type="text" name="freeday_date[]" title="Fecha día libre" data-placement="bottom" data-toggle="tooltip" readonly="readonly">';
			
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

		// Crea la lista de valores para trabajadores
		$("#selectedWorkers").select2({
			placeholder: "Seleccione un trabajador",
			allowClear: true
		});

		MakeSelect2();

		$('.date_pickers').datepicker( { dateFormat: 'yy-mm-dd' } );
	});

	function removeFreeday(freedayId, row)
	{
	    // Remueve la fila
		$('#datatable-1').dataTable().fnDeleteRow($('#datatable-1').dataTable().fnGetPosition( row ));
	}

</script>