@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                <div class="user-profile">
                    <div class="widget-content widget-content-area">
                        <div class="profile-section" style="padding: 28px;">
                            <div class="col-md-12 col-md-offset-2">
                                <div class="tab">
                                    <ul class="tabs">
                                        <li><a href="#">Overview</a></li>
                                        <li><a href="#">Edit Details</a></li>
                                        <li><a href="#">Reset Password</a></li>
                                    </ul>
                                    <!-- / tabs -->
                                    <div class="tab_content">
                                        <div class="tabs_item">
                                            <div class="login-register-box"><br>
                                                <p>Check your Details</p>
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Name</label>
                                                                <p id="user_name">{{ Auth::user()->name }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email</label>
                                                                <p id="user_email">{{ Auth::user()->email }}</p>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                {{-- <label for="profile_image">Image</label> --}}
                                                                <img id="profile_image" src="{{$locationData['storage_server_path'].$locationData['storage_image_path'].Auth::user()->image}}" alt="profile-image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tabs_item">
                                            <div class="login-register-box"><br>
                                                <p>Edit your Details</p>
                                                <form id="edit_details" enctype="multipart/form-data" method="post">
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6" style="    margin-top: 12px;">
                                                            <div class="form-group">
                                                                <label for="password">Name </label>
                                                                <input class="form-control" type="text" name="name"
                                                                    required id="name"
                                                                    value="{{ Auth::user()->name }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6" style="    margin-top: 12px;">
                                                            <div class="form-group">
                                                                <label for="password_confirmation">Email</label>
                                                                <input class="form-control" type="email" name="email"
                                                                    required id="email"
                                                                    value="{{ Auth::user()->email }}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6" style="    margin-top: 12px;">
                                                            <div class="form-group">
                                                                <label for="password_confirmation">Image</label>
                                                                <div class="avatar-upload">
                                                                    <div class="avatar-edit">
                                                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image" />
                                                                        <label for="imageUpload"></label>
                                                                    </div>
                                                                    <div class="avatar-preview">
                                                                        <div id="imagePreview" style="background-image: url('{{$locationData['storage_server_path'].$locationData['storage_image_path'].Auth::user()->image}}');" alt="profile-image">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12" style="margin-top: 12px;">
                                                            <button type="submit"
                                                                class="btn btn-outline-primary btn-rounded mb-2 me-4 _effect--ripple waves-effect waves-light float-end">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tabs_item">
                                            <div class="login-register-box"><br>
                                                <p>Edit your Login Details</p>
                                                <form id="reset_password" enctype="multipart/form-data" method="post">
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6" style="    margin-top: 12px;">
                                                            <div class="form-group">
                                                                <label for="password"> New Password </label>
                                                                <input class="form-control" type="text" name="password"
                                                                    required id="password" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6" style="    margin-top: 12px;">
                                                            <div class="form-group">
                                                                <label for="password_confirmation">Confirm Password</label>
                                                                <input class="form-control" type="text"
                                                                    name="password_confirmation" required
                                                                    id="password_confirmation" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12" style="    margin-top: 12px;">
                                                            <button type="submit"
                                                                class="btn btn-outline-primary btn-rounded mb-2 me-4 _effect--ripple waves-effect waves-light float-end">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- / tabs_item -->
                                    </div>
                                    <!-- / tab_content -->
                                </div>
                                <!-- / tab -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
@push('style')
<style>
     .profile-section .tabs a {
    /* background-color: #eff0f2; */
    border-bottom: 1px solid;
    color: #393939 !important;
    font-weight: 500;
    display: block;
    letter-spacing: 0;
    outline: none;
    padding: 9px 50px;
    text-decoration: none;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    border-bottom: 2px solid #0aa7b9;
    font-size: 17px;
}

 .profile-section {
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: inherit;
    /* padding: 10px; */
}

 .profile-section .tab {
    position: relative;
    background: transparent;
    margin: 0 auto;
    line-height: 1.5;
    font-weight: 300;
    color: #888;
}

 .profile-section .tabs {
    display: table;
    position: relative;
    overflow: hidden;
    margin: 0;
    padding-left: 0px;
    border: none;
    background: #25282a;
    border-radius: 14px;
}

 .profile-section .tabs li {
    float: left;
    line-height: 24px;
    overflow: hidden;
    padding: 10px;
    position: relative;
}

 .profile-section .tabs a {
    border-bottom: 1px solid #fff;
    color: #393939;
    font-weight: 500;
    display: block;
    letter-spacing: 0;
    outline: none;
    padding: 9px 50px;
    text-decoration: none;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    border-bottom: 2px solid #374856;
    font-size: 17px;
    border-radius: 50px;
    border: none;
    font-weight: 500;
    padding: 8px 14px;
    letter-spacing: 1px;
    color: #bfc9d4 !important;
}

 .profile-section .tabs_item {
    display: none;
    /* padding: 30px 0; */
}

 .profile-section .tabs_item h4 {
    font-weight: bold;
    color: blue;
    font-size: 20px;
}

 .profile-section .tabs_item img {
    width: 200px;
    float: left;
    margin-right: 30px;
}

 .profile-section .tabs_item:first-child {
    display: block;
}

 .profile-section .current a {
    color: #fff !important;
    background: #181818;
    border-bottom: none;
    background-color: #181818;
    box-shadow: 1px 1px 4px 0 rgb(0 0 0 / 20%);
}

 .profile-section .form-group p {
    font-weight: 400;
    font-size: 14px;
    line-height: 23.61px;
    margin-bottom: 25px;
    text-align: left;
    /* color: #374856; */
    border-bottom: 1px solid #eaeaea;
}
</style>
@endpush
@push('script')
    <script src="{{ asset('admin/backend/js/profile.js') }}"></script>
@endpush
