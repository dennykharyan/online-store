<?php

	require 'function/koneksi.php';
	include 'function/helper.php';

	$email = $_POST["txtEmail"];
	$password = md5($_POST['txtPassword']);

	$login_query = "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on';";

	$login = mysql_query($login_query);

	if (mysql_num_rows($login) == 0) {
		# code...
		header("location:" . BASE_URL . "index.php?page=login&notif=true");
	}
	else{
		$data = mysql_fetch_assoc($login);

		session_start();

		$_SESSION["user_id"] = $data["user_id"];
		$_SESSION["nama"] = $data["nama"];
		$_SESSION["level"] = $data["level"];

		if (isset($_SESSION["proses_pemesanan"])) {
			# code...
			header("location: " . BASE_URL . "data_pemesanan.html");
		}
		else{
			header("location:" . BASE_URL . "index.php?page=profile&modul=pesanan&action=list");
		}

	}

?>