$(document).ready(function() {
    $('#manuList').DataTable({
		"aaSorting": [],
    	"columnDefs": [
			{ "searchable": false, "targets": 1 },
			{ "sortable": false, "targets": 1 },
		],
		language: {
		    searchPlaceholder: "Search Manufacturer"
		},
    	"pagingType": "full_numbers"
    });
});

$('#add_manufacturer').submit(function(e){
	$('#manu_add_submit_btn').html('Adding...<i class="fa fa-spin fa-spinner fa-lg"></i>');
	e.preventDefault();
	$.ajax({
		url: 'manufacturers_admin_process.php?do=add_new',
		type: 'POST',
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success: function(r_response){
			$('#manu_add_submit_btn').html('Add');
			if(r_response == 'success'){
				$('#add_manufacturer')[0].reset();
				$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
				$('#fRSpan').html('Manufacturer Sucessfully Added.');
			} else if(r_response == 'UserAlreadyExist'){
				$('#add_manufacturer')[0].reset();
				$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
				$('#fRSpan').html('This manufacturer already exist.<br>Please add another.');
			} else if(r_response == 'error'){
				$('#add_manufacturer')[0].reset();
				$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
				$('#fRSpan').html('Error while adding manufacturer.<br>Please try again.');
			}
		}
	});
});

function editRowManu(row_no)
{
	document.getElementById("edit_btn_"+row_no).style.display="none";
	document.getElementById("save_btn_"+row_no).style.display="block";

	var manu_name_html = $('#save_btn_'+row_no).parent().prev();

	manu_name_html.html("<input type='text' class='form-control' id='manu_name_html_txt_"+row_no+"' value='"+manu_name_html.html()+"'>");
}

function saveRowManu(row_no)
{
	var manu_name_val = $('#manu_name_html_txt_'+row_no).val();

	if(manu_name_val.trim() == '') {
		$('#msgLblDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
		$('#msgLblSpan').html("Manufacturer name Can't be empty.<br>Please enter proper manufacturer name.");
		$('#manu_name_html_txt_'+row_no).focus();
		return false;
	} else {

		$.ajax({
			url: 'manufacturers_admin_process.php?do=edit',
			type: 'POST',
			data: { manuId: row_no, manuName: manu_name_val },

			success: function(r_response){
				if (r_response == "success_edit") {
					$('#manu_name_html_txt_'+row_no).parent().html(manu_name_val);

					$('#msgLblDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
					$('#msgLblSpan').html("Manufacturer name successfully updated.");

					document.getElementById("edit_btn_"+row_no).style.display="block";
					document.getElementById("save_btn_"+row_no).style.display="none";
				} else if(r_response == 'UserAlreadyExist'){
					$('#add_manufacturer')[0].reset();
					$('#msgLblDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#msgLblSpan').html('This manufacturer already exist.<br>Please add another.');
				} else if (r_response == "error_edit") {
					$('#msgLblDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#msgLblSpan').html("Error in updating manufacturer name.<br>Please try again.");
					$('#manu_name_html_txt_'+row_no).focus();
				}
			}
		});
	}
}