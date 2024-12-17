<?php
$today = date('Y-m-d');
  
    include '../db/dbase.php';

    //if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['ton_price'])) {    //  Metall prokat haryt girisi kontroly


// echo'<pre>';
// 	print_r($_POST);
// 	echo'</pre>';

        
        $prod_name = $_POST['prod_name'];

        $custom_code = $_POST['custom_code']; 
        $short_desc = $_POST['short_desc'];
        $long_desc = $_POST['long_desc'];// Opsiyonel alan
        $meterLength = $_POST['length_metall'];
        $weight_per_meter = $_POST['weight_meter_length'];      
        $ton_price = $_POST['ton_price'];
        $categ_id = $_POST['categ_id'];
        $prod_code_name = $_POST['prod_code_name']; 
        $grupba_metal='metallar';
       

            $sql = "INSERT INTO Products 
            (PRODUCT_CODE, custom_product_id, PRODUCT_NAME, PROD_DESC, SHORT_DESC, PRICE, CATEGORY_ID, LENGTH_METALL,  CREATED_DATE, UPDATED_DATE, METER_WEIGHT,  Grupba_ady) 
            VALUES ('$prod_code_name', '$custom_code', '$prod_name', '$long_desc', '$short_desc', '$ton_price', '$categ_id', '$meterLength',  '$today', '$today', '$weight_per_meter','$grupba_metal')";
        
        if (mysqli_query($conn, $sql)) {
            echo json_encode(['status' => 'success', 'message' => 'Haryt üstünlikli girizildi!']);
        } 
        else {
            echo json_encode(['status' => 'error', 'message' => 'Ýalňyşlyk: ' . mysqli_error($conn)]);
        }       
        mysqli_close($conn);
        }
/////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['quantity_price'])) {    


    // echo'<pre>';
	// print_r($_POST);
	// echo'</pre>';

    $prod_name = $_POST['prod_name'];
    $custom_code = $_POST['custom_code']; 
    $short_desc = $_POST['short_desc'];
    $long_desc = $_POST['long_desc'];// Opsiyonel alan
    //$meterLength = $_POST['length_metall'];
    //$weight_per_meter = $_POST['weight_meter_length'];
  
    $barkod_no = $_POST['barkod_no'];
    $quantity = $_POST['quantity'];
    $quantity_price = $_POST['quantity_price'];
    $categ_id = $_POST['categ_id'];
    $prod_code_name = $_POST['prod_code_name'];
    $taze_new = $_POST['taze_new'];
    $select_folder = $_POST['select_folder'];
    $group_name = $_POST['grupba_ady'];

    if (isset($_FILES['product_images']) && !empty($_FILES['product_images']['name'][0])) {
        $fileCount = count($_FILES['product_images']['name']);
        $upload_dir = 'images/' . $select_folder . '/';
    
        // Tüm resim adlarını tutacak bir dizi
        $image_names = [];
    
        for ($i = 0; $i < $fileCount; $i++) {
            $image_name = $_FILES['product_images']['name'][$i];
            $file_tmp = $_FILES['product_images']['tmp_name'][$i];
            $upload_file = $upload_dir . basename($image_name);
    
            // Dosyayı taşı
            if (move_uploaded_file($file_tmp, $upload_file)) {
                $image_names[] = $image_name; // Başarılı olan dosyanın adını diziye ekle
            } else {
                echo json_encode(['status' => 'error', 'message' => "Dosya taşınamadı: " . $image_name]);
                exit; // Hata durumunda işlemi durdur
            }
        }
    
        // Tüm resim adlarını virgülle birleştir
        $image_names_string = implode(',', $image_names);
    
        // Veritabanına tek kayıt olarak ekle
        $sql = "INSERT INTO Products (
                    PRODUCT_CODE, custom_product_id, PRODUCT_NAME, PROD_DESC, SHORT_DESC, PRICE, CATEGORY_ID, QUANTITY, image, image_path, CREATED_DATE, UPDATED_DATE, Grupba_ady, BARKOD_NO, Taze
                ) VALUES (
                    '$prod_code_name', '$custom_code', '$prod_name', '$long_desc', '$short_desc', '$quantity_price', '$categ_id', '$quantity', '$image_names_string', '$upload_dir', '$today', '$today', '$group_name', '$barkod_no', '$taze_new'
                )";
    
        if (mysqli_query($conn, $sql)) {
            echo json_encode(['status' => 'success', 'message' => 'Haryt üstünlikli girizildi!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Veritabanı hatası: ' . mysqli_error($conn)]);
        }
    }
    

    }
        
?>
