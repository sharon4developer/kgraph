@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">About Us</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="about-add-form" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">About Title</label>
                                        <input type="text" class="form-control" id="about_title" name="about_title"
                                            placeholder="About Title" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">About Sub Title</label>
                                        <input type="text" class="form-control" id="about_sub_title" name="about_sub_title"
                                            placeholder="About Sub Title" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ckeditor-classic">About Description</label>
                                        <textarea type="text" class="form-control" id="about_description" name="about_description"
                                        placeholder="About Description" required></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Crew Title</label>
                                        <input type="text" class="form-control" id="crew_title" name="crew_title"
                                            placeholder="Crew Title" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Journey Title</label>
                                        <input type="text" class="form-control" id="journey_title" name="journey_title"
                                            placeholder="Journey Title" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Journey Sub Title</label>
                                        <input type="text" class="form-control" id="journey_sub_title" name="journey_sub_title"
                                            placeholder="About Sub Title" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ckeditor-classic">Journey Description</label>
                                        <textarea type="text" class="form-control" id="journey_description" name="journey_description"
                                        placeholder="Journey Description" required></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Our Story Title</label>
                                        <input type="text" class="form-control" id="our_story_title" name="our_story_title"
                                            placeholder="Our Story Title" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Location Title</label>
                                        <input type="text" class="form-control" id="location_title" name="location_title"
                                            placeholder="Location Title" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Location Sub Title</label>
                                        <input type="text" class="form-control" id="location_sub_title" name="location_sub_title"
                                            placeholder="Location Sub Title" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ckeditor-classic">Mission</label>
                                        <textarea type="text" class="form-control" id="mission" name="mission"
                                        placeholder="Mission" required></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ckeditor-classic">Vision</label>
                                        <textarea type="text" class="form-control" id="vision" name="vision"
                                            placeholder="Vision" required></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">About Image</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                            id="about_image" name="about_image" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Journey Image</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                            id="journey_image" name="journey_image" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Location Image 1</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                            id="location_image1" name="location_image1" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Location Image 2</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                            id="location_image2" name="location_image2" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="sub_title">Location Image 3</label>
                                        <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                            id="location_image3" name="location_image3" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">About Image Alt Tag</label>
                                        <input type="text" class="form-control" id="about_image_alt_tag" name="about_image_alt_tag"
                                            placeholder="About Image Alt Tag" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Journey Image Alt Tag</label>
                                        <input type="text" class="form-control" id="journey_image_alt_tag" name="journey_image_alt_tag"
                                            placeholder="Journey Image Alt Tag" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Location Image 1 Alt Tag</label>
                                        <input type="text" class="form-control" id="location_image1_alt_tag" name="location_image1_alt_tag"
                                            placeholder="Location Image 1 Alt Tag" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Location Image 2 Alt Tag</label>
                                        <input type="text" class="form-control" id="location_image2_alt_tag" name="location_image2_alt_tag"
                                            placeholder="Location Image 2 Alt Tag" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Location Image 3 Alt Tag</label>
                                        <input type="text" class="form-control" id="location_image3_alt_tag" name="location_image3_alt_tag"
                                            placeholder="Location Image 3 Alt Tag" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/about-us') }}"
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
    <script src="{{ asset('admin/backend/js/about-us.js') }}"></script>
@endpush
