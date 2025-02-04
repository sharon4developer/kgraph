@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Privacy Policy</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="privacy-add-form" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ckeditor-classic">Description</label>
                                        <?php
                                        if(isset($data)) $description =  $data->description; else  $description =  '<p><br></p> '
                                        ?>
                                        <input type="hidden" value="{{$description}}" id="text-content">
                                        <div id="summernote" name="content"></div>
                                        {{-- <div id="ckeditor-classic">@isset($data){!! $data->description !!}@endisset</div> --}}
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
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
        min-height: 250px;
    }
</style>
@endpush
@push('script')
{{-- <script src="{{ asset('admin/theme/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
<script src="{{ asset('admin/theme/assets/js/pages/form-editor.init.js')}}"></script> --}}
<script src="{{ asset('quill/quill.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-full-html-edit-button@1.0.1/dist/quill.htmlEditButton.min.js"></script>
<script src="{{ asset('admin/backend/js/privacy-policy.js') }}"></script>
@endpush
