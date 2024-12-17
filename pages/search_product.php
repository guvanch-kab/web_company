<?php
require '../config/dbase/dbase.php';

if (isset($_POST['search_query'])) {
    $search_query = mysqli_real_escape_string($connect, $_POST['search_query']);
    $query = "SELECT * FROM Products WHERE (PRODUCT_NAME LIKE '%$search_query%' OR BARKOD_NO LIKE '$search_query') AND CATEGORY_ID='6'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $productName = htmlspecialchars(trim($row['PRODUCT_NAME'])); // Boşlukları temizleme
            $imagePath = htmlspecialchars($row['image_path']);
            $image = htmlspecialchars($row['image']);
            $cust_prod_id = htmlspecialchars($row['custom_product_id']);
            echo '<li class="search-item" data-product-id="' . $cust_prod_id . '">
                    <img src="admin/pages/' . $imagePath . '/' . $image . '" alt="' . $productName . '" class="search-item-image">
                    <span class="search-item-name">' . $productName . '</span>
                  </li>';
        }
    } else {
        echo '<li>Gözlenýän haryt tapylmady.</li>';
    }
}

?>
