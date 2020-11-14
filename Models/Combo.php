<?php

/**
 * 
 */
class Combo
{
	private $pdo;

	public $combo_id;
	public $combo_name;
	public $combo_type_id;
	public $base_id;
	public $combo_description;
	public $combo_purchase_price;
	public $combo_price_percentage;
	public $combo_sale_price;
	public $user_id;
	public $customer_id;
	public $combo_state;

	
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

			$stm = $this->pdo->prepare("SELECT combos.combo_id, combos.combo_name, combos.combo_description, combos.combo_sale_price, combos.combo_state, combos.created_at
				FROM combos 
				WHERE combos.combo_state = 'active'");

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getTypes()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM combo_types");

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getTypeCombo($type)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT combos.combo_id, combos.combo_name, combos.combo_description, combos.combo_sale_price, combos.combo_state, combos.created_at, combos.combo_type_id, combo_types.combo_type_name
				FROM combos 
				LEFT JOIN combo_types
				ON combos.combo_type_id = combo_types.combo_type_id  
				WHERE (combos.combo_state = 'active') AND (combo_types.combo_type_name = '".$type."')");

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function find($combo_id)
	{
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM combos INNER JOIN combo_types ON combos.combo_type_id=combo_types.combo_type_id INNER JOIN bases ON combos.base_id=bases.base_id WHERE combo_id = ".$combo_id);
			$stm -> execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function comboImages($combo_id)
	{
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM combo_images WHERE combo_id = ".$combo_id);
			$stm -> execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function max()
	{
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT combo_id FROM combos WHERE combo_id =  (SELECT MAX(combo_id) FROM combos)");
			$stm -> execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function insert(Combo $data)
	{
		try
		{
			$sql= "INSERT INTO combos (combo_name,combo_type_id,base_id,combo_purchase_price,combo_price_percentage,combo_sale_price,customer_id,combo_state,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?,?,?)";
			$this->pdo->prepare($sql)->execute(array(
				$data->combo_name,
				$data->combo_type_id,
				$data->base_id,
				$data->combo_purchase_price,
				$data->combo_price_percentage,
				$data->combo_sale_price,
				$data->customer_id,
				$data->combo_state,
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