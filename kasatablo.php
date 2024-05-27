<?php
include("gelirgiderveritabani.php");

if (isset($_POST["tarih"])) 
{
    $tarih = $_POST["tarih"];
} 
else 
{
    $tarih = date('Y-m-d');
}

$sql = "SELECT * FROM kasa WHERE tarih = '".$tarih."'";
$query = $db->query($sql, PDO::FETCH_ASSOC);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);


$tableContent = ''; 
$i = 0;

foreach($rows as $row)
{
    $i++;
    $aciklama = $row["aciklama"];
    $tarih = date('d/m/Y', strtotime($row["tarih"]));
    $gelir = $row["gelir"];
    $gider = $row["gider"];

    $tableContent .= '<tr>';
    $tableContent .= '<td>'.$i.'</td>';
    $tableContent .= '<td>'.$tarih.'</td>';

    if (ctype_digit($aciklama)) // Eğer sadece sayı varsa çalışır.
    {
        $sql1 = "SELECT * FROM urun WHERE urunID ='".$aciklama."'";
        $query1 = $db->query($sql1, PDO::FETCH_ASSOC);
        $rows1 = $query1->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows1 as $row1)
        {
            $aciklama = $row1["aciklama"];
        }
    } 
    
    $tableContent .= '<td>'.$aciklama.'</td>';
    $tableContent .= '<td>'.$gelir.'</td>';
    $tableContent .= '<td>'.$gider.'</td>';
    $tableContent .= '</tr>';
}

echo $tableContent;
?>

