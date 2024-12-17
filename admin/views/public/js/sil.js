// JavaScript Document

// $(document).ready(function () {
//     $(".sil").click(function (event) {
//         //var poz=$('#sil<?=$k;?>').val().trim();
//         var poz = $(this).attr("id");
//         alert(poz)
//         //var smstalap = $("#ulanid").val();
//         //alert('silme yeri ' +$(this).attr('id'));
//         //return false;
//         $.ajax({
//             url: "public/sil.php",
//             method: "post",
//             data: { sil: poz },
//             success: function (response) {
//                 $("#netije").html(response);
//             }, // end success func
//         });
//     }); //end doc ready
// });

// $(document).ready(function () {
//     $(".sil").click(function () {
//        // event.preventDefault(); // Bu, sayfanın yeniden yüklenmesini önler
//         var poz = $(this).attr("id");
//         var result_n=$("#result_numb").val();
//         //var r_type = $('#neden').find('option:selected').text();
//         alert(result_n);
//         $.ajax({
//             url: "public/sil.php",
//             method: "post",
//             data: { sil: poz, type_r: result_n },
//             success: function (response) {
//                 $("#netij").html(response);
//             },
//             error: function (xhr, status, error) {
//                 console.error(xhr);
//                 alert('Silme işlemi başarısız oldu!');
//             }
//         });
//     });
// });

// $(document).ready(function () {
//     $(".delete_time").click(function () {
//         //event.preventDefault(); // Bu, sayfanın yeniden yüklenmesini önler
//         var del_id = $(this).attr("id");
//         var time_l=$("#time_leave").val();
//         var time_a=$("#time_arrive").val();
//         //var r_type = $('#neden').find('option:selected').text();
//         alert(time_l + time_a);
//         $.ajax({
//             url: "public/sil.php",
//             method: "post",
//             data: { del_id: del_id, time_l: time_l, time_a:time_a },
//             success: function (response) {
//                 $("#short_time").html(response);
//             },
//             error: function (xhr, status, error) {
//                 console.error(xhr);
//                 alert('Silme işlemi başarısız oldu!');
//             }
//         });
//     });
// });


////////////////////////

$(document).ready(function () {
    // .sil sınıfına sahip elementlerin tıklama olayını dinle
    $(document).on("click", ".sil", function () {
        var poz = $(this).attr("id");
        var result_n = $("#result_numb").val();
        var row = $(this).closest("tr"); // Silinecek satırı belirle
        var exit_d = row.find("#exit_d").val();
        var entry_d = row.find("#entry_d").val();       
        

        $.ajax({
            url: "public/sil.php",
            method: "post",
            data: { sil: poz, type_r: result_n, exit_d:exit_d, entry_d:entry_d },
            success: function (response) {
                // Başarılı yanıt geldiyse satırı DOM'dan kaldır
                if (response.includes('Record deleted successfully.')) {
                    row.fadeOut(400, function() {
                        $(this).remove();
                    });
                } else {
                    // Eğer hata mesajı geldiyse ekrana yazdır
                    alert('Silme işlemi başarısız oldu: ' + response);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr);
                alert('Silme işlemi başarısız oldu!');
            }
        });
    });

    // .delete_time sınıfına sahip elementlerin tıklama olayını dinle
    $(document).on("click", ".delete_time", function () {
        var del_id = $(this).attr("id");
        var row = $(this).closest("tr");
        var time_l = row.find("#time_leave").val();
        var time_a = row.find("#time_arrive").val();

        $.ajax({
            url: "public/sil.php",
            method: "post",
            data: { del_id: del_id, time_l: time_l, time_a: time_a },
            success: function (response) {
                // Başarılı yanıt geldiyse satırı DOM'dan kaldır
                if (response.includes('Record deleted successfully.')) {
                    row.fadeOut(400, function() {
                        $(this).remove();
                    });
                } else {
                    // Eğer hata mesajı geldiyse ekrana yazdır
                    alert('Silme işlemi başarısız oldu: ' + response);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr);
                alert('Silme işlemi başarısız oldu!');
            }
        });
    });
});


/*


<?php
include_once '../config/dbase.php';

if (isset($_POST['sil'])) {
    $id = $_POST['sil'];
    $type_r = $_POST['type_r'];

    // Silme sorgusu
    $query = "DELETE FROM tablonuz WHERE id='$id'"; // Tablo ve sütun adlarını doğru şekilde ayarlayın
    if (mysqli_query($connect, $query)) {
        // Başarılı ise güncellenmiş verileri döndürün
        $result = mysqli_query($connect, "SELECT * FROM tablonuz");
        while ($row = mysqli_fetch_assoc($result)) {
            // HTML içeriği döndürün
            echo '<tr><td>' . htmlspecialchars($row['id']) . '</td><td>' . htmlspecialchars($row['name']) . '</td></tr>';
        }
    } else {
        echo 'Silme işlemi başarısız!';
    }
}
?>
Eğer AJAX ile işlemleri yapıyorsanız, event.preventDefault(); kullanarak formun sayfayı yenilemesini
 engelleyebilirsiniz. Ancak, jQuery kodunuzda bu metod zaten yorum satırı halindedir, bu yüzden AJAX çağrısı
doğru şekilde çalışıyorsa, sayfa yenilenmeyecektir.

Bu yöntemlerle silme işleminizi gerçekleştirdikten sonra aynı sayfada kalabilir ve değişikliklerinizi
 hemen görebilirsiniz. Sorularınız varsa veya başka yardıma ihtiyacınız varsa, lütfen belirtin!

*/
