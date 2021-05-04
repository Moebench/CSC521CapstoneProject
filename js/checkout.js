$(document).ready(function(){
    let storedProducts = JSON.parse(localStorage.getItem("cart_products"));
    if(storedProducts) {
	    let grandTotal = 0;
		storedProducts.forEach(function (product) {
			let total = Number(product.itmPrice) * Number(product.itmQuantity);
		    grandTotal += total;
		    let newRow = `<tr>
	                    <td>${product.itmId}</td>
	                    <td>50</td>
	                    <td>${product.curDate}</td>
	                    <td>${product.curTime}</td>
	                    <td>${product.itmQuantityFraction}</td>
	                </tr>`;
	        $('#tblBody').append(newRow);
		});
		$('#grTotal').html(`$${grandTotal}`);
		$('#noProds').hide();
		$('#tblDiv').show();
    } else {
		$('#tblDiv').hide();
    	$('#noProds').show();
    }
});


$('#clrCart').on('click', function() {
	localStorage.removeItem("cart_products");
	$('#tblDiv').hide();
	$('#noProds').show();
	alert('Cart Cleared Successfully');
});