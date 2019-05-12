<?php

	if ($user_id) {
		# code...
		$modul = isset($_GET['modul']) ? $_GET['modul'] : false;
		$action = isset($_GET['action']) ? $_GET['action'] : false;
		$mode = isset($_GET['mode']) ? $_GET['mode'] : false;
	}
	else{
		header("location: " . BASE_URL . "login.html");
	}

	admin_only($level, $modul);

?>

<div class="container-fluid">
	<div class="col-md-3">
		<div class="row">
			<div id="menu-profile">
				<ul class="nav nav-tabs nav-stacked">
					<?php
						if ($level == "administrator") {
							# code...
					?>
							<li
								<?php
									if ($modul == "kategori") {
										# code...
										echo "class='active'";
									}
								?>
							>
								<a href="<?php echo BASE_URL . "index.php?page=profile&modul=kategori&action=list"; ?>">
									Kategori
								</a>
							</li>
							<li
								<?php
									if ($modul == "barang") {
										# code...
										echo "class='active'";
									}
								?>
							>
								<a href="<?php echo BASE_URL . "index.php?page=profile&modul=barang&action=list"; ?>">
									Barang
								</a>
							</li>
							<li
								<?php
									if ($modul == "merk") {
										# code...
										echo "class='active'";
									}
								?>
							>
								<a href="<?php echo BASE_URL. "index.php?page=profile&modul=merk&action=list"; ?>">
									Merk
								</a>
							</li>
							<li
								<?php
									if ($modul == "kota") {
										# code...
										echo "class='active'";
									}
								?>
							>
								<a href="<?php echo BASE_URL . "index.php?page=profile&modul=kota&action=list"; ?>">
									Kota
								</a>
							</li>
							<li
								<?php
									if ($modul == "user") {
										# code...
										echo "class='active'";
									}
								?>
							>
								<a href="<?php echo BASE_URL . "index.php?page=profile&modul=user&action=list"; ?>">
									User
								</a>
							</li>
							<li
								<?php
									if ($modul == "banner") {
										# code...
										echo "class='active'";
									}
								?>
							>
								<a href="<?php echo BASE_URL . "index.php?page=profile&modul=banner&action=list"; ?>">
									Banner
								</a>
							</li>
					<?php
						}
					?>
					<li
						<?php
							if ($modul == "pesanan") {
								# code...
								echo "class='active'";
							}
						?>
					>
						<a href="<?php echo BASE_URL . "index.php?page=profile&modul=pesanan&action=list"; ?>">
							Pesanan
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<?php

			$filename = "modul/$modul/$action.php";
			if (file_exists($filename)) {
				# code...
				include ($filename);
			}
			else{
		?>
				<div class="row">
					<div class="notif alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<span class="glyphicon glyphicon-exclamation-sign"></span> Maaf, halaman yang Anda tuju tidak dapat diakses
					</div>
				</div>
		<?php
			}
		?>
		</div>
	</div>
</div>