
let acc = document.getElementsByClassName("accordion");
let i;
for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
    });
}
function openTab(evt, tabName) {
    let tabcontent = document.querySelectorAll('.tabcontent');
    tabcontent.forEach(function (content) {
        content.classList.remove('active');
    });
    var tablinks = document.querySelectorAll('.tablinks');
    tablinks.forEach(function (link) {
        link.classList.remove('active');
    });
    document.getElementById(tabName).classList.add('active');
    evt.currentTarget.classList.add('active');
}
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.tablinks').click();
});

let mineImge = document.getElementById('mineImge')
let litle_images = document.getElementsByClassName('images')
litle_images[0].onclick = () => {
    mineImge.src = litle_images[0].src;
}
litle_images[1].onclick = () => {
    mineImge.src = litle_images[1].src;
}
litle_images[2].onclick = () => {
    mineImge.src = litle_images[2].src;
}
const add_basket = document.querySelector('.add_basket');
const product_amount = document.querySelector('.product-amount');
const counter = document.querySelector('.counter');
const faSolidLeft = document.querySelector('.fa-solid-left');
const faSolidRight = document.querySelector('.fa-solid-right');
add_basket.style.display = 'flex';
counter.style.display = 'none';
add_basket.addEventListener('click', function () {
    this.style.display = 'none';
    counter.style.display = 'flex';
    product_amount.style.display = 'block';
    product_amount.value = 1
});
faSolidLeft.addEventListener('click', function () {
    let currentValue = parseInt(product_amount.value, 10);

    if (!isNaN(currentValue) && currentValue > 0) {
        product_amount.value = currentValue - 1;
    }
    if (parseInt(product_amount.value, 10) <= 0) {
        counter.style.display = 'none';
        add_basket.style.display = 'flex';
    }
});
faSolidRight.addEventListener('click', function () {
    let currentValue = parseInt(product_amount.value, 10);

    if (!isNaN(currentValue)) {
        product_amount.value = currentValue + 1;
    }
    if (parseInt(product_amount.value, 10) > 0) {
        product_amount.style.display = 'block';
        add_basket.style.display = 'none';
    }
});

