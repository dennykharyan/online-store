<div class="row">
	<a href="
	<?php
		echo BASE_URL . "index.php?page=profile&modul=kota&action=form";
	?>">
		<button type="button" class="btn btn-default btn-tambah">
			<span class="glyphicon glyphicon-plus"></span> Tambah Kota
		</button>
	</a>
</div>

<?php

	$show = mysql_query("SELECT * FROM kota ORDER BY kota ASC");
	if (mysql_num_rows($show) == 0) {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Belum ada kota yang dapat ditampilkan
			</div>
		</div>
<?php
	}
	else{
?>
		<div class="row">
			<table class="table table-bordered table-striped table-hover text-center" id="table-modul">
				<tr>
					<th>No.</th>
					<th>Nama Kota</th>
					<th>Tarif</th>
					<th>Status</th>
					<th colspan="2"></th>
				</tr>
<?php
		$no = 1;
		while ($row = mysql_fetch_assoc($show)) {
			# code...
?>
				<tr>
					<td><?php echo $no; ?></td>
					<td class="nama"><?php echo $row['kota']; ?></td>
					<td><?php echo rupiah($row['tarif']); ?></td>
					<td><?php echo $row['status']; ?></td>
					<td>
						<a href="
						<?php
							echo BASE_URL . "index.php?page=profile&modul=kota&action=form&kota_id=" . "$row[kota_id]"
						?>">
							<button type="button" class="btn btn-warning">Edit</button>
						</a>
					</td>
				</tr>
<?php
			$no++;
		}
	}

?>
			</table>
		</div>