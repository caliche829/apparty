<div class="box-content no-padding">
	@if($orders)
		<div class="well well-lg">
			<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Valor</th>
						<th>Usuario</th>
						<th>Estado</th>
						<th>Detalle</th>
					</tr>
				</thead>
				<tbody>
				<!-- Start: list_row -->
					@if ($orders)
						@foreach($orders as $order)
							<tr>
								<td>{{$order->order_date}}</td>
								<td>{{$order->price}}</td>
								<td>{{ utf8_decode($order->customer->customer_name) }}</td>
								@if ($order->status->id == 2)
									<td><span class="txt-success">{{ $order->status->name }}</span></td>
								@else
									<td><span class="txt-danger">{{ $order->status->name }}</span></td>
								@endif
								<td>
									{{ 												
									 	HTML::link('#', 
									 	'Ver detalle', 
									 	$attributes = array('class'=>'ajax-link', 'onclick' => 'detailModal("orders/show-order/'.$order->id.'"); return false;'), 
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
	@else
		<p class="bg-danger">{{$msg}}</p>
	@endif
</div>

<script type="text/javascript">
	
	// Se ejecutan los plug-in de la tabla de datos y los combos
	$(document).ready(function() {	
		TestTable1();
		//MakeSelect2();
	});

	function detailModal(url){

		OpenModalBox('Detalle del pedido', 'Cargando... <img src="img/devoops_getdata.gif"/>', '');

		//$("#orderDetail").modal();

		setTimeout(function(){

			LoadAjaxContent(url, '.devoops-modal-inner');

		}, 500);
	}

</script>