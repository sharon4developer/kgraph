$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});

$(document).ready(function () {
    loadDataTable();
});

function loadDataTable() {
    table = $('#table-details').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#route-for-user').val() + '/study/show',
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'study_banner_title' }, // Use the correct field here
            { data: 'sub_content_title' },
            { data: 'package_title' },
            {
                data: 'created_at',
                render: function (data) {
                    return moment(data).format('DD MMM YYYY hh:mm a');
                },
                orderable: false,
                searchable: false
            },
            {
                data: null,
                render: function (row) {
                    let buttons = `<div style="white-space:no-wrap">`;

                    // Edit Button (conditionally rendered based on can_edit permission)
                    if (row.can_edit) {
                        buttons += `
                            <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"
                                data-bs-toggle="popover" data-bs-trigger="hover"
                                data-bs-original-title="Edit" data-bs-placement="top"
                                href="${$("#route-for-user").val()}/study/${row.id}/edit">
                                <i class="fa fa-edit"></i>
                            </a>`;
                    }

                    // Status Toggle Button (Activate/Deactivate based on status)
                    // if (row.status == 1) {
                    //     buttons += `
                    //         <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"
                    //             href="#" data-bs-toggle="popover" data-bs-trigger="hover"
                    //             data-bs-original-title="Deactivate" data-bs-placement="top"
                    //             onclick="changeStatus(${row.id}, ${row.status})">
                    //             <i class="fa fa-ban"></i>
                    //         </a>`;
                    // } else {
                    //     buttons += `
                    //         <a class="datatable-buttons btn btn-outline-success btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"
                    //             href="#" data-bs-toggle="popover" data-bs-trigger="hover"
                    //             data-bs-original-title="Activate" data-bs-placement="top"
                    //             onclick="changeStatus(${row.id}, ${row.status})">
                    //             <i class="fa fa-check"></i>
                    //         </a>`;
                    // }

                    // Delete Button (conditionally rendered based on can_delete permission)
                    // if (row.can_delete) {
                    //     buttons += `
                    //         <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"
                    //             href="#" data-bs-toggle="popover" data-bs-trigger="hover"
                    //             data-bs-original-title="Delete" data-bs-placement="top"
                    //             onclick="deleteData(${row.id})">
                    //             <i class="fa fa-trash"></i>
                    //         </a>`;
                    // }

                    buttons += `</div>`;
                    return buttons;
                },
                orderable: false, searchable: false
            }
        ],

        pagingType: "full_numbers",
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            // "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
    });
}

