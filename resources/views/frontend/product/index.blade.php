@extends('layouts.frontend_web')
@section('title', 'Home')
@section('content')

      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <!-- <h2>
                  Our <span>products</span>
               </h2> -->
            </div>
            <div class="row">
            @if (!empty($productArr) && count($productArr) > 0)
                  @foreach ($productArr as $key => $value)
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{route('frontend.home.product_details', $value->id)}}" class="option1">
                           {{$value->product_name}}
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <!-- <img src="images/p1.png" alt=""> -->
                        @if($value->product_images->first()->name != '' && file_exists(public_path('product_images/' . $value->product_images->first()->name)))
                           <img src="{{ asset('product_images/' . $value->product_images->first()->name) }}"/>

                        @else
                           <img src="{{ asset('product_images/placeholder.svg') }}"
                              alt="" style="height: 70px; width: auto;"
                              class="img-profile rounded-circle" />
                        @endif
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$value->product_name}}
                        </h5>
                        <h6>
                          {{$value->price}}
                        </h6>
                     </div>
                  </div>
               </div>
               @endforeach
               @else
                  <p colspan="10">No Products Found.</p>
               @endif
            </div>
            <!-- <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div> -->
         </div>
      </section>
      <!-- end product section -->

      <!-- Popup modal for logout start -->
    <div class="modal fade" id="userLogoutModel" tabindex="-1">
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


    <!-- Button trigger modal -->


<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

@endsection
