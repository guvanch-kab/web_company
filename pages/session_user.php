<?php
session_start();

if (isset($_SESSION['username'])) {

echo json_encode([
    'name' => $_SESSION['username'],
    'surname' => $_SESSION['surname'],
    'phone' => $_SESSION['phone'],
    'email' => $_SESSION['email'],
    'client_id' => $_SESSION['client_id'],
  
    'pass_word' => $_SESSION['pass_word']
]);


} else {
    echo ''; // Eğer kullanıcı yoksa boş döner
}
?>
