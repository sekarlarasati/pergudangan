<?php 
	$host	= "localhost";
	$user	= "root";
	$pass	= "";
	$db 	= "tgudang";

	$conn = mysql_connect( $host, $user, $pass) or die('Tidak bisa konek!' );
	mysql_select_db($db, $conn) or die('Tidak ada database.');
	$baseurl="http://localhost/tgudang/";
?>