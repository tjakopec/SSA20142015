<?php
include_once '../konfiguracija.php';
if (!isset($_SESSION[$ida . "autoriziran"])) {
	header("location: ../index.php");
}
?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<?php
		include_once '../head.php';
		?>
		<title><?php echo $naslovAPP; ?>
			ADMINISTRACIJA</title>
	</head>
	<body>
		<?php
		include_once 'izbornik.php';
		?>

		<div class="row">
			<div class="large-12">
				ovdje će doći neki zgodan graf
			</div>
		</div>
		<?php
		include_once 'skripte.php';
		?>
	</body>
</html>
