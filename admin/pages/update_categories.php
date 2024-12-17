<?php
include_once '../db/dbase.php';

$query = "
    SELECT * 
    FROM Categories c1
    INNER JOIN (
        SELECT CATEGORY_ID, MIN(ID) AS min_id
        FROM Categories
        GROUP BY CATEGORY_ID
    ) c2 ON c1.CATEGORY_ID = c2.CATEGORY_ID AND c1.ID = c2.min_id
";

$result = mysqli_query($conn, $query);

if ($result && $result->num_rows > 0) {
?>
    <table class="table table-bordered">
        <thead style="background-color:#008a8a;">
            <tr>
                <th>Category_ID</th>
                <th>Category_Name</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
<?php
    $k = 0;
    while ($row = $result->fetch_assoc()) {
?>
        <tr>           
            <td><input autocomplete="off" type="text" id="CATEGORY_ID" name="categ_id[]" class="form-control categ" value="<?= htmlspecialchars($row['CATEGORY_ID'] ?? '') ?>"></td>
            <td><input autocomplete="off" type="text" id="CATEGORY_NAME" name="categ_name[]" class="form-control categ aciklama_font" value="<?= htmlspecialchars($row['CATEGORY_NAME'] ?? '') ?>"></td>                       
            <td style="display: none;"><input type="hidden" id="codecateg<?=$k;?>" name="codecateg[]" class="codeitems" value="<?= htmlspecialchars($row['CATEGORY_ID']) ?>"></td>
            <td>
                <a id="<?=$row['CATEGORY_ID'];?>.1" class="btn btn-outline-danger btn-sm sil" data-bs-toggle="tooltip" 
                data-bs-placement="top" data-bs-custom-class="custom-tooltip-danger" data-bs-title="Delete">
                    <i class="fas fa-trash trash-icon"></i>
                </a>
            </td>
        </tr>
<?php
        $k++;
    }
    echo '</tbody></table>';
} else {
    echo '<tr><td colspan="3">Bu kategoriye ait veri yok</td></tr>';
}
$conn->close();
?>

<script>
$(function () { 
    $(".categ").change(function() {
        let update_number = $(this).val();                                 
        let codeid2 = $(this).closest('tr').find('.codeitems').val();
        let idno2 = $(this).attr('id');

        $.ajax({
            url: 'pages/desc_upd.php',
            method: 'post',
            data: {
                update_number: update_number,
                codeid2: codeid2,
                idno2: idno2                                           
            },
            success: function(response) {
                $("#result_change2").html(response);
                $("#update_categories").load('pages/update_categories.php');
            }
        });
    });
});
</script>

<div id="result_change2"></div>
