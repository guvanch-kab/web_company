<style>

@media (max-width: 1500px){
    .singleImgcCont{
        display: flex;
        flex-direction: column;
    }
}
@media (max-width: 760px){
    .product_cart2{
        display: flex;
        flex-direction: column;
    }
    .sideImages img{
        width: 50px;
        height: 50px;
    }
    .single_prod_name{
        font-size: 14px;
    }
    .price_item h4{
        font-size: 14px;
    }
    .product_desc{
        font-size: 13px;
    }
}

@media (max-width: 768px){
    .sebet_haryt_ady{
        text-align:right !important;
        font-size: 12px !important;
    }
    #targetTable .metal_table_input {
        padding-left:99%;
        width: 30%;
    }

}

</style>





<script>
$(document).ready(function() {
    
    $(".sebede_gosh").off("click").on("click", function(event) {
        event.preventDefault();
        var $button = $(this);
        $button.addClass('disabled').attr('disabled', true).css({
            'opacity': '0.6',
            'pointer-events': 'none',
        });
        $button.find('span').text('Goşuldy');
        $("#single_page").fadeOut(400);
    });

    $("#ordered_table").hide();
    ekle();
});
function ekle() {    
    var item_price = 0;
    $("#single_page").hide();    

    $(".single_title").off("click").on("click", function() {
        $("#select_owl").hide() 

        $("html, body").animate({ scrollTop: $("#single_page").offset().top }, 800);

$("#single_page").show();

$(".sebede_gosh").removeClass('disabled').removeAttr('disabled').css({
    'opacity': '1',
    'pointer-events': 'auto'
}).find('span').text('Sebede goş');



        $('.item_quantity').val(1);

        var productId = $(this).closest(".product_cart").find(".product_id").text();
        var productName = $(this).closest(".product_cart").find(".card-title").text();
        var productDesc = $(this).closest(".product_cart").find(".card-text").text();
        var prod_full_desc = $(this).closest(".product_cart").find(".prod_full_desc").text();
        var productPrice = $(this).closest(".product_cart").find("h5 strong").text();   
        
        var productImg = $(this).closest(".product_cart").find(".single_title").attr("src");
        //var productImg = $(this).attr("src");      
        $(".custom_direction").attr("src", productImg);

        item_price = productPrice.split(' ');
        single_price = item_price[0];

        $(".single_prod_id").text(productId);

        

        $(".single_prod_name").text(productName);
        $(".product_desc").text(productDesc);
        $(".product_full_desc").text(prod_full_desc);
        $(".price_item").html(`<h4><strong> ${productPrice} </strong></h4>`);
        $(".quantity_price_item").html(`<h4><strong> ${productPrice} </strong></h4>`);
        $("#single_page").show();

        $(".sebede_gosh").removeClass('disabled').removeAttr('disabled').css({
            'opacity': '1',
            'pointer-events': 'auto'
        }).find('span').text('Sebede goş');
    });

    // Increase and decrease buttons
    $('#increase').off("click").on("click", function() {
        var currentVal = parseInt($('.item_quantity').val()) || 1;
        $('.item_quantity').val(currentVal + 1);
        updatePrice();
    });

    $('#decrease').off("click").on("click", function() {
        var currentVal = parseInt($('.item_quantity').val()) || 1;
        if (currentVal > 1) {
            $('.item_quantity').val(currentVal - 1);
            updatePrice();
        }
    });

    $('.item_quantity').on("input change", function() {
        updatePrice();
    });

    function updatePrice() {
        var quantity = parseFloat($('.item_quantity').val()) || 1;
        $(".price_item").html(`<h4><strong> ${(quantity * single_price).toFixed(2)} TMT </strong></h4>`);
    }
}
</script>

<script>

