<?php



class Notification
{
	private $pdo;

	public $notifiable_id;
	public $notifiable_type;
	public $user_id;
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

	public function insert(Notification $data)
	{
		try
		{
			$sql= "INSERT INTO notifications (notifiable_type,user_id,order_number,created_at,updated_at) VALUES (?,?,?,?,?)";
			$this->pdo->prepare($sql)->execute(array(
				$data->notifiable_type,
				$data->user_id,
				$data->order_number,
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