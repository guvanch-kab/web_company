<?php
//$today = date('Y-m-d');
$k = 0;
$t = 0;
$data = null;
$net = null;
include_once '../config/dbase.php';
include_once '../config/dbase_accessdata.php';

$query = "select type_reason from leave_request where type_reason<>'' AND type_reason IS NOT NULL ";
$result = mysqli_query($connect, $query);
if ($result->num_rows > 0) {
  $sebap = array();
  while ($row = $result->fetch_assoc()) {
    $sebap[] = $row['type_reason'];
  }
}

function execute_query($connect, $query, $label) {
    $result = mysqli_query($connect, $query);
    if (!$result) {
        die('Query failed (' . $label . '): ' . mysqli_error($connect));
    }
    return $result;
}

if(isset($_POST['ex_date']) && isset($_POST['enr_date'])  && isset($_POST['select_r']) ) {
   
    // echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';

    $ex_day = $_POST['ex_date'];
    $enr_date = $_POST['enr_date'];
    $select_reason = $_POST['select_r'];
    if (!empty($ex_day) && !empty($enr_date) && !empty($select_reason)) {
    $check_query = "SELECT * FROM Daily_leave WHERE Date_leave BETWEEN '$ex_day' AND '$enr_date' ";
    $check_dates = execute_query($connect, $check_query, 'ex_date/enr_date');
    
    
    if (mysqli_num_rows($check_dates) > 0) {
        $net = $check_dates;
    }
}
}

if ($net && mysqli_num_rows($net) > 0) {
    $k = 1;
    $person_id = array();
    $person_name = array();
    $department = array();
    $time_leave = array();
    $time_arrive = array();
    $date_leave=array();
    $reason = array();
    $result_time = array();
    while ($row = $net->fetch_assoc()) {
        $person_id[] = $row['PersonID'];
        $person_name[] = $row['PersonName'];
        $department[] = $row['Department'];
        $date_leave[] = $row['Date_leave'];
        $time_leave[] = $row['Time_leave'];   
        $time_arrive[] = $row['Time_arrive'];   
        $reason[] = $row['Reason'];
        $result_time[] = $row['Result_time'];
    }
}
?>
    <div class="col-md-12" id="netije">       

                <div class="row" style="padding:7px 16px; background-color: #f9f8f2;" >                

                    <div class="col-md-6" style="margin-top:10px;color:#757575"><h4 >Sene we günlere görä rugsatlar </h4></div>

                    <div class="col-md-2 senetakvimi" >
                    <select class="form-control select_reason custom-input" id="neden" name="neden[]">
                    <option selected="true" disabled="disabled">Rugsat görnüşi</option>
                    <?php
                    $u=1;
                    foreach ($sebap as $item) {
                    echo "<option value='$u'>$item</option>";
                    $u++;
                    }
                    ?>
                    </select>
                    </div>
                 
                    <div class="col-md-2 senetakvimi">
                            <input type="date" id="exit_date" class="form-control custom-input">
                        </div>
                        <div class="col-md-2 senetakvimi">
                            <input type="date" id="entry_date" class="form-control custom-input">
                        </div>

                   
                </div>
               
                    <div class="row" style="padding:20px 18px;">
                    
                        <div class="col-md-6"></div>
                        <!-- <div class="col-md-6  senetakvimi">
                            <input id="all_reason" type="search" class="form-control custom-input" placeholder="Gozle- поиск">
                        </div>                        -->

                    </div><!--end row-->
                    <script src="../public/all_reason_show.js"></script>
            <script src="../public/gozle.js"></script>

            <!----------------------------- add value to php ------------------------------->
<div id="short_time"></div>

            <div class="row " id="show_short_time" style="font-size: 13px;">
                <div class="col-12 " >
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">Işgär_ID</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Ady we Familiýasy</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Bölümi</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Gidýän güni</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Gidýän wagty</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Gelmeli wagty</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 130px;">Gidiş sebäbi</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Gelen wagty</th>
                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 60px;">Hereket</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($person_name)) : ?>
                                <?php for ($i = 0; $i < count($person_name); $i++) : ?>

                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><?= htmlspecialchars($person_id[$i]) ?></td>
                                        <td><?= ($person_name[$i]) ?></td>                                  
                                        <td><?= ($department[$i])  ?></td>
                                        <td><?= ($date_leave[$i]) ?></td>                                        
                                        <td><?= ($time_leave[$i]) ?></td>
                                        <td><?= ($time_arrive[$i]) ?></td>
                                        <td><?= ($reason[$i]) ?></td>
                                        <input type="hidden" id="time_leave" value="<?= ($time_leave[$i]) ?>">
                                        <input type="hidden" id="time_arrive" value="<?= ($time_arrive[$i]) ?>">
                                        <td><?= ($result_time[$i]) ?></td>
                                        <td style="text-align: center;">
                                        <a   id="<?= $person_id[$i]; ?>" class="btn btn-outline-danger btn-sm delete_time" data-bs-toggle="tooltip">  
                                <i class="fas fa-trash" style="color:#EE4A22; font-size:20px;" data-toggle="tooltip" title="Poz" data-original-title="Delete"></i>

                            </a> 
                                        </td>
                                    </tr>
                                <?php endfor; ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="bootstrap-data-table-export_info" role="status" aria-live="polite">Gorkezilyar ... netijeler</div>
                </div>
                <div class="col-sm-12 col-md-7">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="public/js/sil.js"></script>