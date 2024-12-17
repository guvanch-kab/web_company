
<?php
include_once '../db/dbase.php';
    if (isset($_GET['jsVariable'])) {

   $categ_mater_id = $_GET['jsVariable'];  

$query = "SELECT * FROM PARENT_CATEGORY";
$result = mysqli_query($conn, $query);
$parent_id=array();
$categ_id = array();

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $parent_id[] = $row['PARENT_ID'];
        $categ_name[] = $row['CATEGORY_NAME'];
    }
}
}
?>

<script>
$(".sargyt_gor").click(function(e) {
    e.preventDefault();
    const customerId = $(this).attr('id'); 
    $("#customer_id").val(customerId); // Gizli alana değeri ata

    $.ajax({
        url: 'pages/sargyt_kabul.php', // PHP dosyanızın yolu
        type: 'POST',
        data: $("#yourForm").serialize(), // Form verilerini gönder
        success: function(response) {
            console.log("Sunucudan gelen yanıt:", response);
            $(".admin_order_show").html(response).show(); // Yanıtı göster
        },
        error: function(error) {
            console.error("Hata:", error);
        }
    });
});

</script>



    <div class="container-fluid" >

    <form id="sargyt_form">
        <input type="text" id="customer_id" name="customer_id" value="">
    </form>

    <div class="main_place_upd">

    <div class="row" style="padding:2px 0;">

    <div class="col">
    <label for="exampleFormControlSelect1">Kategoriýa görä</label>
    <select class="form-control" id="categ_select" style="margin-bottom:12px;font-size:14px" required>
                <option selected disabled value="">Kategoriya sayla</option>
                <?php if (!empty($parent_id)) : ?>
                    <?php for ($i = 0; $i <count($parent_id); $i++) : ?>
                     
                        <option value="<?= htmlspecialchars($parent_id[$i]) ?>" data-name="<?= htmlspecialchars($PARENT_ID[$i]) ?>">
                <?= htmlspecialchars($categ_name[$i]) ?>
            </option>

                <?php endfor; ?>
                <?php endif; ?>                
            </select>
            </div>

            <div class="col">
    <label for="name">Sene saýlaň: (sargyt senesini görkeziň)</label>
      <input type="date" class="form-control"  id="sargt_sene" name="sargyt_senesi">
    </div>  

    <div class="col">
    <label for="name">Gözleg:</label>
      <input type="text" class="form-control" autocomplete="off" id="sargyt_gozle" name="sargyt_gozle">
    </div> 
  </div>   
<hr>

<table style="border-collapse: collapse; width: 100%;">
    <tbody>

<?php
  $check = "SELECT * FROM Customers ";
    $result0 = mysqli_query($conn, $check);

    if ($result0 && mysqli_num_rows($result0) > 0) { 
    while ($row0 = mysqli_fetch_assoc($result0))
    {
        ?>
    <tr>
    <td style="text-align: left; width:150px;"><?php echo $row0['name']; ?></td>
    <td style="text-align: left; width:150px;"><?php echo $row0['surname']; ?></td>
    
    <td style="text-align: left; padding: 8px;"><a href="#" id="<?php echo $row0['customer_id']; ?>" class="sargyt_gor">Sargydy gör</a></td>
    </tr>       
<?php
    }
}
?>
</tbody>
</table>

<div class="admin_order_show" style="display: none;">

  <div class="row" style="margin-top:20px; border-bottom: 2px solid #808000; align-items: center;">
    <div class="col-12 col-md-2">Haryt ady</div>
    <div class="col-12 col-md-2">Bahasy</div>
    <div class="col-12 col-md-1">Sany</div>
    <div class="col-12 col-md-2">Jemi baha</div>
    <div class="col-12 col-md-2">Sargyt etmek</div>
    <div class="col-12 col-md-2">Eltip bermek</div>
    <div class="col-12 col-md-1"></div>   
</div>
  
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['customer_id'])) {
    $customer_id = $_POST['customer_id'];
    
    // Gelen değeri kontrol etmek için
    echo "Gelen customer_id: " . htmlspecialchars($customer_id);

}
else {
    echo "Customer ID not provided.";
}

    $check_query = "SELECT * FROM Customers WHERE customer_id='$customer_id'";
    $result = mysqli_query($conn, $check_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $order_number = $row['order_number'];

        // Sadece bu müşteri için siparişleri al
        $get_order_number = "SELECT O.ORDER_ITEM_ID AS order_item, O.PRICE AS order_price, O.QUANTITY AS order_quantity, O.METER_PRICE AS order_quantity_price, 
                             P.PRODUCT_NAME, C.order_date AS order_delivery_date, Ord.ORDER_DATE AS order_date_sene
                             FROM OrderItems O
                             JOIN Orders Ord ON O.order_number = Ord.order_number
                             JOIN Products P ON O.PRODUCTS_ID = P.PRODUCTS_ID
                             JOIN Customers C ON C.order_number = O.order_number
                             WHERE C.customer_id='$customer_id' AND O.is_deleted = 0";

        $result2 = mysqli_query($conn, $get_order_number);

        if ($result2 && mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $order_date_sene = $row2['order_date_sene'];
                $order_delivery_date = $row2['order_delivery_date'];
?>
                <div class="row py-3" id="row-<?= $row2['order_item']; ?>" style="border-bottom: 1px solid #e1e1c4;">
                    <div class="col-md-2 my__name"><?= $row2['PRODUCT_NAME']; ?></div>
                    <div class="col-md-2 my__price"><?= $row2['order_quantity_price']; ?></div>
                    <div class="col-md-1 my__quantity"><?= $row2['order_quantity']; ?></div>
                    <div class="col-md-2 my__price2"><?= $row2['order_price']; ?></div>
                    <div class="col-md-2 my__date"><?= $order_date_sene; ?></div>
                    <div class="col-md-2 my__date2"><?= $order_delivery_date; ?></div>
                    <div class="col-md-1 hide_close">
                        <i class="fa-solid fa-xmark" style="cursor: pointer;color: #868686;" onclick="deleteRow(<?= $row2['order_item']; ?>)"></i>
                    </div>
                </div>
<?php
            }
        } else {
            echo "<div class='alert alert-warning'>Sargyt tapylmady.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Müşteri bulunamadı.</div>";
    }

?>

</div>










