<?php
$today = date('Y-m-d');
require '../../../config/dbase/dbase.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['firstname'];
    $surname = $_POST['surname'];
    $phone_number = $_POST['phone_number'];
    $phone_number = substr($phone_number, 4); // İlk 4 karakteri atlayıp gerisini alır
    $email = $_POST['email'];
    $register_password = $_POST['register_password'];
    $customer_id=trim($_POST['cl_id']);

    try {
       
        $checkStmt = $connect->prepare("SELECT COUNT(*) FROM users WHERE phone_number = ? OR email = ?");
        if (!$checkStmt) {
            throw new Exception("Hazırlama hatası: " . $connect->error);
        }
        $checkStmt->bind_param("ss", $phone_number, $email);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        $checkStmt->close();

        if ($count > 0) {
            // Duplicate kayıt bulundu
            echo json_encode(['status' => 'error', 'message' => 'Bu telefon belgisi yada email ulanylýar']);
            exit; // Daha fazla işlem yapmadan scripti sonlandır
        }

        // Veritabanına yeni kayıt ekleme işlemi
        $stmt = $connect->prepare("INSERT INTO users (username, surname, phone_number, email, password, client_id, created_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Gidiş hatasy: " . $connect->error);
        }

        $stmt->bind_param("sssssss", $first_name, $surname, $phone_number, $email, $register_password, $customer_id, $today);

        header('Content-Type: application/json');
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Üstünlikli ýazga alyndy!']);
        } else {
            throw new Exception("Yalnyşlyk yuze cykdy: " . $stmt->error);
        }
    } catch (Exception $e) {
        // Hata mesajını JSON formatında döndür
        echo json_encode(['status' => 'error', 'message' => 'Bir ýalňyşlyk boldy: ' . $e->getMessage()]);
    }
}
?>
