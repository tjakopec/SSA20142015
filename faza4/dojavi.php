<?php
include_once 'konfiguracija.php';
 ?>
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
				<h1 class="naslov">DOJAVA</h1>
				<form>
					<fieldset>
						<legend>Popunite tražene podatke</legend>
						<div class="row">
							<div class="large-6 columns">
								<input type="radio" name="vrsta" value="izgubljen" id="izgubljen" />
								<label for="izgubljen">Izgubljen</label>
							</div>
							<div class="large-6 columns">
								<input type="radio" name="vrsta" value="pronaden" id="pronaden" />
								<label for="pronaden">Pronađen</label>
							</div>
						</div>
						<label for="slika">Slika</label>
						<input type="file" name="slika" id="slika" />
						<label for="poruka">Poruka</label>
						<textarea placeholder="Unesite tekst dojave ovdje" cols="50" rows="20"></textarea>
						<input type="submit" value="Pošalji" class="button" />
					</fieldset>
				</form>
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
