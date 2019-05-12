<?php

	$pesanan_id = $_GET["pesanan_id"];

?>

<div class="row">
	<div class="col-md-7 col-md-offset-2" id="judul-form">
		<h3 class="text-left">
			<big><span class="glyphicon glyphicon-check"></span></big> &nbsp; &nbsp; Update Status Pesanan
		</h3>
	</div>
</div>
<div class="row">
	<form method="POST" class="form-horizontal" action="<?php echo BASE_URL . "modul/pesanan/action_status.php?pesanan_id=$pesanan_id" ?>">
		<div class="form-group">
			<label for="txtPesananId" class="col-md-2 control-label">Pesanan ID</label>
				<div class="col-md-7">
					<input type="text" name="txtPesananId" class="form-control" value="<?php echo $pesanan_id ?>" readonly>
				</div>
		</div>
		<div class="form-group">
			<label for="txtStatus" class="col-md-2 control-label">Status</label>
				<div class="col-md-7">
					<select name="txtStatus" class="form-control">
						<?php
							foreach ($status_pesanan as $key => $value) {
								# code...
								$select_status_pesanan = mysql_query("SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
								$data_status_pesanan = mysql_fetch_assoc($select_status_pesanan);

								if ($data_status_pesanan["status"] == $key) {
									# code...
						?>
									<option value="<?php echo $key ?>" selected><?php echo $value ?></option>
						<?php
								}
								else{
						?>
									<option value="<?php echo $key ?>"><?php echo $value ?></option>
						<?php
								}
							}
						?>
					</select>
				</div>
		</div>
		<div class="form-group">
			<div class="btn-simpan-form col-md-7 col-md-offset-2">
				<button type="submit" class="btn btn-default btn-md btn-block">Simpan</button>
			</div>
		</div>
	</form>
</div>