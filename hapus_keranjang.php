<?php

	session_start();

	include 'function/helper.php';

	$barang_id = $_GET["barang_id"];
	$keranjang = $_SESSION["keranjang"];

	unset($keranjang[$barang_id]);

	$_SESSION["keranjang"] = $keranjang;

	header("location: " . BASE_URL . "keranjang.html");

?>