<?php

	if ($user_id) {
		# code...
		header("location:" . BASE_URL . "index.php");
	}

?>


<div class="container" id="form-login">
	<div class="col-md-4">
		<?php

			$notif = isset($_GET["notif"]) ? $_GET["notif"] : false;

			if ($notif == true) {
				# code...
		?>
				<div class="notif alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<span class="glyphicon glyphicon-exclamation-sign"></span> Email atau Password yang Anda masukan salah
				</div>
		<?php
			}

		?>
		<form method="POST" action="<?php echo BASE_URL . 'proses_login.php' ?>" class="form-horizontal">
			<legend><span class="glyphicon glyphicon-user"></span> Login</legend>
				<div class="form-group">
					<div class="col-md-12">
						<input type="text" name="txtEmail" class="form-control" id="txtEmail" placeholder="email">
						<input type="password" name="txtPassword" class="form-control" id="txtPassword" placeholder="password">
					</div>
				</div>
				<div class="form-group" id="button-action">
					<div class="col-md-12">
						<button type="submit" class="btn btn-block btn-default">Login</button>
					</div>
				</div>
		</form>
	</div>
</div>