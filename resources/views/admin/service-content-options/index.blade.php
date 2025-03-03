@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="box-title">Service Contents</h4>
                        </div>

                        <div class="col-md-2">
                            <a class="btn btn-outline-info btn-rounded m-3 _effect--ripple waves-effect waves-light float-end"
                                href="{{ url('admin/service-content-options/create') }}"><i class="fa fa-plus"
                                    aria-hidden="true"></i>
                                Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="service_id">Select Service</label>
                                <select class="form-select" name="service_id" id="select-service">
                                    <option value="" selected>Select a Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="sub_service_point_id">Select Service Point</label>
                                <select class="form-select" name="sub_service_point_id" id="select-sub-service-point">
                                    <option value="" selected>Select a Service Point</option>
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table id="service-details-table" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Service Point</th>
                                <th>Title</th>
                                <th>Options</th>
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
    <script src="{{ asset('admin/backend/js/service-content-options.js') }}"></script>
@endpush
