@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="box-title">Contact Us</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="from_date">From Date:</label>
                                <input  type="date" id="from_date" class="form-control" name="from_date" value="{{ request('from_date') }}">
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="to_date">To Date:</label>
                                <input type="date" class="form-control" id="to_date" name="to_date" value="{{ request('to_date') }}">
                            <div class="valid-feedback">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="contact-details-table" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Message</th>
                                <th>Date</th>
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
    <script src="{{ asset('admin/backend/js/contact.js') }}"></script>
@endpush
