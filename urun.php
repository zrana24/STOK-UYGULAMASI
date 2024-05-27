<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<link rel="stylesheet" href="css/adminlte.min.css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/kayit.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php include("sidebar.php"); ?>
    <div class="container">
        <div class="row">
            <?php include "modal.php"; ?>
            <div class="col-4">
                <form enctype="multipart/form-data" name="form" id="form">
                    <div class="form-group w-50 mt-3" hidden>
                        <label>ID</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group w-50 mt-3">
                        <label>AÇIKLAMA</label>
                        <input type="text" class="form-control" id="aciklama" name="aciklama" autocomplete="off">
                    </div>
                    <div class="form-group w-50 mt-3">
                        <label>ÖZELLİK</label>
                        <input type="text" class="form-control" id="ozellik" name="ozellik" autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <label>BİRİM</label><br>
                        <select class="w-50" style="height:50%;" name="birim" id="birim" autocomplete="off">
                            <option value="gram">GRAM</option>
                            <option value="kg">KG</option>
                            <option value="litre">LİTRE</option>
                            <option value="ml">ML</option>
                        </select>
                    </div>
                    <div class="form-group w-50 mt-3">
                        <label>ALIŞ FİYATI</label>
                        <input type="number" class="form-control" id="afiyat" name="afiyat" step="0.001" autocomplete="off">
                    </div>
            </div>
            <div class="col-4">
                <div class="form-group w-50 mt-3">
                    <label>SATIŞ FİYATI</label>
                    <input type="number" class="form-control" id="sfiyat" name="sfiyat" step="0.001" autocomplete="off">
                </div>
                <div class="form-group w-50 mt-3">
                    <label>KDV ORANI</label>
                    <input type="number" class="form-control" id="kdv" name="kdv" autocomplete="off">
                </div>
                <div class="form-group w-50 mt-3">
                    <label>BİLDİRİM SAYISI</label>
                    <input type="number" class="form-control" id="sayi" name="sayi" autocomplete="off">
                </div>
                <div class="form-group w-50 mt-3">
                    <label>ÜRÜN KODU</label>
                    <input type="number" class="form-control" id="kod" name="kod" autocomplete="off">
                </div>
            </div>
            <div class="col-3 mt-3">
                <span>Resim Seç</span>
                <div class="form-group mt-3">
                    <input name="resimgetir" type="text" id="resim_alani2" form="form" hidden>
                    <div id="resim_alani" class="onizleme mt-3"></div>
                    <input name="resim" type="file" id="resim" form="form" class="upload" accept="image/*"/>
                </div>
                <div class="form-group w-50 mt-3">
                    <div id="qkod" name="qkod"></div>
                </div>
            </div>
            <button type="button" class="btn btn-primary ml-3" id="ajax_kayit">KAYDET</button>
        </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-9 mx-auto">
                <div id="tablo" class="mt-5"></div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <script src="js/urunkayit.js"></script>
</body>
</html>
