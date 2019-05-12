<?php

	$barang_id = $_GET["barang_id"];

	$select_barang = mysql_query("SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
	$data_barang = mysql_fetch_assoc($select_barang);

	$kategori_id = $data_barang['kategori_id'];
	$merk_id = $data_barang['merk_id'];
	$nama_barang = $data_barang['nama_barang'];
	$spesifikasi = $data_barang['spesifikasi'];
	$gambar = $data_barang['gambar'];
	$harga = $data_barang['harga'];

?>

<div class="col-md-7">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<img id="gambar-barang" class="img-responsive" src="<?php echo BASE_URL . "img/barang/$gambar"; ?>">
			</div>
		</div>

		<ul class="nav nav-tabs">
			<li role="presentation" class="active">
				<a href="#deskripsi" data-toggle="tab">Deskripsi</a>
			</li>
			<li role="presentation">
				<a href="#ulasan" data-toggle="tab">Ulasan</a>
			</li>
		</ul>

		<div class="tab-content">
			<div id="deskripsi" class="tab-pane fade in active">
				<p><?php echo $spesifikasi; ?></p>
			</div>
			<div id="ulasan" class="tab-pane">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>
</div>

<div class="col-md-offset-1 col-md-4">
	<div class="row">
		<div id="nama-barang">
			<h2><b><?php echo $nama_barang; ?></b></h2>
		</div>
	</div>
	<div class="row">
		<?php
			$select_merk = mysql_query("SELECT * FROM merk WHERE merk_id='$merk_id';");
			$data_merk = mysql_fetch_assoc($select_merk);
		?>
		<p>Merk : <?php echo $data_merk['merk']; ?></p>
			<a href="<?php echo BASE_URL . "index.php?merk_id=$merk_id" ?>">
				<img id="gambar-merk" class="img-responsive" src="<?php echo BASE_URL . "img/merk/$data_merk[gambar]"; ?>">
			</a>
	</div>
	<div class="row detail-harga">
		<h3><?php echo rupiah($data_barang['harga']); ?></h3>
	</div>
	<div class="row tambah-barang">
		<a href="<?php echo BASE_URL . "tambah_keranjang.php?barang_id=$barang_id" ?>">
			<button type="button" class="btn btn-info btn-block">Beli Sekarang</button>
		</a>
	</div>
</div>