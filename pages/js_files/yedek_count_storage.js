$(document).ready(function () {
  $("#shopping-link").on("click", function () {
    if ($("#shopping-count").text().trim() === "0") {
      checkCartStatus();
    }
  });

  function checkCartStatus() {
    $("#order_table").hide();
    $("#ordered_table").html(
      '<div id="empty_cart" style="width: 100%; display: flex; justify-content: center; align-items: center;">' +
        '<img src="/pages/images/icons/empty.svg" alt="Empty Cart" height="250px" style="display: block;" />' +
        '<p class="font-weight-bold">Sebediniz boş!</p>' +
        "</div>"
    );
    var sebet = "SEBET";
    $(".call_page").html(`         
        <h2 class="metall_page_title">${sebet.toUpperCase()}</h2>        
    `);
    $("#ordered_table").show(); // Mesajı göster
    $("#prod_metall").hide(); // Mesajı göster
  }

  $("#order_table, #checkout-btn, #empty_cart").hide();

  $(document).on("click", "#shopping-link", function () {
    if ($("#shopping-count").text().trim() !== "0") {
      $("#sTable").hide();
      $(".prod_metall").hide();
      $("#boyaglar_page").hide();
      $(".card_text").hide();
      $("#order_table, #checkout-btn").show();
      loadTableData();
      localStorage.setItem("shoppingLinkClicked", "true");
    } else {
      $("#prod_metall, #sTable").remove();
      $("#prod_metall, #sTable").hide();
    }
  });

  var count = 0;
  loadTableData();
  calculateTotal();

  $("#sourceTable").on("click", ".add_card_metall", function (event) {
    event.preventDefault();

    var button = $(this);
    button.prop('disabled', true);
    button.css({'opacity': '0.3', 'cursor': 'not-allowed'});

    var row = $(this).closest("tr");
    var prod_id = row.find("td:eq(0)").text();
    var name = row.find("td:eq(1)").text();
    var meterPrice = parseFloat(row.find(".meter_price").text());
    var length = parseFloat(row.find(".metall_long").text());
    var quantity = parseFloat(row.find("input").val());

    var list_control = row.find(".get_list_control").text();
    var list_baha = parseFloat(row.find(".jemi").text().trim()) || 0;

    if (quantity <= 0) return;

    var totalForRow = 0;
    if (list_control == 'LIST') {
      meterPrice = Number(list_baha);
      totalForRow = Number(list_baha) * quantity;
    } else {
      totalForRow = list_baha * quantity;
    }

    $("#targetTable tbody").append(`
<tr>
  <td style="display:none">${prod_id}</td> 
  <td class="sebet_haryt_ady">${name}</td>
  <td>${meterPrice.toFixed(2)}</td>
  <td style="display:none">${length}</td>
  <td><input type="number" class="form-control metal_table_input" style="max-width:120px; width:100%; margin:auto;"   value="${quantity}" min="1"></td>
  <td>${totalForRow.toFixed(2)} manat</td>
  <td><i class="fas fa-trash delete-btn" style="fint-size:20px; color:#808080"></i></td>
</tr>
    `);

    updateTotalPrice();
    count++;
    updateCountDisplay();
    saveTableData();
  });

  $(".sebede_gosh").on("click", function (event) {
    var productCart = $(this).closest(".product_cart");
    let counter = localStorage.getItem("shoppingCount") | 1;
    let targetTableData = localStorage.getItem("targetTableData");
    targetTableData = targetTableData == 0 || targetTableData == null ? "" : targetTableData;
    var productName = productCart.find(".card-title").text().trim();
    var productPrice = productCart.find("h5").text().trim();
    var productId = productCart.find("code").text().trim();

    var productData = {
      name: productName,
      price: productPrice,
      productsId: productId,
    };

    targetTableData += `<tr>
    <td style="display:none">${productData?.productsId}</td> 
    <td class="sebet_haryt_ady">${productData?.name}</td>
    <td>${productData?.price}</td>
    <td style="display:none">${1}</td>
    <td><input type="number" class="form-control metal_table_input" style="max-width:120px; width:100%; margin:auto;" value="1" min="1"></td>
    <td></td>
    <td><i class="fas fa-trash delete-btn" style="fint-size:20px; color:#808080"></i></td>
</tr>`;
    localStorage.setItem("targetTableData", targetTableData);
    count++;
    event.preventDefault();
    updateCountDisplay();
  });

  $("#targetTable").on("click", ".delete-btn", function () {
    $(this).closest("tr").remove();
    updateTotalPrice();
    count--;
    if (count === 0) {
      checkCartStatus();
    }
    updateCountDisplay();
    saveTableData();
  });

  $("#targetTable").on("input", 'input[type="number"]', function () {
    updateTotalPrice();
    saveTableData();
  });

  $("#sourceTable").on("input", 'input[type="number"]', function () {
    calculateTotal();
  });

  function loadTableData() {
    var savedData = localStorage.getItem("targetTableData");
    if (savedData) {
      $("#targetTable tbody").html(savedData);
      updateTotalPrice();
      count = $("#targetTable tbody tr").length;
      updateCountDisplay();
    }
  }

  function saveTableData() {
    var tableData = $("#targetTable tbody").html();
    localStorage.setItem("targetTableData", tableData);
    localStorage.setItem("shoppingCount", count);
  }

  function updateTotalPrice() {
    var total = 0;
    $("#targetTable tbody tr").each(function () {
      var meterPrice = parseFloat($(this).find("td:eq(2)").text());
      var length = parseFloat($(this).find("td:eq(3)").text());
      var quantity = parseInt($(this).find("input").val(), 10);

      if (isNaN(meterPrice) || isNaN(length) || isNaN(quantity)) {
        return;
      }

      var totalForRow = meterPrice * quantity;
      $(this).find("td:eq(5)").text(totalForRow.toFixed(2) + " manat");
      total += totalForRow;
    });
    $("#totalSum, .totalSum").text(total.toFixed(2));
  }

  function calculateTotal() {
    var totalSum = 0;

    $("#sourceTable tbody tr").each(function () {
      var meterPrice = parseFloat($(this).find(".meter_price").text().trim()) || 0;
      var metallLong = parseFloat($(this).find(".metall_long").text().trim()) || 0;
      var quantity = parseInt($(this).find('input[type="number"]').val(), 10) || 0;
      var list_control = $(this).find(".get_list_control").text().trim();
      var list_baha = $(this).find(".list_baha").text().trim();

      if (list_control == 'LIST') {
        total = list_baha * quantity;
        totalSum += total;
        $(this).find(".jemi").text(total + " manat");
      } else {
        total = meterPrice * quantity;
        totalSum += total;
        $(this).find(".jemi").text(total + " manat");
      }
    });
  }

  function updateCountDisplay() {
    $("#shopping-count").text(count);
  }

  $("#clear_shop_cart").on("click", function () {
    localStorage.removeItem("targetTableData");
    localStorage.removeItem("shoppingLinkClicked");
    localStorage.removeItem("shoppingCart");
    localStorage.removeItem("shoppingCartCount");

    $("#order_table").css("display", "none");
    $("#sTable").css("display", "none");

    $("#targetTable tbody").empty();
    updateTotalPrice();
    count = 0;
    updateCountDisplay();

    var sebet = "SEBET";
    $(".call_page").html(`         
        <h2 class="metall_page_title">${sebet.toUpperCase()}</h2>        
    `);

    $("#ordered_table")
      .show()
      .html(
        '<div id="empty_cart" style="width: 100%; display: flex; justify-content: center; align-items: center;">' +
          '<img src="/pages/images/icons/empty.svg" alt="Empty Cart" height="250px" style="display: block;" />' +
          '<p class="font-weight-bold">Sebediniz boş!</p>' +
          "</div>"
      );
  });
});

//////////////////////////////////////


var button = $(this); // Tıklanan buton
button.prop('disabled', true); // Butonu devre dışı bırakıyoruz
button.css({'opacity': '0.3', 'cursor': 'not-allowed'}); // Stilini güncelliyoruz