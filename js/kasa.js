$(document).ready(function() {
    tarihgetir();

    devir($("#tarih").val());

    $("#arama").hide();

});


function tarihgetir() 
{
    $.ajax({
        type: "POST",
        url: "tarihgetir.php",
        success: function (donen_deger) 
        {
            document.getElementById("tarih").value = donen_deger;
            tablo($("#tarih").val()); 
                
            $('#tarih').change(function() { 
                tablo($(this).val()); 
            }); 

           tutar($("#tarih").val());

            $('#tarih').change(function() {
                tutar($(this).val()); 
            });
                

            devir($("#tarih").val());

            $('#tarih').change(function() {
                devir($(this).val()); 
            });
        },
        error:function(donen_hata_degeri){
            console.log(donen_hata_degeri);
        }
    });
}
tarihgetir();

$("#kayit").click(function(){
    var gelir=$('#gelir').val();
    var gider=$('#gider').val();
    var aciklama=$('#aciklama').val();

    if(aciklama<=0)
    {
        Swal.fire({
            icon: 'warning',
            title: 'Kayıt Başarısız!',
            text: 'Açıklama giriniz.',
        });
        document.getElementById("form").reset();
        tarihgetir();
    }
    else if((gelir<=0) && (gider<=0))
    {
        Swal.fire({
            icon: 'warning',
            title: 'Kayıt Başarısız!',
            text: 'Gelir veya gider giriniz.',
        });
        document.getElementById("form").reset();
        tarihgetir();
    }
    else
    {
        $.ajax({
            type:'POST',
            url:'kasakayit.php',
            data: 
            {
                tarih: $('#tarih').val(),
                aciklama: aciklama,
                gelir: gelir,
                gider: gider,
            },
            success: function(donen_deger) 
            {
                if(donen_deger === "success")
                {
                    Swal.fire({
                        icon:'success',
                        title:'Kayıt Başarılı!',
                        text:'Veriler başarıyla kaydedildi.',
                    });
                    tablo();
                }
                else
                {
                    Swal.fire({
                        icon:'error',
                        title:'Kayıt Başarısız!',
                        text:'Veriler başarıyla kaydedilmedi.',
                    });
                }
            },
            error:function(donen_hata_degeri){
                console.log(donen_hata_degeri);
            }
        });
    }
    return false;
});

$("#aciklama").click(function(e)
{
    if(!document.getElementById("gelir").value>=0 || !document.getElementById(gider).value>=0)
    {
        document.getElementById("gelir").value=0;
        document.getElementById("gider").value=0;
    }
});


$("#tarih").click(function(e){
    if(!document.getElementById("gelir").value>=0 || !document.getElementById("gider")>=0)
    {
        document.getElementById("gelir").value=0;
        document.getElementById("gider").value=0;
    }
});


$("#gelir").click(function (e) 
{
    if(document.getElementById("gider").value>0)
    {
        document.getElementById("gider").value=0;
    }
    document.getElementById("gelir").value="";
    document.getElementById("gider").value=0;
});

$("#gider").click(function (e){
    if(document.getElementById("gelir").value>0)
    {
        document.getElementById("gelir").value=0;
    }
    document.getElementById("gider").value="";
    document.getElementById("gelir").value=0;
});


function tablo(tarih) {
    $.ajax({
        type: 'POST',
        url: 'kasatablo.php',
        data: {
            tarih: tarih,
        },
        success: function(donen_deger) {
            $("#icerik").empty();
            $("#icerik").append(donen_deger);
        },
        error:function(donen_hata_degeri){
            console.log(donen_hata_degeri);
        }
    });
}

function devir(tarih){
    $.ajax({
        type:'POST',
        url:'devir.php',
        data:{
            tarih:tarih,
        },
        success:function(donen_deger){
            $('#devir').html(donen_deger);
        },
        error:function(donen_hata_degeri){
            console.log(donen_hata_degeri);
        },
    });
}

function tutar(tarih)
{
    $.ajax({
        type:'POST',
        url:'kasakalan.php',
        data:{
            tarih:tarih,
        },
        success:function(donen_deger)
        {
            $('#tutar').html(donen_deger);
        },
        error:function(donen_hata_degeri){
            console.log(donen_hata_degeri);
        }
    });
}

