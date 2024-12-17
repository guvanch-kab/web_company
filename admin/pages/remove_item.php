<?php  
include_once '../db/dbase.php';

if(isset($_POST["categ_no"]) && $_POST["sira_no"] == 1) {
    $poz = $_POST["categ_no"];
    $sql = "DELETE FROM Categories WHERE CATEGORY_ID = ?";  // Delete from category ID=1 or 2 or3 ... for example all Metalprokat
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $poz);

    if ($stmt->execute()) {
        echo "Success";  // Başarılı olduğu mesajı
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
  /////////////////////////////////////////////////////////////////////////////////
} else if (isset($_POST["categ_no"]) && $_POST["sira_no"] == 2) {   
    $poz = $_POST["categ_no"];

    $sql = "DELETE FROM Products WHERE custom_product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $poz);

    if ($stmt->execute()) {
        echo "Success";  // Başarılı olduğu mesajı
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
//////////////////////////////////////////////////////////////////////////////////////
 else if (isset($_POST["categ_no"]) && $_POST["sira_no"] == 3) {   
    $poz = $_POST["categ_no"];

    $sql = "SELECT image_path, image FROM Products WHERE custom_product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $poz);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $image_path = $row['image_path']; // Örneğin: 'images/gurlusyk/'
        $image = $row['image']; // Örneğin: '110000384084813.jpg'
        
        // Dosya yolunu oluştur
        $file_path = __DIR__ . '/' . $image_path . $image;

        // Dosya mevcutsa sil
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
 $stmt->close();
 // Şimdi veritabanından kaydı sil
 $sql = "DELETE FROM Products WHERE custom_product_id = ?";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("s", $poz);

 if ($stmt->execute()) {
     echo "Success";  // Başarılı olduğu mesajı
 } else {
     echo "Error: " . $stmt->error;
 }
 $stmt->close();
}




 else if (isset($_POST["sil_del"])) {   
    $prod_code = $_POST["sil_del"];
    $sql = "DELETE FROM Categories WHERE PRODUCT_CODE = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $prod_code);

    if ($stmt->execute()) {
        echo "Success";  // Başarılı olduğu mesajı
    } else {
        echo "Error: " . $stmt->error;
    }
 }

    $conn->close();

    



?>
