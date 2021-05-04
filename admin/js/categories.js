$(document).ready(function() {
    $('#catList').DataTable({
		"aaSorting": [],
    	"columnDefs": [
			{ "searchable": false, "targets": 1 },
			{ "sortable": false, "targets": 1 },
		],
		language: {
		    searchPlaceholder: "Search Category"
		},
    	"pagingType": "full_numbers"
    });
});

$('#add_category').submit(function(e){
	$('#cat_add_submit_btn').html('Adding...<i class="fa fa-spin fa-spinner fa-lg"></i>');
	e.preventDefault();
	$.ajax({
		url: 'categories_admin_process.php?do=add_new',
		type: 'POST',
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success: function(r_response){

			$('#cat_add_submit_btn').html('Add');
			if(r_response == 'success'){
				$('#add_category')[0].reset();
				$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
				$('#fRSpan').html('Category Sucessfully Added.');
			} else if(r_response == 'UserAlreadyExist'){
				$('#add_category')[0].reset();
				$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
				$('#fRSpan').html('This category already exist.<br>Please add another.');
			} else if(r_response == 'error'){
				$('#add_category')[0].reset();
				$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
				$('#fRSpan').html('Error while adding category.<br>Please try again.');
			}
		}
	});
});

function editRowCat(row_no)
{
	document.getElementById("edit_btn_"+row_no).style.display="none";
	document.getElementById("save_btn_"+row_no).style.display="block";

	var cat_name_html = $('#save_btn_'+row_no).parent().prev();

	cat_name_html.html("<input type='text' class='form-control' id='cat_name_html_txt_"+row_no+"' value='"+cat_name_html.html()+"'>");
}

function saveRowCat(row_no)
{
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
					$('#add_category')[0].reset();
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