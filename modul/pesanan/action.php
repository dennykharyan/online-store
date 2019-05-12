<?php

	session_start();

	require '../../function/koneksi.php';
	include '../../function/helper.php';

	admin_only($level, "pesanan");

	$user_id = $_SESSION["user_id"];

	$pesanan_id = $_POST["txtPesananId"];
	$no_rekening = $_POST["txtNoRekening"];
	$nama_account = $_POST["txtNamaAkun"];
	$tanggal_transfer = $_POST["txtTanggal"];

	$insert_pembayaran = mysql_query("INSERT INTO konfirmasi_pembayaran (pesanan_id, nomor_rekening, nama_account, tanggal_transfer) VALUES('$pesanan_id', '$no_rekening', '$nama_account', '$tanggal_transfer')");

	if ($insert_pembayaran) {
		# code...
		$update_pesanan = mysql_query("UPDATE pesanan SET status='1' WHERE pesanan_id='$pesanan_id'");

		header("location: " . BASE_URL . "index.php?page=profile&modul=pesanan&action=list");
	}

?>