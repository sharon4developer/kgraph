@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="box-title">Package Faq</h4>
                        </div>

                        <div class="col-md-2">
                            <a class="btn btn-outline-info btn-rounded m-3 _effect--ripple waves-effect waves-light float-end"
                                href="{{ url('admin/package-faq/create') }}"><i class="fa fa-plus"
                                    aria-hidden="true"></i>
                                Add</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{-- <label class="form-label" for="sub_title">Select package</label> --}}
                            <select class="form-select" name="package_id" id="select-package">
                                <option value="" selected>All</option>
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->title }}</option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="package-details-table" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Package</th>
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
    <script src="{{ asset('admin/backend/js/package-faq.js') }}"></script>
@endpush
