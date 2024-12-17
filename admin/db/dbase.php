<?php
$server = "localhost";
$username = "root";
$password = "kabul";
$dbname = "kendirweb";
//$conn=new mysqli($servername,$username,$password,$dbname);
$conn = mysqli_connect($server, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connect failed" . $conn_connect_error);
}
