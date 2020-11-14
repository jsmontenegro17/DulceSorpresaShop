<?php

/**
 * 
 */
class Customer
{
	private $pdo;

	public $customer_id;
	public $customer_name;
	public $customer_email;
	public $phone_code;
	public $customer_phone;
	public $created_at;
	public $updated_at;

	
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

	public function insert(Customer $data)
	{
		try
		{
			$sql= "INSERT INTO customers (customer_name,customer_email,phone_code,customer_phone,created_at,updated_at) VALUES (?,?,?,?,?,?)";
			$this->pdo->prepare($sql)->execute(array(
				$data->customer_name,
				$data->customer_email,
				$data->phone_code,
				$data->customer_phone,
				$data->created_at,
				$data->updated_at
				)
			);
		}catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function find($customer_email){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM customers 
				WHERE customer_email='".$customer_email."'");

			$stm->execute();

			return  $stm->fetch(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}	
	}
}

?>