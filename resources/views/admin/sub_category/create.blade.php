@extends('layouts.admin_app')
@section('title', 'Sub Categories - Create')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Sub Categories</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Create</li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.sub_category.index') }}">Sub Categories List</a></li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 mt-3 mb-4">
                    <div class="form-group">
                        <div class="col p-0">
                            <a href="{{ route('admin.sub_category.index') }}" class="btn btn-primary btn-sm"
                                data-repeater-create="" type="button">
                                <span><i class="ri-arrow-left-circle-fill"></i></span>
                                <span class="invoice-repeat-btn">Back</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <form action="{{ route('admin.sub_category.store') }}" method="post" id="sub_cate_create"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h5 class="card-title">Create <span>| Sub Category</span></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select  name="category_id" size='1' class="form-select selectpicker">
                                                <option value="" selected>Select Category</option>
                                                    @foreach ($categoryArr as $value)
                                                        <option value="{{ $value->id }}">
                                                            {{ $value->category_name }}
                                                        </option>
                                                    @endforeach
                                            </select>
                                            <label id="category_id-error" class="error" for="category_id"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sub Category Name</label>
                                            <div class="input-group">
                                            <input type="text" class="form-control" name="sub_cate_name"
                                                placeholder="Enter Sub Cate">
                                            </div>
                                            <label id="sub_cate_name-error" class="error" for="sub_cate_name"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control custom-select" name="status">
                                                <option value="">Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sub Category Picture</label> <br>
                                            <input type="file" name="sub_cate_picture" class="subcateImage"
                                                onclick="subcategoryImageUpload()" accept="image/*" id="upload"
                                                hidden /><label class="image_upload_btn mb-3 mt-3" for="upload">Choose
                                                file</label><br>
                                            <img id="subcate_image_preview" style="display: none;" src="#"
                                                height="100" width="100" />
                                            <label id="upload-error" class="error" for="upload"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="card-footer">
                                        <button type="submit"
                                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm loader_class">Submit</button>
                                        <a href="{{ route('admin.sub_category.index') }}"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger btn_loader">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script type="text/javascript">
        $(document).on('change', '.subcateImage', function() {
            $('#subcate_image_preview').hide();
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#subcate_image_preview').attr('src', e.target.result);
                    $('#subcate_image_preview').show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function itemImageUpload() {
            document.getElementById("subcateImage").click();
        }
      
    </script>
@endsection
