<?php
include("gelirgiderveritabani.php");
$tarih=$_POST["tarih"];

$sql ="SELECT COALESCE(SUM(gelir), 0) as gelirt,COALESCE(SUM(gider), 0) as gidert,COALESCE(SUM(gelir), 0) + COALESCE((SELECT SUM(gelir) - SUM(gider) as devreden FROM 
kasa WHERE tarih < '".$tarih."'), 0) as toplamgelir FROM kasa WHERE tarih = '".$tarih."'";

//coalesce null değeri varsa hepsi null değil ise  0 değerini döndürüyor,hepsi null ise null değerini döndürür.

$query=$db->query($sql, PDO::FETCH_ASSOC);
$row =$query->fetchAll(PDO::FETCH_ASSOC);

foreach($row as $rowK){
    $gelirt=$rowK["gelirt"];
    $gidert=$rowK["gidert"];
    $toplamgelir=$rowK["toplamgelir"];
}

$gelir=floor($gelirt*100)/100;
$gider=floor($gidert*100)/100;
$tgelir=floor($toplamgelir*100)/100;
$kalan=floor(($toplamgelir-$gider)*100)/100;

echo "<h6>GELİR: ".$gelir."&nbsp&nbsp GİDER: ".$gider."<br><br>
TOPLAM GELİR: ".$tgelir."&nbsp&nbsp KALAN: ".$kalan."</h6>";

?>