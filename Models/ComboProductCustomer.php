<?php

require_once 'helpers/dropbox/vendor/autoload.php';
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

class ComboProductCustomer
{
	private $pdo;

	public $combo_product_customer_id;
	public $combo_customer_id;
	public $product_id;
	public $color;
	public $flavor;
	public $recipe;
	public $customization_text;
	public $customization_image;

	
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

	public function insert(ComboProductCustomer $data)
	{
		try
		{
			$sql= "INSERT INTO combo_products_customer (combo_customer_id,product_id,color,flavor,recipe,customization_text,customization_image) VALUES (?,?,?,?,?,?,?)";
			$this->pdo->prepare($sql)->execute(array(
				$data->combo_customer_id,
				$data->product_id,
				$data->color,
				$data->flavor,
				$data->recipe,
				$data->customization_text,
				$data->customization_image
				)
			);
		}catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function uploadDropbox($image)
	{
		$dropboxKey = "9w1pskicod9y2ob";
		$dropboxSecret = "5ga3j70ytzlvvsb";
		$dropboxToken = "gwbsfKA5zWEAAAAAAAAAAYHXYajszC7rzoD2vqLbWMxViyV6jMExo2nQbhd56L50";

		$app = new DropboxApp($dropboxKey,$dropboxSecret,$dropboxToken);
		$dropbox = new Dropbox($app);

		$name = uniqid();
		$tempFile = $image["tmp_name"];
		$ext = explode(".", $image["name"]);
		$ext = end($ext);
		$nameImage = "/".$name.".".$ext;


		try{
			$file = $dropbox->upload($tempFile, "/images/customization".$nameImage, ['autorename'=>true]);
			$response = $dropbox->postToAPI("/sharing/create_shared_link_with_settings", ["path" => "/images/customization".$nameImage, "settings" => ['requested_visibility' => 'public']]);
			$data = $response->getDecodedBody();
			return str_replace('dl=0', 'raw=1', $data['url']);

		}catch(Exception $e){
			print_r($e);
		}


	}
}

?>