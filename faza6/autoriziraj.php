<?php
if(!$_POST || !isset($_POST['podaci']))
	return;
include_once 'konfiguracija.php';
$p=json_decode($_POST['podaci']);
$izraz = $veza->prepare("select * from operater where email=:email and lozinka=:lozinka");
$izraz->bindValue(":email",  $p->email );
$izraz->bindValue(":lozinka",  $p->lozinka );
$izraz->execute();
$entitet = $izraz->fetch(PDO::FETCH_OBJ);
$odgovor=new stdClass();
if ($entitet!=null){
	$_SESSION[$ida . "autoriziran"]=$entitet;
	$odgovor->status=true;
	$odgovor->stranica="administracija/nadzornaPloca.php";
}
else{
	$odgovor->status=false;
	$odgovor->poruka="Neispravna kombinacija korisničko ime ili lozinka";
}
echo json_encode($odgovor);