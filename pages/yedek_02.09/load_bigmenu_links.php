<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../config/dbase/dbase.php';

ob_start(); // Start output buffering

$check_query = "SELECT DISTINCT Grupba_ady FROM Categories WHERE PRODUCT_CODE='GUR_EN'";
$result2 = mysqli_query($connect, $check_query);

$grupba = [];
if ($result2 && mysqli_num_rows($result2) > 0) {
    while ($row = $result2->fetch_assoc()) {
        if (!empty($row['Grupba_ady'])) {
            $grupba[] = $row['Grupba_ady'];
        }
    }
}

header('Content-Type: application/json');
ob_end_clean(); // Clear the output buffer to remove any unwanted output

// Return JSON response
if (empty($grupba)) {
    echo json_encode(["error" => "No data found"]);
} else {
    echo json_encode($grupba);
}

