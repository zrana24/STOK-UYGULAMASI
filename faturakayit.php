<?php
include("gelirgiderveritabani.php");

$fkesen=$_POST["fkesen"];
$fkesilen=$_POST["fkesilen"];
$fno=$_POST["fno"];
$secenek=$_POST["secenek"];
$urunID=$_POST["urunID"];
$fiyat=$_POST["fiyat"];
$iskonto=$_POST["iskonto"];
$adet=$_POST["adet"];
$tutar=$_POST["tutar"];
$tarih=date("Y-m-d");
//echo $fno;

if($secenek==="alis")
{
    $sql1="SELECT alisF FROM urun WHERE urunID='".$urunID."'";
    $query1 = $db->query($sql1, PDO::FETCH_ASSOC);
    $row1= $query1->fetchAll(PDO::FETCH_ASSOC);
    if($row1[0]['alisF']!=$fiyat)
    {
        $sql2="UPDATE urun SET alisF = '".$fiyat."' WHERE urunID='".$urunID."'";
        $query2 = $db->query($sql2, PDO::FETCH_ASSOC);
        $row2= $query2->fetchAll(PDO::FETCH_ASSOC);
    }
}
else
{
    $sql1="SELECT satisF FROM urun WHERE urunID='".$urunID."'";
    $query1 = $db->query($sql1, PDO::FETCH_ASSOC);
    $row1= $query1->fetchAll(PDO::FETCH_ASSOC);
    if($row1[0]['satisF']!=$fiyat)
    {
        $sql2="UPDATE urun SET satisF = '".$fiyat."' WHERE urunID='".$urunID."'";
        $query2 = $db->query($sql2, PDO::FETCH_ASSOC);
        $row2= $query2->fetchAll(PDO::FETCH_ASSOC);
    }

    $sql3 = "SELECT SUM(adet) as alinan FROM fatura WHERE urunID='" . $urunID . "' and tip='alis'";
    $query3 = $db->query($sql3, PDO::FETCH_ASSOC);
    $row3 = $query3->fetchAll(PDO::FETCH_ASSOC);
    
    $alinan = $row3[0]["alinan"];

    $sql4 = "SELECT SUM(adet) as satilan FROM fatura WHERE urunID='" . $urunID . "' and tip='satis'";
    $query4 = $db->query($sql4, PDO::FETCH_ASSOC);
    $row4 = $query4->fetchAll(PDO::FETCH_ASSOC);

    $satilan=$row4[0]["satilan"];
    
    if($alinan>$satilan)
    {
        $kalan=$alinan-$satilan;
        if($kalan<$adet)
        {
            echo "yok";
            exit;
        }
    }
    else
    {
        echo "yok";
        exit;
    }
}

$sql6="INSERT INTO fatura(faturaID,kesen_firma,kesilen_firma,tip,urunID,tarih,fatura_no,fiyat,iskonto,adet,tutar) VALUES 
(NULL,'".$fkesen."','".$fkesilen."','".$secenek."','".$urunID."','".$tarih."','".$fno."','".$fiyat."','".$iskonto."','".$adet."','".$tutar."')";
$query6=$db->query($sql6, PDO::FETCH_ASSOC);
if($query6)
{
    if($secenek === "alis")
    {
        $sql7="INSERT INTO kasa(id,tarih,aciklama,gelir,gider) VALUES (NULL,'".$tarih."','".$urunID."','0','".$tutar."')";
        $query7 = $db->query($sql7, PDO::FETCH_ASSOC);
        if($query7){
            echo "success";
            exit;
        }
    }
    else
    {
        $sql7="INSERT INTO kasa(id,tarih,aciklama,gelir,gider) VALUES (NULL,'".$tarih."','".$urunID."','".$tutar."','0')";
        $query7 = $db->query($sql7, PDO::FETCH_ASSOC);
        if($query7){
            echo "success";
            exit;
        }
    }
}    

?>