$(document).ready(function(){
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    CKEDITOR.replace( 'pro_details' );

    $('#uploadFileName').html() ? $("#pdfDelBtn").removeClass("dis-none") : $("#pdfDelBtn").addClass("dis-none");
});
function confirmDelete(img_nm_fn, box_id){
    var result = confirm("Are you sure to delete this?\nThis can't be undone.");
	if (result) {
		var pro_id = $('#productId').val();
		var img_nm = img_nm_fn;
		$.ajax({
			url: 'products_admin_process.php?do=delete_image',
			type: 'POST',
			data: { pro_id: pro_id, img_nm: img_nm },
			success: function(r_response){
				if(r_response == 'success_delete'){
					$('.img-lbl').each(function() {
						const thisId = $(this).data('id');
						if(thisId > box_id){
							thisId == 1 ? $("label[data-id='" + thisId +"']").html(`Image No: 1 <small>(If you will delete this image, than the second image will become first)</small>`).attr('data-id', (thisId-1)) : $("label[data-id='" + thisId +"']").html(`Image No: ${thisId} <small>(This is part of the below slider)</small>`).attr('data-id', (thisId-1));
						}
					});
					$('#colBox'+box_id).hide('slow', function(){ $('#colBox'+box_id).remove(); });
					$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
					$('#fRSpan').html('Image Sucessfully Deleted.');
				} else if(r_response == 'error_delete'){
					$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#fRSpan').html('Error while deleting Image.<br>Please try again.');
				}
			}
		});
	}
}

function confirmDeletePDF(pro_id){
    var result = confirm("Are you sure to delete this?\nThis can't be undone.");
	if (result) {
		$.ajax({
			url: 'products_admin_process.php?do=delete_pdf',
			type: 'POST',
			data: { pro_id },
			success: function(r_response){
				if(r_response == 'success_delete'){
					$('#pdfBtnText').html('Choose File...');
					$('#uploadFileName').html('');
					$("#pdfDelBtn").addClass("dis-none");
					$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
					$('#fRSpan').html('PDF Sucessfully Deleted.');
				} else if(r_response == 'error_delete'){
					$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#fRSpan').html('Error while deleting PDF.<br>Please try again.');
				}
			}
		});
	}
}

function confirmDeleteGIF(pro_id){
    var result = confirm("Are you sure to delete this?\nThis can't be undone.");
	if (result) {
		$.ajax({
			url: 'products_admin_process.php?do=delete_gif',
			type: 'POST',
			data: { pro_id },
			success: function(r_response){
				if(r_response == 'success_delete'){
					$('#pdfBtnText').html('Choose File...');
					$('#uploadFileName').html('');
					$("#pdfDelBtn").addClass("dis-none");
					$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
					$('#fRSpan').html('GIF Sucessfully Deleted.');
				} else if(r_response == 'error_delete'){
					$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#fRSpan').html('Error while deleting GIF.<br>Please try again.');
				}
			}
		});
	}
}

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

	$('#pro_update_submit_btn').html('Updating...<i class="fa fa-spin fa-spinner fa-lg"></i>');
	$.ajax({
		url: 'products_admin_process.php?do=edit',
		type: 'POST',
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success: function(r_response){
			$('#pro_update_submit_btn').html('Update');
			if(r_response == 'success_edit'){
				// $('#add_product')[0].reset();
				$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
				$('#fRSpan').html('Product Sucessfully Updated.');
			} else if(r_response == 'error_edit'){
				// $('#add_product')[0].reset();
				$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
				$('#fRSpan').html('Error while updating product.<br>Please try again.');
			}
		}
	});
});

$('#uploadFileName').on('DOMSubtreeModified', function(){
  	$(this).html() ? $("#pdfDelBtn").removeClass("dis-none") : $("#pdfDelBtn").addClass("dis-none");
})

var proId, imgName, imgSrc, curImgName, finishImages, newFinishImages, imgIndex;

function updateFEImage(btnEle) {
	imgName = $(btnEle).attr('data-img-name').trim();
	imgSrc = $(btnEle).attr('data-img-src');
	imgIndex = $(btnEle).attr('data-img-index');
	finishImages = $(btnEle).attr('data-finish-images');
	proId = $(btnEle).attr('data-pro-id');
	$('#fImgName').val(imgName);
	$('#fImgSrc').attr('src', '../products_finish_imgs/pro_'+proId+'/'+imgSrc);
	$('#editFinshImgModal').modal('show');
}

