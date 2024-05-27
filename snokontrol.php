<?php
include("gelirgiderveritabani.php");

$sql="SELECT * FROM fatura";
$query=$db->query($sql, PDO::FETCH_ASSOC);
$row=$query->fetchAll(PDO::FETCH_ASSOC);

$sayi=count($row)+1;
echo $sayi;
?>