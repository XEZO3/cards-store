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
    .modal-backdrop {
 
  
      z-index: -1;
}
  </style>
      <link rel="stylesheet" href="{{URL::asset("css/pro.css")}}">
  <section class="ftco-section">
       
        <div class="container">
          <div class="row justify-content-center">
            @foreach ($products as $item)
          @if($item['discount']!=0)
            <div class="col-md-3 col-lg-3 col-sm-3 ftco-animate fadeInUp ftco-animated">
              <div class="product">
                <a href="#" class="img-prod"><img class="img-fluid" src="{{ asset('storage/'. $item['image']) }}" alt="image">
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

                      {{-- <form action="{{ route('add.to.cart', ['id' => $item->id]) }}" method="post" id="ajax-form" onsubmit="return false">
                        @csrf
                        <a type="submit" onclick="submitForm({{$item['id']}})"  class="buy-now d-flex justify-content-center align-items-center mx-1">
                          <button style="backgrount-color:none;border:0;all: unset;cursor: pointer;"><span><i class="fa-beat fa-sm fa-solid fa-cart-plus" style="color: #ffffff;"></i></span></button>
                        </a>
                    </form> --}}
                    <a  class="buy-now d-flex justify-content-center align-items-center mx-1"  data-bs-toggle="modal" data-bs-target="#sos{{$item['name'].$item['id']}}s">
                      <span><i class="fa-beat fa-sm fa-solid fa-cart-plus" style="color: #ffffff;"></i></span>
                    </a>
                    
                    
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
                      
                      <a  class="buy-now d-flex justify-content-center align-items-center mx-1"  data-bs-toggle="modal" data-bs-target="#sos{{$item['name'].$item['id']}}s">
                        <span><i class="fa-beat fa-sm fa-solid fa-cart-plus" style="color: #ffffff;"></i></span>
                      </a>

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
            <!-- modal start -->
            <div class="modal fade" id="sos{{$item['name'].$item['id']}}s"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    @auth
                    <div class="container">
                      @if($item['require_id']==true)
                      <div class="row">
                        <label >ID اللاعب</label>
                        <input type="text" name="game_id" class="form-control">
                      </div>
                      @endif
                      <div class="row justify-content-center">
                        <label style="text-align: center" for="">الكمية</label>
                        <div class="col-1"><button class="btn btn-danger" onclick="change({{$item['id']}},0)">-</button></div>
                        <div class="col-3" style="margin-right: -20px"><input type="number" id="valu{{$item['id']}}" min="1" value="1" name="quentity" class="form-control"></div>
                        <div class="col-1"><button class="btn btn-primary " onclick="change({{$item['id']}},1)">+</button></div>
                      </div>
                      <br>
                      <div class="row justify-content-center">
                        <div class="col-3">
                          <span>السعر :</span>
                          <span id="price{{$item['id']}}">{{ $item['price']*((100-$item['discount'])/100)}}</span>
                        </div>
                        
                      </div>
                    </div>   
                    @else
                      <h3 style="float: right">يجب عليك تسجيل الدخول اولا</h3>
                    @endauth
                  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   @auth
                   <button type="button" class="btn btn-primary">Save changes</button>
                   @endauth 
                  </div>
                </div>
              </div>
            </div>
 <!-- modal end -->
            @endforeach  
            
      
            
          </div>
        </div>
      </section>
      <script>
        function change(formId,state){
          var inputElement = document.getElementById("valu" + formId);
          var currentValue = parseInt(inputElement.value);
          var spanprice =  document.getElementById("price" + formId)
          var spanValue = parseFloat(spanprice.textContent)
          var newValue = 0;
          if(state ==1){
             
             newValue = currentValue + 1;
          }else{
           
             newValue = currentValue -1;
          }
          inputElement.value = newValue;
          spanprice.textContent  =  newValue*spanValue
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