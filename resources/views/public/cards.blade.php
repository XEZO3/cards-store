@extends('public._layout')
@section('content')

<style>
.product{
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
.col-lg-4{
width:33%
}
.img-product{
    height:300px;
}
@media (min-width: 992px){
.col-lg-4 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 33.333333%;
    flex: 0 0 19.333333% !important;
    max-width: 33.333333%;
}
}
@media (min-width: 768px){
.col-md-6 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50%;
    flex: 0 0 33%;
}
}
@media (max-width: 400px){
.img-product{
    height:200px;
}
}

span.price-dc{overflow-wrap: break-word;}
  </style>
      <link rel="stylesheet" href="{{URL::asset("css/pro.css")}}">
  <section class="ftco-section">
        <div class="container">
          
          @php
          $rank = 0;
          if(auth()->check()){
            $rank = auth()->user()->rank;
          }
          @endphp
          <div class="row justify-content-center">
            @foreach ($products as $item)
            @php
        // You can also use the @php Blade directive to write PHP code
                $price = $item['price']*((100-$item['discount'])/100)*(100 - ($rank == 1 ? 20 : ($rank == 2?10:($rank==3?5:0)))) / 100;
            @endphp
          @if($item['avilability'])  
          @if($item['discount']!=0)
            <div class="col-md-6 col-lg-4 col-sm-5  ftco-animate fadeInUp ftco-animated">
              <div class="product">
                <a href="#" class="img-prod"><img class="img-product" style="width:100%" src="{{ asset('storage/'. $item['image']) }}" alt="image">
                  <span class="status">{{$item['discount']}}%</span>
                  <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                  <h3><a href="#">{{$item['name']}}</a></h3>
                  <div class="d-flex">
                    <div class="pricing">
                      <p class="price"><span class="mr-2 price-dc">{{$item['price']}}</span><span class="price-sale"> {{$price}} نقطة</span></p>
                    </div>
                  </div>
                  <div class="bottom-area d-flex px-3">
                    <div class="m-auto d-flex">
                    <a  class="buy-now d-flex justify-content-center align-items-center mx-1"  data-bs-toggle="modal" data-bs-target="#sosab{{$item['id']}}s">
                      <span>شراء</span>
                    </a>        
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @else
            <div class="col-md-6 col-lg-4 col-sm-5 ftco-animate fadeInUp ftco-animated">
              <div class="product">
                <a href="#" class="img-prod"><img class="img-product" style="width:100%" src="{{ asset('storage/'. $item['image']) }}" alt="Colorlib Template">
                  <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                  <h3><a href="#">{{$item['name']}}</a></h3>
                  <div class="d-flex">
                    <div class="pricing">
                      <p class="price"><span>{{$price}} نقطة</span></p>
                    </div>
                  </div>
                  <div class="bottom-area d-flex px-3">
                    <div class="m-auto d-flex">
                      
                      <a  class="buy-now d-flex justify-content-center align-items-center mx-1"  data-bs-toggle="modal" data-bs-target="#sosab{{$item['id']}}s">
                        <span>شراء</span>
                      </a>                    
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
                                <input type="number" id="quentity{{$item['id']}}" name="quentity" min="1" value="1" onchange="change({{$item['id']}},{{$price}})" class="form-control" required />
                                @error('quentity')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                              </div>
                              <div class="form-group col-md-6">
                                <label for="total">المجموع</label>
                                <input type="text" id="total{{$item['id']}}" value="{{$price}}" class="form-control" readonly>
                              </div>
                            </div>
                            @if($item['require_type']==1)
                            <div class="form-group">
                              <label for="playerNumber">رقم اللاعب</label>
                              <input type="text" id="playerNumber" name="game_id" class="form-control" placeholder="أدخل رقم اللاعب" required>
                              @error('game_id')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            @elseif($item['require_type']==2)
                            <label for="playerNumber">اسم المستخدم او البريد</label>
                              <input type="text" id="playerNumber" name="username" class="form-control" placeholder="ادخل اسم المستخدم او الايميل" required>
                              @error('username')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                                <label for="playerNumber">كلمة المرور</label>
                              <input type="text" id="playerNumber" name="password" class="form-control" placeholder="أدخل كلمة المرور" required>
                              @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            @endif
                            <div class="form-group col-md-6">
                              <label for="discount">كود الخصم</label>
                              <input type="text" id="discount" name="discount_code" class="form-control">
                              <small id="discount-error" class="text-danger"></small>
                          </div>
                          
                            <div class="alert alert-success text-right">
                              <strong>{{$item['name']}}</strong>
                              <span class="float-left" id="tot{{$item['id']}}">{{$price}}</span>
                              <span>× </span>
                              <span id="spn{{$item['id']}}">1</span>
                            </div>
                            <div class="alert alert-info text-right">
                              {{$item['description']}}
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
            @else
            <div class="col-md-6 col-lg-4 col-sm-5 ftco-animate fadeInUp ftco-animated" >
              <div class="product" style="position:relative">
                  <div style="position:absolute;width:100%;height:100%;z-index:10;background-color:rgba(255, 255, 255, 0.8);display:flex;justify-content:center;align-items:center;color:black">
                    غير متوفر
                </div>
                  <a href="#" class="img-prod">
                      <img style="width:100%" class="img-product" src="{{ asset('storage/'. $item['image']) }}" alt="image">
                      <span class="status">{{$item['discount']}}%</span>
                      <div class="overlay"></div>
                  </a>
                  <div class="text py-3 pb-4 px-3 text-center">
                      <h3><a href="#">{{$item['name']}}</a></h3>
                      <div class="d-flex">
                          <div class="pricing">
                              <p class="price">
                                  <span class="mr-2 price-dc">{{$item['price']}}</span>
                                  <span class="price-sale"> {{$price}} نقطة</span>
                              </p>
                          </div>
                      </div>
                      <div class="bottom-area d-flex px-3">
                          <div class="m-auto d-flex">
                              <span class="buy-now-unavailable d-flex justify-content-center align-items-center mx-1">
                                  <i class="fa-beat fa-sm fa-solid fa-cart-plus" style="color: #ffffff;"></i>
                              </span>
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
    function change(formId, price) {
    var quentity = document.getElementById("quentity" + formId);
    var totalform = document.getElementById("total" + formId);
    var span = document.getElementById("spn" + formId);
    var totalSpan = document.getElementById("tot" + formId);
    var discountCode = document.getElementById("discount").value; // Get the discount code
    if (quentity.value < 1) {
              var totalValue = (1 * price).toFixed(2);
              totalform.value = parseFloat(totalValue); // Convert to a number
              span.textContent = 1;
              totalSpan.textContent = parseFloat(totalValue); // Convert to a number
          } else {
              var totalValue = (quentity.value * price).toFixed(2);
              totalform.value = parseFloat(totalValue); // Convert to a number
              span.textContent = quentity.value;
              totalSpan.textContent = parseFloat(totalValue); // Convert to a number
          }
    // Check if the discount code is not empty
    if (discountCode.trim() !== '') {
        // Make an AJAX request to validate the discount code
        jQuery.noConflict();

        $.ajax({
            type: "POST",
            url: "/api/validate-discount", // Laravel route for discount code validation
            data: {
                discount_code: discountCode
            },
            success: function (response) {
                if (response.valid) {
                    // Calculate the total with the discount
                    var totalWithDiscount = calculateTotalWithDiscount(price, quentity.value, response.discount);

                    // Update the total input field with the discounted total
                    totalform.value = parseFloat(totalWithDiscount);
                    totalSpan.textContent = parseFloat(totalWithDiscount);
                    $('#discount-error').text(''); // Clear any previous error message
                } else {
                    // If the discount code is invalid, use the regular total
                    $('#discount-error').text('Invalid discount code.');
                }
            },
            error: function () {
                // Handle AJAX error, e.g., display an error message
                $('#discount-error').text('Error validating discount code.');
            }
        });
    }
    
}

function calculateTotalWithDiscount(price, quantity, discount) {
  var discountedTotal = price * quantity * (100 - discount)/100;
  return  parseFloat(discountedTotal);
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
       
       
      
      
      </script>
@endsection 
