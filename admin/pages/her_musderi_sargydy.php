<?php
include_once '../db/dbase.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['customer_id'])) {
    $customer_id = $_POST['customer_id'];

    // Check if customer exists
    $check_query = "SELECT * FROM Customers WHERE customer_id='$customer_id'";
    $result = mysqli_query($conn, $check_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $order_number = $row['order_number'];

        echo '
        <table class="table table-striped table-bordered" style="margin-top:20px; border-bottom: 2px solid #808000;">
            <thead>
                <tr>
                    <th>Haryt ady</th>
                    <th>Bahasy</th>
                    <th>Sany</th>
                    <th>Jemi baha</th>
                    <th>Sargyt etmek</th>
                    <th>Eltip bermek</th>
                    <th>Salgysy</th>
                    <th>Poz</th>
                </tr>
            </thead>
            <tbody>
        ';

        $get_order_number = "SELECT O.ORDER_ITEM_ID AS order_item, O.PRICE AS order_price, O.QUANTITY AS order_quantity, 
                                     O.METER_PRICE AS order_quantity_price, P.PRODUCT_NAME, C.order_date AS order_delivery_date, 
                                     C.notes AS salgy, Ord.ORDER_DATE AS order_date_sene
                             FROM OrderItems O
                             JOIN Orders Ord ON O.order_number = Ord.order_number
                             JOIN Products P ON O.PRODUCTS_ID = P.PRODUCTS_ID
                             JOIN Customers C ON C.order_number = O.order_number
                             WHERE C.customer_id='$customer_id' AND O.is_deleted = 0 ";

        $result2 = mysqli_query($conn, $get_order_number);

        if ($result2 && mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $order_date_sene = $row2['order_date_sene'];
                $order_delivery_date = $row2['order_delivery_date'];
                $salgy = $row2['salgy'];

                echo '
                    <tr id="row-' . $row2['order_item'] . '">
                        <td>' . htmlspecialchars($row2['PRODUCT_NAME']) . '</td>
                        <td>' . htmlspecialchars($row2['order_quantity_price']) . '</td>
                        <td>' . htmlspecialchars($row2['order_quantity']) . '</td>
                        <td>' . htmlspecialchars($row2['order_price']) . '</td>
                        <td>' . htmlspecialchars($order_date_sene) . '</td>
                        <td>' . htmlspecialchars($order_delivery_date) . '</td>
                        <td>' . htmlspecialchars($salgy) . '</td>
                        <td><i class="fas fa-trash"  style="cursor: pointer; font-size:18px; color: #dd6f00;" onclick="deleteRow(' . $row2['order_item'] . ')"></i></td>
                    </tr>
                ';
            }
        } else {
            echo '<tr><td colspan="8" class="text-center alert alert-warning">Sargyt tapylmady.</td></tr>';
        }

        echo '
            </tbody>
        </table>';
        
    } else {
        echo "<div class='alert alert-warning'>Müşteri bulunamadı.</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Customer ID not provided.</div>";
}
?>
