$(document).ready(function() {	
    var dataoption = [];
    var level = '';

	$('#level option').each(function() {       
		var optionValue = $(this).attr('id');
		dataoption.push(optionValue);
	});  

    $('#level').change(function() {		
        var education_level = $(this).children("option:selected").attr("id");
        if (education_level == 'addeducation') {           
            $('#exampleModal').modal('show');	
            $('#level_educ').change(function() {	
                level = $("#level_educ").val();	
            });	
        }
    });
    $('#save').click(function() {       
        if (dataoption.includes(level)) {
            alert('Data already exists');		
        } else {	
            dataoption.push(level);			
            var addEducationOption = $('<option>', {
                value: level,
                text: level
            });
            $('#addeducation').before(addEducationOption);     
            addEducationOption.prop('selected', true);   
            $('#exampleModal').modal('hide');
        }
    }); // save click function

    $('#clear').click(function() {                       
        var selectedOption = $('#level_educ').val();
        if (selectedOption) {
            $('#level option[value="' + selectedOption + '"]').remove();
            $('#exampleModal').modal('hide');
        } else {
            console.log("No option selected."); // Debugging
        }
    });
});

