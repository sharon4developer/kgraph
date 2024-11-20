@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Home Page</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="home-add-form" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Service Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="service_first_title">Service First Title</label>
                                    <input type="text" class="form-control" id="service_first_title" name="service_first_title"
                                        placeholder="Service First Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="service_second_title">Service Second Title</label>
                                    <input type="text" class="form-control" id="service_second_title" name="service_second_title"
                                        placeholder="Service Second Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="service_sub_title">Service Sub Title</label>
                                    <input type="text" class="form-control" id="service_sub_title" name="service_sub_title"
                                        placeholder="Service Sub Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="service_description">Service Description</label>
                                    <textarea class="form-control" id="service_description" name="service_description"
                                        placeholder="Service Description" required></textarea>
                                </div>
                            </div>

                            <!-- Who We Are Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="who_we_are_first_title">Who We Are First Title</label>
                                    <input type="text" class="form-control" id="who_we_are_first_title" name="who_we_are_first_title"
                                        placeholder="Who We Are First Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="who_we_are_second_title">Who We Are Second Title</label>
                                    <input type="text" class="form-control" id="who_we_are_second_title" name="who_we_are_second_title"
                                        placeholder="Who We Are Second Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="who_we_are_sub_title">Who We Are Sub Title</label>
                                    <input type="text" class="form-control" id="who_we_are_sub_title" name="who_we_are_sub_title"
                                        placeholder="Who We Are Sub Title" required>
                                </div>
                             </div>

                            <!-- Journey Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_title">Journey Title</label>
                                    <input type="text" class="form-control" id="journey_title" name="journey_title"
                                        placeholder="Journey Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_sub_title">Journey Sub Title</label>
                                    <input type="text" class="form-control" id="journey_sub_title" name="journey_sub_title"
                                        placeholder="Journey Sub Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_description">Journey Description</label>
                                    <textarea class="form-control" id="journey_description" name="journey_description"
                                        placeholder="Journey Description" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image1">Journey Image </label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="journey_image1" name="journey_image1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_video">Journey Video</label>
                                    <input type="file" accept=".mp4, .mkv, .webm,.MOV" class="form-control"
                                        id="journey_video" name="journey_video" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_video_name">Journey Video Name</label>
                                    <input type="text" class="form-control" id="journey_video_name" name="journey_video_name"
                                        placeholder="Journey Video Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_video_position">Journey Video Position</label>
                                    <input type="text" class="form-control" id="journey_video_position" name="journey_video_position"
                                        placeholder="Journey Video Position" required>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image2">Journey Image 2</label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="journey_image2" name="journey_image2" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image3">Journey Image 3</label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="journey_image3" name="journey_image3" required>
                                </div>
                            </div> --}}
                            <!-- Certificate Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_title">Certificate Title</label>
                                    <input type="text" class="form-control" id="certificate_title" name="certificate_title"
                                        placeholder="Certificate Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_description">Certificate Description</label>
                                    <textarea class="form-control" id="certificate_description" name="certificate_description"
                                        placeholder="Certificate Description" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image1">Certificate Image </label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="certificate_image1" name="certificate_image1" required>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image2">Certificate Image 2</label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="certificate_image2" name="certificate_image2" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image3">Certificate Image 3</label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="certificate_image3" name="certificate_image3" required>
                                </div>
                            </div> --}}
                            <!-- Testimonial Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="testimonial_title">Testimonial Title</label>
                                    <input type="text" class="form-control" id="testimonial_title" name="testimonial_title"
                                        placeholder="Testimonial Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="testimonial_description">Testimonial Description</label>
                                    <textarea class="form-control" id="testimonial_description" name="testimonial_description"
                                        placeholder="Testimonial Description" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="testimonial_title">Testimonial Sub Title</label>
                                    <input type="text" class="form-control" id="testimonial_sub_title" name="testimonial_sub_title"
                                        placeholder="Testimonial Sub Title" required>
                                </div>
                            </div>
                            <!-- Blog Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="blog_title">Blog Title</label>
                                    <input type="text" class="form-control" id="blog_title" name="blog_title"
                                        placeholder="Blog Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="blog_title">Blog Sub Title</label>
                                    <input type="text" class="form-control" id="blog_sub_title" name="blog_sub_title"
                                        placeholder="Blog Sub Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="blog_description">Blog Description</label>
                                    <textarea class="form-control" id="blog_description" name="blog_description"
                                        placeholder="Blog Description" required></textarea>
                                </div>
                            </div>

                            <!-- Explore Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="explore_title">Explore Title</label>
                                    <input type="text" class="form-control" id="explore_title" name="explore_title"
                                        placeholder="Explore Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="explore_sub_title">Explore Sub Title</label>
                                    <input type="text" class="form-control" id="explore_sub_title" name="explore_sub_title"
                                        placeholder="Explore Sub Title" required>
                                </div>
                            </div>

                            <!-- FAQ Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="faq_title">FAQ Title</label>
                                    <input type="text" class="form-control" id="faq_title" name="faq_title"
                                        placeholder="FAQ Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="faq_sub_title">FAQ Sub Title</label>
                                    <input type="text" class="form-control" id="faq_sub_title" name="faq_sub_title"
                                        placeholder="FAQ Sub Title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image1_alt_tag">Journey Image Alt Tag</label>
                                    <input type="text"  placeholder="Journey Image 1 Alt Tag" class="form-control"
                                        id="journey_image1_alt_tag" name="journey_image1_alt_tag" required>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image2_alt_tag">Journey Image 2 Alt Tag</label>
                                    <input type="text"  placeholder="Journey Image 2 Alt Tag" class="form-control"
                                        id="journey_image2_alt_tag" name="journey_image2_alt_tag" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image3_alt_tag">Journey Image 3 Alt Tag</label>
                                    <input type="text"  placeholder="Journey Image 3 Alt Tag" class="form-control"
                                        id="journey_image3_alt_tag" name="journey_image3_alt_tag" required>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image1_alt_tag">Certificate Image Alt Tag</label>
                                    <input type="text"  placeholder="Certificate Image 1 Alt Tag" class="form-control"
                                        id="certificate_image1_alt_tag" name="certificate_image1_alt_tag" required>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image2_alt_tag">Certificate Image 2 Alt Tag</label>
                                    <input type="text"  placeholder="Certificate Image 2 Alt Tag" class="form-control"
                                        id="certificate_image2_alt_tag" name="certificate_image2_alt_tag" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image3_alt_tag">Certificate Image 3 Alt Tag</label>
                                    <input type="text"  placeholder="Certificate Image 3 Alt Tag" class="form-control"
                                        id="certificate_image3_alt_tag" name="certificate_image3_alt_tag" required>
                                </div>
                            </div> --}}
                        </div>

                        <!-- Buttons -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/home') }}"
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
            <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
@push('style')
@endpush
@push('script')
    <script src="{{ asset('admin/backend/js/home.js') }}"></script>
@endpush
