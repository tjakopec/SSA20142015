<?php include_once '../../konfiguracija.php'; 
if(!isset($_SESSION[$ida . "autoriziran"])){
	header("location: ../../index.php");
}

if(isset($_GET["sifra"])){
$izraz = $veza -> prepare("select * from operater where sifra=:sifra");
$izraz -> execute($_GET);
$operater = $izraz -> fetch(PDO::FETCH_OBJ);
}

$greske=array();
if($_POST){
	include_once 'kontrola.php';
	include_once 'kontrolaLozinkiPromjena.php';
	if(empty($greske)){
		
		
		if(strlen($_POST["lozinka"])>0){
		unset($_POST["ponovoLozinka"]);
		$_POST["lozinka"] = md5($_POST["lozinka"]);
		$izraz = $veza -> prepare("update operater set email=:email,ime=:ime,prezime=:prezime,lozinka=:lozinka where sifra=:sifra;");
		
		}else{
			unset($_POST["lozinka"]);
			unset($_POST["ponovoLozinka"]);
		$izraz = $veza -> prepare("update operater set email=:email,ime=:ime,prezime=:prezime where sifra=:sifra;");
		
		}
		
		$izraz -> execute($_POST);
		header("location: index.php");
	}else{
		$operater=new stdClass();
		$operater->sifra=$_POST["sifra"];
		$operater->email=$_POST["email"];
		$operater->ime=$_POST["ime"];
		$operater->prezime=$_POST["prezime"];
	}
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
  		
  		<label for="email" <?php 
  		$poruka="";
  		foreach ($greske as $g) {
			  if($g->element=="email"){
			  	$poruka=$g->poruka;
				  break;
			  }
		  }
		if(strlen($poruka)>0){
			echo "class=\"error\"";
		} 
  		?> >Email
  		<input type="email" id="email" name="email" 
  		value="<?php echo $operater->email; ?>"/>
  		<?php 
  		if(strlen($poruka)>0){
  			echo "<small class=\"error\">" . $poruka . "</small>";
  		} 
  		?>
  		</label>
  		
  		
  		
  		
  		<label for="ime"  <?php 
  		$poruka="";
  		foreach ($greske as $g) {
			  if($g->element=="ime"){
			  	$poruka=$g->poruka;
				  break;
			  }
		  }
		if(strlen($poruka)>0){
			echo "class=\"error\"";
		} 
  		?>  >Ime
  		<input type="text" id="ime" name="ime" 
  		value="<?php  echo $operater->ime; ?>" />
  		<?php 
  		if(strlen($poruka)>0){
  			echo "<small class=\"error\">" . $poruka . "</small>";
  		} 
  		?>
  		</label>
  		
  		
  		<label for="prezime"  <?php 
  		$poruka="";
  		foreach ($greske as $g) {
			  if($g->element=="prezime"){
			  	$poruka=$g->poruka;
				  break;
			  }
		  }
		if(strlen($poruka)>0){
			echo "class=\"error\"";
		} 
  		?>  >Prezime
  		<input type="text" id="prezime" name="prezime" 
  		value="<?php  echo $operater->prezime; ?>" />
  		<?php 
  		if(strlen($poruka)>0){
  			echo "<small class=\"error\">" . $poruka . "</small>";
  		} 
  		?>
  		</label>
  		
  		
  		
  		<a href="#" class="success button siroko">U slučaju ne mijenjanja lozinke polja Lozinka i Lozinka ponovo ostaviti prazna</a>
  		
  		<label for="lozinka"  <?php 
  		$poruka="";
  		foreach ($greske as $g) {
			  if($g->element=="lozinka"){
			  	$poruka=$g->poruka;
				  break;
			  }
		  }
		if(strlen($poruka)>0){
			echo "class=\"error\"";
		} 
  		?>  >Lozinka
  		<input type="password" id="lozinka" name="lozinka" />
  		<?php 
  		if(strlen($poruka)>0){
  			echo "<small class=\"error\">" . $poruka . "</small>";
  		} 
  		?>
  		</label>
  		
  		
  		<label for="ponovoLozinka"  <?php 
  		$poruka="";
  		foreach ($greske as $g) {
			  if($g->element=="ponovoLozinka"){
			  	$poruka=$g->poruka;
				  break;
			  }
		  }
		if(strlen($poruka)>0){
			echo "class=\"error\"";
		} 
  		?>  >Ponovo lozinka
  		<input type="password" id="ponovoLozinka" name="ponovoLozinka" />
  		<?php 
  		if(strlen($poruka)>0){
  			echo "<small class=\"error\">" . $poruka . "</small>";
  		} 
  		?>
  		</label>
  		<input type="hidden" name="sifra" value="<?php  echo $operater->sifra;?>" />
  		
  	<div class="row">
  		<div class="large-6 columns">
  			<a href="index.php" class="alert button siroko">Odustani</a>
  				</div>
  		<div class="large-6 columns">
  			<input class="success button siroko" type="submit" value="Spremi" />  			
  		</div>
  	</div>
  	
  </form>
    		</div>
    		
    	</div>
    	
<?php
		include_once '../skripte.php';
		?>
  </body>
</html>
