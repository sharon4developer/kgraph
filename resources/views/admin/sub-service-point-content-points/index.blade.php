@extends('admin.layouts.app')
@section('content')
<!-- end page title -->
{{-- <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Point Options</h4>
            </div>
            <div class="card-body">
                <form class="form validate-form" id="points-options-add-form" method="POST">
                    <input type="hidden" name="service_point_content_id" id="service_point_content_id" value="{{$service_point_content_id}}">
                    <div class="box-body mb-4">
                        <hr class="my-15">
                        <div id="previous_field">
                            @foreach ($data['Options'] as $options)
                            <div class="row p_option sortable-item" data-id={{$options->id}}>
                                <div class="col-md-5 col-sm-5">
                                    <div class="form-group">
                                        <!-- <h6>Option</h6> -->
                                        <input type="text" class="form-control" required="required" placeholder="Option*" id="p_option_{{$options->id}}" name="p_option[{{$options->id}}]" value="{{$options->option}}" option_id="{{$options->id}}">
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-1" style="margin: 5px 0;">
                                    <div class="form-group">
                                        <div class="col-sm-1"><button type="button" name="p_delete" id="p_delete_{{$options->id}}" class="btn btn-outline-danger btn-rounded mb-2 _effect--ripple waves-effect waves-light update-option" onclick="deleteData('{{$options->id}}')"><i class="fa fa-trash"></i></button></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div id="dynamic_field">
                            <div class="row">
                                <div class="col-md-5 col-sm-5">
                                    <div class="form-group">
                                        <!-- <h6>Option</h6> -->
                                        <input type="text" class="form-control" required="required" placeholder="Option*" id="option" name="option[]">
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-1" style="margin: 5px 0;">
                                    <div class="form-group">
                                        <div class="col-sm-1"><button type="button" name="add" id="add" class="btn btn-outline-success btn-rounded mb-2 _effect--ripple waves-effect waves-light update-option">+</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a type="button" href="{{url('admin/sub-service-point-contents')}}" class="btn btn-outline-warning btn-rounded mb-2">
                            <i class="ti-close"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-outline-secondary btn-rounded mb-2">
                            <i class="ti-save-alt"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
</div> --}}
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Dynamic Point Options</h4>
            </div>
            <div class="card-body">
                <form id="dynamic-form">
                    <input type="hidden" name="service_point_content_id" id="service_point_content_id" value="{{$service_point_content_id}}">
                    <div id="titles-container">
                        <!-- Titles will be dynamically added here -->
                    </div>
                    <button type="button" id="add-title" class="btn btn-outline-primary btn-rounded mb-2">+ Add Title</button>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-outline-secondary btn-rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('style')
@endpush
@push('script')
<script src="{{ asset('admin/backend/js/sub-service-point-content-points.js') }}"></script>
@endpush
