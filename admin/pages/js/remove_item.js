$(document).ready(function () {
    $(".sil").click(function (event) {
        event.preventDefault(); // Varsayılan davranışı engelle

        var poz = $(this).attr("id"); // Silme işlemi yapılacak ID'yi al
        var img_path=$("#image_path").val();

        var split_val=poz.split(".");
        var categ_no=split_val[0];
        var sira_no=split_val[1];     

        var rowToDelete = $(this).closest('tr'); // Silinecek satırı yakala

        $.ajax({
            url: "pages/remove_item.php",
            method: "post",
            data: { categ_no: categ_no, sira_no:sira_no, img_path:img_path },
            success: function (response) {
               // console.log("Response from PHP: ", response);  
                if (response.trim() === "Success") {
                  //  console.log(response); 
                   
                   rowToDelete.remove(); 
                } else {
                    
                    alert("Couldn't delete : " + response);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Hatası: " + status + " - " + error);
            }
        });
    });

    $(".sil_del").click(function (event) {
        event.preventDefault(); 
          var poz = $(this).attr("id"); // Silme işlemi yapılacak ID'yi al        
        //alert(poz)
        var rowToDelete = $(this).closest('tr'); // Silinecek satırı yakala
        $.ajax({
            url: "pages/remove_item.php",
            method: "post",
            data: { sil_del: poz },
            success: function (response) {
                console.log("Response from PHP: ", response);  
                if (response.trim() === "Success") {
                    console.log(response); 
                   
                   rowToDelete.remove(); 
                } else {                    
                    alert("Couldn't delete : " + response);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Hatası: " + status + " - " + error);
            }
        });
    });

});
