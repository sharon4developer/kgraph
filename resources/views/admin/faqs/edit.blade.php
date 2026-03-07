@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Faq</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="faq-edit-form" method="POST">
                        @method('PUT')
                        <input type="hidden" name="faq_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-md-12">
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
                                        <label class="form-label" for="description">Description</label>
                                        <textarea id="description" name="description" required>{{ $data->description }}</textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<style>
    #description {
        min-height: 200px;
    }
</style>
@endpush
@push('script')
@include('admin.layouts.includes.tinymce-script')
<script src="{{ asset('admin/backend/js/faq.js') }}"></script>
<script>
$(document).ready(function() {
    // Initialize TinyMCE for description
    initTinyMCE('#description', TINYMCE_STANDARD_CONFIG);
});
</script>
@endpush
