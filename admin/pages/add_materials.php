<style>
    input::placeholder {
    font-size: 12px; 
    font-style: italic;
    opacity: 1; 
}
textarea::placeholder {
    color: #a9a9a9; 
    font-size: 12px; 
    font-style: italic; 
    opacity: 1; 
}
.upd_link a:hover{

color:#d2eac6 ;
}
.update_click{
box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;   
padding: 2px 0; 

}
.upd_link {
background-color:#008a8a;
line-height:42px;
padding: 0 14px;
border-radius: 3px;
}
</style>
<?php
include_once '../db/dbase.php';
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['jsVariable'])) {

   // $categ_mater_id = isset($_POST['jsVariable']) ? $_POST['jsVariable'] : '';
   $categ_mater_id = $_GET['jsVariable'];  // JS değişkeni PHP'ye atandı 

    // echo '<pre>';
	// print_r($_GET);
	// echo '</pre>';

   // echo "Aldığınız veri: " . htmlspecialchars($categ_mater_id);

$query = "SELECT * FROM Categories WHERE CATEGORY_ID='$categ_mater_id' ";
$result = mysqli_query($conn, $query);
$categ_id = array();
$categ_name = array();
$categ_photo = array();
$categ_desc = array();
$img_path = array();
$parent_id=array();
$categ_name=array();
$prod_code=array();
$prod_name=array();
$quantity=array();


if ($result->num_rows > 0) {
    // Veritabanından çekilen her satırı ilgili dizilere ekliyoruz
    while ($row = $result->fetch_assoc()) {
        $categ_id[] = $row['CATEGORY_ID'];
        $categ_name[] = $row['CATEGORY_NAME'];
        $prod_full_name[] = $row['PRODUCT_FULL_NAME'];
        $categ_photo[] = $row['CATEGORY_PHOTO'];
        $categ_desc[] = $row['CATEGORY_DESC'];
        $img_path[] = $row['image_path'];
        $prod_code[]=$row['PRODUCT_CODE'];
       // $quantity[]=$row['QUANTITY'];
    }
}
}
?>
    <div class="container-fluid mt-2 ">

    <div class="col update_click"  style=" border-top:1px solid #008a8a; border-bottom:1px solid #d7ffff;">
<strong class="upd"><a href="#" style="color:#d9ffff; " class="upd_link" id="upd" >Update Materils</a></strong>
    </div>

    <div class="main_place_upd">

    <form id="add_Product" enctype="multipart/form-data">    

    <div class="row" style="padding: 10px 0;">

    <div class="col">
    <label for="exampleFormControlSelect1">Subkategoriya</label>
    <select class="form-control" id="categ_select" style="margin-bottom:12px;font-size:14px" required>
                <option selected disabled value="">Subkategoriya sayla</option>
                <?php if (!empty($categ_id)) : ?>
                    <?php for ($i = 0; $i <count($categ_id); $i++) : ?>
                     
                        <option value="<?= htmlspecialchars($categ_id[$i]) ?>" data-name="<?= htmlspecialchars($prod_code[$i]) ?>">
                <?= htmlspecialchars($prod_full_name[$i]) ?>
            </option>

                <?php endfor; ?>
                            <?php endif; ?>                
            </select>
            </div>            

    <div class="col">
    <label for="name">Haryt Ady:</label>
      <input type="text" class="form-control" placeholder="Haryt Ady" autocomplete="off" id="name" name="prod_name" required>
    </div>    

    <!-- <div class="col">
    <label for="name">Grupba ady: (diskler, elektrogurallar...)</label>
      <input  type="text" class="form-control" placeholder="Grupba ady" autocomplete="off" id="grupba_ady" name="grupba_ady" required>
    </div>   -->

    <div class="col">
    <label for="grupba_ady">Grupba ady: (diskler, elektrogurallar...)</label>
    <input list="browsers" name="grupba_ady" class="form-control editable_code" autocomplete="off" placeholder="Grupba ady" id="grupba_ady">
    <datalist id="browsers">
        <!-- Veritabanından gelen seçenekler buraya yüklenecek -->
    </datalist>
</div>

<script>
$(function(){
    $("#categ_select").change(function(){
        var product_code = $("#categ_select option:selected").data('name');       
        $.ajax({
            url: 'pages/desc_upd.php', 
            method: 'POST',
            data: { grupba_ady: product_code },
            success: function(response) {                
                $('#browsers').html(response);               
            },
            error: function(xhr, status, error) {
                console.error("Hata oluştu:", error);  
            }
        });
    });
});

</script>


    <div class="col">
    <label for="name">Barkod no:</label>
      <input style="background-color: #faf5d1; border-color: #1c4d53;"  type="text" class="form-control" placeholder="Haryt Ady" autocomplete="off" id="barkod_no" name="barkod_no" required>
    </div>    


  </div>
<div class="row">
        <div class="col-md-6 form-group" style="padding-bottom:3px;">
            <label for="message">Gysga düşündiriş:</label>
            <textarea class="form-control" id="message" name="short_desc" rows="4" placeholder="Gysgaca maglumat doldur" required></textarea>
        </div>

        <div class="col-md-6 form-group" style="padding-bottom:3px;">
            <label for="message">Giňişleýin  maglumat (optional):</label>
            <textarea class="form-control" id="message" name="long_desc" rows="4" placeholder="Ginisleyin maglumat doldur" ></textarea>
        </div>
