<?php

class OrderController extends BaseController {

	public function getOrdersForm()
	{			
		// Se obtienen todas las ciudades activas
		$cities = City::lists('name','id');

		//Log::info($cities);

		// Retorna las ciudades 
		return View::make('order.ordersbymonth') -> with(array('cities'=> $cities));
	}

	/**
	* Obtiene los pedidos de una ciudad por mes
	*/
	public function postOrdersMonth()
	{			
		$cityId = Input::get('city');
		$month = Input::get('month');
		$year = Input::get('year');

		//Obtengo la ciudad
		$city = City::find($cityId);

		//Consulta los pedidos
		$orders = Order::where('order_date', 'like', $year.'-'.$month.'%')->
						   where('city', '=', $city->name)->with('customer')->with('status')->orderBy('order_date', 'asc')->get();

		$money = DB::select('select status_id, status.name, sum(price) as total
							from orders_old, status
							where order_date like ?
							and city = ?
							and status_id = status.id
							group by status_id', array($year.'-'.$month.'%', $city->name));

		//Log::info($orders);

		$total = 0;
		$priceSuccess = 0;
		$priceFail = 0;
		$pricePending = 0;

		//Recorro los valores del mes
		foreach ($money as $key => $value) {
			
			$total += $value->total;

			if ($value->name == 'Entregado') {
				$priceSuccess += $value->total;

			}elseif ($value->name == 'Pendiente') {
				$pricePending += $value->total;
			}else{
				$priceFail += $value->total;
			}
		}

		// Retorna los pedidos 
		return View::make('order.showordersmonth')->with(array('orders'=> $orders, 
																'total'=>$total, 
																'priceSuccess'=>$priceSuccess,
																'priceFail'=>$priceFail,
																'pricePending'=>$pricePending));
	}

	/**
	* Obtiene los datos de un pedido
	*/
	public function getShowOrder($id)
	{			
		$order = Order::where('id', $id)->with('customer')->with('status')->first();
		
		//Log::info($order);

		// Retorna el pedido
		return View::make('order.showorder')->with(array('order'=> $order));
	}

	/**
	* Muestra el view para obtener todos los pedidos pendientes
	*/
	public function getOrdersPendingForm()
	{			
		// Se obtienen todas las ciudades activas
		$cities = City::lists('name','id');

		//Log::info($cities);

		// Retorna las ciudades 
		return View::make('order.orderspendingform') -> with(array('cities'=> $cities));
	}

	/**
	* Obtiene los pedidos de una ciudad por mes
	*/
	public function postOrdersPending()
	{			
		$cityId = Input::get('city');

		//Obtengo la ciudad
		$city = City::find($cityId);

		//Consulta los pedidos
		$orders = Order::where('city', '=', $city->name)->with('customer')->with('status')->orderBy('order_date', 'asc')->get();

		// Retorna los pedidos 
		return View::make('order.pendingorders')->with(array('orders'=> $orders));
	}
}
