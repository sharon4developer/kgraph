@extends('admin.layouts.app')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="box-title">Packages</h4>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-outline-info btn-rounded m-3 _effect--ripple waves-effect waves-light float-end"
                                href="{{ url('admin/packages/create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                                Add</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="package-details-table" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Title</th>
                                <th>Country</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div  id="seo-modal"  class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Seo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form validate-form" id="seo-edit-form" method="POST">
                        <input type="hidden" name="package_id" id="package_id" value="">
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
                                        <label>Schema</label>
                                        <textarea rows="4" type="text" class="form-control" name="schema" id="schema" placeholder="Schema"></textarea>
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
                                            <img class="previous-image" accept=".png, .jpg, .jpeg" id="previous-og-image" src="" alt="og-image">
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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@push('style')
@endpush
@push('script')
    <script src="{{ asset('admin/backend/js/packages.js') }}"></script>
@endpush
