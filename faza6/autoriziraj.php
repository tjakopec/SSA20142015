<?php
if(!$_POST || !isset($_POST['email']) || !isset($_POST['lozinka']))
	return;
include_once 'konfiguracija.php';
$izraz = $veza->prepare("select * from operater where email=:email and lozinka=:lozinka");
$izraz->bindValue(":email",  $_POST['email'] );
$izraz->bindValue(":lozinka",  $_POST['lozinka'] );
$izraz->execute();
$entitet = $izraz->fetch(PDO::FETCH_OBJ);
if ($entitet!=null){
	$_SESSION[$ida . "autoriziran"]=$entitet;
	echo "true";
}
else{
	echo "false";
}
