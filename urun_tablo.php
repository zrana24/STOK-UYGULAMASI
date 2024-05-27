<?php 
include("gelirgiderveritabani.php");

if(!$_POST["veri"])
{
    $sql = "SELECT * FROM urun";
    $query = $db->query($sql, PDO::FETCH_ASSOC);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
}
else
{
    $veri = $_POST["veri"];
    $sql = "SELECT * FROM urun WHERE aciklama LIKE :veri";
    $query = $db->prepare($sql);
    $query->execute(['veri' => $veri . '%']);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
}
echo '<table class="table" style="width:100%;height:60%;">
        <thead>
            <tr style="background-color:rgb(6, 52, 158); color:white;">
                <th>AÇIKLAMA</th>
                <th>ÖZELLİK</th>
                <th>BİRİM</th>
                <th>ALIŞ FİYATI</th>
                <th>SATIŞ FİYATI</th>
                <th>KDV</th>
                <th>MİN MİKTAR</th>
                <th>DURUM</th>
                <th>ÜRÜN KODU</th>
                <th>RESİM</th>
                <th>SEÇENEK</th>
                <th>RAPOR</th>
            </tr>
        </thead>
        <tbody>';

foreach($rows as $row)
{
    echo '<tr>
        <td>'.$row['aciklama'].'</td>
        <td>'.$row['ozellik'].'</td>
        <td>'.$row['birim'].'</td>
        <td>'.$row['alisF'].'</td>
        <td>'.$row['satisF'].'</td>
        <td>'.$row['kdv'].'</td>
        <td>'.$row['bildirim'].'</td>';
        $sql1 = "SELECT (SELECT SUM(adet) FROM fatura WHERE urunID = urun.urunID AND tip = 'satis') AS satilan, (SELECT SUM(adet) FROM fatura WHERE urunID = urun.urunID AND 
        tip = 'alis') AS alinan,bildirim FROM urun WHERE urunID = '".$row["urunID"]."'";

        $query1 = $db->query($sql1, PDO::FETCH_ASSOC);
        $row1 = $query1->fetch(PDO::FETCH_ASSOC);

        $satilan = $row1["satilan"];
        $alinan = $row1["alinan"];
        $bildirim = $row1["bildirim"];

        $kalan=$alinan-$satilan;
        if($bildirim<$kalan)
        {
            echo '<td>'.$kalan.'</td>';
        }
        else if($kalan>0)
        {
            echo '<td><i class="fa fa-bell alarm" onclick="alarm('.$kalan.')">'.$kalan.'</i></td>'; 
        }
        else
        {
            echo '<td><i class="fa fa-bell alarm" onclick="alarm('.$kalan.')">0</i></td>';
        }

        echo '<td>'.$row['ukod'].'</td>
        <td><img src="urun_img/' . $row['resim'] . '" alt="Ürün Resmi" width="55%" height="55%"></td>
        <td><a href="#" onclick="getir('.$row["urunID"].')">GÜNCELLE</a><br><br><a href="#" onclick="sil('.$row["urunID"].')">SİL</a></td>';
        echo '<td><a href="#" data-toggle="modal" data-target="#detayModal" data-id='.$row["urunID"].' >DETAY</a></td>';
        echo '</tr>';
}

echo '</tbody></table>';

?>
