<?php

	require '../../function/koneksi.php';
	include '../../function/helper.php';

	admin_only($level, "user");

	$user_id = $_POST["txtUserId"];
	$level = $_POST["txtLevel"];
	$nama = $_POST["txtNama"];
	$email = $_POST["txtEmail"];
	$alamat = $_POST["txtAlamat"];
	$no_telepon = $_POST["txtNoTelepon"];
	$status = $_POST["txtStatus"];

	if (isset($user_id)) {
		# code...
		$update = mysql_query("UPDATE user SET level = '$level', nama = '$nama', email = '$email', alamat = '$alamat', no_telepon = '$no_telepon', status = '$status' WHERE user_id = '$user_id';");

		if ($update) {
			# code...
			header("location: " . BASE_URL . "index.php?page=profile&modul=user&action=list");
		}
		else{
			header("location: " . BASE_URL . "index.php?page=profile&modul=user&action=form&error=true");
		}
	}

?>