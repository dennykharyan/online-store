<?php

	$error = isset($_GET["error"]) ? $_GET["error"] : false;
	$user_id = isset($_GET["user_id"]) ? $_GET["user_id"] : false;
	$level = "";
	$nama = "";
	$email = "";
	$alamat = "";
	$no_telp = "";
	$status = "";

	if ($error == true) {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Gagal menyimpan user, mohon ulangi lagi
			</div>
		</div>
<?php
	}

	if ($user_id) {
		# code...
		$show = mysql_query("SELECT * FROM user WHERE user_id = '$user_id';");

		$row = mysql_fetch_assoc($show);

		$level = $row["level"];
		$nama = $row["nama"];
		$email = $row["email"];
		$alamat = $row["alamat"];
		$no_telp = $row["no_telepon"];
		$status = $row["status"];
	}
?>

<div class="row">
	<div class="col-md-7 col-md-offset-2" id="judul-form">
		<h3 class="text-left">
			<big><span class="glyphicon glyphicon-user"></span></big> &nbsp; &nbsp; Data User
		</h3>
	</div>
</div>

<div class="row">
	<form method="POST" class="form-horizontal" action="<?php echo BASE_URL . "modul/user/action.php" ?>">
		<div class="form-group">
			<div class="col-md-7">
				<input type="hidden" name="txtUserId" class="form-control" value="<?php echo $user_id; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="txtLevel" class="col-md-2 control-label">Level</label>
				<div class="col-md-7">
					<select name="txtLevel" class="form-control">
						<option value="costumer" 
							<?php
								if ($level == "costumer") {
									# code...
									echo "selected";
								}
							?>
						>Costumer</option>
						<option value="administrator"
							<?php
								if ($level == "administrator") {
									# code...
									echo "selected";
								}
							?>
						>Admin</option>
					</select>
				</div>
		</div>
		<div class="form-group">
			<label for="txtNama" class="col-md-2 control-label">Nama</label>
				<div class="col-md-7">
					<input type="text" name="txtNama" class="form-control" value="<?php echo $nama; ?>">
				</div>
		</div>
		<div class="form-group">
			<label for="txtEmail" class="col-md-2 control-label">Email</label>
				<div class="col-md-7">
					<input type="email" name="txtEmail" class="form-control" value="<?php echo $email; ?>">
				</div>
		</div>
		<div class="form-group">
			<label for="txtAlamat" class="col-md-2 control-label">Alamat</label>
				<div class="col-md-7">
					<textarea name="txtAlamat" class="form-control"><?php echo "$alamat"; ?></textarea>
				</div>
		</div>
		<div class="form-group">
			<label for="txtNoTelepon" class="col-md-2 control-label">No. Telepon</label>
				<div class="col-md-7">
					<input type="text" name="txtNoTelepon" class="form-control" value="<?php echo $no_telp; ?>">
				</div>
		</div>
		<div class="form-group">
			<label for="txtStatus" class="col-md-2 control-label">Status</label>
				<div class="col-md-7">
					<div class="radio">
						<label>
							<input type="radio" name="txtStatus" value="on"
								<?php
									if ($status == "on") {
										# code...
										echo "checked";
									}
								?>
							> On
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="txtStatus" value="off"
								<?php
									if ($status == "off") {
										# code...
										echo "checked";
									}
								?>
							> Off
						</label>
					</div>
				</div>
		</div>
		<div class="form-group">
			<div class="btn btn-simpan-form col-md-7 col-md-offset-2">
				<button type="submit" class="btn btn-default btn-md btn-block">Simpan</button>
			</div>
		</div>
	</form>
</div>