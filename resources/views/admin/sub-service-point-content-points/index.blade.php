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
                        <input type="hidden" name="service_point_content_id" id="service_point_content_id"
                            value="{{ $service_point_content_id }}">
                        <div id="titles-container">
                            @if (isset($data->Title))
                                @foreach ($data->Title as $titleIndex => $titles)
                                    @php ++$titleIndex; @endphp
                                    <div class="card mt-4" id="title_{{ $titleIndex }}">
                                        <div class="card-header">
                                            <h5>Title {{ $titleIndex }}</h5>
                                            <div class="form-group">
                                                <input type="text" class="form-control" required
                                                    placeholder="Enter Title*" name="titles[{{ $titleIndex }}][title]"
                                                    value="{{ $titles->name }}">
                                            </div>
                                            <button type="button" class="btn btn-outline-danger btn-sm remove-title"
                                                data-title-id="{{ $titleIndex }}">Remove Title</button>
                                        </div>
                                        <div class="card-body" id="options-container-{{ $titleIndex }}">
                                            <!-- Options -->
                                            <?php $optionIndex = 0; ?>
                                            @if ($titles->options->isNotEmpty())
                                                @foreach ($titles->options as $optionIndex => $option)
                                                    <div class="option-item mt-3"
                                                        id="option_{{ $titleIndex }}_{{ $optionIndex }}">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <select class="form-control option-type"
                                                                    data-title-id="{{ $titleIndex }}"
                                                                    data-option-id="{{ $optionIndex }}"
                                                                    name="titles[{{ $titleIndex }}][options][{{ $optionIndex }}][type]">
                                                                    <option value="option" selected>Option</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6"
                                                                id="multi-options_{{ $titleIndex }}_{{ $optionIndex }}">
                                                                <?php $multiOptionIndex = 1; ?>
                                                                <div class="multi-option-item mt-2"
                                                                    id="multi-option_${titleId}_${optionId}_${multiOptionIndex}">
                                                                    <input type="text" class="form-control" required
                                                                        name="titles[{{ $titleIndex }}][options][{{ $optionIndex }}][multi-options][{{ $multiOptionIndex }}][value]"
                                                                        value="{{ $option->value }}">
                                                                    <!-- Sub-Options -->
                                                                    <div id="sub-options_{{ $titleIndex }}_{{ $optionIndex }}_{{ $multiOptionIndex }}"
                                                                        class="mt-3">
                                                                        @foreach ($option->subOptions as $subOptionIndex => $subOption)
                                                                            <div class="sub-option-item mt-2"
                                                                                id="sub-option_{{ $titleIndex }}_{{ $optionIndex }}_{{ $multiOptionIndex }}_{{ $subOptionIndex }}">
                                                                                <div class="row">
                                                                                    <div class="col-md-10">
                                                                                        <input type="text"
                                                                                            class="form-control" required
                                                                                            name="titles[{{ $titleIndex }}][options][{{ $optionIndex }}][multi-options][{{ $multiOptionIndex }}][sub-options][{{ $subOptionIndex }}]"
                                                                                            value="{{ $subOption->value }}">
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-danger btn-sm remove-sub-option"
                                                                                            data-title-id="{{ $titleIndex }}"
                                                                                            data-option-id="{{ $optionIndex }}"
                                                                                            data-multi-option-id="{{ $multiOptionIndex }}"
                                                                                            data-sub-option-id="{{ $subOptionIndex }}">Remove
                                                                                            Sub-Option</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>

                                                                <button type="button"
                                                                    class="btn btn-outline-secondary btn-sm add-sub-option"
                                                                    data-title-id="{{ $titleIndex }}"
                                                                    data-option-id="{{ $optionIndex }}"
                                                                    data-multi-option-id="{{ $multiOptionIndex }}">+ Add
                                                                    Sub-Option</button>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button"
                                                                    class="btn btn-outline-danger btn-sm remove-option"
                                                                    data-title-id="{{ $titleIndex }}"
                                                                    data-option-id="{{ $optionIndex }}"
                                                                    data-multi-option-id="{{ $multiOptionIndex }}">Remove
                                                                    Option</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <!-- Paragraphs -->
                                            @if ($titles->paragraphs->isNotEmpty())
                                                @foreach ($titles->paragraphs as $paragraphIndex => $paragraph)
                                                    <?php $paragraphIndex = $optionIndex + $paragraphIndex + 1; ?>

                                                    <div class="option-item mt-3"
                                                        id="option_{{ $titleIndex }}_{{ $paragraphIndex }}">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <select class="form-control option-type"
                                                                    data-title-id="{{ $titleIndex }}"
                                                                    data-option-id="{{ $paragraphIndex }}"
                                                                    name="titles[{{ $titleIndex }}][options][{{ $paragraphIndex }}][type]">
                                                                    <option value="paragraph"
                                                                        {{ $paragraph->type === 'paragraph' ? 'selected' : '' }}>
                                                                        Paragraph</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6"
                                                                id="option-content_{{ $titleIndex }}_{{ $paragraphIndex }}">
                                                                <textarea class="form-control" required name="titles[{{ $titleIndex }}][options][{{ $paragraphIndex }}][content]">{{ $paragraph->content }}</textarea><br>
                                                                <input type="url" class="form-control"
                                                                    name="titles[{{ $titleIndex }}][options][{{ $paragraphIndex }}][url]"
                                                                    value="{{ $paragraph->url }}" placeholder="Url">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button"
                                                                    class="btn btn-outline-danger btn-sm remove-option"
                                                                    data-title-id="{{ $titleIndex }}"
                                                                    data-option-id="{{ $paragraphIndex }}">Remove
                                                                    Option</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <button type="button" class="btn btn-outline-success btn-sm add-option"
                                                data-title-id="{{ $titleIndex }}">+ Add Option/Paragraph</button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @if (isset($data->Title) && count($data->Title) > 0)
                                <input type="hidden" id="last_index" value="{{ $titleIndex }}">
                            @else
                                <input type="hidden" id="last_index" value="0">
                            @endif
                        </div>
                        <button type="button" id="add-title" class="btn btn-outline-primary btn-rounded mb-2">+ Add
                            Title</button>
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
