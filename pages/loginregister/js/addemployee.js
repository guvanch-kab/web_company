// JavaScript Document

$(document).ready(function() {	
	var sayla = '';
	$('a').click(function(e) {		
	  bolum = $(this).attr("id");
	  e.preventDefault();
	  
	 $('#sutunorta').empty();
		//var href = $(this).attr('href');
		if (bolum) {
			page_addr=bolum+'.php';			
		  $("#sutunorta").load(page_addr);
		
		}
		return false; 

/*
$.ajax({
 url:'addemployee.php',
 method:'post',
 data:$('#formekle').serialize(),
 //data:{aa:a},
 success:function(response){
$("#getresult").html(response);
		} // end success func
				}); //end ajax
				
*/
 					});
});

