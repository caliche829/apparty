<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="/">Inicio</a></li>
			<li><a href="#">Categorias</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<h3>					
						<span>Categorias</span>
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

				@if (Authority::can('create', 'ProductType'))
					<a class="btn btn-primary" href="#" onclick="LoadAjaxContent('producttypes/form')">Crear categoria</a>
				@endif

				<div style="padding: 10px 0; border-top: 2px solid grey;">
					<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
						<thead>
							<tr>										
								<th>Categoria</th>							
							</tr>
						</thead>
						<tbody>
						<!-- Start: list_row -->
							@if ($categories)
								@foreach($categories as $category)
									<tr>
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
				</div>				
			</div>			
		</div>
	</div>
</div>

<script type="text/javascript">
	// Se ejecutan los plug-in de la tabla de datos y los combos
	$(document).ready(function() {	
		TestTable1();
		MakeSelect2();
	});

</script>