$(document).ready(function () {
    $(".main_image, .single_title").click(function () {       
        const mainImage = $(this).attr("src");
      
        const productCard = $(this).closest(".product_cart");
        const otherImages = [];       
       
        productCard.find(".prod_c img").each(function () {
            otherImages.push($(this).attr("src"));
        });    
        const singlePage = $("#single_page");
        singlePage.find(".custom_direction").attr("src", mainImage);
       
        const sideImagesContainer = singlePage.find(".sideImages");
        sideImagesContainer.empty(); // Önce tüm resimleri temizle
        otherImages.forEach(function (src, index) {
            const imgClass = index === 0 ? "active_image" : `other_image${index}`;
            sideImagesContainer.append(`<img src="${src}" alt="Resim ${index + 1}" class="${imgClass}">`);
        });
    });

    $(document).on("click", ".other_image1, .other_image2, .active_image", function () {
        const clickedImageSrc = $(this).attr("src"); // Tıklanan resmin src'si
        $("#single_page .custom_direction").attr("src", clickedImageSrc); // Ana resmi güncelle
    });
});
</script>

    <div class="container " id="single_page" style="padding: 0; display:flex;align-items:start;" >
   <div class="product_cart2" style="width: 100%; box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; display: flex;">
      <div class="col-md-6 singleImgcCont" style="border-right: 1px solid #efefde; background-color:#fff; display: flex;">
        
         <img src="" alt="Ürün Resmi" style="width:auto; height:auto; box-shadow: none;" class="img-fluid custom_direction"> 

         <div class="sideImages" style="margin: 0; padding: 0;">
         
           </div>
      </div>
     
      <div class="col-md-6 p-4" style=" background-color: #fff;">
         <h2 class="single_prod_name"></h2>
         <p class="product_desc"></p>
         <hr>
         <p class="product_full_desc"></p>
         <div  style="display: flex; justify-content: space-between; align-items: center;">
            <span class="single_prod_id" style="display: none;"></span>
            <span class="quantity_price_item" style="display: none;">text</span>
            <span class="price_item">text</span>
            <div style="display:flex;width: 120px;background-color: #007bff;border-radius: 3px;align-items: center;">
               <button id="decrease" style="font-size: 20px; min-width: 40px; height: 40px; border: none; background-color: #007bff; color: #fff; border-right: 1px solid #ffffec; font-weight: 600; border-radius: 3px 0 0 3px; display: flex; align-items: center; justify-content: center;">-</button>
               <input type="text" class="item_quantity" id="" value="1" min="1" style="font-size: 18px; width: 60px; height:40px; text-align: center; border: none; background-color: #007bff; color: #fff; outline: none;">
               <button id="increase" style="font-size: 20px; min-width: 40px; height: 40px; border: none; background-color: #007bff; color: #fff; border-left: 1px solid #ffffec; font-weight: 600; border-radius: 3px 0 0 3px; display: flex; align-items: center; justify-content: center;">+</button>
            </div>
            <div class="">
               <a href="#userExit" class="btn_shop_svg sebede_gosh bg-primary" style="width: 150px; height:40px; border-radius:3px;">
                  <!-- <img style="height:20px; width:auto" src="pages/images/icons/shopping-cart.svg" class="shopping-cart-icon" alt="Shopping Cart"> -->
                  <span style="text-align: center;"> Sebede goş </span>
               </a>
            </div>
         </div>
         <hr>
      </div>
   </div>
</div>

