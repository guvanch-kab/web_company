        	                      <?php
                                    include_once '../config/dbase_accessdata.php';

                                    $query = "select * from leave_request ";
                                    $result = mysqli_query($connect, $query);

                                    if ($result->num_rows > 0) {
                                        $sebap = array();
                                        while ($row = $result->fetch_assoc()) {
                                            $sebap[] = $row['reason'];
                                        }
                                    }
                                    if (isset($_POST["findempl"]) && !empty($_POST["findempl"])) {
                                        $veri = $_POST["findempl"];
										$select_reason=$_POST["sayla"];									
										
										echo '<pre>';
										print_r($_POST);
										echo '</pre>';

                                        $query = "SELECT  DISTINCT PersonID, PersonName, Department FROM controlgate1 WHERE PersonName LIKE '$veri%' OR PersonID LIKE '$veri%' ";
                                    } else {
                                        $query = "";
                                    }
                                    echo '
									<div id="habar"></div>
<table class="table table-hover" id="report">
          <thead style="background-color: #e4e4c9;">
            <tr>             
              <th scope="col">ID_No</th>
              <th scope="col">Ady we familiýasy</th>
              <th scope="col">Bölümi</th>
			  <th></th>
            </tr>
          </thead>
		  <tbody>
';
                                    if ($query !== "") {
                                        $result = mysqli_query($connect, $query);

                                        if ($result) {
                                            $output = '';

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // Burada istediğiniz HTML formatında sonuçları oluşturabilirsiniz
                                                $output .= '<tr class="select_person"  data-id="' . $row['PersonID'] . '" data-name="' . $row['PersonName'] . '" data-department="' . $row['Department'] . '"  style="border: 1px solid #9f9e68; border-left:0px; border-right:0px">';
                                                $output .= '<td>' . $row['PersonID'] . '</td>';
                                                $output .= '<td>' . $row['PersonName'] . '</td>';
                                                $output .= '<td>' . $row['Department'] . '</td>';
												$output .= '<td><input type="hidden" value='.$select_reason.' id="select_reason"></td>';
                                                $output .= '</tr>';
                                            }
                                            echo $output;
                                        } else {
                                            echo 'Netije yok: ' . mysqli_error($connect);
                                        }
                                    }
                                    echo '</tbody></table>';
                                    ?>
        	                      <!---------------------------------------sart FORM ---------------------------------->
        	                      <div class="row" id="show_info" style="display: none;">

        	                          <div class="col-1">
        	                              <label style="font-size: 12px;" for="input_id">ID No</label>
        	                              <input type="number" class="form-control " name="input_id" id="input_id">
        	                          </div>
        	                          <div class="col-3 ozeldegisim">
        	                              <label style="font-size: 12px;" for="input_name">Ady we familiýasy</label>
        	                              <input type="text" class="form-control " name="input_name" id="input_name">
        	                          </div>
        	                          <div class="col-2 ozeldegisim">
        	                              <label style="font-size: 12px;" for="input_department">Bölümi</label>
        	                              <input type="text" class="form-control" name="input_department" id="input_department">
        	                          </div>

        	                          <div class="col-2 ozeldegisim" >
        	                              <label style="font-size: 12px;" for="input_other1">Sene</label>
        	                              <input type="date" class="form-control" name="date_reason" id="sene">
        	                          </div>

									  <div class="col-2 ozeldegisim" style="display: none;" id="show_one">
        	                              <label style="font-size: 12px;" for="input_other1">Geliş</label>
        	                              <input type="date" class="form-control" name="date_reason" id="sene_gelis">
        	                          </div>

        	                          <div class="col-1 ozeldegisim" id="show_time1">
        	                              <label style="font-size: 12px;" for="input_other1">Gidiş sagady</label>
        	                              <input type="time" class="form-control" name="go_time" id="gidis_sagat">
        	                          </div>
        	                          <div class="col-1 ozeldegisim" id="show_time2">
        	                              <label style="font-size: 12px;" for="input_other1">Geliş sagady</label>
        	                              <input type="time" class="form-control" name="arrive_time" id="gelis_sagat">
        	                          </div>

        	                          <div class="col-2 ">
        	                              <label style="font-size: 12px;" for="input_other2">Sebäpler</label>
        	                              <select class="form-control izin" id="sebap">
										  <option selected="true" disabled="disabled">Sebäp görkeziň</option>
        	                                  <?php
                                                foreach ($sebap as $item) {
                                                    echo "<option  value='$item'>$item</option>";
                                                }
                                                ?>
        	                              </select>
        	                          </div>
        	                          <div class="col-12">
        	                              <label style="font-size: 12px;" for="input_other3">Başga sebäpler (mejbury dal)</label>
        	                              <textarea class="form-control" rows="4" id="basgasebap"></textarea>
        	                          </div>
        	                          <!-------------------------------------------------------   save data - Yatda Sakla ---------------------------------------------->
        	                          <div class="col-12 mt-3" style="text-align: right;">
        	                              <button type="submit" name="sakla" id="sakla" class="btn btn-primary">Ýatda sakla</button>
        	                          </div>
        	                          <div></div>
        	                      </div>
        	                      <!----------------------------------------------- end FORM--------------------------------------------------------------------------------->

        	                      <script>
        	                          $(document).ready(function() {
										let select_reason='';
        	                              $(".select_person").click(function() {										
											select_reason = $(this).find('input#select_reason').val(); // select reason type         								  
											
        	                                  var id = $(this).data("id");
        	                                  var name = $(this).data("name");
        	                                  var department = $(this).data("department");
        	                                  $("#input_id").val(id);
        	                                  $("#input_name").val(name);
        	                                  $("#input_department").val(department);

        	                                  var x = document.getElementById('show_info');
        	                                  if (x.style.display === 'none') {
        	                                      x.style.display = 'block';
												$("#show_one").hide();
        	                                  }
											   if(select_reason==1 || select_reason==2 || select_reason==3) {
												$("#show_one").show();
												$("#show_time1").hide();
												$("#show_time2").hide();
											  }
        	                              })

        	                              $("#sakla").click(function() {											
																				  
											if(select_reason!=1 && select_reason!=2 && select_reason!=3)
												{
											var fields = [
											
            { selector: "#input_id", value: $("#input_id").val() },
            { selector: "#input_name", value: $("#input_name").val() },
            { selector: "#input_department", value: $("#input_department").val() },
            { selector: "#sene", value: $("#sene").val() },
			//{ selector: "#sene_gelis", value: $("#sene_gelis").val() },
            { selector: "#gidis_sagat", value: $("#gidis_sagat").val() },
            { selector: "#gelis_sagat", value: $("#gelis_sagat").val() },
            { selector: ".izin", value: $(".izin").val() },
           // { selector: "#basgasebap", value: $("#basgasebap").val() }
												
        ];
	}
      							else
								 {
									 fields = [
											
											{ selector: "#input_id", value: $("#input_id").val() },
											{ selector: "#input_name", value: $("#input_name").val() },
											{ selector: "#input_department", value: $("#input_department").val() },
											{ selector: "#sene", value: $("#sene").val() },
											{ selector: "#sene_gelis", value: $("#sene_gelis").val() },
											//{ selector: "#gidis_sagat", value: $("#gidis_sagat").val() },
											//{ selector: "#gelis_sagat", value: $("#gelis_sagat").val() },
											{ selector: ".izin", value: $(".izin").val() },
										   // { selector: "#basgasebap", value: $("#basgasebap").val() }
																				
										];
									}
	
	
	var isValid = true;

        fields.forEach(function(field) {
            if (field.value === '' || field.value == null) {
                $(field.selector).css("border-color", "#F30");
                isValid = false;
            } else {
                $(field.selector).css("border-color", "");
            }
        });
        if (isValid) {
			//alert(select_reason )	
        	$.ajax({
        	url: "../public/add_emp_reason.php",
        	method: "post",
			data: {
                    idno: $("#input_id").val(),
                    at: $("#input_name").val(),
                    dept: $("#input_department").val(),
                    idsene: $("#sene").val(),
					gelissene: $("#sene_gelis").val(),
                    gidissagat: $("#gidis_sagat").val(),
                    gelissagat: $("#gelis_sagat").val(),
                    sebap: $(".izin").val(),
					select_reason:select_reason,
                    basgasebap: $("#basgasebap").val()
                },
        	        success: function(response) {
        	        $("#habar").html(response);

						fields.forEach(function(field) {
                        $(field.selector).val('');
                    });					
        	                 }, // end success func
        	                    });
        	                        } 
        	                            });        	                             
        	                          }); //end doc ready
        	                      </script>