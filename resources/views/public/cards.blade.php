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
          @if(count($products)>0)

          <div class="row justify-content-center">
            @foreach ($products as $item)
          @if($item['discount']!=0)
            <div class="col-md-6 col-lg-4 col-sm-5  ftco-animate fadeInUp ftco-animated">
              <div class="product">
                <a href="#" class="img-prod"><img class="img-fluid" src="{{ asset('storage/'. $item['image']) }}" alt="image">
                  <span class="status">{{$item['discount']}}%</span>
                  <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                  <h3><a href="#">{{$item['name']}}</a></h3>
                  <div class="d-flex">
                    <div class="pricing">
                      <p class="price"><span class="mr-2 price-dc">{{$item['price']}}</span><span class="price-sale"> {{ $item['price']*((100-$item['discount'])/100)}} نقطة</span></p>
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
                    <a  class="buy-now d-flex justify-content-center align-items-center mx-1"  data-bs-toggle="modal" data-bs-target="#sosab{{$item['id']}}s">
                      <span><i class="fa-beat fa-sm fa-solid fa-cart-plus" style="color: #ffffff;"></i></span>
                    </a>
                    
                    
                    {{-- <form action="{{ route('add.to.wish', ['id' => $item->id]) }}" method="post" id="ajax-add-to-cart" onsubmit="return false">
                      @csrf
                      <a href="#" onclick="submitFormWish({{$item['id']}})" class="heart d-flex justify-content-center align-items-center ">
                        <button type="submit" style="backgrount-color:none;border:0;all: unset;cursor: pointer;"><span><i class="fa-beat fa-sm fa-solid fa-heart-circle-plus" style="color: #ffffff;"></i></span></button>
                      </a>
                  </form>                      --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            



            @else
            <div class="col-md-6 col-lg-4 col-sm-5 ftco-animate fadeInUp ftco-animated">
              <div class="product">
                <a href="#" class="img-prod"><img class="img-fluid" src="{{ asset('storage/'. $item['image']) }}" alt="Colorlib Template">
                  <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                  <h3><a href="#">{{$item['name']}}</a></h3>
                  <div class="d-flex">
                    <div class="pricing">
                      <p class="price"><span>{{$item['price']}} نقطة</span></p>
                    </div>
                  </div>
                  <div class="bottom-area d-flex px-3">
                    <div class="m-auto d-flex">
                      
                      <a  class="buy-now d-flex justify-content-center align-items-center mx-1"  data-bs-toggle="modal" data-bs-target="#sosab{{$item['id']}}s">
                        <span><i class="fa-beat fa-sm fa-solid fa-cart-plus" style="color: #ffffff;"></i></span>
                      </a>

                    {{-- <form action="{{ route('add.to.wish', ['id' => $item->id]) }}" method="post" id="ajax-add-to-cart" onsubmit="return false">
                      @csrf
                      <a href="#" onclick="submitFormWish({{$item['id']}})" class="heart d-flex justify-content-center align-items-center ">
                        <button type="submit" style="backgrount-color:none;border:0;all: unset;cursor: pointer;"><span><i class="fa-beat fa-sm fa-solid fa-heart-circle-plus" style="color: #ffffff;"></i></span></button>
                      </a>
                  </form>         --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            <!-- modal start -->
            <div class="modal fade"  id="sosab{{$item['id']}}s"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$item['name']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    @auth
                        <section class="ftco-section" style="text-align: right" dir="rtl">
                          <div class="alert alert-info text-right">
                            ادخل الكمية المراد شراؤها
                          </div>
                          <form action="/order/purchasing/{{$item['id']}}" method="POST">
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-6" >
                                <label for="quantity">الكمية</label>
                                <input type="number" id="quentity{{$item['id']}}" name="quentity" min="1" value="1" onchange="change({{$item['id']}},{{ $item['price']*((100-$item['discount'])/100)}})" class="form-control" required>
                                @error('quentity')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                              </div>
                              <div class="form-group col-md-6">
                                <label for="total">المجموع</label>
                                <input type="text" id="total{{$item['id']}}" value="{{$item['price']}}" class="form-control" readonly>
                              </div>
                            </div>
                            @if($item['require_id']==true)
                            <div class="form-group">
                              <label for="playerNumber">رقم اللاعب</label>
                              <input type="text" id="playerNumber" name="game_id" class="form-control" placeholder="أدخل رقم اللاعب" required>
                              @error('game_id')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            @endif
                            <div class="alert alert-success text-right">
                              <strong>{{$item['name']}}</strong>
                              <span class="float-left" id="tot{{$item['id']}}">{{$item['price']}}</span>
                              <span>× </span>
                              <span id="spn{{$item['id']}}">1</span>
                            </div>
                            <div class="alert alert-info text-right">
                              وصف التصنيف ممكن يكون "هاذ المنتج يعمل بشكل يدوي/تلقائي او اي وصف هو بده اياه"
                            </div>
                            

                        </section>
                        @else
                      <h3 style="float: right">يجب عليك تسجيل الدخول اولا</h3>
                    @endauth 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                   @auth
                   <button type="submit" class="btn btn-primary">ِشراء</button>
                   @endauth 
                  </form>
                  </div>
                </div>
              </div>
            </div>
 <!-- modal end -->
            @endforeach              
          </div>
          @else
            <h2 style="text-align: center">لا يتوفر منتجات لهذا القسم</h2>
          @endif
        </div>
       
      </section>
      <script>
        function change(formId,price){
          var quentity = document.getElementById("quentity" + formId);
          var totalform =  document.getElementById("total" + formId);
          var span = document.getElementById("spn" + formId);
          var totalSpan = document.getElementById("tot" + formId);
          if(quentity.value<1){
          totalform.value = 1 * price
          span.textContent = 1
          totalSpan.textContent = 1*price
          }else{
            totalform.value = quentity.value * price
          span.textContent = quentity.value
          totalSpan.textContent = quentity.value*price

          }
          // var newValue = 0;
          // if(state ==1){
             
          //    newValue = currentValue + 1;
          // }else{
           
          //    newValue = currentValue -1;
          // }
          // if(newValue<=0){
          //   inputElement.value = 1
          // }else{
          // inputElement.value = newValue;
          // }
          // spanprice.textContent  =  newValue*price
        }
       
      
      
      </script>
@endsection 