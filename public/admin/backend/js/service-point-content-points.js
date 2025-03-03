// var i = 1;
// $("#add").click(function () {
//     i++;
//     $("#dynamic_field").append(
//         `<div id="row` + i + `" class="dynamic-added">
//             <div class="row">
//                 <div class="col-md-5 col-sm-5">
//                     <div class="form-group">
//                         <input type="text" class="form-control" required="required" placeholder="Option*" id="option" name="option[]">
//                     </div>
//                 </div>
//                 <div class="col-md-1 col-sm-1" style="margin: 5px 0 ;">
//                     <div class="form-group">
//                         <div class="col-sm-1"><button type="button" name="remove" id="`+ i + `" class="btn btn-outline-danger btn-rounded mb-2 _effect--ripple waves-effect waves-light btn_remove " style>-</button></div>
//                     </div>
//                 </div>
//             </div>
//         </div>`
//     );
// });

// $(document).on("click", ".btn_remove", function () {
//     var button_id = $(this).attr("id");
//     $("#row" + button_id + "").remove();
// });

// $('#points-options-add-form').validate({
//     rules: {
//         "option[]": {
//             required: function () {
//                 return $('.p_option').length == 0
//             },
//         },
//     },
//     messages: {
//         "option[]": "Options required",
//     },
//     errorElement: 'span',
//     submitHandler: function (form, event) {
//         //
//         var formData = new FormData($(form)[0]);
//         formData.append("p_options", $('.p_option').length);
//         $('.error').html('');
//         var submitButton = $(form).find('[type=submit]');
//         var current_btn_text = submitButton.html();
//         button_loading_text = 'Saving...';
//         // Create
//         $.ajax({
//             type: "POST",
//             url: $('#route-for-user').val() + '/service-content-options/point-contents/options',
//             contentType: false,
//             processData: false,
//             data: formData,
//             cache: false,
//             beforeSend: function () {
//                 submitButton.html(`
//                     <span class="spinner-border spinner-border-sm"></span>
//                     `+ button_loading_text + `
//                 `).attr('disabled', true);
//             },
//             success: function (response) {
//                 if (response.status) {
//                     showMessage('success', response.message);
//                     setTimeout(function () {
//                         window.location = response.return_url;
//                     }, 500);
//                 } else {
//                     showMessage('warning', response.message);
//                 }
//             },
//             error: function (response) {
//                 submitButton.html(current_btn_text).attr('disabled', false);
//                 if (response.responseJSON.errors) {
//                     $.each(response.responseJSON.errors, function (i, v) {
//                         element = $(form).find('[name=' + i + ']');
//                         element.addClass('is-invalid');
//                         if ($(form).find('#' + i + '-error').length) {
//                             $(form).find('#' + i + '-error').html(v).show();
//                         } else {
//                             element.closest('.form-group').
//                                 append(`<span id="` + i + `-error" class="error invalid-feedback">` + v + `</span>`);
//                             $('.error').show();
//                         }
//                         element.attr('aria-invalid', true);
//                         element.attr("area-describedby", i + "-error");
//                         element.focus();
//                     });
//                 }
//                 else {
//                     showMessage('warning', 'Something went wrong...');
//                 }
//             },
//             complete: function () {
//                 submitButton.html(current_btn_text).attr('disabled', false);
//             }
//         });
//         event.preventDefault();
//     },
//     highlight: function (element, errorClass, validClass) {
//         $(element).addClass('is-invalid');
//     },
//     unhighlight: function (element, errorClass, validClass) {
//         $(element).removeClass('is-invalid');
//     }
// });

// function deleteData(id) {
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "Are you sure, do yo want to delete the option ?",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Yes!',
//         cancelButtonText: 'No, cancel!',
//         reverseButtons: true
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 type: "DELETE",
//                 url: $("#route-for-user").val() + '/service-content-options/point-contents/options/' + id,
//                 data: {
//                     id: id,
//                     service_point_content_id: $('#service_point_content_id').val(),
//                 },
//                 success: function (data) {
//                     resetPreviousOptions(data);
//                     if (data.status == true)
//                         showMessage('success', "Option deleted successfully");
//                 },
//                 error: function (data) {
//                     showMessage("warning", "Something went wrong...");
//                 },
//             });
//         }
//     })
// }

