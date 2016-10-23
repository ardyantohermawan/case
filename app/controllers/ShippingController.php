<?php

class ShippingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$shippings = Shipping::where('active', '=', 1)->get();
		return View::make('pages.shipping.view')
						->with('shippings', $shippings);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.shipping.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
				'checkoutId' => 'required',
				'shippingAddress' => 'required',
				'city' => 'required',
				'region' => 'required',
				'estimation' => 'required',
				'trackingNumber' => 'required',
				'isArrived' => 'required',
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::to('shippings')
							->withError($validator)
							->withInput(Input::all());
		}
		else
		{	

			$shipping = new Shipping;
			$shipping->checkoutId = Input::get('checkoutId');
			$shipping->shippingAddress = Input::get('shippingAddress');
			$shipping->city = Input::get('city');
			$shipping->region = Input::get('region');
			$shipping->estimation = Input::get('estimation');
			$shipping->trackingNumber = Input::get('trackingNumber');
			$shipping->isArrived = Input::get('isArrived');
			$shipping->save();

			Session::flash('message_success', 'Successfully saved');
			return Redirect::to('shippings');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$shipping = Shipping::where('shippingId','=', $id)
					->where('active', '=', 1)
					->first();
		return View::make('pages.shipping.detail')
						->with('shipping', $shipping);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$shipping = Shipping::where('shippingId','=', $id)
					->where('active', '=', 1)
					->first();
		return View::make('pages.shipping.edit')
						->with('shipping', $shipping);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
				'checkoutId' => 'required',
				'shippingAddress' => 'required',
				'city' => 'required',
				'region' => 'required',
				'estimation' => 'required',
				'trackingNumber' => 'required',
				'isArrived' => 'required',
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::to('shippings')
							->withError($validator)
							->withInput(Input::all());
		}
		else
		{	

			$shipping = Shipping::where('shippingId','=', $id)
					->where('active', '=', 1)
					->first();
			$shipping->checkoutId = Input::get('checkoutId');
			$shipping->shippingAddress = Input::get('shippingAddress');
			$shipping->city = Input::get('city');
			$shipping->region = Input::get('region');
			$shipping->estimation = Input::get('estimation');
			$shipping->trackingNumber = Input::get('trackingNumber');
			$shipping->isArrived = Input::get('isArrived');
			$shipping->save();

			Session::flash('message_success', 'Successfully saved');
			return Redirect::to('shippings');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$shipping = Shipping::delete($id)

		Session::flash('message_success', 'Successfully deleted');

		return Redirect::to('shippings');
	}


}
