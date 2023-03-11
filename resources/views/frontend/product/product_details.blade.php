@extends('layouts.frontend_web')
@section('title', 'Home')
@section('content')
       <!-- arrival section -->
       <section class="arrival_section">
         <div class="container">
             <div class="row">
               <div id="overlay"></div>
               <div id="overlayContent">
                  <img class="orImgBig" id="imgBig" src="" alt="" width="400" />
               </div>
             </div>
            <div class="box">
               <div class="row">
                  <div class="col-md-6">
                     <div class="arrival_bg_box">
                        @foreach ($imges as $key => $img)
                              @if($img['name'] != '' && file_exists(public_path('product_images/' . $img['name'])))
                                 <img class="imgSmall" src="{{ asset('product_images/' . $img['name']) }}">  
                              @else
                                 <img src="{{ asset('product_images/placeholder.svg') }}">
                              @endif
                        @endforeach
                     </div> 
                  </div>
                  <div class="col-md-6 ml-auto">
                     <div class="heading_container remove_line_bt">
                        <h3>
                        {{$productArr->product_name}}
                        </h3>
                        <h5>
                         <span><strong>Price :</strong></span> {{$productArr->price}}
                        </h5>
                     </div>
                     <p style="margin-top: 20px;margin-bottom: 30px;">
                        {{$productArr->description}}
                     </p>
                      <span><a href="javascript:void()"> Buy Now</a>   <a class="pdf_generate" href="{{route('frontend.home.product_detail_pdf', $productArr->id )}}">PDF Generate</a></span>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end arrival section -->

<link href="{{asset('theme/css/product_details.css')}}" rel="stylesheet">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
   $(".imgSmall").click(function(){
      $("#imgBig").attr("src",$(this).attr('src'));
      $("#overlay").show();
      $("#overlayContent").show();
   });

   $("#imgBig").click(function(){
      $("#imgBig").attr("src", "");
      $("#overlay").hide();
      $("#overlayContent").hide();
   });
});    
</script>
@endsection

