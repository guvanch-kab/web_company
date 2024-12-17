<?php


require '../config/dbase/dbase.php';

// try {
//     // Veritabanı bağlantısı için doğru bilgileri girin
//     $pdo = new PDO('mysql:host=localhost;dbname=kendirweb;charset=utf8', 'root', 'kabul');
//     // Hata modunu ayarla
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die('connection failed: ' . $e->getMessage());
// }



if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $category_id = intval($_POST['category_prod_id']);

    // echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';


    if ($category_id > 0) {
        // Kategoriye göre ürünleri çek
        $query = $pdo->prepare("SELECT PRODUCT_CODE FROM Categories WHERE CATEGORY_ID = :category_id");
        $query->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        // Sonuçları <option> olarak döndür
        if ($results) {
            foreach ($results as $row) {
                echo '<option data-name="' . htmlspecialchars($row['PRODUCT_CODE']) . '">' . htmlspecialchars($row['PRODUCT_CODE']) . '</option>';
            }
        } else {
            echo '<option disabled>Bu kategoriye ait veri yok</option>';
        }
    }
}
?>
