<?php

	define('BASE_URL', 'http://localhost/speedhunters_store/');

	function rupiah($x)
	{
		# code...
		$y = "Rp. " . number_format($x);
		return $y;
	}

	$status_pesanan[0] = "Menunggu Pembayaran";
	$status_pesanan[1] = "Validasi Pembayaran";
	$status_pesanan[2] = "Lunas";
	$status_pesanan[3] = "Ditolak";

	function admin_only($level, $modul)
	{
		# code...
		if ($level != "administrator") {
			# code...
			$admin_pages = array("kategori", "barang", "merk", "kota", "user", "banner");
			if (in_array($modul, $admin_pages)) {
				# code...
				header("location: " . BASE_URL);
			}
		}
	}
?>