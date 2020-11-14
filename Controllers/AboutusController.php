<?php
/**
 * 
 */
require_once 'Models/Combo.php';

class AboutusController /*extends AnotherClass*/
{

	private $combos;

	public function __construct()
	{
		$this->combos = new Combo();
	}

	public function index(){
		$comboTypes = $this->combos->getTypes();
		session_start();
		require_once 'Views/aboutus/index.html.php';
	}
}	