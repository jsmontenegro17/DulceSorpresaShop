<?php



class Suggestion
{
	private $pdo;

	public $suggestion_id;
	public $message;
	public $customer_id;
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

	public function insert(Suggestion $data)
	{
		try
		{
			$sql= "INSERT INTO suggestions (message,customer_id,created_at,updated_at) VALUES (?,?,?,?)";
			$this->pdo->prepare($sql)->execute(array(
				$data->message,
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