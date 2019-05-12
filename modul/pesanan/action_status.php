<?php

	session_start();

	require '../../function/koneksi.php';
	include '../../function/helper.php';

	admin_only($level, "pesanan");

	$pesanan_id = $_GET["pesanan_id"];
	$status = $_POST["txtStatus"];

	$update_pesanan = mysql_query("UPDATE pesanan SET status='$status' WHERE pesanan_id='$pesanan_id';");

	if ($status == "2") {
		# code...
		$select_pesanan_detail = mysql_query("SELECT * FROM pesanan_detail WHERE pesanan_id='$pesanan_id'");
		while ($data_pesanan_detail = mysql_fetch_assoc($select_pesanan_detail)) {
			# code...
			$barang_id = $data_pesanan_detail["barang_id"];
			$quantity = $data_pesanan_detail["quantity"];

			$update_stok = mysql_query("UPDATE barang SET stok=(stok-'$quantity') WHERE barang_id='$barang_id'");
		}
	}

	header("location: " . BASE_URL . "index.php?page=profile&modul=pesanan&action=list");

?>