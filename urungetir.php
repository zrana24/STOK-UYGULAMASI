<?php
include("gelirgiderveritabani.php");
$urunID=$_POST["urunID"];

$sql="SELECT * FROM urun WHERE urunID='".$urunID."'";
$query = $db->query($sql, PDO::FETCH_ASSOC);
$row = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($row as $rowK){
    $aciklama=$rowK["aciklama"];
    $ozellik=$rowK["ozellik"];
    $resim=$rowK["resim"];
    $birim=$rowK["birim"];
    $alisF=$rowK["alisF"];
    $satisF=$rowK["satisF"];
    $kdv=$rowK["kdv"];
    $bildirim=$rowK["bildirim"];
    $ukod=$rowK["ukod"];
}

echo $aciklama.'|'.$ozellik.'|'.$resim.'|'.$birim.'|'.$alisF.'|'.$satisF.'|'.$kdv.'|'.$bildirim.'|'.$ukod.'|'.$urunID;
?>