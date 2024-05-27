<?php
include("gelirgiderveritabani.php");
date_default_timezone_set('Europe/Istanbul');
$tarih=date("Y-m-d");

$urunID = $_POST["urunID"];


$kesenFirmalar = "";
$kesilenFirmalar = "";

$sql1 = "SELECT SUM(adet) as aadet, kesilen_firma FROM fatura WHERE tip = 'alis' AND urunID = :urunID";
$query1 = $db->prepare($sql1);
$query1->execute(array(':urunID' => $urunID));
$row1 = $query1->fetch(PDO::FETCH_ASSOC);

if ($row1) {
    $aadet = $row1["aadet"];
    $kesen = $row1["kesilen_firma"];

    $sql2 = "SELECT adi FROM firma_cari WHERE id = :kesen";
    $query2 = $db->prepare($sql2);
    $query2->execute(array(':kesen' => $kesen));
    $row2 = $query2->fetch(PDO::FETCH_ASSOC);

    $kesenFirmalar = $row2["adi"];
}

$sql3 = "SELECT SUM(adet) as sadet, kesilen_firma FROM fatura WHERE tip = 'satis' AND urunID = :urunID";
$query3 = $db->prepare($sql3);
$query3->execute(array(':urunID' => $urunID));
$row3 = $query3->fetch(PDO::FETCH_ASSOC);

if ($row3) {
    $sadet = $row3["sadet"];
    $kesilen = $row3["kesilen_firma"];

    $sql4 = "SELECT adi FROM firma_cari WHERE id = :kesilen";
    $query4 = $db->prepare($sql4);
    $query4->execute(array(':kesilen' => $kesilen));
    $row4 = $query4->fetch(PDO::FETCH_ASSOC);

    $kesilenFirmalar = $row4["adi"];
}

$kalan = $aadet - $sadet;

$sql5 = "SELECT * FROM urun WHERE urunID = :urunID";
$query5 = $db->prepare($sql5);
$query5->execute(array(':urunID' => $urunID));
$row5 = $query5->fetch(PDO::FETCH_ASSOC);

$aciklama = $row5["aciklama"];
$alisF = $row5["alisF"];
$satisF = $row5["satisF"];
$resim = $row5["resim"];
$ukod = $row5["ukod"];

$data = array(
    'adi' => $aciklama,
    'kod' => $ukod,
    'alisF' => $alisF,
    'satisF' => $satisF,
    'aadet' => $aadet,
    'sadet' => $sadet,
    'kalan' => $kalan,
    'afirma' => $kesenFirmalar,
    'sfirma' => $kesilenFirmalar,
    'resim' => $resim,
    'rtarih'=> $tarih
);

echo json_encode($data);
?>
