@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Service Points</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="table-edit-form" method="POST">
                        @method('PUT')

                        <input type="hidden" name="table_id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="study_banner_image">Banner Image <span class="text-danger">*</span></label>
                            <input type="file" name="study_banner_image" class="form-control" id="study_banner_image"
                                placeholder="Enter image" accept="image/*">
                            @if ($data->study_banner_image)
                                <div class="form-group">
                                    <label>Previous Image</label>
                                    <div class="avatar-preview">
                                        <img class="previous-image"
                                            src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->study_banner_image }}"
                                            alt="profile-image"
                                            onerror="this.src='{{ $locationData['storage_server_path'] . $locationData['admin_assets_path'] . 'placeholder.png' }}';">

                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {{-- <label for="study_banner_title">Banner Description <span class="text-danger">*</span></label> --}}
                            {{-- <input type="text" name="banner_description" class="form-control" id="banner_description"
                            value="{{ old('banner_description', $data->banner_description) }}"      placeholder="Enter the title"> --}}
                            <label>Banner Description <span class="text-danger">*</span></label>
                            <input type="hidden" name="banner_description" id="banner_description"
                                value="{{ old('banner_description', $data->banner_description) }}">
                            <div id="banner_description_editor" class="quill-editor">
                                {!! old('banner_description', $data->banner_description) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="study_banner_title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="study_banner_title" class="form-control" id="study_banner_title"
                                value="{{ old('study_banner_title', $data->study_banner_title) }}"
                                placeholder="Enter the title">
                        </div>

                        <div class="form-group">
                            <label for="sub_content_title">Sub content title <span class="text-danger">*</span></label>
                            <input type="text" name="sub_content_title" class="form-control" id="sub_content_title"
                                value="{{ old('sub_content_title', $data->sub_content_title) }}"
                                placeholder="Enter Sub content title">
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                    {{-- <label class="form-label" for="sub_content_description">Sub content Description</label> --}}
                                    {{-- <textarea class="form-control" id="sub_content_description" name="sub_content_description" placeholder="Description">{{ old('sub_content_description', $data->sub_content_description) }}</textarea> --}}
                                    <label>Sub Content Description</label>
                                    <input type="hidden" name="sub_content_description" id="sub_content_description"
                                        value="{{ old('sub_content_description', $data->sub_content_description) }}">
                                    <div id="sub_content_description_editor">{!! $data->sub_content_description !!}</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sub_image">Sub Image <span class="text-danger">*</span></label>
                            <input type="file" name="sub_image" class="form-control" id="sub_image"
                                placeholder="Enter image" accept="image/*">
                            @if ($data->sub_image)
                                <div class="form-group">
                                    <label>Previous Image</label>
                                    <div class="avatar-preview">
                                        <img class="previous-image"
                                            src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $data->sub_image }}"
                                            alt="profile-image"
                                            onerror="this.src='{{ $locationData['storage_server_path'] . $locationData['admin_assets_path'] . 'placeholder.png' }}';">
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="package_title">Package title <span class="text-danger">*</span></label>
                            <input type="text" name="package_title" class="form-control" id="package_title"
                                value="{{ old('package_title', $data->package_title) }}" placeholder="Enter Package title">
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-group">
                                    {{-- <label class="form-label" for="package_description">Package Description</label>
                                    <textarea class="form-control" id="package_description" name="package_description[]" placeholder="Description">{{ $data->package_description }}</textarea> --}}
                                    <label>Package Description <span class="text-danger">*</span></label>
                                    <input type="hidden" name="package_description" id="package_description"
                                        value="{{ old('package_description', $data->package_description) }}">
                                    <div id="package_description_editor" class="quill-editor">
                                        {!! old('package_description', $data->package_description) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Show only one empty input field for new entry -->

                        @foreach ($data->packages as $key => $package)
                            <div class="list">
                                <div class="form-group">
                                    <label for="package_list_title">Packages List Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="package_list_title[]" class="form-control"
                                        placeholder="Enter Title" value="{{ $package->package_list_title }}">
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        {{-- <div class="form-group">
                                            <label class="form-label">Packages List Description</label>
                                            <textarea class="form-control" name="package_list_description[]" placeholder="Description">
                        {{ $package->package_list_description }}
                    </textarea>
                                        </div> --}}
                                        <div class="form-group">
                                            <label>Packages List Description <span class="text-danger">*</span></label>
                                            <input type="hidden" name="package_list_description[]"
                                                id="package_list_description_{{ $key }}"
                                                value="{{ $package->package_list_description }}">
                                            <div id="package_list_description_{{ $key }}_editor"
                                                class="quill-editor">
                                                {!! $package->package_list_description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Show Remove Button only if more than 1 package exists -->
                                @if (count($data->packages) > 1)
                                    <button type="button" class="btn btn-danger remove-package"
                                        data-id="{{ $package->id }}">Remove</button>
                                @endif
                            </div>
                        @endforeach

                        <button type="button" id="addMore" class="btn btn-primary mt-2">Add More</button>

                        <!-- Package Container -->
                        <div id="packageContainer"></div>

                        <div id="packageContainer"></div>

                        <div class="form-group">
                            <label for="cities_list_place">City Title <span class="text-danger">*</span></label>
                            <input type="text" name="cities_title" class="form-control"
                                placeholder="Enter City Title"
                                value="{{ old('cities_title', $data->cities->first()->cities_title ?? '') }}">
                        </div>

                        {{-- City --}}
                        <div id="city">
                            @foreach ($data->cities as $city)
                                <div class="city">
                                    <div class="form-group">
                                        <label for="cities_list_image">City List Image <span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="cities_list_image[]" class="form-control"
                                            accept="image/*">


                                        @if ($city->cities_list_image)
                                            <div class="form-group">
                                                <label>Previous Image</label>
                                                <div class="avatar-preview">
                                                    <img class="previous-image"
                                                        src="{{ $locationData['storage_server_path'] . $locationData['storage_image_path'] . $city->cities_list_image }}"
                                                        alt="profile-image"
                                                        onerror="this.src='{{ $locationData['storage_server_path'] . $locationData['admin_assets_path'] . 'placeholder.png' }}';">

                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="cities_list_place">City List Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="cities_list_place[]" class="form-control"
                                            placeholder="Enter City Title"
                                            value="{{ old('cities_list_place', $city->cities_list_place) }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" id="addMorecity" class="btn btn-primary mt-2">Add More City</button>

                        <div id="faqContainer">
                            @foreach ($data->faqs as $key => $faq)
                                <div class="faqList">
                                    <div class="form-group">
                                        <label for="faq_question">Faq Question <span class="text-danger">*</span></label>
                                        <input type="text" name="faq_question[]" class="form-control"
                                            placeholder="Enter the Question"
                                            value="{{ old('faq_question', $faq->faq_question) }}">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="faq_answer">Faq Answer <span class="text-danger">*</span></label>
                                        <input type="text" name="faq_answer[]" class="form-control"
                                            placeholder="Enter the Answer"
                                            value="{{ old('faq_answer', $faq->faq_answer) }}">
                                    </div> --}}

                                    <div class="form-group">
                                        <label>FAQ Answer <span class="text-danger">*</span></label>
                                        <input type="hidden" name="faq_answer[]" id="faq_answer_{{ $key }}"
                                            value="{{ $faq->faq_answer }}">
                                        <div id="faq_answer_{{ $key }}_editor" class="quill-editor">
                                            {!! $faq->faq_answer !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" id="addMoreFaq" class="btn btn-primary mt-2">Add More Faq</button>

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3"><br><br>
                                    <a
                                        href="{{ url('admin/study') }}"class="btn btn-outline-warning btn-rounded mb-2">Cancel</a>
                                    <button class="btn btn-outline-secondary btn-rounded mb-2" type="submit">
                                        <i class="ti-save-alt"></i> Save
                                    </button>
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
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
 --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('quill/quill.snow-dark.css') }}">
    <style>
        div#summernote {
            min-height: 200px;
        }
    </style>
@endpush
@push('script')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script> --}}
    <script src="{{ asset('quill/quill.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-full-html-edit-button@1.0.1/dist/quill.htmlEditButton.min.js"></script>
    <script src="{{ asset('admin/backend/js/study.js') }}"></script>
@endpush
