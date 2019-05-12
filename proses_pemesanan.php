<?php

	session_start();

	require 'function/koneksi.php';
	include 'function/helper.php';

	$kota_id = $_POST["txtKota"];
	$user_id = $_SESSION["user_id"];
	$nama_penerima = $_POST["txtPenerima"];
	$no_telp = $_POST["txtNoTelp"];
	$alamat = $_POST["txtAlamat"];
	$tanggal_pemesanan = date('Y-m-d H:i:s');

	$insert_pesanan = mysql_query("INSERT INTO pesanan (kota_id, user_id, nama_penerima, nomor_telepon, alamat, tanggal_pemesanan, status) VALUES('$kota_id', '$user_id', '$nama_penerima', '$no_telp', '$alamat', '$tanggal_pemesanan', '0')");

	if ($insert_pesanan) {
		# code...
		$pesanan_id = mysql_insert_id();
		
		$keranjang = $_SESSION["keranjang"];

		foreach ($keranjang as $key => $value) {
			# code...
			$barang_id = $key;
			$quantity = $value["quantity"];
			$harga = $value["harga"];

			$insert_pesanan_detail = mysql_query("INSERT INTO pesanan_detail VALUES('$pesanan_id', '$barang_id', '$quantity', '$harga')");
		}
		unset($_SESSION["keranjang"]);

		header("location: " . "index.php?page=profile&modul=pesanan&action=detail&pesanan_id=$pesanan_id");

	}
	else{
		header("location: " . BASE_URL . "data_pemesanan.php?notif=gagal");
	}

?>