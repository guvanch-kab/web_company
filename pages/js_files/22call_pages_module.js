// import { call_constr } from './call_pages.js';
function updateTitle(sebet) {
    $("#main_categ_name").html(`${sebet.toUpperCase()}`)
} 

$(document).ready(function() {  

    $(".place_area").css("display","none");    
    
    $('#index').on('click', function(event) {
        event.preventDefault();
        $("#products").empty(); 
        //localStorage.removeItem('loadedContent');   
       location.reload(); // Sayfayı yeniden yükle
        //window.location.href = 'index.html';
       $("#products").css("display","none");   
    });

 function checkCartStatus() {
        var count = $("#shopping-count").text().trim(); 
        $("#cont_owl").hide();     
        if (count === "0") {
            $("#order_table").empty();    
            $(".card-body").empty();   
            $("#products").empty();  
               
            $("#taze_haryt, #hide_width_carousel").css("display","none")
            // $("#products").html(
            //     '<div id="empty_cart" style="display: flex; justify-content: center; align-items: center; margin-top:100px">' +
            //         '<img src="/pages/images/icons/empty.svg" alt="Empty Cart" height="250px" style="display: block;" />' +
            //         '<p class="font-weight-bold">Sebediniz boşaaa!</p>' +
            //     '</div>');   

             updateTitle("SEBET");
    
            $("#ordered_table").show(); 
        } else {
            $("#ordered_table").hide(); 
            $("#prod_metall").hide();
        }
    } 

    $('#shopping-link').on('click', function() {
        $("#main_cont").css("display","block");         
        $("#single_page, #taze_haryt, .place_area").hide(); 

        $("#select_owl, #new_goods, .new_goods_title, #icons_place, #address_map").css("display", "none");
        $("#hide_width_carousel").css("display", "none");
        $("#taze_haryt, .place_area").css("display", "none");       

        updateTitle("SEBET");

        checkCartStatus(); // Sepet durumunu kontrol et
    }); 

    //$(".contact_page, .services, .shifer_products, .cerepisa, .profnostil, .garmoshka").click(function(event){   
        $(".my_place, .contact_page, .services, .shifer_products, .cerepisa, .profnostil, .garmoshka").click(function(event){   
      
        event.preventDefault(); 
       event.stopPropagation();
          $("#main_div, #icons_place , #address_map, #boyaglar_page").hide();   
          $("#call_page").css("display","block");       
          $("#order_table").hide(); 
          $("#empty_cart").css("display", "none");

          $("#select_owl, #new_goods, .new_goods_title, #icons_place, #address_map").css("display", "none");

          const $sidebar = $(".sidebar");
          const $toggleBtn = $(".toggle-btn");
          
        //   $toggleBtn.on("click", function () {
        //       $sidebar.toggleClass("closed");
        //   }); 
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
            //var param = 'garmosh';      
            localStorage.setItem('param', 'cherep'); // Parametreyi sakla
            pageToLoad = 'pages/sifer/shifer_products.html';
        }

        else if($(this).hasClass("profnostil")) {
            //var param = 'garmosh';      
            localStorage.setItem('param', 'profno'); // Parametreyi sakla
            pageToLoad = 'pages/sifer/shifer_products.html';
        }

        else if($(this).hasClass("garmoshka")) {
            //var param = 'garmosh';      
            localStorage.setItem('param', 'garmosh'); // Parametreyi sakla
            pageToLoad = 'pages/sifer/shifer_products.html';
        }
    //$("#products").empty();
    //$("#products").load(pageToLoad)   
    
    $(".place_area").show();
    $(".place_area").load(pageToLoad)   
    })

/////////////////////////////////////////////////////////  start loadConent ////////////////////////////////////////////

    var savedContent = localStorage.getItem('loadedContent');
    if (savedContent) {
        $("#products").html(savedContent);
    }
/////////////////////////////////////////////////////////// PAGE CLICK /////////////////////////////////////////

$(document).on('click ', '.pages, .page_index, .pages_metal', function(event) {

    if (event.type === 'mouseenter' && $(this).hasClass('pages_metal') || $(this).hasClass('page_index')) {
        return; // pages_metal sınıfında mouseenter olayını atla
    }  
    event.preventDefault(); 
    $("#main_div, #icons_place , #address_map ").show(); 
    $("#products").css("display","block");
        var sectionId = $(this).attr("id");
        var page_value = $(this).attr('href');

       //$("#main_categ_name").html(`${sectionId.toUpperCase()}`)

     $("#select_owl, #new_goods, .new_goods_title, .place_area").css("display", "none");
     $("#hide_width_carousel").css("display", "none");
     $("#taze_haryt").css("display", "none");
            $("#call_page").show();
            $(".products_show, #main_cont").show();
           
            $("#icons_place , #address_map").hide();  
           
          $("#empty_cart").css("display", "none");       
      
        var pageToLoad = "pages/"+page_value+".php?time=" + new Date().getTime();
      
        $.ajax({
            url: pageToLoad,
            method: "POST",
            data: { bolum: sectionId },
            success: function(response) {
                $("#products").html(response);
               $("#cont_owl").hide();
                localStorage.setItem('loadedContent', response);
            },
            error: function(xhr, status, error) {
               // console.error("İçerik yükleme hatası:", error);
            }
        }); 
    });
    
});