// function resetPreviousOptions(data) {
//     $('#previous_field').html(``);
//     html = ``;
//     $.each(data.data.options, function (index, value) {
//         html += `<div class="row p_option">
//                     <div class="col-md-5 col-sm-5">
//                         <div class="form-group">
//                             <!-- <h6>Option</h6> -->
//                             <input type="text" class="form-control" required="required" placeholder="Option*" id="p_option_`+ value.id + `" name="p_option[` + value.id + `]" value="` + value.option + `" option_id="` + value.id + `">
//                         </div>
//                     </div>
//                     <div class="col-md-1 col-sm-1" style="margin: 5px 0;">
//                         <div class="form-group">
//                             <div class="col-sm-1"><button type="button" name="p_delete" id="p_delete_`+ value.id + `" class="btn btn-outline-danger btn-rounded mb-2 _effect--ripple waves-effect waves-light update-option" onclick="deleteData('` + value.id + `')"><i class="fa fa-trash"></i></button></div>
//                         </div>
//                     </div>
//                 </div>`;
//     });
//     $('#previous_field').html(html);
// }

// new Sortable(document.getElementById('previous_field'), {
//     animation: 150,
//     onUpdate: function (event) {
//         // Get the updated item order
//         var itemOrder = Array.from(event.target.children).map(function (element) {
//             return element.getAttribute('data-id');
//         });

//         // Make an AJAX request to update the item order in the backend
//         axios.post($("#route-for-user").val() + '/service-content-options/point-contents/options/update/item-order', { items: itemOrder })
//             .then(function (response) {
//                 console.log(response.data);
//             })
//             .catch(function (error) {
//                 console.log(error);
//             });
//     }
// });

let titleIndex = $("#last_index").length > 0 ? $("#last_index").val() : 0;

// Add Title
$("#add-title").click(function () {
    titleIndex++;
    $("#titles-container").append(`
        <div class="card mt-4" id="title_${titleIndex}">
            <div class="card-header">
                <h5>Title ${titleIndex}</h5>
                <div class="form-group">
                    <input type="text" class="form-control" required placeholder="Enter Title*" name="titles[${titleIndex}][title]">
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm remove-title" data-title-id="${titleIndex}">Remove Title</button>
            </div>
            <div class="card-body" id="options-container-${titleIndex}">
                <button type="button" class="btn btn-outline-success btn-sm add-option" data-title-id="${titleIndex}">
                    + Add Option/Paragraph
                </button>
            </div>
        </div>
    `);
});

// Remove Title
$(document).on("click", ".remove-title", function () {
    const titleId = $(this).data("title-id");
    $(`#title_${titleId}`).remove();
});

// Add Option/Paragraph
$(document).on("click", ".add-option", function () {
    const titleId = $(this).data("title-id");
    const optionIndex =
        $(`#options-container-${titleId} .option-item`).length + 1;

    $(`#options-container-${titleId}`).append(`
        <div class="option-item mt-3" id="option_${titleId}_${optionIndex}">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control option-type" data-title-id="${titleId}" data-option-id="${optionIndex}">
                        <option value="">Select Option Type</option>
                        <option value="paragraph">Paragraph</option>
                        <option value="option">Option</option>
                    </select>
                </div>
                <div class="col-md-6" id="option-content_${titleId}_${optionIndex}">
                    <!-- Paragraph or options will go here -->
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-danger btn-sm remove-option" data-title-id="${titleId}" data-option-id="${optionIndex}">
                        Remove
                    </button>
                </div>
            </div>
        </div>
    `);
});

// Remove Option/Paragraph
$(document).on("click", ".remove-option", function () {
    const titleId = $(this).data("title-id");
    const optionId = $(this).data("option-id");
    $(`#option_${titleId}_${optionId}`).remove();
});

// Handle Option Type Change
$(document).on("change", ".option-type", function () {
    const titleId = $(this).data("title-id");
    const optionId = $(this).data("option-id");
    const type = $(this).val();
    const contentId = `#option-content_${titleId}_${optionId}`;

    if (type === "paragraph") {
        $(contentId).html(`
            <textarea class="form-control" required placeholder="Enter paragraph..." name="titles[${titleId}][options][${optionId}][content]"></textarea>
        `);
    } else if (type === "option") {
        $(contentId).html(`
            <div id="multi-options_${titleId}_${optionId}">
                <!-- Multiple options will be added here -->
            </div>
            <button type="button" class="btn btn-outline-success btn-sm add-multi-option" data-title-id="${titleId}" data-option-id="${optionId}">
                + Add Multiple Option
            </button>
        `);
    } else {
        $(contentId).html("");
    }
});

