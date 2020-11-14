<?php

require_once 'Models/Product.php';
require_once 'Models/Combo.php';
require_once 'Models/Base.php';
require_once 'Models/Product.php';

/**
 * 
 */
class CartController /*extends AnotherClass*/
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

	public function index(){
		session_start();
		$products = $this->products->get();
		$comboTypes = $this->combos->getTypes();
		// print_r($products);
		require_once 'Views/shop/cart.html.php';
	}

	public function add(){

		session_start();

		if (isset($_SESSION['shop-cart'])) {
		 	if(isset($_GET['combo_id'])){
		 		$arrayCart = $_SESSION['shop-cart'];
		 		$total_price = 0;
		 		$find=false;
		 		$number = 0;
		 		for ($i=0; $i < count($arrayCart) ; $i++) { 
		 			
		 			if ($arrayCart[$i]['combo_id'] == $_GET['combo_id']) {
		 				$find = true;
		 				$number = $i;
		 			}
		 		}
		 		if ($find == true) {
		 			$total_price_new = 0;
		 			$arrayCart[$number]['quantity'] = $arrayCart[$number]['quantity']+$_GET['quantity'];
		 			$arrayCart[$number]['price_quantity'] = $arrayCart[$number]['quantity']*$arrayCart[$number]['combo_sale_price'];
		 			$_SESSION['shop-cart'] = $arrayCart;

		 			for ($i=0; $i < count($arrayCart); $i++) { 
		 				
		 				$total_price += $arrayCart[$i]['price_quantity']; 
		 			}

		 			$_SESSION['total-price']=$total_price;
		 			echo "?c=cart&a=index";

		 		}else{
			 		$combo_id = $_GET['combo_id'];
			 		$combo = $this->combos->find($combo_id);
			 		$combo_images = $this->combos->comboImages($combo_id);

			 		if(count($combo_images)!=0){
				 		foreach ($combo_images as $combo_image) {
				 			$combo_image_name = $combo_image->combo_image_name;
				 		}
				 	}else{
				 		$combo_image_name = "";
				 	}

			 		$arrayCartNew = array(
			 			'combo_id' => $_GET['combo_id'], 
			 			'combo_image_name' => $combo_image_name,
			 			'combo_name' => $combo->combo_name, 
			 			'combo_sale_price' => $combo->combo_sale_price,
			 			'quantity' => $_GET['quantity'],
			 			'price_quantity' => $_GET['quantity'] * $combo->combo_sale_price,
			 		);

			 		array_push($arrayCart, $arrayCartNew);
			 		$_SESSION['shop-cart'] = $arrayCart;


			 		for ($i=0; $i < count($arrayCart); $i++) { 
		 				
		 				$total_price += $arrayCart[$i]['price_quantity']; 
		 			}

		 			$_SESSION['total-price']=$total_price;

			 		echo "?c=cart&a=index";
		 		}
		 	}
		}else{
		 	if(isset($_GET['combo_id'])){

		 		$combo_id = $_GET['combo_id'];
		 		$combo = $this->combos->find($combo_id);
		 		$combo_images = $this->combos->comboImages($combo_id);

		 		// echo count($combo_images);
		 		if(count($combo_images)!=0){
			 		foreach ($combo_images as $combo_image) {
				 		$combo_image_name = $combo_image->combo_image_name;
				 	}
			 	}else{
			 		$combo_image_name = "";
			 	}

		 		$arrayCart[] = array(
		 			'combo_id' => $_GET['combo_id'],
			 		'combo_image_name' => $combo_image_name,
		 			'combo_name' => $combo->combo_name, 
		 			'combo_sale_price' => $combo->combo_sale_price,
		 			'quantity' => $_GET['quantity'], 
		 			'price_quantity' => $_GET['quantity'] * $combo->combo_sale_price,
		 		);

		 		$_SESSION['total-price'] = $arrayCart[0]['price_quantity'];
		 		$_SESSION['shop-cart'] = $arrayCart;

		 		echo "?c=cart&a=index";
		 	}
		}

		
	}

	public function remove(){
		session_start();
		$array =  $_SESSION['shop-cart'];
		for ($i=0; $i < count($array) ; $i++) { 
			if ($array[$i]['combo_id'] != $_GET['combo_id']) {
				$arrayNew[] = array(
					'combo_id' => $array[$i]['combo_id'],
			 		'combo_image_name' => $array[$i]['combo_image_name'],
		 			'combo_name' => $array[$i]['combo_name'], 
		 			'combo_sale_price' => $array[$i]['combo_sale_price'],
		 			'quantity' => $array[$i]['quantity'], 
		 			'price_quantity' => $array[$i]['price_quantity'],
				); 
			}else{
				$price_quantity = $array[$i]['price_quantity'];
			}
		}

		if (isset($arrayNew)) {
			if (isset($price_quantity)) {
				echo $_SESSION['total-price'] = $_SESSION['total-price'] - $price_quantity;
			}
			$_SESSION['shop-cart']=$arrayNew;
		}else{
			unset($_SESSION['total-price']);
			unset($_SESSION['shop-cart']);

		}
	}

	public function quantity(){

		session_start();

		if (isset($_SESSION['shop-cart'])) {
		 	if(isset($_GET['combo_id'])){
		 		$arrayCart = $_SESSION['shop-cart'];
		 		$total_price = 0;
		 		$find=false;
		 		$number = 0;
		 		for ($i=0; $i < count($arrayCart) ; $i++) { 
		 			
		 			if ($arrayCart[$i]['combo_id'] == $_GET['combo_id']) {
		 				$find = true;
		 				$number = $i;
		 			}
		 		}
		 		if ($find == true) {
		 			$total_price_new = 0;
		 			$arrayCart[$number]['quantity'] = $_GET['quantity'];
		 			$arrayCart[$number]['price_quantity'] = $arrayCart[$number]['quantity']*$arrayCart[$number]['combo_sale_price'];
		 			$_SESSION['shop-cart'] = $arrayCart;

		 			for ($i=0; $i < count($arrayCart); $i++) { 
		 				
		 				$total_price += $arrayCart[$i]['price_quantity']; 
		 			}

		 			$_SESSION['total-price']=$total_price;
		 			echo "?c=cart&a=index";

		 		}
		 	}
		}		
	}
}