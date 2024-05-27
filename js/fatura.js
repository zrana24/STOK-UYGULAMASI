$(document).ready(function(){

    $('#aciklama').change(function() {
        fiyatgetir();
    });

    $('#fiyat,#adet,#aciklama,#secenek,#iskonto').change(function() {
        tutargetir();
    });

    $("#fiyat,#adet,#aciklama,#secenek,#iskonto").on('input', function()
    {
        tutargetir();
    });
});

function sno()
{
    $.ajax({
        type:'POST',
        url:'snokontrol.php',
        success:function(donen_deger)
        {
            document.getElementById("sno").value=donen_deger;
        },
        error:function(donen_hata_degeri)
        {
            console.log(donen_hata_degeri);
        }
    });
}
sno();

function fnokontrol()
{
    var secenek=$('input[name="secenek"]:checked').val();

    $.ajax({
        type:'POST',
        url:'fnokontrol.php',
        data:
        {
            secenek:secenek,
        },
        success:function(donen_deger)
        {
            document.getElementById("fno").value=donen_deger;
        },
        error:function(donen_hata_degeri)
        {
            console.log(donen_hata_degeri);
        }
    })
}

fnokontrol();

function tarih()
{
    $.ajax({
        type:'POST',
        url:'tarihgetir.php',
        success:function(donen_deger)
        {
            document.getElementById("tarih").value = donen_deger;
        },
        error:function(donen_hata_degeri)
        {
            console.log(donen_hata_degeri);
        }
    });
}
tarih();

function aciklamagetir()
{
    $.ajax({
        type:'POST',
        url:'faturaaciklama.php',
        success:function(donen_deger)
        {
            $("#aciklama").html(donen_deger);
            fiyatgetir();
        },
        error:function(donen_hata_degeri)
        {
            console.log(donen_hata_degeri);
        }
    })
}

function kesenkesilen()
{
    var secenek=$('input[name="secenek"]:checked').val();
    if(secenek === "satis")
    {
        document.getElementById("fno").disabled = true;
    }
    else
    {
        document.getElementById("fno").disabled=false;
    }

    fnokontrol();
    aciklamagetir();
    
    $.ajax({
        type:'POST',
        url:'kesenkesilen.php',
        data:
        {
            secenek:secenek
        },
        success:function(donen_deger)
        {
            $("#faturakesen").html(donen_deger);
        },
        error:function(donen_hata_degeri)
        {
            console.log(donen_hata_degeri);
        }
    });
}

kesenkesilen();

function fiyatgetir()
{
    var urunID = $("#aciklama").val();
    var secenek = $('input[name="secenek"]:checked').val();
    
    $.ajax({
        type:'POST',
        url:'falisfiyat.php',
        data:
        {
            urunID:urunID,
            secenek:secenek,
        },
        success:function(donen_deger)
        {
            document.getElementById("fiyat").value=donen_deger;
            tutargetir();
        },
        error: function (donen_hata_degeri)
        {
           console.log(donen_hata_degeri);
        },
    });
}


function tutargetir()
{
    var fiyat=$("#fiyat").val();
    var adet=$("#adet").val();
    var urunID=$('#aciklama').val();
    var iskonto=$('#iskonto').val();

    $.ajax({
        type:'POST',
        url:'tutargetir.php',
        data:{
            fiyat:fiyat,
            adet:adet,
            urunID:urunID,
            iskonto:iskonto,
        },
        success:function(donen_deger)
        {
            document.getElementById("tutar").value=donen_deger;
        },
        error:function (donen_hata_degeri)
        {
            console.log(donen_hata_degeri);
        }
    });
}
    
function kaydet()
{
    var fiyat=parseFloat($("#fiyat").val());
    var adet=parseInt($("#adet").val());

    if(fiyat <= 0)
    {
        Swal.fire({
            icon:'warning',
            title:'Kayıt Başarısız!',
            text:'Lütfen geçerli bir fiyat girin.',
        });
        $('#form')[0].reset();
        fiyatgetir();
        tarih();
        sno();
        fnokontrol();
        return;
    }

    if(adet <= 0)
    {
        Swal.fire({
            icon:'warning',
            title:'Kayıt Başarısız!',
            text:'Lütfen geçerli bir adet girin.',
        });
    }
        
    $.ajax({
        type:'POST',
        url:'faturakayit.php',
        data:
        {
            fkesen: $("#fkesen").val(),
            fkesilen: $("#fkesilen").val(),
            fno: $("#fno").val(),
            secenek: $('input[name="secenek"]:checked').val(),
            urunID: $("#aciklama").val(),
            fiyat: $("#fiyat").val(),
            iskonto:$("#iskonto").val(),
            adet: $("#adet").val(),
            tutar: $("#tutar").val(),
        },
        success: function(donen_deger)
        {
            //alert(donen_deger);
            if(donen_deger === "success")
            {
                Swal.fire({
                    icon:'success',
                    title:'Kayıt Başarılı!',
                    text:'Veriler başarıyla kaydedildi.',
                });
                tablogetir();
            }
            else if(donen_deger === "yok")
            {
                Swal.fire({
                    icon:'warning',
                    title:'Kayıt Başarısız!',
                    text:'Yeterli miktarda ürün bulunmamaktadır.',
                });
            }
            else
            {
                Swal.fire({
                    icon:'error',
                    title:'Kayıt Başarısız!',
                    text:'Veriler başarıyla kaydedilemedi.',
                });
            }

            $('#form')[0].reset();
            tarih();
            sno();
            fiyatgetir();
            fnokontrol();
        },
        error:function(donen_hata_degeri)
        {
            console.log(donen_hata_degeri);
        }
    });
}

function tablogetir()
{
    var veri = $('#veri').val();
    $.ajax({
        type:'POST',
        url:'faturatablo.php',
        data:
        {
            'veri': veri,
        },
        success:function(donen_deger)
        {
            $("#tablo").html(donen_deger);
        },
        error:function(donen_hata_degeri)
        {
            console.log(donen_hata_degeri);
        }
    });
}

tablogetir();


$('#veri').on('input', function() 
{
    if ($(this).val() === '') 
    {
        tablogetir();
    }
});

$('#veri').on('input', function() 
{
    if ($(this).val().length > 0) 
    { 
        tablogetir();
    }
});