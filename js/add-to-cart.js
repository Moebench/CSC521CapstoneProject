$(document).ready(function() {
    // localStorage.removeItem("cart_products");
});
var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var curDate =
    ((''+month).length<2 ? '0' : '') + month + '/' +
    ((''+day).length<2 ? '0' : '') + day + '/' +
	d.getFullYear();

function formatAMPM(date) {
	var hours = date.getHours();
	var minutes = date.getMinutes();
	var ampm = hours >= 12 ? 'pm' : 'am';
	hours = hours % 12;
	hours = hours ? hours : 12; // the hour '0' should be '12'
	minutes = minutes < 10 ? '0'+minutes : minutes;
	var strTime = hours + ':' + minutes + ' ' + ampm;
	return strTime;
}

$('.buynow-btn').on('click', function() {

    let img = $(this).parent().parent().find('img').attr('src');

    let itmId = $(this).parent().find('.item-id').val();
    let itmNm = $(this).parent().find('.itm-name').html();

    let itmPrice = $(this).parent().find('.itm-price').html();

    let itmQuantity = $(this).parent().find('select.item-select').val();
    let itmQuantityFraction = $(this).parent().find('select.item-select').find(":selected").text();


    var products = [];

    let cur_product = {
        img,
        itmId,
        itmNm,
        itmPrice,
        itmQuantity,
        itmQuantityFraction,
        curDate,
        curTime: formatAMPM(new Date)
    }

    if ((localStorage.getItem('cart_products') && localStorage.getItem("cart_products") == "null") || !localStorage.getItem('cart_products')) {
        products.push(cur_product);
        localStorage.setItem("cart_products", JSON.stringify(products));
    } else {
        products = JSON.parse(localStorage.getItem("cart_products"));
        products.push(cur_product);
        localStorage.setItem("cart_products", JSON.stringify(products));
    }

    $(this).html('Added to cart').attr('disabled', 'disabled');
});