<?php
/**
 * 
 */

require_once 'Models/Combo.php';
require_once 'Models/Suggestion.php';
require_once 'Models/Cuontry.php';
require_once 'Models/Customer.php';

class ContactController /*extends AnotherClass*/
{
	private $combos;

	public function __construct()
	{
		$this->combos = new Combo();
		$this->suggestions = new Suggestion();
		$this->cuontries = new Cuontry();
		$this->customers = new Customer();

	}

	public function index(){

		$cuontries = $this->cuontries->get();
		$comboTypes = $this->combos->getTypes();
		session_start();
		require_once 'Views/contact/index.html.php';
	}

	public function save(){

		$customer = new Customer;

		$customer->customer_name=$_POST['customer_name'];
		$customer->customer_email=$_POST['customer_email'];
		$customer->phone_code=$_POST['phone_code'];
		$customer->customer_phone=$_POST['customer_phone'];
		$customer->created_at = date("Y-m-d")." ".date("G:i:s");
		$customer->updated_at = date("Y-m-d")." ".date("G:i:s");

		if($this->customers->find($_POST['customer_email'])==null){
			$this->customers->insert($customer);
		}

		$customer_id = $this->customers->find($_POST['customer_email'])->customer_id;
		$suggestion = new Suggestion;
		$suggestion->customer_id = $customer_id;
		$suggestion->message = $_POST['message'];
		$suggestion->created_at = date("Y-m-d")." ".date("G:i:s");
		$suggestion->updated_at = date("Y-m-d")." ".date("G:i:s");

		$this->suggestions->insert($suggestion);
		header('Location: http://localhost/dulcesorpresaco/?c=Contact&a=response');
	}

	public function response()
	{
		session_start();
		$comboTypes = $this->combos->getTypes();
		require_once 'Views/contact/response.html.php';
	}
}	