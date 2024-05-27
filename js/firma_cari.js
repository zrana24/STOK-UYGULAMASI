function kaydet(){
  $.ajax({
    type: "POST",
    url: "firmacari_kayit.php",
    data: 
    {
      id:$("#id").val(),
      adi: $("#adi").val(),
      unvan: $("#unvan").val(),
      vergidairesi: $("#vergidairesi").val(),
      vergino: $("#vergino").val(),
      adres: $("#adres").val(),
      tel: $("#tel").val(),
      secenek: $('input[name="secenek"]:checked').val(),
    },
    success: function (donen_deger) 
    {
      
      if(donen_deger === "success1"){
        Swal.fire({
          icon:'success',
          title:'Güncelleme Başarılı!',
          text:'Veriler başarıyla güncellendi.',
        });
        tablo();
      }

      else if (donen_deger === "success2") {
        Swal.fire({
          icon: 'success1',
          title: 'Kayıt Başarılı!',
          text: 'Veriler başarıyla kaydedildi.',
        });
        tablo();
      }

      else if(donen_deger === "error1"){
        Swal.fire({
          icon:'error',
          title:'Güncelleme Başarısız!',
          text:'Veriler başarıyla güncellenemedi.',
        });
      }

      else if(donen_deger === "error2"){
        Swal.fire({
          icon: 'error',
          title: 'Kayıt Başarısız!',
          text: 'Veriler başarıyla kaydedilemedi.',
        });
      }
      
      $('#form')[0].reset();
    },
    error:function(donen_hata_degeri)
    {
      console.log(donen_hata_degeri);
    }
  });
}

function tablo() 
{
  var veri = $('#veri').val();
    $.ajax({
        type: 'POST',
        url: 'firmatablo.php',
        data:
        {
          veri:veri,
        },
        success: function (donen_deger) 
        {
            $("#tablo").html(donen_deger);
        },
        error:function(donen_hata_degeri){
          console.log(donen_hata_degeri);
        }
    });
}

tablo();

$('#veri').on('input', function() 
{
    if ($(this).val() === '') 
    {
        tablo();
    }
});

$('#veri').on('input', function() 
{
    if ($(this).val().length > 0) 
    { 
        tablo();
    }
});


function fcgetir(id)
{
  $.ajax({
    type: 'POST',
    url: 'fcgetir.php',
    data:
    {
      id:id,
    },
    success: function (donen_deger) 
    {
      $('#form')[0].reset();
      const dizi = donen_deger.split('|');
      $("#adi").val(dizi[0]);
      $("#unvan").val(dizi[1]);
      $("#vergidairesi").val(dizi[2]);
      $("#vergino").val(dizi[3]);
      $("#adres").val(dizi[4]);
      $("#tel").val(dizi[5]);
      $("#id").val(dizi[6]);
      document.getElementById(dizi[7]).checked = true;
    },
    error:function(donen_hata_degeri)
    {
      console.log(donen_hata_degeri);
    }
  });
}

function fcsil(id)
{
  $.ajax({
    type:'POST',
    url:'fcsil.php',
    data:
    {
      id:id,
    },
    success:function (donen_deger)
    {
      if (donen_deger === "success") 
      {
        Swal.fire({
          icon: 'success',
          title: 'Silme Başarılı!',
          text: 'Veriler başarıyla silindi.',
        });
        tablo();
      }
      else
      {
        Swal.fire({
          icon: 'error',
          title: 'Silme Başarısız!',
          text: 'Veriler silinemedi.',
        });
      }
    },
    error:function(donen_hata_degeri){
      console.log(donen_hata_degeri);
    }
  })
}
