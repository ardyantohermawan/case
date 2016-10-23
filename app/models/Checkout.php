<?php

class Checkout extends Eloquent
{
	/**
	 * Table name
	 * @var string
	 */
	protected $table = 'checkouts';

	/**
	 * Primary Key 
	 */
	protected $primaryKey = 'checkoutId';

	/**
	 * Each Checkout may has more than one product
	 * @return Object
	 */
	public function product()
	{
		return $this->hasMany('Product');
	}

	/**
	 * Each Checkout may has only one user
	 * @return Object
	 */
	public function user()
	{
		return $this->hasOne('User');
	}
}

?>