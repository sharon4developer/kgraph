@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="box-title">Career Branches</h4>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-outline-info btn-rounded m-3 _effect--ripple waves-effect waves-light float-end"
                                href="{{ url('admin/career-branches/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                                Add</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="branch-details-table" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created Date</th>
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
    <script src="{{ asset('admin/backend/js/career-branch.js') }}"></script>
@endpush
