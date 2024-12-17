<?php
$today = date('Y-m-d');
$k = 0;
$t = 0;
$data = null;
$net = null;
$date = date_create($today);
$sene = date_format($date, "d-m-Y"); 
include_once '../config/dbase.php'; 
include_once '../config/dbase_accessdata.php'; 
$gapy = 'Çykyş';
if (isset($_POST['selected_date'])) {
    $today = mysqli_real_escape_string($connect, $_POST['selected_date']);
    $check_query = "SELECT * FROM controlgate1 WHERE DateEntry='$today' AND DeviceIPAddress IN ('10.1.10.210', '10.1.10.212')";
    $check = mysqli_query($connect, $check_query);
}
else{

    $check_query = "SELECT * FROM controlgate1 WHERE DateEntry='$today' AND DeviceIPAddress IN ('10.1.10.210', '10.1.10.212')";
    $check = mysqli_query($connect, $check_query);
}


$query = "SELECT * FROM AttendanceRecordInfo WHERE PersonName IS NOT NULL AND DATE(FROM_UNIXTIME(AttendanceDateTime / 1000)) = '$today' AND (DeviceIPAddress = '10.1.10.210'  OR  DeviceIPAddress = '10.1.10.212') ";
$netije = mysqli_query($conn, $query);

if (mysqli_num_rows($netije) > 0) {
    $net = $netije;
}

elseif (mysqli_num_rows($check) > 0) {
    $net = $check;
}

if ($net && mysqli_num_rows($net) > 0) {
    $k = 1;
    $person_id = array();
    $person_name = array();
    $date_time = array();
    $device_name = array();
    $date_entry = array();
    $device_ip = array();
    $location_add = array();
    $date_show = array();
    
    while ($row = $net->fetch_assoc()) {
       // print_r($row);
        $t++;
        $person_id[] = $row['PersonID'];
        $person_name[] = $row['PersonName'];
        $device_ip[] = $row['DeviceIPAddress'];
        $location_add[] = $row['DeviceName'];
        
        $timestamp = $row['AttendanceDateTime'] / 1000;
        $date = new DateTime("@$timestamp");
        $date->setTimezone(new DateTimeZone('Asia/Ashgabat')); 

        $dateentry = $date->format('Y-m-d');
        $timeentry = $date->format('H:i:s');        

        $date = date_create($dateentry); 
        $date_show[] = date_format($date, "d-m-Y");
        $show_daily = date_format($date, "d-m-Y");

        $show_daily=date_format($date,"d-m-Y");

        $date_entry[] = $dateentry;
        $date_time[] = $timeentry;
        
        $personname = $row['PersonName'];
        //$change_date = $row['AttendanceDateTime']; 
        $personid = $row['PersonID'];
        $deviceip = $row['DeviceIPAddress'];

    }
}
// Veritabanı bağlantılarını kapat
mysqli_close($connect);
mysqli_close($conn);
?>    
<div class="col-md-12" id="netije">       

    <div class="row" style="padding:20px 18px;">
        <div class="col-md-6"></div>
        <div class="col-md-4 senetakvimi">
            <input id="gozle" type="search" class="form-control" placeholder="Gozle">
        </div>
        <div class="col-md-2 senetakvimi">
            <input type="date" id="getexit" max="<?php echo date('Y-m-d'); ?>" class="form-control">
        </div>

        <div class="col-md-10" style="font-weight: 600; color:#4a4a4a; margin-top:20px" id="isgar_sany"><b>Ähli Gapy çykyşlary </b>
         / <?  if(!empty($show_daily)){echo $show_daily;} else{ echo $today. ' senesi ucin yazgy tapylmady'; }?> / Günlük çykan işgär sany: <span style="font-size: 16px;">
                <?=$t;?></span> 
                </div>
                <div class="col-md-2"  style="text-align: right; font-weight: 600; margin-top:20px;" >
                <a href="#" class="btn btn-primary" onclick="yazdir()"> Print et </a>     
             </div>  
   
    </div><!--end row-->
    <script src="../public/send_date.js"></script>
    <script src="../public/gozle.js"></script>
    <!----------------------------- add value to php ------------------------------->
    <div class="row">
   
        <div class="col-12">

            <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid">
                <thead>
                    <tr role="row" class="ortala">
                        <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Işgär_ID</th>
                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Ady we Familiýasy</th>

                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Giriş nokady</th>
                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 130px;">Senesi</th>
                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Giriş sagady</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($person_name)) : ?>
                        <?php for ($i = 0; $i < count($person_name); $i++) : ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1 ortala"><?= htmlspecialchars($person_id[$i]) ?></td>
                                <td class=""><?= htmlspecialchars($person_name[$i]) ?></td>
                     
                                <td><?="Gapy-".$gapy;?></td>
                                <td class="ortala"><?= $date_show[$i]; ?></td>
                                <td class="ortala"><?= ($date_time[$i]) ?></td>
                            </tr>
                        <?php  $k++; endfor; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <!-- <b>Jemi <?=$k;?> sany ýazgy tapyldy</b> -->
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
<script src="../public/js/printable.js"></script>