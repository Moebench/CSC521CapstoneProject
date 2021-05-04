$(document).ready(function() {
    $('#reviewsList').DataTable({
		"aaSorting": [],
    	"columnDefs": [
			{ "searchable": false, "targets": 3 },
			{ "sortable": false, "targets": 3 },
		],
		language: {
		    searchPlaceholder: "Search Review"
		},
    	"pagingType": "full_numbers"
    });

    $(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
});

function confirmReviewDelete(reviewId){
	var result = confirm("Are you sure to delete this?\nThis can't be undone.");
	if (result) {
		console.log("reviewId", reviewId);
		var review_id = reviewId;
		$.ajax({
			url: 'reviews_admin_process.php?do=delete_review',
			type: 'POST',
			data: { review_id: review_id },
			success: function(r_response){
				console.log("r_response", r_response);
				if(r_response == 'success_delete'){
					$('#rev_tr_'+review_id).hide('slow');
					$('#msgLblDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
					$('#msgLblSpan').html('Review Sucessfully Deleted.');
				} else if(r_response == 'error_delete'){
					$('#msgLblDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#msgLblSpan').html('Error while deleting Review.<br>Please try again.');
				}
			}
		});
	}
}