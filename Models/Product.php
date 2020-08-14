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
			die($e->getMessage());
		}
	}

	public function get()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM products ");
			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function comboProducts($combo_id){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT products.product_id, products.product_name, products.product_trademark, products.product_net_content, products.product_colors, products.product_flavors, products.product_recipes, products.product_customization, products.product_price, products.product_image_name, products.product_state, combo_products.units  FROM combo_products 
				INNER JOIN products 
				on products.product_id = combo_products.product_id WHERE 
				combo_id=".$combo_id);

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function productCategories($product_id){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT product_categories.product_category_id, product_categories.product_category_name FROM products 
				INNER JOIN product_category_details 
				on products.product_id = product_category_details.product_id
				JOIN product_categories 
    			ON product_categories.product_category_id = product_category_details.product_category_id WHERE 
				products.product_id=".$product_id);

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function find($product_id){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM products 
				WHERE product_id=".$product_id);

			$stm->execute();

			return  $stm->fetch(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}	
	}

	public function arrayConvert($array)
	{

		
		foreach ($array as $value) {
			
			$arrayNew[0][]=$value->product_id;
			$arrayNew[1][$value->product_id]=$value->units;
			
		}
		return $arrayNew;
		// return json_decode(json_encode($array),true);
		 
	}
}

?>