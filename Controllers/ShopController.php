<?php

require_once 'Models/Product.php';
require_once 'Models/Combo.php';
require_once 'Models/Base.php';
require_once 'Models/Product.php';

/**
 * 
 */
class ShopController /*extends AnotherClass*/
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
		$combos = $this->combos->get();
		$comboTypes = $this->combos->getTypes();
		// var_dump($combos);
		require_once 'Views/shop/index.html.php';
	}

	public function show(){
		
		$combo_id = $_POST['combo_id'];

		$combo = $this->combos->find($combo_id);
		$base = $this->bases->find($combo->base_id);
		$base_images = $this->bases->baseImages($combo->base_id);
		$products = $this->products->comboProducts($combo_id);
		$comboTypes = $this->combos->getTypes();
		

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
		$comboTypes = $this->combos->getTypes();


		session_start();
		// session_destroy();
		require_once 'Views/shop/product.html.php';
	}

	public function typeCombo()
	{
		$type = $_GET['type'];
		$typeCombos = $this->combos->getTypeCombo($type);
		$comboTypes = $this->combos->getTypes();
		$combos = $this->combos->get();
		session_start();
		
		require_once 'Views/shop/type.html.php';

	}
	public function favoriteView()
	{
		session_start();
		$comboTypes = $this->combos->getTypes();
		require_once 'Views/shop/favorite.html.php';
	}

	public function fav()
	{
		session_start();
		// session_destroy();
		// unset($_SESSION["fav"]);

		if (isset($_SESSION['fav'])) {
		 	if(isset($_GET['combo_id'])){

		 		$arrayFav = $_SESSION['fav'];
		 		$find=false;
		 		$number = 0;
		 		for ($i=0; $i < count($arrayFav) ; $i++) { 
		 			
		 			if ($arrayFav[$i]['combo_id'] == $_GET['combo_id']) {
		 				$find = true;
		 				$number = $i;
		 			}
		 		}
		 		if ($find == true) {
		 			echo "0";
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

			 		$arrayFavNew =  array(
			 			'combo_id' => $_GET['combo_id'], 
			 			'combo_image_name' => $combo_image_name,
			 			'combo_name' => $combo->combo_name, 
			 			'combo_sale_price' => $combo->combo_sale_price,
			 			'combo_type_name' => $combo->combo_type_name
			 		);

			 		array_push($arrayFav, $arrayFavNew);
			 		$_SESSION['fav'] = $arrayFav;

			 		echo "1";
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

		 		$arrayFav[] = array(
		 			'combo_id' => $_GET['combo_id'],
			 		'combo_image_name' => $combo_image_name,
		 			'combo_name' => $combo->combo_name, 
		 			'combo_sale_price' => $combo->combo_sale_price,
		 			'combo_type_name' => $combo->combo_type_name
		 		);

		 		$_SESSION['fav'] = $arrayFav;

		 		echo "1";
		 	}
		}
	}

	public function removerFav()
	{
		session_start();
		$array =  $_SESSION['fav'];
		for ($i=0; $i < count($array) ; $i++) { 
			if ($array[$i]['combo_id'] != $_GET['combo_id']) {
				$arrayNew[] = array(
					'combo_id' => $array[$i]['combo_id'],
			 		'combo_image_name' => $array[$i]['combo_image_name'],
		 			'combo_name' => $array[$i]['combo_name'], 
		 			'combo_sale_price' => $array[$i]['combo_sale_price'],
		 			'combo_type_name' => $array[$i]['combo_type_name']
				); 
			}
		}

		if (isset($arrayNew)) {
			$_SESSION['fav']=$arrayNew;
		}else{
			unset($_SESSION['fav']);

		}

		echo "2";
	}

}

?>