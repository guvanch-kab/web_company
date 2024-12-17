
<?php
  require '../config/dbase/dbase.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $subject =trim( $_POST['subject']);
    $message =trim( $_POST['message']);
    $order_Date=date('Y-m-d H:i:s');

    // echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';


$sql = "INSERT INTO client_messages (client_name, email, phone, subject, content) VALUES ('$name', '$email', '$phone', '$subject', '$message')";
if ($connect->query($sql) === TRUE) {
    echo " Hatynyz ustunlikli ugradyldy.";
} else {
    echo "Hat iber hatasy: " . $connect->error;
}
$connect->close();

}

    ?>