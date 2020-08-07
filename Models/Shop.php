<?php

/**
 * 
 */
class Product
{
	private $pdo;

	public $product_id;
	public $product_name;
	public $product_trademark;
	public $product_category_id;
	public $product_net_content;
	public $product_flavor_color;
	public $product_price;
	public $product_image_name;
	public $product_state;
	
	function __construct()
	{
		try
		{
			$this->pdo = Connection::startUp();
		}
		catch(Exception $e)
		{
			die(e->getMessage());
		}
	}
}

?>