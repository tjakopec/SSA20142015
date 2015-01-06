<?php

if(strlen($_POST["email"])==0){
	$g=new stdClass();
	$g->element="email";
	$g->poruka="Email obavezno";
	array_push($greske,$g);
}else{

$izraz = $veza -> prepare("select sifra from operater where email=:email and sifra!=:sifra");
$izraz->bindParam(":email", $_POST["email"]);
$izraz->bindParam(":sifra", $_POST["sifra"]);
$izraz -> execute();
$t = $izraz -> fetch(PDO::FETCH_COLUMN);
if($t>0){
	$g=new stdClass();
	$g->element="email";
	$g->poruka="Email postoji, odaberite drugi";
	array_push($greske,$g);
}
}


if(strlen($_POST["lozinka"])>0 && 
strlen($_POST["ponovoLozinka"])>0 && 
$_POST["lozinka"]!=$_POST["ponovoLozinka"]){
	
	$g=new stdClass();
	$g->element="lozinka";
	$g->poruka="Lozinka i ponovo lozinka moraju biti iste";
	array_push($greske,$g);
	
	$g=new stdClass();
	$g->element="ponovoLozinka";
	$g->poruka="Lozinka i ponovo lozinka moraju biti iste";
	array_push($greske,$g);
	
}