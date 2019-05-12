<?php

	$pesanan_id = $_GET["pesanan_id"];

	$select_pesanan = mysql_query("SELECT pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama, kota.kota, kota.tarif FROM pesanan JOIN user ON pesanan.user_id = user.user_id JOIN kota ON kota.kota_id = pesanan.kota_id WHERE pesanan_id='$pesanan_id'");
	$data_pesanan = mysql_fetch_assoc($select_pesanan);
	$nama_pemesan = $data_pesanan["nama"];
	$nama_penerima = $data_pesanan["nama_penerima"];
	$alamat = $data_pesanan["alamat"];
	$nomor_telepon = $data_pesanan["nomor_telepon"];
	$tanggal_pemesanan = $data_pesanan["tanggal_pemesanan"];

	$no = 1;
	$subtotal = 0;

?>

<div class="row">
	<div class="col-md-7 col-md-offset-2" id="judul-form">
		<h3 class="text-center">Detail Pesanan</h3>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="col-md-5">
			<p>Nomor Faktur</p>
			<p>Nama Pemesan</p>
			<p>Nama Penerima</p>
			<p>Alamat</p>
			<p>No. Telepon</p>
			<p>Tanggal Pemesanan</p>
		</div>
		<div class="col-md-1">
			<p>:</p>
			<p>:</p>
			<p>:</p>
			<p>:</p>
			<p>:</p>
			<p>:</p>
		</div>
		<div class="col-md-6">
			<p><?php echo $pesanan_id; ?></p>
			<p><?php echo $nama_pemesan; ?></p>
			<p><?php echo $nama_penerima; ?></p>
			<p><?php echo $alamat; ?></p>
			<p><?php echo $nomor_telepon; ?></p>
			<p><?php echo $tanggal_pemesanan; ?></p>
		</div>
	</div>
</div>

<?php

	$select_barang = mysql_query("SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id = barang.barang_id WHERE pesanan_detail.pesanan_id = '$pesanan_id'");

?>

<div class="row">
	<table class="table table-striped">
		<tr>
			<th class="text-center">No.</th>
			<th class="text-center">Nama Barang</th>
			<th class="text-center">Quantity</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Total</th>
		</tr>
		<?php
			while ($data_barang = mysql_fetch_assoc($select_barang)) {
				# code...
				$total = $data_barang["harga"] * $data_barang["quantity"];
		?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo $data_barang["nama_barang"]; ?></td>
					<td class="text-center"><?php echo $data_barang["quantity"]; ?></td>
					<td class="text-right"><?php echo rupiah($data_barang["harga"]); ?></td>
					<td class="text-right"><?php echo rupiah($total); ?></td>
				</tr>
		<?php
				$no++;
				$subtotal += $total;
			}
		?>
		<tr>
			<td colspan="4" class="text-right">Biaya Pengiriman</td>
			<td class="text-right"><?php echo rupiah($data_pesanan["tarif"]); ?></td>
		</tr>
		<tr>
			<td colspan="4" class="text-right">Subtotal</td>
			<td class="text-right"><?php echo rupiah($subtotal + $data_pesanan["tarif"]); ?></td>
		</tr>
	</table>
</div>

<div class="row">
	<div class="col-md-6">
		<p>Silahkan lakukan pembayaran melalui bank BCA</p>
		<p>No. Rek : 6050123456</p>
		<p>
			Setelah melakukan pembayaran silahkan konfirmasi pembayaran Anda <a href="<?php echo BASE_URL . "index.php?page=profile&modul=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id" ?>">disini</a>
		</p>
	</div>
</div>