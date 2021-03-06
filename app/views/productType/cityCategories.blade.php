<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
	<thead>
		<tr>
			<th>Foto</th>										
			<th>Categoría</th>	
			<th>Activo</th>							
		</tr>
	</thead>
	<tbody>
	<!-- Start: list_row -->
		@if ($city)
			@foreach($city->categories as $category)
				<tr>
					<td>
						@if ($category->img_url)
							<img src="{{ $category->img_url }}" class="center" style="width: 60px; height: auto;">
						@endif						
					</td>
					<td>
						{{ 												
						 	HTML::link('#', 
						 	$category->description, 
						 	$attributes = array('class'=>'ajax-link', 'onclick' => 'LoadAjaxContent("producttypesbycity/edit-form/'.$category->id.'/-1/'.$city->id.'"); return false;'), 
						 	$secure = null); 
						 }}
					</td>
					<td>
						@if($category->active == '1')
							Sí
						@else
							No
						@endif
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
<script type="text/javascript">
	// Se ejecutan los plug-in de la tabla de datos y los combos
	$(document).ready(function() {	
		TestTable1();
		//MakeSelect2();
	});

</script>