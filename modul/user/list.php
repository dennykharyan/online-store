<?php

	$show = mysql_query("SELECT * FROM user ORDER BY nama ASC");
	if (mysql_num_rows($show) == 0) {
		# code...
?>
		<div class="row">
			<div class="notif alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Belum ada user yang dapat ditampilkan
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
					<th>Nama</th>
					<th>Email</th>
					<th>No. Telepon</th>
					<th>Level</th>
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
					<td class="nama"><?php echo $row['nama']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['no_telepon']; ?></td>
					<td><?php echo $row['level']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td>
						<a href="
						<?php
							echo BASE_URL . "index.php?page=profile&modul=user&action=form&user_id=" . "$row[user_id]"
						?>
						">
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