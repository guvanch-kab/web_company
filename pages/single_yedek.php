<div class="container " id="single_page" style="background-color: #fff; margin-bottom: 15px; padding:0 0 10px 4px; display:flex;align-items:start;" >
   
      <div class="col-md-6" style="padding: 30px; border-right: 1px solid #efefde; background-color:#fff; display: flex;">        
         <img src="" alt="Ürün Resmi" style="width:80%;  box-shadow: none;" class="img-fluid custom_direction"> 

         <div class="sideImages" style="margin: 0; padding:30px;"></div>
           </div>
     
     
      <div class="col-md-6 p-4" style="height:96%; background-color: #fff;">
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

/////////////////////////////////////////////




while ($row = $result2->fetch_assoc()) {   
   $images = [];    
  
   if (strpos($row['image'], ',') !== false) {
       $images = explode(',', $row['image']);

   } else {
       // Eğer sadece tek bir resim varsa, diziyi tek bir elemanla oluştur
       $images[] = $row['image']; 
   }

   $main_image = $images[0]; // Ana resim
   $other_images = array_slice($images, 0); // Diğer küçük resimler

   if (!empty($row['Grupba_ady']) && !in_array($row['Grupba_ady'], $grupba)) {

       $grupba[] = $row['Grupba_ady'];
   }

   

   
   echo '
   <div class="col-lg-3 col-sm-6 col-6 space_cards product_cart" style="padding-top:0; padding-right:0; padding-left:2px; padding-bottom: 2px;">
       <div class="card p-3 rounded-4" style="min-height:100%">
           <code class="product_id" style="display:none">'. htmlspecialchars($row['PRODUCTS_ID']) .'</code>
           <img class="card-img-top single_title main_image" style="cursor:pointer" src="admin/pages/'.$row['image_path'].'/'. $main_image.' " alt="Product Image" loading="lazy">
              
           <div class="prod_c other-images" style="display:none">';


foreach ($other_images as $index => $image) {
echo '<img  src="admin/pages/' . $row['image_path'] . '/' . $image . '" alt="Additional Image" class="additional-image">';
}
echo'
</div>


           <p class="card-title pt-2 single_title" style="cursor:pointer"><strong>' . htmlspecialchars($row['PRODUCT_NAME']) . '</strong></p>    
           <div class="card-body"  style="padding:0 !important; align:left;">
               <p class="card-text" style="text-align: left;padding-bottom: 6px;margin-bottom: 0;">' . $row['SHORT_DESC'] . '</p>
               <p class="prod_full_desc" style="display:none;text-align: left;">' . $row['PROD_DESC'] . '</p>
               <div class="saga_yasla" style="display:flex; flex-direction: column; justify-content: space-between;">
                   <h5><strong>' . htmlspecialchars($row['PRICE']) . ' TMT</strong></h5>
<a href="#" class="btn_shop_svg sebede_gosh bg-primary" style="dislay:flex; justify-content: center;align-items: center;" width: 100%; height:40px;">Sebede goş</a>     
               </div>           
           </div>
       </div>
   </div>'; 
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

///////////////////////////////////////


<script>
/*
$(document).ready(function () {
    $(".main_image").click(function () {
        // Tıklanan ana resim öğesi
        const mainImage = $(this).attr("src");

        // Ürüne ait diğer resimleri sakladığımız div
        const productCard = $(this).closest(".product_cart");
        const otherImages = [];
        
        // "Diğer küçük resimleri" div içinden alıyoruz
        productCard.find(".prod_c img").each(function () {
            otherImages.push($(this).attr("src"));
        });

        // Detay sayfasındaki alanları doldur
        const singlePage = $("#single_page");
        singlePage.find(".custom_direction").attr("src", mainImage); // Ana resmi ekle

        // Yan resimler için temizleyip yeniden ekle
        const sideImagesContainer = singlePage.find(".sideImages");
        sideImagesContainer.empty(); // Önce tüm resimleri temizle
        otherImages.forEach(function (src, index) {
            const imgClass = index === 0 ? "active_image" : `other_image${index}`;
            sideImagesContainer.append(`<img src="${src}" alt="Resim ${index + 1}" class="${imgClass}">`);
        });
    });
});

*/
</script>