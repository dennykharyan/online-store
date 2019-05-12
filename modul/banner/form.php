<?php

	$error = isset($_GET["error"]) ? $_GET["error"] : false;
	$banner_id = isset($_GET["banner_id"]) ? $_GET["banner_id"] : false;
	
	if ($error == true) {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Gagal menyimpan banner. mohon ulangi lagi
			</div>
		</div>
<?php
	}

	$show = mysql_query("SELECT * FROM banner WHERE banner_id = '$banner_id';");
	$row = mysql_fetch_assoc($show);

	$barang_id = $row["barang_id"];
	$gambar = $row["gambar"];
	$tampil_gambar = "<img src='" . BASE_URL ."img/banner/" . $gambar . "' class='img-responsive' id='img-barang'>";
	$link = $row["link"];
	$status = $row["status"];

?>

<div class="row">
	<div class="col-md-7 col-md-offset-2" id="judul-form">
		<h3 class="text-left">
			<big><span class="glyphicon glyphicon-picture"></span></big> &nbsp; &nbsp; Data Banner
		</h3>
	</div>
</div>

<div class="row">
	<form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo BASE_URL . "modul/banner/action.php" ?>">
		
		<div class="form-group">
			<div class="col-md-7">
				<input type="hidden" name="txtBannerId" class="form-control" value="<?php echo $banner_id; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="txtBarang" class="col-md-2 control-label">Nama Banner</label>
				<div class="col-md-7">
					<select name="txtBarang" class="form-control">
						<option value="NULL">-- NAMA BARANG --</option>
						<?php
							$barang = mysql_query("SELECT barang_id, nama_barang FROM barang WHERE status = 'on' ORDER BY barang_id ASC;");

							while ($hasil = mysql_fetch_assoc($barang)) {
								# code...
								if ($hasil["barang_id"] == $barang_id) {
									# code...
									echo "<option value='$hasil[barang_id]' selected>$hasil[nama_barang]</option>";
								}
								else{
									echo "<option value='$hasil[barang_id]'>$hasil[nama_barang]</option>";
								}
							}
						?>
					</select>
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
			<div class="btn-simpan-form col-md-7 col-md-offset-2">
				<button type="submit" class="btn btn-default btn-md btn-block">Simpan</button>
			</div>
		</div>


	</form>
</div>