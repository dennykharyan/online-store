<?php
	
	if ($level == "administrator") {
		# code...
		$select_pesanan = mysql_query("SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id = user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");
	}
	else{
		$select_pesanan = mysql_query("SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id = user.user_id WHERE pesanan.user_id = '$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");
	}

	if (mysql_num_rows($select_pesanan) == 0) {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Maaf, belum ada pesanan yang dapat ditampilkan
			</div>
		</div>
<?php
	}
	else{
?>
		<div class="row">
			<table class="table table-bordered table-striped table-hover" id="table-modul">
				<tr>
					<th class="text-center">No. Pemesanan</th>
					<th class="text-center">Status</th>
					<th class="text-center">Nama</th>
					<th colspan="2"></th>
				</tr>
				<?php
					while ($data_pesanan = mysql_fetch_assoc($select_pesanan)) {
						# code...
				?>
						<tr>
							<td class="text-center"><?php echo $data_pesanan["pesanan_id"] ?></td>
							<td class="text-center"><?php echo $status_pesanan[$data_pesanan["status"]] ?></td>
							<td class="text-center"><?php echo $data_pesanan["nama"] ?></td>
							<td class="text-center">
								<a href="<?php echo BASE_URL . "index.php?page=profile&modul=pesanan&action=detail&pesanan_id=$data_pesanan[pesanan_id]" ?>">
									<button type="button" class="btn btn-info">Detail Pesanan</button>
								</a>
								<?php
									if ($level == "administrator") {
										# code...
								?>
										<a href="<?php echo BASE_URL . "index.php?page=profile&modul=pesanan&action=status&pesanan_id=$data_pesanan[pesanan_id]" ?>">
											<button type="button" class="btn btn-default">Update Status</button>
										</a>
								<?php
									}
								?>
							</td>
						</tr>
				<?php
					}
				?>
			</table>
		</div>
<?php
	}

?>