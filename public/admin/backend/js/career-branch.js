$(document).ready(function () {

    loadDataTableForBranches();

    if(document.getElementById('branch-details-table')){

        Sortable.create(document.getElementById('branch-details-table').getElementsByTagName('tbody')[0], {
            onEnd: function (event) {
                // Get the new order of the rows
                var newOrder = [];
                $('#branch-details-table tbody tr').each(function () {
                    newOrder.push(table.row(this).data());
                });

                // Pass the new order to the backend (e.g., using AJAX)
                $.ajax({
                    url: $('#route-for-user').val() + '/career-branches/update/order', // Replace with your Laravel route URL
                    method: 'POST',
                    data: {
                        order: newOrder
                    },
                    success: function (response) {
                        table.ajax.reload(null, false);
                    },
                    error: function (xhr) {
                        // Handle error response
                    }
                });
            }
        });
    }
});

// function loadDataTableForBranches() {
//     table = $('#branch-details-table').DataTable({
//         processing: true,
//         serverSide: true,
//         "ajax": {
//             "url": $('#route-for-user').val() + '/career-branches/show',
//             "dataType": "json",
//             "type": "GET",
//             "data": function(d) {

//             }
//         },
//         columns: [
//             { data: 'DT_RowIndex', orderable: false, searchable: false },
//             { data: 'title' },
//             {
//                 data: null,
//                 render: function (row) {

//                     if (row.status == 1)
//                         return `<span class="badge rounded-pill bg-success-subtle text-success">Active</span>`;
//                     else
//                         return `<span class="badge rounded-pill bg-danger-subtle text-danger">Deactivated</span>`;


//                 }, orderable: false, searchable: false
//             },
//             {
//                 data: null,
//                 render: function (row) {
//                     return moment(row.created_at).format('DD MMM  YYYY hh:mm:a')
//                 },
//                 orderable:
//                     false,
//                 searchable: false
//             },
//             {
//                 data: null,
//                 render: function (row) {

//                     if (row.status == 1)
//                         statusCheck = ` <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light" href="#"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Deactivate" data-bs-placement="top"   onclick="changeStatus(` + row.id + `,` + row.status + `)">
//                                             <i class="fa fa-ban"></i>
//                                         </a>`;
//                     else
//                         statusCheck = ` <a class="datatable-buttons btn btn-outline-success btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light" href="#"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Activate" data-bs-placement="top" onclick="changeStatus(` + row.id + `,` + row.status + `)">
//                                             <i class="fa fa-check"></i>
//                                         </a>`;
//                     return (`<div style="white-space:no-wrap">
//                                     <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Edit" data-bs-placement="top"  href="` + $("#route-for-user").val() + `/career-branches/` + row.id + `/edit">
//                                         <i class="fa fa-edit"></i>
//                                     </a>
//                                     `+ statusCheck + `
//                                     <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light" href="#"   data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Delete" data-bs-placement="top"   onclick="deleteData(`+ row.id + `)">
//                                          <i class="fa fa-trash"></i>
//                                     </a>
//                                  </div>`);

//                 }, orderable: false, searchable: false
//             },
//         ],
//         pagingType: "full_numbers",
//         "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
//             "<'table-responsive'tr>" +
//             "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
//         "oLanguage": {
//             "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
//             // "sInfo": "Showing page _PAGE_ of _PAGES_",
//             "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
//             "sSearchPlaceholder": "Search...",
//             "sLengthMenu": "Results :  _MENU_",
//         },
//         "stripeClasses": [],
//     });
// }



