<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("gelirgiderveritabani.php");
$id = $_POST["id"];
$adi = $_POST["adi"];
$unvan = $_POST["unvan"];
$vergi_dairesi = $_POST["vergidairesi"];
$vergi_no = $_POST["vergino"];
$adres = $_POST["adres"];
$tel = $_POST["tel"];
$secenek = $_POST["secenek"];

if ($id > 0) 
{
    $sql = "UPDATE firma_cari SET adi='" . $adi . "',unvan='" . $unvan . "',vergi_dairesi='" . $vergi_dairesi . "',vergi_no='" . $vergi_no . "',adres='" . $adres . "',tel='" . $tel . "',tip='" . $secenek . "' WHERE id=" . $id;
    $query = $db->query($sql, PDO::FETCH_ASSOC);

    if ($query) 
    {
        echo "success1";
    } 
    else 
    {
        echo "error1";
    }
} 
else 
{
    $sql = "INSERT INTO firma_cari (id,adi,unvan,vergi_dairesi,vergi_no,adres,tel,tip) VALUES (NULL,'" . $adi . "','" . $unvan . "','" . $vergi_dairesi . "','" . $vergi_no . "','" . $adres . "','" . $tel . "','" . $secenek . "')";
    $query = $db->query($sql, PDO::FETCH_ASSOC);

    if ($query) 
    {
        echo "success2";
    } 
    else 
    {
        echo "error2";
    }
}
?>
