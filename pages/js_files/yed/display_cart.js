$(document).ready(function() {
    var count = parseInt(localStorage.getItem('shoppingCartCount')) || 0;

    // Update shopping count display
    $("#shopping-count").text(count);

    // Function to reset cart after a period
    function resetCart() {
        localStorage.setItem('shoppingCartCount', 0);
        $("#shopping-count").text(0);
        localStorage.setItem('shoppingCart', JSON.stringify([])); // Reset cart as well
    }
    setTimeout(resetCart, 180000);

    // Handle adding items to the cart
    $(".add_card_metall").click(function (event) { 
        event.preventDefault();

        var $row = $(this).closest('tr');        
       
        var productName = $row.find('td[data-label="Haryt ady"]').text().trim();
        var productPrice = $row.find('td[data-label="Tonna bahasy"]').text().trim();
        var productLength = $row.find('td[data-label="Metr uzynlygy"]').text().trim();
        
        var quantity = parseInt($row.find('input[type="number"]').val(), 10) || 0;
        var productTotal = $row.find('td[data-label="Jemi (manat)"]').text().trim();

        var product = {
            prodName: productName,
            prodPrice: productPrice,
            prodLength: productLength,
            quantity: quantity,
            prodTotal: productTotal
        };
        var cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
        cart.push(product);
        localStorage.setItem('shoppingCart', JSON.stringify(cart));

        count++;
        $("#shopping-count").text(count);
        localStorage.setItem('shoppingCartCount', count); 

        $(this).addClass('disabled');
    });

    function displayCart() {
        var cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
        var $cartTableBody = $('#cartTable tbody');
        $cartTableBody.empty(); 
        
        cart.forEach(function(item) {
            var rowHtml = `<tr>
                <td>${item.prodName}</td>
                <td>${item.prodPrice}</td>
                <td>${item.prodLength}</td>
                <td>${item.quantity}</td>
                <td>${item.prodTotal}</td>
                <td><i class="fas fa-trash delete-btn" data-id="${item.id}"></i></td>
            </tr>`;
            $cartTableBody.append(rowHtml);
        });

        function deleteItem(id) {
            cart = cart.filter(item => item.id !== id);
            displayCart();
        }

        if (cart.length > 0) {
            $("#cartTable").show();
        } else {
            $("#cartTable").hide();
        }
    }

    $("#shopping-link").click(function (event) {
        event.preventDefault();
        localStorage.setItem('showCart', 'true');
        $("#cartTable").show();
        $(".prod_metall").hide();   
        $(".prod_table").hide();      
        displayCart();
    });

    if (localStorage.getItem('showCart') === 'true') {
        $("#cartTable").show();
        $(".prod_metall").hide();   
        $(".prod_table").hide();      
        displayCart();
        localStorage.removeItem('showCart');
    } else {
        $("#cartTable").hide();
    }
});
