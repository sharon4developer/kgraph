@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Service Points</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="service-edit-form" method="POST">
                        @method('PUT')
                        <input type="hidden" name="service_point_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Select Service</label>
                                        <select class="form-select" name="service_id">
                                            <option value="" selected disabled>---Select---</option>
                                            @foreach ($services as $service)
                                                <option value="{{$service->id}}" @if($service->id == $data->service_id) selected @endif>{{$service->title}}</option>
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
                                            placeholder="Title" required  value="{{$data->title}}">
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
                                        {{-- <textarea rows="15" class="form-control" name="description" id="summernote" required>{!!$data->description!!}</textarea> --}}
                                        {{-- <div id="ckeditor-classic">{!!$data->description!!}</div> --}}
                                        <div id="summernote" name="content"></div>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/service-points') }}"
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
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
 --}}
 <link rel="stylesheet" type="text/css"
 href="{{ asset('quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css"
 href="{{ asset('quill/quill.snow-dark.css') }}">
 <style>
    div#summernote {
        min-height: 250px;
    }
</style>
@endpush
@push('script')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script> --}}
<script src="{{ asset('quill/quill.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-full-html-edit-button@1.0.1/dist/quill.htmlEditButton.min.js"></script>
<script src="{{ asset('admin/backend/js/service-points.js') }}"></script>
@endpush
