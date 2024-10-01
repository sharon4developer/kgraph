@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="box-title">Pages</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="page-details-table" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Title</th>
                                <th>Seo</th>
                                <th>Titles</th>
                                <th>Section Content</th>
                                <th>Section Image</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    {{-- <div class="modal fade" id="seo-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form validate-form" id="seo-edit-form" method="POST">
                        <input type="hidden" name="page_id" id="page_id" value="">
                        <input type="hidden" name="seo_id" id="seo_id" value="">
                        <div class="box-body mb-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea rows="4" type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Meta Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Keywords</label>
                                        <textarea rows="4" type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>OG Title</label>
                                        <input type="text" class="form-control" name="og_title" id="og_title" placeholder="OG Title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>OG Description</label>
                                        <textarea rows="4" type="text" class="form-control" name="og_description" id="og_description" placeholder="OG Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>OG Url</label>
                                        <input type="text" class="form-control" name="og_url" id="og_url" placeholder="OG Url">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>OG Image</label>
                                        <input type="file" class="form-control" accept=".png, .jpg, .jpeg" name="og_image" id="og_image" placeholder="OG Image">
                                    </div>
                                </div>
                                <div class="col-md-12" id="previous-og-image-section">
                                    <div class="form-group">
                                        <label>Previous</label>
                                        <div class="avatar-preview">
                                            <img class="previous-image" accept=".png, .jpg, .jpeg" id="previous-og-image" src="" alt="og-image" onerror="this.src='{{ $locationData['storage_server_path'].$locationData['admin_assets_path'].'placeholder.png' }}';">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a type="button" class="btn btn-outline-warning btn-rounded mb-2" data-bs-dismiss="modal">
                                <i class="ti-close"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-outline-secondary btn-rounded mb-2">
                                <i class="ti-save-alt"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@push('style')
@endpush
@push('script')
    <script src="{{ asset('admin/backend/js/pages.js') }}"></script>
@endpush
