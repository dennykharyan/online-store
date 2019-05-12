<div class="row" id="banner">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<?php

		$show_banner = mysql_query("SELECT * FROM banner WHERE status = 'on';");
			
		$count = mysql_num_rows($show_banner);
	?>
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<?php
				for ($i=1; $i <= $count ; $i++) { 
					# code...
			?>
					<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>"></li>
			<?php
				}
			?>
		</ol>
		<div class="carousel-inner" role="listbox">
			<?php
				$counter = 0;

				while ($data_banner = mysql_fetch_assoc($show_banner)) {
					# code...
					if ($counter == 0) {
						# code...
			?>
						<div class="item active">
							<a href="<?php echo $data_banner['link']; ?>">
								<img src="<?php echo BASE_URL . "img/banner/$data_banner[gambar]" ?>" alt="<?php echo $data_banner['gambar'] ?>">
									<div class="carousel-caption">
										<h1>
											<b>
									<?php
										$show_caption = mysql_query("SELECT * FROM barang WHERE barang_id = '$data_banner[barang_id]' ");
										while ($data_caption = mysql_fetch_assoc($show_caption)) {
											# code...
											echo strtoupper($data_caption['nama_barang']);
										}
									?>
											</b>
										</h1>
									</div>
							</a>
						</div>
			<?php
					}
					else{
			?>
					<div class="item">
						<a href="<?php echo $data_banner['link']; ?>">
							<img src="<?php echo BASE_URL . "img/banner/$data_banner[gambar]"; ?>" alt="<?php echo $data_banner['gambar']; ?>">
								<div class="carousel-caption">
									<h1>
										<b>
											<?php
												$show_caption = mysql_query("SELECT * FROM barang WHERE barang_id = '$data_banner[barang_id]' ");
												while ($data_caption = mysql_fetch_assoc($show_caption)) {
													# code...
													echo strtoupper($data_caption['nama_barang']);
												}
											?>
										</b>
									</h1>
								</div>
						</a>
					</div>
			<?php
					}

					$counter++;
				}
			?>
		</div>
		<a href="#carousel-example-generic" class="left carousel-control" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a href="#carousel-example-generic" class="right carousel-control" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<hr>
</div>