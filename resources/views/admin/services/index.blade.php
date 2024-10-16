@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="box-title">Services</h4>
                        </div>

                        <div class="col-md-2">
                            <a class="btn btn-outline-info btn-rounded m-3 _effect--ripple waves-effect waves-light float-end"
                                href="{{ url('admin/services/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                                Add</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{-- <label class="form-label" for="sub_title">Select Service Category</label> --}}
                            <select class="form-select" name="service_category_id" id="select-service-category">
                                <option value="" selected>All</option>
                                @foreach ($serviceCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="service-details-table" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Service</th>
                                <th>Title</th>
                                <th>Image</th>
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
    <script src="{{ asset('admin/backend/js/service.js') }}"></script>
@endpush
