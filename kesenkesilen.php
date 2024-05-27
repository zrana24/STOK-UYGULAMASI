<?php
include("gelirgiderveritabani.php");

$secenek=$_POST["secenek"];

if($secenek === "alis")
{
    $sql1 = 'SELECT * FROM firma_cari WHERE tip="cari"';
    $query1 = $db->query($sql1);
    $rows1 = $query1->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="form-group w-50 mt-3"><label>FATURA KESEN FİRMA/KİŞİ</label><select class="form-control" id="fkesen" name="fkesen">';
    foreach ($rows1 as $row) 
    {
        echo '<option value="' . $row['id'] . '">' . $row['adi'] . '</option>'; 
    }
    echo '</select></div>';

    $sql2 = 'SELECT * FROM firma_cari WHERE tip="firma"';
    $query2 = $db->query($sql2);
    $rows2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    echo '<div class="form-group w-50 mt-3"><label>FATURA KESİLEN FİRMA/KİŞİ</label><select class="form-control" id="fkesilen" name="fkesilen">';
    foreach ($rows2 as $row) 
    {
        echo '<option value="' . $row['id'] . '">' . $row['adi'] . '</option>'; 
    }
    echo '</select></div>';
}
else
{
    $sql1 = 'SELECT * FROM firma_cari WHERE tip="firma"';
    $query1 = $db->query($sql1);
    $rows1 = $query1->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="form-group w-50 mt-3"><label>FATURA KESEN FİRMA</label><select class="form-control" id="fkesen" name="fkesen">';
    foreach ($rows1 as $row) 
    {
        echo '<option value="' . $row['id'] . '">' . $row['adi'] . '</option>'; 
    }
    echo '</select></div>';

    $sql2 = 'SELECT * FROM firma_cari WHERE tip="cari"';
    $query2 = $db->query($sql2);
    $rows2 = $query2->fetchAll(PDO::FETCH_ASSOC);
    echo '<div class="form-group w-50 mt-3"><label>FATURA KESİLEN FİRMA</label><select class="form-control" id="fkesilen" name="fkesilen">';
    foreach ($rows2 as $row) 
    {
        echo '<option value="' . $row['id'] . '">' . $row['adi'] . '</option>'; 
    }
    echo '</select></div>';
}
?>