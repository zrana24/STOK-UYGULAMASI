<?php 
include("gelirgiderveritabani.php");

if(!$_POST["veri"])
{
    $sql = "SELECT * FROM firma_cari";
    $query = $db->query($sql, PDO::FETCH_ASSOC);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
}
else
{
    $veri = $_POST["veri"];
    $sql = "SELECT * FROM firma_cari WHERE adi LIKE :veri";
    $query = $db->prepare($sql);
    $query->execute(['veri' => $veri . '%']);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
}

echo '<table class="table" style="width:100%;height:100%;">
        <thead>
            <tr style="background-color:rgb(6, 52, 158); color:white;">
                <th>ADI</th>
                <th>ÜNVAN</th>
                <th>VERGİ DAİRESİ</th>
                <th>VERGİ NO</th>
                <th>ADRES</th>
                <th>TELEFON</th>
                <th>TİP</th>
                <th>SEÇENEK</th>
            </tr>
        </thead>
        <tbody>';

foreach($rows as $row)
{
    echo '<tr>
        <td class="new-line-after-words">'.$row['adi'].'</td>
        <td class="new-line-after-words">'.$row['unvan'].'</td>
        <td class="new-line-after-words">'.$row['vergi_dairesi'].'</td>
        <td class="new-line-after-words">'.$row['vergi_no'].'</td>
        <td class="new-line-after-words">'.$row['adres'].'</td>
        <td class="new-line-after-words">'.$row['tel'].'</td>
        <td class="new-line-after-words">'.$row['tip'].'</td>
        <td><a href="#" onclick="fcgetir('.$row["id"].')">GÜNCELLE</a><br><br><a href="#" onclick="fcsil('.$row["id"].')">SİL</a></td>
        </tr>';
}

echo '</tbody></table>';

?>