$('#table-add-form').validate({
    rules: {
        study_banner_image: {
            // No required rule
        },
        study_banner_title: {
            // No required rule
        },
        sub_content_title: {
            // No required rule
        },
        sub_content_description: {
            // No required rule
        },
        sub_image: {
            // No required rule
        },
        package_title: {
            required:true,
        },
        package_description: {
            required:true,
        },
        "package_list_title[]": {
            required:true,
        },
        "package_list_description[]": {
            required:true,
        },
        cities_title: {
            // No required rule
        },
        "cities_list_image[]": {
            // No required rule
        },
        "cities_list_place[]": {
            // No required rule
        },
        "faq_question[]": {
            // No required rule
        },
        "faq_answer[]": {
            // No required rule
        },
    },
    messages: {
        sudy_banner_image: "Banner image is required",  // This message can be removed if not required
        sudy_banner_title: "Title is required",  // This message can be removed if not required
        sub_content_title: "Sub content title is required",  // This message can be removed if not required
        sub_content_description: "Sub content description is required",  // This message can be removed if not required
        sub_image: "Sub image is required",  // This message can be removed if not required
        package_title: "Package title is required",  // This message can be removed if not required
        package_description: "Package description is required",  // This message can be removed if not required
        "package_list_title[]": "Package title is required",  // This message can be removed if not required
        "package_list_description[]": "Package description is required",  // This message can be removed if not required
        cities_title: "City title is required",  // This message can be removed if not required
        "cities_list_image[]": "City image is required",  // This message can be removed if not required
        "cities_list_place[]": "City place is required",  // This message can be removed if not required
        "faq_question[]": "FAQ question is required",  // This message can be removed if not required
        "faq_answer[]": "FAQ answer is required",  // This message can be removed if not required
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/study',
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            beforeSend: function () {
                submitButton.html(`
                    <span class="spinner-border spinner-border-sm"></span>
                    ` + button_loading_text + `
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
                console.log(response);
                submitButton.html(current_btn_text).attr('disabled', false);
                if (response.responseJSON.errors) {
                    $.each(response.responseJSON.errors, function (i, v) {
                        element = $(form).find('[name=' + i + ']');
                        element.addClass('is-invalid');
                        if ($(form).find('#' + i + '-error').length) {
                            $(form).find('#' + i + '-error').html(v).show();
                        } else {
                            element.closest('.form-group').append(`<span id="` + i + `-error" class="error invalid-feedback">` + v + `</span>`);
                            $('.error').show();
                        }
                        element.attr('aria-invalid', true);
                        element.attr("aria-describedby", i + "-error");
                        element.focus();
                    });
                } else {
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

$('#table-edit-form').validate({
    rules: {
        study_banner_image: {
            // No required rule
        },
        study_banner_title: {
            // No required rule
        },
        sub_content_title: {
            // No required rule
        },
        sub_content_description: {
            // No required rule
        },
        sub_image: {
            // No required rule
        },
        package_title: {
            required:true,
        },
        package_description: {
            required:true,
        },
        "package_list_title[]": {
            required:true,
        },
        "package_list_description[]": {
            required:true,
        },
        cities_title: {
            // No required rule
        },
        "cities_list_image[]": {
            // No required rule
        },
        "cities_list_place[]": {
            // No required rule
        },
        "faq_question[]": {
            // No required rule
        },
        "faq_answer[]": {
            // No required rule
        },
    },
    messages: {
        name    : "Name field is required",
        role_id : "Role field is required",


        email   : "email field is required",
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        var table_id = $(form).find('input[name=table_id]').val();
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/study/' + table_id,
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
        text: "Are you sure, do yo want to delete the User ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: $("#route-for-user").val() + '/study/' + id,
                data: {
                    id: id,
                },
                success: function (data) {
                    table.ajax.reload(null, false);
                    if (data == true)
                        showMessage('success', "User deleted successfully");
                },
                error: function (data) {
                    showMessage("warning", "Something went wrong...");
                },
            });
        }
    })
}


// $('#table-add-role-permission-form').validate({
//     rules: {
//         // name: {
//         //     required: true,
//         // },
//     },
//     messages: {
//        // name: "Name field is required",
//     },
//     errorElement: 'span',
//     submitHandler: function (form, event) {
//         //
//         var formData = new FormData($(form)[0]);
//         $('.error').html('');
//         var submitButton = $(form).find('[type=submit]');
//         var current_btn_text = submitButton.html();
//         button_loading_text = 'Saving...';
//         var table_id = $(form).find('input[name=table_id]').val();
//         // Create
//         $.ajax({
//             type: "POST",
//             url: $('#route-for-user').val() + '/role-permissions/' + table_id + '/store',
//             // role.storeRolePermision
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

// const togglePassword = document.getElementById('togglePassword');
// const passwordField = document.getElementById('passwordField');

// togglePassword.addEventListener('click', function () {
//     const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
//     passwordField.setAttribute('type', type);
//     this.querySelector('i').classList.toggle('fa-eye-slash');
//     this.querySelector('i').classList.toggle('fa-eye');
// });
// $(document).ready(function () {
//     // Handle the "Add More" button click
//     $("#addMore").click(function () {
//         var newField = `
//             <div class="list">
//                 <div class="form-group">
//                     <label for="exampleFormControlInput1">Packages list Title <span class="text-danger">*</span></label>
//                     <input type="text" name="package_list_title[]" class="form-control" placeholder="Enter Title">
//                 </div>
//                 <div class="col-md-12">
//                     <div class="mb-3">
//                         <div class="form-group">
//                             <label class="form-label">Packages list Description</label>
//                             <textarea class="form-control" name="package_list_description[]" placeholder="Description" required></textarea>
//                         </div>
//                     </div>
//                 </div>
//                 <button type="button" class="btn btn-danger remove">Remove</button>
//             </div>`;

//         // Append the new field inside the #packageContainer
//         $("#packageContainer").append(newField);
//     });

//     // Handle the "Remove" button click to delete the specific field
//     $(document).on("click", ".remove", function () {
//         var packageId = $(this).data("id"); // Get package ID if it exists
//         var parentElement = $(this).closest(".list");

//         if (packageId) {
//             // Send an AJAX request to remove the item from the database
//             $.ajax({
//                 url: "/remove-package/" + packageId, // Replace with your actual route
//                 type: "DELETE",
//                 data: {
//                     _token: $('meta[name="csrf-token"]').attr("content") // CSRF token
//                 },
//                 success: function (response) {
//                     parentElement.remove(); // Remove the element from UI
//                 },
//                 error: function () {
//                     alert("Error removing package. Please try again.");
//                 }
//             });
//         } else {
//             // Just remove from UI if it's newly added
//             parentElement.remove();
//         }
//     });
// });

$(document).ready(function () {
    function toggleRemoveButtons() {
        if ($(".list").length > 1) {
            $(".remove-package").show();
        } else {
            $(".remove-package").hide();
        }
    }

    // Initial check on page load
    toggleRemoveButtons();

    // Handle the "Add More" button click
    $("#addMore").click(function () {
        var newField = `
            <div class="list">
                <div class="form-group">
                    <label>Packages List Title <span class="text-danger">*</span></label>
                    <input type="text" name="package_list_title[]" class="form-control" placeholder="Enter Title">
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <div class="form-group">
                            <label class="form-label">Packages List Description</label>
                            <textarea class="form-control" name="package_list_description[]" placeholder="Description" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-danger remove-package">Remove</button>
            </div>`;

        // Append the new field inside the #packageContainer
        $("#packageContainer").append(newField);
        toggleRemoveButtons(); // Check button visibility
    });

    // Handle Remove Button Click
    $(document).on("click", ".remove-package", function () {
        $(this).closest(".list").remove();
        toggleRemoveButtons(); // Check button visibility
    });
});



// city
$(document).ready(function () {
    // Handle the "Add More" button click for cities
    $("#addMorecity").click(function () {
        var newField = `
            <div class="city">
                <div class="form-group">
                    <label for="exampleFormControlInput1">City List Image <span class="text-danger">*</span></label>
                    <input type="file" name="cities_list_image[]" class="form-control" placeholder="Enter image" accept="image/*">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">City List Title <span class="text-danger">*</span></label>
                    <input type="text" name="cities_list_place[]" class="form-control" placeholder="Enter City Title">
                </div>
                <button type="button" class="btn btn-danger remove">Remove</button>
            </div>
        `;

        // Append the new field inside the #city container
        $("#city").append(newField);
    });

    // Handle the "Remove" button click to delete the field
    $(document).on("click", ".remove", function () {
        $(this).closest(".city").remove(); // Removes the entire .city container
    });
});





// faq
$(document).ready(function () {
    // Handle the "Add More" button click
    $("#addMoreFaq").click(function () {
        var newField = `
            <div class="faqList">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Faq Question
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="faq_question[]" class="form-control" placeholder="Enter the Question">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Faq Answer
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="faq_answer[]" class="form-control" placeholder="Enter the Answer">
                </div>
                <button type="button" class="btn btn-danger remove">Remove</button>
            </div>
        `;

        // Append the new field inside the #faqContainer
        $("#faqContainer").append(newField);
    });

    // Handle the "Remove" button click to delete the field
    $(document).on("click", ".remove", function () {
        $(this).closest(".faqList").remove(); // Removes the entire .faqList container
    });
});

function deleteData(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Are you sure, do yo want to delete  ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: $("#route-for-user").val() + '/study/' + id,
                data: {
                    id: id,
                },
                success: function (data) {
                    table.ajax.reload(null, false);
                    if (data == true)
                        showMessage('success', "Deleted successfully");
                },
                error: function (data) {
                    showMessage("warning", "Something went wrong...");
                },
            });
        }
    })
}
function changeStatus(id, status) {
    if (status == 1) {
        text = 'You want to deactivate this servicev !';
        message = 'Deactivated successfully';
    }
    else {
        text = 'You want to activate this service !';
        message = 'Activated successfully';
    }
    Swal.fire({
        title: 'Are you sure?',
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: $("#route-for-user").val() + "/study/change/status",
                data: {
                    id: id,
                },
                success: function (data) {
                    table.ajax.reload(null, false);
                    if (data == true)
                        showMessage(
                            "success",
                            message
                        );
                },
                error: function (data) {
                    showMessage("warning", "Something went wrong...");
                },
            });
        }
    })
}
