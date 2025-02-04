@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Package Point</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="package-add-form" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Select Package</label>
                                        <select class="form-select" name="package_id">
                                            <option value="" selected disabled>---Select---</option>
                                            @foreach ($packages as $package)
                                                <option value="{{$package->id}}">{{$package->title}}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ckeditor-classic">Description</label>
                                        <div id="summernote" name="content"></div>
                                        {{-- <div id="ckeditor-classic"></div> --}}
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/package-points') }}"
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
{{-- <script src="{{ asset('admin/theme/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
<script src="{{ asset('admin/theme/assets/js/pages/form-editor.init.js')}}"></script> --}}
<script src="{{ asset('quill/quill.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-full-html-edit-button@1.0.1/dist/quill.htmlEditButton.min.js"></script>
<script src="{{ asset('admin/backend/js/package-points.js') }}"></script>
@endpush
