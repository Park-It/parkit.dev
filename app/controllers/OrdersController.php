<?php

class OrdersController extends \BaseController {

	/**
	 * Display a listing of orders
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check())
		{
			$first_name = Auth::user()->first_name;
			$userId = Auth::user()->id;
			$orders = DB::table('orders') 
			->select('orders.id AS id', 'cars.make AS make', 'cars.model AS model', 'cars.license_plate_number AS license_plate', 'parking_lots.name AS name', 'parking_lots.address AS address', 'orders.created_at AS created_at', 'orders.parking_lot_id AS parking_lot_id')
			->join('cars', 'cars.id', '=', 'car_id')
			->join('parking_lots', 'parking_lots.id', '=', 'parking_lot_id')
			->where('cars.user_id', $userId)
			->orderBy('id', 'desc')
			->paginate(10);
		}

		return View::make('orders.index', compact('first_name', 'orders'));
	}

	/**
	 * Show the form for creating a new order
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('orders.create');
	}

	/**
	 * Store a newly created order in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		// $validator = Validator::make($data, Order::$rules);

		// if ($validator->fails())
		// {
		// 	return Redirect::back()->withErrors($validator)->withInput();
		// }

		Order::create($data);
		return Response::json(['status' => 'OK']);
	}

	/**
	 * Display the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$order = Order::findOrFail($id);

		return View::make('orders.show', compact('order'));
	}

	/**
	 * Show the form for editing the specified order.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::find($id);

		return View::make('orders.edit', compact('order'));
	}

	/**
	 * Update the specified order in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$order = Order::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Order::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$order->update($data);

		return Redirect::route('orders.index');
	}

	/**
	 * Remove the specified order from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Order::destroy($id);

		return Redirect::route('orders.index');
	}

}
