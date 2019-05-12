<?php

	include 'main_kiri.php';

?>

<div class="col-md-9">
	
	<?php include 'banner.php'; ?>

	<div class="row">
		<div id="main-kanan">
			<?php

				$halaman = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
				$limit = 18;
				$start = ($halaman-1) * $limit;

				if ($kategori_id) {
					# code...
					$barang = mysql_query("SELECT * FROM barang WHERE status = 'on' AND kategori_id='$kategori_id' ORDER BY barang_id;");
					$kriteria = "WHERE status = 'on' AND kategori_id='$kategori_id' ORDER BY barang_id";
				}
				elseif ($merk_id) {
					# code...
					$barang = mysql_query("SELECT * FROM barang WHERE status = 'on' AND merk_id='$merk_id' ORDER BY barang_id;");
					$kriteria = "WHERE status = 'on' AND merk_id='$merk_id' ORDER BY barang_id";
				}
				else{
					$barang = mysql_query("SELECT * FROM barang WHERE status = 'on' ORDER BY barang_id LIMIT $start, $limit;");
					$kriteria = "";
				}

				while ($row_barang = mysql_fetch_assoc($barang)) {
					# code...
			?>
					<div class="col-md-4">
						<div class="item-barang">
							<div class="panel panel-default">
								<div class="panel-body">
									<a href="<?php echo BASE_URL . "index.php?page=detail&barang_id=$row_barang[barang_id]" ?>">
										<div class="img-barang text-center">
											<img class="" src="<?php echo BASE_URL . "img/barang/$row_barang[gambar]" ?>">
										</div>
										<div class="nama-barang">
											<p><?php echo $row_barang["nama_barang"]; ?></p>
										</div>
									</a>
									<div class="harga-barang">
										<p class="harga-barang"><?php echo rupiah($row_barang["harga"]); ?></p>
									</div>
								</div>
								<div class="panel-footer">
									<a href="<?php echo BASE_URL . "tambah_keranjang.php?barang_id=$row_barang[barang_id]" ?>">
										<button class="btn btn-default btn-tambah-keranjang">
											+<span class="glyphicon glyphicon-shopping-cart"></span>
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
			<?php
				}
			?>
		</div>
	</div>

	<div class="row" id="pagination">
		<?php

			$hitung_halaman = mysql_query("SELECT * FROM barang $kriteria");
			$data_halaman = mysql_num_rows($hitung_halaman);
			$total_halaman = ceil($data_halaman/$limit);

			for ($i=1; $i <= $total_halaman ; $i++) { 
				# code...
				if ($halaman == $i) {
					# code...
		?>
					<ul class="pagination">
						<li class="active">
							<a href="<?php echo BASE_URL . "index.php?halaman=$i" ?>">
								<?php echo $i; ?>
							</a>
						</li>
					</ul>
		<?php
				}
				else{
		?>
					<ul class="pagination">
						<li>
							<a href="<?php echo BASE_URL . "index.php?halaman=$i" ?>">
								<?php echo $i; ?>
							</a>
						</li>
					</ul>	<ul class="pagination"></ul>
		<?php
				}
			}
		?>
	</div>
</div>