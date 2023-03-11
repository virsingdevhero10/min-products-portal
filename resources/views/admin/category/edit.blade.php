@extends('layouts.admin_app')
@section('title', 'Category - Edit')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Categories</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Edit</li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.category.index') }}">Categories List</a></li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 mt-3 mb-4">
                    <div class="form-group">
                        <div class="col p-0">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-primary btn-sm"
                                data-repeater-create="" type="button">
                                <span><i class="ri-arrow-left-circle-fill"></i></span>
                                <span class="invoice-repeat-btn">Back</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <form action="{{ route('admin.category.update') }}" method="post" id="edit_create"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$categoryArr->id}}">

                            <div class="card-body">
                                <h5 class="card-title">Edit <span>| Category</span></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="category_name"
                                                value="{{$categoryArr->category_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control custom-select" name="status">
                                                <option value="">Select Status</option>
                                                <option @if($categoryArr->status == 1) selected="selected" @endif value="1">Active</option>
                                                <option @if($categoryArr->status == 0) selected="selected" @endif value="0">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Category Picture</label> <br>
                                            <input type="file" class="categoryImage" onclick="categoryImageUpload()" name="cate_picture" accept="image/*" id="upload" hidden/><label class="image_upload_btn mb-3 mt-3" for="upload">Choose file</label>
                                        </div>
                                            @if($categoryArr->cate_picture != '' && file_exists(public_path('categories_images/'.$categoryArr->cate_picture)))
                                            <img id="category_image_preview" src="{{asset('categories_images/'.$categoryArr->cate_picture)}}" height="100" width="100" />
                                            @else
                                                <img style="display:none;" src="#" alt="Category Image" height="100" width="100" />
                                            @endif                                    
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="card-footer">
                                        <button type="submit"
                                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm loader_class">Submit</button>
                                        <a href="{{ route('admin.category.index') }}"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger btn_loader">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).on('change', '.categoryImage', function() {
            var class_name = "category_image_preview";
            $('#' + class_name).hide();
            readURL(this, class_name);
        });
        function readURL(input, class_name) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + class_name).attr('src', e.target.result);
                    $('#' + class_name).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        function categoryImageUpload() {
            document.getElementById("categoryImage").click();
        }
    </script>
@endsection
