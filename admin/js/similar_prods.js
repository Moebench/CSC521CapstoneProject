let data = JSON.parse($('#productArray').html());

$("#proRelatedProds").select2({
    placeholder: "Select Related Products (MAX 4)",
    maximumSelectionLength: 4,
    data: data,
    // allowClear: true,
	escapeMarkup: function(markup) {
		return markup;
	},
	templateResult: function(data) {
		const imgSrc = data.pro_images ? `../products_imgs/pro_${data.pro_id}/${data.pro_images.split('|||')[0]}` : '../img/logo-minichezsoi.png';
		const html = `<div class="sel2-list"><div style="font-weight: bold">${data.pro_name}</div><div><img src='${imgSrc}'><br />$${data.pro_price}</div></div>`;
		return html;
		// return data.pro_name;
	},
	templateSelection: function(data) {
		return data.pro_name;
	}
});