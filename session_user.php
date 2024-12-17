<?php
session_start();

if (isset($_SESSION['username'])) {

echo json_encode([
    'name' => $_SESSION['username'],
    'surname' => $_SESSION['surname'],
    'phone' => $_SESSION['phone'],
    'email' => $_SESSION['email'],
    'pass_word' => $_SESSION['pass_word']
]);


} else {
    // Session yoksa boş bir JSON döndür
    echo json_encode(['error' => 'No session data found']);
}
?>
