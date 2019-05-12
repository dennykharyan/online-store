<?php

	require 'function/koneksi.php';
	include 'function/helper.php';

	$level = "costumer";
	$nama = $_POST["txtNama"];
	$email = $_POST["txtEmail"];
	$alamat = $_POST["txtAlamat"];
	$no_telp = $_POST["txtNoTelp"];
	$password = $_POST["txtPassword"];
	$repassword = $_POST["txtRepassword"];
	$status = "on";

	/* DESTROY PASSWORD UNTUK PENGECEKAN */
	unset($_POST["txtPassword"]);
	unset($_POST["txtRepassword"]);
	
	/* MENGIRIM NILAI YANG SUDAH DI SUBMIT KEMBALI KE FORM */
	$data_form = http_build_query($_POST);

	/* MENGECEK VALIDASI EMAIL */
	$cek_query = mysql_query("SELECT * FROM user WHERE email='$email'");


	/* CEK FIELD KOSONG */
	if (empty($nama) || empty($email) || empty($alamat) || empty($no_telp) || empty($password)) {
		# code...
		header("location:" . BASE_URL . "index.php?page=register&notif=require&$data_form");
	}
	/* VALIDASI EMAIL */
	elseif (mysql_num_rows($cek_query)) {
		# code...
		header("location:" . BASE_URL . "index.php?page=register&notif=email&$data_form");
	}
	/* VALIDASI PASSWORD */
	elseif ($password != $repassword) {
		# code...
		header("location:" . BASE_URL . "index.php?page=register&notif=password&$data_form");
	}

	/* NO ERROR */
	else{
		$password = md5($password);
		$regist_query = "INSERT INTO user VALUES(NULL, '$level', '$nama', '$email', '$alamat', '$no_telp', '$password', '$status');";

		$regist = mysql_query($regist_query);
		header("location:" . BASE_URL . "login.html");
	}

?>