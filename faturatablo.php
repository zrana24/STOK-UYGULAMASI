<?php
include("gelirgiderveritabani.php");

if(!$_POST["veri"])
{
    $sql = "SELECT * FROM fatura";
    $query = $db->query($sql, PDO::FETCH_ASSOC);
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
}

else 
{
    $veri = $_POST["veri"];
    $sql1 = "SELECT urunID FROM urun WHERE aciklama LIKE :veri";
    $query1 = $db->prepare($sql1);
    $query1->execute(['veri' =>'%'. $veri . '%']);
    $row1 = $query1->fetchAll(PDO::FETCH_ASSOC);

    $urunID=$row1[0]["urunID"];

    $sql="SELECT * FROM fatura WHERE urunID='".$urunID."'";
    $query= $db->query($sql, PDO::FETCH_ASSOC);
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
}
$sno=0;

foreach($row as $rowK)
{
    $sno++;
    $urunID=$rowK["urunID"];
    $fiyat=$rowK["fiyat"];
    $adet=$rowK["adet"];
    $tutar=$rowK["tutar"];
    $iskonto=$rowK["iskonto"];

    $sql2="SELECT aciklama FROM urun WHERE urunID='".$urunID."'";
    $query2=$db->query($sql2,PDO::FETCH_ASSOC);
    $row2=$query2->fetchAll(PDO::FETCH_ASSOC);

    $aciklama=$row2[0]["aciklama"];

    echo '<div class="form-row mt-3">
            <div class="col-md-2">
                <div class="form-group">
                    <label>SIRA NO</label>
                    <input type="number" value='.$sno.' class="form-control" disabled>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>AÇIKLAMA</label>
                    <input type="text" value='.$aciklama.' class="form-control" disabled>
                </div> 
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>FİYAT</label>
                    <input type="number" value='.$fiyat.' class="form-control" disabled>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>İSKONTO</label>
                    <input type="number" value='.$iskonto.' class="form-control" disabled>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>ADET</label>
                    <input type="number" value='.$adet.' class="form-control" disabled>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>TUTAR</label>
                    <input type="number" value='.$tutar.' class="form-control" disabled>
                </div>
            </div>
        </div>';
}
?>