function deleteEFImg(btnEle) {
	let delFImg = confirm("Are you sure to delete this?\nThis can't be undone.");
	if(delFImg) {
		imgSrc = $(btnEle).attr('data-img-src');
		imgIndex = $(btnEle).attr('data-img-index');
		finishImages = $(btnEle).attr('data-finish-images');
		let fImages = JSON.parse(finishImages);
		fImages.splice(imgIndex, 1);
		proId = $(btnEle).attr('data-pro-id');

		newFinishImages = JSON.stringify(fImages);

		let data = {
			"proId": proId,
			"fImages": newFinishImages,
			"fOldImage": imgSrc
		}

		$.ajax({
            url: 'products_admin_process.php?do=delete_finish_image',
            type: 'POST',
            data: data,
            cache: false,
            success: function(r_response){
				if(r_response == 'success_delete'){
					let totalFImgBoxes = $('.f-img-cntnr').length;
					if(imgIndex < totalFImgBoxes-1) {
						for(let i = imgIndex; i<totalFImgBoxes; i++) {
							$('#fImgBox'+i+' .img-lbl i').html(i);
						}
					}
					$('#fImgBox'+imgIndex).remove();
					$('.cstm-fImg-btn').attr('data-finish-images', newFinishImages);
					$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
					$('#fRSpan').html('Image Details Sucessfully Deleted.');
				} else if(r_response == 'error_delete'){
					$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#fRSpan').html('Error while deleting Image Details.<br>Please try again.');
				}
			}
        });
	}
}

function checkUpdates() {
	$('#saveFIBtn').html('Updating...<i class="fa fa-spin fa-spinner fa-lg"></i>').attr('disabled', 'disabled');
	curImgName = $('#fImgName').val().trim();

	let newImageName = $('input[name="fImg_update"]')[0].files[0] && $('input[name="fImg_update"]')[0].files[0].name;
	if(newImageName || curImgName !== imgName) {
		let fImages = JSON.parse(finishImages);
		fImages[imgIndex] = {
			"imageDisplayName": newImageName ? capitalize(newImageName) : capitalize(curImgName),
			"imageName": newImageName ? newImageName : imgSrc
		}

		newFinishImages = JSON.stringify(fImages);

		let fd = new FormData();

        fd.append( "proId", proId);
        fd.append( "fImages", newFinishImages);

        if(newImageName) {
        	fd.append( "fNewImage", $('input[name="fImg_update"]')[0].files[0]);
        	fd.append( "fOldImage", imgSrc);
        }

        $.ajax({
            url: 'products_admin_process.php?do=update_finish_image',
            type: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            success: function(r_response){
				if(r_response == 'success_update'){
					$('.cstm-fImg-btn').attr('data-finish-images', newFinishImages);
					$('#fImgBox'+imgIndex+' .img-lbl span').html(newImageName ? capitalize(newImageName) : capitalize(curImgName));
					if(newImageName) {
						let newImgSrc = '../products_finish_imgs/pro_'+proId+'/'+newImageName;
						$('#fImgBox'+imgIndex+' .thumbnail').attr('href', newImgSrc);
						$('#fImgBox'+imgIndex+' .finish-img').attr('src', newImgSrc);
					}
					$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
					$('#fRSpan').html('Image Details Sucessfully Updated.');
				} else if(r_response == 'error_update'){
					$('#fRDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
					$('#fRSpan').html('Error while updating Image Details.<br>Please try again.');
				}
				$('#saveFIBtn').html('Save Changes').removeAttr('disabled');
				$('#editFinshImgModal').modal('hide');
			}
        });
	} else {
		$('#fRDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
		$('#fRSpan').html('There is no changes to update.');
		$('#saveFIBtn').html('Save Changes').removeAttr('disabled');
		$('#editFinshImgModal').modal('hide');
	}
}

$('#collapseFinishImg').on('show.bs.collapse', function () {
	addMoreFinishImg()
});

function capitalize(s) {
  if (typeof s !== 'string') return ''
  return s.charAt(0).toUpperCase() + s.slice(1)
}