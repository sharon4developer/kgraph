@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Process Step</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="process-step-add-form" method="POST" action="javascript:void(0);">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="service_id">Select Service (Optional - Leave empty for Default/Homepage)</label>
                                        <select class="form-select" name="service_id" id="service_id">
                                            <option value="" selected>Default/Homepage</option>
                                            @foreach ($services as $service)
                                                <option value="{{$service->id}}">{{$service->title}}</option>
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
                                        <label class="form-label" for="step_number">Step Number</label>
                                        <input type="text" class="form-control" id="step_number" name="step_number"
                                            placeholder="e.g., 01, 02, 03" required>
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
                                            placeholder="Title" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="icon">Icon</label>
                                        <select class="form-select" name="icon" id="icon" required>
                                            <option value="" selected disabled>---Select Icon---</option>
                                            <option value="users">Users</option>
                                            <option value="shield">Shield</option>
                                            <option value="check">Check</option>
                                            <option value="award">Award</option>
                                            <option value="trending-up">Trending Up</option>
                                            <option value="globe">Globe</option>
                                            <option value="book-open">Book Open</option>
                                            <option value="briefcase">Briefcase</option>
                                            <option value="clock">Clock</option>
                                            <option value="check-circle">Check Circle</option>
                                            <option value="users-group">Users Group</option>
                                        </select>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="order">Order</label>
                                        <input type="number" class="form-control" id="order" name="order"
                                            placeholder="Order" value="0" min="0" required>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="timeline">Timeline (Optional)</label>
                                        <input type="text" class="form-control" id="timeline" name="timeline"
                                            placeholder="e.g., 1-2 days, 2-4 weeks" maxlength="50">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea name="description" id="description" required></textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" checked>
                                            <label class="form-check-label" for="status">Status (Active)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_default" id="is_default" value="1">
                                            <label class="form-check-label" for="is_default">Is Default (For Homepage)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <a type="button" href="{{ url('admin/process-steps') }}"
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
@push('script')
@include('admin.layouts.includes.tinymce-script')
<script src="{{ asset('admin/backend/js/process-steps.js') }}"></script>
<script>
$(document).ready(function() {
    // Initialize TinyMCE for description (compact editor)
    initTinyMCE('#description', TINYMCE_COMPACT_CONFIG);
});
</script>
@endpush

