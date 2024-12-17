$(document).ready(function () {
  $("#shopping-link").on("click", function () {
    if ($("#shopping-count").text().trim() === "0") {
     
      checkCartStatus();
    }
  });

  function checkCartStatus() {
    $("#order_table").hide();
    $("#products").html(
      '<div id="empty_cart" style="width: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">' +
        '<img src="/pages/images/icons/empty.svg" alt="Empty Cart" height="250px" style="display: block;" />' +
        '<p class="font-weight-bold">Sebediniz boş!</p>' +
      "</div>"
    );
    var sebet = "SEBET";
    $(".call_page").html(`         
        <h2 class="metall_page_title">${sebet.toUpperCase()}</h2>        
    `);
    $("#ordered_table").show(); 
    $("#prod_metall").hide(); 
  }

  $("#order_table, #checkout-btn, #empty_cart").hide();

  $(document).on("click", "#shopping-link", function () {

    if ($("#shopping-count").text().trim() !== "0") {
      $("#sTable").hide();
      $(".prod_metall").hide();
      $("#boyaglar_page").hide();
      $(".card_text").hide();
      $("#order_table, #checkout-btn").show();
      //console.log($("#order_table").length);
      // localStorage'da bayrak ayarla
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

    var button = $(this); // Tıklanan buton
    button.prop('disabled', true); // Butonu devre dışı bırakıyoruz
    button.css({'opacity': '0.3', 'cursor': 'not-allowed'}); // Stilini güncelliyoruz


    var row = $(this).closest("tr");
    var prod_id = row.find("td:eq(0)").text();
    var name = row.find("td:eq(1)").text();
    var meterPrice = parseFloat(row.find(".meter_price").text());
    var length = parseFloat(row.find(".metall_long").text());
    var quantity = parseFloat(row.find("input").val());
   
    var list_control = (row.find(".get_list_control").text());
    var list_baha=parseFloat(row.find(".jemi").text().trim())||0;

    if (quantity <= 0) return;

      if(list_control=='LIST') {    
                                       // /////////////////////////////////////   LIST CONTROL  /////////////////////////////////////////////////
          meterPrice = Number(list_baha/quantity);//* quantity //* metallLong;
          var totalForRow =Number(list_baha) * quantity //* length;
    }
else
{
     totalForRow = list_baha * quantity //* length;
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
  ////////////////////////////////////////////////////////  add PAINT shooping////////////////
  //$(".sebede_gosh").on("click", function (event) {
    $(document).off("click", ".sebede_gosh").on("click", ".sebede_gosh", function (event) {

    

event.preventDefault()

    var productCart = $(this).closest(".product_cart, .product_cart2");
    let counter = localStorage.getItem("shoppingCount") | 1;

    let targetTableData = localStorage.getItem("targetTableData");
    targetTableData =targetTableData == 0 || targetTableData == null ? "" : targetTableData;

    var productName = productCart.find(".card-title").text().replace("Product: ", "").trim();

    var productPrice = productCart.find("h5").text().trim(); 
    var productId = productCart.find("code").text().trim();  //  PRODUCTS_ID

    var single_prod_name = productCart.find(".single_prod_name").text().trim();
    var price_item = productCart.find(".price_item").text().trim();
    var item_quantity = productCart.find(".item_quantity").val();

    var quantity_price_item = productCart.find(".quantity_price_item").text().trim();

    var single_prod_id = productCart.find(".single_prod_id").text().trim();
    
    console.log(productId)
    // JSON nesnesi oluştur

    var productData = {
      name: productName,
      price: productPrice,
      productsId: productId,

      single_productsId: single_prod_id,
      get_single_prod:single_prod_name,
      get_price_item:price_item,
      item_quantity:item_quantity,
      quantity_price_item:quantity_price_item,
    };

    targetTableData += `<tr>
 
    <td style="display:none">${productData?.productsId ? productData?.productsId : productData?.single_productsId}</td>
    <td class="sebet_haryt_ady">${productData?.name ? productData?.name : productData?.get_single_prod}</td>
    <td class="sebet_haryt_ady">${productData?.price ? productData?.price : productData?.quantity_price_item}</td>
    <td style="display:none">${1}</td>

    <td><input type="number" class="form-control metal_table_input" style="max-width:120px; width:100%; margin:auto;" value="${item_quantity ? item_quantity : 1}" min="1"></td>



    <td></td>
    <td><i class="fas fa-trash delete-btn" style="fint-size:20px; color:#808080"></i></td>
</tr>`;





    localStorage.setItem("targetTableData", targetTableData);
    count++;
    event.preventDefault();
    updateCountDisplay();
    //saveTableData();
  });
  /////////////////////////////////////////////////////////////////////////////////////////

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

  // Tablodaki 'input' değer değişimini dinle (hedef tablo)
  $("#targetTable").on("input", 'input[type="number"]', function () {
    updateTotalPrice();
    saveTableData();
  });

  // Tablodaki 'input' değer değişimini dinle (kaynak tablo)
  $("#sourceTable").on("input", 'input[type="number"]', function () {
    calculateTotal();
  });

  // localStorage'dan verileri yükle
  function loadTableData() {
    var savedData = localStorage.getItem("targetTableData");
    if (savedData) {
      $("#targetTable tbody").html(savedData);
      updateTotalPrice();
      count = $("#targetTable tbody tr").length;
      updateCountDisplay();
    }
  }

  // Tabloyu localStorage'a kaydet
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
        return; // Değerlerden biri NaN ise atla
      }

      var totalForRow = meterPrice * quantity //* length 
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
      var list_control=($(this).find(".get_list_control").text().trim());
      var list_baha=($(this).find(".list_baha").text().trim());

      if(list_control=='LIST') {      
                                // /////////////////////////////////////   LIST CONTROL  /////////////////////////////////////////////////
          total = list_baha * quantity //* metallLong;
              totalSum += total;
                   var formattedTotal = total;
         $(this).find(".jemi").text(formattedTotal.toFixed(2) + " manat");

    }
  else{
      var total = meterPrice * quantity //*metallLong ;
      totalSum += total;
      var formattedTotal = total;
      $(this)
        .find(".jemi")
        .text(formattedTotal.toFixed(2) + " manat");

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

    // console.log($('#ordered_table').length); // Element sayfada var mı?
    // console.log($('#ordered_table').is(':visible')); // Element görünür mü?
    $("#prod_metall").remove();
    var sebet = "SEBET";
    $(".call_page").html(`         
        <h2 class="metall_page_title">${sebet.toUpperCase()}</h2>        
    `);

    $("#products")
      .show()
      .html(
        '<div id="empty_cart" style="width: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">' +
    '<img src="/pages/images/icons/empty.svg" alt="Empty Cart" height="250px" style="display: block;" />' +
    '<p class="font-weight-bold">Sebediniz boş!</p>' +
  "</div>"
      );
  });
});
