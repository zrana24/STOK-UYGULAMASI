<?php
include("gelirgiderveritabani.php");
$id = $_POST['id'];
$aciklama1 = $_POST['aciklama'];
$ozellik1 = $_POST['ozellik'];
$birim = $_POST['birim'];
$afiyat = $_POST['afiyat'];
$sfiyat = $_POST['sfiyat'];
$kdv = $_POST['kdv'];
$sayi = $_POST['sayi'];
$kod = $_POST['kod'];

$aciklama=strtoupper($aciklama1);
$ozellik=strtoupper($ozellik1);

$resim_yolu = 'urun_img';
$resimadi = md5(microtime());
$uzanti = "";

if ($_FILES['resim']['type'] == "image/jpeg")
{
    $uzanti = ".jpeg";
} 
elseif ($_FILES['resim']['type'] == "image/jpg")
{
    $uzanti = ".jpg";
}
elseif ($_FILES['resim']['type'] == "image/png")
{
    $uzanti = ".png";
}
elseif ($_FILES['resim']['type'] == "image/x-png")
{
    $uzanti = ".png";
}
elseif ($_FILES['resim']['type'] == "image/gif")
{
    $uzanti = ".gif";
}

$yuklenecek_dosya = $resim_yolu . '/' . $resimadi . $uzanti;

if ($id>0) 
{
    $resim = ''; 

    if (move_uploaded_file($_FILES['resim']['tmp_name'], $yuklenecek_dosya)) 
    {
        $resim = $resimadi . $uzanti;

        $sql = "UPDATE urun SET aciklama = '".$aciklama."', ozellik = '".$ozellik."', resim = '".$resim."', birim = '".$birim."', alisF = '".$afiyat."', satisF = '".$sfiyat."', kdv = '".$kdv."', bildirim = '".$sayi."', ukod = '".$kod."' WHERE urunID ='".$id."'";
        $query = $db->query($sql, PDO::FETCH_ASSOC);

        if ($query) 
        {
            echo "success1";
        }
    }
    else
    {
        $sql = "UPDATE urun SET aciklama = '".$aciklama."', ozellik = '".$ozellik."', birim = '".$birim."', alisF = '".$afiyat."', satisF = '".$sfiyat."', kdv = '".$kdv."', bildirim = '".$sayi."', ukod = '".$kod."' WHERE urunID ='".$id."'";
        $query = $db->query($sql, PDO::FETCH_ASSOC);

        if ($query) 
        {
            echo "success1";
        }
    
    }
    
} 

else 
{
    if (move_uploaded_file($_FILES['resim']['tmp_name'], $yuklenecek_dosya))
    {
        $resim = $resimadi . $uzanti;

        $sql = "INSERT INTO urun (urunID, aciklama, ozellik, resim, birim, alisF, satisF,kdv,bildirim,ukod) VALUES (NULL, '".$aciklama."','".$ozellik."','".$resim."','".$birim."','".$afiyat."','".$sfiyat."','".$kdv."','".$sayi."','".$kod."')";
        $query = $db->query($sql, PDO::FETCH_ASSOC);
        if ($query)
        {
            echo "success2";
        } 
    } 
    else
    {
        $sql = "INSERT INTO urun (urunID, aciklama, ozellik, resim, birim, alisF, satisF,kdv,bildirim,ukod) VALUES (NULL, '".$aciklama."','".$ozellik."','','".$birim."','".$afiyat."','".$sfiyat."','".$kdv."','".$sayi."','".$kod."')";
        $query = $db->query($sql, PDO::FETCH_ASSOC);

        if($query)
        {
            echo "success2";
        }
    }
}
?>