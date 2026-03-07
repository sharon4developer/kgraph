@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Process Step</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate id="process-step-edit-form" method="POST" action="javascript:void(0);">
                        @method('PUT')
                        <input type="hidden" name="process_step_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="service_id">Select Service (Optional - Leave empty for Default/Homepage)</label>
                                        <select class="form-select" name="service_id" id="service_id">
                                            <option value="" @if(!$data->service_id) selected @endif>Default/Homepage</option>
                                            @foreach ($services as $service)
                                                <option value="{{$service->id}}" @if($service->id == $data->service_id) selected @endif>{{$service->title}}</option>
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
                                            placeholder="e.g., 01, 02, 03" required value="{{$data->step_number}}">
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
                                            placeholder="Title" required value="{{$data->title}}">
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
                                            <option value="" disabled>---Select Icon---</option>
                                            <option value="users" @if($data->icon == 'users') selected @endif>Users</option>
                                            <option value="shield" @if($data->icon == 'shield') selected @endif>Shield</option>
                                            <option value="check" @if($data->icon == 'check') selected @endif>Check</option>
                                            <option value="award" @if($data->icon == 'award') selected @endif>Award</option>
                                            <option value="trending-up" @if($data->icon == 'trending-up') selected @endif>Trending Up</option>
                                            <option value="globe" @if($data->icon == 'globe') selected @endif>Globe</option>
                                            <option value="book-open" @if($data->icon == 'book-open') selected @endif>Book Open</option>
                                            <option value="briefcase" @if($data->icon == 'briefcase') selected @endif>Briefcase</option>
                                            <option value="clock" @if($data->icon == 'clock') selected @endif>Clock</option>
                                            <option value="check-circle" @if($data->icon == 'check-circle') selected @endif>Check Circle</option>
                                            <option value="users-group" @if($data->icon == 'users-group') selected @endif>Users Group</option>
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
                                            placeholder="Order" value="{{$data->order ?? 0}}" min="0" required>
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
                                            placeholder="e.g., 1-2 days, 2-4 weeks" maxlength="50" value="{{$data->timeline ?? ''}}">
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea name="description" id="description" required>{{$data->description}}</textarea>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" @if($data->status == 1) checked @endif>
                                            <label class="form-check-label" for="status">Status (Active)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_default" id="is_default" value="1" @if($data->is_default) checked @endif>
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

