@extends('admin.layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="row stats-row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Role</h5>
                        <form id="table-add-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Name">
                            </div>
                                <br>
                            <div class="mb-0">
                                <a href="{{ url('admin/roles') }}"  class="btn btn-outline-warning btn-rounded mb-2">Cancel</a>
                                <button class="btn btn-outline-secondary btn-rounded mb-2" type="submit">Submit form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
@endpush
@push('script')
    <script src="{{ asset('admin/backend/js/roles.js') }}?v={{ config('app.version') }}"></script>
@endpush
