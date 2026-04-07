@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Blog</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="blog-add-form" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Name" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="date">Date</label>
                                        <input type="date" class="form-control" id="date" name="date"
                                            placeholder="Date" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="time">Time</label>
                                        <input type="time" class="form-control" id="time" name="time"
                                            placeholder="Time" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description</label>
                                        
                                        {{-- Import Options --}}
                                        <div class="card mb-3 border-info">
                                            <div class="card-header bg-info text-white">
                                                <i class="ti-info-alt"></i> Import Content Options
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Import from Google Docs</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="google-docs-url" 
                                                                       placeholder="Paste Google Docs URL">
                                                                <button type="button" class="btn btn-primary" id="import-google-docs">
                                                                    <i class="ti-import"></i> Import
                                                                </button>
                                                            </div>
                                                            <small class="text-muted">Paste the Google Docs shareable link (document must be shared with "Anyone with the link")</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Upload Word Document</label>
                                                            <input type="file" class="form-control" id="docx-file" accept=".docx,.doc">
                                                            <small class="text-muted">Upload .docx or .doc file</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Tips for Copy-Paste</label>
                                                            <div class="alert alert-info mb-0 p-2">
                                                                <small>
                                                                    <strong>Tips:</strong><br>
                                                                    • Copy-paste from Google Docs works perfectly<br>
                                                                    • Tables and styles are preserved automatically<br>
                                                                    • Use Code view button to edit raw HTML if needed
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <textarea id="summernote" name="description"></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="topics">Topics</label>
                                        <textarea type="text" class="form-control" id="topics" name="topics"
                                            placeholder="Topics" required></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Alt Tag</label>
                                        <input type="text" class="form-control" id="alt_tag" name="alt_tag"
                                            placeholder="Alt Tag" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">User Alt Tag</label>
                                        <input type="text" class="form-control" id="user_alt_tag" name="user_alt_tag"
                                            placeholder="User Alt Tag" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Image</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                            id="image" name="image" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="user_image">User Image</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                            id="user_image" name="user_image" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/blogs') }}"
                                        class="btn btn-outline-warning btn-rounded mb-2">
                                        <i class="ti-close"></i> Cancel
                                    </a>
                                    <button class="btn btn-outline-secondary btn-rounded mb-2" type="submit"> <i class="ti-save-alt"></i>
                                        Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
@push('style')
<style>
    #summernote {
        min-height: 400px;
    }
