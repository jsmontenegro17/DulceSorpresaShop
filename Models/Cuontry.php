<?php

/**
 * 
 */
class Cuontry
{
	private $pdo;

	public $nombre;
	public $name;
	public $nom;
	public $iso2;
	public $iso3;
	public $phone_code;


	
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

			$stm = $this->pdo->prepare("SELECT * FROM countries ");

			$stm->execute();

			return  $stm->fetchAll(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

}

?>