<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="/">Inicio</a></li>
			<li><a href="#">Productos</a></li>			
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<h3>					
						<span>Artículos</span>
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

				@if (Authority::can('create', 'Product'))
					<a class="btn btn-primary" href="#" onclick="LoadAjaxContent('products/form/-1/-1')">Crear producto</a>
				@endif

				<div style="padding: 10px 0; border-top: 2px solid grey;">
					<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
						<thead>
							<tr>
								<th>Foto</th>										
								<th>Producto</th>
								<th>Categoría</th>							
							</tr>
						</thead>
						<tbody>
						<!-- Start: list_row -->
							@if ($products)
								@foreach($products as $product)
									<tr>
										<td>
											@if ($product->image)
												<img src="{{ $product->image->img_url }}" class="center" style="width: 60px; height: auto;">
											@endif
										</td>
										<td>
											{{ 												
											 	HTML::link('#', 
											 	$product->name, 
											 	$attributes = array('class'=>'ajax-link', 'onclick' => 'LoadAjaxContent("products/edit-form/'.$product->id.'/-1/-1"); return false;'), 
											 	$secure = null); 
											 }}
										</td>
										<td>
											{{ $product->productType->description }}
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