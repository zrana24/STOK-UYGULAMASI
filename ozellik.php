<?php
include("gelirgiderveritabani.php");

if($_POST["aciklama"]) 
{
    $aciklama1 = $_POST["aciklama"];
    $aciklama = strtoupper($aciklama1);

    $sql = "SELECT ozellik FROM urun WHERE aciklama='".$aciklama."'";
    $query = $db->query($sql, PDO::FETCH_ASSOC);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $rowK)
    {
        echo '<option value="' . $rowK["ozellik"] . '">' . $rowK["ozellik"] . '</option>';
    }
    
}
?>
