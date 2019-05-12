<?php

	$pesanan_id = $_GET["pesanan_id"];

?>

<div class="row">
	<div class="col-md-7 col-md-offset-2" id="judul-form">
		<h3 class="text-center">Konfirmasi Pembayaran</h3>
	</div>
</div>

<div class="row">
	<form method="POST" class="form-horizontal" action="<?php echo BASE_URL . "modul/pesanan/action.php" ?>">
		<div class="form-group">
			<input type="hidden" name="txtPesananId" class="form-control" value="<?php echo $pesanan_id; ?>">
		</div>
		<div class="form-group">
			<label for="txtNoRekening" class="col-md-2 control-label">No. Rekening</label>
				<div class="col-md-7">
					<input type="text" name="txtNoRekening" class="form-control">
				</div>
		</div>
		<div class="form-group">
			<label for="txtNamaAkun" class="col-md-2 control-label">Nama Account</label>
				<div class="col-md-7">
					<input type="text" name="txtNamaAkun" class="form-control">
				</div>
		</div>
		<div class="form-group">
			<label for="txtTanggal" class="col-md-2 control-label">Tanggal Transfer (YYYY-MM-DD)</label>
				<div class="col-md-7">
					<input type="text" name="txtTanggal" class="form-control">
				</div>
		</div>
		<div class="form-group">
			<div class="col-md-7 col-md-offset-2">
				<button type="submit" class="btn btn-simpan-form btn-block btn-default">Konfirmasi</button>
			</div>
		</div>
	</form>
</div>