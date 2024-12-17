<?php
// Bugünün tarihini al
$today = date('Y-m-d');
$k = 0;
$t = 0;
$data = null;
$net = null;

$date=date_create($today);
$sene=date_format($date,"d-m-Y"); 
// Veritabanı bağlantı dosyalarını dahil et
include_once '../config/dbase.php';
include_once '../config/dbase_accessdata.php';

// Sorgu çalıştırma fonksiyonu
function execute_query($connect, $query, $label) {
    $result = mysqli_query($connect, $query);
    if (!$result) {
        die('Query failed (' . $label . '): ' . mysqli_error($connect));
    }
    return $result;
}

// Tarih seçildiğinde yapılacak işlemler
if (isset($_POST['selected_date'])) {
    $today = $_POST['selected_date'];
    // Yalnızca bugünün tarihine göre veri çek
    $check_query = "SELECT * FROM controlgate1_exit WHERE Date_exit='$today' AND DeviceIPAddress = '10.3.9.212'";
    $check = execute_query($connect, $check_query, 'selected_date');
}

// Tarih aralığı seçildiğinde yapılacak işlemler
if (isset($_POST['basy'])) {
    $basy = mysqli_real_escape_string($connect, $_POST['basy']);
    $sonu = mysqli_real_escape_string($connect, $_POST['sonu']);
    // Tarih aralığına göre veri çek
    $between_data = "SELECT * FROM controlgate1_exit WHERE Date_exit BETWEEN '$basy' AND '$sonu' AND DeviceIPAddress = '10.3.9.212'";
    $data = execute_query($connect, $between_data, 'basy/sonu');
}

// Son kontroller
$check_query = "SELECT * FROM controlgate1_exit WHERE Date_exit='$today' AND DeviceIPAddress = '10.3.9.212'";
$check = execute_query($connect, $check_query, 'final check');

// Yalnızca bugünün tarihine göre AttendanceRecordInfo tablosundan veri çek
$query = "SELECT * FROM AttendanceRecordInfo WHERE PersonName IS NOT NULL AND DATE(FROM_UNIXTIME(AttendanceDateTime / 1000)) = '$today' AND DeviceIPAddress = '10.3.9.212'";
$netije = execute_query($conn, $query, 'AttendanceRecordInfo');

// Verilerin kontrolü
if (mysqli_num_rows($netije) > 0) {
    $net = $netije;
} elseif (mysqli_num_rows($check) > 0) {
    $net = $check;
    //$check = $netije;
} if ($data !== null && mysqli_num_rows($data) > 0) {
    $net = $data;
    $t = 1;
}

// Verileri işlerken
if ($net && mysqli_num_rows($net) > 0) {
    $k = 1;
    $person_id = array();
    $person_name = array();
    $date_time = array();
    $device_name = array();
    $date_exit = array(); // Ensure this is an array
    $time_exit = array(); // Ensure this is an array
    $device_ip = array();
    $location_add=array();
    $date_show=array();
    while ($row = $net->fetch_assoc()) {
        $t++;
        $person_id[] = $row['PersonID'];
        $person_name[] = $row['PersonName'];
        $device_ip[] = $row['DeviceIPAddress'];
        $location_add[]=$row['DeviceName'];

        $timestamp = $row['AttendanceDateTime'] / 1000;
        $date = new DateTime("@$timestamp");
        $date->setTimezone(new DateTimeZone('Asia/Ashgabat'));

        $formatted_date_exit = $date->format('Y-m-d');
        $formatted_time_exit = $date->format('H:i:s');

        $date=date_create($formatted_date_exit); 
        $date_show[]=date_format($date,"d-m-Y");

        $show_daily=date_format($date,"d-m-Y");

        $date_exit[] = $formatted_date_exit;
        $time_exit[] = $formatted_time_exit;
        $device_name[] = $row['DeviceName'];

        $personname = $row['PersonName'];
        $change_date = $row['AttendanceDateTime'];
        $attendatetime = $row['AttendanceDateTime'];
        $personid = $row['PersonID'];
        $deviceip = $row['DeviceIPAddress'];
        $locationadd=$row['DeviceName'];

        // IP kontrolü
        if ($deviceip == '10.1.10.212') {
            $check_query = "SELECT * FROM controlgate1_exit WHERE PersonID='$personid' AND AttendanceDateTime='$change_date'";
            $check_result = execute_query($connect, $check_query, 'duplicate check');
            if (mysqli_num_rows($check_result) > 0) {
                // Update if duplicate exists
                $sqlupd = "UPDATE controlgate1_exit SET Date_exit='$formatted_date_exit', Time_exit='$formatted_time_exit', PersonName='$personname',  DeviceName='Halta_zawod_çykyş' WHERE PersonID='$personid' AND AttendanceDateTime='$change_date' AND  DeviceIPAddress='10.3.9.212'";
                execute_query($connect, $sqlupd, 'update');
            } else {
                // Insert if no duplicate
                $sqlins = "INSERT INTO controlgate1_exit (PersonID, PersonName, AttendanceDateTime, Time_exit, Date_exit, DeviceIPAddress, DeviceName) VALUES ('$personid', '$personname', '$change_date', '$formatted_time_exit', '$formatted_date_exit', '$deviceip', '$locationadd')";

                execute_query($connect, $sqlins, 'insert');
            }
        }
    }
}