</style>
@endpush
@push('script')
<script src="https://cdn.tiny.cloud/1/uuplv3gdf7kqs57rfobqxdrreyfr5dxkotezevdekz1wscug/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.6.0/mammoth.browser.min.js"></script>
<script src="{{ asset('admin/backend/js/blogs.js') }}"></script>
<script>
$(document).ready(function() {
    // Initialize TinyMCE
    tinymce.init({
        selector: '#summernote',
        height: 600,
        menubar: true,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic forecolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | table | link image | code | help',
        content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; }',
        paste_as_text: false,
        paste_merge_formats: true,
        paste_remove_styles_if_webkit: false,
        paste_strip_class_attributes: "none",
        table_default_attributes: {
            border: '1'
        },
        table_default_styles: {
            'border-collapse': 'collapse',
            'width': '100%',
            'border': '1px solid #ddd'
        },
        table_class_list: [
            {title: 'None', value: ''},
            {title: 'Table', value: 'table table-bordered'}
        ],
        paste_postprocess: function(plugin, args) {
            args.node.querySelectorAll('table, td, th, col, colgroup').forEach(function(el) {
                el.style.removeProperty('width');
                el.style.removeProperty('min-width');
                el.removeAttribute('width');
            });
            args.node.querySelectorAll('table').forEach(function(el) {
                el.style.width = '100%';
            });
        },
        setup: function(editor) {
            editor.on('init', function() {
                // Setup import handlers after editor is ready
                setupImportHandlers();
            });
        }
    });
    
    // Function to setup import handlers
    function setupImportHandlers() {
        // Google Docs Import Handler
        $('#import-google-docs').on('click', function() {
            var url = $('#google-docs-url').val().trim();
            if (!url) {
                alert('Please enter a Google Docs URL');
                return;
            }
            
            // Show loading
            var btn = $(this);
            var originalText = btn.html();
            btn.html('<span class="spinner-border spinner-border-sm"></span> Loading...');
            btn.prop('disabled', true);
            
            // Use backend endpoint to avoid CORS issues
            $.ajax({
                url: $("#route-for-user").val() + '/blogs/import/google-docs',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({ url: url }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        try {
                            var editor = tinymce.get('summernote');
                            if (editor) {
                                // Set content directly - TinyMCE preserves HTML/CSS/tables
                                editor.setContent(data.html);
                                
                                // Show success message
                                if (typeof showMessage === 'function') {
                                    showMessage('success', data.message || 'Content imported successfully from Google Docs!');
                                } else {
                                    alert('Content imported successfully!');
                                }
                                
                                // Clear the URL input
                                $('#google-docs-url').val('');
                                
                                // Scroll to editor
                                $('html, body').animate({
                                    scrollTop: $('#summernote').offset().top - 100
                                }, 500);
                            } else {
                                alert('Editor not ready. Please wait a moment and try again.');
                            }
                        } catch (error) {
                            console.error('Error inserting content:', error);
                            alert('Failed to insert content. Please try again.');
                        }
                    } else {
                        alert(data.message || 'Failed to import from Google Docs');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    var errorMsg = 'Failed to import from Google Docs. ';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg += xhr.responseJSON.message;
                    } else {
                        errorMsg += 'Please ensure:\n1. The document is publicly accessible (share with "Anyone with the link")\n2. Or use copy-paste method';
                    }
                    alert(errorMsg);
                },
                complete: function() {
                    btn.html(originalText);
                    btn.prop('disabled', false);
                }
            });
        });

        // Word Document Upload Handler
        $('#docx-file').on('change', function(e) {
            var file = e.target.files[0];
            if (!file) return;
            
            if (!file.name.match(/\.(docx|doc)$/i)) {
                alert('Please upload a .docx or .doc file');
                $(this).val('');
                return;
            }
            
            var reader = new FileReader();
            reader.onload = function(e) {
                var arrayBuffer = e.target.result;
                
                // Show loading
                if (typeof showMessage === 'function') {
                    showMessage('info', 'Converting document...');
                }
                
                // Use mammoth.js to convert DOCX to HTML
                if (typeof mammoth !== 'undefined') {
                    mammoth.convertToHtml({arrayBuffer: arrayBuffer})
                        .then(function(result) {
                            var html = result.value;
                            var warnings = result.messages;
                            
                            try {
                                var editor = tinymce.get('summernote');
                                if (editor) {
                                    // Set content directly - TinyMCE preserves HTML/CSS/tables
                                    editor.setContent(html);
                                    
                                    if (typeof showMessage === 'function') {
                                        showMessage('success', 'Document imported successfully!');
                                    } else {
                                        alert('Document imported successfully!');
                                    }
                                    
                                    if (warnings.length > 0) {
                                        console.warn('Conversion warnings:', warnings);
                                    }
                                    
                                    // Clear file input
                                    $('#docx-file').val('');
                                    
                                    // Scroll to editor
                                    $('html, body').animate({
                                        scrollTop: $('#summernote').offset().top - 100
                                    }, 500);
                                } else {
                                    alert('Editor not ready. Please wait a moment and try again.');
                                }
                            } catch (error) {
                                console.error('Error inserting content:', error);
                                alert('Failed to insert content. Please try copying and pasting manually.');
                            }
                        })
                        .catch(function(error) {
                            console.error('Error converting document:', error);
                            alert('Failed to convert document. Please try copying and pasting the content manually.');
                            $('#docx-file').val('');
                        });
                } else {
                    alert('Document converter not loaded. Please refresh the page.');
                    $('#docx-file').val('');
                }
            };
            
            reader.readAsArrayBuffer(file);
        });
    }
});
</script>
@endpush
