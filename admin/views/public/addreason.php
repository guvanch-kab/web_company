<?php

$timeString = "08:15";
$dateTime = new DateTime($timeString);
//$dateTime->setDate(2024, 7, 12);
$timestampMilliseconds = $dateTime->getTimestamp() * 1000;
//echo $timestampMilliseconds; // Output: 1720771200000

include_once '../config/dbase_accessdata.php';
//include_once 'show_result_reason.php';

$query = "select type_reason from leave_request where type_reason<>'' AND type_reason IS NOT NULL ";
$result = mysqli_query($connect, $query);

if ($result->num_rows > 0) {
  $sebap = array();
  while ($row = $result->fetch_assoc()) {
    $sebap[] = $row['type_reason'];
  }
}
?>

<div class="container-fluid">
        <div class="row" style="padding: 15px 0;">
            <div class="col-6">
                <h4>IŞ RUGSADY</h4>
            </div>
        </div>

        <div class="row" style="display: flex; justify-content: right;">
       
            <div class="col-md-2 col-sm-6 col-12 mb-2">
                <button type="button" id="reason_update" class="btn btn-outline-primary custom-button door" style="border-radius: 4px;margin:0 5px; width: 100%;">Günlük sagatlaýyn rugsat</button>
            </div>
            <div class="col-md-2 col-sm-6 col-12 mb-2">
                <button type="button" id="daily_reason" class="btn btn-outline-primary custom-button door" style="border-radius: 4px;margin:0 5px; width: 100%;">Günlük rugsat</button>
            </div>
            <div class="col-md-2 col-sm-6 col-12 mb-2">
                <button type="button" id="longtime_reason" class="btn btn-outline-primary custom-button door" style="border-radius: 4px;margin:0 5px; width: 100%;">Zähmet we iş sapary</button>
            </div>
        </div>
    </div>

<hr>
<div class="row">

  <div class="col-md-6"></div>
  <div class="col-md-4">
    <input id="daily_leave" type="search" class="form-control" placeholder="işgär gozle" autocomplete="off">
  </div>
  <div class="col-md-2">
    <select class="form-control sayla1" id="neden" name="neden[]">
      <!-- <option selected="true" disabled="disabled">Rugsat görnüşi</option> -->
      <?php
      $u=1;
      foreach ($sebap as $item) {
        
        echo "<option value='$u'>$item</option>";
        $u++;
      }
      ?>
    </select>
  </div>
</div> <!--end row-->
<hr>
<table class="table table-hover" id="report" style="display: none;">
  <thead style="background-color: #e4e4c9;">
    <tr>
      <th scope="col">ID_No</th>
      <th scope="col">Ady we familiýasy</th>
      <th scope="col">Bölümi</th>
    </tr>
  </thead>
  <tbody>
    <tr style="border: 1px solid #9f9e68; border-left:0px; border-right:0px; font-size: 12px;">
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>

<div class="card"  id="show_result_reason">

</div> <!-- end container -->
</div> <!-- end card -->

<script src="../public/send_date.js"></script>
<script src="../public/gozle.js"></script>



<script>
$(document).ready(function() {
   // $("#show_reason_result").click(function() {
///////////////////////////////////////////////  SHOW RESULT EVERY CURRENT DATE //////////////////////////////////////////////
      $(".door").click(function (event) {
        event.preventDefault();
        var bolum = $(this).attr("id");
$(".door").removeClass("btn-primary").addClass("btn-outline-primary");
$(this).removeClass("btn-outline-primary").addClass("btn-primary");
$("#show_result_reason").show();

        $("#show_result_reason").load("../public/"+bolum+".php", function(response, status, xhr) {

            if (status == "error") {
                var msg = "Error: ";
                $("#show_result_reason").html(msg + xhr.status + " " + xhr.statusText);
            } else {
                var x = document.getElementById('show_result_reason');
                // if (x.style.display === 'none') {
                //     x.style.display = 'block';
                // } else {
                //     x.style.display = 'none';
                // }
            }
        });
    });
$("#daily_leave").keyup(function(){
$("#report").show();
});

$('#daily_leave').on('input keyup', function() {
            var inputVal = $(this).val();
            $(".door").removeClass("btn-primary").addClass("btn-outline-primary");
            $("#show_result_reason").hide();
            // Eğer arama kutusu boşsa, select kutusunu resetle
            if (inputVal === '') {
             // $('#neden').val('').attr('disabled', 'disabled');
        
            } else {
                // Arama kutusunda değer varsa select kutusunu etkinleştir
              //  $('#neden').removeAttr('disabled');
            }
        });

});
</script>
