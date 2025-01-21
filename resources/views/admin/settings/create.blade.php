
@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Service Points</h4>
                </div>
                <div class="card-body">
                    <form class="table-add-form" novalidate id="table-add-form" method="POST">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">What's App Number </label>
                                        <input type="text" class="form-control" id="title" name="phone"
                                            placeholder="What's App Number " required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="title">Email </label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Email " required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/settings') }}"
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
@endpush
@push('script')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script src="{{ asset('admin/backend/js/settings.js') }}"></script>
@endpush
