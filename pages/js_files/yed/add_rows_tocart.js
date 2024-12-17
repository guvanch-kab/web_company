$(".add_card_metall").click(function (event) { 
    event.preventDefault();

    // Get the closest row
    var $row = $(this).closest('tr');
    
    // Get product details from the row
    var productCode = $row.find('td[data-label="Kody"]').text().trim();
    var productName = $row.find('td[data-label="Haryt ady"]').text().trim();
    var quantity = parseInt($row.find('input[type="number"]').val(), 10) || 0;

    // Create product object
    var product = {
        code: productCode,
        name: productName,
        quantity: quantity
    };

    // Retrieve existing cart from localStorage
    var cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];

    // Add the new product to the cart
    cart.push(product);

    // Save the updated cart to localStorage
    localStorage.setItem('shoppingCart', JSON.stringify(cart));

    // Update cart count
    count++;
    $("#shopping-count").text(count);
    localStorage.setItem('shoppingCartCount', count); 
    
    $(this).addClass('disabled');
});
