<?php


require_once 'Models/Subscription.php';



/**
 * 
 */
class SubscriptionController /*extends AnotherClass*/
{
	private $subscriptions;

	public function __construct()
	{

		$this->subscriptions = new Subscription();
		
	}

	

	public function save(){

		$subscription = new Subscription;

		$subscription->subscription_email=$_POST['subscription_email'];
		$subscription->subscription_state="active";
		$subscription->created_at = date("Y-m-d")." ".date("G:i:s");
		$subscription->updated_at = date("Y-m-d")." ".date("G:i:s");

		if($this->subscriptions->find($_POST['subscription_email'])==null){
			echo $this->subscriptions->insert($subscription);
			echo "Listo";
		}else{
			echo $this->subscriptions->update($subscription);
			echo "Listo";
		}

	}

	public function updateState()
	{
		$subscription = new Subscription;
		$subscription->subscription_email=$_POST['subscription_email'];
		$subscription->subscription_state="desactive";

		if($this->subscriptions->find($_POST['subscription_email'])==null){
			
			echo "No estas suscrito";
		}else{
			echo $this->subscriptions->update($subscription);
			echo "Dado de baja";
		}

	}

	public function response()
	{
		$comboTypes = $this->combos->getTypes();
		require_once 'Views/order/response.html.php';
	}



}

?>