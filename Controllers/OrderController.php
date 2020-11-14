<?php

require_once 'Models/Product.php';
require_once 'Models/Combo.php';
require_once 'Models/ComboCustomer.php';
require_once 'Models/Base.php';
require_once 'Models/Product.php';
require_once 'Models/Cuontry.php';
require_once 'Models/Department.php';
require_once 'Models/Municipality.php';
require_once 'Models/Order.php';
require_once 'Models/OrderDetail.php';
require_once 'Models/Customer.php';
require_once 'Models/ComboProductCustomer.php';
require_once 'Models/Notification.php';
require_once 'Models/User.php';


/**
 * 
 */
class OrderController /*extends AnotherClass*/
{
	private $combos;
	private $bases;
	private $products;
	private $municipalities;
	private $orders;
	private $order_details;
	private $customers;
	private $comboProductsCustomer;
	private $notifications;
	private $users;


	public function __construct()
	{
		$this->combos = new Combo();
		$this->combos_customers = new ComboCustomer();
		$this->bases = new Base();
		$this->products = new Product();
		$this->cuontries = new Cuontry();
		$this->departments = new Department();
		$this->municipalities = new Municipality();
		$this->orders = new Order();
		$this->order_details = new OrderDetail();
		$this->customers = new Customer();
		$this->comboProductsCustomer = new ComboProductCustomer();
		$this->notifications = new Notification();
		$this->users = new User();
		
	}

