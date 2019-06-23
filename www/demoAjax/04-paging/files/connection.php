<?php
// Create connection
		$link = new mysqli("localhost", "root", "", "books") or die("ket noi that bai");
		mysqli_query($link, "SET NAMES UTF8");
		
		// /var_dump($link);
	// $link = mysql_connect('localhost', 'root', '');
	// if (!$link) {
	// 	echo 'Could not connect to mysql';
	// 	exit;
	// }
	
	// if (!mysql_select_db('books', $link)) {
	// 	echo 'Could not select database';
	// 	exit;
	// }
	// mysql_query("set names 'utf8'",$link);