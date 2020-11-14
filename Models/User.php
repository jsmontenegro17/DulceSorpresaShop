<?php

/**
 * 
 */
class User
{
	private $pdo;


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

	public function get(){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT user_id FROM users");

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}	
	}
}

?>