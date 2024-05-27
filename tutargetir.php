<?php
include("gelirgiderveritabani.php");

$fiyat=$_POST["fiyat"];
$adet=$_POST["adet"];
$urunID=$_POST["urunID"];
$iskonto=$_POST["iskonto"];

if($iskonto <= 0)
{
    $sql="SELECT kdv FROM urun WHERE urunID='".$urunID."'";
    $query=$db->query($sql,PDO::FETCH_ASSOC);
    $row=$query->fetchAll(PDO::FETCH_ASSOC);
    $kdv=$row[0]["kdv"];
    
    $tutar=($fiyat+($fiyat*($kdv/100)))*$adet;
}
else
{
    $indirim=$fiyat*($iskonto/100);
    $yenif=$fiyat-$indirim;
    $tutar=$yenif*$adet;
}
echo $tutar;
?>