$(document).ready(function () {

    loadDataTableForCareer();

    if($('#summernote').length){

        $('#summernote').summernote({
            height: 300, // Set the editor height
            toolbar: [
                // Customize your toolbar
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']], // Add color options
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    }
});

function loadDataTableForCareer() {
    table = $('#career-details-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#route-for-user').val() + '/career-contents/show',
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title' },
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
                                href="${$("#route-for-user").val()}/blogs/${row.id}/edit">
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
            // "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
    });
}

$('#career-add-form').validate({
    rules: {
    },
    messages: {
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
            url: $('#route-for-user').val() + '/career-contents',
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

$('#career-edit-form').validate({
    rules: {
        career_id: {
            required: true,
        },
    },
    messages: {
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        var career_id = $(form).find('input[name=career_id]').val();
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/career-contents/' + career_id,
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
