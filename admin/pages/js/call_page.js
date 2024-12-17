
$(document).ready(function () {
  var bolum = "";
  $("#loadfile").load("backend/main.html");
  $(document).on('click', '.loadContent',  function   (event) {
    event.preventDefault(); // Prevent default link behavior
    var bolum =$(this).data("file");

    $.ajax({
      url: "backend/" + bolum,
      success: function (data) {
        $("#loadfile").empty(); // Empty container before loading new content
        $("#loadfile").html(data); // Update content with retrieved data
        // Extract filename and extension
        var parts = bolum.split(".");
        var extension = parts.pop();
        var nameFile = parts.join(".");
        nameFile = nameFile.charAt(0).toUpperCase() + nameFile.slice(1);
        $("#metall_name").text(nameFile);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // Handle potential errors during loading
        console.error("Error loading content:", textStatus, errorThrown);
        // You can display an error message to the user here
      },
    });
  });  

  $("a").click(function (event) { 
    event.preventDefault(); // Prevent default link behavior
    bolum = $(this).attr("id");
   // alert(bolum)
    $.ajax({
      url: "backend/" + bolum,
      success: function (data) {
        $("#loadfile").empty(); // Empty container before loading new content
        $("#loadfile").html(data); // Update content with retrieved data
        // Extract filename and extension
        var parts = bolum.split(".");
        var extension = parts.pop();
        var nameFile = parts.join(".");
        // Capitalize first letter
        nameFile = nameFile.charAt(0).toUpperCase() + nameFile.slice(1);
        $("#metall_name").text(nameFile);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // Handle potential errors during loading
        console.error("Error loading content:", textStatus, errorThrown);
        // You can display an error message to the user here
      },
    });
  });


});
