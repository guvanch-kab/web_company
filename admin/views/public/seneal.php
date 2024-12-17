<?php

if (isset($_POST['selected_date'])) {
    $today = $_POST['selected_date'];

	echo'<pre>';
	print_r($_POST);
	echo'</pre>';
    
    echo'<div class="alert alert-success" role="alert">'.$today.'</div>';
} else {
    $today = date('Y-m-d'); // Varsayılan olarak bugünün tarihini kullan
    echo $today.'sene - yilaaaaaaaaaa';
}