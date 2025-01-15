@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="row">
            <div class="col-md-10">
                <h4 class="box-title">Setting</h4>
                <hr>
            </div>
            @if( $count == 0)
            <div class="col-md-2">
                <a class="btn btn-outline-info btn-rounded m-3 _effect--ripple waves-effect waves-light float-end"
                    href="{{ url('admin/settings/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
            </div>
@endif
        </div>
        <div class="row stats-row">
            <div class="table-responsive">
                <table id="table-details" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Number</th>
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
    <script src="{{ asset('admin/backend/js/settings.js') }}?v={{ config('app.version') }}"></script>
@endpush
