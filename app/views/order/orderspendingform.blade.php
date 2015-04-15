<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="#">Inicio</a></li>
			<li><a href="#">Pedidos</a></li>
			<li><a href="#">Pedidos por ciudad</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Ingrese los datos</span>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<h4 class="page-header">Seleccione ciudad</h4>
				<div class="form-horizontal" role="form">
					<div class="form-group">
						<div class="row">
							<label class="col-sm-2 control-label">Ciudad</label>
							<div class="col-sm-8">
								{{Form::select('city', $cities, null, array('class'=>'form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Ciudad', 'id'=>'city'));}}
							</div>							
						</div>
												
						<div class="text-center">
							<a href="#" onclick="getPendingOrders();" rel="external" class="btn btn-primary btn-label-left">
								Consultar
							</a>
						</div>
					</div>
				</div>
				<div id="orders-div"></div>
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
/**
 * Get the city orders by month
 */
function getPendingOrders(){
	
	var city = $('#city').val();
	
	LoadAjaxContentPost({city: city}, 'orders-div', 'orders/orders-pending');
}
</script>