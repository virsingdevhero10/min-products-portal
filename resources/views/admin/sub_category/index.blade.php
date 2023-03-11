@extends('layouts.admin_app')
@section('title', 'Sub Categories')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Sub Categories</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">List of</li>
                    <li class="breadcrumb-item active">Sub Categories</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12 mt-3 mb-4">
                    <div class="form-group">
                        <div class="col p-0">
                            <a href="{{ route('admin.sub_category.create') }}" class="btn btn-primary btn-sm"
                                data-repeater-create="" type="button">
                                <i class="bx bx-plus"></i>
                                <span class="invoice-repeat-btn">Add New</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="filter">
                             <div class="mt-3">
                                @if (Session::has('danger'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('danger') }}
                                </div>
                                @endif
                                @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">List of <span>| Sub Categories</span></h5>
                            <table class="table table-borderless datatable" id="company_table">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($subCategoryArr) && count($subCategoryArr) > 0)
                                        @foreach ($subCategoryArr as $key => $value)
                                            <tr>
                                                <td>#{{ $key + 1 }}</td>
                                                <td>
                                                    @if ($value->sub_cate_picture != '' && file_exists(public_path('sub_categories_images/' . $value->sub_cate_picture)))
                                                        <img src="{{ asset('sub_categories_images/' . $value->sub_cate_picture) }}"
                                                            style="height: 70px; width: 70px;" alt="Logo Picture"
                                                            class="img-profile rounded-circle" />
                                                    @else
                                                        <img src="{{ asset('sub_categories_images/placeholder.svg') }}"
                                                            alt="" style="height: 70px; width: auto;"
                                                            class="img-profile rounded-circle" />
                                                    @endif
                                                </td>
                                                <td>{{ ucfirst($value->sub_cate_name) }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-between py-50">
                                                        <div class="custom-control custom-switch custom-switch-glow">
                                                            <input type="checkbox" data-id="{{ $value->id }}" name="status" class="js-switch-subCate"
                                                                {{ $value->status == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)"
                                                        class="btn icon_loader btn-sm btn-info"><i class="ri-eye-fill"></i>
                                                    </a>
                                                    <a href="{{ route('admin.sub_category.edit', $value->id) }}"
                                                        class="btn icon_loader btn-sm btn-primary"><i
                                                            class="ri-edit-box-fill"></i>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-sm btn-danger delete_button"
                                                        data-id="{{ $value->id }}"><i
                                                            class="ri-delete-bin-6-fill"></i></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">No Sub Category Found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Popup modal for Delete start -->
    <div class="modal fade" id="deleteModel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are You sure ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure to Delete Sub Category?
                </div>
                <form method="post" action="{{ route('admin.sub_category.delete') }}" id="form_delete">
                    @csrf
                    <input type="hidden" name="id" class="page_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger form_submit btn_loader">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete modal Modal start-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/switchery/switchery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).on('click', '.delete_button', function() {
            $('#deleteModel').modal('show');
            $('.page_id').val($(this).attr('data-id'));
        })
    </script>
@endsection
