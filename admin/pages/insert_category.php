<?php
    include '../db/dbase.php';

if (isset($_POST['category_name'])) {


    // echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';


    $prod_full_name = $_POST['category_name'];
    $category_desc = $_POST['category_desc'];
    $select_folder = $_POST['select_folder'];
    $parent_id = $_POST['parent_id'];
    $product_code = $_POST['browser'];
    $parent_categ_name = $_POST['parent_categ_name'];
    


    if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
        $file_name = $_FILES['category_image']['name'];
        $file_tmp = $_FILES['category_image']['tmp_name'];

        // Dosyayı yükleme klasörüne taşı
        $upload_dir = 'images/'.$select_folder.'/';
        $upload_file = $upload_dir . basename($file_name);

        if (move_uploaded_file($file_tmp, $upload_file)) {
    
            $sql = "INSERT INTO Categories (CATEGORY_ID, CATEGORY_NAME, PRODUCT_FULL_NAME, PRODUCT_CODE, CATEGORY_PHOTO, CATEGORY_DESC, Image_path) 
                    VALUES ('$parent_id', '$parent_categ_name', '$prod_full_name', '$product_code', '$file_name', '$category_desc', '$upload_dir')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['status' => 'success', 'message' => 'Kategori - haryt goşuldy!']);
    
} 
else {
    echo json_encode(['status' => 'error', 'message' => 'Ýalşyşlyk: ' . mysqli_error($conn)]);
}
} 
else {
echo json_encode(['status' => 'error', 'message' => 'File ýüklenende ýalňyşlyk ýüze çykdy!']);
}
} 
else {
echo json_encode(['status' => 'error', 'message' => 'Image file is required.']);
}

mysqli_close($conn);
}

if(isset($_POST['get_name_categ'])) {
    $parent_categ_name = $_POST['get_name_categ'];


    // Veritabanı bağlantısını da kontrol edelim (örneğin $conn doğru mu?)
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total_rows FROM PARENT_CATEGORY");
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $new_id = $row['total_rows'] + 1; // Toplam satır sayısına 1 ekle
    } else {
        echo "Query Error: " . mysqli_error($conn);
    }


        $checkQuery = "SELECT CATEGORY_NAME FROM PARENT_CATEGORY WHERE CATEGORY_NAME = '$parent_categ_name'";
        $checkResult = mysqli_query($conn, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            echo "Bu ID ulanylyar... Ýazgy hasaba alynmady.";
        } else {

    $sqlbolum = "INSERT INTO PARENT_CATEGORY (PARENT_ID, CATEGORY_NAME) VALUES ('$new_id', '$parent_categ_name')";
    
    // Hata kontrolü
    if ($conn->query($sqlbolum) === TRUE) {
        echo "Yeni kategori başarıyla eklendi!";
    } 
    else {
        echo "SQL Error: " . $sqlbolum . "<br>" . $conn->error;
    }
}
}







?>
