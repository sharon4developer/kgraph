@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Whats app number</h4>
                </div>
                <div class="card-body">
                    <form class="table-add-form" novalidate id="table-edit-form" method="POST">
                        @method('PUT')
                        <div class="row">

                            {{-- <div class="col-md-12"> --}}
                            {{-- <div class="mb-3"> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="table_id" value="{{ $data->id }}">
                                            <label class="form-label" for="title">What's App Number </label>
                                            <input type="text" class="form-control" id="title" name="phone"
                                                placeholder="What's App Number " value={{ $data->phone }}>
                                            <div class="valid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="table_id" value="{{ $data->id }}">
                                            <label class="form-label" for="title">Email </label>
                                            <input type="text" class="form-control" id="title" name="email"
                                                placeholder="Email " value={{ $data->email }}>
                                            <div class="valid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Facebook </label>
                                            <input type="text" class="form-control" id="facebook" name="facebook"
                                                placeholder="Facebook" required value={{ $data->facebook }}>
                                            <div class="valid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Instagram </label>
                                            <input type="text" class="form-control" id="instagram" name="instagram"
                                                placeholder="Instagram " required value={{ $data->instagram }}>
                                            <div class="valid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Linkedin </label>
                                            <input type="text" class="form-control" id="linkedin" name="linkedin"
                                                placeholder="Linkedin " required value={{ $data->linkedin }}>
                                            <div class="valid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Youtube </label>
                                            <input type="text" class="form-control" id="youtube" name="youtube"
                                                placeholder="Youtube " required value={{ $data->youtube }}>
                                            <div class="valid-feedback">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- </div> --}}
                            {{-- </div> --}}

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/settings') }}"
                                        class="btn btn-outline-warning btn-rounded mb-2">
                                        <i class="ti-close"></i> Cancel
                                    </a>
                                    <button class="btn btn-outline-secondary btn-rounded mb-2" type="submit"> <i
                                            class="ti-save-alt"></i>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
@endpush
@push('script')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script src="{{ asset('admin/backend/js/settings.js') }}"></script>
@endpush