// Add Multiple Option
$(document).on("click", ".add-multi-option", function () {
    const titleId = $(this).data("title-id");
    const optionId = $(this).data("option-id");
    const multiOptionIndex =
        $(`#multi-options_${titleId}_${optionId} .multi-option-item`).length +
        1;

    $(`#multi-options_${titleId}_${optionId}`).append(`
        <div class="multi-option-item mt-2" id="multi-option_${titleId}_${optionId}_${multiOptionIndex}">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" class="form-control" required placeholder="Enter option*" name="titles[${titleId}][options][${optionId}][multi-options][${multiOptionIndex}][value]">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-danger btn-sm remove-multi-option" data-title-id="${titleId}" data-option-id="${optionId}" data-multi-option-id="${multiOptionIndex}">
                        Remove Option
                    </button>
                </div>
            </div>
            <div id="sub-options_${titleId}_${optionId}_${multiOptionIndex}" class="mt-2">
                <!-- Sub-options will be added here -->
            </div>
            <button type="button" class="btn btn-outline-secondary btn-sm add-sub-option" data-title-id="${titleId}" data-option-id="${optionId}" data-multi-option-id="${multiOptionIndex}">
                + Add Sub-Option
            </button>
        </div>
    `);
});

// Remove Multiple Option
$(document).on("click", ".remove-multi-option", function () {
    const titleId = $(this).data("title-id");
    const optionId = $(this).data("option-id");
    const multiOptionId = $(this).data("multi-option-id");
    $(`#multi-option_${titleId}_${optionId}_${multiOptionId}`).remove();
});

// Add Sub-Option
$(document).on("click", ".add-sub-option", function () {
    const titleId = $(this).data("title-id");
    const optionId = $(this).data("option-id");
    const multiOptionId = $(this).data("multi-option-id");
    const subOptionIndex =
        $(
            `#sub-options_${titleId}_${optionId}_${multiOptionId} .sub-option-item`
        ).length + 1;

    $(`#sub-options_${titleId}_${optionId}_${multiOptionId}`).append(`
        <div class="sub-option-item mt-2" id="sub-option_${titleId}_${optionId}_${multiOptionId}_${subOptionIndex}">
            <div class="row">
                <div class="col-md-10">
                    <input type="text" class="form-control" required placeholder="Sub-option*" name="titles[${titleId}][options][${optionId}][multi-options][${multiOptionId}][sub-options][${subOptionIndex}]">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-danger btn-sm remove-sub-option" data-title-id="${titleId}" data-option-id="${optionId}" data-multi-option-id="${multiOptionId}" data-sub-option-id="${subOptionIndex}">
                        Remove Sub-Option
                    </button>
                </div>
            </div>
        </div>
    `);
});

// Remove Sub-Option
$(document).on("click", ".remove-sub-option", function () {
    const titleId = $(this).data("title-id");
    const optionId = $(this).data("option-id");
    const multiOptionId = $(this).data("multi-option-id");
    const subOptionId = $(this).data("sub-option-id");
    $(
        `#sub-option_${titleId}_${optionId}_${multiOptionId}_${subOptionId}`
    ).remove();
});

function serializeForm() {
    let formData = {
        service_point_content_id: $("#service_point_content_id").val(), // Include the hidden input value
        titles: [],
    };

    $("#titles-container .card").each(function () {
        let titleId = $(this).attr("id");
        let titleData = {
            title: $(this).find("input[name^='titles']").val(),
            options: [],
        };

        $(this)
            .find(".option-item")
            .each(function () {
                let optionType = $(this).find(".option-type").val();
                let optionContent = $(this).find("[name$='[content]']").val();
                let multiOptions = [];

                if (optionType === "option") {
                    $(this)
                        .find(".multi-option-item")
                        .each(function () {
                            let optionValue = $(this)
                                .find("input[name$='[value]']")
                                .val();
                            console.log(optionValue);
                            let subOptions = [];
                            $(this)
                                .find(".sub-option-item input")
                                .each(function () {
                                    subOptions.push($(this).val());
                                });
                            multiOptions.push({
                                value: optionValue,
                                subOptions,
                            });
                        });
                }

                titleData.options.push(
                    optionType === "paragraph"
                        ? { type: "paragraph", content: optionContent }
                        : { type: "option", multiOptions }
                );
            });

        formData.titles.push(titleData);
    });

    return formData;
}

// On form submit, serialize and send the data
$("#dynamic-form").on("submit", function (e) {
    e.preventDefault();
    let serializedData = serializeForm();

    $.ajax({
        url:
            $("#route-for-user").val() +
            "/service-content-options/point-contents/options", // Replace with your backend URL
        type: "POST",
        data: JSON.stringify({ titles: serializedData }),
        contentType: "application/json",
        success: function (response) {
            showMessage("success", response.message);
            setTimeout(function () {
                window.location = response.return_url;
            }, 500);
            console.log(response);
        },
        error: function (error) {
            console.log(error);
        },
    });
});
