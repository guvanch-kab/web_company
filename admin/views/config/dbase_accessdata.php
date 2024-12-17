<?php
$server = "localhost";
$username = "root";
$password = "kabul";
$dbname = "accessfactory";
//$conn=new mysqli($servername,$username,$password,$dbname);
$connect = mysqli_connect($server, $username, $password, $dbname);
if ($connect->connect_error) {
    die("connect failed" . $conn_connect_error);
}
