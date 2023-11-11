@extends('public._layout')
@section('content')


<style>
   .text-center{margin: 0px 50px}
    .themed-grid-col {
  padding-top: .75rem;
  padding-bottom: .75rem;
  background-color: rgb(39 40 42 / 8%);
    border: 1px solid rgb(6 34 255 / 30%);
}

.themed-container {
  padding: .75rem;
  margin-bottom: 1.5rem;
  background-color: rgba(112.520718, 44.062154, 249.437846, .15);
  border: 1px solid rgba(112.520718, 44.062154, 249.437846, .3);
}
.content{overflow-x:hidden!important;}  
</style>
<br>
    <div class="row mb-3 text-center justify-content-center" style="direction: rtl;">
      <div class="col-4 themed-grid-col" style="flex: 0 0 70%;">الإشعار</div>
      <div class="col-4 themed-grid-col" style="flex: 0 0 30%;">التاريخ</div>
    </div>
    @foreach($info as $item)
    <div class="row mb-3 text-center justify-content-center" style="direction: rtl;">  
      <div class="col-4 themed-grid-col" style="flex: 0 0 70%;">{{$item->news}}</div>
      <div class="col-4 themed-grid-col" style="flex: 0 0 30%;">{{$item->updated_at}}</div>
    </div>
    @endforeach



@endsection