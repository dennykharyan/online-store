<?php

	$error = isset($_GET["error"]) ? $_GET["error"] : false;
	$barang_id = isset($_GET["barang_id"]) ? $_GET["barang_id"] : false;

	if ($error == true) {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Gagal menyimpan barang, mohon ulangi lagi
			</div>
		</div>
<?php
	}

	$select_barang = mysql_query("SELECT * FROM barang WHERE barang_id = '$barang_id';");
	$data_barang = mysql_fetch_assoc($select_barang);

	$kategori_id = $data_barang['kategori_id'];
	$merk_id = $data_barang['merk_id'];
	$nama_barang = $data_barang['nama_barang'];
	$spesifikasi = $data_barang['spesifikasi'];
	$gambar = $data_barang['gambar'];
	$harga = $data_barang['harga'];
	$stok = $data_barang['stok'];
	$status = $data_barang['status'];

	$tampil_gambar = "<img src='" . BASE_URL . "img/barang/" . $gambar . "' class='img-responsive' id='img-barang' alt='Tambahkan gambar barang'>";


	/* SHOW * FROM table barang JOIN table kategori */
	$show_selected_data = mysql_query("SELECT * FROM barang JOIN kategori ON barang.kategori_id = kategori.kategori_id JOIN merk ON barang.merk_id = merk.merk_id WHERE barang_id = '$barang_id';");
	
?>

<script type="text/javascript" src="<?php echo BASE_URL . 'js/ckeditor/ckeditor.js' ?>"></script>

<div class="row">
	<div class="col-md-7 col-md-offset-2" id="judul-form">
		<h3 class="text-left">
			<big><span class="glyphicon glyphicon-th-large"></span></big> &nbsp; &nbsp; Data Barang
		</h3>
	</div>
</div>

<div class="row">
	<form method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL . "modul/barang/action.php" ?>" class="form-horizontal">
		
		<div class="form-group">
			<div class="col-md-7">
				<input type="hidden" name="txtBarangId" class="form-control" value="<?php echo $barang_id; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="txtKategoriId" class="col-md-2 control-label">Kategori</label>
				<div class="col-md-7">
					<select name="txtKategoriId" class="form-control">
						<option value="NULL">-- Pilih Kategori Barang --</option>
						<?php
							$show_kategori = mysql_query("SELECT * FROM kategori WHERE status = 'on' ORDER BY kategori ASC;");
							while ($data_kategori = mysql_fetch_assoc($show_kategori)) {
								# code...
								if ($data_kategori['kategori_id'] == $kategori_id) {
									# code...
									echo "<option value='$data_kategori[kategori_id]' selected>$data_kategori[kategori]</option>";
								}else{
									echo "<option value='$data_kategori[kategori_id]'>$data_kategori[kategori]</option>";
								}
							}

						?>
					</select>
				</div>
		</div>
		<div class="form-group">
			<label for="txtMerk" class="col-md-2 control-label">Merk</label>
				<div class="col-md-7">
					<select name="txtMerk" class="form-control">
						<option value="NULL">-- Pilih Merk Barang --</option>
						<?php
							$show_merk = mysql_query("SELECT * FROM merk WHERE status = 'on' ORDER BY merk ASC;");
							while ($data_merk = mysql_fetch_assoc($show_merk)) {
								# code...
								if ($data_merk['merk_id'] == $merk_id) {
									# code...
									echo "<option value='$data_merk[merk_id]' selected>$data_merk[merk]</option>";
								}else{
									echo "<option value='$data_merk[merk_id]'>$data_merk[merk]</option>";
								}
							}
						?>
					</select>
				</div>
		</div>
		<div class="form-group">
			<label for="txtNamaBarang" class="col-md-2 control-label">Nama Barang</label>
				<div class="col-md-7">
					<input type="text" name="txtNamaBarang" class="form-control" value="<?php echo $nama_barang; ?>">
				</div>
		</div>
		<div class="form-group">
			<label for="txtSpesifikasi" class="col-md-2 control-label">Spesifikasi</label>
				<div class="col-md-7">
					<textarea name="txtSpesifikasi" class="form-control" rows="8" id="txtSpesifikasi"><?php echo $spesifikasi; ?></textarea>
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
			<label for="txtHarga" class="col-md-2 control-label">Harga</label>
				<div class="col-md-7">
					<input type="text" name="txtHarga" class="form-control" value="<?php echo $harga; ?>">
				</div>
		</div>
		<div class="form-group">
			<label for="txtStock" class="col-md-2 control-label">Stock</label>
				<div class="col-md-7">
					<input type="text" name="txtStock" class="form-control" value="<?php echo $stok; ?>">
				</div>
		</div>
		<div class="form-group">
			<label for="txtStatus" class="col-md-2 control-label">Status</label>
				<div class="col-md-7">
					<div class="radio">
						<label>
							<input type="radio" name="txtStatus" value="on"
								<?php
									if ($data_barang["status"] == "on") {
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
									if ($data_barang["status"] == "off") {
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
			<div class="btn-simpan-form col-md-7 col-md-offset-2">
				<button type="submit" class="btn btn-default btn-md btn-block">Simpan</button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	CKEDITOR.replace("txtSpesifikasi");
</script>