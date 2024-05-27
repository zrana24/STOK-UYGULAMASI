$("#ajax_kayit").click(function () {
  var form_data = new FormData($("#form")[0]);

  $.ajax({
      type: "POST",
      url: "kayitet.php",
      data: form_data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (donen_deger) {
          if (donen_deger === "success1") {
              Swal.fire({
                  icon: 'success',
                  title: 'Güncelleme Başarılı!',
                  text: 'Veriler başarıyla güncellendi.',
              });
              tablo();
          } else if (donen_deger === "success2") {
              Swal.fire({
                  icon: 'success',
                  title: 'Kayıt Başarılı!',
                  text: 'Veriler başarıyla kaydedildi.',
              });
              tablo();
          } else {
              Swal.fire({
                  icon: 'error',
                  title: 'Kayıt Başarısız!',
                  text: 'Veriler kaydedilemedi.',
              });
          }
          document.getElementById("form").reset();
          document.getElementById("qkod").innerHTML = "";
          document.getElementById("resim_alani2").innerHTML = "";
      },
      error: function (donen_hata_degeri) {
          console.log(donen_hata_degeri);
      }
  });
});

$(function () {
    $("#resim").change(function () {
        $('.onizleme').html('');
        var resim = document.getElementById("resim");
        document.getElementById("resim_alani2").value = "";
        if (resim.files && resim.files[0]) {
            var veri = new FileReader();
            veri.onload = function (e) {
                var adres = e.target.result;
                $('.onizleme').html('<img id="fotograf" src="' + adres + '" alt="Ürün Resmi" width="65%" height="65%"/>');
            };
            veri.readAsDataURL(resim.files[0]);
        }
    });
});

function tablo() {
  var veri = $('#veri').val();
  $.ajax({
      type: 'POST',
      url: 'urun_tablo.php',
      data: {
          'veri': veri,
      },
      success: function (donen_deger) {
          $("#tablo").html(donen_deger);
      },
      error: function (donen_hata_degeri) {
          console.log(donen_hata_degeri);
      }
  });
}

tablo();

$('#veri').on('input', function () {
  if ($(this).val() === '') {
      tablo();
  }
});

$('#veri').on('input', function () {
  if ($(this).val().length > 0) {
      tablo();
  }
});

function sil(id) {
  $.ajax({
      type: 'POST',
      url: 'urunsil.php',
      data: {
          'id': id,
      },
      success: function (donen_deger) {
          if (donen_deger === "success") {
              Swal.fire({
                  icon: 'success',
                  title: 'Silme Başarılı!',
                  text: 'Veriler başarıyla silindi.',
              });
              tablo();
          } else {
              Swal.fire({
                  icon: 'error',
                  title: 'Silme Başarısız!',
                  text: 'Veriler silinemedi.',
              });
          }
      },
      error: function (donen_hata_degeri) {
          console.log(donen_hata_degeri);
      }
  });
}

function getir(urunID) {
  $.ajax({
      type: 'POST',
      url: 'urungetir.php',
      data: {
          urunID: urunID,
      },
      success: function (donen_deger) {
          const dizi = donen_deger.split('|');
          $("#aciklama").val(dizi[0]);
          $("#ozellik").val(dizi[1]);
          $(".onizleme").html('<img id="fotograf" src="urun_img/' + dizi[2] + '" alt="Ürün Resmi" width="30%" height="30%"/>');
          $("#birim").val(dizi[3]).prop("selected", true);
          $("#afiyat").val(dizi[4]);
          $("#sfiyat").val(dizi[5]);
          $("#kdv").val(dizi[6]);
          $("#sayi").val(dizi[7]);
          $("#kod").val(dizi[8]);
          $("#id").val(dizi[9]);
          $("#qkod").empty();
          generateQRCode(dizi[8]);
      },
      error: function (donen_hata_degeri) {
          console.log(donen_hata_degeri);
      }
  });
}

function alarm(kalan) {
  if (kalan > 0) {
      Swal.fire({
          icon: 'warning',
          title: 'Ürün miktarı azaldı!',
      });
  } else {
      Swal.fire({
          icon: 'warning',
          title: 'Ürün yok!',
      });
  }
}

$("#kod").on('input', function () {
  $("#qkod").empty();
  generateQRCode($(this).val());
});

function generateQRCode(ukod) {
  var qrcode = new QRCode(document.getElementById("qkod"), {
      text: ukod,
      width: 128,
      height: 128,
  });
}

$(document).ready(function () {
  $('#detayModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var urunID = button.data('id');
      var modal = $(this);

      $.ajax({
          url: 'urun_detay.php',
          type: 'POST',
          data: {
              urunID: urunID
          },
          success: function (donen_deger) {
              var veri = JSON.parse(donen_deger);
              $('#adi').val(veri.adi);
              $('#ukod').val(veri.kod);
              $('#alisF').val(veri.alisF);
              $('#satisF').val(veri.satisF);
              $('#aadet').val(veri.aadet);
              $('#sadet').val(veri.sadet);
              $('#kalan').val(veri.kalan);
              $('#afirma').val(veri.afirma);
              $('#sfirma').val(veri.sfirma);
              $('#rtarih').val(veri.rtarih);
              $('#resim').html('<img src="urun_img/' + veri.resim + '" alt="Ürün Resmi">');
          }
      });
  });
});

function indir() {
  const options = {
      filename: 'rapor.pdf',
      image: {
          type: 'jpeg',
          quality: 2,
      },
      html2canvas: {
          scale: 1,
          scrollX: 0,
          scrollY: 0
      },
      jsPDF: {
          unit: 'mm',
          format: [210, 297],
          orientation: 'portrait',
      },
  };

  const element = document.getElementById("rapor_container");

  html2pdf()
      .from(element)
      .set(options)
      .outputPdf((pdf) => {
          pdf.setPageSize([210, 297]);
      })
      .save();
}
