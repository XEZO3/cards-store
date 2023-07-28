@extends('public._layout')
@section('content')

<style>
    .content ul{
        list-style: none !important;
    }
    .content ul li{
        margin-left: 18px;
        margin-right: 0px;
        margin-bottom: 40px;
        display: inline-block;
        padding: 4px;
        border-radius: 4px;
        box-shadow:0 1px 3px 0px rgb(0 0 0 / 20%), 0 2px 1px -1px rgb(0 0 0 / 12%), 0 1px 1px 0 rgb(0 0 0 / 14%);
        }
    .content ul li:hover{
        box-shadow: 1px 2px 10px 0px rgba(0,0,0,0.5);
        }</style>
    <ul style="text-align: center;"><!--بعيدا عن انه الكود هون غبي بس حاول تخليه زي ما هو عشان الخصم والسعر الجديد الخ-->
      @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif
   
      @foreach ($cards as $item)
                  
      <li>
        <div class="product">
         <div id="pro_img">
          <a ><img src="{{ asset('storage/'. $item['image']) }}" width="168px" height="168px"></a>  
         <div id="pro_title">
           <a >{{$item['name']}}</a> 
         </div>
         <br>
         <br>
       
        <div id="pro_price">
        <a href="#"><?php echo $item['price']*((100-$item['discount'])/100) ;?></a>
        </div>
        <div id="pro_per">
          @if ($item['discount'] !=null) 
        <a href="#">{{$item['discount']}}%-</a>
        @endif
        </div>
        <br>
        
        <div id="pro_pricel">
        <h6 id="pro_t">شامل الضريبة</h6>
        @if ($item['discount'] !=null) 
        <a href="#">{{$item['price']}} د.أ</a>
        @endif
        </div>
        @if ($item['discount'] !=null) 
        <div id="pro_save">
        <a href="#"><i class="fa-solid fa-tag"></i> وفّر: {{$item['price']*$item['discount']/100}} د.أ</a>
        </div>
        @endif
        <div id="buyl">
        <div id="buyr">
        <div id="pro_buy">
        
             <a href="#">
               <i class="fa-regular fa-cart-circle-plus" style="color: #1e3250;"></i></a>
         </div><div id="pro_buy">
          <form action="{{ route('remove.from.wish', ['id' => $item->id]) }}" id="ajax-form" method="post">
            @csrf
            <a href="#" >                
              <div id="hid">
              <button type="submit" name="favb">
              <i class="fa-solid fa-heart-circle-plus"></i>
                </button>
               </a>
        </form>
             
              
         </div></div></div></div>
        </div>
            </li>
              @endforeach
    </ul>
    <script>
      jQuery.noConflict();
    
    // Now you can use "jQuery" instead of "$" in your code
    jQuery(document).ready(function($) {
      // Your jQuery code here
    
      $('#ajax-form').submit(function(e) {
            e.preventDefault();
           
            var url = $(this).attr("action");
            let formData = new FormData(this);
      
            $.ajax({
                    type:'POST',
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        alert(response.success);
                        location.reload();
                    },
                    error: function(response){
                        $('#ajax-form').find(".print-error-msg").find("ul").html('');
                        $('#ajax-form').find(".print-error-msg").css('display','block');
                        $.each( response.responseJSON.errors, function( key, value ) {
                            $('#ajax-form').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                        });
                    }
               });
              });
          
        });
    </script>

@endsection