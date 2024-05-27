<?php
include("gelirgiderveritabani.php");

$aciklama=$_POST["aciklama"];
$gelir=$_POST["gelir"];
$gider=$_POST["gider"];
$tarih = $_POST["tarih"];

$sql="INSERT INTO kasa (id,tarih,aciklama,gelir,gider) VALUES (NULL,'".$tarih."','".$aciklama."',".$gelir.",".$gider.")";
$query=$db->query($sql, PDO::FETCH_ASSOC);

if($query)
{
    echo "success";
}
else 
{
    echo "error";
}

?>