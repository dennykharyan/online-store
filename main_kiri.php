<div class="col-md-3 hidden-xs">
	<div class="row">
		<div id="main-kiri">
			<div id="menu-profile">
				<ul class="nav nav-tabs nav-stacked">
					<?php
						$kategori = mysql_query("SELECT * FROM kategori WHERE status='on';");

						while ($row = mysql_fetch_assoc($kategori)) {
							# code...
					?>
							<li>
								<a href="<?php echo BASE_URL . "index.php?kategori_id=$row[kategori_id]" ?>">
									<?php
										echo $row["kategori"];
									?>
								</a>
							</li>
					<?php
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>