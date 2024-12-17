
    $(document).ready(function() {
    $(document).on("click", ".gurlusyk_haryt", function(event) {  
        event.preventDefault(); 
        var id_value_haryt = $(this).attr("id");  
      //  alert(id_value_haryt)
        if ($(this).hasClass('gurlusyk_haryt')) {
        $.ajax({
            url: "pages/g_harytlar_link.php",
            type: "POST",
            data: { veri: id_value_haryt },  
            success: function(response) {
                console.log(response);  
                $("#g_harytlar").html(response); 
            },
            error: function() {
                alert("Menü yüklenirken hata oluştu.");
            }
        });
    }
    });
       });
