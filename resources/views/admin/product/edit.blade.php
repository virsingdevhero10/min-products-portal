@extends('layouts.admin_app')
@section('title', 'Products - Edit')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Products</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Edit</li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.product.index') }}">Products List</a></li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 mt-3 mb-4">
                    <div class="form-group">
                        <div class="col p-0">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-primary btn-sm"
                                data-repeater-create="" type="button">
                                <span><i class="ri-arrow-left-circle-fill"></i></span>
                                <span class="invoice-repeat-btn">Back</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <form action="{{ route('admin.product.update') }}" method="post" id="edit_create"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$productArr->id}}">

                            <div class="card-body">
                                <h5 class="card-title">Edit <span>| Product</span></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" name="product_name" value="{{$productArr->product_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="form-control" name="price" value="{{$productArr->price}}">
                                        </div>
                                    </div>
                                </div>
                                 <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control input-sm" name="category_id">
                                                <option value="">--Select Category--</option>
                                                @foreach ($categoryArr as $value)
                                                        <option value="{{ $value->id }}" {{ $value->id == $productArr->category_id ? 'selected' : '' }}>
                                                            {{ $value->category_name }}
                                                        </option>
                                                    @endforeach
                                            </select>                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="position:relative">
                                            <label>Sub Category</label>
                                            <select class="form-control input-sm" name="sub_category_id">
                                                @foreach ($subCategoryArr as $va1)
                                                    <option value="{{ $va1->id }}" {{ $va1->id == $productArr->sub_category_id ? 'selected' : '' }}>
                                                        {{ $va1->sub_cate_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <img id="loader" src="{{url('/images/ajax-loader.gif')}}" alt="loader">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <div id="editor">
                                             <textarea name="description" class="form-control {{ $errors->has('description') ? 'has-error' : '' }} quill-editor-full" rows="6">{{$productArr->description}}</textarea>
                                             </div>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control custom-select" name="status">
                                                <option value="">Select Status</option>
                                                <option @if($productArr->status == 1) selected="selected" @endif value="1">Active</option>
                                                <option @if($productArr->status == 0) selected="selected" @endif value="0">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <!-- <div class="form-group">
                                            <label>Product Picture</label> <br>
                                            <input type="file" class="productImage" onclick="productImageUpload()" name="image" accept="image/*" id="upload" hidden/><label class="image_upload_btn mb-3 mt-3" for="upload">Choose file</label>
                                        </div>
                                            @if($productArr->image != '' && file_exists(public_path('product_images/'.$productArr->image)))
                                            <img id="product_image_preview" src="{{asset('product_images/'.$productArr->image)}}" height="100" width="100" />
                                            @else
                                                <img style="display: none;" src="#" alt="Logo Image" height="100" width="100" />
                                            @endif                                     -->

                                        <div class="user-image mb-3 text-center">
                                            <div class="imgPreview"> </div>
                                        </div>            
                                        <div class="custom-file">
                                            <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                                            <label class="custom-file-label" for="images">Choose image</label>
                                        </div>
                                        @foreach ($imges as $key => $img)
                                            @if($img['name'] != '' && file_exists(public_path('product_images/' . $img['name'])))
                                                <img class="imgPreview" src="{{ asset('product_images/' . $img['name']) }}"
                                                    style="height: 100px; width: 100px; padding:10px;" alt="Logo Picture"
                                                    class="img-profile rounded-circle" />
                                            @else
                                                <img src="{{ asset('product_images/placeholder.svg') }}"
                                                    alt="" style="height: 70px; width: auto;"
                                                    class="img-profile rounded-circle" />
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="card-footer">
                                        <button type="submit"
                                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm loader_class">Submit</button>
                                        <a href="{{ route('admin.product.index') }}"
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
        $(document).on('change', '.productImage', function() {
            var class_name = "product_image_preview";
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
        function productImageUpload() {
            document.getElementById("productImage").click();
        }
    </script>

    <script>
        $(function() {
        var loader = $('#loader'),
            category = $('select[name="category_id"]'),
            subcategory = $('select[name="sub_category_id"]');
    
        loader.hide();
        subcategory.attr('disabled', 'disabled')
    
        subcategory.change(function() {
            var id = $(this).val();
            if (!id) {
                subcategory.attr('disabled', 'disabled')
            }
        })
        category.change(function() {
            var id = $(this).val();
            if (id) {
                loader.show();
                subcategory.attr('disabled', 'disabled')
                var categoryID = id;
                var token = "{{csrf_token()}}";
                $.ajax({
                    url: "{{ route('admin.product.get_sub_category') }}",
                    type: "post",
                    data: {
                        category_id: categoryID,
                        _token: token
                    },
                    success: function(data) {
                        var s = '<option value="">---Select Sub Category--</option>';
                        $.each(data, function(key, value) {
                            s += '<option value="' + key + '">' + value + '</option>'
                         });
                        subcategory.removeAttr('disabled')
                        subcategory.html(s);
                        loader.hide();
                    }
                });
            }
        })
    })
    </script>
     <script>
    var quill = new Quill('#editor', {
      theme: 'snow'
    });
  </script>

<style>
    dl, ol, ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .imgPreview img {
        padding: 8px;
        max-width: 100px;
    } 
</style>
<script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });    
    </script>
@endsection
