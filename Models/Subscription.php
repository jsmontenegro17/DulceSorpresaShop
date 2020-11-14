<?php



class Subscription
{
	private $pdo;

	public $subscription_id;
	public $subscription_email;
	public $subscription_state;
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

	public function find($subscription_email){
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM subscriptions 
				WHERE subscription_email='".$subscription_email."'");

			$stm->execute();

			return  $stm->fetch(PDO::FETCH_OBJ);

		}catch(Exception $e)
		{
			die($e->getMessage());
		}	
	}

	public function insert(Subscription $data)
	{
		try
		{
			$sql= "INSERT INTO subscriptions (subscription_email,subscription_state,created_at,updated_at) VALUES (?,?,?,?)";
			$this->pdo->prepare($sql)->execute(array(
				$data->subscription_email,
				$data->subscription_state,
				$data->created_at,
				$data->updated_at
				)
			);
		}catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function update(Subscription $data)
	{
		try
		{
			$stm = $this->pdo->prepare("UPDATE subscriptions SET subscription_state='".$data->subscription_state."' WHERE subscription_email='".$data->subscription_email."'");
			$stm->execute();

		}catch (Exception $e)
		{
			die($e->getMessage());
		}
	}




}

?>