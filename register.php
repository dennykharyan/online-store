<?php

	if ($user_id) {
		# code...
		header("location:" . BASE_URL);
	}

?>

<div class="row">
	<div class="col-md-4 col-md-offset-4" id="judul-form">
		<img src="img/create-account.jpg" class="img-responsive" id="register-img">
	</div>
</div>

<div class="container col-md-offset-2 col-md-6" id="form-register">
	<form method="POST" action="<?php echo BASE_URL . 'proses_register.php' ?>" class="form-horizontal">
		<?php

			/* CEK ERROR BY URL */
			$notif = isset($_GET["notif"]) ? $_GET["notif"] : false;
			
			$nama = isset($_GET["txtNama"]) ? $_GET["txtNama"] : false;
			$email = isset($_GET["txtEmail"]) ? $_GET["txtEmail"] : false;
			$alamat = isset($_GET["txtAlamat"]) ? $_GET["txtAlamat"] : false;
			$no_telepon = isset($_GET["txtNoTelp"]) ? $_GET["txtNoTelp"] : false;

			if ($notif == "require") {
				# code...
		?>
				<div class="alert notif">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Mohon lengkapi data diri Anda
				</div>
		<?php
			}
			elseif ($notif == "email") {
				# code...
		?>
				<div class="alert notif">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Email yang Anda masukan sudah terdaftar, silahkan <a href="<?php echo BASE_URL . 'login.html'; ?>">Login</a> atau gunakan email lain
				</div>
		<?php
			}
			elseif ($notif == "password") {
				# code...
		?>
				<div class="alert notif">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Password yang Anda masukan tidak sesuai, silahkan cek kembali
				</div>
		<?php
			}

		?>

		<div class="form-group">
			<label for="txtNama" class="col-md-4 control-label">Nama Lengkap</label>
				<div class="col-md-8">
					<input type="text" name="txtNama" class="form-control" id="txtNama" value="<?php echo $nama; ?>">
				</div>
		</div>
		<div class="form-group">
			<label for="txtEmail" class="col-md-4 control-label">Email</label>
				<div class="col-md-8">
					<input type="email" name="txtEmail" class="form-control" id="txtEmail" value="<?php echo $email; ?>">
				</div>
		</div>
		<div class="form-group">
			<label for="txtAlamat" class="col-md-4 control-label">Alamat</label>
				<div class="col-md-8">
					<textarea name="txtAlamat" class="form-control" rows="3" id="txtAlamat"><?php echo $alamat; ?></textarea>
				</div>
		</div>
		<div class="form-group">
			<label for="txtNoTelp" class="col-md-4 control-label">No. Telepon</label>
				<div class="col-md-8">
					<input type="text" name="txtNoTelp" class="form-control" id="txtNoTelp" value="<?php echo $no_telepon; ?>">
				</div>
		</div>
		<div class="form-group">
			<label for="txtPassword" class="col-md-4 control-label">Password</label>
				<div class="col-md-8">
					<input type="password" name="txtPassword" class="form-control" id="txtPassword">
				</div>
		</div>
		<div class="form-group">
			<label for="txtRepassword" class="col-md-4 control-label">Re-type Password</label>
				<div class="col-md-8">
					<input type="password" name="txtRepassword" class="form-control" id="txtRepassword">
				</div>
		</div>
		<div class="form-group">
			<div class="col-md-3 col-md-offset-7">
				<button type="submit" class="btn btn-default btn-md" id="btn-register">Register</button>
			</div>
		</div>
	</form>
</div>