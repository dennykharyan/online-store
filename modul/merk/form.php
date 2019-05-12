<?php

	$error = isset($_GET["error"]) ? $_GET["error"] : false;
	$merk_id = isset($_GET["merk_id"]) ? $_GET["merk_id"] : false;

	if ($error == true) {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Gagal menyimpan merk, mohon ulangi lagi
			</div>
		</div>
<?php
	}

	$show = mysql_query("SELECT * FROM merk WHERE merk_id='$merk_id';");
	$row = mysql_fetch_assoc($show);

	$merk_id = $row['merk_id'];
	$merk = $row['merk'];
	$status = $row['status'];
	$gambar = $row['gambar'];
	$tampil_gambar = "<img src='" . BASE_URL . "img/merk/" . $gambar . "' class='img-responsive' id='img-barang'>";

?>

<div class="row">
	<div class="col-md-7 col-md-offset-2" id="judul-form">
		<h3 class="text-left">
			<big><span class="glyphicon glyphicon-tag"></span></big> &nbsp; &nbsp; Tambah Merk
		</h3>
	</div>
</div>

<div class="row">
	<form method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL . "modul/merk/action.php" ?>" class="form-horizontal">
			
			<div class="form-group">
				<div class="col-md-7">
					<input type="hidden" name="txtMerkId" class="form-control" value="<?php echo $merk_id; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="txtMerk" class="col-md-2 control-label">Merk</label>
					<div class="col-md-7">
						<input type="text" name="txtMerk" class="form-control" id="txtMerk" value="<?php echo $merk; ?>">
					</div>
			</div>
			<div class="form-group">
				<label for="txtGambar" class="col-md-2 control-label">Gambar</label>
					<div class="col-md-7">
						<input type="file" name="txtGambar" class="form-control">
							<?php echo $tampil_gambar; ?>
					</div>
			</div>
			<div class="form-group">
				<label for="txtStatus" class="col-md-2 control-label">Status</label>
					<div class="col-md-7">
						<div class="radio">
							<label>
								<input type="radio" name="txtStatus" value="on"
									<?php
										if ($row['status'] == "on") {
											# code...
											echo " checked='true'";
										}
									?>
								> On
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="txtStatus" value="off"
									<?php
										if ($row['status'] == "off") {
											# code...
											echo " checked='true'";
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