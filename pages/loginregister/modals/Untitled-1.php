require '../../../config/dbase/dbase.php';

require '../../../vendor/phpmailer/src/PHPMailer.php';
require '../../../vendor/phpmailer/src/SMTP.php.php';
require '../../../vendor/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

////////////////////////////////////////////////


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['forgot_email'];



    $checkStmt = $connect->prepare("SELECT COUNT(*) FROM users WHERE email = ? ");
    if (!$checkStmt) {
        throw new Exception("Hazırlama hatası: " . $connect->error);
    }
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) {

        $resetToken = bin2hex(random_bytes(50)); // Güvenli bir token oluştur
        $resetLink = "http://kendirweb/reset-password.php?token=$resetToken";


        // E-posta gönderme işlemi
        $subject = "Şifre Sifirlama Talebi";
        $message = "Şifrenizi sifirlamak için lütfen aşağidaki bağlantiya tiklayin: $resetLink";
        mail($email, $subject, $message);

        // Başari durumu
        echo json_encode(["status" => "success", "message" => "Şifre sifirlama bağlantisi gönderildi."]);
    } else {
        // E-posta adresi veritabaninda yok
        echo json_encode(["status" => "error", "message" => "E-pocta adresi tapylmady."]);
    }
}
