

 
$(document).ready(function() {

    // $("#all_reason, .sayla1, #exit_date, #entry_date").off("keyup change").on("keyup change ", function () {
      $("#exit_date, #entry_date, .select_reason").change(function() {
     var select_r=$('.select_reason').val();
      var exit_date = $("#exit_date").val();
      var entry_date = $("#entry_date").val();
     // var all_reason = $("#all_reason").val();


  if (exit_date && entry_date &&  select_r!=1) {

        $.ajax({
      url:'public/show_all_reason.php',
      method:'post',
      data:{ex_date:exit_date, enr_date:entry_date, select_r:select_r}, // 
      success:function(response){
      $("#netij").html(response);   
      }
       }); 
      }
/////////////////////////////////////////////////////// sagatlik rugsat gorkez/////////////////////////

if (exit_date && entry_date &&  select_r==1) 
{   
    $("#netij").empty();
    $.ajax({
        url:'public/show_short_reason.php',
        method:'post',
        data:{ex_date:exit_date, enr_date:entry_date, select_r:select_r}, // 
        success:function(response){
        //$("#show_short_time").load('public/short_reason_update.php');   

        $("#netij").html(response);   
        
        }
         }); 
}

        })  
    });
