@extends('layouts.admin_app')
@section('title', 'Products - Create')
@section('content')
<style>
        #loader {
            position: absolute;
            right: 18px;
            top: 30px;
            width: 20px;
        }
    </style>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Products</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Create</li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.product.index') }}">Product List</a></li>
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
                        <form action="{{ route('admin.product.store') }}" method="post" id="product_create"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h5 class="card-title">Create <span>| Product</span></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" name="product_name"
                                                placeholder="Enter Product Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="form-control" name="price"
                                                placeholder="Enter Price">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control input-sm" name="category_id">
                                                <option value="">--Select Category--</option>
                                                @foreach ($categoryArr as $row)
                                                    <option value="{{$row->id}}">{{$row->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="position:relative">
                                            <label>Sub Category</label>
                                            <select class="form-control input-sm" name="sub_category_id"></select>
                                            <img id="loader" src="{{url('/images/ajax-loader.gif')}}" alt="loader">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control {{ $errors->has('description') ? 'has-error' : '' }} quill-editor-full" rows="6" placeholder="Description"></textarea>
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
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- <div class="form-group">
                                            <label>Product Picture</label> <br>
                                            <input type="file" name="image[]" multiple class="productImage"
                                                onclick="productImageUpload()" accept="image/*" id="upload"
                                                hidden /><label class="image_upload_btn mb-3 mt-3" for="upload">Choose
                                                file</label><br>
                                            <img id="product_image_preview" style="display: none;" src="#"
                                                height="100" width="100" />
                                            <label id="upload-error" class="error" for="upload"></label>
                                        </div> -->
                                        <div class="user-image mb-3 text-center">
                                            <div class="imgPreview"> </div>
                                        </div>            
                                        <div class="custom-file">
                                            <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                                            <label class="custom-file-label" for="images">Choose image</label>
                                        </div>
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
            </div>
        </section>
    </main>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script type="text/javascript">
        $(document).on('change', '.productImage', function() {
            $('#product_image_preview').hide();
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#product_image_preview').attr('src', e.target.result);
                    $('#product_image_preview').show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function itemImageUpload() {
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
