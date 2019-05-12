<?php

	if ($user_id == false) {
		# code...
		$_SESSION["proses_pemesanan"] = true;
		header("location: " . BASE_URL . "login.html");
		exit;
	}

	$notif = isset($_GET["notif"]) ? $_GET["notif"] : false;

	if ($notif == "gagal") {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Gagal menyimpan data, mohon ulangi lagi
			</div>
		</div>
<?php
	}
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2" id="judul-form">
		<h3>
			<big><span class="glyphicon glyphicon-pushpin"></span></big> &nbsp; &nbsp; Alamat Pengiriman Barang
		</h3>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form method="POST" class="form-horizontal" action="<?php echo BASE_URL . "proses_pemesanan.php" ?>">
			<div class="form-group">
				<div class="col-md-10">
					<label for="txtPenerima" class="col-md-3 control-label">Nama Penerima</label>
						<div class="col-md-9">
							<input type="text" name="txtPenerima" class="form-control">
						</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-10">
					<label for="txtNoTelp" class="col-md-3 control-label">No. Telepon</label>
						<div class="col-md-9">
							<input type="text" name="txtNoTelp" class="form-control">
						</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-10">
					<label for="txtAlamat" class="col-md-3 control-label">Alamat</label>
						<div class="col-md-9">
							<textarea name="txtAlamat" class="form-control"></textarea>
						</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-10">
					<label for="txtKota" class="col-md-3 control-label">Kota</label>
						<div class="col-md-9">
							<select name="txtKota" class="form-control">
								<option value="NULL">-- Pilih Kota Tujuan --</option>
								<?php
									$select_kota = mysql_query("SELECT * FROM kota WHERE status = 'on' ORDER BY kota ASC;");
									while ($data_kota = mysql_fetch_assoc($select_kota)) {
										# code...
								?>
										<option value="<?php echo $data_kota['kota_id'] ?>"><?php echo $data_kota['kota'] . " (" . rupiah($data_kota['tarif']) . ")" ?></option>
								<?php
									}
								?>
							</select>
						</div>
				</div>
				<div class="form-group">
					<div class="col-md-8 col-md-offset-2">
						<button type="submit" class="btn-simpan-form btn btn-default btn-md btn-block">Lanjutkan</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<table id="tabel-keranjang" class="table table-striped">
			<tr>
				<th class="text-center">Detail Barang</th>
				<th class="text-center">Quantity</th>
				<th class="text-center">Total</th>
			</tr>
			<?php
				$subtotal = 0;
				foreach ($keranjang as $key => $value) {
					# code...
					$barang_id = $key;
					$nama_barang = $value["nama_barang"];
					$harga = $value["harga"];
					$quantity = $value["quantity"];
					$total = $quantity * $harga;
					$subtotal += $total;
			?>
					<tr>
						<td><?php echo $nama_barang ?></td>
						<td class="text-center"><?php echo $quantity ?></td>
						<td class="text-right"><?php echo rupiah($total) ?></td>
					</tr>
			<?php
				}
			?>
			<tr>
				<td colspan="2" class="text-right">Subtotal</td>
				<td class="text-right"><?php echo rupiah($subtotal); ?></td>
			</tr>

		</table>
	</div>
</div>