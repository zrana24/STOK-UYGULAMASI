<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="admin123";
$dbdata="stok";

try
{
	$db= new PDO ("mysql:host=".$dbhost.";dbname=".$dbdata.";charset=utf8",$dbuser ,$dbpass);
	$db->exec("SET NAMES 'utf8';SET CHARSET 'utf8'");
}
catch(PDOException $e)
{
	print $e->getMessage();
}
?>