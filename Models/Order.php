<?php



class Order
{
	private $pdo;

	public $order_id;
	public $order_number;
	public $order_security_code;
	public $order_price;
	public $order_state;
	public $municipality_id;
	public $order_delivery_address;
	public $order_delivery_date;
	public $order_delivery_time;
	public $customer_id;

	
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

			$stm = $this->pdo->prepare("SELECT * FROM orders");

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function find($order_delivery_date)
	{
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM orders WHERE order_delivery_date = '".$order_delivery_date."'");
			$stm -> execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function trackingFind($order_number, $order_security_code)
	{
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM orders
				LEFT JOIN customers 
				ON orders.customer_id = customers.customer_id
				LEFT JOIN order_states 
				ON orders.order_state_id = order_states.order_state_id 
				WHERE (order_number = '".$order_number."') AND (order_security_code = '".$order_security_code."')");
			$stm -> execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function max()
	{
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT order_id FROM orders WHERE order_id =  (SELECT MAX(order_id) FROM combos)");
			$stm -> execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insert(Order $data)
	{
		try
		{
			$sql= "INSERT INTO orders (order_number,order_security_code,order_price,order_state_id,municipality_id,order_delivery_address,order_delivery_date,order_delivery_time,customer_id,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$this->pdo->prepare($sql)->execute(array(
				$data->order_number,
				$data->order_security_code,
				$data->order_price,
				$data->order_state_id,
				$data->municipality_id,
				$data->order_delivery_address,
				$data->order_delivery_date,
				$data->order_delivery_time,
				$data->customer_id,
				$data->created_at,
				$data->updated_at
				)
			);
		}catch (Exception $e)
		{
			die($e->getMessage());
		}
	}




}

?>