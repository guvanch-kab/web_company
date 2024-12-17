<style>
    .disabled {
        pointer-events: none;
        opacity: 0.5;
    }
    .col-md-4 img{
max-width:100%;
max-height: 200px;
    }
</style>
</head>
<body>
    <?php
    $today = date('Y-m-d');
    require '../config/dbase/dbase.php';
    $categ_photo = '';
    $categ_desc = '';
    $prod_code = array();
    $categ_id = array();
    $prod_name = array();
    $price = array();
    $length_metall = array();
    $prod_id = array();
    $meter_weight = array();
    $get_prod_code = null; // Varsayılan olarak boş tanımlandı

    if (isset($_POST['bolum'])) {
        $metall_name = strtoupper($_POST['bolum']);
        $get_categ_id = null;
        $check_query = "SELECT * FROM Categories WHERE PRODUCT_FULL_NAME='$metall_name' ";
        $result = mysqli_query($connect, $check_query);

        if ($result && mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);
            $categ_photo = $row['CATEGORY_PHOTO'];
            $img_path = $row['image_path'];
            $categ_desc = $row['CATEGORY_DESC'];
            $get_prod_code = $row['PRODUCT_CODE'];
        }

        if ($get_prod_code != null) {
            $check_query = "SELECT * FROM Products WHERE PRODUCT_CODE='$get_prod_code' ";
            $result2 = mysqli_query($connect, $check_query);
            if ($result2 && mysqli_num_rows($result2) > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $prod_code[] = $row['PRODUCT_CODE'];
                    $prod_name[] = $row['PRODUCT_NAME'];
                    $price[] = $row['PRICE'];
                    $length_metall[] = $row['LENGTH_METALL'];
                    $prod_id[] = $row['PRODUCTS_ID'];
                    $meter_weight[] = $row['METER_WEIGHT'];
                }
            }
            else {
                // Ürün yoksa
                $prod_code = array(); // Boş array
            }

        }
       
    }
    ?>
<?php if (!empty($get_prod_code) && !empty($prod_code)) : ?>

    <div class="container-fluid" style="padding:10px 0px;" id="prod_metall"> <!-- sura duzenlendi -->
        <div class="row prod_metall">
            <div class="col-md-3" style="border: none;">
                <div>
                <img  style="margin-left:0px;" src="admin/pages/<?= $img_path; ?><?= $categ_photo; ?>" alt=" " class="img-fluid" />
                </div>
            </div>

            <div class="col-md-9">
                <p class="metall_desc">
                    <?= $categ_desc; ?>
                </p>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if (!empty($prod_id)) : ?>
    <div class="table-responsive" id="sTable">
        <table class="responsive-table rounded table-striped" id="sourceTable">
            
            <thead>
                <tr>
                    <!-- <th>Kody</th> -->
                    <th>Haryt ady</th>
                    <th>Tonna bahasy</th>
                    <th class="meter_square">1 metr bahasy</th>
                    <!-- <th>Metr uzynlygy</th> -->
                    <th class="metr_list">Metr</th>
                    <th>Jemi (manat)</th>
                    <th>Sargyt etmek</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($prod_code)) : ?>
                    <?php for ($i = 0; $i < count($prod_code); $i++) :

                    if($metall_name=="LIST"){

                        $net = $meter_weight[$i]/1000;
                       $baha = $price[$i] * $net;
                       $listbaha=$baha;
                       $baha=number_format(($baha/$length_metall[$i]),2);
                      // $baha=$price[$i]/$length_metall[$i];
                    }
                    else{
                        $net = 1000 / $meter_weight[$i];
                        $baha = number_format(($price[$i] / $net), 2);
                    }
                        // $net = $price[$i]/1000;
                        // $xxx = $meter_weight[$i]*$length_metall[$i];
                        // $baha=$xxx*$net;
                    ?>
                        <tr>
                            <td style="display: none;" class="product_id" data-label="Kody"><?= htmlspecialchars($prod_id[$i]) ?></td>
                             
                            <td  data-label="Haryt ady" class="sebet_haryt_ady"><?= htmlspecialchars($prod_name[$i]) ?></td>
                            <td class="ton_price" data-label="Tonna bahasy"><?= htmlspecialchars($price[$i]) ?></td>
                            <td class="meter_price" data-label="1 meter bahasy"> <?= $baha; ?> </td>
                            <td class="metall_long" style="display: none;" data-label="Metr uzynlygy"><?= htmlspecialchars($length_metall[$i]) ?></td>
                            <td data-label="Mukdary">
                            <input type="number" class="form-control metal_table_input" value="1" min="1" />
                                </td>
                            <td class="jemi" data-label="Jemi (manat)">0 </td>                            
                            <td data-label="Sargyt etmek">
                                <a href="#" class="add_card_metall"><i class="fas fa-shopping-cart" style="font-size: 24px; color: #4f75bd"></i></a>
                            </td>
                            <td  class="get_list_control" style="display: none;"><?= $metall_name ?></td>
                            <td  class="list_baha" style="display: none;"><?= $listbaha ?></td>

                        </tr>
                    <?php endfor; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <?php else: ?>
        <div class="container-fluid" style="margin: 10px 0;">
    <div class="alert alert-warning" role="alert">
        Stokda haryt yok..
    </div>
        </div>
