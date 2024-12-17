<?php
$server = "localhost";
$username = "root";
$password = "kabul";
$dbname = "kendirweb";

$connect = mysqli_connect($server, $username, $password, $dbname);
if ($connect->connect_error) {
    die("connect failed" . $conn_connect_error);
}
