<style>
    .ramkasyz{
    /* Genişlik 200 piksel */
    min-height: 40px !important; /* Yükseklik 40 piksel */
    border:none; 
    font-size:14px; 
    text-align:center;
    background-color: transparent;
    border-radius:0px !important;
}   
.editable_code {
            border: 1px solid #a8b535; /* Border rengini ve kalınlığını ayarlayabilirsiniz */
           
            border-radius: 4px; /* Kenarlarda yuvarlama */
         
        }

        /* İstediğiniz hover ya da focus efekti ekleyebilirsiniz */
        .editable_code:focus {
            border-color: #66afe9; /* Fokus durumunda border rengini değiştir */
            outline: none; /* Varsayılan outline'ı kaldır */
        }
        .upd_link_categ a:hover{

color:#d2eac6 ;
}
.update_click_categ{
box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;   
padding: 2px 0; 
margin-bottom: 2rem;

}
.upd_link_categ {
background-color:#008a8a;
line-height:42px;
padding: 0 14px;
border-radius: 3px;
}

</style>
<?php
include_once '../db/dbase.php';
include_once 'call_categories_func.php';
$today = date('Y-m-d');
?>
<div class="container-fluid mt-1 ">

<div class="col update_click_categ"  style=" border-top:1px solid #008a8a; border-bottom:1px solid #d7ffff;">
<strong class="upd_categ"><a href="#" style="color:#d9ffff; " class="upd_link_categ" id="upd_categ" >Update Category</a></strong>
    </div>

    <div class="main_place_upd"> <!------------- start main_place to show or hide ------------- tables------------>

    <div class="row" style="padding: 10px 0;border-bottom:0px solid #419dbc;">  

    <div class="col-md-4">
	<input type="checkbox" onclick="bolumekle()"><b style="padding-left:10px;">Täze Kategoriýa</b>  

<span id="my_bolum" style="display: none; text-align: right; margin-top:6px">
	<input type="text" class="form-control" name="" id="bolgos" style="width:100%;"> 
    <button class="btn btn-primary my-3 parent_add" id="gos">Kategoriýa gos</button>
</span>
</div>
    </div>
<div class="row" style="padding: 10px 0;border-bottom:0px solid #419dbc;">            
        <div class="col-md-3">
        <form id="categoryForm" enctype="multipart/form-data">
<!------------------------------ select PARENT CATEGORY------------------------------------------->

            <select   class="form-control" id="categ_select" style="margin-bottom:12px;" required>
                <option selected disabled value="">Kategoriya sayla</option>
                <?php if (!empty($parent_id)) : ?>
                    <?php for ($i = 0; $i <count($parent_id); $i++) : ?>
                     
                        <option value="<?= htmlspecialchars($parent_id[$i]) ?>" data-name="<?= htmlspecialchars($parent_categ_name[$i]) ?>">
                <?= htmlspecialchars($parent_categ_name[$i]) ?>
            </option>

                <?php endfor; ?>
                            <?php endif; ?>                
            </select>
            <!------------------------------------------------------------- END PARENT-------------->
                <!-- <label for="name">Kategoriýa - haryt ady:</label> -->
                <div class="form-group">
                <label for="name">Subkategoriya ady:()</label>
                <input type="text" class="form-control" autocomplete="off"  id="name" name="category_name" required>
                </div>

                <div class="form-group">
                <label for="name">Kody:</label>
                <input list="browsers" name="browser" class="form-control editable_code" autocomplete="off">

                <datalist id="browsers">
                
                    </datalist>
                
                </div>

                <div class="form-group">
                <label for="name">Surat papkasyny saýlaň</label>
                <select class="form-control" id="exampleFormControlSelect1" style="font-size: 14px;"   name="select_folder">
                <option selected disabled value="">suratyn yerlesyan papkasy</option>
                <option>metal</option>
                <option>gurlusyk</option>
                <option>aynagapy</option>
                <option>sifer</option>
                <option>setka</option>
                <option>halta</option>
            </select>
                </div>
                <div class="form-group">
                    <label for="message">Bellik:</label>
                    <textarea class="form-control" id="message" name="category_desc" rows="4"  required></textarea>
                </div>                

                <div class="form-group">
                    <label for="exampleFormControlFile1">Harydyn suradyny al</label>
                    <input type="file" class="form-control-file" name="category_image" id="exampleFormControlFile1" style="border: 1px solid #aeb3b3;">
                </div>
                <div class="" style="text-align: right;">
                <button type="submit" class="btn btn-primary">Sakla</button>
                </div>
    </form>
</div>
<!------------------------------------- start div-col-8----------------------------------->
<div class="col-md-9">

