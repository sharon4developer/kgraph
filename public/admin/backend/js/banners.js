$(document).ready(function () {

    loadDataTableForBanners();

    if(document.getElementById('banner-details-table')){

        Sortable.create(document.getElementById('banner-details-table').getElementsByTagName('tbody')[0], {
            onEnd: function (event) {
                // Get the new order of the rows
                var newOrder = [];
                $('#banner-details-table tbody tr').each(function () {
                    newOrder.push(table.row(this).data());
                });

                // Pass the new order to the backend (e.g., using AJAX)
                $.ajax({
                    url: $('#route-for-user').val() + '/banners/update/order', // Replace with your Laravel route URL
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

function loadDataTableForBanners() {
    table = $('#banner-details-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('#route-for-user').val() + '/banners/show',
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title' },
            {
                data: 'image',
                render: function (data, type, row) {
                    if (data) {
                        return `<img class="table-img" src="` + data + `" alt="Banner Image" style="max-width: 100px; height: auto;">`;
                    }
                    return '<span class="text-muted">No Image</span>';
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
                                    <a class="datatable-buttons btn btn-outline-primary btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light"  data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Edit" data-bs-placement="top"  href="` + $("#route-for-user").val() + `/banners/` + row.id + `/edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    `+ statusCheck + `
                                    <a class="datatable-buttons btn btn-outline-danger btn-rounded mb-2 me-1 _effect--ripple waves-effect waves-light" href="#"   data-bs-toggle="popover" data-bs-trigger="hover" data-bs-original-title="Delete" data-bs-placement="top"   onclick="deleteData(`+ row.id + `)">
                                         <i class="fa fa-trash"></i>
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

// Initialize Quill editors
var quillSubTitle, quillDescription;

// Make function globally accessible
window.initializeQuillEditors = function initializeQuillEditors() {
    console.log('=== Starting Quill initialization ===');
    console.log('Quill available:', typeof Quill !== 'undefined');
    
    // CRITICAL: Wait for Quill to be available
    if (typeof Quill === 'undefined') {
        console.log('Quill not loaded yet, retrying in 200ms...');
        setTimeout(initializeQuillEditors, 200);
        return;
    }
    
    // Verify Quill is actually a constructor
    if (typeof Quill !== 'function') {
        console.error('Quill is not a function:', typeof Quill);
        setTimeout(initializeQuillEditors, 200);
        return;
    }

    // Check if editors exist on page
    var subTitleEditor = document.getElementById('sub_title_editor');
    var descriptionEditor = document.getElementById('description_editor');
    
    console.log('Sub title editor element found:', !!subTitleEditor);
    console.log('Description editor element found:', !!descriptionEditor);
    
    if (!subTitleEditor && !descriptionEditor) {
        console.log('Editor elements not found on page, retrying...');
        setTimeout(initializeQuillEditors, 200);
        return;
    }

    var toolbarOptions = [
        [{ 'header': [1, 2, 3, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'align': [] }],
        [{ lineHeight: ["1", "1.5", "2", "2.5", "3", "4"] }],
        ["link", "image", "video"],
        ["clean"],
    ];

    // Initialize Quill editor for sub_title
    if (subTitleEditor && !quillSubTitle) {
        // Check if already initialized
        if (subTitleEditor.querySelector('.ql-container') || subTitleEditor.querySelector('.ql-toolbar')) {
            console.log('Sub title editor already initialized, skipping...');
            return;
        }
        
        try {
            // Clear any existing content
            subTitleEditor.innerHTML = '';
            
            console.log('Creating new Quill instance for sub_title with element:', subTitleEditor);
            console.log('Quill constructor:', typeof Quill);
            
            quillSubTitle = new Quill('#sub_title_editor', {
                theme: "snow",
                modules: {
                    toolbar: toolbarOptions,
                },
                placeholder: "Enter content...",
            });
            
            console.log('Quill instance created successfully:', !!quillSubTitle);
            console.log('Quill root element:', quillSubTitle.root);
            console.log('Quill container exists:', !!quillSubTitle.container);

            // Load content - prioritize JavaScript variable, then hidden input
            var contentToLoad = '';
            if (typeof subTitleContent !== 'undefined' && subTitleContent && subTitleContent.trim() !== '') {
                contentToLoad = subTitleContent;
                console.log('Loading sub_title from JavaScript variable, length:', contentToLoad.length);
            } else {
                var hiddenInput = document.getElementById('sub_title');
                if (hiddenInput && hiddenInput.value && hiddenInput.value.trim() !== '') {
                    // Decode HTML entities from hidden input
                    var tempDiv = document.createElement('div');
                    tempDiv.innerHTML = hiddenInput.value;
                    contentToLoad = tempDiv.textContent || tempDiv.innerText || hiddenInput.value;
                    console.log('Loading sub_title from hidden input, length:', contentToLoad.length);
                }
            }

            if (contentToLoad) {
                console.log('Setting sub_title content:', contentToLoad.substring(0, 50) + '...');
                // Convert plain text to HTML if needed
                var htmlContent = contentToLoad.trim();
                
                // If content doesn't start with <, it's plain text - wrap it in <p> tags
                if (!htmlContent.startsWith('<')) {
                    htmlContent = '<p>' + htmlContent + '</p>';
                }
                
                // Set content using Quill's API - use the simplest method that works
                setTimeout(function() {
                    try {
                        // Method 1: Use dangerouslyPasteHTML (most reliable)
                        quillSubTitle.clipboard.dangerouslyPasteHTML(htmlContent);
                        console.log('Content set using dangerouslyPasteHTML');
                    } catch (e) {
                        console.log('Error with dangerouslyPasteHTML, trying setContents:', e);
                        try {
                            // Method 2: Convert to Delta and set
                            var delta = quillSubTitle.clipboard.convert(htmlContent);
                            quillSubTitle.setContents(delta, 'silent');
                            console.log('Content set using setContents with Delta');
                        } catch (e2) {
                            console.log('Error with setContents, trying innerHTML:', e2);
                            try {
                                // Method 3: Direct innerHTML (fallback)
                                quillSubTitle.root.innerHTML = htmlContent;
                                console.log('Content set using innerHTML');
                            } catch (e3) {
                                console.error('All methods failed:', e3);
                            }
                        }
                    }
                    
                    // Update hidden input with the actual Quill content
                    var hiddenInput = document.getElementById('sub_title');
                    if (hiddenInput) {
                        hiddenInput.value = quillSubTitle.root.innerHTML;
                    }
                    
                    console.log('Sub title content loaded. Editor has content:', quillSubTitle.root.innerHTML.length > 0);
                    console.log('Sub title editor root innerHTML:', quillSubTitle.root.innerHTML.substring(0, 150));
                }, 100);
            } else {
                console.log('No content to load for sub_title');
            }

            // Sync changes back to hidden input
            quillSubTitle.on("text-change", function () {
                var hiddenInput = document.getElementById('sub_title');
                if (hiddenInput) {
                    hiddenInput.value = quillSubTitle.root.innerHTML;
                }
            });

            console.log('Sub title editor initialized successfully. Is editable:', !quillSubTitle.isEnabled());
        } catch (e) {
            console.error('Error initializing sub_title editor:', e);
            console.error('Stack trace:', e.stack);
        }
    }

    // Initialize Quill editor for description
    if (descriptionEditor && !quillDescription) {
        // Check if already initialized
        if (descriptionEditor.querySelector('.ql-container') || descriptionEditor.querySelector('.ql-toolbar')) {
            console.log('Description editor already initialized, skipping...');
            return;
        }
        
        try {
            // Clear any existing content
            descriptionEditor.innerHTML = '';
            
            console.log('Creating new Quill instance for description with element:', descriptionEditor);
            
            quillDescription = new Quill('#description_editor', {
                theme: "snow",
                modules: {
                    toolbar: toolbarOptions,
                },
                placeholder: "Enter description...",
            });
            
            console.log('Quill instance created successfully:', !!quillDescription);
            console.log('Quill root element:', quillDescription.root);
            console.log('Quill container exists:', !!quillDescription.container);

            // Load content - prioritize JavaScript variable, then hidden input
            var contentToLoad = '';
            if (typeof descriptionContent !== 'undefined' && descriptionContent && descriptionContent.trim() !== '') {
                contentToLoad = descriptionContent;
                console.log('Loading description from JavaScript variable, length:', contentToLoad.length);
            } else {
                var hiddenInput = document.getElementById('description');
                if (hiddenInput && hiddenInput.value && hiddenInput.value.trim() !== '') {
                    // Decode HTML entities from hidden input
                    var tempDiv = document.createElement('div');
                    tempDiv.innerHTML = hiddenInput.value;
                    contentToLoad = tempDiv.textContent || tempDiv.innerText || hiddenInput.value;
                    console.log('Loading description from hidden input, length:', contentToLoad.length);
                }
            }

            if (contentToLoad) {
                console.log('Setting description content:', contentToLoad.substring(0, 50) + '...');
                // Convert plain text to HTML if needed
                var htmlContent = contentToLoad.trim();
                
                // If content doesn't start with <, it's plain text - wrap it in <p> tags
                if (!htmlContent.startsWith('<')) {
                    htmlContent = '<p>' + htmlContent + '</p>';
                }
                
                // Set content using Quill's API - use the simplest method that works
                setTimeout(function() {
                    try {
                        // Method 1: Use dangerouslyPasteHTML (most reliable)
                        quillDescription.clipboard.dangerouslyPasteHTML(htmlContent);
                        console.log('Content set using dangerouslyPasteHTML');
                    } catch (e) {
                        console.log('Error with dangerouslyPasteHTML, trying setContents:', e);
                        try {
                            // Method 2: Convert to Delta and set
                            var delta = quillDescription.clipboard.convert(htmlContent);
                            quillDescription.setContents(delta, 'silent');
                            console.log('Content set using setContents with Delta');
                        } catch (e2) {
                            console.log('Error with setContents, trying innerHTML:', e2);
                            try {
                                // Method 3: Direct innerHTML (fallback)
                                quillDescription.root.innerHTML = htmlContent;
                                console.log('Content set using innerHTML');
                            } catch (e3) {
                                console.error('All methods failed:', e3);
                            }
                        }
                    }
                    
                    // Update hidden input with the actual Quill content
                    var hiddenInput = document.getElementById('description');
                    if (hiddenInput) {
                        hiddenInput.value = quillDescription.root.innerHTML;
                    }
                    
                    console.log('Description content loaded. Editor has content:', quillDescription.root.innerHTML.length > 0);
                    console.log('Description editor root innerHTML:', quillDescription.root.innerHTML.substring(0, 150));
                }, 100);
            } else {
                console.log('No content to load for description');
            }

            // Sync changes back to hidden input
            quillDescription.on("text-change", function () {
                var hiddenInput = document.getElementById('description');
                if (hiddenInput) {
                    hiddenInput.value = quillDescription.root.innerHTML;
                }
            });

            console.log('Description editor initialized successfully. Is editable:', !quillDescription.isEnabled());
        } catch (e) {
            console.error('Error initializing description editor:', e);
            console.error('Stack trace:', e.stack);
        }
    }
    
    console.log('=== Quill initialization complete ===');
};

// Simple, direct initialization that waits for everything
(function() {
    console.log('=== Banners.js loaded ===');
    console.log('Quill available:', typeof Quill !== 'undefined');
    console.log('Quill is function:', typeof Quill === 'function');
    console.log('initializeQuillEditors function exists:', typeof initializeQuillEditors === 'function');
    console.log('Document ready:', document.readyState);
    
    var initialized = false;
    
    function waitAndInit() {
        if (initialized) {
            console.log('Already initialized, skipping...');
            return;
        }
        
        // Check all requirements
        var quillReady = typeof Quill !== 'undefined' && typeof Quill === 'function';
        var subTitleEl = document.getElementById('sub_title_editor');
        var descEl = document.getElementById('description_editor');
        var elementsReady = !!(subTitleEl || descEl);
        var initFunctionReady = typeof initializeQuillEditors === 'function';
        
        console.log('=== Check Status ===');
        console.log('Quill ready:', quillReady);
        console.log('Elements ready:', elementsReady);
        console.log('sub_title_editor exists:', !!subTitleEl);
        console.log('description_editor exists:', !!descEl);
        console.log('initFunction ready:', initFunctionReady);
        
        // Check if Quill is already initialized (to prevent double initialization)
        var alreadyInitialized = false;
        if (subTitleEl && (subTitleEl.querySelector('.ql-container') || subTitleEl.querySelector('.ql-toolbar'))) {
            alreadyInitialized = true;
        }
        if (descEl && (descEl.querySelector('.ql-container') || descEl.querySelector('.ql-toolbar'))) {
            alreadyInitialized = true;
        }
        
        if (alreadyInitialized) {
            console.log('Quill editors already initialized, skipping banners.js initialization');
            initialized = true;
            return;
        }
        
        if (quillReady && elementsReady && initFunctionReady) {
            console.log('✓ All ready! Calling initializeQuillEditors()...');
            initialized = true;
            try {
                initializeQuillEditors();
                console.log('✓ initializeQuillEditors() called successfully');
            } catch (e) {
                console.error('✗ Error in initializeQuillEditors:', e);
                console.error('Error message:', e.message);
                console.error('Stack:', e.stack);
                initialized = false; // Allow retry on error
            }
        } else {
            // Retry after a short delay (max 50 attempts = 5 seconds)
            var attempts = waitAndInit.attempts || 0;
            waitAndInit.attempts = attempts + 1;
            if (attempts < 50) {
                setTimeout(waitAndInit, 100);
            } else {
                console.error('✗ Failed to initialize after 50 attempts');
                console.error('Final status - Quill:', quillReady, 'Elements:', elementsReady, 'Function:', initFunctionReady);
            }
        }
    }
    
    // Start checking immediately
    console.log('Starting initialization check...');
    waitAndInit();
    
    // Also try when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOMContentLoaded event fired');
            waitAndInit();
        });
    } else {
        console.log('DOM already ready, trying immediately...');
        setTimeout(waitAndInit, 100);
    }
    
    // Also try when window loads
    window.addEventListener('load', function() {
        console.log('Window load event fired');
        setTimeout(waitAndInit, 200);
    });
    
    // jQuery fallback
    if (typeof jQuery !== 'undefined') {
        jQuery(document).ready(function() {
            console.log('jQuery ready fired');
            waitAndInit();
        });
    }
})();

$('#banner-add-form').validate({
    rules: {
        title: {
            required: true,
        },
        image: {
            required: true,
        },
    },
    messages: {
        title: "Title field is required",
        image: "Image field is required",
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        // Update hidden inputs with Quill content before submission
        if (quillSubTitle) {
            $('#sub_title').val(quillSubTitle.root.innerHTML);
        }
        if (quillDescription) {
            $('#description').val(quillDescription.root.innerHTML);
        }
        //
        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/banners',
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

$('#banner-edit-form').validate({
    rules: {
        title: {
            required: true,
        },
        banner_id: {
            required: true,
        },
    },
    messages: {
        title: "Title field is required",
    },
    errorElement: 'span',
    submitHandler: function (form, event) {
        // Update hidden inputs with Quill content before submission
        if (quillSubTitle) {
            $('#sub_title').val(quillSubTitle.root.innerHTML);
        }
        if (quillDescription) {
            $('#description').val(quillDescription.root.innerHTML);
        }
        //
        var formData = new FormData($(form)[0]);
        $('.error').html('');
        var submitButton = $(form).find('[type=submit]');
        var current_btn_text = submitButton.html();
        button_loading_text = 'Saving...';
        var banner_id = $(form).find('input[name=banner_id]').val();
        // Create
        $.ajax({
            type: "POST",
            url: $('#route-for-user').val() + '/banners/' + banner_id,
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
        text = 'You want to deactivate this banner!';
        message = 'Deactivated successfully';
    }
    else {
        text = 'You want to activate this banner!';
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
                url: $("#route-for-user").val() + "/banners/change/status",
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
        text: "Are you sure, do yo want to delete the banner ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: $("#route-for-user").val() + '/banners/' + id,
                data: {
                    id: id,
                },
                success: function (data) {
                    table.ajax.reload(null, false);
                    if (data == true)
                        showMessage('success', "Banner deleted successfully");
                },
                error: function (data) {
                    showMessage("warning", "Something went wrong...");
                },
            });
        }
    })
}

