<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../config/dbase/dbase.php';

header('Content-Type: application/json');

$goods_id = $_GET['goods_id'] ?? '';
error_log("Received goods_id: " . $goods_id); 
$response = [];

if (!$goods_id) {
    echo json_encode(['error' => 'No goods_id provided']);
    exit;
}

$query = "SELECT DISTINCT PRODUCT_CODE, PRODUCT_FULL_NAME FROM Categories";
$result = $connect->query($query);

$product_codes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product_codes[] = [
            'PRODUCT_CODE' => $row['PRODUCT_CODE'],
            'PRODUCT_FULL_NAME' => $row['PRODUCT_FULL_NAME']
        ];
    }
}
$selected_product_code = null;
foreach ($product_codes as $product) {
    if ($product['PRODUCT_FULL_NAME'] === $goods_id) {
        $selected_product_code = $product['PRODUCT_CODE'];
        break;
    }
}
if ($selected_product_code) {

    $query = "SELECT DISTINCT Grupba_ady FROM Products WHERE PRODUCT_CODE = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $selected_product_code);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $response[] = $row['Grupba_ady'] ?? '';
        }
    } else {
        echo json_encode(['error' => 'Products query execution failed']);
        exit;
    }
} else {
    echo json_encode(['error' => 'Invalid goods_id provided']);
    exit;
}
echo json_encode($response);
exit;
?>
