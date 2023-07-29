@extends('public._layout')
@section('content')

<style>
 .title{
    margin-bottom: 5vh;
}
.card{
    margin: auto;
    max-width: 950px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent;
}
@media(max-width:767px){
    .card{
        margin: 3vh auto;
    }
}
.cart1{
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem;
}
@media(max-width:767px){
    .cart1{
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem;
    }
}
.summary{
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65);
}
@media(max-width:767px){
    .summary{
    border-top-right-radius: unset;
    border-bottom-left-radius: 1rem;
    }
}
.summary .col-2{
    padding: 0;
}
.summary .col-10
{
    padding: 0;
}.row{
    margin: 0;
}
.title b{
    font-size: 1.5rem;
}
.main{
    margin: 0;
    padding: 2vh 0;
    width: 100%;
}
.col-2, .col{
    padding: 0 1vh;
}

.close{
    margin-left: auto;
    font-size: 0.7rem;
}
.img{
    width: 3.5rem;
}
.back-to-shop{
    margin-top: 4.5rem;
}
h5{
    margin-top: 4vh;
}
hr{
    margin-top: 1.25rem;
}
form{
    padding: 2vh 0;
}
select{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input:focus::-webkit-input-placeholder
{
      color:transparent;
}
.btn{
    background-color: #000;
    border-color: #000;
    color: white;
    width: 100%;
    font-size: 0.7rem;
    margin-top: 4vh;
    padding: 1vh;
    border-radius: 0;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none; 
}
.btn:hover{
    color: white;
}

a:hover{
    color: black;
    text-decoration: none;
}

</style>
@if(!empty($cards))
  <!-- cart + summary -->
  <div class="card">
    <div class="row">
        <div class="col-md-8 cart1">
            <div class="title">
                <div class="row">
                    <div class="col"><h4><b>سلة المشتريات</b></h4></div>
                </div>
            </div> 
        @php
            $total =0;
            $discountTotal=0;
            $totalNoDis=0;
        @endphp
@foreach ($cards as $index =>$item)
        @php
          $discountTotal = $discountTotal+ ($item['price']*$item['discount']);
          $total = $total + (($item['price']*(100-$item['discount'])/100)*$quen[$index]);
          $totalNoDis= $totalNoDis+($item['price']*$quen[$index]);
      @endphp
  
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid img" src="{{ asset('storage/'. $item['image']) }}"></div>
                    <div class="col">
                        <div class="row text-muted">{{$item['category']['name']}}</div>
                        <div class="row">{{$item['name']}}</div>
                    </div>
                    <div class="col">
                        <button onclick="submitForm({{$item['id']}},0)"  style="all: unset;cursor: pointer;">-</button><input type="number" min="0" id="valu{{$item['id']}}" value="{{$quen[$index]}}"><button onclick="submitForm({{$item['id']}},1)" style="all: unset;cursor: pointer;"  href="#">+</button>
                    </div>
                    <div class="col"> {{$item['price']*(100-$item['discount'])/100}} ل.س<a href="/remove-from-cart/{{$item['id']}}"><span class="close">&#10005;</span></a></div>
                </div>
            </div>
            @endforeach   
            <a href="/" style="color: black;"><div class="back-to-shop" style="text-align: right">&leftarrow;<span class="text-muted">العودة للتسوق</span></div></a>
        </div>
        <div class="col-md-4 summary">
            <div><h5><b>Summary</b></h5></div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">قيمة الخصم:</div>
                <div class="col text-right">{{$discountTotal}} ل.س</div>
            </div>
            
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">السعر الكلي:</div>
                <div class="col text-right">{{$total}} ل.س</div>
            </div>
            <button class="btn">CHECKOUT</button>
        </div>
    </div>
    
</div>  
            
     
  
  @else
      <h1>add item to the cart</h1>
  @endif

  <script>
function submitForm(formId,state) {
  
  var csrfToken = "{{ csrf_token() }}";

  jQuery.noConflict();

  $.ajax({
    type: "POST",
    url: "/update-cart/"+formId+"?add="+state,
    headers: {
      'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
    },
    success: function(data) {
      if(state==1){
        var inputElement = document.getElementById("valu" + formId);
        var currentValue = parseInt(inputElement.value); // Convert the value to an integer
        var newValue = currentValue + 1;
        inputElement.value = newValue;    
}else{
        var inputElement = document.getElementById("valu" + formId);
        var currentValue = parseInt(inputElement.value); // Convert the value to an integer
        var newValue = currentValue - 1;
        inputElement.value = newValue; 

    }
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