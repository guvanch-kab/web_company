<?php
// Hataları göster
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../config/dbase/dbase.php';

$query = "SELECT * FROM Categories WHERE CATEGORY_NAME='Metalprokat'";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Sorgu hatası: " . mysqli_error($connect));
}

$metall = 'metalls';
// HTML olarak döndürelim
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li><a href='". $metall."' id='" . $row['PRODUCT_FULL_NAME']. "' class='pages_metal  big_menu_a'>" . $row['PRODUCT_FULL_NAME'] . "</a></li>";
    }
} else {
    echo "<li><a href='#' class='pages_metal'>Menü TAPYLMADY</a></li>";
}
?>



<?php
/*
    include '../config/dbase/dbase.php';

$query = "SELECT * FROM Categories WHERE CATEGORY_NAME='Metalprokat'";
$result = mysqli_query($connect, $query);
$metall='metalls';
// HTML olarak döndürelim
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li><a href='". $metall."' id='" . $row['PRODUCT_FULL_NAME']. "' class='pages'>" . $row['PRODUCT_FULL_NAME'] . "</a></li>";
    }
} else {
   // echo "<li><a href='#' class='pages'>Menü TAPYLMADY</a></li>";
}

*/
?>
