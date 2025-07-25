@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Sub Service</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="service-edit-form" method="POST">
                        @method('PUT')
                        <input type="hidden" name="sub_service_id" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Select Service</label>
                                        <select class="form-select" name="service_id">
                                            <option value="" selected disabled>---Select---</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}"
                                                    @if ($service->id == $data->service_id) selected @endif>{{ $service->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required value="{{ $data->title }}">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Sub Title</label>
                                        <input type="text" class="form-control" id="sub_title" name="sub_title"
                                            placeholder="Sub Title" required value="{{ $data->sub_title }}">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="inner_title">Inner Title</label>
                                        <input type="text" class="form-control" id="inner_title" name="inner_title"
                                            placeholder="Inner Title" required value="{{ $data->inner_title }}">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Alt Tag</label>
                                        <input type="text" class="form-control" id="alt_tag" name="alt_tag"
                                            placeholder="Alt Tag" required value="{{ $data->alt_tag }}">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ckeditor-classic">Description</label>
                                        <?php
                                        if (isset($data)) {
                                            $description = $data->description;
                                        } else {
                                            $description = '<p><br></p> ';
                                        }
                                        ?>
                                        <input type="hidden" value="{{ $description }}" id="text-content">
                                        <div id="summernote" name="content"></div>
                                        {{-- <div id="ckeditor-classic">@isset($data){!! $data->description !!}@endisset</div> --}}
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="form-label" for="ckeditor-classic">Description</label>
                                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" required>{{ $data->description }}</textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Image</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                            id="image" name="image">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Banner Alt Tag</label>
                                        <input type="text" class="form-control" id="banner_image_alt_tag"
                                            name="banner_image_alt_tag" placeholder="Banner Alt Tag" required
                                            value="{{ $data->banner_image_alt_tag }}">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Banner Image</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                            id="banner_image" name="banner_image">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Previous Image</label>
                                    <div class="avatar-preview">
                                        <img class="previous-image"
                                            src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->image }}"
                                            alt="profile-image"
                                            onerror="this.src='{{ $locationData['storage_server_path'] . $locationData['admin_assets_path'] . 'placeholder.png' }}';">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Previous Banner Image</label>
                                    <div class="avatar-preview">
                                        <img class="previous-image"
                                            src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->banner_image }}"
                                            alt="profile-image"
                                            onerror="this.src='{{ $locationData['storage_server_path'] . $locationData['admin_assets_path'] . 'placeholder.png' }}';">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/sub-services') }}"
                                        class="btn btn-outline-warning btn-rounded mb-2">
                                        <i class="ti-close"></i> Cancel
                                    </a>
                                    <button class="btn btn-outline-secondary btn-rounded mb-2" type="submit"> <i
                                            class="ti-save-alt"></i>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('quill/quill.snow-dark.css') }}">
    <style>
        div#summernote {
            min-height: 250px;
        }
    </style>
@endpush
@push('script')
    <script src="{{ asset('quill/quill.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-full-html-edit-button@1.0.1/dist/quill.htmlEditButton.min.js"></script>
    <script src="{{ asset('admin/backend/js/sub_service.js') }}"></script>
@endpush
