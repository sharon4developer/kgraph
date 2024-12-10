var i = 1;
$("#add").click(function () {
    i++;
    $("#dynamic_field").append(
        `<div id="row` + i + `" class="dynamic-added">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <div class="form-group">
                        <input type="text" class="form-control" required="required" placeholder="Option*" id="option" name="option[]">
                    </div>
                </div>
                <div class="col-md-1 col-sm-1" style="margin: 5px 0 ;">
                    <div class="form-group">
                        <div class="col-sm-1"><button type="button" name="remove" id="`+ i + `" class="btn btn-outline-danger btn-rounded mb-2 _effect--ripple waves-effect waves-light btn_remove " style>-</button></div>
                    </div>
                </div>
            </div>
        </div>`
    );
});

$(document).on("click", ".btn_remove", function () {
    var button_id = $(this).attr("id");
    $("#row" + button_id + "").remove();
});

$('#points-options-add-form').validate({
    rules: {
        "option[]": {
            required: function () {
                return $('.p_option').length == 0
            },
        },
    },
    messages: {
        "option[]": "Options required",
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        formData.append("p_options", $('.p_option').length);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/sub-service-point-contents/point-contents/options',
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            beforeSend: function () {
                submitButton.html(`
                    <span class="spinner-border spinner-border-sm"></span>
                    `+ button_loading_text + `
                `).attr('disabled', true);
            },
            success: function (response) {
                if (response.status) {
                    showMessage('success', response.message);
                    setTimeout(function () {
                        window.location = response.return_url;
                    }, 500);
                } else {
                    showMessage('warning', response.message);
                }
            },
            error: function (response) {
                submitButton.html(current_btn_text).attr('disabled', false);
                if (response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function (i, v) {
                        element = $(form).find('[name=' + i + ']');
                        element.addClass('is-invalid');
                        if ($(form).find('#' + i + '-error').length) {
                            $(form).find('#' + i + '-error').html(v).show();
                        } else {
                            element.closest('.form-group').
                                append(`<span id="` + i + `-error" class="error invalid-feedback">` + v + `</span>`);
                            $('.error').show();
                        }
                        element.attr('aria-invalid', true);
                        element.attr("area-describedby", i + "-error");
                        element.focus();
                    });
                }
                else {
                    showMessage('warning', 'Something went wrong...');
                }
            },
            complete: function () {
                submitButton.html(current_btn_text).attr('disabled', false);
            }
        });
        event.preventDefault();
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
});

function deleteData(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Are you sure, do yo want to delete the option ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: $("#route-for-user").val() + '/sub-service-point-contents/point-contents/options/' + id,
                data: {
                    id: id,
                    service_point_content_id: $('#service_point_content_id').val(),
                },
                success: function (data) {
                    resetPreviousOptions(data);
                    if (data.status == true)
                        showMessage('success', "Option deleted successfully");
                },
                error: function (data) {
                    showMessage("warning", "Something went wrong...");
                },
            });
        }
    })
}

function resetPreviousOptions(data) {
    $('#previous_field').html(``);
    html = ``;
    $.each(data.data.options, function (index, value) {
        html += `<div class="row p_option">
                    <div class="col-md-5 col-sm-5">
                        <div class="form-group">
                            <!-- <h6>Option</h6> -->
                            <input type="text" class="form-control" required="required" placeholder="Option*" id="p_option_`+ value.id + `" name="p_option[` + value.id + `]" value="` + value.option + `" option_id="` + value.id + `">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1" style="margin: 5px 0;">
                        <div class="form-group">
                            <div class="col-sm-1"><button type="button" name="p_delete" id="p_delete_`+ value.id + `" class="btn btn-outline-danger btn-rounded mb-2 _effect--ripple waves-effect waves-light update-option" onclick="deleteData('` + value.id + `')"><i class="fa fa-trash"></i></button></div>
                        </div>
                    </div>
                </div>`;
    });
    $('#previous_field').html(html);
}

new Sortable(document.getElementById('previous_field'), {
    animation: 150,
    onUpdate: function (event) {
        // Get the updated item order
        var itemOrder = Array.from(event.target.children).map(function (element) {
            return element.getAttribute('data-id');
        });

        // Make an AJAX request to update the item order in the backend
        axios.post($("#route-for-user").val() + '/sub-service-point-contents/point-contents/options/update/item-order', { items: itemOrder })
            .then(function (response) {
                console.log(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
    }
});
