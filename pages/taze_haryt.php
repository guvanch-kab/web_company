

<?php
require '../config/dbase/dbase.php';
    $query = "SELECT * FROM Products WHERE Taze='new' ";
    $result2 = mysqli_query($connect, $query);

    if (mysqli_num_rows($result2) > 0) {

        echo '<div class="row add_group_links">';

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

        
            if (!empty($other_images)) {
                echo '<div class="other-images" style="margin-top:10px;">';
                foreach ($other_images as $image) {
                    echo '<img src="admin/pages/' . $row['image_path'] . '/' . $image . '" alt="Additional Image" style="display:none; width:50px; height:50px; margin:5px;">';
                }
                echo '</div>';
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
        echo '<div class="alert alert-warning" style="text-align:center; width:100%;">Gözlenýän haryt tapylmady.</div>';
    }
//}
?>

<script>
    $(function(){
  
       $(".single_title").click(function() {
     
        $("#select_owl").hide()

       })
    })
</script>