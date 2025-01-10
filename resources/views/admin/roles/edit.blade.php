@extends('admin.layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="row stats-row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Country</h5>
                        <form id="table-edit-form" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="table_id" value="{{ $data->id }}">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Name" value="{{$data->name}}">
                            </div>

                            <div class="mb-0">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                                <a href="{{ url('admin/roles') }}" class="btn btn-danger">Cancel</a>
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
