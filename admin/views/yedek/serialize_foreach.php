<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--<meta http-equiv="refresh" content="0.01; url=iber.php">-->
	<title>Untitled Document</title>
</head>

<body>
	<?php

	$n = 20;
	$onumady = 0;
	function getName($n)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';

		for ($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$index];
		}
		return $randomString;
	}
	$kod = getName($n);
	include 'vt.php';
	// Do Something 
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	echo $_POST["ady"];


	$jemi = 0;
	if (isset($_POST['prodname'])) {
		$ady = $_POST['prodname'];
		$say = "SELECT * FROM onum WHERE onumady ='$ady' ";
		//$result = mysqli_query($conn, $say);
		$result = $conn->query($say);

		if ($result->num_rows == 0) { // check if product is exist


			foreach ($_POST['prodname'] as $key => $value) {


				$ady = $_POST['prodname'][$key];
				$baha = $_POST['prod_price'][$key];
				$sany = $_POST['pro_qt'][$key];

				$jemi = number_format($baha) * number_format($sany);

				/*
		 $ady=$_POST['ady'];
		$baha=$_POST['bahasy'];
		$sany=$_POST['sany'];
		$jemi=$baha*$sany;

		*/
				$sql = " INSERT INTO onum(onumady, baha, sany, jemi, kody) VALUES ('$ady','$baha','$sany','$jemi','$kod')";

				mysqli_query($conn, $sql);
			}
		} else if ($result->num_rows > 0) {
			echo '<div class="alert alert-danger " id="netij">kayit bar..</div>';
		}
	}
	//header('Location:iber.php');

	?>


</body>

</html>