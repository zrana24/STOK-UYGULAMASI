<?php
include("gelirgiderveritabani.php");
$urunID=$_POST["urunID"];
$secenek=$_POST["secenek"];

if($secenek === "alis")
{
    $sql="SELECT alisF FROM urun WHERE urunID='".$urunID."'";
    $query = $db->query($sql);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if ($query) 
    {
        $alisF = $rows[0]['alisF'];
        echo $alisF; 
    } 
}
else
{
    $sql="SELECT satisF FROM urun WHERE urunID='".$urunID."'";
    $query = $db->query($sql);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($query) 
    {
        $satisF = $rows[0]['satisF'];
        echo $satisF; 
    } 
}
?>
