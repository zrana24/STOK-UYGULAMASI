<?php
include("gelirgiderveritabani.php");
$secenek=$_POST["secenek"];

if($secenek === "satis")
{
    $sql = "SELECT fatura_no FROM fatura WHERE tip='".$secenek."'";
    $query = $db->query($sql, PDO::FETCH_ASSOC);
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
        
    if (count($row) > 0) 
    {
        $ks=count($row)-1;
        $fno = $row[$ks]['fatura_no']+1; 
        echo $fno;
    } 
    else 
    {
        echo 1;
    }
}


?>
