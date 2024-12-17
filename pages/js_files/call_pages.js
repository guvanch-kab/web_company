

export function call_constr(){

    $(".pages").click(function (event) {
        event.preventDefault();
        var bolum = $(this).attr("id");

        if (bolum) { 
            
            // Görünürlükleri ayarla
            $("#cont_owl").hide();
            $("#ordered_table").hide(); 
            $("#products").show(); 

            $(".call_page").html(`         
            <h2 class="metall_page_title">${bolum.toUpperCase()}</h2>        
        `);
            // shopping-link click olayını dinle
            // $('#shopping-link').off('click').on('click', function() {
            //     checkCartStatus(); // Sepet durumunu kontrol et
            // });

            var url = 'pages/' + bolum + ".php";
            $.ajax({
                url: url,
                type: "GET", // GET methodu kullanılarak JSON formatında verileri alır
                dataType: "json",
                success: function (data) {
                    // Veriyi al ve şablona uygula
                    $("#products").empty(); // Önceki içeriği temizle
                    $("#productTemplate").tmpl({ deger: data }).appendTo("#products");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 404) {
                        // 404 hatası için Bootstrap uyarısı oluştur
                        var errorAlert = $('<div class="alert alert-danger" role="alert"></div>');
                        errorAlert.text("Talep edilen sayfa (" + url + ") bulunamadı. (404 Not Found)");
                        $("#products").empty(); // Önceki içeriği temizle (isteğe bağlı)
                        $("#products").append(errorAlert);
                    } else {
                        // Diğer hataları işle (isteğe bağlı)
                        console.error("Error:", textStatus, errorThrown);
                    }
                }
            });
        }
    });

}


$(document).ready(function () {
    
 call_constr()  
});

