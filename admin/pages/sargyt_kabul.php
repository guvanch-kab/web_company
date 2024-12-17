<style>

</style>


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
    <div class="container-fluid" >

    <form id="sargyt_form">
        <input type="text" id="customer_id" name="customer_id" value="">
    </form>

    <div class="main_place_upd">

    <div class="row" style="padding:2px 0;">

    <!-- <div class="col">
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
            </div> -->

            <div class="col-md-2">
    <label for="name">Sene saýlaň: (sargyt senesini görkeziň)</label>
      <input type="date" class="form-control"  id="sargt_sene" name="sargyt_senesi">
    </div>  

    <div class="col-md-3">
    <label for="name">Gözleg:</label>
      <input type="text" class="form-control" autocomplete="off" id="sargyt_gozle" name="sargyt_gozle">
    </div> 
  </div>

<table class="table mt-3"  style="width: 100%; background-color: #ffffff;">
    <tbody>

<?php
$check = "SELECT C.customer_id, 
MAX(C.name) AS name, 
MAX(C.surname) AS surname,
MAX(O.order_number) AS order_number,
MAX(C.phone) AS phone,
MAX(C.order_date) AS order_date
FROM Customers C
JOIN OrderItems O ON C.order_number = O.order_number
WHERE C.is_deleted = 0
GROUP BY C.customer_id";
$result0 = mysqli_query($conn, $check);

    if ($result0 && mysqli_num_rows($result0) > 0) { 
    while ($row0 = mysqli_fetch_assoc($result0))
    {
  
        ?>
  
    <tr class="customer-row" style="border-bottom: 1px solid #d6d6d6;" id="row-<?= $row0['order_number']; ?>">
    <td style="text-align: left; width:150px;"><?php echo $row0['name']; ?> &nbsp; &nbsp; <?php echo $row0['surname']; ?></td>
      
    <td style="text-align: center; width:150px;">Telefony: <?php echo $row0['phone']; ?></td>    
    <td style="text-align: center; width:150px;">Sargyt nomeri: <?php echo $row0['order_number']; ?></td>    
    <td style="text-align: center; width:150px;">Sargyt senesi: <?php echo $row0['order_date']; ?></td>   
    <td style="text-align:center; padding: 8px; width:150px;"><a href="#" id="<?php echo $row0['customer_id']; ?>" class="sargyt_gor">Sargydy gör</a></td>

    <td class="poz" style="text-align: center; padding: 8px; width:60px;">
    <a href="#" id="" class="" onclick="delete_order(<?= $row0['order_number']; ?>)"><i class="fas fa-trash"  style="font-size:18px; color: #dd6f00;"></i>
    </a></td>

    </tr>      
<?php
    }
}
?>
</tbody>
</table>

<div class="admin_order_show">
</div>

<script>
$(".sargyt_gor").click(function(e) {
    e.preventDefault();
    const customerId = $(this).attr('id');     

    $.ajax({
        url: 'pages/her_musderi_sargydy.php', // PHP dosyasının yolu
        type: 'POST',
        data: { customer_id: customerId }, // customer_id'yi gönder
        success: function(response) {           
          
            $(".admin_order_show").append()
              $(".admin_order_show").html(response)
        },
        error: function(error) {
            console.error("Hata:", error);
        }
    });
});

</script>

<script>
$(document).ready(function() {

    $(".admin_order_show").hide()
    $('.sargyt_gor').click(function(e) {
        e.preventDefault();

        let clickedRow = $(this).closest('.customer-row');      
      
        if (clickedRow.hasClass('active-row')) {
            $('.customer-row').show();
            clickedRow.removeClass('active-row');          
            $(".admin_order_show").hide()
            $(".sargyt_gor").text("sargydy gör");
            $(".customer-row").css("background-color", ""); 
            clickedRow.css("background-color", "#ceeabd");           
            $(".poz").show();
           
        } else {          
            $('.customer-row').hide();
            clickedRow.addClass('active-row').show();           
            $(".sargyt_gor").text("❌");
            $(".poz").hide();
            $(".admin_order_show").show();           
        }
    });
});
</script>

<script>    
    function delete_order(itemId) {
      
        alert(itemId)
        $.ajax({
            url: 'pages/delete_hide_orders.php',
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









