@extends('public._layout')
@section('content')


<style>
    @media (max-width: 700px) {
        .le{
            width: 100% !important;
            left: 0% !important;
        }
        .content{
            padding: 12px 25px !important;
        }
    }
</style>
<div class="le" style="
    width: 50%;
    left: 25%;
    position: relative;
    height: fit-content;
    border: 1px solid rgba(0,0,0,.125);
    text-align: right;
    border-radius: 5px;
    font-family:tahoma;
    direction: rtl;
">
    <div style="
    border: 1px solid rgba(0,0,0,.125);
    height: 40px;
    background-color: #edeaea;
    padding: 0px 15px;
">اختر طريقة الدفع</div>
<ul style="text-align: center;list-style: none;">
    @foreach ($office as $item)
    <li style="
    display: inline-block;
    margin-top: 18px;
    list-style-type: none;
    max-width: 40%;
    width: 100%;
">
    <a href="/checkout/{{$item['id']}}" style="
    text-decoration: none !important;
    display: block;
    overflow: hidden;
    position: relative;
    margin: 0.5em;
    box-shadow: rgba(0,0,0,.25) 0 0 1em;
    border-radius: 0.5em;
    background: #fff;
    color: inherit;
">
        <div style="
    background-position: center;
    background-color: #aaa;
    display: flex;
    align-items: center;
"><img src="{{ asset('storage/'. $item['image']) }}" style="width: 100%;height:120px;">
</div>
        <span style="
    margin-bottom: 0.5rem !important;
    margin-top: 0.5rem;
    display: block;
">{{$item['name']}}</span>
        </a>
    </li>
    @endforeach
    <!--  -->
    
    
    </ul>
</div>

<style>
.nav {
  width : 100%; 
  margin-right: 0px;
    margin-top: 20px;
    margin-bottom: auto;
    position: relative; 
    display: inline;
}

.span {
  padding: 13px 1px;
    background: url(../images/menubar.png);
    background-repeat: round;
    background-size: cover;
    color: white;
    font-size: 1.2em;
    font-variant: small-caps;
    cursor: pointer;
    display: block;
    width: 100%;
}

.span::after {
  float: right;
  right: 10%;
  content: "+";
}

.slide {
  clear:both;
  width:100%;
  height:0px;
  overflow:auto;
  text-align: right;
  transition: height .4s ease;
}

.slide li {padding : 10px;}

#touchp {position: relative; opacity: 0; height: 0px;}    

#touchp:checked + .slide {height: 100%;max-height: 400px;} 

#touch {position: absolute; opacity: 0; height: 0px;}    

#touch:checked + .slide {height: 100%;max-height: 400px;} 
</style>


@endsection