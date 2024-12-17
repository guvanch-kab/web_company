<?php
include '../config/dbase/dbase.php';

$query2 = "SELECT * FROM PARENT_PRODUCT_CODE where PARENT_ID=1 "; // =1 YERINE BASGA SANLAR GELIP BILER, SON UYTGETMELI
$result2 = mysqli_query($connect, $query2);

// Sonuçları kontrol ediyoruz
if ($result2->num_rows > 0) {
    // Veritabanından çekilen her satırı ilgili dizilere ekliyoruz
    while ($row = $result2->fetch_assoc()) {
        $parent_id[] = $row['PARENT_ID'];
        $prod_name[] = $row['PRODUCT_NAME'];
        $prod_code_name[] = $row['PRODUCT_CODE_NAME'];
        $categ_name[] = $row['CATEGORY_NAME'];

    }
}
?>



<a href="#" class="after_content">Metalloprokat</a>
                    <ul class="dropdown-menu">
                    
                    <?php if (!empty($parent_id)) : ?>
                    <?php for ($i = 0; $i <count($parent_id); $i++) : ?>

                        <li><a href="metalls" id="<?= htmlspecialchars($prod_code_name[$i]) ?>" class="pages"> <?= htmlspecialchars($prod_name[$i]) ?></a></li>
  
                        <?php endfor; ?>
                            <?php endif; ?>        
                    </ul>