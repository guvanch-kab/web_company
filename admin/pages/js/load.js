$(document).ready(function () {

    $("#upd").hide();
    $(".add_page").click(function (event) {
        event.preventDefault();
        
        var bolum = $(this).attr("id");
        var attr_href=$(this).attr("href");

        attr_href=attr_href.split('#')
        var href_name = attr_href[1];

        var categ_split=bolum.split('.');
        bolum=categ_split[0]; 
        categ_split=categ_split[1];
       
        if (href_name && href_name.trim() !== "") { // bolum dolu mu kontrolü

        $(".page_name").html('<i class="fas fa-arrow-right"></i> '+ href_name + '  ')
        
          var url = 'pages/' + bolum + ".php?jsVariable=" + encodeURIComponent(categ_split);

        //    var url = 'pages/' + bolum + ".php"; // URL'yi belirle
        //     var dataToSend = {
        //      jsVariable: categ_split // Gönderilecek veriyi nesne olarak tanımlayın
        //     };


        $.ajax({
            url: url,
            type: "HEAD",
            success: function () {
                $("#pages_main").load(url);
            },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 404) {
                     
                        var errorAlert = $(
                            '<div class="alert alert-danger" role="alert"></div>'
                        );
                        errorAlert.text(
                            "Talap edilyan sahypa (" + url + ") tapylmady. (404 Not Found)" );

                        $("#pages_main").empty(); 
                        $("#pages_main").append(errorAlert);
                    } else {
                       
                        console.error("Error:", textStatus, errorThrown);
                    }
                },
            });
        }
    });
});
