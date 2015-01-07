<?php include_once '../../konfiguracija.php'; 
if(!isset($_SESSION[$ida . "autoriziran"])){
	header("location: ../../index.php");
}
if(isset($_GET["odobreno"]) && isset($_GET["sifra"])){
	$izraz = $veza->prepare("update neobradene_dojave set odobreno=:odobreno where sifra=:sifra;");
	$izraz->execute($_GET);
}
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
   <title><?php echo $naslovAPP ?> Operateri</title>
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
    		
    		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" 
    			method="POST">
  	<fieldset>
  		<legend>Unesite dio poruke</legend>
  		
  		
  		<input type="text" name="uvjet" value="<?php 
  		
  			echo isset($_POST["uvjet"]) ? $_POST["uvjet"] : "";
  		
  		?>"
  		
  		 />
  		
  	<input type="submit" class="button siroko" value="Traži" />
  </form>
    		
		<table style="width: 100%">
		<thead>
			<tr>
				<th>Slika</th>
				<th>Vrsta</th>
				<th>Poruka</th>
				<th>Status</th>
				<th>Akcija</th>
			</tr>
		</thead>
		<tbody><?php
			$izraz = $veza -> prepare("select * from neobradene_dojave where poruka like :uvjet order by odobreno");
			if(!$_POST){
				$uvjet="";
			}else{
				$uvjet=$_POST["uvjet"];
			}
			$uvjet = "%" . $uvjet . "%";
			$izraz->bindParam(":uvjet", $uvjet);
			$izraz -> execute();
			$rezultati = $izraz -> fetchAll(PDO::FETCH_OBJ);
			foreach ($rezultati as $red):
			?>
			<tr>
				<td>
					<?php
					 if(file_exists($_SERVER["DOCUMENT_ROOT"] . $putanjaApp . "img/dojave/" . $red -> sifra . ".jpg")): ?>
					<img class="slikaPregled" src="<?php echo $putanjaApp; ?>img/dojave/<?php echo $red -> sifra; ?>.jpg" />
					<?php endif; ?>
					</td>
				<td><?php echo $red -> vrsta; ?></td>
				<td><?php echo $red -> poruka; ?></td>
				<td><?php echo $red -> odobreno; ?></td>
				<td>
					<?php
					 if($red -> odobreno): ?>
					<a href="<?php echo $_SERVER["PHP_SELF"] ?>?odobreno=0&sifra=<?php echo $red -> sifra; ?>">Zabrani</a>
					<?php else:
						?>
						<a href="<?php echo $_SERVER["PHP_SELF"] ?>?odobreno=1&sifra=<?php echo $red -> sifra; ?>">Odobri</a>
						<?php
					endif; ?>
					
				</td>
			</tr>
			<?php
			endforeach;
			$veza = null;
			?></tbody>
			</table>
    		</div>
    		
    	</div>
    	
    </div>
    
    <?php
		include_once '../skripte.php';
		?>
  </body>
</html>
