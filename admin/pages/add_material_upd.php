<?php
include_once '../db/dbase.php';

$query = "SELECT * FROM Categories WHERE CATEGORY_ID='6' ";
$result = mysqli_query($conn, $query);
$categ_id2 = array();
$prod_code2=array();
$prod_full_name2=array();
//$grupba_ady=array();

if ($result->num_rows > 0) {
    // Veritabanından çekilen her satırı ilgili dizilere ekliyoruz
    while ($row = $result->fetch_assoc()) {
        $categ_id2[] = $row['CATEGORY_ID'];      
        $prod_full_name2[] = $row['PRODUCT_FULL_NAME'];       
        $prod_code2[]=$row['PRODUCT_CODE'];
       // $grupba_ady[]=$row['Grupba_ady'];
    }
}
?>
<div class="container-fluid mt-2">  
   
    <div class="row" style="padding: 10px 0;">
    <div class="col-md-3">
     <select class="form-control categ_select2" id="categ_select2" style="margin-bottom:12px;font-size:14px" required>
                <option selected disabled value="" id="replace_active">Haryt görnüşi</option>
                <?php if (!empty($categ_id2)) : ?>
                    <?php for ($i = 0; $i <count($categ_id2); $i++) : ?>                     
                        <option value="<?= htmlspecialchars($categ_id2[$i]) ?>" data-name="<?= htmlspecialchars($prod_code2[$i]) ?>">
                <?= htmlspecialchars($prod_full_name2[$i]) ?>
            </option>
                <?php endfor; ?>
                            <?php endif; ?>                
            </select>         
            </div> 
<div class="col-md-8" id="get_update_goods">
<!-----------------------------start update image---------------------------------->



<!------------------------end update image--------------------------------------->
</div>

  </div> <!--end Row-->
</div>

