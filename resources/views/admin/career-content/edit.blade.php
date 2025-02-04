@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Career Contents</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="career-edit-form" method="POST">
                        @method('PUT')
                        <input type="hidden" name="career_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required value="{{$data->title}}">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ckeditor-classic">Sub Title</label>
                                        <textarea type="text" class="form-control" id="sub_title" name="sub_title"
                                        placeholder="Sub Title" required>{{$data->sub_title}}</textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ckeditor-classic">Description</label>
                                        <input type="hidden" value="{{ $data->description }}" id="text-content">
                                        <div id="summernote" name="content"></div>
                                        {{-- <textarea rows="15" class="form-control" name="description" id="summernote" required>{!!$data->description!!}</textarea> --}}
                                        {{-- <div id="ckeditor-classic">{!!$data->description!!}</div> --}}
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/career-contents') }}"
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
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet"> --}}
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script> --}}
<script src="{{ asset('quill/quill.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-full-html-edit-button@1.0.1/dist/quill.htmlEditButton.min.js"></script>
<script src="{{ asset('admin/backend/js/career-contents.js') }}"></script>
@endpush
