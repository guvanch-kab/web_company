
$(document).ready(function() {

    $("#datepicker").change(function() {

        var selectedDate = $("#datepicker").val();
        //var bolum = $(this).attr("id");
        $("#netije").val(selectedDate);
        $.ajax({
            url: 'public/gate2_exit.php',
            type: 'POST',
            data: {
                selected_date: selectedDate
            },
            success: function(response) {
                $("#netije").html(response);
            },
        });
    });
    $("#basy, #sonu").change(function() {
var bas = $("#basy").val();
var son = $("#sonu").val();

if (bas && son) {
$.ajax({
url: 'public/gate2_exit.php',
type: 'POST',
data: {
    basy: bas,
    sonu: son
},
success: function(response) {
    $("#netije").html(response);
}
});
}
});
});

