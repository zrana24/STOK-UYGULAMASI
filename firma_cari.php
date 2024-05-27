<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/tablo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
   <?php
        include("sidebar.php");
   ?>
<div class="container">
    <div class="row">
        <div class="col-5">
        <form id="form" name="form">
            <div class="form-group w-70 mt-3" hidden>
                <label>ID</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>

            <div class="form-group w-70 mt-3">
                <label>ADI</label>
                <input type="text" class="form-control" id="adi" name="adi" autocomplete="off">
            </div>

            <div class="form-group w-70 mt-3">
                <label>ÜNVANI</label>
                <input type="text" class="form-control" id="unvan" name="unvan" autocomplete="off">
            </div>

            <div class="form-group w-70 mt-3">
                <label>VERGİ DAİRESİ</label><br>
                <input type="text" class="form-control" id="vergidairesi" name="vergidairesi" autocomplete="off">
            </div>

            <div class="form-group w-70 mt-3">
                <label>VERGİ NUMARASI</label>
                <input type="number" class="form-control" id="vergino" name="vergino" autocomplete="off">
            </div>

            <div class="form-group w-70 mt-3">
                <label>ADRES</label>
                <textarea class="form-control new-line-after-words" id="adres" name="adres" autocomplete="off"></textarea>
            </div>    

            <div class="form-group w-70 mt-3">
                <label>TELEFON</label>
                <input type="number" class="form-control" id="tel" name="tel" autocomplete="off">
            </div>
                
            <div class="form-check w-70 mt-3">
                <input class="form-check-input" type="radio" name="secenek" value="firma" id="firma" checked>
                <label>FİRMA</label>
            </div>

            <div class="form-check w-70">
                <input class="form-check-input" type="radio" name="secenek" value="cari" id="cari">
                <label>CARİ KART</label>
            </div>
            
            <button type="button" class="btn btn-primary ml-3 mt-3" onclick="kaydet()">KAYDET</button>
        </form>
        </div>
        
        <div class="col-7">
            <div class="row mt-5 ml-5">
                <div id="tablo"></div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="js/firma_cari.js"></script>
</body>
</html>
