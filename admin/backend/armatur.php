<?php
include_once 'db/dbase.php';

$query = "select DISTINCT YURT from Products_calc where HARYT_GRUPBASY='01-ARM'  ";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    $armatur = array();
    while ($row = $result->fetch_assoc()) {
        $armatur[]=$row['YURT'];
    }
}

?>

<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" align="center">
                    <span style="padding-right:6px">Metal hasaplaýan kalkulýator </span>
                    <span style="font-weight: 500; font-size:18px"></span> <span></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->
<div class="container-fluid pict">
    <div class="row" align="center">
        <div class="col-md-5">
            <div class="card customsize" style="border-radius: 8px;">
                <img class="card-img-top mainimg" src="images/armatur.jpg">
            </div>
        </div>

        <div class="col-md-4">
            <div class="recent-report2" align="center" style="border-radius:8px;">
                <h5 class=" title-3" id="metall_name" style="font-weight: 600; font-size:22px"></h5>
                <hr>
                <div class="" align="center" style="padding-bottom:20px;">
                    <button type="button" class="btn btn-primary" id="bylength" style="padding:8px 25px; margin:6px;">
                        Uzynlygyna görä</button>
                    <button type="button" class="btn btn-primary" id="byweight" style="padding:8px 25px; margin:6px;">
                        Agramyna görä </button>
                </div>
                <div align="left">

                    <label class="length">Ýurt saýlaň</label>
                      <select class="form-control sayla1" id="armatur" name="armatur[]">
                        <option selected="true" disabled="disabled">ýurt</option>
                        <?php
        foreach ($armatur as $item) {
            echo "<option value='$item'>$item</option>";
        }
        ?>
                    </select>

                    <label class="length">Armatur ölçegi</label>
                    <select class="form-control sayla1" id="arm_metall" name="arm_metall">
                        <option selected="true" disabled="disabled"></option>
                    </select>
                    
                </div>

                <div align="left">
                    <label class="length_weight">Diamter, mm.</label>
                    <input type="number" class="form-control" value="1" min="1" id="lengthMetall">
                </div>
            </div>
        </div><!-----------end col-md-4------->

        <div class="col-md-3">

            <div class="card card-default">
                <div class="card-header" align="left">
                    <h5 class="card-title">
                        <i class="icon fas fa-exclamation-triangle"></i>
                        Netije
                    </h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="callout callout-success">
                        <div class="row show_hide">
                            <div class="col-md-6" style="border-right: 1px solid #c1c184;">
                                <h3 class="netije_kg"></h3>
                                <b class="olceg_kg"></b>
                            </div>
                            <div class="col-md-6">
                                <h3 class="netije_ton"></h3>
                                <b class="olceg_ton"></b>
                            </div>
                        </div> <!----end row----->

                        <div class="row justify-content-center">
                            <div class="col-md-12 d-flex justify-content-center">
                                <b id="result_metr" class="result_meter"></b>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="recent-report2" style="border-radius: 8px;">
                <h6 class=" title-3" style="font-weight: 600; font-size:22px;">Baha (tonna) </h6>
                <b id="ton_Price" class="result_meter" style="font-size: 26; font-weight: 500;"></b>
                <hr>
                <h6 class=" title-3" style="font-weight: 600; font-size:20px;">Jemi baha </h6>
                <b id="net_Price" class="result_meter" style="font-size:22px; font-weight: 600;"></b>
            </div>
        </div>
    </div>    

<script src="backend/js/armatur.js"></script>
