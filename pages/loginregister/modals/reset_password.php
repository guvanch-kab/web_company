<?php
error_reporting(E_ERROR | E_PARSE); // Sadece önemli hataları göster
ini_set('display_errors', 0); // Hata mesajlarını gizle

header('Content-Type: application/json'); // Yanıtı JSON olarak ayarla
// ob_start(); // İstem dışı çıktıları önlemek için tamponu başlatın

require '../../../config/dbase/dbase.php';
require '../../../vendor/phpmailer/src/PHPMailer.php';
require '../../../vendor/phpmailer/src/SMTP.php';
require '../../../vendor/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email_unut'];

    // Rastgele bir kod oluşturma fonksiyonu
    function generateRandomString($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $randomCode = generateRandomString();

    // Veritabanında e-posta adresinin olup olmadığını kontrol eden sorgu
    $checkStmt = $connect->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    if (!$checkStmt) {
        echo json_encode(["status" => "error", "message" => "Veritabanı hatası: " . $connect->error]);
        exit;
    }
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) {
        // E-posta adresi bulunduysa, şifreyi güncelle
        $sqlupd2 = "UPDATE users SET password='$randomCode' WHERE email='$email'";
        mysqli_query($connect, $sqlupd2);

        // E-posta gönderme işlemi
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tkmsmile999@gmail.com';
            $mail->Password = 'vwit vjhm ilxg xlnh';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('tkmsmile999@gmail.com', 'KENDIR');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Parol tazelemek kody";
            $mail->Body = "parolyňyzy täzelemek we dikeltmek üçin kod: <strong>$randomCode</strong>";

            $mail->send();
            echo json_encode(["status" => "success", "message" => "Parolunuzu tazelemek için talep gönderildi."]);
        } catch (Exception $e) {
            echo json_encode(["status" => "error", "message" => "E-posta gönderilemedi. Hata: {$mail->ErrorInfo}"]);
        }
    } else {
        // E-posta adresi veritabanında yoksa hata mesajı döndür
        echo json_encode(["status" => "error", "message" => "E-posta adresi bulunamadı."]);
    }
}

// ob_end_clean(); // İstem dışı çıktıları temizleyin
exit;
?>
