<div class="box-content no-padding">
	@if($orders != false)
		<p><strong>Total:</strong> {{ $total }} ; 
			<strong>Vendido:</strong> {{ $priceSuccess }} ;
			<strong>Pendiente:</strong> {{ $pricePending }} ;
			<strong>Cancelado:</strong> {{ $priceFail }}
		</p>
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
								 	$attributes = array('class'=>'ajax-link', 'onclick' => 'LoadAjaxContent("orders/show-order/'.$order->id.'"); return false;'), 
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
	@else
		<p class="bg-danger">{{$msg}}</p>
	@endif
</div>