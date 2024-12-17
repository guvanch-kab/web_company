<!-- Modal -->
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               
                                <label class="form-label" style="font-weight: 600;">Bilim derejesi</label> (doktor, kandidat, alymlyk we ...)
                                <input type="text" id="level_educ" name="level_educ" class="form-control" required />    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
                                                <button type="button" id="save" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                <button type="button" id="clear" class="btn btn-primary waves-effect waves-light">Remove changes</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

<script>
    /*
$(document).ready(function() {  
/*
       
  var level = ''; 
  $('#level_educ').change(function() {     
        level = $("#level_educ").val();   
    $('#save').click(function() { 

   

                   var addEducationOption = $('<option>', {
                    value: level,
                    text: level
                });
                $('#addeducation').before(addEducationOption);     
                addEducationOption.prop('selected', true);   
                $('#exampleModal').modal('hide');
            }

  });
    $('#clear').click(function() {                       
        var selectedOption = $('#level_educ').val();
        if (selectedOption) {
            $('#level option[value="' + selectedOption + '"]').remove();
            //console.log(selectedOption + " removed from select options."); // Debugging
            $('#exampleModal').modal('hide');
        } else {
            console.log("No option selected."); // Debugging
        }
        // Reset the value of the input field
        $('#level_educ').val('');
    });
    
});

*/

</script>