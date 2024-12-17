


$(document).ready(function () {
    $(".door").click(function (event) {
        event.preventDefault();
        var bolum = $(this).attr("id");
     

       if (bolum) {
            var url = bolum + ".php";
            $("#pageroute").val(bolum + ' page')
            $.ajax({
                url: url,
                type: "HEAD",
                success: function () {
                    $("#pages").load(url);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 404) {
                        // Create Bootstrap alert for 404 error
                        var errorAlert = $(
                            '<div class="alert alert-danger" role="alert"></div>'
                        );
                        errorAlert.text(
                            "Talap edilyan sahypa (" +
                                url +
                                ") tapylmady. (404 Not Found)"
                        );
                        $("#pages").empty(); // Uncomment if you want to clear previous content (optional)
                        $("#pages").append(errorAlert);
                       
                    } else {
                        // Handle other errors (optional)
                        console.error("Error:", textStatus, errorThrown);
                    }
                },
            });
        }
    });
});
