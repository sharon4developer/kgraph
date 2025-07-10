@extends('admin.layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="row stats-row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add </h5>
                        <form id="table-add-form" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="study_banner_image">Banner Image <span class="text-danger">*</span></label>
                                <input type="file" name="study_banner_image" class="form-control" id="study_banner_image"
                                    placeholder="Enter image" accept="image/*">
                            </div>
                            <div class="form-group">
                                {{-- <label for="study_banner_title">Banner Description <span
                                        class="text-danger">*</span></label> --}}

                                <label for="banner_description">Banner Description <span
                                        class="text-danger">*</span></label>
                                <div class="quill-wrapper">
                                    <div id="banner_description_editor" class="quill-editor" style="height: 200px;"></div>
                                    <input type="hidden" name="banner_description" id="banner_description">
                                </div>
                                {{-- <textarea class="form-control" id="sub_content_description" name="banner_description"
                                       placeholder="Description" ></textarea> --}}

                            </div>

                            <div class="form-group">
                                <label for="sub_content_title">Sub content title <span class="text-danger">*</span></label>
                                <input type="text" name="sub_content_title" class="form-control" id="sub_content_title"
                                    placeholder="Enter Sub content title">
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    {{-- <div class="form-group">
                                        <label class="form-label" for="sub_content_description">Sub content
                                            Description</label>
                                        <textarea class="form-control" id="sub_content_description" name="sub_content_description" placeholder="Description"></textarea>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="sub_content_description">Sub Content Description</label>
                                        <div class="quill-wrapper">
                                            <div id="sub_content_description_editor" class="quill-editor"
                                                style="height: 200px;"></div>
                                            <input type="hidden" name="sub_content_description"
                                                id="sub_content_description">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sub_image">Sub Image <span class="text-danger">*</span></label>
                                <input type="file" name="sub_image" class="form-control" id="sub_image"
                                    placeholder="Enter image" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label for="package_title">Package title <span class="text-danger">*</span></label>
                                <input type="text" name="package_title" class="form-control" id="package_title"
                                    placeholder="Enter Package title">
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    {{-- <div class="form-group">
                                        <label class="form-label" for="package_description">Package Description</label>
                                        <textarea class="form-control" id="package_description" name="package_description" placeholder="Description"></textarea>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="package_description">Package Description</label>
                                        <div class="quill-wrapper">
                                            <div id="package_description_editor" class="quill-editor"
                                                style="height: 200px;"></div>
                                            <input type="hidden" name="package_description" id="package_description">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="list">
                                <div class="form-group">
                                    <label for="package_list_title">Packages list Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="package_list_title[]" class="form-control"
                                        placeholder="Enter Title">
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        {{-- <div class="form-group">
                                            <label class="form-label">Packages list Description</label>
                                            <textarea class="form-control" name="package_list_description[]" placeholder="Description"></textarea>
                                        </div> --}}
                                        <div class="form-group">
                                            <label class="form-label">Packages List Description</label>
                                            <div class="quill-wrapper">
                                                <div id="package_list_description_0_editor" class="quill-editor"
                                                    style="height: 200px;"></div>
                                                <input type="hidden" name="package_list_description[]"
                                                    id="package_list_description_0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="addMore" class="btn btn-primary mt-2">Add More</button>

                            <div id="packageContainer"></div>

                            <div class="form-group">
                                <label for="cities_list_place">City Title <span class="text-danger">*</span></label>
                                <input type="text" name="cities_title" class="form-control"
                                    placeholder="Enter City Title">
                            </div>

                            {{-- City --}}
                            <div id="city">
                                <div class="city">
                                    <div class="form-group">
                                        <label for="cities_list_image">City Image <span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="cities_list_image[]" class="form-control"
                                            accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label for="cities_list_place">City List Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="cities_list_place[]" class="form-control"
                                            placeholder="Enter City Title">
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="addMorecity" class="btn btn-primary mt-2">Add More City</button>

                            <div id="faqContainer">
                                <div class="faqList">
                                    <div class="form-group">
                                        <label for="faq_question">Faq Question <span class="text-danger">*</span></label>
                                        <input type="text" name="faq_question[]" class="form-control"
                                            placeholder="Enter the Question">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="faq_answer">Faq Answer <span class="text-danger">*</span></label>
                                        <input type="text" name="faq_answer[]" class="form-control"
                                            placeholder="Enter the Answer">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="faq_answer">Faq Answer <span class="text-danger">*</span></label>
                                        <div class="quill-wrapper">
                                            <div id="faq_answer_0_editor" class="quill-editor" style="height: 200px;">
                                            </div>
                                            <input type="hidden" name="faq_answer[]" id="faq_answer_0">
                                        </div>
                                    </div>
                                </div>
                            </div> <br>

                            <button type="button" id="addMoreFaq" class="btn btn-primary mt-2">Add More Faq</button>
                            <br>
                            <br>
                            <div class="row"> <br>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <a type="button" href=""
                                            class="btn btn-outline-warning btn-rounded mb-2">
                                            <i class="ti-close"></i> Cancel
                                        </a>
                                        <button class="btn btn-outline-secondary btn-rounded mb-2" type="submit">
                                            <i class="ti-save-alt"></i> Save
                                        </button>
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
    <link rel="stylesheet" href="{{ asset('admin/backend/css/style.css') }}">
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
    <script src="{{ asset('admin/backend/js/study.js') }}?v={{ config('app.version') }}"></script>
@endpush
