<?php

	require '../../function/koneksi.php';
	include '../../function/helper.php';

	admin_only($level, "barang");

	$barang_id = $_POST["txtBarangId"];
	$kategori_id = $_POST["txtKategoriId"];
	$merk_id = $_POST["txtMerk"];
	$nama_barang = $_POST["txtNamaBarang"];
	$spesifikasi = $_POST["txtSpesifikasi"];

	$update_gambar = "";
	if (!empty($_FILES["txtGambar"]["name"])) {
		# code...
		$gambar = $_FILES["txtGambar"]["name"];
		move_uploaded_file($_FILES["txtGambar"]["tmp_name"], "../../img/barang/" . $gambar);

		$update_gambar = ", gambar='$gambar'";
	}
	
	$harga = $_POST["txtHarga"];
	$stok = $_POST["txtStock"];
	$status = $_POST["txtStatus"];

	if ($barang_id == "") {
		# code...
		$insert = mysql_query("INSERT INTO barang VALUES(NULL, '$kategori_id', '$merk_id', '$nama_barang', '$spesifikasi', '$gambar', '$harga', '$stok', '$status');");

		if ($insert) {
			# code...
			header("location: " . BASE_URL . "index.php?page=profile&modul=barang&action=list");
		}
		else{
			header("location: " . BASE_URL . "index.php?page=profile&modul=barang&action=form&error=true");
		}
	}
	elseif (isset($barang_id)) {
		# code...
		$update = mysql_query("UPDATE barang SET kategori_id = '$kategori_id', merk_id = '$merk_id', nama_barang = '$nama_barang', spesifikasi = '$spesifikasi' $update_gambar, harga = '$harga', stok = '$stok', status = '$status' WHERE barang_id = '$barang_id'; ");

		if ($update) {
			# code...
			header("location: " . BASE_URL . "index.php?page=profile&modul=barang&action=list");
		}
		else{
			header("location: " . BASE_URL . "index.php?page=profile&modul=barang&action=form&error=true");
		}
	}

?>