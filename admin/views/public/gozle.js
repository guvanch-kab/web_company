
	$(document).ready (function(){

 $("#gozle, #gate_exit").keyup(function(){
 var arabul=$('#gozle').val();
 var gate_exit=$('#gate_exit').val();
 //alert(gate_exit)
 //alert(arabul)
   $.ajax({
 url:'public/gozleg.php',
 method:'post',
 data:{gozletap:arabul, gateexit:gate_exit}, // 
 success:function(response){
 $("#bootstrap-data-table-export").html(response);
 $("#found_record").html(response);
 }
  });
    });
   /////////////////////////////  Rugsat alyan isgar gozle  //////////////////////////// 
    $("#daily_leave, .sayla1").off("keyup change").on("keyup change ", function () {

    var find_empl=$('#daily_leave').val();
    var sayla=$('.sayla1').val();

      $.ajax({
    url:'public/daily_leave_search.php',
    method:'post',
    data:{findempl:find_empl, sayla:sayla}, // 
    success:function(response){
    $("#report").html(response);   
    }
     }); 
      })  
  });
     