// Eğer kayıt bulunamazsa uyarı ver
// if ((mysqli_num_rows($check) === 0) || ($data !== null && mysqli_num_rows($data) === 0)) {
//     echo '
//     <div class="alert alert-warning alert-dismissible fade show" role="alert">
//         <span class="badge badge-pill badge-warning">Üns beriň!</span>  Gözlenýän sene gün tapylmady.
//         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//             <span aria-hidden="true">×</span>
//         </button>    
//     </div>';
// }

$conn->close();

?>
    <div class="col-md-12" id="netije">       

                <div class="row" style="padding:7px 16px; background-color: #fff;" >  

                    <div class="col-md-6">
                    </div>
                 
                        <div class="col-md-3 col-sm-3 senetakvimi">
                        <input id="basy" type="date" max="<?php echo date('Y-m-d'); ?>" class="form-control" style="margin-right: 6px;">
                        </div>
                        <div class="col-md-3 col-sm-3 senetakvimi">
                        <input id="sonu" type="date" class="form-control" max="<?php echo date('Y-m-d'); ?>">
                        </div>
                </div>
               
                    <div class="row" style="padding:20px 18px;">
                    
                        <div class="col-md-6"></div>
                        <div class="col-md-4  senetakvimi">
                            <input id="gate_exit" type="search" class="form-control" placeholder="Gozle">
                        </div>
                        <div class="col-md-2  senetakvimi">
                            <input type="date" id="datepicker" max="<?php echo date('Y-m-d'); ?>" class="form-control">
                        </div>

                <div class="col-md-10" style="font-weight: 600; color:#4a4a4a; margin-top:20px" id="isgar_sany">
                <b>Halta Zawod Çykyş </b> /
                <?  if(!empty($show_daily)){echo $show_daily;} else{ echo $today. ' senesi ucin yazgy tapylmady'; }?> / Günlük giren işgär sany: <span style="font-size: 16px;">

                <?=$t;?></span> 
                </div>
                <div class="col-md-2"  style="text-align: right; font-weight: 600; margin-top:20px;" >
                <a href="#" class="btn btn-primary" onclick="yazdir()"> Print et </a>     
             </div>       
       
                    </div><!--end row--> 


            <script src="../public/date_gate_exit.js"></script>
            <script src="../public/gozle.js"></script>
            <!----------------------------- add value to php ------------------------------->
            <div class="row "> 
                <div class="col-12 ">  

                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid">
                        <thead>               
                            <tr role="row"  class="ortala">                            
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Işgär_ID</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Ady we Familiýasy</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Gapy - Çykyş</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Çykyş nokady</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 130px;">Senesi</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Çykyş sagady</th>
                            </tr>
                          
                        </thead>
                        <tbody>
      
                            <?php if (!empty($person_name)) : ?>
                                <?php for ($i = 0; $i < count($person_name); $i++) : ?>

                                    <tr role="row" class="odd">
                                        <td class="sorting_1 ortala"><?= htmlspecialchars($person_id[$i]) ?></td>
                                        <td><?= ($person_name[$i]) ?></td>
                                        <td class="ortala"><?= htmlspecialchars("Gapy-2 - Exit") ?></td>
                                        <td class="ortala"><?= ($location_add[$i]) ?></td>
                                        <td class="ortala"><?= ($date_show[$i]) ?></td>
                                        <td class="ortala"><?= ($time_exit[$i]) ?></td>
                                    </tr>
                                <?php endfor; ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="bootstrap-data-table-export_info" role="status" aria-live="polite"></div>
                </div>
                <div class="col-sm-12 col-md-7">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="../public/js/printable.js"></script>