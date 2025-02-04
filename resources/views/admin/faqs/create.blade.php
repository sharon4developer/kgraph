@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Faq</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="faq-add-form" method="POST">
                        <div class="row">
                            <div class="col-md-12">
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
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ckeditor-classic">Description</label>
                                        {{-- <textarea type="text" class="form-control" id="description" name="description"
                                        placeholder="Description" required></textarea> --}}
                                        <div id="summernote" name="content"></div>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/faq') }}"
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
<link rel="stylesheet" type="text/css"
href="{{ asset('quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css"
href="{{ asset('quill/quill.snow-dark.css') }}">
<style>
    div#summernote {
        min-height: 200px;
    }
</style>
@endpush
@push('script')
<script src="{{ asset('quill/quill.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-full-html-edit-button@1.0.1/dist/quill.htmlEditButton.min.js"></script>
<script src="{{ asset('admin/backend/js/faq.js') }}"></script>
@endpush
