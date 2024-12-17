<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../../../config/dbase/dbase.php';
session_start(); // Oturumu başlat

if (isset($_POST['phone_email']) && isset($_POST['sifre'])) {
    $phone_email = $_POST['phone_email'];
    $password1 = $_POST['sifre'];

    // Kullanıcıyı veritabanında arama
    $stmt = $connect->prepare("SELECT * FROM users WHERE (email = ? OR phone_number = ?) AND password = ?");
    $stmt->bind_param("sss", $phone_email, $phone_email, $password1);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {        
        $user = $result->fetch_assoc();
        $username = $user['username'];
        $surname = $user['surname'];
        $phone_number = $user['phone_number'];
        $email = $user['email'];
        $dbpassword = $user['password'];  
        $cl_id = $user['client_id']; 
        $w_admin = $user['web_admin']; 

        // Oturum bilgilerini kaydet
        $_SESSION['username'] = $username;
        $_SESSION['surname'] = $surname;
        $_SESSION['phone'] = $phone_number;
        $_SESSION['email'] = $email;
        $_SESSION['pass_word'] = $dbpassword;
        $_SESSION['client_id'] = $cl_id;
        $_SESSION['web_admin'] = $w_admin;

        // Admin mi? Kontrol et
        if ($w_admin=='super_admin') {
            // Admin yönlendirmesi
            echo 'super_admin';
        } else {
            // Kullanıcı yönlendirmesi
            echo 'success';
        }
    } else {
        echo 'error_user';
    }
}
?>
