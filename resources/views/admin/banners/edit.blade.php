@extends('admin.layouts.app')
@section('content')
    @php
        $locationData = getLocationData();
    @endphp
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Banner</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="banner-edit-form" method="POST">
                        @method('PUT')
                        <input type="hidden" name="banner_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="badge_text">Badge Text</label>
                                        <input type="text" class="form-control" id="badge_text" name="badge_text"
                                            placeholder="e.g., Journey With Confidence Migrate With Us" value="{{$data->badge_text ?? ''}}">
                                        <small class="form-text text-muted">Short tagline displayed above the title</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Main heading" required value="{{$data->title}}">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title_editor">Content</label>
                                        <div class="quill-wrapper">
                                            <div id="sub_title_editor" class="quill-editor" role="textbox" aria-label="Content editor" aria-describedby="sub_title_help" style="height: 200px;"></div>
                                            <input type="hidden" name="sub_title" id="sub_title" value="{{$data->sub_title ?? ''}}" aria-hidden="true">
                                        </div>
                                        <small id="sub_title_help" class="form-text text-muted">First paragraph(s) of content</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="description_editor">Description</label>
                                        <div class="quill-wrapper">
                                            <div id="description_editor" class="quill-editor" role="textbox" aria-label="Description editor" aria-describedby="description_help" style="height: 200px;"></div>
                                            <input type="hidden" name="description" id="description" value="{{$data->description ?? ''}}" aria-hidden="true">
                                        </div>
                                        <small id="description_help" class="form-text text-muted">Additional longer content (optional)</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="alt_tag">Alt Tag</label>
                                        <input type="text" class="form-control" id="alt_tag" name="alt_tag"
                                            placeholder="Alt Tag" required value="{{ $data->alt_tag }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Image</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                            id="image" name="image">
                                        <small class="form-text text-muted">Leave empty to keep current image</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="previous_image_preview">Previous Image</label>
                                    <div class="avatar-preview" id="previous_image_preview">
                                        @php
                                            $imageUrl = (str_starts_with($data->image, 'http://') || str_starts_with($data->image, 'https://')) 
                                                ? $data->image 
                                                : $locationData['storage_server_path'].$locationData['storage_image_path'].$data->image;
                                        @endphp
                                        <img class="previous-image" src="{{ $imageUrl }}" alt="Current banner image" onerror="this.src='{{ $locationData['storage_server_path'].$locationData['admin_assets_path'].'placeholder.png' }}';" style="max-width: 200px; height: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/banners') }}"
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
    <link rel="stylesheet" type="text/css" href="{{ asset('quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('quill/quill.snow-dark.css') }}">
