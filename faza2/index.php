<!doctype html>
<html class="no-js" lang="en">
	<head>
		<?php
		include_once 'head.php';
		?>
		<title>Azil</title>
	</head>
	<body>
		<?php
		include_once 'zaglavlje.php';
		?>
		<hr class="cisto" />
		<div class="row">
			<div class="large-8 columns large-push-2">
				<?php
				include_once 'galerijaSlika.php';
				?>
				<?php
					include_once 'obavijesti.php';
				?>
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
