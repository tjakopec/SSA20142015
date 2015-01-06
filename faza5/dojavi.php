<?php
include_once 'konfiguracija.php';
//OVO JE PRIMJER SVE U JEDNOJ DATOTECI
$poruke=array();
//nije post preskoči, princip Short-Circuit
if(!$_POST){
	//iako nepopularna, naredba goto nije loša, samo su je ljudi loše koristili
	goto ostalo;
}


//nije označena vrsta preskoči
if(!isset($_POST["vrsta"])){
	array_push($poruke, "Obavezno odabir Izgubljen/Pronađen");
	goto ostalo;
}
//nije unesena poruka preskoči
if(strlen(trim($_POST["poruka"]))==0){
	array_push($poruke,"Obavezno Poruka");
	goto ostalo;
}
//za debug
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//sve je kako treba, radim insert u bazu
$izraz = $veza->prepare("insert into neobradene_dojave (vrsta,poruka,datum) values (:vrsta, :poruka, now());");
$izraz->bindParam(':vrsta', $_POST["vrsta"]);	
$izraz->bindParam(':poruka', $_POST["poruka"]);	
$izraz->execute();
$zadnji=$veza->lastInsertId();
	
	//ako je postavljena slika spremi je pod ienom dodjeljene šifre u bazi
if(!$_FILES){
	goto ostalo;
}
		//echo "<pre>";
		//print_r($_FILES);
		//echo "</pre>";

		$slike_dir = "img/dojave/";
		$ext = pathinfo($_FILES['slika']['name'], PATHINFO_EXTENSION);
		$slika_datoteka = $slike_dir . $zadnji . "." . $ext;
		echo $slika_datoteka;
		move_uploaded_file($_FILES["slika"]["tmp_name"], $slika_datoteka);
		header("location: dojavaZaprimljena.php");
ostalo:
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
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
					<fieldset>
						<legend>Popunite tražene podatke</legend>
						
						<div class="row">
							
							<?php if(!empty($poruke)): ?>
							<div class="large-12 columns">
								<?php foreach ($poruke as $p): ?>
								<small class="error"><?php echo $p; ?></small>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
							
							<div class="large-6 columns">
								<input type="radio" name="vrsta" value="izgubljen" id="izgubljen" <?php echo (isset($_POST["vrsta"]) && $_POST["vrsta"]=="izgubljen") ? "checked=\"checked\"" : ""; ?> />
								<label for="izgubljen">Izgubljen</label>
							</div>
							<div class="large-6 columns">
								<input type="radio" name="vrsta" value="pronaden" id="pronaden"  <?php echo (isset($_POST["vrsta"]) && $_POST["vrsta"]=="pronaden") ? "checked=\"checked\"" : ""; ?> />
								<label for="pronaden">Pronađen</label>
							</div>
						</div>
						<label for="slika">Slika</label>
						<input type="file" name="slika" id="slika" />
						<label for="poruka">Poruka</label>
						<textarea placeholder="Unesite tekst dojave ovdje" cols="50" rows="20" name="poruka"><?php echo (isset($_POST["poruka"]) && strlen(trim($_POST["poruka"]))>0) ? $_POST["poruka"] : ""; ?></textarea>
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
