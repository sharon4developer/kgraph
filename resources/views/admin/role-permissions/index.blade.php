@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ $role->name }} - Permissions</h6>
                        <form id="table-add-role-permission-form" method="POST">
                        @csrf

                        <input type="hidden" name="table_id" value="{{$role->id}}">

                        <div class="mb-3">
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="form-check col-md-4 pl-4">

                                        <input type="checkbox" name="name[]" value="{{ $permission->name }}"
                                            id="check-{{ $permission->id }}" class="form-check-input"
                                            @if (in_array($permission->id, $rolePermissions)) checked @endif>
                                        <label class="form-check-label ml-1" for="check-{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach

                        </div><!-- Row -->
                        @if ($role->name != 'super-admin')
                            <button type="submit" class="btn btn-primary">Submit</button>
                        @endif
                        <a href="{{ url('admin/roles') }}" class="btn btn-outline-warning">Go Back</a>
                    </form>

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
