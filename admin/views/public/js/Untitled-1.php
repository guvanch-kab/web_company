<?php
$today = date('Y-m-d');
$k = 0;
$t = 0;
$data = null;
$net = null;
include_once '../config/dbase.php';
include_once '../config/dbase_accessdata.php';

function execute_query($connect, $query, $label) {
    $result = mysqli_query($connect, $query);
    if (!$result) {
        die('Query failed (' . $label . '): ' . mysqli_error($connect));
    }
    return $result;
}

if (isset($_POST['selected_date'])) {
    $today_day = mysqli_real_escape_string($connect, $_POST['selected_date']);
    $check_query = "SELECT * FROM controlgate1 WHERE DateEntry='$today_day' AND DeviceIPAddress = '10.1.10.211'";
    $check = execute_query($connect, $check_query, 'selected_date');
}

if (isset($_POST['basy'])) {
    $basy = mysqli_real_escape_string($connect, $_POST['basy']);
    $sonu = mysqli_real_escape_string($connect, $_POST['sonu']);
    $between_data = "SELECT * FROM controlgate1 WHERE DateEntry BETWEEN '$basy' AND '$sonu' AND DeviceIPAddress = '10.1.10.211'";
    $data = execute_query($connect, $between_data, 'basy/sonu');
}

$check_query = "SELECT * FROM controlgate1 WHERE DateEntry='$today' AND DeviceIPAddress = '10.1.10.211'";
$check = execute_query($connect, $check_query, 'final check');

$query = "SELECT * FROM AttendanceRecordInfo WHERE PersonName IS NOT NULL AND DeviceIPAddress = '10.1.10.211'";
$netije = execute_query($conn, $query, 'AttendanceRecordInfo');

if (mysqli_num_rows($netije) > 0) {
    $net = $netije;
}
if (mysqli_num_rows($check) > 0) {
    $net = $check;
}

if ($data !== null && mysqli_num_rows($data) > 0) {
    $net = $data;
    $t = 1;
}

if ($net && mysqli_num_rows($net) > 0 ) {
    $k = 1;
    $person_id = array();
    $person_name = array();
    $date_time = array();
    $device_name = array();
    $date_entry = array();
    $device_ip = array();
    while ($row = $net->fetch_assoc()) {
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
        $deviceip = $row['DeviceIPAddress'];

        // Duplicate kontrolü
        if ($deviceip == '10.1.10.211') {
            $check_query = "SELECT * FROM controlgate1 WHERE PersonID='$personid' AND AttendanceDateTime='$change_date' AND DateEntry='$dateentry'";
            $check_result = execute_query($connect, $check_query, 'duplicate check');

            if (mysqli_num_rows($check_result) > 0) {
                // Duplicate varsa güncelle
                $sqlupd = "UPDATE controlgate1 SET DateEntry='$dateentry', TimeEntry='$timeentry', PersonName='$personname' WHERE PersonID='$personid' AND AttendanceDateTime='$change_date'";
                execute_query($connect, $sqlupd, 'update');
            } else {
                // Duplicate yoksa ekle
                $sqlins = "INSERT INTO controlgate1 (PersonID, PersonName, AttendanceDateTime, TimeEntry, DateEntry, DeviceIPAddress) VALUES ('$personid', '$personname', '$change_date', '$timeentry', '$dateentry', '$deviceip')";
                execute_query($connect, $sqlins, 'insert');
            }
        }

        if ($deviceip == '10.1.10.212') {
            $check_query = "SELECT * FROM controlgate1_exit WHERE PersonID='$personid' AND AttendanceDateTime='$change_date'";
            $check_result = execute_query($connect, $check_query, 'duplicate check');

            if (mysqli_num_rows($check_result) == 0) {
                // Duplicate yoksa ekle
                $sqlins = "INSERT INTO controlgate1_exit (PersonID, PersonName, AttendanceDateTime, Time_exit, Date_exit, DeviceIPAddress) VALUES ('$personid', '$personname', '$change_date', '$timeentry', '$dateentry', '$deviceip')";
                execute_query($connect, $sqlins, 'insert');
            }
        }
    }
}

if ((mysqli_num_rows($check) === 0) || ($data !== null && mysqli_num_rows($data) === 0)) {
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-warning">Üns beriň!</span>  Gözlenýän sene gün tapylmady.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>    
    </div>';
}
$conn->close();
?>
    
<div class="col-md-12" id="netije">       
    <div class="row" style="padding:7px 16px; background-color: #fff;">  
        <div class="col-md-6"></div>
        <div class="col-md-3 col-sm-3 senetakvimi">
            <input id="basy" type="date" class="form-control" style="margin-right: 6px;">
        </div>
        <div class="col-md-3 col-sm-3 senetakvimi">
            <input id="sonu" type="date" class="form-control">
        </div>
    </div>
    <div class="row" style="padding:20px 18px;">
        <div class="col-md-6"></div>
        <div class="col-md-4 senetakvimi">
            <input id="gozle" type="search" class="form-control" placeholder="Gozle">
        </div>
        <div class="col-md-2 senetakvimi">
            <input type="date" id="datepicker" class="form-control">
        </div>
    </div><!--end row-->
    <script src="../public/send_date.js"></script>
    <script src="../public/gozle.js"></script>
    <!----------------------------- add value to php ------------------------------->
    <div class="row">
        <div class="col-12">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Işgär_ID</th>
                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Ady we Familiýasy</th>
                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Gapy - Giriş</th>
                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">IP nokady</th>
                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 130px;">Senesi</th>
                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Sagady</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($person_name)) : ?>
                        <?php for ($i = 0; $i < count($person_name); $i++) : $k++; ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?= htmlspecialchars($person_id[$i]) ?></td>
                                <td><?= htmlspecialchars($person_name[$i]) ?></td>
                                <td><?= htmlspecialchars("Gapy-Giriş") ?></td>
                                <td><?= htmlspecialchars($device_ip[$i]) ?></td>
                                <td><?= htmlspecialchars($date_entry[$i]) ?></td>
                                <td><?= htmlspecialchars($date_time[$i]) ?></td>
                            </tr>
                        <?php endfor; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <b>Jemi <?=$k;?> sany ýazgy tapyldy</b>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="bootstrap-data-table-export_info" role="status" aria-live="polite"></div>
        </div>
        <div class="col-sm-12 col-md-7"></div>
    </div>
</div>
</div>
</div>
</div>
</div>
