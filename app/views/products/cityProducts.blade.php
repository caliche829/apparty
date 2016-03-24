<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
	<thead>
		<tr>
			<th>Articulo</th>
			<th>Descripción</th>										
			<th>Precio</th>	
			<th>Cantidad</th>	
			<th>Activo</th>							
		</tr>
	</thead>
	<tbody>
		@if ($city)				
			@foreach($city->products as $product)
				<tr>
					<td>
						{{ 												
						 	HTML::link('#', 
						 	$product->name, 
						 	$attributes = array('class'=>'ajax-link', 'onclick' => 'LoadAjaxContent("productsbycity/edit-form/'.$product->id.'/'.$city->id.'"); return false;'), 
						 	$secure = null); 
						 }}
					</td>
					<td>
						{{ $product->description }}
					</td>
					<td>
						${{ $product->price }}
					</td>
					<td>
						{{ $product->quantity }}
					</td>
					<td>
						@if($product->active == '1')
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