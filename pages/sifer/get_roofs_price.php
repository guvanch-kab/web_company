<?php
include '../../config/dbase/dbase.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['thickness']) && isset($_POST['color'])) {
    // Gelen verileri trim ile temizle
    $thickness = trim($_POST['thickness']);
    $color = trim($_POST['color']);
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    if ($thickness === null || $color === null) {
        echo "Eksik veri."; 
        exit; // Hata durumunda çıkış yap
    }
    $sql = "SELECT * FROM roofs WHERE ROUND(Thickness, 2) = ROUND('$thickness', 2) AND Color_code = '$color'";

    $result = mysqli_query($connect, $sql);

    // Sorgu sonuçlarını kontrol et
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<div>";
            
            // Fetch and display all rows
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<div style='text-align:center'><h6>1 pagonnometr bahasy: </h6><span style='font-weight:bold;'> " . htmlspecialchars($data['Price']) . "&nbsp; manat</span></div>";       
                echo "<hr>";
            }
            
            echo "</div>";
        } else {
            echo "<h5>Bu reňkiň ölçeginde haryt ýok.</h5>"; 
        }
    } else {
        echo "Sorgu hatası: " . mysqli_error($connect); 
    }
    mysqli_close($connect);
} else {
    echo "Geçersiz istek."; 
}
?>
