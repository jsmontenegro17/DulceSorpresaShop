<?php


require_once 'Models/Department.php';
require_once 'Models/Municipality.php';

/**
 * 
 */
class DepartmentController /*extends AnotherClass*/
{

	private $department;
	private $municipalities;

	public function __construct()
	{
		$this->departments = new Department();
		$this->municipalities = new Municipality();
	}

	public function departmentMunicipalitiesOption(){

		$municipalities=$this->municipalities->departmentMunicipalities($_GET["department_id"]);
		foreach ($municipalities as $municipality) {
			echo "<option value='".$municipality->municipality_id."'>".$municipality->municipality_name."<option>";
		}
	}
}	