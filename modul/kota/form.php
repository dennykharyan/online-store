<?php

	$error = isset($_GET["error"]) ? $_GET["error"] : false;
	$kota_id = isset($_GET["kota_id"]) ? $_GET["kota_id"] : false;
	$kota = "";
	$tarif = "";
	$status = "";

	if ($error == true) {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Gagal menyimpan kota, mohon ulangi lagi
			</div>
		</div>
<?php
	}

	if ($kota_id) {
		# code...
		$show = mysql_query("SELECT * FROM kota WHERE kota_id = '$kota_id';");

		$row = mysql_fetch_assoc($show);

		$kota_id = $row["kota_id"];
		$kota = $row["kota"];
		$tarif = $row["tarif"];
		$status = $row["status"];
	}

?>

<div class="row">
	<div class="col-md-7 col-md-offset-2" id="judul-form">
		<h3 class="text-left">
			<big><span class="glyphicon glyphicon-map-marker"></span></big> &nbsp; &nbsp; Data Kota
		</h3>
	</div>
</div>

<div class="row">
	<form method="POST" action="<?php echo BASE_URL . "modul/kota/action.php" ?>" class="form-horizontal">
		<div class="form-group">
			<div class="col-md-7">
				<input type="hidden" name="txtKotaId" class="form-control" value="<?php echo $kota_id; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="txtKota" class="col-md-2 control-label">Nama Kota</label>
				<div class="col-md-7">
					<input type="text" name="txtKota" class="form-control" value="<?php echo $kota; ?>">
				</div>
		</div>
		<div class="form-group">
			<label for="txtTarif" class="col-md-2 control-label">Tarif</label>
				<div class="col-md-7">
					<input type="text" name="txtTarif" class="form-control" value="<?php echo $tarif; ?>">
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
										echo " checked";
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
			<div class="btn-simpan-form col-md-7 col-md-offset-2">
				<button type="submit" class="btn btn-default btn-md btn-block">Simpan</button>
			</div>
		</div>
	</form>
</div>