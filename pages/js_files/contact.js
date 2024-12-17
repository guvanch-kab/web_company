

$(".contact").click(function(event){    
    event.preventDefault();    

   var sectionId = $(this).attr("id");  
   $("#call_page").css("display","block");
   $("#cont_owl, #empty_cart, .place_area").hide();

    $("#products").empty();
    $(".call_page").html(`               
    <h2 class="metall_page_title">${sectionId.toUpperCase()}</h2> `);
    $("#products").html('<h1>Welcome </h1>');


    
});