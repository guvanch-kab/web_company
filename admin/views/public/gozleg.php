<?php
include_once '../config/dbase_accessdata.php';
$today = date('Y-m-d');
$gapy = null;
$query = "";

// Giriş ve çıkış sorguları için WHERE koşullarını ayrı ayrı oluşturun
$entryCondition = "";
$exitCondition = "";

// Giriş için koşullar
if (isset($_POST["gozletap"]) && empty($_POST["gozletap"])) {
    $entryCondition = "DateEntry='$today'";
    $gapy = 'Giriş';
} else if (isset($_POST["gozletap"]) && !empty($_POST["gozletap"])) {
    $veri = $_POST["gozletap"];
    $entryCondition = "(PersonName LIKE '$veri%' OR PersonID LIKE '$veri%')";
    $gapy = 'Giriş';
}

// Çıkış için koşullar
if (isset($_POST["gateexit"]) && empty($_POST["gateexit"])) {
    $exitCondition = "Date_exit='$today'";
    $gapy = 'Çykyş';
} else if (isset($_POST["gateexit"]) && !empty($_POST["gateexit"])) {
    $veri = $_POST["gateexit"];
    $exitCondition = "(PersonName LIKE '$veri%' OR PersonID LIKE '$veri%')";
    $gapy = 'Çykyş';
}

// Sorguları birleştirin ve çalıştırın
if ($entryCondition != "") {
    $query = "SELECT * FROM controlgate1 WHERE $entryCondition";
} else if ($exitCondition != "") {
    $query = "SELECT * FROM controlgate1_exit WHERE $exitCondition";
}

if ($query != "") {
    $result = mysqli_query($connect, $query);
		
			if ($result->num_rows>0)
				{

					$k = 1;
					$person_id = array();
					$person_name = array();
					$date_time = array();
					$device_name = array();
					$date_entry = array();
					$date_time = array();
					$device_ip=array();
					while ($row = $result->fetch_assoc()) {
						$person_id[] = $row['PersonID'];
						$person_name[] = $row['PersonName'];
						$device_ip[] = $row['DeviceIPAddress'];
						$timestamp = $row['AttendanceDateTime'] / 1000;
						$date = new DateTime("@$timestamp");
						$date->setTimezone(new DateTimeZone('Asia/Ashgabat'));
				
						$date_entry[] = $date->format('Y-m-d');
						$date_time[] = $date->format('H:i:s');
						$device_name[] = $row['DeviceName'];
				
						$dateentry = $date->format('Y-m-d');
						$timeentry = $date->format('H:i:s');
						$personname = $row['PersonName'];
						$change_date = $row['AttendanceDateTime'];
						$attendatetime = $row['AttendanceDateTime'];
						$personid = $row['PersonID'];
						
					}
				}
		?>


					<table id="bootstrap-data-table-export search_person" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
					<thead>
						<tr role="row">
							<th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Işgär_ID</th>
							<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Ady we Familiýasy</th>
							<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;"> Gapy - <?=$gapy;?></th>
							<!-- <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">IP nokady</th> -->
							<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 130px;">Senesi</th>
							<th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Sagady</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($person_name)) : ?>


							<?php for ($i = 0; $i < count($person_name); $i++) : ?>

								<tr role="row" class="odd">
									<td class="sorting_1"><?= htmlspecialchars($person_id[$i]) ?></td>
									<td><?= ($person_name[$i]) ?></td>
									<td><?="Gapy-".$gapy;?></td>
									<!-- <td><?= ($device_ip[$i]) ?></td> -->
									<td><?= ($date_entry[$i]) ?></td>
									<td><?= ($date_time[$i]) ?></td>
								</tr>
							<?php endfor; ?>
						<?php endif; ?>

					</tbody>
					<b>Jemi <?=$i;?> sany ýazgy tapyldy</b> 
				</table>
				
				<?php
							}
							

?>


      
	  


