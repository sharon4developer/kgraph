$(document).ready(function () {

    loadDataTableForServices();

    if(document.getElementById('service-details-table')){

        Sortable.create(document.getElementById('service-details-table').getElementsByTagName('tbody')[0], {
            onEnd: function (event) {
                // Get the new order of the rows
                var newOrder = [];
                $('#service-details-table tbody tr').each(function () {
                    newOrder.push(table.row(this).data());
                });

                // Pass the new order to the backend (e.g., using AJAX)
                $.ajax({
                    url: $('#route-for-user').val() + '/services/update/order', // Replace with your Laravel route URL
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

function loadDataTableForServices() {
    table = $('#service-details-table').DataTable({
        processing: true,
        serverSide: true,
        "ajax": {
            "url": $('#route-for-user').val() + '/services/show',
            "dataType": "json",
            "type": "GET",
            "data": function(d) {
                d.service_category_id=$('#select-service-category').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'service_category_id' },
            { data: 'title' },
            {
                data: null,
                render: function (row) {
                    return `<img class="table-img" src=` + row.image + `>`;
                },
                orderable: false,
                searchable: false,
            },
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
                    return moment(row.created_at).format('DD MMM  YYYY hh:mm:a')
                },
                orderable:
                    false,
                searchable: false
            },
            {
                data: null,
                render: function (row) {

                    if (row.status == 1)
                        statusCheck = ` <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light" href="#"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Deactivate" data-bs-placement="top"   onclick="changeStatus(` + row.id + `,` + row.status + `)">
                                            <i class="fa fa-ban"></i>
                                        </a>`;
                    else
                        statusCheck = ` <a class="datatable-buttons btn btn-outline-success btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light" href="#"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Activate" data-bs-placement="top" onclick="changeStatus(` + row.id + `,` + row.status + `)">
                                            <i class="fa fa-check"></i>
                                        </a>`;
                    return (`<div style="white-space:no-wrap">
                                    <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Edit" data-bs-placement="top"  href="` + $("#route-for-user").val() + `/services/` + row.id + `/edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    `+ statusCheck + `
                                    <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light" href="#"   data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Delete" data-bs-placement="top"   onclick="deleteData(`+ row.id + `)">
                                         <i class="fa fa-trash"></i>
                                    </a>
                                    <a class="btn btn-outline-info btn-rounded mb-2 me-4 _effect--ripple waves-effect waves-light" href="#"  onclick="loadSeo(` + row.id + `)" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Seo" data-bs-placement="top">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </a>
                                 </div>`);

                }, orderable: false, searchable: false
            },
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

$('#service-add-form').validate({
    rules: {
        title: {
            required: true,
        },
        sub_title: {
            required: true,
        },
        inner_title: {
            required: true,
        },
        service_category_id: {
            required: true,
        },
        image: {
            required: true,
        },
    },
    messages: {
        title: "Title field is required",
        sub_title: "Sub title field is required",
        inner_title: "Inner title field is required",
        service_category_id: "Service Category field is required",
        image: "Image field is required",
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/services',
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

$('#service-edit-form').validate({
    rules: {
        title: {
            required: true,
        },
        sub_title: {
            required: true,
        },
        inner_title: {
            required: true,
        },
        service_category_id: {
            required: true,
        },
        service_id: {
            required: true,
        },
    },
    messages: {
        title: "Title field is required",
        sub_title: "Sub title field is required",
        inner_title: "Inner title field is required",
        service_category_id: "Service Category field is required",
        image: "Image field is required",
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        var service_id = $(form).find('input[name=service_id]').val();
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/services/' + service_id,
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
        text = 'You want to deactivate this service!';
        message = 'Deactivated successfully';
    }
    else {
        text = 'You want to activate this service!';
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
                url: $("#route-for-user").val() + "/services/change/status",
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
        text: "Are you sure, do yo want to delete the service ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: $("#route-for-user").val() + '/services/' + id,
                data: {
                    id: id,
                },
                success: function (data) {
                    table.ajax.reload(null, false);
                    if (data == true)
                        showMessage('success', "Service deleted successfully");
                },
                error: function (data) {
                    showMessage("warning", "Something went wrong...");
                },
            });
        }
    })
}

$('#select-service-category').on('change',function (e) {

    table.ajax.reload();
})

function loadSeo(service_id) {
    $('.popover-header').hide();
    $('.popover-arrow').hide();
    $('#service_id').val(service_id);
    $.ajax({
        url: $('#route-for-user').val() + '/services/seo/show?service_id=' + service_id,
        type: 'GET',
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function (data) {
        showSeo(data);
    }).fail(function () {
        console.log('Error');
    }).always(function () { });
}

function showSeo(data) {
    $('#seo-edit-form').trigger('reset');
    $('#seo_id').val('');
    $('#previous-og-image-section').hide();
    if (data.status) {
        if (data.seo.meta_title)
            $('#meta_title').val(data.seo.meta_title);
        else
            $('#meta_title').val('');
        if (data.seo.meta_description)
            $('#meta_description').val(data.seo.meta_description);
        else
            $('#meta_description').val('');
        if (data.seo.meta_keywords)
            $('#meta_keywords').val(data.seo.meta_keywords);
        else
            $('#meta_keywords').val('');
        if (data.seo.og_title)
            $('#og_title').val(data.seo.og_title);
        else
            $('#og_title').val('');
        if (data.seo.og_description)
            $('#og_description').val(data.seo.og_description);
        else
            $('#og_description').val('');
        if (data.seo.og_url)
            $('#og_url').val(data.seo.og_url);
        else
            $('#og_url').val('');
        if (data.seo.schema)
            $('#schema').val(data.seo.schema);
        else
            $('#schema').val('');
        if (data.seo.og_image) {
            document.getElementById("previous-og-image").src = data.seo.og_image;
            $('#previous-og-image-section').show();
        }
        else
            $('#previous-og-image-section').hide();
        if (data.seo.id)
            $('#seo_id').val(data.seo.id);
        else
            $('#seo_id').val('');
    }

    $('#seo-modal').modal('show');
}

$('#seo-edit-form').validate({
    rules: {
        meta_title: {
            required: true,
        },
        meta_description: {
            required: true,
        },
        meta_keywords: {
            required: true,
        },
        og_title: {
            required: true,
        },
        og_description: {
            required: true,
        },
        og_url: {
            required: true,
        },
        schema: {
            required: true,
        },
        og_image: {
            required: function () {
                return $("#seo_id").val() == '';
            },
        },
        service_id: {
            required: true,
        },
    },
    messages: {
        meta_title: "Meta Title field is required",
        meta_description: "Meta Description field is required",
        meta_keywords: "Meta Keywords field is required",
        og_title: "OG Title field is required",
        og_description: "OG Description field is required",
        og_url: "OG Url field is required",
        og_image: "OG Image field is required",
        schema: "Schema field is required",
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/services/seo',
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
                    $('#seo-modal').modal('hide');
                    $('#seo-edit-form').trigger("reset");
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
