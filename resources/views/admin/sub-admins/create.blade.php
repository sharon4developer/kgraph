@extends('admin.layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="row stats-row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Sub Admin</h5>
                        <form id="table-add-form" method="POST" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name <span class="text-danger">*</span></label>

                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Name">

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">email
                                      <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    placeholder="Enter Phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Address</label>
                                <textarea type="text" name="address" class="form-control" id="address"
                                placeholder="Enter address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Image
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="file" name="image" class="form-control" id="image"
                                placeholder="Enter image" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Password
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="exampleFormControlInput2">{{ __('Role') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="role_id" required
                                    class="form-control text-dark @if ($errors->has('role_id')) is-invalid @endif">
                                    <option selected disabled>Choose Role
                                        <span class="text-danger">*</span>
                                    </option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            @if (@old('role_id')) selected @endif>
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">{{ $errors->first('role_id') }}</div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <a type="button" href="{{ url('admin/sub-admin') }}"
                                            class="btn btn-outline-warning btn-rounded mb-2">
                                            <i class="ti-close"></i> Cancel
                                        </a>
                                        <button class="btn btn-outline-secondary btn-rounded mb-2" type="submit"> <i class="ti-save-alt"></i>
                                            Save</button>
                                    </div>

                                </div>
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
    <script src="{{ asset('admin/backend/js/sub-admin.js') }}?v={{ config('app.version') }}"></script>
@endpush
