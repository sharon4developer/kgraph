$(document).ready(function () {
    loadDataTableForPage();
});

function loadDataTableForPage() {
    table = $('#page-details-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#route-for-user').val() + '/pages/show',
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title' },
            {
                data: null,
                render: function (row) {
                    return `<a class="btn btn-outline-info btn-rounded mb-2 me-4 _effect--ripple waves-effect waves-light" href="#"  onclick="loadSeo(` + row.id + `)" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Seo" data-bs-placement="top">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>`;

                }, orderable: false, searchable: false
            },
            {
                data: null,
                render: function (row) {
                    return `<a class="btn btn-outline-info btn-rounded mb-2 me-4 _effect--ripple waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Section Titles" data-bs-placement="top" href="` + $("#route-for-user").val() + `/pages/titles/` + row.id + `/edit">
                                <i class="fa fa-header" aria-hidden="true"></i>
                            </a>`;
                }, orderable: false, searchable: false
            },
            {
                data: null,
                render: function (row) {
                    return `<a class="btn btn-outline-info btn-rounded mb-2 me-4 _effect--ripple waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Section Content" data-bs-placement="top" href="` + $("#route-for-user").val() + `/pages/cms/` + row.id + `/edit">
                                <i class="fa fa-file" aria-hidden="true"></i>
                            </a>`;
                }, orderable: false, searchable: false
            },
            {
                data: null,
                render: function (row) {
                    return `<a class="btn btn-outline-info btn-rounded mb-2 me-4 _effect--ripple waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Section Image" data-bs-placement="top" href="` + $("#route-for-user").val() + `/pages/section-image/` + row.id + `/edit">
                                <i class="fa fa-image" aria-hidden="true"></i>
                            </a>`;
                }, orderable: false, searchable: false
            },
            // {data: null,
            //     render:function(row){

            //         if(row.status==1)
            //             return`<span class="badge outline-badge-success mb-2 me-4">Active</span>`;
            //         else
            //             return `<span class="badge outline-badge-danger mb-2 me-4">Deactivated</span>`;


            // },orderable: false, searchable: false},
            // {data: null,
            //     render:function(row){

            //         if(row.status==1)
            //             statusCheck = ` <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Deactivate" data-bs-placement="top" href="#"  onclick="changeStatus(`+row.id+`,`+row.status+`)">
            //                                 <i class="fa fa-ban"></i>
            //                             </a>`;
            //         else
            //             statusCheck = ` <a class="datatable-buttons btn btn-outline-success btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Activate" data-bs-placement="top" href="#"  onclick="changeStatus(`+row.id+`,`+row.status+`)">
            //                                 <i class="fa fa-check"></i>
            //                             </a>`;
            //             return (`<div style="white-space:no-wrap">
            //                         <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Edit" data-bs-placement="top" href="` +$("#route-for-user").val() +`/pages/` +row.id +`/edit">
            //                             <i class="fa fa-edit"></i>
            //                         </a>
            //                         `+statusCheck +`
            //                      </div>`);

            // },orderable: false, searchable: false},
        ],
        "fnInitComplete": function (oSettings, json) {
            toolTipEnable();
        },
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

$('#page-edit-form').validate({
    rules: {
        title: {
            required: true,
        },
        page_id: {
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
        var page_id = $(form).find('input[name=page_id]').val();
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/pages/' + page_id,
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
        text = 'You want to deactivate this page!';
        message = 'Deactivated successfully';
    }
    else {
        text = 'You want to activate this page!';
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
                url: $("#route-for-user").val() + "/pages/change/status",
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

function loadSeo(page_id) {
    $('.popover-header').hide();
    $('.popover-arrow').hide();
    $('#page_id').val(page_id);
    $.ajax({
        url: $('#route-for-user').val() + '/pages/seo/show?page_id=' + page_id,
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
        og_image: {
            required: function () {
                return $("#seo_id").val() == '';
            },
        },
        page_id: {
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
            url: $('#route-for-user').val() + '/pages/seo',
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

$('#section-contents-edit-form').validate({
    rules: {
        page_id: {
            required: true,
        },
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        if ($('#about-counts-content-id').val())
            formData.append('cms[' + $('#about-counts-content-id').val() + '][short_description]', $('.ql-editor').html());
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/pages/cms',
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

$('#section-title-edit-form').validate({
    rules: {
        page_id: {
            required: true,
        },
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
            url: $('#route-for-user').val() + '/pages/titles',
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

$('#section-images-edit-form').validate({
    rules: {
        page_id: {
            required: true,
        },
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
            url: $('#route-for-user').val() + '/pages/section-image',
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
