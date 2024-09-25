@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="box-title">Journey</h4>
                        </div>
                        @if($count == 0)
                        <div class="col-md-2">
                            <a class="btn btn-outline-info btn-rounded m-3 _effect--ripple waves-effect waves-light float-end"
                                href="{{ url('admin/journey/create') }}"><i class="fa fa-plus"
                                    aria-hidden="true"></i>
                                Add</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table id="journey-details-table" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Years of Experience</th>
                                <th>Employees</th>
                                <th>Google Rating</th>
                                <th>Offices</th>
                                <th>Customers Served</th>
                                <th>Active Cases</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@push('style')
@endpush
@push('script')
    <script src="{{ asset('admin/backend/js/journey.js') }}"></script>
@endpush
