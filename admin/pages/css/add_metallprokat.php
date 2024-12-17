<style>
    input::placeholder {
    color: #a9a9a9; /* Placeholder rengini ayarlar */
    font-size: 12px; /* Placeholder yazı boyutunu ayarlar */
    font-style: italic; /* Placeholder yazı stilini italik yapar */
    opacity: 1; /* Görünürlüğü ayarlar (1 tam görünürlük) */
}

textarea::placeholder {
    color: #a9a9a9; /* Placeholder rengini ayarlar */
    font-size: 12px; /* Placeholder yazı boyutunu ayarlar */
    font-style: italic; /* Placeholder yazı stilini italik yapar */
    opacity: 1; /* Görünürlüğü ayarlar (1 tam görünürlük) */
}
</style>
<?php
//$today = date('Y-m-d');
include_once '../db/dbase.php';
include_once 'call_categories_func.php';
//$categories = getCategories($conn); // Fonksiyonu çağırın ve kategorileri alın
?>
    <div class="container mt-2 ">

    <form id="add_Product" enctype="multipart/form-data">

    <div class="row" style="padding: 10px 0;">
    <div class="col">
    <label for="name">Haryt Ady:</label>
      <input type="text" class="form-control" placeholder="Haryt Ady" id="name" name="prod_name" required>
    </div>
    <div class="col">
    <label for="exampleFormControlSelect1">Kategoriya sayla</label>
            <select class="form-control" id="categ_select" required>
                <option selected disabled value="">Kategoriya sayla</option>
                <?php if (!empty($categ_id)) : ?>
                    <?php for ($i = 0; $i <count($categ_id); $i++) : ?>
                     
                        <option value="<?= htmlspecialchars($categ_id[$i]) ?>" data-name="<?= htmlspecialchars($categ_name[$i]) ?>">
                <?= htmlspecialchars($categ_name[$i]) ?>
            </option>

                <?php endfor; ?>
                            <?php endif; ?>                
            </select>
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
    <label for="name">Meter uzynlygy:</label>
      <input type="number" class="form-control" placeholder="San giriz" id="name" name="length_metall" required>
    </div>
    <div class="col">
    <label for="name">1 metrin agramy:</label>
      <input type="number" class="form-control" placeholder="San giriz" name="weight_meter_length"  required>
    </div>
    <div class="col">
    <label for="name">Bahasy(ton):</label>
      <input type="number" class="form-control" placeholder="tonna bahasy" name="ton_price"  required>
    </div>

  </div>


  <div class="row" style="padding-bottom: 10px;">
    <div class="col">
    <label for="name">Kategoriýa -synpy:</label>
                <select class="form-control" id="exampleFormControlSelect1" style="font-size: 14px;"  required name="select_folder">
                <option selected disabled value="">suratyn yerlesyan papkasy</option>
                <option>metal</option>
                <option>gurlusyk</option>
                <option>aynagapy</option>
                <option>sifer</option>
                <option>setka</option>
                <option>halta</option>
            </select>
    </div>
    <div class="col">
    <label for="exampleFormControlFile1">Harydyn suradyny goy</label>
    <input type="file" class="form-control-file" name="product_image" id="exampleFormControlFile1" style="border: 1px solid #aeb3b3;">
  </div>
  </div>
       <button type="submit" class="btn btn-primary">Sakla</button>
    </form>
</div>
    <!----------------------------- add value to php ------------------------------->
    <div class="row">
        <div class="col-sm-12 col-md-5">
       
            <div class="dataTables_info" id="bootstrap-data-table-export_info" role="status" aria-live="polite"></div>
       
        </div>
        <div class="col-sm-12 col-md-7">
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<script>
$(document).ready(function(){
    $("#add_Product").on('submit', function(e) {
        e.preventDefault();  // Formun normal submit işlemini durduruyoruz.

        // FormData objesi oluşturuyoruz ve formdaki tüm verileri bu objeye ekliyoruz.
        var formData = new FormData(this);
       // console.log(formData)
        var categ_id = $("#categ_select").val(); 
        var categ_name = $("#categ_select option:selected").data('name');

        // Bu değerleri FormData'ya ekle
        formData.append('categ_id', categ_id);
        formData.append('categ_name', categ_name);


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
                $('#categoryForm')[0].reset();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#response').html('<div class="alert alert-danger">Error: ' + textStatus + '</div>');
            }
        });
    });
});
          
</script>


