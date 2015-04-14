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

		$money = DB::select('select status_id, status.name, sum(price) as price
							from orders_old, status
							where order_date like ?
							and city = ?
							and status_id = status.id
							group by status_id', array($year.'-'.$month.'%', $city->name));

		$total = 0;
		$priceSuccess = 0;
		$priceFail = 0;
		$pricePending = 0;

		//Recorro los trabajadores
		foreach ($money as $key => $value) {
			
			$total += $value->price;

			if ($value->name == 'Entregado') {
				$priceSuccess += $value->price;

			}elseif ($value->name == 'Pendiente') {
				$pricePending += $value->price;
			}else{
				$priceFail += $value->price;
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
		$order = Order::find($id)->with('customer');
		
		// Retorna el pedido
		return View::make('order.showorder')->with(array('order'=> $order));
	}

}
