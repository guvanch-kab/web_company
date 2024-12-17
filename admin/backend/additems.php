<?php
include_once 'db/dbase.php';

$query = "select DISTINCT YURT from Products_calc where HARYT_GRUPBASY<>'' AND YURT IS NOT NULL ";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    $yurt = array();
    while ($row = $result->fetch_assoc()) {
        $yurt[] = $row['YURT'];
    }
}
?>
<?
$select_metall = "SELECT HARYT_KODY, HARYT_ACIKLAMA, SHTUK_METR, METR_AGRAMY, SATYS_BAHA FROM Products_calc where HARYT_GRUPBASY IS NOT NULL ";
$netije = mysqli_query($conn, $select_metall);

if ($netije->num_rows > 0) {
    $add_haryt = array();
    $add_shtuk = array();
    $add_meterweight = array();
    $add_sale = array();
    $add_code = array();
    while ($row = $netije->fetch_assoc()) {
        $add_haryt[] = $row['HARYT_ACIKLAMA'];
        $add_shtuk[] = $row['SHTUK_METR'];
        $add_meterweight[] = $row['METR_AGRAMY'];
        $add_sale[] = $row['SATYS_BAHA'];       
        $add_code[] = $row['HARYT_KODY'];
    }
}
?>


<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" align="center">
                    <span style="padding-right:6px; font-weight:700;">UZYNLYK WE ÖLÇEG BIRLIGI </span>
                    <span style="font-weight: 500; font-size:18px"></span> <span></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->


<div class="container-fluid pict">
    <div class="row" align="center">


        <div class="col-md-4">
            <div class="recent-report2" align="center" style="border-radius:8px;">
                <h5 class=" title-3" id="metall_nam" style="font-weight: 600; font-size:22px">Metal</h5>
                <hr>
                <div class="" align="center" style="padding-bottom:20px;">

                </div>

                <div align="left">

                    <label class="length">Ýurt saýlaň</label>
                    <select class="form-control sayla1" id="yurt" name="yurt[]">
                        <option selected="true" disabled="disabled">ýurt</option>
                        <?php
                        foreach ($yurt as $item) {
                            echo "<option value='$item'>$item</option>";
                        }
                        ?>
                    </select>

                    <label class="length">Metal grupbasy</label>
                    <select class="form-control sayla1" id="add_metall" name="add_metall">
                        <option disabled="disabled"></option>
                    </select>
                </div>

                <div align="left">

                </div>
            </div>
        </div><!-----------end col-md-4------->

        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header" align="left">
                    <h5 class="card-title">
                        <i class="icon fas fa-exclamation-triangle"></i>
                        Netije
                    </h5>
                </div>
                <!-- /.card-header -->

                <form id="formtalap" action="">

                    <div class="row" style="margin-bottom:0px; padding:5px;">
                        <div class="col-md-12" align="center">
                            <input autocomplete="off" type="hidden" name="uady" id="uady" value="<?= $uady; ?>">

                            <div class="card-body">

                                <table class="table" id="habar">
                                    <thead class="" style="margin-top:2px; font-size:12px; color:#646464; background-color: #e9eced;" align="center">
                                        <tr>
                                            <th>Haryt</th>
                                            <th>Metr uzynlygy</th>
                                            <th>Metr agramy</th>
                                            <th>Satylyş baha</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="uytge">
                                        <?php if (!empty($add_haryt)) : ?>
                                            <?php for ($i = 0; $i < count($add_haryt); $i++) : ?>
                                                <tr>
                                                    <td><input autocomplete="off" type="text" id="HARYT_ACIKLAMA" name="item[]" class="form-control ramkasyz aciklama_font" value="<?= htmlspecialchars($add_haryt[$i]) ?>"></td>
                                                    <td><input autocomplete="off" type="text" id="SHTUK_METR" name="longmeter[]" class="form-control ramkasyz " value="<?= htmlspecialchars($add_shtuk[$i]) ?>"></td>
                                                    <td><input autocomplete="off" type="text" id="METR_AGRAMY" name="weightitem[]" class="form-control ramkasyz" value="<?= htmlspecialchars($add_meterweight[$i]) ?>"></td>
                                                    <td><input autocomplete="off" type="text" id="SATYS_BAHA" name="price[]" class="form-control ramkasyz" value="<?= htmlspecialchars($add_sale[$i]) ?>"></td>
                                                    <td><input  type="hidden" id="codemetall" name="codemetall[]" class="codeitems" value="<?= htmlspecialchars($add_code[$i]) ?>"></td>

                                                </tr>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                           
                            </div>
                        </div>
                        </form>

                        <script src="backend/js/additems.js"></script>

                        
                        <script>
                            $(document).ready(function() {
                                $("#add_metall").change(function() {
                                    var metall_group = $(this).val();
                                    var country = $("#yurt").val();
                                    // userclient=$(this).closest('#userid').val();

                                    $.ajax({
                                        url: 'backend/metall_update.php',
                                        method: 'post',
                                        data: {
                                            ady: metall_group,
                                            yurt: country
                                        }, //

                                        success: function(response) {
                                            $("#habar").html(response);
                                        },
                                        error: function(xhr, status, error) {
                                            console.error("AJAX Error: " + status + error);
                                        }
                                    });
                                });

                                ////////////////////////  update data//////////////////////////

                                $("#uytge .ramkasyz, #codemetall").change(function() {
                                    var change_number;

                                    change_number = $(this).val(); // use $(this) to reference the current input field with the class 'ramkasyz'                                   
                                    var code = $(this).closest('tr').find('.codeitems').val();
                                    var idno = $(this).attr('id');                                  
                                    alert(change_number + ' WEEEE ' +  code +  'yeeee ' + idno )
                                    $.ajax({
                                        url: 'backend/desc_upd.php',
                                        method: 'post',
                                        data: {
                                            change_number: change_number,
                                            codeid: code,
                                            idno:idno                                           
                                        }, //
                                        success: function(response) {
                                            $("#result_change").html(response);

                                        } // end success func
                                    });
                                    //	}

                                });




                            }) /////////// end document ready function
                        </script>
                          <div id="result_change"></div>