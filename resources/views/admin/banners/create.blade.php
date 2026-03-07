@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Banner</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="banner-add-form" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="badge_text">Badge Text</label>
                                        <input type="text" class="form-control" id="badge_text" name="badge_text"
                                            placeholder="e.g., Journey With Confidence Migrate With Us">
                                        <small class="form-text text-muted">Short tagline displayed above the title</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Main heading" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Content</label>
                                        <textarea id="sub_title" name="sub_title" aria-describedby="sub_title_help"></textarea>
                                        <small id="sub_title_help" class="form-text text-muted">First paragraph(s) of content</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea id="description" name="description" aria-describedby="description_help"></textarea>
                                        <small id="description_help" class="form-text text-muted">Additional longer content (optional)</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="alt_tag">Alt Tag</label>
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
                                        <label class="form-label" for="image">Image</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                            id="image" name="image" required>
                                        <small class="form-text text-muted">Or use external URL in image field after creation</small>
                                        <div class="valid-feedback">
                                        </div>
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
<style>
    #sub_title, #description {
        min-height: 200px;
    }
</style>
@endpush
@push('script')
@include('admin.layouts.includes.tinymce-script')
<script src="{{ asset('admin/backend/js/banners.js') }}"></script>
<script>
$(document).ready(function() {
    // Wait for TinyMCE to be fully loaded before initializing multiple editors
    function initializeEditors() {
        if (typeof tinymce === 'undefined') {
            setTimeout(initializeEditors, 100);
            return;
        }
        
        // Initialize TinyMCE for sub_title (compact editor)
        initTinyMCE('#sub_title', TINYMCE_COMPACT_CONFIG);
        
        // Initialize second editor with a small delay to ensure first one is ready
        setTimeout(function() {
            initTinyMCE('#description', TINYMCE_COMPACT_CONFIG);
        }, 200);
    }
    
    initializeEditors();
});
</script>
@endpush
