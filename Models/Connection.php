<?php

/**
 * 
 */
class Connection 
{
	
	public static function startUp()
	{
		// $pdo = new PDO('mysql:host=b8urpkg14umcsn9bhygt-mysql.services.clever-cloud.com;dbname=b8urpkg14umcsn9bhygt;charset=utf8', 'ulxxh5xh506q27jk', 'CSOtjW8QFYRXfl2Md3uS');
		// $pdo = new PDO('mysql:host=localhost;dbname=id13984409_dulcesorpresaco;charset=utf8', 'id13984409_jsmt', '7pBdT^\Gm(h#5D-[');
		$pdo = new PDO('mysql:host=localhost;dbname=dulcesorpresaco;charset=utf8', 'root', '');
		// $pdo = new PDO('mysql:host=db4free.net;dbname=dulcesorpresaco;charset=utf8', 'jsmt030997', 'jsmt030997');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}
}

?>