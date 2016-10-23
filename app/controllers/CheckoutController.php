<?php

class CheckoutController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$checkouts = Checkout::where('active', '=', 1)->get();
		return View::make('pages.checkout.view')
						->with('checkouts', $checkouts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.checkout.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
				'userId' => 'required',
				'productId' => 'required',
				'quantity' => 'required',
				'price' => 'required',
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::to('checkouts')
							->withError($validator)
							->withInput(Input::all());
		}
		else
		{	

			$checkout = new Checkout;
			$checkout->userId = Input::get('userId');
			$checkout->productId = Input::get('productId');
			$checkout->quantity = Input::get('quantity');
			$checkout->price = Input::get('price');
			$checkout->active = 1;
			$checkout->save();

			Session::flash('message_success', 'Successfully saved');
			return Redirect::to('checkouts');
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
		$checkout = Checkout::where('checkoutId','=', $id)
					->where('active', '=', 1)
					->first();
		return View::make('pages.checkout.detail')
						->with('checkout', $checkout);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$checkout = Checkout::where('checkoutId','=', $id)
					->where('active', '=', 1)
					->first();
		return View::make('pages.checkout.edit')
						->with('checkout', $checkout);
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
				'checkoutName' => 'required',
				'description' => 'required',
				'stock' => 'required',
				'price' => 'required',
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::to('checkouts')
							->withError($validator)
							->withInput(Input::all());
		}
		else
		{	

			$checkout = Checkout::where('checkoutId','=', $id)
					->where('active', '=', 1)
					->first();
			$checkout->userId = Input::get('userId');
			$checkout->productId = Input::get('productId');
			$checkout->quantity = Input::get('quantity');
			$checkout->price = Input::get('price');
			$checkout->active = Input::get('active');
			$checkout->save();

			Session::flash('message_success', 'Successfully saved');
			return Redirect::to('checkouts');
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
		$checkout = Checkout::where('checkoutId','=', $id)
					->where('active', '=', 1)
					->first();
		$checkout->active = 0;
		$checkout->save();

		Session::flash('message_success', 'Successfully deleted');

		return Redirect::to('checkouts');
	}


}
