
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span><a href="javascript:void()">Mini Products Portal</a></span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Popup modal for logout start -->
    <div class="modal fade" id="logoutModel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Are You sure ?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure to logout ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <a href="{{route('admin.logout')}}" class="btn btn-danger btn_loader">Logout</a>
            </div>
        </div>
      </div>
    </div>
    <!-- Popup modal for logout end -->
    <!-- Popup modal for Delete start -->
    <div class="modal fade" id="deleteModel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Are You sure ?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    Are you sure to Delete User?
                </div>
                <form method="post" action="#" id="form_delete">
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
      <!-- Popup modal for Delete end -->

  <!-- Vendor JS Files -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('build/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('build/assets/js/main.js')}}"></script>
  <script src="{{asset('js/jquery_validation.js')}}"></script>
   
<script type="text/javascript">

  $("#product_create").validate({
        ignore: "not:hidden",
        onfocusout: function(element) {
            this.element(element);
        },
        rules: {
            "product_name": {
                required: true,
            },
            "price": {
                required: true,
            },
            "category_id": {
                required: true,
            },
            // "sub_category_id": {
            //     required: true,
            // },
            "description": {
                required: true,
            },
            "status": {
                required: true,
            },
        },
        messages: {
            "product_name": {
                required: 'Please enter Product Name',
            },
            "price": {
                required: 'Please enter Price',
            },
            "category_id": {
                required: 'Please choose the Category',
            },
            // "sub_category_id": {
            //     required: 'Please choose the Sub Category',
            // },
            "description": {
                required: 'Please write Description of Product',
            },
            "status": {
                required: 'Please select Status',
            },
        },
        submitHandler: function(form) {
            var $this = $('.loader_class');
            var loadingText =
                '<i class="fa fa-spinner fa-spin" role="status" aria-hidden="true"></i> Loading...';
            $('.loader_class').prop("disabled", true);
            $this.html(loadingText);
            form.submit();
        }
  });
  
  $("#category_create").validate({
        ignore: "not:hidden",
        onfocusout: function(element) {
            this.element(element);
        },
        rules: {
            "category_name": {
                required: true,
            },
            "cate_picture": {
                required: true,
            },
            "status": {
                required: true,
            },
        },
        messages: {
            "category_name": {
                required: 'Please enter Category Name',
            },
            "cate_picture": {
                required: 'Please choose Category Picture',
            },
            "status": {
                required: 'Please select Status',
            },
        },
        submitHandler: function(form) {
            var $this = $('.loader_class');
            var loadingText =
                '<i class="fa fa-spinner fa-spin" role="status" aria-hidden="true"></i> Loading...';
            $('.loader_class').prop("disabled", true);
            $this.html(loadingText);
            form.submit();
        }
  });

  $("#sub_cate_create").validate({
        ignore: "not:hidden",
        onfocusout: function(element) {
            this.element(element);
        },
        rules: {
            "category_id": {
                required: true,
            },
            "sub_cate_name": {
                required: true,
            },
            
            "sub_cate_picture": {
                required: true,
            },
            "status": {
                required: true,
            },
        },
        messages: {
            "category_id": {
                required: 'Please select Category',
            },
            "sub_cate_name": {
                required: 'Please enter Sub Category Name',
            },
            "sub_cate_picture": {
                required: 'Please choose Sub Category Picture',
            },
            "status": {
                required: 'Please select Status',
            },
        },
        submitHandler: function(form) {
            var $this = $('.loader_class');
            var loadingText =
                '<i class="fa fa-spinner fa-spin" role="status" aria-hidden="true"></i> Loading...';
            $('.loader_class').prop("disabled", true);
            $this.html(loadingText);
            form.submit();
        }
  });
</script>

<link rel="stylesheet" type="text/css" href="{{ asset('js/switchery/switchery.min.css') }}">
 <script type="text/javascript">
    let elems2 = Array.prototype.slice.call(document.querySelectorAll('.js-switch-subCate'));
    elems2.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });
    $(document).ready(function() {
        $('.js-switch-subCate').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let sub_cate_id = $(this).data('id');
            var token = "{{ csrf_token() }}";
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('admin.sub_category.sub_cate_states') }}",
                data: {
                    'status': status,
                    'sub_cate_id': sub_cate_id,
                    _token: token
                },
                success: function(data) {
                    //console.log(data.message);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    let category1 = Array.prototype.slice.call(document.querySelectorAll('.js-switch-cate'));
    category1.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });
    $(document).ready(function() {
        $('.js-switch-cate').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let category_id = $(this).data('id');
            var token = "{{ csrf_token() }}";
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('admin.category.category_status_update') }}",
                data: {
                    'status': status,
                    'category_id': category_id,
                    _token: token
                },
                success: function(data) {
                    //console.log(data.message);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    let product1 = Array.prototype.slice.call(document.querySelectorAll('.js-switch-product'));
    product1.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });
    $(document).ready(function() {
        $('.js-switch-product').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let product_id = $(this).data('id');
            var token = "{{ csrf_token() }}";
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('admin.product.product_status_update') }}",
                data: {
                    'status': status,
                    'product_id': product_id,
                    _token: token
                },
                success: function(data) {
                    //console.log(data.message);
                }
            });
        });
    });
</script>
</body>
</html>