<?php

class ProductController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::where('active', '=', 1)->get();
		return View::make('pages.product.view')
						->with('products', $products);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.product.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
				'productName' => 'required',
				'description' => 'required',
				'stock' => 'required',
				'price' => 'required',
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::to('products')
							->withError($validator)
							->withInput(Input::all());
		}
		else
		{	

			$product = new Product;
			$product->productName = Input::get('productName');
			$product->description = Input::get('description');
			$product->stock = Input::get('stock');
			$product->price = Input::get('price');
			$product->active = 1;
			$product->save();

			Session::flash('message_success', 'Successfully saved');
			return Redirect::to('products');
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
		$product = Product::where('productId','=', $id)
					->where('active', '=', 1)
					->first();
		return View::make('pages.product.detail')
						->with('product', $product);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::where('productId','=', $id)
					->where('active', '=', 1)
					->first();
		return View::make('pages.product.edit')
						->with('product', $product);
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
				'productName' => 'required',
				'description' => 'required',
				'stock' => 'required',
				'price' => 'required',
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::to('products')
							->withError($validator)
							->withInput(Input::all());
		}
		else
		{	

			$product = Product::where('productId','=', $id)
					->where('active', '=', 1)
					->first();
			$product->productName = Input::get('productName');
			$product->description = Input::get('description');
			$product->stock = Input::get('stock');
			$product->price = Input::get('price');
			$product->active = Input::get('active');
			$product->save();

			Session::flash('message_success', 'Successfully saved');
			return Redirect::to('products');
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
		$product = Product::where('productId','=', $id)
					->where('active', '=', 1)
					->first();
		$product->active = 0;
		$product->save();

		Session::flash('message_success', 'Successfully deleted');

		return Redirect::to('products');
	}


}
