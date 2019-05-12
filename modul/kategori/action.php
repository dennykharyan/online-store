<?php

	require '../../function/koneksi.php';
	include '../../function/helper.php';

	admin_only($level, "kategori");

	$kategori_id = $_POST["txtKategoriId"];
	$kategori = $_POST["txtKategori"];
	$status = $_POST["status"];

	if ($kategori_id == "") {
		# code...
		$insert = mysql_query("INSERT INTO kategori VALUES(NULL, '$kategori', '$status');");

		if ($insert) {
			# code...
			header("location: " . BASE_URL . "index.php?page=profile&modul=kategori&action=list");
		}
		else{
			header("location: " . BASE_URL . "index.php?page=profile&modul=kategori&action=form&error=true");
		}
	}
	elseif (isset($kategori_id)) {
		# code...
		$update = mysql_query("UPDATE kategori SET kategori='$kategori', status='$status' WHERE kategori_id='$kategori_id';");

		if ($update) {
			# code...
			header("location: " . BASE_URL . "index.php?page=profile&modul=kategori&action=list");
		}
		else{
			header("location: " . BASE_URL . "index.php?page=profile&modul=kategori&action=form&error=true");
		}
	}

?>