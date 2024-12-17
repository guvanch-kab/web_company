$(document).ready(function calculate() {
    $("#bylength")
      .removeClass("btn btn-outline-primary")
      .addClass("btn btn-primary");
    $("#byweight")
      .removeClass("btn btn-primary")
      .addClass("btn btn-outline-primary");
    $(".length_weight").text("Uzynlyk, m.");
    $(".netije").text("");
    // var  net_price=0;
    $("#size_metall, #lengthMetall").on("keyup change click", function () {
      $(".show_hide").show();
  
      var select_Size = $("#size_metall option:selected").val();
      var sale_Price = $("#size_metall option:selected").data("satys_baha_tm");
      var satysBaha = $(this).find(":selected").data("satys_baha_tm");
      var length_Metall = parseFloat($("#lengthMetall").val());
  
      if (isNaN(sale_Price)) {
      }
      else {
  
        $("#ton_Price").text(sale_Price + "  manat ");
        $("#result_metr").text("");
       
      }
      if (select_Size && !isNaN(select_Size) && sale_Price && !isNaN(sale_Price) && length_Metall &&  !isNaN(length_Metall) ) {
        if (select_Size <= 0) {
          console.error('Metal size cannot be zero.');
          return; // Handle zero size case
        }
  
        // Sadece inputlar doluysa hesapla
        var r = select_Size / 2 / 1000;
        r = Math.pow(r, 2);
        var hh = 3.14 * r * length_Metall * 7850;
        var t_ton = hh / 1000;
        var net_price = t_ton * Number(sale_Price);
        hh = hh.toFixed(2);
        t_ton = t_ton.toFixed(3);
        net_price = net_price.toFixed(2);
        
        $(".netije_kg").text(hh);
        $(".olceg_kg").text("Kg");
        $(".netije_ton").text(t_ton);
        $(".olceg_ton").text("Tonna");
        $("#net_Price").text(net_price + "  manat ");
      }
       else 
       {
        $("#result_metr").text("");
        $(".netije_kg, .olceg_kg, .netije_ton, .olceg_ton").empty();
      }
    });
    $("#bylength").click(function () {
      calculate();
      $(".netije_kg, .olceg_kg, .netije_ton, .olceg_ton, #result_metr").text("");
    });
  
    $("#byweight").click(function () {
      $("#bylength").removeClass("btn btn-primary")
        .addClass("btn btn-outline-primary");
      $("#byweight")
        .removeClass("btn btn-outline-primary")
        .addClass("btn btn-primary");
  
      $(".netije_kg, .olceg_kg, .netije_ton, .olceg_ton, #result_metr").text("");
      $(".length_weight").text("Agramy, kg(tonna).");
      $("#size_metall, #lengthMetall").off("keyup");
      // Yeni keyup event handler'ını ekle
      $("#size_metall, #lengthMetall").on("keyup change click", function () {
        $(".show_hide").hide();
        var select_Size = $("#size_metall option:selected").val();
        var sale_Price = $("#size_metall option:selected").data("satys_baha_tm");
        var length_Metall = parseFloat($("#lengthMetall").val());
  
        if (select_Size && !isNaN(select_Size) && sale_Price && !isNaN(sale_Price) && length_Metall &&  !isNaN(length_Metall) ) {
          if (select_Size <= 0) {
            console.error('Metal size cannot be zero.');
            return; // Handle zero size case
          }
         
          $(".show_hide").hide();
          var rad = select_Size / 2 / 1000;
          rad = Math.pow(rad, 2);
          var dd = length_Metall / (3.14 * rad * 7850);
          var net_price = (length_Metall / 1000) * sale_Price;
          $("#net_Price").text(net_price + "  manat ");
  
          $("#result_metr").text(dd.toFixed(0) + "  metr ");
        } else {
          $("#result_metr").text("");
          $("#net_Price").text(0);
        }
      });
    });
  });
  