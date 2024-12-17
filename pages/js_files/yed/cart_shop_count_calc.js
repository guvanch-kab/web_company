
$(document).ready(function () {
    calculateTotal();
    $('input[type="number"]').on('input', function () {
        calculateTotal();
    });
});
function calculateTotal() {
    var totalSum = 0;
    $('tbody tr').each(function () {           
      
        var $row = $(this);

        var tonPriceText = $row.find('.ton_price').text().trim();
        var tonPrice = parseFloat(tonPriceText) || 0; 

        var meterPriceText = $row.find('.meter_price').text().trim();
        var meterPrice = parseFloat(meterPriceText) || 0;

        var metallLongText = $row.find('.metall_long').text().trim();
        var metallLong = parseFloat(metallLongText) || 0;

        var quantity = parseInt($row.find('input[type="number"]').val(), 10) || 0;
        var total = meterPrice * metallLong * quantity;
        totalSum += total;
        var formattedTotal = formatNumber(total);
        $row.find('.jemi').text(formattedTotal + ' manat');
    });
}
function formatNumber(num) {
    return num.toLocaleString('tr-TR').replace(/,/g, '.');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function() {
    // Yerel depolamadan sepet sayısını al ve göster
    let count = localStorage.getItem('shoppingCartCount') || 0;
    $("#shopping-count").text(count);

    // Sepet sıfırlama işlevini tanımla
    function resetCart() {
        localStorage.setItem('shoppingCartCount', 0);
        $("#shopping-count").text(0);
    }
    // Sepeti 1 dakika sonra sıfırla
    setTimeout(resetCart, 3600000); // 60000 ms = 1 dakika

    $(".add_card_metall").click(function (event) { 
        event.preventDefault();
       
        count++;
        $("#shopping-count").text(count);

        localStorage.setItem('shoppingCartCount', count); 
        $(this).addClass('disabled');
    });
    $("#shopping-link").click(function () { 
      
    });
});

