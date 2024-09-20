@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Who We Are</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="who-we-are-edit-form" method="POST">
                        @method('PUT')
                        <input type="hidden" name="who_we_are_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required  value="{{$data->title}}">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">File</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp,.mp4,.mov,.avi,.mkv,.wmv,.webm" class="form-control"
                                            id="file" name="file">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Previous File</label>
                                    <div class="avatar-preview">
                                        @if($data->type ==1)
                                        <img class="previous-image" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->file }}" alt="profile-image" onerror="this.src='{{ $locationData['storage_server_path'].$locationData['admin_assets_path'].'placeholder.png' }}';">
                                        @else
                                        <video width="320" height="240" controls>
                                            <source src="{{ $locationData['storage_server_path'].$locationData['storage_video_path'].$data->file }}" type="video/mp4">
                                            <source src="{{ $locationData['storage_server_path'].$locationData['storage_video_path'].$data->file }}" type="video/ogg">
                                            Your browser does not support the video tag.
                                          </video>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/who-we-are') }}"
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
            <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
@push('style')
@endpush
@push('script')
    <script src="{{ asset('admin/backend/js/who-we-are.js') }}"></script>
@endpush
