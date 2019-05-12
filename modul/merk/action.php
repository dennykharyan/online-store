<?php

	require '../../function/koneksi.php';
	include '../../function/helper.php';

	admin_only($level, "merk");

	$merk_id = $_POST["txtMerkId"];
	$merk = $_POST["txtMerk"];

	/* update gambar */
	$update_gambar = "";
	if (!empty($_FILES["txtGambar"]["name"])) {
		# code...
		$gambar = $_FILES["txtGambar"]["name"];
		move_uploaded_file($_FILES["txtGambar"]["tmp_name"], "../../img/merk/" . $gambar);

		$update_gambar = ", gambar='$gambar'";
	}

	$status = $_POST["txtStatus"];

	if ($merk_id == "") {
		# code...
		$insert = mysql_query("INSERT INTO merk VALUES(NULL, '$merk', '$gambar', '$status');");

		if ($insert) {
			# code...
			header("location: " . BASE_URL . "index.php?page=profile&modul=merk&action=list");
		}
		else{
			header("location: " . BASE_URL . "index.php?page=profile&modul=merk&action=list&error=true");
		}
	}
	elseif (isset($merk_id)) {
		# code...
		$update = mysql_query("UPDATE merk SET merk = '$merk' $update_gambar, status = '$status' WHERE merk_id = '$merk_id'; ");

		if ($update) {
			# code...
			header("location: " . BASE_URL . "index.php?page=profile&modul=merk&action=list");
		}
		else{
			header("location: " . BASE_URL . "index.php?page=profile&modul=merk&action=list&error=true");
		}
	}

?>