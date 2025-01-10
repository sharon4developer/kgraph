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
        ajax: $('#route-for-user').val() + '/sub-admin/show',
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name' },
            { data: 'role' },
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

                        div1 = `
                            <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1"
                               data-bs-toggle="popover" data-bs-trigger="hover"
                               data-bs-original-title="Edit" data-bs-placement="top"
                               href="${$("#route-for-user").val()}/sub-admin/${row.id}/edit">
                                <i class="fa fa-edit"></i>
                            </a>`;

                        div2 = `
                            <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1"
                               data-bs-toggle="popover" data-bs-trigger="hover"
                               data-bs-original-title="Delete" data-bs-placement="top"
                               onclick="deleteData(${row.id})">
                                <i class="fa fa-trash"></i>
                            </a>`;
                  

                    return `<div style="white-space:nowrap">${div1}${div2}</div>`;
                },
                orderable: false,
                searchable: false
            }
        ],

        pagingType: "full_numbers",
    });
}

$('#table-add-form').validate({
    rules: {
        name: {
            required: true,
        },
        role_id: {
            required: true,
        },
        email: {
            required: true,
        },
        phone: {
            required: true,
        },
        address: {
            required: true,
        },
        image: {
            required: true,
        },
        password: {
            required: true,
        },
    },
    messages: {
        name    : "Name field is required",
        role_id : "Role field is required",
        password: "password field is required",
        image   : "image field is required",
        address : "address field is required",
        phone   : "phone field is required",
        email   : "email field is required",
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
            url: $('#route-for-user').val() + '/sub-admin',
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
            error: function (response) {      console.log(response);
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

$('#table-edit-form').validate({
    rules: {
        name: {
            required: true,
        },
        role_id: {
            required: true,
        },
        email: {
            required: true,
        },
        phone: {
            required: true,
        },
        address: {
            required: true,
        },
        table_id: {
            required: true,
        },
    },
    messages: {
        name    : "Name field is required",
        role_id : "Role field is required",
        address : "address field is required",
        phone   : "phone field is required",
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
            url: $('#route-for-user').val() + '/sub-admin/' + table_id,
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

// function changeStatus(id, status) {
//     if (status == 1) {
//         text = 'You want to deactivate this country!';
//         message = 'Deactivated successfully';
//     }
//     else {
//         text = 'You want to activate this country!';
//         message = 'Activated successfully';
//     }
//     Swal.fire({
//         title: 'Are you sure?',
//         text: text,
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Yes!',
//         cancelButtonText: 'No, cancel!',
//         reverseButtons: true
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 type: "POST",
//                 url: $("#route-for-user").val() + "/countries/change/status",
//                 data: {
//                     id: id,
//                 },
//                 success: function (data) {
//                     table.ajax.reload(null, false);
//                     if (data == true)
//                         showMessage(
//                             "success",
//                             message
//                         );
//                 },
//                 error: function (data) {
//                     showMessage("warning", "Something went wrong...");
//                 },
//             });
//         }
//     })
// }

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
                url: $("#route-for-user").val() + '/sub-admin/' + id,
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


$('#table-add-role-permission-form').validate({
    rules: {
        // name: {
        //     required: true,
        // },
    },
    messages: {
       // name: "Name field is required",
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
            url: $('#route-for-user').val() + '/role-permissions/' + table_id + '/store',
            // role.storeRolePermision
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

