
<?php

include '../config/dbase/dbase.php';



// $host = 'localhost';
// $dbname = 'kendirweb';
// $username = 'root';
// $password = 'kabul';
// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM Products WHERE CATEGORY_ID = 8");
echo'
<div class="row rowdesign mt-2" id="boyaglar_page" style="padding:15px; border:1px solid #fff; background-color: #fff;">';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   
    echo'<div class="col-md-3 card_text" style="padding:1px;">
        <div class="product_cart">
      
        <img src="pages/images/' . htmlspecialchars($row['image_path']) . '/' . htmlspecialchars($row['image']) . '" alt="Product Image" >
        
            <p style="font-size:18px; margin:8px;">Product: ' . htmlspecialchars($row['PRODUCT_NAME']) . '</p>

            <div class="prod_desc" style="color: #676767; font-size:14px; margin:8px; height: 40px">Product Desc: ' . $row['PROD_DESC'] . '</div>

            <div style="padding:2px 2px; text-align: right;">
              <h5 class="price"> '. htmlspecialchars($row['PRICE']) .' </h5><br>
                <a href="#" class="btn_shop_svg sebede_gosh">
                    <img src="pages/images/icons/shopping-cart.svg" class="shopping-cart-icon" alt="Shopping Cart">
                    <span>Sebede goş</span>
                </a>
            </div>
        </div>
    </div>';    
    }
    echo'</div>';
// } catch (PDOException $e) {
//     echo "db connection failed: " . $e->getMessage();
// }
?>
<div id="empty_cart" style="width: 100%;display: none;">
        <div class="empty_cart" style="width: 100%;display: flex; justify-content: center; justify-items: end; align-items: center;">
            <img src="/pages/images/icons/empty.svg" alt="Hello world" height="250px" style="display: block;" />

            <p class="font-weight-bold">Sebediniz boş!</p>
        </div>
    </div>


    <div class="container" style="display: block; margin-top:2%; margin-bottom:2%;" id="order_table">
        <form id="orderForm">

            <div class="row">
                <div class="col-md-8" style="padding: 0px 2px;">
                    <table id="targetTable" class="responsive-table target_table">
                        <thead>
                            <tr>                              
                            <th>Haryt</th>
                                <th></th>
                                <th>Bahasy</th>                               
                                <th>Mukdary</th>
                                <th>Jemi (manat)</th>
                                <!-- <th>Agramy</th> -->
                                <th>Poz</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Veriler buraya aktarılacak -->
                        </tbody>
                    </table>

                    <div style="padding:25px 2px; text-align: right;">
                        <a href="#" class="btn btn-dark" style="text-decoration: none;" id="clear_shop_cart">
                            <i class="fas fa-trash" style="font-size: 16px; color: #ffffff; margin-right: 8px; margin-left:4px"></i>
                            <span style="vertical-align: middle; color: #ffffff;">Sebedi bosalt</span>
                        </a>
                    </div>


                </div><!--end col-md-8-->

                <div class="col-md-4" id="order_form" style="padding-right: 10px;">
                    <!------------------------------ form place------------------------->

      
        </form>
        <script src="pages/js_files/sargyt_order_form.js"></script>
    </div>
    <script>
        $(function() {
            $("#orderForm").on("submit", function(e) {
                e.preventDefault(); // Formun normal şekilde gönderilmesini engeller      
                var rbaha = Math.floor(Math.random() * 100000);
                var cl_id = Math.random().toString(36).slice(-16) + rbaha;

                var order_id = Math.floor(Math.random() * 1000000);
                var total_sum = $("#totalSum").text();

                var formData = $(this).serialize() + "&cl_id=" + encodeURIComponent(cl_id) + "&order_id=" + encodeURIComponent(order_id) + "&total_sum=" + encodeURIComponent(total_sum);

                var allRowsData = [];
                $('#targetTable tbody tr').each(function() { // Formdan gelen veriler ile siparisi tablosunnun verilerini gondermeye hazirlik
                    var rowData = {
                       prod_id: $(this).find('td:eq(0)').text(),
                        name: $(this).find('td:eq(1)').text(),
                        meterPrice: parseFloat($(this).find('td:eq(2)').text()),
                        length: $(this).find('td:eq(3)').text(),
                        quantity: $(this).find('td:eq(4) input').val(),
                        totalForRow: parseFloat($(this).find('td:eq(5)').text())
                    };
                    allRowsData.push(rowData);
                });
                formData += "&rows=" + encodeURIComponent(JSON.stringify(allRowsData));
                // console.log(formData);

                ///////////////////////////////////////////////    AJAX  ////////////////////////////////////////////////////
                
                $.ajax({
                    url: "pages/orderpage/get_order.php",
                    type: "POST",
                    data: formData, // cl_id dahil edilmiş form verileri  // data: $(this).serialize(),
                    
                    success: function(response) {
                        $("#order_table").html(response);                
                        $("#shopping-count").text("0");
                        $('.prod_metall').hide()

                        localStorage.removeItem('targetTableData');
                        localStorage.removeItem('shoppingLinkClicked');
                        localStorage.removeItem('shoppingCart');
                        localStorage.removeItem('shoppingCartCount');

                        $(".close").on("click", function() {
                            $(this).closest(".alert").fadeOut();
                            localStorage.removeItem('loadedContent');

                            setTimeout(() => {
                                window.location.href = 'index.html'; // Sayfayı index.html'e yönlendirir
                            }, 1000);

                        });
                        $("#orderForm")[0].reset();
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Hatası:", status, error);
                        $("#responseMessage").html(
                            '<div class="alert alert-danger">Bir hata oluştu, lütfen tekrar deneyin.</div>'
                        );
                    },
                });
            });

        });
    </script>
<script src="pages/js_files/count_storage.js"></script>


