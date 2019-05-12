<div class="row">
	<a href="<?php echo BASE_URL . "index.php?page=profile&modul=kategori&action=form"; ?>">
		<button type="button" class="btn btn-default btn-tambah"><span class="glyphicon glyphicon-plus"></span> Tambah Kategori</button>
	</a>
</div>

<?php

	$show = mysql_query("SELECT * FROM kategori ORDER BY kategori ASC");

	if (mysql_num_rows($show) == 0) {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Belum ada kategori yang dapat ditampilkan
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
					<th>Kategori</th>
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
					<td class="nama"><?php echo $row['kategori']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td>
						<a href="
						<?php
							echo BASE_URL . "index.php?page=profile&modul=kategori&action=form&kategori_id=" . "$row[kategori_id]"
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