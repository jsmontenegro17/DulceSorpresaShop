<?php

/**
 * 
 */
class Connection 
{
	
	public static function startUp()
	{
		// $pdo = new PDO('mysql:host=b8urpkg14umcsn9bhygt-mysql.services.clever-cloud.com;dbname=b8urpkg14umcsn9bhygt;charset=utf8', 'ulxxh5xh506q27jk', 'CSOtjW8QFYRXfl2Md3uS');
		$pdo = new PDO('mysql:host=localhost;dbname=dulcesorpresaco;charset=utf8', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}
}

?>