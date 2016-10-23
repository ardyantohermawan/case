<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::where('active', '=', 1)->get();
		return View::make('pages.user.view')
						->with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
				'firstName' => 'required',
				'lastName' => 'required',
				'address' => 'required',
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::to('users')
							->withError($validator)
							->withInput(Input::all());
		}
		else
		{	

			$user = new User;
			$user->firstName = Input::get('firstName');
			$user->lastName = Input::get('lastName');
			$user->address = Input::get('address');
			$user->active = 1;
			$user->save();

			Session::flash('message_success', 'Successfully saved');
			return Redirect::to('users');
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
		$user = User::where('userId','=', $id)
					->where('active', '=', 1)
					->first();
		return View::make('pages.user.detail')
						->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::where('userId','=', $id)
					->where('active', '=', 1)
					->first();
		return View::make('pages.user.edit')
						->with('user', $user);
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
				'firstName' => 'required',
				'lastName' => 'required',
				'address' => 'required',
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::to('users')
							->withError($validator)
							->withInput(Input::all());
		}
		else
		{	

			$user = User::where('userId','=', $id)
					->where('active', '=', 1)
					->first();
			$user->firstName = Input::get('firstName');
			$user->lastName = Input::get('lastName');
			$user->address = Input::get('address');
			$user->active = Input::get('active');
			$user->save();

			Session::flash('message_success', 'Successfully saved');
			return Redirect::to('users');
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
		$user = User::where('userId','=', $id)
					->where('active', '=', 1)
					->first();
		$user->active = 0;
		$user->save();

		Session::flash('message_success', 'Successfully deleted');

		return Redirect::to('users');
	}


}
