<?php

/**
 * 
 */
class Base
{
	private $pdo;

	public $base_id;
	public $base_name;
	public $base_measure;
	public $base_description;
	public $base_price;
	public $base_state;

	
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

			$stm = $this->pdo->prepare("SELECT bases.base_id, bases.base_name, bases.base_description, bases.base_price, bases.base_state, bases.created_at, base_images.base_image_name
				FROM bases 
				LEFT JOIN base_images 
				ON bases.base_id = base_images.base_id 
				WHERE bases.base_state = 'active'");

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function find($base_id)
	{
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM bases WHERE base_id = ".$base_id);
			$stm -> execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function baseImages($base_id)
	{
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM base_images WHERE base_id = ".$base_id);
			$stm -> execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
}

?>