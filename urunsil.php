<?php
include("gelirgiderveritabani.php");

$id=$_POST["id"];
$sql="DELETE FROM urun WHERE urunID='".$id."'";
$query = $db->query($sql, PDO::FETCH_ASSOC);

if($query)
{
    echo "success";
}
?>
