<?php

	session_start();

	include 'function/helper.php';

	unset($_SESSION["user_id"]);
	unset($_SESSION["nama"]);
	unset($_SESSION["level"]);
	unset($_SESSION["keranjang"]);
	unset($_SESSION["proses_pemesanan"]);

	header("location: " . BASE_URL);

?>