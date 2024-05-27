<?php
include("gelirgiderveritabani.php");
$id=$_POST["id"];

$sql="DELETE * FROM firma_cari WHERE id='".$id."'";
$query=$db->query($sql,PDO::FETCH_ASSOC);

if($query)
{
    echo "success";
}
else{
    echo "error";
}
?>