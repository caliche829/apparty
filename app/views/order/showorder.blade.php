<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="#">Inicio</a></li>
			<li><a href="#">Pedidos</a></li>
			<li><a href="#">Detalle pedido</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Detalle del pedido</span>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<h4 class="page-header">Pedido</h4>
				<div class="form-horizontal" role="form">
					<div class="form-group" style="padding-left: 30px;">
						<div>
							<div class="col-xs-12 col-sm-12">
								<p><strong>Datos de usuario:</strong></p>
								<p><strong>Nombre: </strong>{{ utf8_decode($order->customer->customer_name) }}</p>
								<p><strong>Telefono: </strong>{{ $order->customer->phone }}</p>
							</div>							
						</div>
						<div>
							<div class="col-xs-12 col-sm-12">
								<p><strong>Datos del pedido:</strong></p>					
								<p><strong>Fecha: </strong>{{ $order->order_date }}</p>
								<p><strong>Valor: </strong>{{ $order->price }}</p>
								<p><strong>Dirección: </strong>{{ $order->address }}</p>
								<p><strong>Ciudad: </strong>{{ $order->city }}</p>
								<strong>Articulos</strong>
								{{ utf8_decode($order->description) }}
							</div>
						</div>
					</div>
				</div>
				<div id="orders-div"></div>
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

</script>