<div class="table-responsive" id="sTable">
        <table class="responsive-table rounded table-striped" id="sourceTable">

            <thead>
                <tr>
                  
                    <th>Subcategory name</th>
                    <th>PHOTO</th>
                    <th>DESCRIPTION</th>
                    <th>IMG_PATH</th>
                    <th>DELETE</th>
       
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categ_id)) : ?>
                    <?php for ($i = 0; $i <count($categ_id); $i++) :
                        ?>
                        <tr>
    <!-- <td><input autocomplete="off" type="text" name="categ_id[]" class="form-control ramkasyz aciklama_font" value="<?= htmlspecialchars($categ_id[$i]) ?>"></td> -->
    <td><input autocomplete="off" id="PRODUCT_FULL_NAME" type="text" name="categ_name[]" class="form-control ramkasyz" value="<?= htmlspecialchars($prod_full_name[$i]) ?>"></td>
    <td><input autocomplete="off" id="CATEGORY_PHOTO" type="text" name="categ_photo[]" class="form-control ramkasyz" value="<?= htmlspecialchars($categ_photo[$i]) ?>"></td>
    <td><textarea name="categ_desc[]" id="CATEGORY_DESC" rows="3" cols="40" class="form-control ramkasyz"><?= htmlspecialchars($categ_desc[$i]) ?></textarea></td>
    <td><input type="text" id="image_path" name="img_path[]" class="ramkasyz" value="<?= htmlspecialchars($img_path[$i]) ?>"></td>
    <td style="display: none;"><input  type="hidden" id="prode_code" name="prod_code[]" class="codeitems" value="<?= htmlspecialchars($prod_code[$i]) ?>"></td>

    <td>
                <a  id="<?= htmlspecialchars($prod_code[$i]) ?>" class="btn btn-outline-danger btn-sm sil_del" data-bs-toggle="tooltip" 
                data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger" data-bs-title="Delete" >
                 <i class="fas fa-trash trash-icon"></i></td>
                </a>  
                </td>
</tr>
                            <?php endfor; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
</div>
<!----------------------------- add value to php ------------------------------->
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="bootstrap-data-table-export_info" role="status" aria-live="polite"></div>
    </div>
    <div class="col-sm-12 col-md-7">
    </div>
</div><!--end row-->

<div id="response" class="mt-3"></div>

<div id="ekle" class="mt-3"></div>
    </div><!--end show hide category tables -->

    <div class="container">
<div class="row" id="update_categories">
     <!----------------------------- add update ------------------------------->
</div>
</div>


</div><!--end cont-->

<script>
    $(document).ready(function () {
    $('#categoryForm').on('submit', function (event) {
        event.preventDefault(); // Formun normal şekilde gönderilmesini engeller

        // Form verilerini topla
        var formData = new FormData(this);

        var parent_id = $("#categ_select").val(); 
        var parent_categ_name = $("#categ_select option:selected").data('name');
        var product_code = $("#browser option:selected").data('name');

        formData.append('parent_id', parent_id);
        formData.append('parent_categ_name', parent_categ_name);
        formData.append('product_code', product_code);
      

        $.ajax({
            url: 'pages/insert_category.php', // PHP dosyasına yönlendir
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                var jsonResponse = JSON.parse(response);
                
                // Başarı veya hata mesajını göster
                $('#response').html('<div class="alert alert-' + (jsonResponse.status === 'success' ? 'success' : 'danger') + '">' + jsonResponse.message + '</div>');
                $('#categoryForm')[0].reset();
            //     setTimeout(function() {
            //     location.reload(true);  // Mevcut sayfayı yeniden yükler
            // }, 3000);  // 3 saniye sonra sayfayı yeniler
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#response').html('<div class="alert alert-danger">Error: ' + textStatus + '</div>');
            }
        });
    });
});
</script>

<script>

function bolumekle(){	
	var knopka;  
	 var deg = document.getElementById('my_bolum');
	  if (deg.style.display === 'none') {
    	deg.style.display = 'block';

	$(document).ready(function(){	
		$('#gos').click (function(){
            var bol = $('#bolgos').val().toLowerCase();  // Bolümü küçük harf ile alıyoruz
		var select = document.querySelector('select');
		var exists = false;
		for (var i = 0; i < select.options.length; i++) {
			if (select.options[i].value === bol) {
				exists = true;
				break;
			}
		}
			if (!exists) {
			var option = document.createElement('option');
			option.value = bol;
			option.text = $('#bolgos').val();  // Orijinal değeri ekliyoruz
			select.add(option, 1);
		}	
});
	});
		
		}
  else {
   	 deg.style.display = 'none';
 	 }
		}

$(document).ready(function () {
    $("#upd").hide();
$(".parent_add").click(function(){
    var name_categ=$("#bolgos").val()
    //alert(name_categ)
        $.ajax({
            url: 'pages/insert_category.php',
 method:'POST',
 data:{get_name_categ:name_categ}, 
 
 success:function(netije){
 $("#ekle").html(netije);

} // end success func
	}); //end ajax
    });
})
        </script>
        
        <script>
            $(document).ready(function() {
    $('#categ_select').on('change', function() {
        var category_prod_id = $(this).val(); // Seçilen kategori ID'si
      
        if (category_prod_id) {
            $.ajax({
                type: 'POST',
                url: 'pages/get_category_code.php', // PHP dosyası
                data: { category_prod_id: category_prod_id },
                success: function(response) {
                    // Datalist'e sonuçları ekle
                    $('#browsers').html(response);
                    //console.log(response)
                },
                error: function() {
                    alert("Veri yüklenirken bir hata oluştu.");
                }
            });
        }
    });
});
</script>

<script>
$(function(){
$("#upd_categ").click(function (){
   // $(".update_click").remove();
   $(".main_place_upd").remove();
   $("#update_categories").show();
  
     $("#update_categories").load('pages/update_categories.php')
 
})
});
</script>

<script>
$(function () { 
var getVariable;
   $(".ramkasyz").change(function(){
    var prod_code = $(this).closest('tr').find('.codeitems').val();
    var prod_field_name = $(this).attr('id');     
    var prod_name = $(this).val(); // use $(this) to reference the current input field with the class 'ramkasyz'                             

   //alert(prod_code + prod_field_name + prod_name)
    
    $.ajax({
                url: 'pages/desc_upd.php',
                 method: 'post',
                 data: {
                 prod_code: prod_code,
                 prod_field_name:prod_field_name ,    
                 prod_name: prod_name,
                                                      
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