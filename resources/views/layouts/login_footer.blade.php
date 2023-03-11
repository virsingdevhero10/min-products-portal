
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('build/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('build/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('build/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('build/assets/js/main.js')}}"></script>
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"></script>


  <script type="text/javascript">

    $("#admin_login_form").validate({
        ignore: "not:hidden",
        onfocusout: function(element) {
            this.element(element);  
        },
        rules: {
            "email":{
                required:true,
                email:true,
            },
            "password":{
                required:true,
                minlength:6,
            },
        },
        messages: {
            "email":{
                required:'Please enter e-mail address',
                email:'Please enter valid e-mail address',
            },
            "password":{
                required:'Please enter password',
                minlength:'Password must be more then six characters',
            },
        },
        submitHandler: function(form) {
            var $this = $('.loader_class');
            var loadingText = '<i class="fa fa-spinner fa-spin" role="status" aria-hidden="true"></i> Loading...';
            $('.loader_class').prop("disabled", true);
            $this.html(loadingText);
            form.submit();
        }
    });
</script>

</body>
</html>