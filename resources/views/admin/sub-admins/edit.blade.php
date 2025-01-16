@extends('admin.layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="row stats-row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Sub Admin</h5>
                        <form id="table-edit-form" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="table_id" value="{{ $data->id }}">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Name" value="{{$data->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="email" class="form-control" id="email"
                                    placeholder="Enter Email" value="{{$data->email}}">
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleFormControlInput1">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    placeholder="Enter Phone" value="{{$data->phone}}">
                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="exampleFormControlInput1">Address</label>
                                <textarea type="text" name="address" class="form-control" id="address"
                                placeholder="Enter address">{{$data->address}}</textarea>
                            </div> --}}

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Image
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="file" name="image" class="form-control" id="image"
                                placeholder="Enter image" accept="image/*">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Previous Image</label>
                                    <div class="avatar-preview">
                                        <img class="previous-image" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->image }}" alt="profile-image" onerror="this.src='{{ $locationData['storage_server_path'].$locationData['admin_assets_path'].'placeholder.png' }}';">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Password
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group position-relative">
                                    <input type="password" class="form-control" id="passwordField" name="password" placeholder="Password">
                                    <span class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;" id="togglePassword">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">{{ __('Role') }} </label>
                                <span class="text-danger">*</span>
                                <select name="role_id" required
                                    class="form-control text-dark @if ($errors->has('role_id')) is-invalid @endif">
                                    <option selected disabled>Choose Role

                                    </option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            @if (@old('role_id', $role->id) == @$data->roles[0]->id) selected @endif>{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">{{ $errors->first('role_id') }}</div>
                            </div>
                            <br>

                            <div class="mb-0">
                                <a href="{{ url('admin/roles') }}"class="btn btn-outline-warning btn-rounded mb-2">Cancel</a>
                                <button class="btn btn-outline-secondary btn-rounded mb-2"  type="submit">Submit form</button>
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
