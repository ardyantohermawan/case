<?php

class Shipping extends Eloquent
{
	/**
	 * Table name
	 * @var string
	 */
	protected $table = 'shippings';

	/**
	 * Primary Key 
	 */
	protected $primaryKey = 'shippingId';

	/**
	 * Each Shipping may has only one checkout
	 * @return Object
	 */
	public function checkout()
	{
		return $this->hasOne('Checkout');
	}
}

?>