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
				<h4 class="page-header">Seleccione mes y año</h4>
				<div class="form-horizontal" role="form">
					<div class="form-group">
						<div class="row">
							<label class="col-sm-2 control-label">Ciudad</label>
							<div class="col-sm-8">
								{{Form::select('city', $cities, null, array('class'=>'form-control', 'data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Ciudad', 'id'=>'city'));}}
							</div>							
						</div>
						<div class="row">
							<label class="col-sm-2 control-label">Mes</label>
							<div class="col-sm-4">
								<select id="select-month" class="form-control">
									<option value="01">Enero</option>
									<option value="02">Febrero</option>
									<option value="03">Marzo</option>
									<option value="04">Abril</option>
									<option value="05">Mayo</option>
									<option value="06">Junio</option>
									<option value="07">Julio</option>
									<option value="08">Agosto</option>
									<option value="09">Septiembre</option>
									<option value="10">Octubre</option>
									<option value="11">Noviembre</option>
									<option value="12">Diciembre</option>
								</select>
							</div>
							<div class="col-sm-4">
								<select id="select-year" class="form-control"></select>
							</div>							
						</div>
						
						<div class="text-center">
							<a href="#" onclick="getCityOrdersByMonth();" rel="external" class="btn btn-primary btn-label-left">
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
$(document).ready(function() {

	completeYearList('select-year');
});

/**
 * Get the city orders by month
 */
function getCityOrdersByMonth(){
	
	var city = $('#city').val();
	var month = $('#select-month').val();
	var year = $('#select-year').val();
	
	LoadAjaxContentPost({city: city, month: month, year: year}, 'orders-div', 'orders/orders-month');
}
</script>