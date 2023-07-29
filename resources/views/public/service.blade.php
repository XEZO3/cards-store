@extends('public._layout')
@section('content')
<style>
    .paragraph-content {
  white-space: pre-wrap;
  font-size: 23px;
}
</style>
<div class="container" style="text-align: right">
    <div class="row">
        <div  class="paragraph-content">{{ strip_tags(nl2br($service)) }}</div>

    </div>
</div>

@endsection