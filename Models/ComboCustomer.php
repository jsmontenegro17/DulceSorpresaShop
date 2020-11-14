<?php

/**
 * 
 */
class ComboCustomer
{
	private $pdo;

	public $combo_customer_id;
	public $combo_id;
	public $combo_name;
	public $combo_type_id;
	public $base_id;
	public $combo_description;
	public $combo_purchase_price;
	public $combo_price_percentage;
	public $combo_sale_price;
	public $order_id;

	
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


	public function max()
	{
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT combo_customer_id FROM combos_customers WHERE combo_customer_id =  (SELECT MAX(combo_customer_id) FROM combos_customers)");
			$stm -> execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insert(ComboCustomer $data)
	{
		try
		{
			$sql= "INSERT INTO combos_customers (combo_id,combo_name,combo_type_id,base_id,combo_purchase_price,combo_price_percentage,combo_sale_price,customization_base_text,customization_base_color,order_id,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
			$this->pdo->prepare($sql)->execute(array(
				$data->combo_id,
				$data->combo_name,
				$data->combo_type_id,
				$data->base_id,
				$data->combo_purchase_price,
				$data->combo_price_percentage,
				$data->combo_sale_price,
				$data->customization_base_text,
				$data->customization_base_color,
				$data->order_id,
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