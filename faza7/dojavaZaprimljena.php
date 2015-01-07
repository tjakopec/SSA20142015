<?php include_once 'konfiguracija.php'; ?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<?php
		include_once 'head.php';
		?>
		<title><?php echo $naslovAPP; ?></title>
	</head>
	<body>
		<?php
		include_once 'zaglavlje.php';
		?>
		<hr class="cisto" />
		<div class="row">
			<div class="large-8 columns large-push-2">
				<h2>Vaša dojava je zaprimljena</h2>
				Dojava će biti vidljiva na Azilu nakon što ju administrator odobri
			</div>
			<div class="large-2 columns large-pull-8">
				<?php
				include_once 'lijevo.php';
				?>
			</div>
			<div class="large-2 columns">
				<?php
				include_once 'desno.php';
				?>
			</div>
		</div>
		<?php
			include_once 'skripte.php';
		?>
	</body>
</html>
