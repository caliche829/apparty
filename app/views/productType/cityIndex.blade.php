<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="/">Inicio</a></li>
			<li><a href="#">Categorías</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<h3>					
						<span>Categorías x Ciudad</span>
					</h3>
				</div>
				<div class="box-icons">
					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">

				<div class="row">
					<div class="col-sm-10">	
					    <label class="col-sm-4 control-label">Seleccionar Ciudad</label>
						<div class="col-sm-8">
							@if($city == false)
						    	{{Form::select('city', $cities, null, array('class'=>'form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Ciudad', 'id'=>'city'));}}
							@else
								{{Form::select('city', $cities, $city->id, array('class'=>'form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Ciudad', 'id'=>'city'));}}
							@endif
					    </div>
					</div>
				</div>

				@if($city != false)
					<div id='registerCatBtn'>
						@if (Authority::can('create', 'ProductType'))
							<a class='btn btn-primary' href='#' onclick="LoadAjaxContent('producttypesbycity/form/'.$city->id.'/-1/-1')">Crear categoría x ciudad</a>
						@endif
					</div>
				@else
					<div id="registerCatBtn"><br></div>
				@endif

				<div style="padding: 10px 0; border-top: 2px solid grey;" id="cityCategories">
					@if($city != false)
						<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
							<thead>
								<tr>
									<th>Foto</th>										
									<th>Categoría</th>	
									<th>Activo</th>							
								</tr>
							</thead>
							<tbody>							
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
							</tbody>					
						</table>
					@endif
				</div>				
			</div>			
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		TestTable1();
		//MakeSelect2();
		
		var data = '';
		var div = "#registerCatBtn";
		
	    $('#city').on('change', function() {
	    	var cityId = $('#city').val();		

	    	data = "<div id='registerCatBtn'>"+
				"@if (Authority::can('create', 'ProductType'))\n" +
					"<a class='btn btn-primary' href='#' onclick=\"LoadAjaxContent('producttypesbycity/form/"+cityId+"/-1/-1')\">Crear categoría x ciudad</a>"+
				"@endif \n </div>";

			if(!cityId){
				cityId = -1;
				data = "<div id='registerCatBtn'><br></div>";
			}

			LoadAjaxContent('producttypesbycity/city-all/'+cityId, '#cityCategories');
			$(div).html(data);
	    });
	});

</script>