<?php endif; ?>

    <div class="container" style="display: block; margin-bottom:2%;" id="order_table">
        <form id="orderForm">

            <div class="row">
                <div class="col-md-8" style="padding: 0px 2px;">
                    <table id="targetTable" class="responsive-table">
                        <thead>
                            <tr>
                                <th>Haryt</th>                                
                                 <th>Bahasy(metr)</th>                               
                                <th>metr / List / san</th>
                                <th>Jemi (manat)</th>
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
    </div>
    </div>
<script src="pages/js_files/sargyt_order_form.js"></script>

    <script>
       $(function() {
    $("#orderForm").on("submit", function(e) {
        e.preventDefault(); // Formun normal şekilde gönderilmesini engeller  

        // Formdan telefon numarasını al
        var phoneNumber = $(this).find('input[name="phone"]').val();

        // Telefon numarasını doğrulama
        if (!validatePhoneNumber(phoneNumber)) {
            alert("Telefon belgiňiz 8 belgili sanlar bolmaly.");
            return; // Formun gönderilmesini engeller
        }

        if (!check_phone_digit(phoneNumber)) {
        alert("Telefon belgiňiz (65,64,63,62,61,71) belgili sanlar bilen baslamaly.");
        return; // Formun gönderilmesini engeller
        }

        var rbaha = Math.floor(Math.random() * 100000);
        var cl_id = Math.random().toString(36).slice(-16) + rbaha;
        var order_id = Math.floor(Math.random() * 1000000);
        var total_sum = $("#totalSum").text();

        var formData = $(this).serialize() + "&cl_id=" + encodeURIComponent(cl_id) + "&order_id=" + encodeURIComponent(order_id) + "&total_sum=" + encodeURIComponent(total_sum);

        var allRowsData = [];
        $('#targetTable tbody tr').each(function() { // Formdan gelen veriler ile sipariş tablosunun verilerini göndermeye hazırlık
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

        // AJAX isteği gönderme
        $.ajax({
            url: "pages/orderpage/get_order.php",
            type: "POST",
            data: formData,
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
                
               // $("#orderForm")[0].reset();
            },
            error: function(xhr, status, error) {
                console.error("AJAX Hatası:", status, error);
                $("#responseMessage").html(
                    '<div class="alert alert-danger">Bir hata oluştu, lütfen tekrar deneyin.</div>'
                );
            },
        });
    });

    // Telefon numarasını doğrulayan fonksiyon
    function validatePhoneNumber(phone) {
        //const phoneDigits = phone.replace("+993 ", ""); // +993 kısmını çıkar
       // return phoneDigits.length === 12 && !isNaN(phoneDigits);
        return phone.length === 8 && !isNaN(phone);
    }

    function check_phone_digit(phone_digit) {
    const phone_num = [65, 64, 63, 62, 61, 71];
    const firstTwoDigits = Number(String(phone_digit).slice(0, 2)); // Sayıya çevir
    if (phone_num.includes(firstTwoDigits)) {
        console.log(`${firstTwoDigits} dizide mevcut.`);
        return true; // Doğruysa true döndür
    } else {
        return false; // Yanlışsa false döndür
    }
}
});
    </script>
    <script src="pages/js_files/count_storage.js"></script>      

    <script>
        $(function(){
            var metall_name = <?= json_encode($metall_name); ?>; 
            if(metall_name=="LIST"){
               
               // $(".meter_square").html(' metr  <span style="font-size:1.5em;">&sup2;</span> bahasy'); 
                $(".meter_square").html(' metr  <span style="font-size:1.5em;">&sup2;</span> bahasy'); 
                $(".metr_list").html('List sany '); 

            }
            else if(metall_name=="PROFIL") {           
            $(".metr_list").text('Boý uzynlyk'); 
            $(".meter_square").text('1 Boý bahasy');
        }
        else  {
            
            $(".metr_list").text('Metr'); 
        }

        })
    </script>      
    