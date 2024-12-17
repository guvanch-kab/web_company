<style>
    .disabled {
        pointer-events: none;
        opacity: 0.5;
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

    if (isset($_POST['metallar'])) {
        $metall_name = strtoupper($_POST['metallar']);
        $get_categ_id = null;
        $check_query = "SELECT * FROM Categories WHERE NAME='$metall_name' ";
        $result = mysqli_query($connect, $check_query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $categ_photo = $row['CATEGORY_PHOTO'];
            $categ_desc = $row['CATEGORY_DESC'];
            $get_categ_id = $row['CATEGORY_ID'];
        }

        if ($get_categ_id != null) {
            $check_query = "SELECT * FROM Products WHERE CATEGORY_ID='$get_categ_id' ";
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
        }
    }
    ?>
    <div class="container-fluid" style="padding:10px 0px;" id="prod_metall"> <!-- sura duzenlendi -->
        <div class="row prod_metall">
            <div class="col-md-4">
                <img src="pages/images/irons/<?= $categ_photo; ?>" alt="Sol Taraf Resim" class="img-fluid rounded" />
            </div>
            <div class="col-md-8">
                <p class="metall_desc">
                    <?= $categ_desc; ?>
                </p>
            </div>
        </div>
    </div>

    <div class="table-responsive" id="sTable">
        <table class="responsive-table rounded table-striped" id="sourceTable">
            <colgroup>
                <col style="width: 10%; text-align:center" />
                <col style="width: 15%;" />
                <col style="width: 12%;" />
                <col style="width: 10%;" />
                <col style="width: 10%;" />
                <col style="width: 10%;" />
                <col style="width: 12%;" />
                <col style="width: 10%;" />
                <col style="width: 12%;" />
            </colgroup>
            <thead>
                <tr>
                    <th>Kody</th>
                    <th>Haryt ady</th>
                    <th>Tonna bahasy</th>
                    <th>1 meter bahasy</th>
                    <th>Metr uzynlygy</th>
                    <th>Mukdary</th>
                    <th>Agramy</th>
                    <th>Jemi (manat)</th>
                    <th>Sargyt etmek</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($prod_id)) : ?>
                    <?php for ($i = 0; $i < count($prod_id); $i++) :
                        $net = 1000 / $meter_weight[$i];
                        $baha = $price[$i] / $net;
                    ?>
                        <tr>
                            <td data-label="Kody"><?= htmlspecialchars($prod_id[$i]) ?></td>
                            <td data-label="Haryt ady" class="sebet_haryt_ady"><?= htmlspecialchars($prod_name[$i]) ?></td>
                            <td class="ton_price" data-label="Tonna bahasy"><?= htmlspecialchars($price[$i]) ?></td>
                            <td class="meter_price" data-label="1 meter bahasy"> <?= $baha; ?> </td>
                            <td class="metall_long" data-label="Metr uzynlygy"><?= htmlspecialchars($length_metall[$i]) ?></td>
            <td style="display: none;" class="metall_weight" data-label="Weight"><?= htmlspecialchars($meter_weight[$i]) ?></td>
                            <td data-label="Mukdary">
                                <input type="number" class="form-control metal_table_input" value="1" min="1" />
                            </td>
                            <td class="agramy" data-label="Agramy">0</td>
                            <td class="jemi" data-label="Jemi (manat)">0</td>
                            <td data-label="Sargyt etmek">
                                <a href="#" class="add_card_metall"><i class="fas fa-shopping-cart" style="font-size: 24px; color: #4f75bd"></i></a>
                            </td>
                        </tr>
                    <?php endfor; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

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
                    <table id="targetTable" class="responsive-table">
                        <thead>
                            <tr>
                               
                                <th>Haryt</th>
                                <th></th>
                                <th>Bahasy (metr)</th>                               
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

                    <div class="card card-success">
                        <div class="card-header sargyt_formy">
                            <h5 class="card-title">Sargyt formy</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" style="margin-bottom: 10px" class="form-control" id="name" name="name" required placeholder="ady" autocomplete="off" />
                            <input type="text" style="margin-bottom: 10px" class="form-control" id="surname" name="surname" required placeholder="familiasy" autocomplete="off" />
                            <!-- <input type="email" class="form-control" id="email" name="email"  placeholder="email" autocomplete="off">
                  <br> -->
                            <input type="phone" style="margin-bottom: 10px" class="form-control" id="phone" name="phone" required placeholder="telefony" autocomplete="off" />
                            <select class="form-control" style="margin-bottom: 10px" name="select_region" id="select_region">
                                <option>Asgabat 1</option>
                                <option>Änew</option>
                                <option>Gökdepe</option>
                            </select>
                            <textarea style="margin-bottom: 10px" name="home_address" id="home_address" class="form-control" rows="3"
                                placeholder="öý salgysy ..."></textarea>
                            <input type="date" class="form-control" min="<?= $today; ?>" id="date" name="date" required />
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div id="responseMessage" class="mt-3"></div>

                    <div class="order_total_sum" style="display: flex; justify-content: flex-end; padding: 10px 0px">
                        <div class="cart-total" style="text-align: right">
                            <h6 style="padding-bottom: 3px">
                                Jemi baha: <span id="totalSum"></span> manat
                            </h6>
                            <button id="checkout-btn" class="btn btn-primary sargyt_et">Sargyt et</button>
                        </div>
                    </div>
        </form>
    </div>
    </div>

    <script>
        $(function() {

            $("#orderForm").on("submit", function(e) {
                e.preventDefault(); // Formun normal şekilde gönderilmesini engeller      
                var rbaha = Math.floor(Math.random() * 100000);
                var cl_id = Math.random().toString(36).slice(-16) + rbaha;

                var order_id = Math.floor(Math.random() * 1000000);
                var total_sum = $("#totalSum").text();
alert(total_sum)
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
        
