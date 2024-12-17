<?php
include_once '../db/dbase.php';

$query = "SELECT * FROM Categories WHERE CATEGORY_NAME='Metalprokat' ";
$result = mysqli_query($conn, $query);
$categ_id2 = array();
$prod_code2 = array();
$prod_full_name2 = array();

if ($result->num_rows > 0) {
    // Veritabanından çekilen her satırı ilgili dizilere ekliyoruz
    while ($row = $result->fetch_assoc()) {
        $categ_id2[] = $row['CATEGORY_ID'];
        $prod_full_name2[] = $row['PRODUCT_FULL_NAME'];
        $prod_code2[] = $row['PRODUCT_CODE'];
    }
}
?>
<div class="container-fluid mt-2 ">

    <div class="row" style="padding: 10px 0;">
        <div class="col-md-3">
            <select class="form-control categ_select2" id="categ_select2" style="margin-bottom:12px;font-size:14px" required>
                <option selected disabled value="" id="replace_active">Metal görnüşi</option>
                <?php if (!empty($categ_id2)) : ?>
                    <?php for ($i = 0; $i < count($categ_id2); $i++) : ?>
                        <option value="<?= htmlspecialchars($categ_id2[$i]) ?>" data-name="<?= htmlspecialchars($prod_code2[$i]) ?>">
                            <?= htmlspecialchars($prod_full_name2[$i]) ?>
                        </option>
                    <?php endfor; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="col-md-8"></div>
    </div> <!--end Row-->
</div>

<script>
    $(document).ready(function() {
        $(".categ_select2").change(function(e) {
            e.preventDefault();
            var prod_code_name = $(".categ_select2 option:selected").data('name');
            var categ_id = $("#categ_select2").val();
            var selectedText = $("#categ_select2 option:selected").text();

            if (prod_code_name) {
                $.ajax({
                    type: 'POST',
                    url: 'pages/add_metall_update.php', // PHP dosyası
                    data: {
                        prod_code_name: prod_code_name
                    },
                    cache: false, // Önbellekleme kapalı
                    success: function(response) {
                        $('#update_mtall').empty(); // Önce tablo içeriğini temizle
                        $('#update_metall').html(response);
                        $("#replace_active").text(selectedText);
                    },
                    error: function() {
                        alert("Veri yüklenirken bir hata oluştu.");
                    }
                });
            }
        });
    });
</script>

<?php
// try {
//     $pdo = new PDO('mysql:host=localhost;dbname=kendirweb;charset=utf8', 'root', 'kabul');
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die('connection failed: ' . $e->getMessage());
// }

// AJAX çağrısından gelen verileri kontrol et
if (isset($_POST['prod_code_name'])) {
    $prod_code_name = $_POST['prod_code_name'] ?? '';

    if (!empty($prod_code_name)) {
        $query = $pdo->prepare("SELECT * FROM Products WHERE PRODUCT_CODE = :prod_code_name");
        $query->bindParam(':prod_code_name', $prod_code_name, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($results) {
?>
            <div class="container-fluid">
                <table class="table table-bordered">
                    <thead style="background-color:#008a8a;">
                        <tr>
                            <th>Name</th>
                            <th>Short Description</th>
                            <th>Price</th>
                            <th>Length</th>
                            <!-- <th>Quantity</th> -->
                            <th>Image</th>
                            <th>Img Path</th>
                            <th>Stock</th>
                            <th>Meter</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($results as $row) {
                        ?>
                            <tr>
                                <td><input autocomplete="off" type="text" id="PRODUCT_NAME" name="prod_name[]" class="form-control ramkasyz " value="<?= htmlspecialchars($row['PRODUCT_NAME'] ?? '') ?>"></td>
                                <td><input autocomplete="off" type="text" id="SHORT_DESC" name="short_desc[]" class="form-control ramkasyz" value="<?= htmlspecialchars($row['SHORT_DESC'] ?? '') ?>"></td>
                                <td><input autocomplete="off" type="text" id="PRICE" name="price[]" class="form-control ramkasyz aciklama_font" value="<?= htmlspecialchars($row['PRICE'] ?? '') ?>"></td>
                                <td><input autocomplete="off" type="text" id="LENGTH_METALL" name="length_metall[]" class="form-control ramkasyz" value="<?= htmlspecialchars($row['LENGTH_METALL'] ?? '') ?>"></td>
                                <!-- <td><input autocomplete="off" type="text" id="QUANTITY" name=" quantity[]" class="form-control ramkasyz" value="<?= htmlspecialchars($row['QUANTITY'] ?? '')  ?>"></td> -->
                                <td><input autocomplete="off" type="text" id="image" name="images[]" class="form-control ramkasyz aciklama_font" value="<?= htmlspecialchars($row['image'] ?? '') ?>"></td>
                                <td><input autocomplete="off" type="text" id="image_path" name="image_path[]" class="form-control ramkasyz " value="<?= htmlspecialchars($row['image_path'] ?? '') ?>"></td>
                                <td><input autocomplete="off" type="text" id="STOCK_AMOUNT" name="stock_amount[]" class="form-control ramkasyz" value="<?= htmlspecialchars($row['STOCK_AMOUNT'] ?? '') ?>"></td>
                                <td><input autocomplete="off" type="text" id="METER_WEIGHT" name="meter_weight[]" class="form-control ramkasyz" value="<?= htmlspecialchars($row['METER_WEIGHT'] ?? '')  ?>"></td>

                                <td style="display: none;"><input type="hidden" id="codemetall" name="codemetall[]" class="codeitems" value="<?= htmlspecialchars($row['custom_product_id']) ?>"></td>

                                <td>
                                    <a id="<?= $row['custom_product_id']; ?>.2" class="btn btn-outline-danger btn-sm sil" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger" data-bs-title="Delete">
                                        <i class="fas fa-trash trash-icon"></i>
                                </td>
                                </a>
                                </td>

                            </tr>
            <?php
                        }
                        echo '</tbody></table>
            </div>';
                    } else {
                        echo '<tr><td colspan="11">Bu kategoriye ait veri yok</td></tr>';
                    }
                }
            }
            ?>
            <script>
                $(function() {
                    var getVariable;
                    $(".ramkasyz").change(function() {
                        change_number = $(this).val(); // use $(this) to reference the current input field with the class 'ramkasyz'                                   
                        var code = $(this).closest('tr').find('.codeitems').val();
                        var idno = $(this).attr('id');


                        $.ajax({
                            url: 'pages/desc_upd.php',
                            method: 'post',
                            data: {
                                change_number: change_number,
                                codeid: code,
                                idno: idno
                            },
                            success: function(response) {
                                $("#result_change").html(response);

                            } // end success func
                        });
                    })
                })
            </script>

            <script src="pages/js/remove_item.js"></script>

            <div id="result_change"></div>