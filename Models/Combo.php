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

			$stm = $this->pdo->prepare("SELECT combos.combo_id, combos.combo_name, combos.combo_description, combos.combo_sale_price, combos.combo_state, combos.created_at, combo_images.combo_image_name
				FROM combos 
				LEFT JOIN combo_images 
				ON combos.combo_id = combo_images.combo_id 
				WHERE combos.combo_state = 'active'");

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
}

?>