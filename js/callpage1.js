const products=[
{name:'shirt', price:30},
{name:'hat', price:25}
];
function loadProducts(){
    $("#products").empty();
    for(const product of products){
        const html=$("#product_template").tmpl(product);
        $("#products").append(html);
    }
}