// import { call_constr } from './call_pages.js';
function updateTitle(sebet) {
    $("#main_categ_name").html(`${sebet.toUpperCase()}`)
} 
$(document).ready(function() {  

    $('#index').on('click', function(event) {
        event.preventDefault();      
        //localStorage.removeItem('loadedContent');   
       location.reload(); // Sayfayı yeniden yükle
        //window.location.href = 'index.html';      
    });

 function checkCartStatus() {
        var count = $("#shopping-count").text().trim(); 
        $("#cont_owl").hide();     
        if (count === "0") {
            $("#order_table").empty();    
            $(".card-body").empty();   
            $("#products").empty();             
           
             updateTitle("SEBET");    
            $("#ordered_table").show(); 
        } else {
            $("#ordered_table").hide(); 
            $("#prod_metall").hide();
        }
    }
    $('#shopping-link').on('click', function() {
        $("#main_cont").css("display","block");         
        $("#single_page, #taze_haryt, .place_area, #tab_panels").hide(); 

        $("#select_owl, #new_goods, .new_goods_title, #icons_place, #address_map").css("display", "none");
        $("#hide_width_carousel").css("display", "none");      

        updateTitle("SEBET");

        checkCartStatus(); // Sepet durumunu kontrol et
    }); 

    //$(".contact_page, .services, .shifer_products, .cerepisa, .profnostil, .garmoshka").click(function(event){   
        $(".my_place, .contact_page, .services, .shifer_products, .cerepisa, .profnostil, .garmoshka").click(function(event){   
      
        event.preventDefault(); 
       event.stopPropagation();
          $("#main_div, #icons_place , #address_map, #boyaglar_page, .my_place").hide();   
          $("#call_page").css("display","block");       
          $("#order_table").hide(); 
          $("#empty_cart").css("display", "none");

          $("#select_owl, #new_goods, .new_goods_title, #icons_place, #address_map").css("display", "none");
; 
        var pageToLoad;
        if($(this).hasClass("my_place")) {
            //if ($(this).attr("id") === "my_place") {          
            pageToLoad = 'pages/loginregister/account_room.html';     
        } 
        else if($(this).hasClass("contact_page")) {
            pageToLoad = 'pages/html/contact.html';    
        }
        else if($(this).hasClass("services")) {
            pageToLoad = 'pages/html/services.html';      
        }

        else if($(this).hasClass("shifer_products")) {
            pageToLoad = 'pages/sifer/shifer_products.html'; 
           
        }
        else if($(this).hasClass("cerepisa")) {              
            localStorage.setItem('param', 'cherep'); // Parametreyi sakla
            pageToLoad = 'pages/sifer/shifer_products.html';
        }

        else if($(this).hasClass("profnostil")) {                
            localStorage.setItem('param', 'profno'); // Parametreyi sakla
            pageToLoad = 'pages/sifer/shifer_products.html';
        }

        else if($(this).hasClass("garmoshka")) {               
            localStorage.setItem('param', 'garmosh'); // Parametreyi sakla
            pageToLoad = 'pages/sifer/shifer_products.html';
        }   
    //$("#products").load(pageToLoad)   
    
    $(".place_area").show();
    $(".place_area").load(pageToLoad)   
    })
    var savedContent = localStorage.getItem('loadedContent');
    if (savedContent) {
        $("#products").html(savedContent);
    }    
});
