<?php
include_once '../db/dbase.php';

if (isset($_POST['item_id'])) {
    $item_no = $_POST['item_id'];

    // İlk tabloyu güncelle
    $update_query1 = "UPDATE Customers SET is_deleted = 1 WHERE order_number = '$item_no'";
    $result1 = mysqli_query($conn, $update_query1);

    // İkinci tabloyu güncelle
    $update_query2 = "UPDATE OrderItems SET is_deleted = 1 WHERE order_number = '$item_no'";
    $result2 = mysqli_query($conn, $update_query2);

    // Her iki sorgunun da başarılı olup olmadığını kontrol et
    if ($result1 && $result2) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
