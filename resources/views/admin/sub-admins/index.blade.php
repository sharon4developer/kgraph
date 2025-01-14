@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="row">
            <div class="col-md-10">
                <h4 class="box-title">Sub Admin</h4>
                <hr>
            </div>

            <div class="col-md-2">
                <a class="btn btn-outline-info btn-rounded m-3 _effect--ripple waves-effect waves-light float-end"
                    href="{{ url('admin/sub-admin/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
            </div>

        </div>
        <div class="row stats-row">
            <div class="table-responsive">
                <table id="table-details" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('style')
@endpush
@push('script')
    <script src="{{ asset('admin/backend/js/sub-admin.js') }}?v={{ config('app.version') }}"></script>
@endpush
