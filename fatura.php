<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fatura.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
   <?php
        include("sidebar.php");
    ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <form id="form" name="form">

                <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="radio" name="secenek" value="alis" id="alis" onclick="kesenkesilen()" checked>
                    <label class="form-check-label" for="alis">ALIŞ</label>
  
                    <input class="form-check-input ml-3" type="radio" name="secenek" value="satis" id="satis" onclick="kesenkesilen()">
                    <label class="form-check-label" for="satis">SATIŞ</label>
                </div>

                <div id="faturakesen"></div>
        </div>

            <div class="col-md-3 mt-3">
                <div id="amblem"><img src="foto/maliye.png" style="width:40%;"></img></div>
            </div>

            <div class="col-md-3 mt-3">
                <b>FATURA TARİHİ</b><input type="date" name="tarih" id="tarih" class="form-control">
                <b>FATURA NO:<b><input type="number" name="fno" id="fno" class="form-control">       
            </div>
            
            <h5 class="mt-5">FATURA DETAYLARI</h5>
</div>
            <div id="tablo" class="mt-3 tablo"></div>
            
            <div class="form-row mt-3">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>SIRA NO</label>
                        <input type="number" name="sno" id="sno" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>AÇIKLAMA</label>
                        <select class="form-control" id="aciklama" name="aciklama">
                            <div id="option"></div>
                        </select>
                    </div> 
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>FİYAT</label>
                        <input type="number" name="fiyat" id="fiyat" class="form-control">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>İSKONTO</label>
                        <input type="number" name="iskonto" id="iskonto" class="form-control">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>ADET</label>
                        <input type="number" name="adet" id="adet" class="form-control">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>TUTAR</label>
                        <input type="number" name="tutar" id="tutar" class="form-control" disabled>
                    </div>
                </div>

                <div class="col-md-2 mt-3">
                    <button type="button" class="btn-lg" onclick="kaydet()"><i class="fa fa-check buton"></i></button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="js/fatura.js"></script>
</body>
</html>
