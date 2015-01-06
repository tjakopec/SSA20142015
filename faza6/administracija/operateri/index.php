<?php include_once '../../konfiguracija.php'; 
if(!isset($_SESSION[$ida . "autoriziran"])){
	header("location: ../../index.php");
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
    		<a class="button siroko" href="unosNovog.php">Dodaj novi</a>
    		
    		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" 
    			method="POST">
  	<fieldset>
  		<legend>Unesite dio email-a, imena ili prezimena</legend>
  		
  		
  		<input type="text" name="uvjet" value="<?php 
  		
  			echo isset($_POST["uvjet"]) ? $_POST["uvjet"] : "";
  		
  		?>"
  		
  		 />
  		
  	<input type="submit" class="button siroko" value="Traži" />
  </form>
    		
		<table style="width: 100%">
		<thead>
			<tr>
				<th>Email</th>
				<th>Ime</th>
				<th>Prezime</th>
				<th>Akcija</th>
			</tr>
		</thead>
		<tbody><?php
			$izraz = $veza -> prepare("select * from operater where email like :uvjet or prezime like :uvjet or ime like :uvjet");
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
				<td><?php echo $red -> email; ?></td>
				<td><?php echo $red -> ime; ?></td>
				<td><?php echo $red -> prezime; ?></td>
				<td>
					<a href="promjena.php?sifra=<?php echo $red -> sifra; ?>">Promjeni</a>
					<a href="brisanje.php?sifra=<?php echo $red -> sifra; ?>">Obriši</a>
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
