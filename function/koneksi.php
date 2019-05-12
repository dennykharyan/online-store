<?php

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db_name = "speedhunters_store";

	$koneksi = mysql_connect($host, $user, $pass)
		or die("koneksi ke Database gagal");
	$select = mysql_select_db($db_name)
		or die("gagal masuk ke Database");

?>