var instanceOne;
$(document).ready(function() {
    instanceOne = CKEDITOR.replace('an_msg', {
      extraPlugins: 'colorbutton'
    });

    instanceOne.on('change', function() {
	    $('#previewArea').html(instanceOne.getData());
	});

    $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            defaultValue: $(this).attr('data-defaultValue') || '',
            format: $(this).attr('data-format') || 'hex',
            keywords: $(this).attr('data-keywords') || '',
            inline: $(this).attr('data-inline') === 'true',
            letterCase: $(this).attr('data-letterCase') || 'lowercase',
            opacity: $(this).attr('data-opacity'),
            position: $(this).attr('data-position') || 'bottom',
            swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
            change: function(value, opacity) {
                setBG(value);
                // if (!value) return;
                // if (opacity) value += ', ' + opacity;
                // if (typeof console === 'object') {
                //     // console.log(value);
                // }
            },
            theme: 'bootstrap'
        });
    });
});

function setBG(color) {
	$('#previewArea').css('background-color', color);
	// CKEDITOR.instances['an_msg']
	// console.log("CKEDITOR.instances['an_msg']", CKEDITOR.instances['an_msg']);
	// console.log("CKEDITOR.instances['an_msg']", CKEDITOR.instances['an_msg'].document);
	// console.log("color", color);

	// CKEDITOR.instances['an_msg'].getDocument().getBody().setStyle("background-color", "red");

	// CKEDITOR.instances.editor1.document.getBody().setStyle('background-color', 'red');

	// console.log("instanceOne", instanceOne);
	// CKEDITOR.document.getWindow().setStyle('background-color', 'red');
	// console.log("instanceOne.document", instanceOne.a);
	// let ceBody = CKEDITOR.document.getBody();
	// console.log("ceBody", ceBody);
	// console.log("ceBody.getName()", ceBody.getName());
	// console.log("CKEDITOR.dom.document", CKEDITOR.dom.document);
	// CKEDITOR.instances.formFieldIdName.document.$.childNodes[1].style.backgroundColor = 'Blue'
	// ceBody.style.backgroundColor = 'red';
	// $('#an_msg').ckeditorGet().addCss('body { background-color:'+color+'; }')
	// ceBody.style('body { background-color:'+color+'; }')
	// CKEDITOR.style('body { background-color:'+color+'; }')
	// console.log("color", color);
 //    console.log("setBG");
 //    CKEDITOR.on('instanceReady', function(e) {
 //        console.log("instanceReady");
 //        // First time
 //        e.editor.document.getBody().setStyle('background-color', color);
 //    });
}

let proUrl = $('#isFS').val() ? 'free_shipping_admin_process.php' : 'announcement_admin_process.php';

$('#anUpdate').submit(function(e) {
    e.preventDefault();
    let an_msg = CKEDITOR.instances['an_msg'].getData();
    let an_status = $('input[name="an_status"]:checked').length;
    let an_msg_bg_color = $('input[name="an_msg_bg_color"]').val();
    let data = {
        an_msg,
        an_status,
        an_msg_bg_color
    }
    $('#an_update_submit_btn').html('Updating...<i class="fa fa-spin fa-spinner fa-lg"></i>');
    $.ajax({
        url: proUrl,
        type: 'POST',
        data: data,
        success: function(r_response) {
            $('#an_update_submit_btn').html('Update');
            if (r_response == 'success_edit') {
                $('#msgLblDiv').slideUp().slideDown().removeClass('alert-danger').addClass('alert-success');
                $('#msgLblSpan').html('Announcement Message Successfully Updated.');
            } else if (r_response == "error_edit") {
                $('#msgLblDiv').slideUp().slideDown().removeClass('alert-success').addClass('alert-danger');
                $('#msgLblSpan').html("Error in updating announcement message.<br>Please try again.");
            }
        }
    });
});