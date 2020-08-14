<?php

require_once 'Models/Product.php';
require_once 'Models/Combo.php';
require_once 'Models/Base.php';
require_once 'Models/Product.php';

/**
 * 
 */
class OrderController /*extends AnotherClass*/
{
	private $combos;
	private $bases;
	private $products;

	public function __construct()
	{
		$this->combos = new Combo();
		$this->bases = new Base();
		$this->products = new Product();
	}

	public function create(){
		session_start();
		$combos = $this->combos->get();
		$products = $this->products->get();
		
		// var_dump($combos);
		require_once 'Views/order/create.html.php';
	}

	public function show(){
		
		$combo_id = $_POST['combo_id'];

		$combo = $this->combos->find($combo_id);
		$base = $this->bases->find($combo->base_id);
		$base_images = $this->bases->baseImages($combo->base_id);
		$products = $this->products->comboProducts($combo_id);

		// var_dump($base);
		require_once 'Views/shop/show.html.php';
	}

	public function product(){

		$combo_id = $_GET['combo_id'];

		$combo = $this->combos->find($combo_id);
		$combo_images = $this->combos->comboImages($combo_id);
		$base = $this->bases->find($combo->base_id);
		$base_images = $this->bases->baseImages($combo->base_id);
		$products = $this->products->comboProducts($combo_id);

		session_start();
		// session_destroy();
		require_once 'Views/shop/product.html.php';
	}

}

?>