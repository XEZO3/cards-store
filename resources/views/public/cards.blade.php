@extends('public._layout')
@section('content')

<style>.product{
  min-height: 302px;
      }
  .ftco-section{
      padding: 0px !important;
      }
  .hid{
      overflow-x: hidden;
      }
  </style>
      <link rel="stylesheet" href="{{URL::asset("css/pro.css")}}">
  <section class="ftco-section">
        <div style="
      left: 25%;
      position: relative;
      max-width: 100%;
      overflow: hidden;
  ">
        
          <input type="text" style="
      position: relative;
      width: 50%;
      border: 1px solid rgba(0,0,0,.125);
      border-radius: 5px;
      padding: 3px 10px;
      margin-bottom: 30px;
      /* left: 25%; */
      text-align: right;
  " require="" placeholder="ادخل رقم اللاعب"><label style="
      direction: rtl;
      text-align: right;
      /* float: right; */
      /* right: 0%; */
      position: relative;
      margin-left: 10px;
  ">رقم اللاعب: </label></div>
        <div class="container">
          <div class="row">
            @foreach ($products as $item)
          @if($item['discount']!=0)
            <div class="col-md-3 col-lg-3 col-sm-3 ftco-animate fadeInUp ftco-animated">
              <div class="product">
                <a href="#" class="img-prod"><img class="img-fluid" src="{{ asset('storage/'. $item['image']) }}" alt="Colorlib Template">
                  <span class="status">{{$item['discount']}}%</span>
                  <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                  <h3><a href="#">{{$item['name']}}</a></h3>
                  <div class="d-flex">
                    <div class="pricing">
                      <p class="price"><span class="mr-2 price-dc">{{$item['price']}}</span><span class="price-sale"> {{ $item['price']*((100-$item['discount'])/100)}} ل.س</span></p>
                    </div>
                  </div>
                  <div class="bottom-area d-flex px-3">
                    <div class="m-auto d-flex">

                      <form action="{{ route('add.to.cart', ['id' => $item->id]) }}" method="post" id="ajax-form" onsubmit="return false">
                        @csrf
                        <a type="submit" onclick="submitForm({{$item['id']}})"  class="buy-now d-flex justify-content-center align-items-center mx-1">
                          <button style="backgrount-color:none;border:0;all: unset;cursor: pointer;"><span><i class="fa-beat fa-sm fa-solid fa-cart-plus" style="color: #ffffff;"></i></span></button>
                        </a>
                    </form>

                    <form action="{{ route('add.to.wish', ['id' => $item->id]) }}" method="post" id="ajax-add-to-cart" onsubmit="return false">
                      @csrf
                      <a href="#" onclick="submitFormWish({{$item['id']}})" class="heart d-flex justify-content-center align-items-center ">
                        <button type="submit" style="backgrount-color:none;border:0;all: unset;cursor: pointer;"><span><i class="fa-beat fa-sm fa-solid fa-heart-circle-plus" style="color: #ffffff;"></i></span></button>
                      </a>
                  </form>                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @else
            <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
              <div class="product">
                <a href="#" class="img-prod"><img class="img-fluid" src="{{ asset('storage/'. $item['image']) }}" alt="Colorlib Template">
                  <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                  <h3><a href="#">{{$item['name']}}</a></h3>
                  <div class="d-flex">
                    <div class="pricing">
                      <p class="price"><span>{{$item['price']}} ل.س</span></p>
                    </div>
                  </div>
                  <div class="bottom-area d-flex px-3">
                    <div class="m-auto d-flex">
                      
                      <form action="{{ route('add.to.cart', ['id' => $item->id]) }}" method="post" id="ajax-form"  onsubmit="return false">
                        @csrf
                        <a type="submit" onclick="submitForm({{$item['id']}})" class="buy-now d-flex justify-content-center align-items-center mx-1">
                          <button  style="backgrount-color:none;border:0;all: unset;cursor: pointer;"><span><i class="fa-beat fa-sm fa-solid fa-cart-plus" style="color: #ffffff;"></i></span></button>
                        </a>
                    </form>

                    <form action="{{ route('add.to.wish', ['id' => $item->id]) }}" method="post" id="ajax-add-to-cart" onsubmit="return false">
                      @csrf
                      <a href="#" onclick="submitFormWish({{$item['id']}})" class="heart d-flex justify-content-center align-items-center ">
                        <button type="submit" style="backgrount-color:none;border:0;all: unset;cursor: pointer;"><span><i class="fa-beat fa-sm fa-solid fa-heart-circle-plus" style="color: #ffffff;"></i></span></button>
                      </a>
                  </form>        
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @endforeach  
            
      
            
          </div>
        </div>
      </section>
      <script>
        function submitForm(formId) {
        
          var csrfToken = "{{ csrf_token() }}";
      
          jQuery.noConflict();
      
          $.ajax({
            type: "POST",
            url: "/add-to-cart/"+formId,
            headers: {
              'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
            },
            success: function(data) {
              alert(data.success);
            },
            error: function(jqXHR, textStatus, errorThrown) {
              alert("Error: " + errorThrown);
            }
          });
      
          // Return false to prevent the default form submission
          return false;
        }
      
        function submitFormWish(formId) {
        
        var csrfToken = "{{ csrf_token() }}";
      
        jQuery.noConflict();
      
        $.ajax({
          type: "POST",
          url: "/add-to-wish/"+formId,
          headers: {
            'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
          },
          success: function(data) {
            alert(data.success);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
          }
        });
      
        // Return false to prevent the default form submission
        return false;
      }
      
      </script>
@endsection 