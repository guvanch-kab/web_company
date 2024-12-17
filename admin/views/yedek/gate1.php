<?php
$today = date('Y-m-d');

if (isset($_POST['selected_date'])) {
    $today = $_POST['selected_date'];
} else {
    $today = date('Y-m-d'); // Varsayılan olarak bugünün tarihini kullan    
}

include_once 'config/dbase.php';
include_once 'config/dbase_accessdata.php';

$check_query = "SELECT * FROM controlgate1 WHERE DateEntry='$today'";
$check = mysqli_query($connect, $check_query);

if (!$check) {
    die('Query failed: ' . mysqli_error($connect));
}

// AttendanceRecordInfo tablosundan PersonName'in null olmadığı kayıtları sorgulama
$query = "SELECT * FROM AttendanceRecordInfo WHERE PersonName IS NOT NULL";
$netije = mysqli_query($conn, $query);

if (!$netije) {
    die('Query failed: ' . mysqli_error($conn));
}

if (!empty(mysqli_num_rows($check))) {
    // $check sorgusu boş değilse $netije'yi $check ile değiştir
    $netije = $check;
}

if ($netije->num_rows > 0) {
    $k = 0;
    $person_id = array();
    $person_name = array();
    $date_time = array();
    $device_name = array();
    $date_entry = array();
    $date_time = array();
    while ($row = $netije->fetch_assoc()) {
        $person_id[] = $row['PersonID'];
        $person_name[] = $row['PersonName'];
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

        // Duplicate kontrolü
        $check_query = "SELECT * FROM controlgate1 WHERE PersonID='$personid' AND AttendanceDateTime='$change_date'  ";
        $check_result = mysqli_query($connect, $check_query);

        if ($check_result->num_rows > 0) {

            // Duplicate varsa güncelle
            $sqlupd = "UPDATE controlgate1 
                SET DateEntry='$dateentry', TimeEntry='$timeentry', PersonName='$personname' 
                WHERE PersonID='$personid' AND AttendanceDateTime='$change_date'";
            mysqli_query($connect, $sqlupd);
        } else {
            // Duplicate yoksa ekle    
            // echo "Inserting new record for $person_name...<br>";

            $sqlins = "INSERT INTO controlgate1 (PersonID, PersonName, DateEntry, TimeEntry, AttendanceDateTime)
      VALUES ('$personid', '$personname', '$dateentry', '$timeentry', '$change_date')";
            mysqli_query($connect, $sqlins);
        }
    }
}
$conn->close();
?>

<div class="row">
    <div class="col-md-12" id="netije">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Giriş .</strong>
            </div>
            <div class="card-body">
                <div id="bootstrap-data-table-export_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">

                        <div class="col-md-6"> </div>
                        <div class="col-md-4">
                            <input type="search" class="form-control form-control-sm" placeholder="Gozle" aria-controls="bootstrap-data-table-export">
                        </div>
                        <div class="col-md-2">

                            <input type="date" id="datepicker" class="form-control form-control-sm">
                        </div>

                    </div><!--end row-->
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $("#datepicker").change(function() {
                        // $(".card-body").empty();
                        var selectedDate = $("#datepicker").val();

                        var startDate = new Date('2024-07-02');
        
        // Initialize datepicker
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: startDate, // Minimum selectable date
            beforeShowDay: function(date) {
                // Convert date to yyyy-mm-dd format
                var dateString = $.datepicker.formatDate('yy-mm-dd', date);
                
                // Disable dates after startDate
                return date <= startDate ? [true] : [false];
            }
        });
                    
                        $("#netije").val(selectedDate);
                        
                        $.ajax({
                            url: 'gate1.php',
                            type: 'POST',
                            data: {
                                selected_date: selectedDate
                            },
                            success: function(response) {

                                $("#netije").html(response);

                            },
                        });

                    });
                });
            </script>

            <!----------------------------- add value to php ------------------------------->

            <div class="row">
                <div class="col-md-12">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Işgär_ID</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Ady we Familiýasy</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Gapy - Giriş</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">IP - Giris</th>
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
                                        <td><?= htmlspecialchars("Gapy-1") ?></td>
                                        <td><?= ($device_name[$i]) ?></td>
                                        <td><?= ($date_entry[$i]) ?></td>
                                        <td><?= ($date_time[$i]) ?></td>
                                    </tr>
                                <?php endfor; ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="bootstrap-data-table-export_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>