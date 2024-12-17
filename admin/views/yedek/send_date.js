$(document).ready(function() {
    $("#datepicker").change(function() {
        var selectedDate = $("#datepicker").val();
        alert(selectedDate + 'gguu');

        $.ajax({
            url: 'gate1.php',
            type: 'POST',
            data: { selected_date: selectedDate },
           // dataType: 'json',
            success: function(response) {
                console.log("Response: " + response); // Yanıtı konsola yazdır
               $("netije").html(response)
            },

        });
    });
});
