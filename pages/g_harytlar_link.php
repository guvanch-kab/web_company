
<?php
// Hataları göster
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../config/dbase/dbase.php';

if (isset($_POST['grupba_adi'])) {
    $get_grupba_ady = mysqli_real_escape_string($connect, $_POST['grupba_adi']); // AJAX'tan gelen değer

    $check_query = "SELECT * FROM Products WHERE Grupba_ady='$get_grupba_ady'";
    $result2 = mysqli_query($connect, $check_query);
}
if (isset($_POST['cust_productId'])) {
        $cust_productId = mysqli_real_escape_string($connect, $_POST['cust_productId']); // AJAX'tan gelen değer
    
        $check_query = "SELECT * FROM Products WHERE custom_product_id='$cust_productId'";
        $result2 = mysqli_query($connect, $check_query);
}   

    

    if ($result2 && mysqli_num_rows($result2) > 0) {       

        while ($row = $result2->fetch_assoc()) {

            $images = [];    
                  
            if (strpos($row['image'], ',') !== false) {
                $images = explode(',', $row['image']);

            } else {
                
                $images[] = $row['image']; 
            }
        
            $main_image = $images[0]; // Ana resim
            $other_images = array_slice($images, 0); // Diğer küçük resimler
        
            if (!empty($other_images)) {
                echo '<div class="other-images" style="margin-top:10px;">';
                foreach ($other_images as $image) {
                    echo '<img src="admin/pages/' . $row['image_path'] . '/' . $image . '" alt="Additional Image" style="display:none; width:50px; height:50px; margin:5px;">';
                }
                echo '</div>';
            }
            echo '
					<div class="product_cart col-lg-3 col-sm-6 col-6" style="padding-top:0; padding-right:0; padding-left:2px; padding-bottom: 2px;">
					   <div class="card p-3 rounded-4" style="min-height:100%">
						  <code class="product_id" style="display:none">'. htmlspecialchars($row['PRODUCTS_ID']) .'</code>
						  <img class="card-img-top single_title main_image" src="admin/pages/'.$row['image_path'].'/'. $main_image.' " alt="Product Image" loading="lazy">
						  <div class="prod_c other-images" style="display:none">
                          <code class="stock__" style="display:none"> '. htmlspecialchars($row['STOCK_AMOUNT']).'</code>
                          ';
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
								<h5><strong>' . htmlspecialchars($row['PRICE']) . ' TMT</strong></h5>
								<a href="#" class="btn_shop_svg sebede_gosh bg-primary">Sebede goş</a>     
							 </div>
						  </div>
					   </div>
					</div>
					'; 
					}
					echo '</div></div>';

    } else {
        echo '<div class="alert alert-warning" style="text-align:center;">Bu grupbada haryt yok</div>';
    }
//}
?>

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

<script>
$(document).ready(function() {
   
    $(".product_cart").each(function() {
        var stockAmount = $(this).find(".stock__").text().trim(); // Stok miktarını al
        if (stockAmount == "0") { 
            $(this).find(".sebede_gosh").addClass("disabled").attr("disabled", true).css({
                "opacity": "0.6",
                "pointer-events": "none"
            });
        }
    });
});
</script>