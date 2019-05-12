<?php

	require '../../function/koneksi.php';
	include '../../function/helper.php';

	admin_only($level, "banner");

	$banner_id = $_POST["txtBannerId"];
	$barang_id = $_POST["txtBarang"];

	$update_gambar = "";
	if (!empty($_FILES["txtGambar"]["name"])) {
		# code...
		$gambar = $_FILES["txtGambar"]["name"];
		move_uploaded_file($_FILES["txtGambar"]["tmp_name"], "../../img/banner/" . $gambar);

		$update_gambar = ", gambar='$gambar'";
	}

	$link = "index.php?page=detail&barang_id=" . $barang_id;
	$status = $_POST["txtStatus"];

	if ($banner_id == "") {
		# code...
		$insert = mysql_query("INSERT INTO banner VALUES(NULL, '$barang_id', '$gambar', '$link', '$status');");

		if ($insert) {
			# code...
			header("location: " . BASE_URL . "index.php?page=profile&modul=banner&action=list");
		}
		else{
			header("location: " . BASE_URL . "index.php?page=profile&modul=banner&action=form&error=true");
		}
	}
	elseif (isset($banner_id)) {
		# code...
		$update = mysql_query("UPDATE banner SET banner_id = '$banner_id', barang_id = '$barang_id' $update_gambar, link = '$link', status = '$status' WHERE banner_id = '$banner_id';");
		if ($update) {
			# code...
			header("location: " . BASE_URL . "index.php?page=profile&modul=banner&action=list");
		}
		else{
			header("location: " . BASE_URL . "index.php?page=profile&modul=banner&action=form&error=true");
		}
	}

?>