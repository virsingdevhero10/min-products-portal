
  <!-- footer section -->
  <footer class="footer_section">
         <div class="container">
            <div class="row" style="display:none">
               <div class="col-md-4 footer-col">
                  <div class="footer_contact">
                     <h4>
                        Reach at..
                     </h4>
                     <div class="contact_link_box">
                        <a href="">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>
                        Location
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>
                        Call +01 1234567890
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                        demo@gmail.com
                        </span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="footer_detail">
                     <a href="index.html" class="footer-logo">
                     Famms
                     </a>
                     <p>
                        Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
                     </p>
                     <div class="footer_social">
                        <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="map_container">
                     <div class="map">
                        <div id="googleMap"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-info">
               <div class="col-lg-7 mx-auto px-0">
                  <p>
                     &copy; <span id="displayYear"></span> All Rights Reserved By
                     <a href="javascript:void(0)"></a><br> <a href="#" target="_blank">Mini Product Portal</a>
                  </p>
               </div>
            </div>
         </div>
      </footer>

      <!-- Popup modal for logout start -->
      <div class="modal fade" id="myModal" tabindex="-1">
         <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Are You sure ?</h5>
               <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
               Are you sure to logout ?
               </div>
               <form method="post" action="{{ route('frontend.home.user_logout') }}" id="form_delete">
                    @csrf
                    <input type="hidden" name="id" class="page_id" value="{{ Auth::user()->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger btn_loader">Logout</button>
                    </div>
                </form>
         </div>
         </div>
      </div>
      <!-- Popup modal for logout end -->


      <!-- footer section -->
      <!-- jQery -->
      <script src="{{asset('theme/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('theme/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('theme/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('theme/js/custom.js')}}"></script>
