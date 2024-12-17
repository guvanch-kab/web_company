<?php
// function getCategories($conn) {
    // Verileri tutmak için boş diziler tanımlıyoruz
    $categ_id = array();
    $categ_name = array();
    $categ_photo = array();
    $categ_desc = array();
    $img_path = array();
    $parent_id=array();
    $categ_name=array();
    $prod_code=array();
    $prod_name=array();


    // Sorgu
    $query = "SELECT * FROM Categories";
    $result = mysqli_query($conn, $query);

    // Sonuçları kontrol ediyoruz
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
        }
    }

 
     $query2 = "SELECT * FROM PARENT_CATEGORY "; // =1 YERINE BASGA SANLAR GELIP BILER, SON UYTGETMELI
    $result2 = mysqli_query($conn, $query2);

    // Sonuçları kontrol ediyoruz
    if ($result2->num_rows > 0) {
        // Veritabanından çekilen her satırı ilgili dizilere ekliyoruz
        while ($row = $result2->fetch_assoc()) {
            $parent_id[] = $row['PARENT_ID'];
            $parent_categ_name[] = $row['CATEGORY_NAME'];

        }
    }



    // $query2 = "SELECT * FROM PARENT_PRODUCT_CODE where PARENT_ID=1 "; // =1 YERINE BASGA SANLAR GELIP BILER, SON UYTGETMELI
    // $result2 = mysqli_query($conn, $query2);

    // // Sonuçları kontrol ediyoruz
    // if ($result2->num_rows > 0) {
    //     // Veritabanından çekilen her satırı ilgili dizilere ekliyoruz
    //     while ($row = $result2->fetch_assoc()) {
    //         $parent_id[] = $row['PARENT_ID'];
    //         $prod_name[] = $row['PRODUCT_NAME'];
    //         $prod_code_name[] = $row['PRODUCT_CODE_NAME'];
    //         $categ_name[] = $row['CATEGORY_NAME'];

    //     }
    // }



?>