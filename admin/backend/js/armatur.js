$(document).ready(function () {
  $("#armatur").change(function () {
    var selectedYurt = $(this).val();
    $.ajax({
      url: "backend/get_size_metall.php",
      type: "POST",
      data: { armatur: selectedYurt },
      dataType: "json",
      success: function (response) {
        $("#arm_metall").empty();
        console.log("Response:", response); // Debugging: log the response
        $("#arm_metall").append(
          '<option selected="true" disabled="disabled">Ölçeg</option>'
        );
        $.each(response, function (key, degisken) {

          $("#arm_metall").append(
            '<option value="' + key + '" data-metr_agramy="' + degisken.metr_agramy + '"  data-aciklama="' + degisken.aciklama +  '" data-satys_baha="' + degisken.satys_baha +  '"  >' + degisken.aciklama + "</option>" );
           // '<option value="' + key + '">' + item.ady + "</option>" );  
      
          });
      },
    });
  });

  $(".show_hide").show();
  calculate();

  $("#bylength").click(function () {
    calculate();
  });

  $("#byweight").click(function () {
    setUpByWeight();
  });

  function calculate() {
    $("#bylength").removeClass("btn btn-outline-primary").addClass("btn btn-primary");
    $("#byweight").removeClass("btn btn-primary").addClass("btn btn-outline-primary");
    $(".length_weight").text("Uzynlyk, metr.");
    // $(".netije").text("");
    $("#result_metr").text("");

    $("#arm_metall, #lengthMetall").off("keyup change click").on("keyup change click", function () {
        $(".show_hide").show();

       // var satys_baha = parseFloat($("#arm_metall option:selected").val());
       var satys_baha = parseFloat($("#arm_metall option:selected").data("satys_baha"));
        var metr_agramy = parseFloat($("#arm_metall option:selected").data("metr_agramy"));
        var length_Metall = parseFloat($("#lengthMetall").val());

        if (
          !isNaN(satys_baha) && !isNaN(metr_agramy) && !isNaN(length_Metall)) {

          $("#ton_Price").text(satys_baha + "  manat ");
          var arm_kg = metr_agramy * length_Metall;
          var t_ton = arm_kg / 1000;
          var net_price = (arm_kg / 1000) * satys_baha;
          t_ton = t_ton.toFixed(4);
          net_price = net_price.toFixed(2);

          $(".netije_kg").text(arm_kg.toFixed(2));
          $(".olceg_kg").text("Kg");
          $(".netije_ton").text(t_ton);
          $(".olceg_ton").text("tonna");
          $("#net_Price").text(net_price + " manat ");
          
        } else {
          $(".netije_kg, .olceg_kg, .netije_ton, .olceg_ton").empty();
        }
      });
  }

  function setUpByWeight() {
    $("#bylength")
      .removeClass("btn btn-primary")
      .addClass("btn btn-outline-primary");
    $("#byweight")
      .removeClass("btn btn-outline-primary")
      .addClass("btn btn-primary");

    $(".netije_kg, .olceg_kg, .netije_ton, .olceg_ton, #result_metr").text("");
    $(".length_weight").text("Agramy, kg(tonna).");
    $("#lengthMetall").val(1);
    $("#net_Price").text("");

    $("#arm_metall, #lengthMetall").off("keyup change click").on("keyup change click", function () {
        $(".show_hide").hide();

        var satys_baha = parseFloat($("#arm_metall option:selected").data("satys_baha"));
        var metr_agramy = parseFloat(
          $("#arm_metall option:selected").data("metr_agramy")
        );
        var length_Metall = parseFloat($("#lengthMetall").val());

        if (
          !isNaN(satys_baha) &&
          !isNaN(metr_agramy) &&
          !isNaN(length_Metall)
        ) {
          $("#ton_Price").text(satys_baha + "  manat ");
          var arm_length = length_Metall / metr_agramy;
          var t_ton = length_Metall / 1000;
          var net_price = t_ton.toFixed(4) * satys_baha;
          arm_length = arm_length.toFixed(2);

          $("#result_metr").text(arm_length + " metr ");
          $("#net_Price").text(net_price.toFixed(2) + " manat ");

        } else {
          $("#result_metr").text("");
        }
      });
  }
});
