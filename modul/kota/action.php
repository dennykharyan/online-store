<?php

	require '../../function/koneksi.php';
	include '../../function/helper.php';

	admin_only($level, "kota");

	$kota_id = $_POST["txtKotaId"];
	$kota = $_POST["txtKota"];
	$tarif = $_POST["txtTarif"];
	$status = $_POST["txtStatus"];

	if ($kota_id == "") {
		# code...
		$insert = mysql_query("INSERT INTO kota VALUES (NULL, '$kota', '$tarif', '$status');");

		if ($insert) {
			# code...
			header("location: " . BASE_URL . "index.php?page=profile&modul=kota&action=list");
		}
		else{
			header("location: " . BASE_URL . "index.php?page=profile&modul=kota&action=form&error=true");
		}
	}

	if (isset($kota_id)) {
		# code...
		$update = mysql_query("UPDATE kota SET kota_id = '$kota_id', kota = '$kota', tarif = '$tarif', status = '$status' WHERE kota_id = '$kota_id';");

		if ($update) {
			# code...
			header("location: " . BASE_URL . "index.php?page=profile&modul=kota&action=list");
		}
		else{
			header("location: " . BASE_URL . "index.php?page=profile&modul=kota&action=form&error=true");
		}
	}

?>