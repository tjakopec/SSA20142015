<?php
//web
/*
$mysql_host = "localhost";
$mysql_database = "ssa20142015";
$mysql_user = "xxxxxx";
$mysql_password = "xxxxxxx";
$putanjaApp="/SSA20142015/"; //ako na server ide u root onda je putanjaApp /
*/


//lokalno

$mysql_host = "localhost";
$mysql_database = "ssa20142015";
$mysql_user = "root";
$mysql_password = "000000";
$putanjaApp="/SSA20142015/";

/*
 * Identifikacija aplikacije 
 */
$ida="SSA20142015_";

/*
 * Naslov aplikacije
 */
 $naslovAPP="Azil";
 
//spajanje na bazu
$veza = new PDO("mysql:dbname=" . $mysql_database . 
		";host=" . $mysql_host . 
		"", 
			$mysql_user, $mysql_password);
$veza->exec("SET CHARACTER SET utf8");
$veza->exec("SET NAMES utf8");
//startanje session-a. 
session_start();