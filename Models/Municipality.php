<?php

/**
 * 
 */
class Municipality
{
	private $pdo;

	public $municipality_id;
	public $municipality_name;
	public $municipality_state;
	public $department_id;

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

			$stm = $this->pdo->prepare("SELECT * FROM municipalities ");

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function departmentMunicipalities($department_id){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM municipalities 
				WHERE department_id=".$department_id);

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}	
	}

}

?>