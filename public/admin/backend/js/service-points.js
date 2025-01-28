$(document).ready(function () {

    loadDataTableForServices();

    // if ($('#summernote').length) {

        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],
            ['image', 'code-block'],
            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [
                { align: "" }, // left align
                { align: "center" }, // center align
                { align: "right" }, // right align
                { align: "justify" }, // justify align
            ],

            ['clean']                                         // remove formatting button
          ];

        Quill.register("modules/htmlEditButton", htmlEditButton);

        var quill = new Quill('#summernote', {
            theme: 'snow',
            modules: {
                imageResize: {
                    displaySize: true
                },
                htmlEditButton: {
                    debug: true, // logging, default:false
                    msg: "Edit the content in HTML format", //Custom message to display in the editor, default: Edit HTML here, when you click "OK" the quill editor's contents will be replaced
                    okText: "Save", // Text to display in the OK button, default: Ok,
                    cancelText: "Cancel", // Text to display in the cancel button, default: Cancel
                    buttonHTML: "<span class='quill-top-buttons'>&lt;&gt;</span>", // Text to display in the toolbar button, default: <>
                    buttonTitle: "Show HTML source", // Text to display as the tooltip for the toolbar button, default: Show HTML source
                    syntax: false, // Show the HTML with syntax highlighting. Requires highlightjs on window.hljs (similar to Quill itself), default: false
                    prependSelector: 'div#myelement', // a string used to select where you want to insert the overlayContainer, default: null (appends to body),
                    editorModules: {} // The default mod
                },
                toolbar: toolbarOptions,
            },
            placeholder: '',
            theme: 'snow'  // or 'bubble'
        });
        $('.ql-editor').html($('#text-content').val());

        // // Define custom plugins for alignment
        // $.extend($.summernote.plugins, {
        //     'floatLeft': function (context) {
        //         var ui = $.summernote.ui;
        //         context.memo('button.floatLeft', function () {
        //             return ui.button({
        //                 contents: '<i class="note-icon-align-left"/>',
        //                 tooltip: 'Align Left',
        //                 click: function () {
        //                     var $img = $(context.invoke('restoreTarget'));
        //                     $img.css({
        //                         float: 'left',
        //                         display: 'inline'
        //                     });
        //                 }
        //             }).render();
        //         });
        //     },
        //     'floatRight': function (context) {
        //         var ui = $.summernote.ui;
        //         context.memo('button.floatRight', function () {
        //             return ui.button({
        //                 contents: '<i class="note-icon-align-right"/>',
        //                 tooltip: 'Align Right',
        //                 click: function () {
        //                     var $img = $(context.invoke('restoreTarget'));
        //                     $img.css({
        //                         float: 'right',
        //                         display: 'inline'
        //                     });
        //                 }
        //             }).render();
        //         });
        //     },
        //     'floatCenter': function (context) {
        //         var ui = $.summernote.ui;
        //         context.memo('button.floatCenter', function () {
        //             return ui.button({
        //                 contents: '<i class="note-icon-align-center"/>',
        //                 tooltip: 'Align Center',
        //                 click: function () {
        //                     var $img = $(context.invoke('restoreTarget'));
        //                     $img.css({
        //                         display: 'block', // Ensures the image behaves like a block element
        //                         marginLeft: 'auto',
        //                         marginRight: 'auto',
        //                         float: 'none'
        //                     });
        //                 }
        //             }).render();
        //         });
        //     }
        // });

        // // Initialize Summernote with custom plugins
        // $('#summernote').summernote({
        //     height: 300, // Set the editor height
        //     toolbar: [
        //         // Default toolbar buttons
        //         ['style', ['style']],
        //         ['font', ['bold', 'italic', 'underline', 'clear']],
        //         ['fontname', ['fontname']],
        //         ['fontsize', ['fontsize']],
        //         ['color', ['color']], // Add color options
        //         ['para', ['ul', 'ol', 'paragraph']],
        //         ['table', ['table']],
        //         ['insert', ['link', 'picture', 'video']],
        //         ['view', ['fullscreen', 'codeview', 'help']],
        //         // Custom alignment buttons
        //         ['image', ['floatLeft', 'floatRight', 'floatCenter']]
        //     ]
        // });
    // }

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
                    url: $('#route-for-user').val() + '/service-points/update/order', // Replace with your Laravel route URL
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
            "url": $('#route-for-user').val() + '/service-points/show',
            "dataType": "json",
            "type": "GET",
            "data": function(d) {
                d.service_id=$('#select-service').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'service_id' },
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
                    return moment(row.created_at).format('DD MMM  YYYY hh:mm:a')
                },
                orderable:
                    false,
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
                                href="${$("#route-for-user").val()}/service-points/${row.id}/edit">
                                <i class="fa fa-edit"></i>
                            </a>`;
                    }

                    // Status Toggle Button (Activate/Deactivate based on status)
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

                    // Delete Button (conditionally rendered based on can_delete permission)
                    if (row.can_delete) {
                        buttons += `
                            <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"
                                href="#" data-bs-toggle="popover" data-bs-trigger="hover"
                                data-bs-original-title="Delete" data-bs-placement="top"
                                onclick="deleteData(${row.id})">
                                <i class="fa fa-trash"></i>
                            </a>`;
                    }

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

$('#service-add-form').validate({
    rules: {
        title: {
            required: true,
        },
        description: {
            required: true,
        },
        service_id: {
            required: true,
        },
    },
    messages: {
        title: "Title field is required",
        description: "Description field is required",
        service_id: "Service field is required",
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        formData.append('description', $('.ql-editor').html());
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        // formData.append('description', $('.ck-content').html());
        button_loading_text = 'Saving...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/service-points',
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
        description: {
            required: true,
        },
        service_id: {
            required: true,
        },
        service_point_id: {
            required: true,
        },
    },
    messages: {
        title: "Title field is required",
        description: "Description field is required",
        service_id: "Service field is required",
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        //
        var formData = new FormData($(form)[0]);
        formData.append('description', $('.ql-editor').html());
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        var service_point_id = $(form).find('input[name=service_point_id]').val();
        // formData.append('description', $('.ck-content').html());
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/service-points/' + service_point_id,
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
        text = 'You want to deactivate this service point!';
        message = 'Deactivated successfully';
    }
    else {
        text = 'You want to activate this service point!';
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
                url: $("#route-for-user").val() + "/service-points/change/status",
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
        text: "Are you sure, do yo want to delete the service point ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: $("#route-for-user").val() + '/service-points/' + id,
                data: {
                    id: id,
                },
                success: function (data) {
                    table.ajax.reload(null, false);
                    if (data == true)
                        showMessage('success', "Service point deleted successfully");
                },
                error: function (data) {
                    showMessage("warning", "Something went wrong...");
                },
            });
        }
    })
}

$('#select-service').on('change',function (e) {

    table.ajax.reload();
})
