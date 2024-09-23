@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Service Faq</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="service-edit-form" method="POST">
                        @method('PUT')
                        <input type="hidden" name="service_faq_id" value="{{$data->id}}">
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
                                        <textarea type="text" class="form-control" id="description" name="description"
                                        placeholder="Description" required>{{$data->description}}</textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/service-faq') }}"
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
@endpush
@push('script')
    <script src="{{ asset('admin/backend/js/service-faq.js') }}"></script>
@endpush
