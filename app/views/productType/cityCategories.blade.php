<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
	<thead>
		<tr>
			<th>Foto</th>										
			<th>Categoria</th>							
		</tr>
	</thead>
	<tbody>
	<!-- Start: list_row -->
		@if ($city)
			@foreach($city->categories as $category)
				<tr>
					<td>
						<img src="{{ $category->pivot->img_url }}" class="center" style="width: 60px; height: auto;">
					</td>
					<td>
						{{ 												
						 	HTML::link('#', 
						 	$category->description, 
						 	$attributes = array('class'=>'ajax-link', 'onclick' => 'LoadAjaxContent("producttypes/edit-form/'.$category->id.'"); return false;'), 
						 	$secure = null); 
						 }}
					</td>							
				</tr>
			@endforeach
		@else
			<tr>
				<td>-</td>
				<td>-</td>								
			</tr>							
		@endif

	</tbody>					
</table>