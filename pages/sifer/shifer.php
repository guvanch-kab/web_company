<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json'); // JSON olarak döndüreceğimizi belirtin

// Output buffering başlatın
ob_start();

include '../../config/dbase/dbase.php';

// POST verisini alıyoruz
$page = isset($_POST['page']) ? $_POST['page'] : '';

// Veritabanı sorgusunu yapıyoruz
$check_query = "SELECT * FROM roofs WHERE Roof_code='$page'";
$result2 = mysqli_query($connect, $check_query);

if (!$result2) {
    // Eğer bir hata varsa, JSON formatında döndürün
    $error_message = mysqli_error($connect);
    echo json_encode(array('error' => $error_message));
    exit;
}

$rowCount = mysqli_num_rows($result2);
// Eğer sonuç varsa JSON olarak döndür
$items = array();
if ($rowCount > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
        $items[] = array(
            'imgSrc' => 'pages/images/sifer/' . $row['image'], // resim yolunu veritabanı alanı ile birleştir
            'title' => $row['Roof_types'],
            'color_name' => $row['Color'],
            'color_code' => $row['Color_code'],
            'size' => $row['Size'],
            'thickness' => $row['Thickness'],
            'price' => $row['Price']
        );
    }
    $response = array(
        'items' => $items,
        'rowCount' => $rowCount
    );
    // JSON formatında döndür
    echo json_encode($response);
} else {
    echo json_encode(array('error' => 'Veri bulunamadı'));
}

// Bağlantıyı kapatıyoruz
$connect->close();

// Output buffering'i temizleyin ve kapatın
ob_end_flush();


?>
