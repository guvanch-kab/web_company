<?php

require '../../config/dbase/dbase.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = ''; //trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $region = trim($_POST['select_region']);
    $home = trim($_POST['home_address']);
    
    $customer_orderDate = trim($_POST['date']);
    $customer_id = trim($_POST['cl_id']);
    $order_number = trim($_POST['order_id']);
    $total_sum = trim($_POST['total_sum']);
    $order_Date = date('Y-m-d H:i:s');
    $is_delete = 0;



    $sql = "INSERT INTO Orders (order_number, customer_id, ORDER_DATE, SHIPPING_ADDRESS, SHIPPING_CITY, TOTAL_AMOUNT) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("isssss", $order_number, $customer_id, $order_Date, $home, $region, $total_sum);

    if ($stmt->execute()) {
        // Başarıyla eklendi
    } else {
        echo "Ýalňyşlyk..: " . $stmt->error . "<br>";
    }

    $rows = json_decode($_POST['rows'], true);
    if ($rows && is_array($rows)) {
        foreach ($rows as $row) {
            $prod_id = $row['prod_id'];
            $goods_name = $row['name'];
            $meterPrice = $row['meterPrice'];
            $length = $row['length'];
            $quantity = $row['quantity'];
            $totalForRow = $row['totalForRow'];

            $sql = "INSERT INTO OrderItems (customer_id, order_number, PRODUCTS_ID, QUANTITY, PRICE, METER_PRICE, is_deleted) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("siiissi", $customer_id, $order_number, $prod_id, $quantity, $totalForRow, $meterPrice, $is_delete);

            if ($stmt->execute()) {
                // Başarıyla eklendi
            } else {
                echo "Ýalňyşlyk..: " . $stmt->error . "<br>";
            }
        }
    }


    $sql = "INSERT INTO Customers (name, surname, email, phone, region, notes, customer_id, order_number, order_date, is_deleted) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sssssssssi", $name, $surname, $email, $phone, $region, $home, $customer_id, $order_number, $customer_orderDate, $is_delete);

    if ($stmt->execute()) {
        
        $selectSql = "SELECT Products.*, OrderItems.*, Customers.*
            FROM Products 
            JOIN OrderItems ON Products.PRODUCTS_ID = OrderItems.PRODUCTS_ID
            JOIN Customers ON Customers.order_number = OrderItems.order_number
            WHERE Customers.order_number = ? AND OrderItems.order_number = ?";

        $selectStmt = $connect->prepare($selectSql);
        $selectStmt->bind_param("ss", $order_number, $order_number);
        $selectStmt->execute();


        $result = $selectStmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        $html = '<div class="alert alert-success" style="text-align:left; background-color:#fff; font-weight:600">';
        $html .= '<h4>Sargydyňyz üstünlikli edildi!</h4>';

        if (!empty($rows)) {
            $firstRow = $rows[0];
            $html .= '<p>Hormatly: ' . htmlspecialchars($firstRow['name'] ?? 'Yazga alynmady') . ' ' . htmlspecialchars($firstRow['surname'] ?? 'Yazga alynmady') . '</p>';
            $html .= '<p>Sargyt nomeriniz: ' . htmlspecialchars($firstRow['order_number'] ?? 'Tapylmady') . '</p>';
        } else {
            $html .= '<p>Sargyt nomeriniz: Görkezilmedi</p>';
        }

        $html .= '<table class="table table-striped">';
        $html .= '<thead><tr>';
        $html .= '<th>Haryt ady</th><th>Sany</th><th>Bahasy</th><th>Sargydyň senesi</th>';
        $html .= '</tr></thead><tbody>';
        
        $jemi_toplam = 0;

        foreach ($rows as $row) {
            $html .= '<tr>';
            $html .= '<td>' . htmlspecialchars($row['PRODUCT_NAME']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['QUANTITY']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['PRICE']) . '</td>';
            $html .= '<td>' . htmlspecialchars($row['order_date']) . '</td>';
            $html .= '</tr>';
            $jemi_toplam += (float)$row['PRICE'];
        }

        $html .= '<tr><td colspan="4">Jemi bahasy: ' . htmlspecialchars($jemi_toplam) . '</td></tr>';
        $html .= '</tbody></table>';
        $html .= '</div>';
        echo $html;
    } else {
        echo '<div class="alert alert-danger">Yazgy girizmek işi yerine yetirip bolmady.</div>';
    }
}
?>