</div>
        <div class="row" style="padding-bottom: 10px;">
    <div class="col">
    <label for="name">Mukdar:</label>
      <input type="number" class="form-control" placeholder="San giriz" id="quantity" name="quantity" required>
    </div>
    <div class="col">
    <label for="name">Bahasy(1 sany):</label>
      <input type="number" class="form-control" placeholder="1 sany bahasy" name="quantity_price"  required>
    </div>

  </div>

  <div class="row" style="padding-bottom: 10px;">
    <div class="col">
    <label for="name">Kategoriýa -synpy:</label>
                <select class="form-control" id="exampleFormControlSelect1" style="font-size: 14px;" name="select_folder"  required >
                <option selected disabled value="">suratyn yerlesyan papkasy</option>
                <option>metal</option>
                <option>gurlusyk</option>
                <option>aynagapy</option>
                <option>sifer</option>
                <option>setka</option>
                <option>halta</option>
            </select>
    </div>


    <!-----------        Suratlar yeri  ----------------->
    <!-- <div class="col">
    <label for="exampleFormControlFile1">Harydyň suraty</label>
    <input type="file" class="form-control-file" name="product_image" id="exampleFormControlFile1" style="border: 1px solid #aeb3b3;">
  </div> -->


  <div class="row" style="padding-bottom: 10px;">
    <div class="col">
        <label for="product_images">Harydyň Suratlary (Ana resim seçin):</label>
        <input type="file" class="form-control-file" name="product_images[]" id="product_images" multiple accept="image/*" style="border: 1px solid #aeb3b3;">
        <small class="form-text text-muted">Birden fazla resim seçebilirsiniz.</small>
        <div id="imagePreview" class="mt-2"></div>
    </div>
    <div class="col">
        <label for="main_image">Ana Resim:</label>
        <select class="form-control" id="main_image" name="main_image" style="font-size: 14px;">
            <option selected disabled value="">Ana resmi seçin</option>
        </select>
    </div>
</div>




  <div class="col">
    <label for="name">Haryt ýagdaýy(mejbury däl):</label>
                <select class="form-control" id="taze_new" style="font-size: 14px;" name="taze_n ">
                <option selected disabled value=""> görkez </option>
                <option data-name="new">new</option>
            </select>
    </div>


  </div>
       <button type="submit" class="btn btn-primary">Sakla</button>
    </form>
    </div>
    <div id="response" class="mt-3"></div>

    </div>

    <div class="container-fluid">
<div class="row" id="update_materials">
     <!----------------------------- add update ------------------------------->
</div>
</div>

<script>

$('#product_images').on('change', function () {
    const files = this.files;
    const previewContainer = $('#imagePreview');
    const mainImageSelect = $('#main_image');

    // Önceki önizlemeleri ve seçenekleri temizle
    previewContainer.empty();
    mainImageSelect.html('<option selected disabled value="">Ana resmi seçin</option>');

    $.each(files, function (index, file) {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function (e) {
                // Resim önizleme
                const img = $('<img>')
                    .attr('src', e.target.result)
                    .attr('alt', file.name)
                    .css({
                        width: '80px',
                        marginRight: '10px',
                        marginBottom: '10px',
                        border: '1px solid #ccc',
                        borderRadius: '5px',
                    });

                previewContainer.append(img);

                // Ana resim seçeneği ekleme
                // const option = $('<option>')
                //     .val(file.name)
                //     .text(`Resim ${index + 1}: ${file.name}`);
                // mainImageSelect.append(option);
            };

            reader.readAsDataURL(file);
        }
    });
});


</script>


    <!----------------------------- add value to php ------------------------------->
<script>
    $(document).ready(function () {
    // Dosya değişiminde ana resim listesi oluşturma
    $("#product_images").on("change", function () {
        const files = this.files;
        const mainImageSelect = $("#main_image");

        mainImageSelect.empty();
        mainImageSelect.append('<option selected disabled value="">Ana resmi seçin</option>');

        if (files.length === 0) {
            mainImageSelect.append('<option disabled value="">Resim bulunamadı</option>');
            return;
        }

        Array.from(files).forEach((file) => {
            mainImageSelect.append(
                `<option value="${file.name}">${file.name}</option>`
            );
        });
    });

    // Form gönderim işlemi
    $("#add_Product").on("submit", function (e) {
        e.preventDefault(); // Sayfa yenileme engelleniyor

        var rbaha = Math.floor(Math.random() * 100000);
        var cl_id = Math.random().toString(36).substring(2, 18) + rbaha;

        var formData = new FormData(this);
        var categ_id = $("#categ_select").val() || "0";
        var prod_code_name = $("#categ_select option:selected").data('name') || "Bilinmiyor";
        var taze_new = $("#taze_new option:selected").data('name') || "Standart";

        formData.append("custom_code", cl_id);
        formData.append("categ_id", categ_id);
        formData.append("prod_code_name", prod_code_name);
        formData.append("taze_new", taze_new);

        $.ajax({
            url: "pages/insert_product.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                try {
                    var jsonResponse = JSON.parse(response);

                    $('#response').html('<div class="alert alert-' +
                        (jsonResponse.status === 'success' ? 'success' : 'danger') +
                        '">' + jsonResponse.message + '</div>'
                    );

                    // if (jsonResponse.status === 'success') {
                    //     setTimeout(() => location.reload(), 1500); // Başarı sonrası yenile
                    // }
                } catch (e) {
                    console.error("JSON Parse Error:", e);
                    $('#response').html('<div class="alert alert-danger">Sunucu yanıtı hatalı!</div>');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Hata Detayları: ", jqXHR.responseText);
                $('#response').html('<div class="alert alert-danger">Bir hata oluştu: ' + (errorThrown || 'Bilinmeyen hata') + '</div>');
            }
        });
    });
});

          
</script>

<script>
$(function(){
$("#upd").click(function (){
   // $(".update_click").remove();
   $(".main_place_upd").remove();
   $("#update_materials").show();
     $("#update_materials").load('pages/add_material_upd.php')
 
})
});
</script>
