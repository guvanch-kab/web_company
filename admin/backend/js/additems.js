
$(document).ready(function calculate() {

    $("#yurt").change(function () {
       
        var selectedYurt = $(this).val();
        $.ajax({
            url: "backend/get_size_metall.php",
            type: "POST",
            data: { item_add: selectedYurt },
            dataType: "json",
            success: function (response) {
                $("#add_metall").empty();            

                $("#add_metall").append('<option selected="true" disabled="disabled">Haryt grupbasy</option>');

                $.each(response, function (key, value) {
                    
                    $("#add_metall").append('<option value="' + key + '"> ' + value.metall_group + "</option>" );
                    
                });
            },

        });
    });
});





