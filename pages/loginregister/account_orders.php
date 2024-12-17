
<?php
//  while ($row = $result->fetch_assoc()) {
      //  $account_name = $row['name'];
      //  $account_surname = $row['surname'];
       // $account_phone = $row['phone'];
       //<?= htmlspecialchars($order_number); 
//<?= htmlspecialchars($order_date); 
?>

<div class="row to__hide" style="border-bottom: 2px solid #808000; align-items: center;">
    <div class="coll_1">Haryt ady</div>
    <div class="coll_2">Bahasy</div>
    <div class="coll_3">Sany</div>
    <div class="coll_4">Jemi baha</div>
    <div class="coll_5">Sargyt etmek</div>
    <div class="coll_6">Eltip bermek</div>
    <div class="coll_7">Poz</div>
</div>

    <?php
session_start();
require '../../config/dbase/dbase.php';

$phone_account = $_SESSION['phone'];

$check_query = "SELECT * FROM Customers WHERE phone='$phone_account'";
$result = mysqli_query($connect, $check_query);

if ($result && mysqli_num_rows($result) > 0) {  
       $row = mysqli_fetch_assoc($result);
    $order_number = $row['order_number'];
    $order_date = $row['order_date'];

    $get_order_number = "SELECT O.ORDER_ITEM_ID AS order_item, O.PRICE AS order_price, O.QUANTITY AS order_quantity, O.METER_PRICE AS order_quantity_price, P.PRODUCT_NAME, C.order_date AS order_delivery_date, Ord.ORDER_DATE AS order_date_sene
    FROM Customers C
    JOIN OrderItems O ON C.order_number = O.order_number
    JOIN Orders Ord ON C.order_number = Ord.order_number
    JOIN Products P ON O.PRODUCTS_ID = P.PRODUCTS_ID
    WHERE C.phone = '$phone_account' AND O.is_deleted = 0";

$result2 = mysqli_query($connect, $get_order_number);

if ($result2 && mysqli_num_rows($result2) > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $order_date_sene = $row2['order_date_sene']; // Siparişin yapıldığı tarih (Orders tablosundan)
        $order_delivery_date = $row2['order_delivery_date']; // Teslimat tarihi (Customers tablosundan)
?>
    <div class="row row_sargytlar" id="row-<?= $row2['order_item']; ?>" style="border-bottom: 1px solid #e1e1c4;">
        <div class="my__name"><?= $row2['PRODUCT_NAME']; ?></div>
        <div class="my__price"><?= $row2['order_quantity_price']; ?></div>
        <div class="my__quantity"><?= $row2['order_quantity']; ?></div>
        <div class="my__price2"><?= $row2['order_price']; ?></div>
        <div class="my__date"><?= $order_date_sene; ?></div>
        <div class="my__date2"><?= $order_delivery_date; ?></div>
        <div class="hide_close">
            <i class="fas fa-trash" style="cursor:pointer; font-size: 18px; color: #dd6f00;" onclick="deleteRow(<?= $row2['order_item']; ?>)"></i>
        </div>
    </div>

<?php
    }
}
else {
    echo "Sargyt tapylmady.";
}    
} else {
    echo "<div class='alert alert-warning'>Sargyt tapylmady.</div>";
}
?>

<script>    
    function deleteRow(itemId) {
      
        $.ajax({
            url: 'pages/loginregister/delete_hide_item.php',
            type: 'POST',
            data: { item_id: itemId },
            success: function(response) {
                // Ajax isteği başarılı olduğunda satırı gizle
                $('#row-' + itemId).fadeOut();
            },
            error: function() {
                alert('Bir hata oluştu, lütfen tekrar deneyin.');
            }
        });
    }        
</script>