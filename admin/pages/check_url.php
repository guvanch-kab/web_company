<?php
session_start();
header('Content-Type: application/json'); // JSON formatında veri döndürüleceğini belirtir

// Oturum kontrolü
if (!isset($_SESSION['web_admin'])) {
    http_response_code(403); // Yetkisiz giriş için HTTP kodu
    echo json_encode([
        'status' => 'error',
        'message' => 'Session bulunamadı veya giriş yapılmadı.'
    ]);
    exit;
}

// Eğer kullanıcı super_admin ise
if ($_SESSION['web_admin'] === 'super_admin') {
    echo json_encode([
        'status' => 'success',
        'message' => 'Admin Panel',
        'redirect_url' => 'index.html' // Yönlendirme için kullanılacak URL
    ]);
    exit;
} else {
    // Super admin değilse
    http_response_code(403); // Yetkisiz giriş için HTTP kodu
    echo json_encode([
        'status' => 'error',
        'message' => 'Bu sayfaya erişim yetkiniz yok.'
    ]);
    exit;
}




/*
$urlPath = $_SERVER['REQUEST_URI'];

// 404 hata sayfası durumu
if (!str_starts_with($urlPath, '/index/') || $urlPath === '/index/') {
    http_response_code(404);
    echo '
    <div class="error_page">
        <h1>404</h1>
        <h2>WEB SAHYPASY TAPYLMADY</h2>
        <p>Gözlenýän sahypa tapylmady</p>
        <a href="/index.html">Esasy sahypa gidin !</a>
    </div>';
    exit;
}

// Eğer geçerli içerik varsa
echo '<p>Bu bir geçerli sayfa içeriğidir.</p>';
*/
?>
