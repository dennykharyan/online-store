<?php

	$error = isset($_GET["error"]) ? $_GET["error"] : false;
	$kategori_id = isset($_GET["kategori_id"]) ? $_GET["kategori_id"] : false;
	$kategori = "";
	$status = "";

	if ($error == true) {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Gagal menyimpan kategori, mohon ulangi lagi
			</div>
		</div>
<?php
	}

	if ($kategori_id) {
		# code...
		$show = mysql_query("SELECT * FROM kategori WHERE kategori_id='$kategori_id';");

		$row = mysql_fetch_assoc($show);

		$kategori_id = $row['kategori_id'];
		$kategori = $row['kategori'];
		$status = $row['status'];
	}

?>

<div class="row">
	<div class="col-md-7 col-md-offset-2" id="judul-form">
		<h3 class="text-left">
			<big><span class="glyphicon glyphicon-list-alt"></span></big> &nbsp; &nbsp; Tambah Kategori
		</h3>
	</div>
</div>

<div class="row">
	<form method="POST" action="<?php echo BASE_URL . "modul/kategori/action.php" ?>" class="form-horizontal">

		<div class="form-group">
			<div class="col-md-7">
				<input type="hidden" name="txtKategoriId" class="form-control" value="<?php echo $kategori_id; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="txtKategori" class="col-md-2 control-label">Kategori</label>
				<div class="col-md-7">
					<input type="text" name="txtKategori" class="form-control" id="txtKategori" value="<?php echo $kategori; ?>">
				</div>
		</div>
		<div class="form-group">
			<label for="status" class="col-md-2 control-label">Status</label>
				<div class="col-md-7">
					<div class="radio">
						<label>
							<input type="radio" name="status" value="on"
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
							<input type="radio" name="status" value="off" 
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