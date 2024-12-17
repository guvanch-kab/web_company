<?php
include_once '../db/dbase.php';

if (isset($_POST['change_number'])) {
    // Kullanıcı verilerini güvenli hale getirme (SQL enjeksiyonu riskini önleme)
    $change_number = mysqli_real_escape_string($conn, $_POST['change_number']); 
    $codeid = mysqli_real_escape_string($conn, $_POST["codeid"]);
    $idno = mysqli_real_escape_string($conn, $_POST["idno"]);

    // SQL sorgusu
    $sqlupd = "UPDATE Products SET $idno='$change_number' WHERE custom_product_id='$codeid'";
    if (mysqli_query($conn, $sqlupd)) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);  // Hata mesajı
    }
} 

else if (isset($_POST['update_number'])) {
    // Kullanıcı verilerini güvenli hale getirme (SQL enjeksiyonu riskini önleme)
    $update_number = mysqli_real_escape_string($conn, $_POST['update_number']);  
    $codeid2 = mysqli_real_escape_string($conn, $_POST["codeid2"]);
    $idno2 = mysqli_real_escape_string($conn, $_POST["idno2"]);

    // SQL sorgusu
    $sqlupd2 = "UPDATE Categories SET $idno2='$update_number' WHERE CATEGORY_ID='$codeid2'";
    if (mysqli_query($conn, $sqlupd2)) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);  // Hata mesajı
    }
}

else if (isset($_POST['prod_code'])) {
    // Kullanıcı verilerini güvenli hale getirme (SQL enjeksiyonu riskini önleme)
    $prod_code = mysqli_real_escape_string($conn, $_POST['prod_code']);
    $prod_field_name = mysqli_real_escape_string($conn, $_POST["prod_field_name"]);
    $prod_name = mysqli_real_escape_string($conn, $_POST["prod_name"]);

    // SQL sorgusu
    $sqlupd2 = "UPDATE Categories SET $prod_field_name='$prod_name' WHERE PRODUCT_CODE='$prod_code'";
    if (mysqli_query($conn, $sqlupd2)) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);  // Hata mesajı
    }
}

if (isset($_FILES['prod_img']) && isset($_POST['prod_id'])) {
    $prod_id = mysqli_real_escape_string($conn, $_POST['prod_id']);
    $file = $_FILES['prod_img'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $file_name = basename($file['name']);  // Dosya adını al
        $temp_name = $file['tmp_name'];  // Geçici dosya adı

        // Klasör yolu
        $upload_dir = 'images/gurlusyk/';
        $target_file = $upload_dir . $file_name;

        if (move_uploaded_file($temp_name, $target_file)) {
            // SQL sorgusu
            $sqlupd2 = "UPDATE Products SET image='$file_name' WHERE custom_product_id='$prod_id'";
            if (mysqli_query($conn, $sqlupd2)) {
                echo "Database successfully updated.";
            } else {
                echo "Error updating record: " . mysqli_error($conn);  // Hata mesajı
            }
        } 
    } 
} 

/////////////////////////////


if (isset($_POST['grupba_ady'])) {
    $product_code = $_POST['grupba_ady'];

    //var_dump($_POST);

    // Ürün koduna göre grup adını almak için sorgu
    $query = "SELECT DISTINCT Grupba_ady FROM Products WHERE PRODUCT_CODE = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $product_code);
    $stmt->execute();
    $result = $stmt->get_result();

    $options = '';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . htmlspecialchars($row['Grupba_ady']) . '"></option>';
    }

    echo $options;
} else {
    echo "POST parametresi alınamadı.";
}



