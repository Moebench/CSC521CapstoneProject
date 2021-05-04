// For the add select box
let selectBoxDefault = `<div class="select-box">
                            <input type="text" name="select[sel_1][name]" class="form-control" placeholder="Enter the title of the Select Box">
                            <br>
                            <div class="select-container">
                                <div class="form-group multiple-form-group input-group">
                                    <input type="text" name="select[sel_1][options][]" class="form-control value-inp" placeholder="Enter the value of the option">
                                    <input type="number" min="0" name="select[sel_1][extra_cost][]" class="form-control cost-inp" placeholder="Enter the cost(in CAD) of the option (Minimum: 0)">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-add">+</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sp_qua_1">Is this special case for quantity increase?</label> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Quantity 0 to 4 => 125$, Quantity 5 to 8 => 200$, Quantity 9 & 10 => 275$"></i>
                                <select class="form-control" name="select[sel_1][special_quantity]" id="sp_qua_1">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <label class="lbl-del label label-danger" onclick="deleteSel(this)">Delete this selection?</label>
                        </div>`;

var addFormGroup = function(event) {
    event.preventDefault();
    let inpVal = $(this).closest('.form-group').find('input').val();
    if (!inpVal) {
        alert('Please add the value of this option first');
        return;
    }
    $(this).parent().next().remove();

    var formGroup = $(this).closest('.form-group');

    var formGroupClone = formGroup.clone();

    $(this)
        .toggleClass('btn-success btn-add btn-danger btn-remove')
        .html('–');

    formGroupClone.find('input').val('');
    formGroupClone.find('span.input-group-btn').after('<span class="input-group-btn"><button type="button" class="btn btn-danger btn-remove">–</button></span>');
    formGroupClone.insertAfter(formGroup);

    $(this).closest('.select-container').find('input.value-inp').last().focus();
};

var removeFormGroup = function(event) {
    event.preventDefault();
    var selContainer = $(this).closest('.select-container');

    let nextLength = $(this).parent().parent().next('.multiple-form-group').length;

    var formGroup = $(this).closest('.form-group');
    formGroup.remove();

    if(!nextLength) {
        selContainer.find('.multiple-form-group').last().find('input.cost-inp').after(`<span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-add">+</button>
                            </span>`);
    }

    let inputCouunt = selContainer.find('input.value-inp').length;

    if(inputCouunt == 1) {
        selContainer.find('.multiple-form-group').find('.btn-remove').parent().remove();
    }
};

$(document).on('click', '.btn-add', addFormGroup);
$(document).on('click', '.btn-remove', removeFormGroup);

$('#addSelectBox').on('click', function() {
    var selectBoxCount = $('.select-box').length + 1;
    let lastBox = $('#selectBoxContainer .select-box').last();
    let emptyInput = lastBox.find('input').filter(function() { return this.value.trim() === ''}).length;

    if(emptyInput) {
        lastBox.addClass('empty-inputs');
        lastBox.next('div.alert').remove();
        lastBox.after(`<div class="alert alert-danger empty-inputs-error" role="alert">
                    First of all feel all the input fields of this. Then only you can add new one.
                </div>`);
        return;
    } else {
        $('.empty-inputs').removeClass('empty-inputs');
        $('.empty-inputs-error').remove();
    }

    $('#selectBoxContainer').append(selectBoxDefault.replace(/_1/g, `_${selectBoxCount}`));
});

$(document).on('keypress', '.cost-inp', function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        alert('Only digits and dot is allowed!');
        return false;
    }
});

function deleteSel(elem) {
    if(confirm("Are you sure to delete this?\nThis can't be undone.")) {
        $(elem).parent().slideUp("slow", function() {
            $(elem).parent().remove();
        });
    }
}
// For the add select box ends