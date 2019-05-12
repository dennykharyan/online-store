<?php

	session_start();

	require 'function/koneksi.php';
	include 'function/helper.php';

	$page = isset($_GET['page']) ? $_GET['page'] : false;

	/* for logged user only */
	$user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : false;
	$nama = isset($_SESSION["nama"]) ? $_SESSION["nama"] : false;
	$level = isset($_SESSION["level"]) ? $_SESSION["level"] : false;

	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
	$merk_id = isset($_GET['merk_id']) ? $_GET['merk_id'] : false;

	$keranjang = isset($_SESSION["keranjang"]) ? $_SESSION["keranjang"] : array();
	$total_barang = count($keranjang);

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>SPEEDHUNTERS-STORE | Apparel Shop</title>
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<nav class="navbar navbar-default" id="navigasi">
	<div class="container-fluid">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<a class="navbar-brand" href="<?php echo BASE_URL ?>">
						<img src="<?php echo BASE_URL . 'img/logo-dont-3.png' ?>" id="img-logo" class="img-responsive">
					</a>
			</div>

			<div id="user">
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<?php

							if ($user_id) {
								# code...
						?>
								<li>
									<a href="<?php echo BASE_URL . 'index.php?page=profile&modul=pesanan&action=list'; ?>"><span class="glyphicon glyphicon-user"></span> <?php echo $nama; ?></a>
								</li>
								<li>
									<a href="<?php echo BASE_URL . 'logout.php' ?>">Logout</a>
								</li>
						<?php
							}
							else{
						?>
								<li>
									<a href="<?php echo BASE_URL . 'login.html'; ?>">Login</a>
								</li>
								<li>
									<a href="<?php echo BASE_URL . 'register.html'; ?>">Register</a>
								</li>
						
						<?php
							}

						?>
						<li>
							<a href="<?php echo BASE_URL . 'keranjang.html'; ?>">
								<?php
									if ($total_barang) {
										# code...
								?>
										<span class="glyphicon glyphicon-shopping-cart"></span><?php echo $total_barang; ?>
								<?php
									}
									else{
								?>
										<span class="glyphicon glyphicon-shopping-cart"></span>
								<?php
									}
								?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>

<div class="container">
	<div class="konten">
		<?php

			$filename = "$page.php";

			if (file_exists($filename)) {
				# code...
				include "$filename";
			}
			else{
				include 'main.php';
			}

		?>
	</div>
</div>

<div class="container-fluid" id="footer">
	<div class="container">
		<p class="text-center">
			<a href="<?php echo BASE_URL; ?>">SPEEDHUNTERS</a> | copyright&copy; <?php echo date('Y'); ?></p>
	</div>
</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(".update-quantity").on("input", function(e) {
			// body...
			var barang_id = $(this).attr("name");
			var value = $(this).val();

			$.ajax({
				method: "POST",
				url: "update_keranjang.php",
				data: "barang_id=" + barang_id + "&value=" + value
			})
			.done(function(data) {
				// body...
				location.reload();
			});
		});
		</script>
</body>
</html>