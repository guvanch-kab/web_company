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

//include_once 'call_categories_func.php';
//$categories = getCategories($conn); // Fonksiyonu çağırın ve kategorileri alın
if (isset($_GET['jsVariable'])) {
    $categ_metal_id = $_GET['jsVariable'];  // JS değişken/i PHP'ye atandı 
    // echo '<pre>';
	// print_r($_GET);
	// echo '</pre>';
$query = "SELECT * FROM Categories WHERE CATEGORY_ID='$categ_metal_id' ";
$result = mysqli_query($conn, $query);
$categ_id = array();
$categ_name = array();
$categ_desc = array();
$parent_id=array();
$categ_name=array();
$prod_code=array();
$prod_name=array();

if ($result->num_rows > 0) {
    // Veritabanından çekilen her satırı ilgili dizilere ekliyoruz
    while ($row = $result->fetch_assoc()) {
        $categ_id[] = $row['CATEGORY_ID'];
        $categ_name[] = $row['CATEGORY_NAME'];
        $prod_full_name[] = $row['PRODUCT_FULL_NAME'];
        $categ_desc[] = $row['CATEGORY_DESC'];
        $prod_code[]=$row['PRODUCT_CODE'];
    }
}

}
?>
    <div class="container-fluid mt-2">


<div class="col update_click"  style=" border-top:1px solid #008a8a; border-bottom:0px solid #d7ffff;">
    <strong class="upd"><a href="#" style="color:#d9ffff; " class="upd_link" id="upd" >Update metalls</a></strong>
</div>

<div class="main_place_upd">
    
    <form id="add_Product" enctype="multipart/form-data">    
   
    <div class="row" style="padding: 10px 0;">

    <div class="col">
    <label for="exampleFormControlSelect1">Metallar</label>

    <select class="form-control" id="categ_select" style="margin-bottom:12px;font-size:14px" required>
                <option selected disabled value="">Metal görnüşi</option>
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
  </div>

<div class="row">
        <div class="col-md-6 form-group" style="padding-bottom:3px;">
            <label for="message">Gysga düşündiriş:</label>
            <textarea class="form-control" id="message" name="short_desc" rows="4" placeholder="maglumat doldur" required></textarea>
        </div>

        <div class="col-md-6 form-group" style="padding-bottom:3px;">
            <label for="message">Giňişleýin  maglumat (optional):</label>
            <textarea class="form-control" id="message" name="long_desc" rows="4" placeholder="Ginisleyin maglumat doldur" ></textarea>
        </div>
</div>
        <div class="row" style="padding-bottom: 10px;">
    <div class="col">
    <label class=" meter_len" for="name">Meter uzynlygy:</label>
      <input type="number" class="form-control" placeholder="San giriz" id="name" name="length_metall" step="0.01">
    </div>
    <div class="col">
    <label class="list_title" for="name">1 metrin agramy:</label>
      <input type="number" class="form-control" placeholder="San giriz" name="weight_meter_length" step="0.001" required>
    </div>
    <div class="col">
    <label for="name">Bahasy(ton):</label>
      <input type="number" class="form-control" placeholder="tonna bahasy" name="ton_price" step="0.01" required>
    </div>
  </div>  
       <button type="submit" class="btn btn-primary">Sakla</button>
    </form>
</div>

    <div id="response" class="mt-3"></div>
</div>

<div class="container-fluid">

<div class="row" id="update_metall">
     <!----------------------------- add update ------------------------------->  

</div>
</div>

<script>
$(document).ready(function(){
   // $("#upd").show();
    $("#add_Product").on('submit', function(e) {
        e.preventDefault();  // Formun normal submit işlemini durduruyoruz.

        var rbaha = Math.floor(Math.random() * 100000);
        var cl_id = Math.random().toString(36).substring(2, 18) + rbaha;

        var formData = new FormData(this);
       // console.log(formData)
        var categ_id = $("#categ_select").val(); 
        


        var prod_code_name = $("#categ_select option:selected").data('name');

        formData.append('custom_code', cl_id);

        formData.append('categ_id', categ_id);
        formData.append('prod_code_name', prod_code_name);
        $.ajax({
            url: 'pages/insert_product.php', // Verilerin gönderileceği PHP dosyası
            type: 'POST',
            data: formData,
            contentType: false, // Bu ayar, form verisinin doğru şekilde gönderilmesini sağlar
            processData: false, // Form verilerinin işlenmesini engeller
            success: function(response) {                
                var jsonResponse = JSON.parse(response);                
                // Başarı veya hata mesajını göster
                $('#response').html('<div class="alert alert-' + (jsonResponse.status === 'success' ? 'success' : 'danger') + '">' + jsonResponse.message + '</div>');
                $('#add_Product')[0].reset();

                $(".close").on("click", function() {
                            $(this).closest(".alert").fadeOut(); 
                            setTimeout(() => {
                                location.reload.page(); // window.location.href = 'index.html'; // Sayfayı index.html'e yönlendirir
                            }, 1000);
                        });               
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#response').html('<div class="alert alert-danger">Error: ' + textStatus + '</div>');
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
   $("#update_metall").show();
   var jsVariable = <?= $categ_metal_id; ?>;

     //$("#update_metall").load('pages/add_metall_update.php' + jsVariable)
     $("#update_metall").load('pages/add_metall_update.php?jsVariable=' + jsVariable);  

})
});

</script>

<script>
$(function(){
$("#categ_select").change(function (){   
   
    //var categ_text = $("#categ_select").text(); 
    var categ_text = $(this).find("option:selected");
    var list = categ_text.text().trim();
if(list=="List")
{
   $(".meter_len").html('List m<span style="font-size:1.5em;">&sup2;</span> ölçegi');
   $(".list_title").html('List m<span style="font-size:1.5em;">&sup2;</span> agramy');
}
  else {

    $(".meter_len").html('Meter uzynlygy:');
    $(".list_title").html('1 metrin agramy:');

  }  


//$("#update_metall").load('pages/add_metall_update.php' + jsVariable)
   //  $("#update_metall").load('pages/add_metall_update.php?jsVariable=' + jsVariable);  

})
});

</script>