@endpush
@push('script')
    <script src="{{ asset('quill/quill.js') }}"></script>
    <script>
        // Verify Quill loaded
        console.log('Quill script loaded, Quill available:', typeof Quill !== 'undefined');
        if (typeof Quill === 'undefined') {
            console.error('ERROR: Quill library failed to load!');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-full-html-edit-button@1.0.1/dist/quill.htmlEditButton.min.js"></script>
    <script>
        // Initialize Quill editors with existing content
        var subTitleContent = {!! json_encode($data->sub_title ?? '') !!};
        var descriptionContent = {!! json_encode($data->description ?? '') !!};
        
        // Debug logging
        console.log('Sub Title Content:', subTitleContent);
        console.log('Description Content:', descriptionContent);
        console.log('Sub Title Length:', subTitleContent ? subTitleContent.length : 0);
        console.log('Description Length:', descriptionContent ? descriptionContent.length : 0);
        console.log('Quill available after content vars:', typeof Quill !== 'undefined');
    </script>
    <script src="{{ asset('admin/backend/js/banners.js') }}"></script>
    <script>
        // Direct inline initialization - doesn't depend on function being accessible
        console.log('=== Direct Quill Initialization ===');
        console.log('Quill available:', typeof Quill !== 'undefined');
        console.log('sub_title_editor:', !!document.getElementById('sub_title_editor'));
        console.log('description_editor:', !!document.getElementById('description_editor'));
        
        var quillInitialized = false;
        
        function initQuillDirectly() {
            // Prevent double initialization
            if (quillInitialized) {
                console.log('Already initialized, skipping...');
                return;
            }
            
            if (typeof Quill === 'undefined') {
                console.log('Quill not ready, retrying...');
                setTimeout(initQuillDirectly, 100);
                return;
            }
            
            var subTitleEl = document.getElementById('sub_title_editor');
            var descEl = document.getElementById('description_editor');
            
            if (!subTitleEl && !descEl) {
                console.log('Elements not ready, retrying...');
                setTimeout(initQuillDirectly, 100);
                return;
            }
            
            // Check if already initialized
            if (subTitleEl && (subTitleEl.querySelector('.ql-container') || subTitleEl.querySelector('.ql-toolbar'))) {
                console.log('Editors already initialized, skipping...');
                quillInitialized = true;
                return;
            }
            
            if (descEl && (descEl.querySelector('.ql-container') || descEl.querySelector('.ql-toolbar'))) {
                console.log('Editors already initialized, skipping...');
                quillInitialized = true;
                return;
            }
            
            console.log('Initializing Quill editors directly...');
            quillInitialized = true;
            
            // Initialize sub_title editor
            if (subTitleEl && !subTitleEl.querySelector('.ql-container') && !subTitleEl.querySelector('.ql-toolbar')) {
                try {
                    subTitleEl.innerHTML = '';
                    var quillSubTitle = new Quill('#sub_title_editor', {
                        theme: "snow",
                        modules: {
                            toolbar: [
                                [{ 'header': [1, 2, 3, false] }],
                                ['bold', 'italic', 'underline', 'strike'],
                                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                [{ 'color': [] }, { 'background': [] }],
                                [{ 'align': [] }],
                                ["link", "image", "video"],
                                ["clean"],
                            ],
                        },
                        placeholder: "Enter content...",
                    });
                    
                    // Load content
                    var content = typeof subTitleContent !== 'undefined' && subTitleContent ? subTitleContent : '';
                    if (content && !content.startsWith('<')) {
                        content = '<p>' + content + '</p>';
                    }
                    if (content) {
                        quillSubTitle.clipboard.dangerouslyPasteHTML(content);
                        document.getElementById('sub_title').value = quillSubTitle.root.innerHTML;
                    }
                    
                    // Sync changes
                    quillSubTitle.on("text-change", function () {
                        document.getElementById('sub_title').value = quillSubTitle.root.innerHTML;
                    });
                    
                    console.log('✓ Sub title editor initialized');
                } catch (e) {
                    console.error('Error initializing sub_title:', e);
                }
            }
            
            // Initialize description editor
            if (descEl && !descEl.querySelector('.ql-container') && !descEl.querySelector('.ql-toolbar')) {
                try {
                    descEl.innerHTML = '';
                    var quillDescription = new Quill('#description_editor', {
                        theme: "snow",
                        modules: {
                            toolbar: [
                                [{ 'header': [1, 2, 3, false] }],
                                ['bold', 'italic', 'underline', 'strike'],
                                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                [{ 'color': [] }, { 'background': [] }],
                                [{ 'align': [] }],
                                ["link", "image", "video"],
                                ["clean"],
                            ],
                        },
                        placeholder: "Enter description...",
                    });
                    
                    // Load content
                    var content = typeof descriptionContent !== 'undefined' && descriptionContent ? descriptionContent : '';
                    if (content && !content.startsWith('<')) {
                        content = '<p>' + content + '</p>';
                    }
                    if (content) {
                        quillDescription.clipboard.dangerouslyPasteHTML(content);
                        document.getElementById('description').value = quillDescription.root.innerHTML;
                    }
                    
                    // Sync changes
                    quillDescription.on("text-change", function () {
                        document.getElementById('description').value = quillDescription.root.innerHTML;
                    });
                    
                    console.log('✓ Description editor initialized');
                } catch (e) {
                    console.error('Error initializing description:', e);
                }
            }
        }
        
        // Start initialization
        setTimeout(initQuillDirectly, 500);
        
        // Also try on window load
        window.addEventListener('load', function() {
            setTimeout(initQuillDirectly, 300);
        });
    </script>
@endpush
