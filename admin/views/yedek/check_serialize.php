<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
	<?php
	include 'vt.php';

	if (isset($_POST['name'])) {

		/*
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		//echo $_POST["name"];
*/

		foreach ($_POST['name'] as $key => $value) {
			//if(in_array($_POST['prodname'][$key], $dizi)) {
			$ady = $_POST['name'][0];
			$pass = $_POST['pass'][0];
			$status = $_POST['status'][0];
			$sql = " INSERT INTO category (name, password, status) VALUES ('$ady','$pass','$status')";

			mysqli_query($conn, $sql);
			//echo '<script>window.location.reload();</script>';
			echo '<div class="alert alert-primary"> success record</div> ';
		}
		//}
	}
	//header('Location:iber.php');

	?>


</body>

</html>