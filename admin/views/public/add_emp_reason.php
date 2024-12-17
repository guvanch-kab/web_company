
	<?php
 include_once '../config/dbase_accessdata.php';

// 	if (isset($_POST['at']) && !isset(($_POST['select_reason']))) {

// 		// echo '<pre>';
// 		// print_r($_POST);
// 		// echo '</pre>';

// 		$idno= $_POST['idno'];
// 		$ady = $_POST['at'];
// 		$dept=$_POST['dept'];
// 		$idsene=$_POST['idsene'];		
// 		$gidissagat=$_POST['gidissagat'];
// 		$gelissagat=$_POST['gelissagat'];
// 		$sebap=$_POST['sebap'];
// 		$basgasebap=$_POST['basgasebap'];

// $sql ="INSERT INTO Daily_leave (PersonID, PersonName, Department, Date_leave, Time_leave, Time_arrive, Reason, Others, Izin) VALUES ('$idno','$ady','$dept','$idsene','$gidissagat','$gelissagat','$sebap','$basgasebap', 'Rugsat')";
// mysqli_query($connect, $sql);

// echo '<div class="alert alert-primary"> Ýazga alyndy
// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
//             <span aria-hidden="true">×</span>
//         </button>    
// 			</div> ';

// 	}
if (isset($_POST['select_reason']) && (isset($_POST['at']))) {

	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';

	$idno= $_POST['idno'];
	$ady = $_POST['at'];
	$dept=$_POST['dept'];
	$gidissagat=$_POST['gidissagat'];
	$gelissagat=$_POST['gelissagat'];
	$idsene=$_POST['idsene'];
	$gelissene=$_POST['gelissene'];
	$sebap=$_POST['sebap'];
	$basgasebap=$_POST['basgasebap'];
	$select_reason=$_POST['select_reason'];

	if($select_reason==1){

$sql ="INSERT INTO Daily_leave (PersonID, PersonName, Department, Date_leave, Time_leave, Time_arrive, Reason, Others) VALUES ('$idno','$ady','$dept','$idsene','$gidissagat','$gelissagat','$sebap','$basgasebap')";
mysqli_query($connect, $sql);

echo '<div class="alert alert-primary"> Ýazga alyndy
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>    
			</div> ';

	}
else {

if($select_reason==2){
	$rugsat='Günlük rugsat';
}
elseif($select_reason==3){
	$rugsat='Zähmet rugsady';
}
elseif($select_reason==4){
	$rugsat='Iş sapary rugsady';
}

	$sql ="INSERT INTO Reason_type (PersonID, PersonName, Department, Exit_date, Entry_date, Reason, Others, Result_time, Reason_type) VALUES ('$idno','$ady','$dept','$idsene','$gelissene','$sebap','$basgasebap', '$select_reason', '$rugsat')";
	mysqli_query($connect, $sql);

			echo '<div class="alert alert-primary"> Ýazga alyndy
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>    
			</div> ';
		}
	}
	//header('Location:iber.php');

	?>


