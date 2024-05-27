<?php
include("gelirgiderveritabani.php");

$id=$_POST["id"];
$sql="SELECT * FROM firma_cari WHERE id='".$id."'";
$query = $db->query($sql, PDO::FETCH_ASSOC);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row)
{
    $id=$row["id"];
    $adi=$row["adi"];
    $unvan=$row["unvan"];
    $vergi_dairesi=$row["vergi_dairesi"];
    $vergi_no=$row["vergi_no"];
    $adres=$row["adres"];
    $tel=$row["tel"];
    $tip=$row["tip"];
}

echo $adi.'|'.$unvan.'|'.$vergi_dairesi.'|'.$vergi_no.'|'.$adres.'|'.$tel.'|'.$id.'|'.$tip;
?>