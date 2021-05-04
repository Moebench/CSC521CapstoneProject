$(document).ready(function(){
	updateTbl();
});

function updateTbl() {
	$('#tblBody').html('');
	let storedProducts = JSON.parse(localStorage.getItem("cart_products"));
    if(storedProducts.length) {
	    let grandTotal = 0;
		storedProducts.forEach(function (product) {
			let total = Number(product.itmPrice) * Number(product.itmQuantity);
		    grandTotal += total;
		    let newRow = `<tr data-id="${product.itmId}">
	                    <td>${product.itmNm}</td>
	                    <td><img src="${product.img}"></td>
	                    <td>$${product.itmPrice}</td>
	                    <td>${product.itmQuantityFraction}</td>
	                    <td>$${total}</td>
	                    <td>
	                    	<button class="button button3 delBtn">Delete</button>
	                    	<button class="button button2 editBtn">Edit</button>
	                    	<select class="item-select disp-none">
			                    <option value="0.25" ${product.itmQuantity == 0.25 ? 'selected' : ''}> 1/4 lbs</option>
			                    <option value="0.5" ${product.itmQuantity == 0.5 ? 'selected' : ''}> 1/2 lbs</option>
			                    <option value="0.75" ${product.itmQuantity == 0.75 ? 'selected' : ''}> 3/4 lbs</option>
			                    <option value="1" ${product.itmQuantity == 1 ? 'selected' : ''}> 1 lbs</option>
			                </select>
	                    </td>
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
}


// $('#clrCart').on('click', function() {
	// localStorage.removeItem("cart_products");
	// $('#tblDiv').hide();
	// $('#noProds').show();
	// alert('Cart Cleared Successfully');
// });

function clearCart() {
	localStorage.removeItem("cart_products");
	$('#tblDiv').hide();
	$('#noProds').show();
	alert('Cart Cleared Successfully');
}

$(document).on('change', '.item-select',  function() {
	let prTr = $(this).parent().parent();
	let prId = $(prTr).data('id');
	let storedProducts = JSON.parse(localStorage.getItem("cart_products"));
	let obj = storedProducts.find(f=>f.itmId == prId);
	if(obj) {
	  obj.itmQuantity=$(this).val();
	  obj.itmQuantityFraction=$(this).find(":selected").text();
	  // obj.itmQuantityFraction=[2,3,4];
	}
	localStorage.setItem("cart_products", JSON.stringify(storedProducts));
	$(this).hide();
	alert('Item Updated Successfully');
	updateTbl();
	// console.log(foo);
});
$(document).on('click', '.editBtn',  function() {
	$(this).next().show();
});

$(document).on('click', '.delBtn',  function() {
	let prTr = $(this).parent().parent();
	let prId = $(prTr).data('id');
    $(prTr).hide();
	alert('Item Deleted Successfully');

	let updatedStoredItems = JSON.parse(localStorage.getItem("cart_products")).filter(item => item.itmId != prId);

	if(!updatedStoredItems.length) {
		clearCart();
	} else {
	    localStorage.setItem("cart_products", JSON.stringify(updatedStoredItems));
		updateTbl();
	}

	// localStorage.removeItem("cart_products");
	// $('#tblDiv').hide();
	// $('#noProds').show();
	// alert('Cart Cleared Successfully');
});