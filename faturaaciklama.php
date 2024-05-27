<?php
include("gelirgiderveritabani.php");

$sql="SELECT * FROM urun";
$query=$db->query($sql,PDO::FETCH_ASSOC);
$rows=$query->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row)
{
    echo '<option value='.$row['urunID'].'>'.$row['aciklama'].'</option>';
}

?>

