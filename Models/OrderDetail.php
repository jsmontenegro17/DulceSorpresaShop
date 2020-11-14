<?php



class OrderDetail
{
	private $pdo;

	public $order_detail_id;
	public $order_id;
	public $combo_customer_id;
	public $customization_base_text;
	public $customization_base_color;



	
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

	public function insert(OrderDetail $data)
	{
		try
		{
			$sql= "INSERT INTO order_detail (order_id,combo_customer_id,customization_base_text,customization_base_color) VALUES (?,?,?,?)";
			$this->pdo->prepare($sql)->execute(array(
				$data->order_id,
				$data->combo_customer_id,
				$data->customization_base_text,
				$data->customization_base_color
				)
			);
		}catch (Exception $e)
		{
			die($e->getMessage());
		}
	}




}

?>