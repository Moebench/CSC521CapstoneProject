$(document).ready(function() {
    let table = $('#proList').DataTable({
    	"columnDefs": [
			{ "searchable": false, "targets": [7, 8, 10] },
			{ "sortable": false, "targets": 10 },
		],
		language: {
		    searchPlaceholder: "Search Product"
		},
    	"pagingType": "full_numbers",
    	rowReorder: true
    });

    table.on( 'row-reorder', function ( e, diff, edit ) {
        let changedRows = [];
        for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
            var rowData = table.row( diff[i].node ).data()
            changedRows.push({
            	rowId: $(diff[i].node).data('id'),
            	oldPosition: diff[i].oldData,
            	newPosition: diff[i].newData
            });
        }

        $.ajax({
			url: 'products_admin_process.php?do=row_reorder',
			type: 'POST',
			data: { changedRows: JSON.stringify(changedRows) },
			success: function(r_response){
				if(r_response == 'success_PSN'){
					$('#fRSpan').html('Rows Successfully Updated.');
					$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success').slideUp(3500);
				} else if(r_response == 'error_delete'){
					$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#fRSpan').html('Error while deleting Product.<br>Please try again.');
				}
			}
		});
    } );

    // new $.fn.dataTable.FixedHeader( table );

    $.fn.dataTable.ext.search.push(
	    function( settings, data, dataIndex ) {
	    	let stockOp = $("input[name='stock']:checked").val();
	        let stockColumn = data[9];

	        if ( (stockOp == "Yes" || stockOp == "No") && stockOp == stockColumn ) {
	            return true;
	        } else if(stockOp == "All") {
	            return true;
	        }
	        return false;
	    }
	);
    $("input[name='stock']").on('change', function() {
    	table.draw();
    });

    CKEDITOR.replace( 'pro_details' );
});

$('#add_product').submit(function(e){
	e.preventDefault();
	let emptyTextBoxes = $('#selectBoxContainer input').filter(function() {
	    return !this.value.trim();
	}).length;
	if(emptyTextBoxes) {
		$('html, body').animate({
	        scrollTop: $("#selectBoxContainer").offset().top
	    }, 1000);
		alert("You can't keep empty fields in selction box");
		return;
	}

	const totalUploadBoxes = $('#proFinishImages .kv-explorer').length;
	const totalImgPrivewBoxes = $('.f-img-cntnr').length; //For product Editing
	// const imgNumber = totalUploadBoxes + totalImgPrivewBoxes + 1;
	if(totalUploadBoxes) {
		if(!$('#proFinishImages .kv-explorer')[totalUploadBoxes-1].value) {
			$('html, body').animate({
		        scrollTop: $('#proFinishImages').offset().top
		    }, 1000);
			alert("First the Finish image number: "+(totalUploadBoxes+totalImgPrivewBoxes));
			return;
		}
	}

	$('#pro_add_submit_btn').html('Adding...<i class="fa fa-spin fa-spinner fa-lg"></i>');
	CKEDITOR.instances['proDetails'].updateElement();
	$.ajax({
		url: 'products_admin_process.php?do=add_new',
		type: 'POST',
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success: function(r_response){

			$('#pro_add_submit_btn').html('Add');
			if(r_response == 'success'){
				$('#add_product')[0].reset();
				CKEDITOR.instances['proDetails'].setData('');
				$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
				$('#fRSpan').html('Product Sucessfully Added.');
			} else if(r_response == 'UserAlreadyExist'){
				$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
				$('#fRSpan').html('This product already exist.<br>Please add another.');
			} else if(r_response == 'error'){
				$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
				$('#fRSpan').html('Error while adding product.<br>Please try again.');
			}
		}
	});
});

function editRowCat(row_no) {
	document.getElementById("edit_btn_"+row_no).style.display="none";
	document.getElementById("save_btn_"+row_no).style.display="block";

	var cat_name_html = $('#save_btn_'+row_no).parent().prev();

	cat_name_html.html("<input type='text' class='form-control' id='cat_name_html_txt_"+row_no+"' value='"+cat_name_html.html()+"'>");
}

function saveRowCat(row_no) {
	var cat_name_val = $('#cat_name_html_txt_'+row_no).val();

	if(cat_name_val.trim() == '') {
		$('#msgLblDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
		$('#msgLblSpan').html("Category name Can't be empty.<br>Please enter proper category name.");
		$('#cat_name_html_txt_'+row_no).focus();
		return false;
	} else {

		$.ajax({
			url: 'categories_admin_process.php?do=edit',
			type: 'POST',
			data: { catId: row_no, catName: cat_name_val },

			success: function(r_response){

				if (r_response == "success_edit") {
					$('#cat_name_html_txt_'+row_no).parent().html(cat_name_val);

					$('#msgLblDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
					$('#msgLblSpan').html("Category name successfully updated.");

					document.getElementById("edit_btn_"+row_no).style.display="block";
					document.getElementById("save_btn_"+row_no).style.display="none";
				} else if(r_response == 'UserAlreadyExist'){
					$('#add_product')[0].reset();
					$('#msgLblDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#msgLblSpan').html('This category already exist.<br>Please add another.');
				} else if (r_response == "error_edit") {
					$('#msgLblDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#msgLblSpan').html("Error in updating category name.<br>Please try again.");
					$('#cat_name_html_txt_'+row_no).focus();
				}
			}
		});
	}
}

function confirmProductDelete(proId){
	var result = confirm("Are you sure to delete this?\nThis can't be undone.");
	if (result) {
		var pro_id = proId;
		$.ajax({
			url: 'products_admin_process.php?do=delete_product',
			type: 'POST',
			data: { pro_id: pro_id },
			success: function(r_response){
				if(r_response == 'success_delete'){
					$('#pro_tr_'+pro_id).hide('slow');
					$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
					$('#fRSpan').html('Product Sucessfully Deleted.');
				} else if(r_response == 'error_delete'){
					$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#fRSpan').html('Error while deleting Product.<br>Please try again.');
				}
			}
		});
	}
}
