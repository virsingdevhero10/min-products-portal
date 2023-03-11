@extends('layouts.admin_app')
@section('title', 'Sub Categories - Edit')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>@section('title', 'Sub Categories - Edit')
</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Edit</li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.sub_category.index') }}">@section('title', 'Sub Categories - Edit')
 List</a></li>
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
                        <form action="{{ route('admin.sub_category.update') }}" method="post" id="edit_create"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$sub_category_edit->id}}">

                            <div class="card-body">
                                <h5 class="card-title">Edit <span>| Sub Categories</span></h5>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select  name="category_id" size='1' class="form-select selectpicker">
                                                <option value="" selected>Select Category</option>
                                                    @foreach ($categoryArr as $value)
                                                    <option value="{{ $value->id }}" {{ $value->id == $sub_category_edit->category_id ? 'selected' : '' }}>
                                                            {{ $value->category_name }}
                                                    </option>
                                                    @endforeach
                                            </select>
                                            <label id="category_id-error" class="error" for="category_id"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sub Category</label>
                                            <div class="input-group">
                                            <input type="text" class="form-control" name="sub_cate_name" value="{{$sub_category_edit->sub_cate_name}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control custom-select" name="status">
                                                <option value="">Select Status</option>
                                                <option @if($sub_category_edit->status == 1) selected="selected" @endif value="1">Active</option>
                                                <option @if($sub_category_edit->status == 0) selected="selected" @endif value="0">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                  
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Sub Cate Picture</label> <br>
                                            <input type="file" class="subcateImage" onclick="categoryImageUpload()" name="sub_cate_picture" accept="image/*" id="upload" hidden/><label class="image_upload_btn mb-3 mt-3" for="upload">Choose file</label>
                                        </div>
                                            @if($sub_category_edit->sub_cate_picture != '' && file_exists(public_path('sub_categories_images/'.$sub_category_edit->sub_cate_picture)))
                                            <img id="sub_cate_image_preview" src="{{asset('sub_categories_images/'.$sub_category_edit->sub_cate_picture)}}" height="100" width="100" />
                                            @else
                                                <img style="display: none;" src="#" alt="Logo Image" height="100" width="100" />
                                            @endif                                    
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
        </section>
    </main>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).on('change', '.subcateImage', function() {
            var class_name = "sub_cate_image_preview";
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
            document.getElementById("subcateImage").click();
        }
    </script>
@endsection
