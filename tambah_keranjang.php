<?php

	session_start();

	require 'function/koneksi.php';
	include 'function/helper.php';

	$barang_id = $_GET["barang_id"];
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;

	$select_barang = mysql_query("SELECT nama_barang, gambar, harga FROM barang WHERE barang_id='$barang_id'");
	$data_barang = mysql_fetch_assoc($select_barang);

	$keranjang[$barang_id] = array("nama_barang" => $data_barang["nama_barang"],
									"gambar" => $data_barang["gambar"],
									"harga" => $data_barang["harga"],
									"quantity" => 1);

	$_SESSION["keranjang"] = $keranjang;

	header("location: " . BASE_URL);

?>