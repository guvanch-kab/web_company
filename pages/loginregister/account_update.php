<?php

session_start();

if (isset($_POST['name'])) {

    require '../../config/dbase/dbase.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cl_id = $_POST['cl_id'];



    // echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';


    try {

        // Duplicate kontrolü
        $checkStmt = $connect->prepare("SELECT COUNT(*) FROM users WHERE (phone_number = ? OR email = ?) AND client_id != ?");
        if (!$checkStmt) {
            throw new Exception("Hazırlama hatası: " . $connect->error);
        }
        $checkStmt->bind_param("sss", $phone, $email, $cl_id);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        $checkStmt->close();

        if ($count > 0) {
            // Duplicate kayıt bulundu
            echo json_encode(['status' => 'error', 'message' => 'Bu telefon numarası veya email zaten kullanılıyor']);
            exit;
        }

        // Kullanıcı bilgilerini güncelle
        $sql = "UPDATE users SET username=?, surname=?, phone_number=?, email=?, password=? WHERE client_id=?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ssssss", $name, $surname, $phone, $email, $password, $cl_id);

        if ($stmt->execute()) {
            // Güncelleme başarılı olursa oturum verilerini de güncelle
            $_SESSION['username'] = $name;
            $_SESSION['surname'] = $surname;
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] = $email;
            $_SESSION['client_id'] = $cl_id;
            $_SESSION['pass_word'] = $password;

            echo json_encode(['status' => 'success', 'message' => 'Güncelleme başarılı']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Güncelleme sırasında hata oluştu: ' . $stmt->error]);
        }

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Bir hata oluştu: ' . $e->getMessage()]);
    }

    $stmt->close();
    $connect->close();
}
?>
