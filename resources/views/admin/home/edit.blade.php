@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Home Page Settings</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="home-edit-form" method="POST">
                        @method('PUT')
                        <input type="hidden" name="home_page_id" value="{{$data->id}}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="service_first_title">Service First Title</label>
                                    <input type="text" class="form-control" id="service_first_title" name="service_first_title"
                                        placeholder="Service First Title" required value="{{$data->service_first_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="service_second_title">Service Second Title</label>
                                    <input type="text" class="form-control" id="service_second_title" name="service_second_title"
                                        placeholder="Service Second Title" required value="{{$data->service_second_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="service_sub_title">Service Sub Title</label>
                                    <input type="text" class="form-control" id="service_sub_title" name="service_sub_title"
                                        placeholder="Service Sub Title" required value="{{$data->service_sub_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="service_description">Service Description</label>
                                    <textarea class="form-control" id="service_description" name="service_description"
                                        placeholder="Service Description" required>{{$data->service_description}}</textarea>
                                </div>
                            </div>

                            <!-- Who We Are Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="who_we_are_first_title">Who We Are First Title</label>
                                    <input type="text" class="form-control" id="who_we_are_first_title" name="who_we_are_first_title"
                                        placeholder="Who We Are First Title" required value="{{$data->who_we_are_first_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="who_we_are_second_title">Who We Are Second Title</label>
                                    <input type="text" class="form-control" id="who_we_are_second_title" name="who_we_are_second_title"
                                        placeholder="Who We Are Second Title" required value="{{$data->who_we_are_second_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="who_we_are_sub_title">Who We Are Sub Title</label>
                                    <input type="text" class="form-control" id="who_we_are_sub_title" name="who_we_are_sub_title"
                                        placeholder="Who We Are Sub Title" required value="{{$data->who_we_are_sub_title}}">
                                </div>
                             </div>

                            <!-- Journey Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_title">Journey Title</label>
                                    <input type="text" class="form-control" id="journey_title" name="journey_title"
                                        placeholder="Journey Title" required value="{{$data->journey_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_sub_title">Journey Sub Title</label>
                                    <input type="text" class="form-control" id="journey_sub_title" name="journey_sub_title"
                                        placeholder="Journey Sub Title" required value="{{$data->journey_sub_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_description">Journey Description</label>
                                    <textarea class="form-control" id="journey_description" name="journey_description"
                                        placeholder="Journey Description" required>{{$data->journey_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image1">Journey Image 1</label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="journey_image1" name="journey_image1">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image2">Journey Image 2</label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="journey_image2" name="journey_image2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image3">Journey Image 3</label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="journey_image3" name="journey_image3">
                                </div>
                            </div> --}}
                            <!-- Certificate Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_title">Certificate Title</label>
                                    <input type="text" class="form-control" id="certificate_title" name="certificate_title"
                                        placeholder="Certificate Title" required value="{{$data->certificate_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_description">Certificate Description</label>
                                    <textarea class="form-control" id="certificate_description" name="certificate_description"
                                        placeholder="Certificate Description" required>{{$data->certificate_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image1">Certificate Image 1</label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="certificate_image1" name="certificate_image1">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image2">Certificate Image 2</label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="certificate_image2" name="certificate_image2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image3">Certificate Image 3</label>
                                    <input type="file" accept=".png, .jpg, .jpeg,.webp" class="form-control"
                                        id="certificate_image3" name="certificate_image3">
                                </div>
                            </div> --}}
                            <!-- Testimonial Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="testimonial_title">Testimonial Title</label>
                                    <input type="text" class="form-control" id="testimonial_title" name="testimonial_title"
                                        placeholder="Testimonial Title" required value="{{$data->testimonial_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="testimonial_title">Testimonial Sub Title</label>
                                    <input type="text" class="form-control" id="testimonial_sub_title" name="testimonial_sub_title"
                                        placeholder="Testimonial Sub Title" required value="{{$data->testimonial_sub_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="testimonial_description">Testimonial Description</label>
                                    <textarea class="form-control" id="testimonial_description" name="testimonial_description"
                                        placeholder="Testimonial Description" required>{{$data->testimonial_description}}</textarea>
                                </div>
                            </div>

                            <!-- Blog Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="blog_title">Blog Title</label>
                                    <input type="text" class="form-control" id="blog_title" name="blog_title"
                                        placeholder="Blog Title" required value="{{$data->blog_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="blog_title">Blog Sub Title</label>
                                    <input type="text" class="form-control" id="blog_sub_title" name="blog_sub_title"
                                        placeholder="Blog Sub Title" required value="{{$data->blog_sub_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="blog_description">Blog Description</label>
                                    <textarea class="form-control" id="blog_description" name="blog_description"
                                        placeholder="Blog Description" required>{{$data->blog_description}}</textarea>
                                </div>
                            </div>

                            <!-- Explore Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="explore_title">Explore Title</label>
                                    <input type="text" class="form-control" id="explore_title" name="explore_title"
                                        placeholder="Explore Title" required value="{{$data->explore_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="explore_sub_title">Explore Sub Title</label>
                                    <input type="text" class="form-control" id="explore_sub_title" name="explore_sub_title"
                                        placeholder="Explore Sub Title" required value="{{$data->explore_sub_title}}">
                                </div>
                            </div>

                            <!-- FAQ Section -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="faq_title">FAQ Title</label>
                                    <input type="text" class="form-control" id="faq_title" name="faq_title"
                                        placeholder="FAQ Title" required value="{{$data->faq_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="faq_sub_title">FAQ Sub Title</label>
                                    <input type="text" class="form-control" id="faq_sub_title" name="faq_sub_title"
                                        placeholder="FAQ Sub Title" required value="{{$data->faq_sub_title}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image1_alt_tag">Journey Image 1 Alt Tag</label>
                                    <input type="text" placeholder="Journey Image 1 Alt Tag" class="form-control"
                                        id="journey_image1_alt_tag" name="journey_image1_alt_tag" required  value="{{$data->journey_image1_alt_tag}}">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image2_alt_tag">Journey Image 2 Alt Tag</label>
                                    <input type="text" placeholder="Journey Image 2 Alt Tag" class="form-control"
                                        id="journey_image2_alt_tag" name="journey_image2_alt_tag" required value="{{$data->journey_image2_alt_tag}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="journey_image3_alt_tag">Journey Image 3 Alt Tag</label>
                                    <input type="text" placeholder="Journey Image 3 Alt Tag" class="form-control"
                                        id="journey_image3_alt_tag" name="journey_image3_alt_tag" required value="{{$data->journey_image3_alt_tag}}">
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image1_alt_tag">Certificate Image 1 Alt Tag</label>
                                    <input type="text" placeholder="Certificate Image 1 Alt Tag" class="form-control"
                                        id="certificate_image1_alt_tag" name="certificate_image1_alt_tag" required value="{{$data->certificate_image1_alt_tag}}">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image2_alt_tag">Certificate Image 2 Alt Tag</label>
                                    <input type="text" placeholder="Certificate Image 2 Alt Tag" class="form-control"
                                        id="certificate_image2_alt_tag" name="certificate_image2_alt_tag" required value="{{$data->certificate_image2_alt_tag}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="certificate_image3_alt_tag">Certificate Image 3 Alt Tag</label>
                                    <input type="text" placeholder="Certificate Image 3 Alt Tag" class="form-control"
                                        id="certificate_image3_alt_tag" name="certificate_image3_alt_tag" required value="{{$data->certificate_image3_alt_tag}}">
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Previous Journey Image 1</label>
                                    <div class="avatar-preview">
                                        <img class="previous-image" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->journey_image1 }}" alt="profile-image" onerror="this.src='{{ $locationData['storage_server_path'].$locationData['admin_assets_path'].'placeholder.png' }}';">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>Previous Journey Image 2</label>
                                    <div class="avatar-preview">
                                        <img class="previous-image" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->journey_image2 }}" alt="profile-image" onerror="this.src='{{ $locationData['storage_server_path'].$locationData['admin_assets_path'].'placeholder.png' }}';">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Previous Journey Image 3</label>
                                    <div class="avatar-preview">
                                        <img class="previous-image" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->journey_image3 }}" alt="profile-image" onerror="this.src='{{ $locationData['storage_server_path'].$locationData['admin_assets_path'].'placeholder.png' }}';">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Previous Certificate Image 1</label>
                                    <div class="avatar-preview">
                                        <img class="previous-image" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->certificate_image1 }}" alt="profile-image" onerror="this.src='{{ $locationData['storage_server_path'].$locationData['admin_assets_path'].'placeholder.png' }}';">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>Previous Certificate Image 2</label>
                                    <div class="avatar-preview">
                                        <img class="previous-image" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->certificate_image2 }}" alt="profile-image" onerror="this.src='{{ $locationData['storage_server_path'].$locationData['admin_assets_path'].'placeholder.png' }}';">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Previous Certificate Image 3</label>
                                    <div class="avatar-preview">
                                        <img class="previous-image" src="{{ $locationData['storage_server_path'].$locationData['storage_image_path'].$data->certificate_image3 }}" alt="profile-image" onerror="this.src='{{ $locationData['storage_server_path'].$locationData['admin_assets_path'].'placeholder.png' }}';">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Submit Buttons -->
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('admin/home') }}" class="btn btn-outline-warning btn-rounded mb-2">
                                    <i class="ti-close"></i> Cancel
                                </a>
                                <button class="btn btn-outline-secondary btn-rounded mb-2" type="submit">
                                    <i class="ti-save-alt"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('admin/backend/js/home.js') }}"></script>
@endpush