function loadDataTableForBranches() {
    table = $('#branch-details-table').DataTable({
        processing: true,
        serverSide: true,
        "ajax": {
            "url": $('#route-for-user').val() + '/career-branches/show',
            "dataType": "json",
            "type": "GET",
            "data": function(d) {
                // Additional data if needed
            }
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title' },
            {
                data: null,
                render: function (row) {
                    if (row.status == 1)
                        return `<span class="badge rounded-pill bg-success-subtle text-success">Active</span>`;
                    else
                        return `<span class="badge rounded-pill bg-danger-subtle text-danger">Deactivated</span>`;
                }, orderable: false, searchable: false
            },
            {
                data: null,
                render: function (row) {
                    return moment(row.created_at).format('DD MMM YYYY hh:mm:a');
                }, orderable: false, searchable: false
            },
            {
                data: null,
                render: function (row) {
                    let buttons = `<div style="white-space:nowrap">`;

                    // Edit Button
                    if (row.can_edit) {
                        buttons += `
                            <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"
                                data-bs-toggle="popover" data-bs-trigger="hover"
                                data-bs-original-title="Edit" data-bs-placement="top"
                                href="${$("#route-for-user").val()}/career-branches/${row.id}/edit">
                                <i class="fa fa-edit"></i>
                            </a>`;
                    }

                    // Status Toggle Button
                    if (row.status == 1) {
                        buttons += `
                            <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"
                                href="#" data-bs-toggle="popover" data-bs-trigger="hover"
                                data-bs-original-title="Deactivate" data-bs-placement="top"
                                onclick="changeStatus(${row.id}, ${row.status})">
                                <i class="fa fa-ban"></i>
                            </a>`;
                    } else {
                        buttons += `
                            <a class="datatable-buttons btn btn-outline-success btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"
                                href="#" data-bs-toggle="popover" data-bs-trigger="hover"
                                data-bs-original-title="Activate" data-bs-placement="top"
                                onclick="changeStatus(${row.id}, ${row.status})">
                                <i class="fa fa-check"></i>
                            </a>`;
                    }

                    // Delete Button
                    if (row.can_delete) {
                        buttons += `
                            <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"
                                href="#" data-bs-toggle="popover" data-bs-trigger="hover"
                                data-bs-original-title="Delete" data-bs-placement="top"
                                onclick="deleteData(${row.id})">
                                <i class="fa fa-trash"></i>
                            </a>`;
                    }

                    // SEO Button
                    buttons += `
                        <a class="btn btn-outline-info btn-rounded mb-2 me-4 _effect--ripple waves-effect waves-light"
                            href="#" onclick="loadSeo(${row.id})" data-bs-toggle="popover"
                            data-bs-trigger="hover" data-bs-original-title="Seo" data-bs-placement="top">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
                    </div>`;

                    return buttons;
                },
                orderable: false,
                searchable: false
            }
        ],
        pagingType: "full_numbers",
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
    });
}




$('#branch-add-form').validate({
    rules: {
        title: {
            required: true,
        },
    },
    messages: {
        title: "Title field is required",
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        formData.append('description', $('.ck-content').html());
        button_loading_text = 'Saving...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/career-branches',
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

$('#branch-edit-form').validate({
    rules: {
        title: {
            required: true,
        },
        career_branch_id: {
            required: true,
        },
    },
    messages: {
        title: "Title field is required",
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        var career_branch_id = $(form).find('input[name=career_branch_id]').val();
        formData.append('description', $('.ck-content').html());
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/career-branches/' + career_branch_id,
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

function changeStatus(id, status) {
    if (status == 1) {
        text = 'You want to deactivate this career branch!';
        message = 'Deactivated successfully';
    }
    else {
        text = 'You want to activate this career branch!';
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
                url: $("#route-for-user").val() + "/career-branches/change/status",
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

function deleteData(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Are you sure, do yo want to delete the career branch ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: $("#route-for-user").val() + '/career-branches/' + id,
                data: {
                    id: id,
                },
                success: function (data) {
                    table.ajax.reload(null, false);
                    if (data == true)
                        showMessage('success', "Career branch deleted successfully");
                },
                error: function (data) {
                    showMessage("warning", "Something went wrong...");
                },
            });
        }
    })
}
