<?php

/**
 * 
 */
class Connection 
{
	
	public static function startUp()
	{
		$pdo = new PDO('mysql:host=localhost;dbname=dulcesorpresaco;charset=utf8', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}
}

?>