<?php include_once '../../konfiguracija.php'; 
if(!isset($_SESSION[$ida . "autoriziran"])){
	header("location: ../../index.php");
}

if(isset($_GET["sifra"])){
$izraz = $veza -> prepare("select * from operater where sifra=:sifra");
$izraz -> execute($_GET);
$operater = $izraz -> fetch(PDO::FETCH_OBJ);
}


if($_POST){
	
		$izraz = $veza -> prepare("delete from operater where sifra=:sifra;");
		$izraz -> execute($_POST);
		header("location: index.php");
	
}
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
   <title><?php echo $naslovAPP ?> Promjena operatera</title>
     <?php
    include_once '../../head.php';
    ?>
  </head>
  <body>
   
    <?php
		include_once '../izbornik.php';
		?>

		
    <div class="row">
    	
    	<div class="large-12 columns">
    		<div class="panel">
    		 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  	<fieldset>
  		<legend>Upisni podaci</legend>
  		
  		<label for="email">Email</label>
  		<h1><?php echo $operater->email; ?></h1>
  		
  		
  		
  		
  		<label for="ime">Ime</label>
  		<h1><?php  echo $operater->ime; ?></h1>
  		
  		
  		
  		<label for="prezime">Prezime</label>
  		<h1><?php  echo $operater->prezime; ?></h1>
  		
  	
  		<input type="hidden" name="sifra" value="<?php  echo $operater->sifra;?>" />
  		
  	<div class="row">
  		<div class="large-6 columns">
  			<a href="index.php" class="alert button siroko">Odustani</a>
  				</div>
  		<div class="large-6 columns">
  			<input class="success button siroko" type="submit" value="Obriši" />  			
  		</div>
  	</div>
  	
  </form>
    		</div>
    		
    	</div>
    	
    </div>
<?php
		include_once '../skripte.php';
		?>
  </body>
</html>
