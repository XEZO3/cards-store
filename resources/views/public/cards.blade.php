@extends('public._layout')
@section('content')

<style>
  .product {
    min-height: 302px;
  }

  .ftco-section {
    padding: 0px !important;
  }

  .col-lg-3,
  .col-md-6 {
    width: 100%;
    padding-right: 0px !important;
  }

  .hid {
    overflow-x: hidden;
  }

  .modal-backdrop {
    z-index: -1;
  }

  span.price-dc {
    overflow-wrap: break-word;
  }
</style>

<link rel="stylesheet" href="{{ URL::asset("css/pro.css") }}">
<style>
  /* Add responsive styles here */
  @media (min-width: 576px) {
    .col-sm-5 {
      width: 50% !important;
    }
  }

  @media (min-width: 768px) {
    .col-md-6,
    .col-lg-4 {
      width: 50% !important;
    }
  }

  @media (min-width: 992px) {
    .col-lg-3 {
      width: 25% !important;
    }
  }
</style>

<section class="ftco-section">
  <div class="container">
    @if(count($products)>0)
    @php
    $rank = 0;
    if(auth()->check()){
      $rank = auth()->user()->rank;
    }
    @endphp
    <div class="row justify-content-center">
      @foreach ($products as $item)
      @php
      $price = $item['price']*((100-$item['discount'])/100)*(100 - ($rank == 1 ? 20 : ($rank == 2 ? 10 : ($rank == 3 ? 5 : 0)))) / 100;
      @endphp
      @if($item['discount']!=0)
      <div class="col-md-6 col-lg-4 col-sm-5  ftco-animate fadeInUp ftco-animated">
        <!-- Rest of your code -->
      </div>
      @else
      <div class="col-md-6 col-lg-4 col-sm-5 ftco-animate fadeInUp ftco-animated">
        <!-- Rest of your code -->
      </div>
      @endif
      <!-- modal start -->
      <div class="modal fade" id="sosab{{$item['id']}}s" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Rest of your code -->
      </div>
      <!-- modal end -->
      @endforeach
    </div>
    @else
    <h2 style="text-align: center">لا يتوفر منتجات لهذا القسم</h2>
    @endif
  </div>
</section>

<!-- Your JavaScript code -->
<script>
  // Add your JavaScript code here
</script>

@endsection
