<?php

	if ($total_barang == 0) {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Belum ada barang yang dapat ditampilkan
			</div>
		</div>
<?php
	}
	else{
		$no = 1;

?>
		<table id="tabel-keranjang" class="table table-striped">
			<tr>
				<th class="text-center">No.</th>
				<th colspan="2" class="text-center">Detail Barang</th>
				<th class="text-center">Quantity</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Total</th>
			</tr>
<?php
		$subtotal = 0;
		foreach ($keranjang as $key => $value) {
			# code...
			$barang_id = $key;
			$gambar = $value["gambar"];
			$nama_barang = $value["nama_barang"];
			$quantity = $value["quantity"];
			$harga = $value["harga"];
			$total = $quantity * $harga;
			$subtotal += $total;
?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><img class="img-responsive keranjang-img" src="<?php echo BASE_URL . "img/barang/$gambar"; ?>"></td>
				<td><?php echo $nama_barang; ?></td>
				<td><input type="text" name="<?php echo $barang_id ?>" value="<?php echo $quantity ?>" class="form-control update-quantity"></td>
				<td class="text-right"><?php echo rupiah($harga); ?></td>
				<td class="text-right"><?php echo rupiah($total); ?></td>
				<td>
					<a href="<?php echo BASE_URL . "hapus_keranjang.php?barang_id=$barang_id"; ?>">
						<button type="button" class="close">&times;</button>
					</a>
				</td>
			</tr>
<?php
			$no++;
		}
?>
			<tr>
				<td colspan="5" class="text-right">Subtotal</td>
				<td class="text-right"><?php echo rupiah($subtotal); ?></td>
			</tr>
		</table>
<?php
	}

?>
		<div class="row" id="btn-pemesanan">
			<div class="col-md-2">
				<a href="<?php echo BASE_URL ?>">
					<button type="button" class="btn btn-default">Lanjut Belanja</button>
				</a>
			</div>
			<?php
				if ($total_barang != 0) {
					# code...
			?>
					<div class="col-md-2 col-md-offset-8">
						<a href="<?php echo BASE_URL . "data_pemesanan.html" ?>">
							<button type="button" class="btn btn-default">Lanjutkan Pemesanan</button>
						</a>
					</div>
			<?php
				}
			?>
		</div>