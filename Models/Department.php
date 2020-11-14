<?php

/**
 * 
 */
class Department
{
	private $pdo;

	public $department_id;
	public $department_name;

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

			$stm = $this->pdo->prepare("SELECT * FROM departments ");

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

}

?>