	public function create(){
		session_start();
		$combos = $this->combos->get();
		$products = $this->products->get();
		$cuontries = $this->cuontries->get();
		$departments = $this->departments->get();
		$comboTypes = $this->combos->getTypes();


		$today = date("Y-m-d");
		$delivery_date = date("Y-m-d",strtotime($today."+ 3 days"));
		$orders = $this->orders->find($delivery_date);

		

		$order_times = array(
			"6:00 AM - 6:30 AM" => "6:00 AM - 6:30 AM",
			"7:00 AM - 7:30 AM" => "7:00 AM - 7:30 AM",
			"8:00 AM - 8:30 AM" => "8:00 AM - 8:30 AM",
			"9:00 AM - 9:30 AM" => "9:00 AM - 9:30 AM",
			"10:00 AM - 10:30 AM" => "10:00 AM - 10:30 AM",
			"11:00 AM - 11:30 AM" => "11:00 AM - 11:30 AM",
			"1:00 PM - 1:30 PM" => "1:00 PM - 1:30 PM",
			"2:00 PM - 2:30 PM" => "2:00 PM - 2:30 PM",
			"3:00 PM - 3:30 PM" => "3:00 PM - 3:30 PM",
			"4:00 PM - 4:30 PM" => "4:00 PM - 4:30 PM",
			"5:00 PM - 5:30 PM" => "5:00 PM - 5:30 PM",
			"6:00 PM - 6:30 PM" => "6:00 PM - 6:30 PM",
		);

		if($orders != NULL){
			foreach ($orders as $order) {
				unset($order_times[$order->order_delivery_time]);
			}
		}
		// var_dump($combos);
		require_once 'Views/order/create.html.php';
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

	public function orderDeliveryTime(){

		$orders = $this->orders->find($_GET["delivery_date"]);


		$order_times = array(
			"6:00 AM - 6:30 AM" => "6:00 AM - 6:30 AM",
			"7:00 AM - 7:30 AM" => "7:00 AM - 7:30 AM",
			"8:00 AM - 8:30 AM" => "8:00 AM - 8:30 AM",
			"9:00 AM - 9:30 AM" => "9:00 AM - 9:30 AM",
			"10:00 AM - 10:30 AM" => "10:00 AM - 10:30 AM",
			"11:00 AM - 11:30 AM" => "11:00 AM - 11:30 AM",
			"1:00 PM - 1:30 PM" => "1:00 PM - 1:30 PM",
			"2:00 PM - 2:30 PM" => "2:00 PM - 2:30 PM",
			"3:00 PM - 3:30 PM" => "3:00 PM - 3:30 PM",
			"4:00 PM - 4:30 PM" => "4:00 PM - 4:30 PM",
			"5:00 PM - 5:30 PM" => "5:00 PM - 5:30 PM",
			"6:00 PM - 6:30 PM" => "6:00 PM - 6:30 PM",
		);

		if($orders != NULL){
			foreach ($orders as $order) {
				unset($order_times[$order->order_delivery_time]);
			}
		}

		if($order_times != NULL){		
				echo "<option value=''>Horas disponibles</option>";
			foreach ($order_times as $key => $value) {
				echo "<option value='".$value."'>".$value."</option>";
			}
		}else{
			echo "<option value=''>Dia copado</option>";
		}

	}

	public function save(){

		session_start();

		$customer = new Customer;

		$customer->customer_name=$_POST['customer_name'];
		$customer->customer_email=$_POST['customer_email'];
		$customer->phone_code=$_POST['phone_code'];
		$customer->customer_phone=$_POST['customer_phone'];
		$customer->created_at = date("Y-m-d")." ".date("G:i:s");
		$customer->updated_at = date("Y-m-d")." ".date("G:i:s");

		if($this->customers->find($_POST['customer_email'])==null){
			$this->customers->insert($customer);
		}

		$customer_id = $this->customers->find($_POST['customer_email'])->customer_id;
		$order_number_id = $this->orders->max()->order_id+1;

		$order = new Order;
		$order->order_number=$customer_id."".$order_number_id;
		$order->order_security_code = uniqid();
		$order->order_price=$_POST['input-order-price-total'];
		$order->order_state_id=1;
		$order->municipality_id = $_POST['municipality_id'];
		$order->order_delivery_address = $_POST['order_delivery_address'];
		$order->order_delivery_date = $_POST['order_delivery_date'];
		$order->order_delivery_time = $_POST['order_delivery_time'];
		$order->customer_id = $customer_id;
		$order->created_at = date("Y-m-d")." ".date("G:i:s");
		$order->updated_at = date("Y-m-d")." ".date("G:i:s");

		$this->orders->insert($order);

		$count_combo = $_POST['count_combo'];
		$combo = new Combo;
		$combo_customer = new ComboCustomer();
		$order_detail = new OrderDetail();
		$comboProductCustomer = new ComboProductCustomer;


		for ($c=1; $c <= $count_combo ; $c++) {

			$combo_customer->combo_id = $_POST["combo_id"][$c];
			$combo_customer->combo_name = $_POST["combo_name"][$c];
			$combo_customer->combo_type_id = $_POST["combo_type_id"][$c];
			$combo_customer->base_id = $_POST["base_id"][$c];
			$combo_customer->combo_purchase_price = $_POST["combo_sale_price"][$c]*100/160;
			$combo_customer->combo_price_percentage = 60;
			$combo_customer->combo_sale_price = $_POST["combo_sale_price"][$c];
			$combo_customer->customization_base_text = $_POST['customization_base_text'][$c];
			$combo_customer->customization_base_color = $_POST['customization_base_color'][$c];
			$combo_customer->order_id = $this->orders->max()->order_id;
			$combo_customer->created_at = date("Y-m-d")." ".date("G:i:s");
			$combo_customer->updated_at = date("Y-m-d")." ".date("G:i:s");

			$this->combos_customers->insert($combo_customer);
			$count_product = count($_POST["product_id"][$c]);
			// print_r($_POST["product_id"][$c][3]);


			$combo_customer_id = $this->combos_customers->max()->combo_customer_id;
			// $order_id = $this->orders->max()->order_id;
			// // print_r($_FILES["input_file"]);

			// $order_detail->order_id = $order_id;
			// $order_detail->combo_id = $combo_id;
			// $order_detail->customization_base_text = $_POST['customization_base_text'][$c];
			// $order_detail->customization_base_color = $_POST['customization_base_color'][$c];
			
			// $this->order_details->insert($order_detail);


			for ($p=0; $p < $count_product; $p++) { 
				for ($u=1; $u <= $_POST["units"][$c][$_POST["product_id"][$c][$p]]; $u++) { 
					
					$comboProductCustomer->combo_customer_id = $combo_customer_id;
					$comboProductCustomer->product_id = $_POST["product_id"][$c][$p];
					if (isset($_POST["select_flavors"][$c][$_POST["product_id"][$c][$p]][$u])) {
						$comboProductCustomer->flavor = $_POST["select_flavors"][$c][$_POST["product_id"][$c][$p]][$u];
					}else{
						$comboProductCustomer->flavor="";
					}
					if (isset($_POST["select_colors"][$c][$_POST["product_id"][$c][$p]][$u])) {
						$comboProductCustomer->color = $_POST["select_colors"][$c][$_POST["product_id"][$c][$p]][$u];
					}else{
						$comboProductCustomer->color="";
					}
					if (isset($_POST["select_recipes"][$c][$_POST["product_id"][$c][$p]][$u])) {
						$comboProductCustomer->recipe = $_POST["select_recipes"][$c][$_POST["product_id"][$c][$p]][$u];
					}else{
						$comboProductCustomer->recipe="";
					}
					if (isset($_POST["input_text"][$c][$_POST["product_id"][$c][$p]][$u])) {
						echo $comboProductCustomer->customization_text = $_POST["input_text"][$c][$_POST["product_id"][$c][$p]][$u];
					}else{
						$comboProductCustomer->customization_text="";
					}
					if (isset($_FILES["input_file_".$c."_".$_POST["product_id"][$c][$p]."_".$u])) {
						if ($_FILES["input_file_".$c."_".$_POST["product_id"][$c][$p]."_".$u]["name"]!=NULL) {

							$comboProductCustomer->customization_image = $this->comboProductsCustomer->uploadDropbox($_FILES["input_file_".$c."_".$_POST["product_id"][$c][$p]."_".$u]);
						}else{
							$comboProductCustomer->customization_image = "Sin imagen seleccionada";
						}
						
					}else{
						$comboProductCustomer->customization_image="";
					}

					$this->comboProductsCustomer->insert($comboProductCustomer);

				}
				
			}

			
		}

		$users = $this->users->get();
		foreach ($users as $user) {
			// die($user->user_id);
			$notification = new Notification;

			$notification->notifiable_type = "order";
			$notification->user_id = $user->user_id;
			$notification->order_number = $customer_id."".$order_number_id;
			$notification->created_at = date("Y-m-d")." ".date("G:i:s");
			$notification->updated_at = date("Y-m-d")." ".date("G:i:s");

			$this->notifications->insert($notification);
			
		}
		


		unset($_SESSION['total-price']);
		unset($_SESSION['shop-cart']);
		header('Location: http://localhost/dulcesorpresaco/?c=Order&a=response');
	}

	public function response()
	{
		$comboTypes = $this->combos->getTypes();
		require_once 'Views/order/response.html.php';
	}


	public function trackingView(){
		$comboTypes = $this->combos->getTypes();
		require_once 'Views/order/tracking.html.php';
	}

	public function tracking(){
		$order_number = $_POST['order_number'];
		$order_security_code = $_POST['order_security_code'];
		$order = $this->orders->trackingFind($order_number, $order_security_code);

		if ( $order == "") {
			echo 0;
		}else{
			// var_dump($order);
			require_once 'Views/order/tracking-response.html.php';
		}
	}


}

?>