<?php
require '../config/dbase/dbase.php';
$today = date('Y-m-d');
   
    $prod_code = array();  
    $prod_name = array();
    $price = array();
    $img = array();
    $img_path = array();
    $prod_id = array();
    $prod_desc = array();
    $get_prod_code = null; // Varsayılan olarak boş tanımlandı
    $grupba=array();

    if (isset($_POST['bolum'])) {

        $bolum = strtoupper($_POST['bolum']);
        $get_categ_id = null;
        $check_query = "SELECT * FROM Categories WHERE PRODUCT_FULL_NAME='$bolum' ";
        $result = mysqli_query($connect, $check_query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);           
            $get_prod_code = $row['PRODUCT_CODE'];
            $categ_resim=$row['CATEGORY_PHOTO'];
            $resim_yolu=$row['image_path'];
        }

        if ($get_prod_code != null) {
           // $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 32; // Her yüklemede çekilecek ürün sayısı
           // $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;

            //$check_query = "SELECT * FROM Products  WHERE PRODUCT_CODE='$get_prod_code'  ORDER BY RAND() LIMIT $limit OFFSET $offset";
            $check_query = "SELECT * FROM Products  WHERE PRODUCT_CODE='$get_prod_code' ";
            $result2 = mysqli_query($connect, $check_query);

            if ($result2 && mysqli_num_rows($result2) > 0) { 
                echo '
                <div class="container" style="padding-right:0; padding-left:0; display:flex; justify-content:center;" id="boyaglar_page">               
                    <div class="row add_group_links">                   
                    ';                
                $grupba = []; 
                
                while ($row = $result2->fetch_assoc()) {   
                    $images = [];    
                  
                    if (strpos($row['image'], ',') !== false) {
                        $images = explode(',', $row['image']);

                    } else {
                        
                        $images[] = $row['image']; 
                    }
                
                    $main_image = $images[0]; // Ana resim
                    $other_images = array_slice($images, 0); // Diğer küçük resimler

                    if (!empty($row['Grupba_ady']) && !in_array($row['Grupba_ady'], $grupba)) {

                        $grupba[] = $row['Grupba_ady'];
                    }
                
                    if (!empty($other_images)) {
                        echo '<div class="other-images" style="margin-top:10px;">';
                        foreach ($other_images as $image) {
                            echo '<img src="admin/pages/' . $row['image_path'] . '/' . $image . '" alt="Additional Image" style="display:none; width:50px; height:50px; margin:5px;">';
                        }
                        echo '</div>';
                    }

                    
					echo '
					<div class="product_cart col-lg-3 col-sm-6 col-6" style="padding-top:0; padding-right:0; padding-left:2px; padding-bottom: 2px;">
					   <div class="card p-2 rounded-4" style="min-height:100%">
						  <code class="product_id" style="display:none">'. htmlspecialchars($row['PRODUCTS_ID']) .'</code>
						  <img class="card-img-top single_title main_image" src="admin/pages/'.$row['image_path'].'/'. $main_image.' " alt="Product Image" loading="lazy">
						  <div class="prod_c other-images" style="display:none">';
							 foreach ($other_images as $index => $image) {
							 echo '<img  src="admin/pages/' . $row['image_path'] . '/' . $image . '" alt="Additional Image" class="additional-image">';
							 }
							 echo'
						  </div>
						  <p class="card-title pt-2 single_title"><strong>' . htmlspecialchars($row['PRODUCT_NAME']) . '</strong></p>
						  <div class="card-body"  style="padding:0 !important; align:left;">
							 <p class="card-text" style="text-align: left;padding-bottom: 6px;">' . $row['SHORT_DESC'] . '</p>
							 <p class="prod_full_desc" style="display:none;text-align: left;">' . $row['PROD_DESC'] . '</p>
							 <div class="saga_yasla">
								<h5><strong>' . htmlspecialchars($row['PRICE']) . ' M</strong></h5>
								<a href="#" class="btn_shop_svg sebede_gosh bg-primary">Sebede goş</a>     
							 </div>
						  </div>
					   </div>
					</div>
					'; 
					}
					echo '</div></div>';
    }       
        else {   
          //  $grupba = [];
    }   
        echo '<script> var grupba = ' . json_encode($grupba) . ';
              </script>';            
    } 
    }
?>
<script>
$(document).ready(function() {
    $(".all_grupbalar").empty();
    if (grupba.length > 0) {

    grupba.forEach(function(item) {
        $(".all_grupbalar").append('<li class="item_grupba"><a class="grupba_link" href="#">' + item + '</a></li>');
         });
    }
        $(document).on("click", ".item_grupba", function(event) {
        event.preventDefault();    
        var menu_haryt = $(this).find(".grupba_link").text().trim();


        $.ajax({
        url: "pages/g_harytlar_link.php",
        type: "POST",
        data: { grupba_adi: menu_haryt }, 
        success: function(response) {
            $(".add_group_links").empty().html(response); 
           //$("#products").load('pages/g_harytlar_link.php');   
            ekle(); 
        },
        error: function() {
            alert("Veri yüklenemedi.");
        }
    });
          
        })
});

</script>

<div class="container" style="display: block;  margin-bottom:2%;" id="order_table">
        <form id="orderForm" style="width:100%;">

            <div class=""  id="order_table_row" style="display:flex; width:100%;">
                <div class="" style="padding: 0px 2px; width:100%;">
                    <table id="targetTable" class="responsive-table" style="width:100%;">
                        <thead>
                            <tr>
                                 <th>Haryt</th>                       
                                <th>Bahasy</th>                               
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
                <div class="" id="order_form" style="padding-right: 10px; width:40%;margin-left:auto;">
                    <!------------------------------ form place------------------------->

        </form>
    </div>

    <script src="pages/js_files/sargyt_order_form.js"></script>

    <script>
        $(function() {
            $("#orderForm").on("submit", function(e) {
                e.preventDefault(); // Formun normal şekilde gönderilmesini engeller     
                
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
            // Telefon numarasını doğrulayan fonksiyon
            function validatePhoneNumber(phone) {

        return phone.length === 8 && !isNaN(phone);
    }

    function check_phone_digit(phone_digit) {
    const phone_num = [65, 64, 63, 62, 61, 71];
    const firstTwoDigits = Number(String(phone_digit).slice(0, 2)); // Sayıya çevir
    if (phone_num.includes(firstTwoDigits)) {
       return true; // Doğruysa true döndür
    } else {
        return false; // Yanlışsa false döndür
    }
}
        });
    </script>
<script src="pages/js_files/count_storage.js"></script>