<?php


require '../../config/dbase/dbase.php';

if (isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    $update_query = "UPDATE OrderItems SET is_deleted = 1 WHERE ORDER_ITEM_ID = '$item_id'";
    if (mysqli_query($connect, $update_query)) {
        echo "success";
    } else {
        echo "error";
    }
}


?>