<script>
   $(document).ready(function(){
        $(".categ_select2").change(function(e) {       
            e.preventDefault();    
            var prod_code_name = $(".categ_select2 option:selected").data('name');
            var categ_id = $("#categ_select2").val();
            var selectedText = $("#categ_select2 option:selected").text();      
 
            
            if (prod_code_name) {
                $.ajax({
                    type: 'POST',
                    url: 'pages/add_material_upd.php', // PHP dosyası
                    data: { prod_code_name: prod_code_name },
                    cache: false, // Önbellekleme kapalı
                    success: function(response) {              
                        $('#update_materials').empty();  // Önce tablo içeriğini temizle
                        $('#update_materials').html(response);
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

if (isset($_POST['prod_code_name'])) {
    $prod_code_name = mysqli_real_escape_string($conn, $_POST['prod_code_name']);
    
    // Sorguyu hazırlayıp çalıştır
    $query = "SELECT * FROM Products WHERE PRODUCT_CODE = '$prod_code_name'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
?>

<table class="table table-bordered">
                <thead style="background-color:#008a8a;">
                    <tr>
                         <th>Product code</th>
                         <th>Barcode code</th>
                        <th>Name</th>
                        <th>Short Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>   
                        <th> Surat uytget ady</th>                     
                        <th>Stock</th>
                        <th> Grupba ady</th>      
                        <th> New</th>              
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
<?php
            while ($row = mysqli_fetch_assoc($result)) {
?>
 <tr>              
                <td><input autocomplete="off" type="text" id="PRODUCT_CODE" name="prod_code[]" class="form-control ramkasyz " value="<?= htmlspecialchars($row['PRODUCT_CODE'] ?? '') ?>"></td>
                <td><input autocomplete="off" type="text" id="BARKOD_NO" name="barcod_name[]" class="form-control ramkasyz " value="<?= htmlspecialchars($row['BARKOD_NO'] ?? '') ?>"></td>
                <td><input autocomplete="off" type="text" id="PRODUCT_NAME" name="prod_name[]" class="form-control ramkasyz " value="<?= htmlspecialchars($row['PRODUCT_NAME'] ?? '') ?>"></td>
                <td><input autocomplete="off" type="text" id="SHORT_DESC" name="short_desc[]" class="form-control ramkasyz" value="<?= htmlspecialchars($row['SHORT_DESC'] ?? '') ?>"></td>
                <td><input autocomplete="off" type="text" id="PRICE"     name="price[]" class="form-control ramkasyz aciklama_font" value="<?= htmlspecialchars($row['PRICE'] ?? '') ?>"></td>
              
                <td><input autocomplete="off" type="text" id="QUANTITY" name=" quantity[]" class="form-control ramkasyz" value="<?= htmlspecialchars($row['QUANTITY'] ?? '')  ?>"></td>
                <td style="max-width:10%; width:100%;">  <img style="width:100px;" class="card-img-top" src="pages/<?= htmlspecialchars($row['image_path'] ?? '')  ?><?= htmlspecialchars($row['image'] ?? '')  ?> " alt="Product Image" > </td>
                 <td style="display: none;"><input autocomplete="off" type="text" id="image_path" name="image_path[]" class="form-control ramkasyz " value="<?= htmlspecialchars($row['image_path'] ?? '') ?>"></td>
                 <td>
                 <input type="file"  class="form-control-file" id="<?=$row['custom_product_id'];?>" accept="image/*">
                </td>                
                
                 <td><input autocomplete="off" type="text" id="STOCK_AMOUNT" name="stock_amount[]" class="form-control ramkasyz" value="<?= htmlspecialchars($row['STOCK_AMOUNT'] ?? '') ?>"></td>
                 <td><input  type="text" id="grupba_ady" name="grupba_ady[]" class="form-control ramkasyz" value="<?= htmlspecialchars($row['Grupba_ady']) ?>"></td>
                 <td><input  type="text" id="Taze" name="Taze[]" class="form-control ramkasyz" value="<?= ($row['Taze']) ?>"></td>
                 
                <td style="display: none;"><input  type="hidden" id="codemetall" name="codemetall[]" class="codeitems" value="<?= htmlspecialchars($row['custom_product_id']) ?>"></td>
                
<td>
                <a  id="<?=$row['custom_product_id'];?>.3" class="btn btn-outline-danger btn-sm sil" data-bs-toggle="tooltip" 
                data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger" data-bs-title="Delete" >
                 <i class="fas fa-trash trash-icon"></i></td>
                </a>

                </td>    
            
            </tr>
                 <?php
            }
            echo '</tbody></table>';
        } else {
            echo '<tr><td colspan="11">Bu kategoriye ait veri yok</td></tr>';
        }
    }
?>

<script>
$(function () { 
var getVariable;
   $(".ramkasyz").change(function(){
    change_number = $(this).val(); // use $(this) to reference the current input field with the class 'ramkasyz'                                   
    var code = $(this).closest('tr').find('.codeitems').val();
    var idno = $(this).attr('id');   
    $.ajax({
                url: 'pages/desc_upd.php',
                 method: 'post',
                 data: {
                 change_number: change_number,
                 codeid: code,
                idno:idno                                           
                 }, 
                success: function(response) {
                $("#result_change").html(response);

                 } // end success func
                  });    
}) 
 })
    </script>

<script>

$(document).on('change', '.form-control-file', function() {
    var fileInput = $(this);            // The input element
    var prod_img = fileInput[0].files[0];   // The selected file
    var prod_id = fileInput.attr('id');      // The id of the input element

    if (!prod_img) {
        alert("Lütfen bir dosya seçin.");
        return;
    }

    // Create a FormData object to handle file data
    var formData = new FormData();
    formData.append('prod_img', prod_img);  // Append the file
    formData.append('prod_id', prod_id);      // Append the id

    $.ajax({
        url: 'pages/desc_upd.php',
        method: 'post',
        data: formData,
        processData: false,  // Prevent jQuery from processing the data
        contentType: false,  // Set content type to false as jQuery will tell the server it's a file upload
        success: function(response) {
            $("#result_change").html(response);
        },
        error: function() {
            alert("Veri gönderilirken bir hata oluştu.");
        }
    });
});

</script>


    <script src="pages/js/remove_item.js"></script>
<div id="result_change"></div>

