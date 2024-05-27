<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
   <?php
        include("sidebar.php");
   ?>

<div class="container col-md-6 mt-3">
        <p class="justify-content-end" style="text-align:right;" id="devir"></p>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">

            <form method="POST" id="form" action="#">
            
            <div class="form-group w-70">
                <label>TARİH</label>
                <input type="date" class="form-control" id="tarih" name="tarih">
            </div>

            <div class="form-group w-70"> 
                <label>AÇIKLAMA</label>
                <input type="text" class="form-control" id="aciklama" name="aciklama" autocomplete="off">
            </div>

            <div class="form-group w-70">
                <label>GELİR</label>
                <input type="number" class="form-control" id="gelir" name="gelir" value="0" step="0.001" autocomplete="off">
            </div>

            <div class="form-group w-70">
                <label>GİDER</label>
                <input type="number" class="form-control" id="gider" name="gider" value="0" step="0.001" autocomplete="off">
            </div>

            <div class="btn btn-primary w-50" id="kayit">KAYDET</div>
            </form>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="col-md-6 offset-md-3 text-center" style="height:250px; overflow: auto;">
            <table class="table">

                <thead>
                <tr style="background-color: #007bff; color: white;">
                        <th>SIRA</th>
                        <th>TARİH</th>
                        <th>AÇIKLAMA</th>
                        <th>GELİR</th>
                        <th>GİDER</th>
                    </tr>
                </thead>

                <tbody id="icerik"></tbody>

            </table>
        </div>
    </div>

    <div class="container col-md-6">
        <p class="justify-content-end" style="text-align:right;" id="tutar"></p>
    </div>


<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/adminlte.min.js"></script>
<script src="js/kasa.js"></script>

</body>
</html>
