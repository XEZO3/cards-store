@extends('public._layout')
@section('content')

<style>
	.back{
		height: 80%;
		width:100%;
		text-align:center;
		background:url('{{URL::asset('images/striped.png')}}');
		background-repeat: no-repeat;
		background-size: cover;
		border-radius: 8px;

	}
	.aa:hover{
		text-decoration: none;
		transform: rotate(15deg);
		transition: 0.7s;
		transform-origin: 1px;
	}
	.aa{
		transition: 0.7s;

	}
	.card{
		box-shadow: 10px 10px 10px;
		border-radius: 11px;
	}
</style>

<div class="container-fluid">
	@if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

	<div class="row  justify-content-center">
        @foreach($banner as $item)
		<img alt="*banner name*" class="mySlides animate-fading" src="{{ asset("storage/" . $item['image']) }}"  style="width:100%; max-height:370px;border-radius:10px">
		@endforeach
 
</div>
	</div>

 
<!--banner end-->
    <br>
<!--category-->
    <div class="form-group products">
        <div class="row justify-content-center ">
                
                    @foreach ($category as $item)
					<a href="/cards/{{$item['id']}}" class="aa" style="color: black;" class="product_group">
					<div class="card  shadow-lg" style="width: 11.5rem;margin:20px;height:16rem">
						<div class="back" >
						<img  src="{{ asset('storage/'. $item['image']) }}" style="width: 55%;height:55%;margin-top:35px;  box-shadow: 5px 5px 2px;border-radius: 10px;
						">
						</div>
						<div class="card-body" style="text-align: center">
						  <h5 class="card-title">{{$item['name']}}</h5>
						 
						</div>
					  </div>
					</a>
					@endforeach
				
					</div>
				
			</div>
<!--category end-->
<style>
.card-login{
	max-width:none;
}

#clearsearch{
	position: absolute;
    left: 8px;
    top: 0;
    bottom: 0;
    height: 16px;
    margin: auto;
    font-size: 16px;
    cursor: pointer;
    color: #ccc;
}
#clearsearch:hover{
	color:#000;
}
.altprice{
	color:grey;
	font-size:15px;
}
.products_list{
	width:100%;
	padding:0;
	list-style:none;
	text-align:center;
}
.products_list li{
	width:32.33%;
	margin-top:18px;
	flex: 1 1 25em;
	list-style-type: none;
	display: inline-block;
	max-width:125px;
}
.products_list li a{
	display: block;
    overflow: hidden;
    position: relative;
	
    margin: .5em;
    box-shadow: rgba(0,0,0,.25) 0 0 1em;
    border-radius: .5em;
    text-decoration: none;
    color: inherit;
    background: #fff;
}
.products_list li a .name_wrp{
	background-color: #aaa;
    padding: 1.5em 0 1.5em 0;
    display: -webkit-flex;
    display: flex;
    align-items: center;
    background-position: center;
    transition: .3s;
}
.products_list li a .name_wrp .icon{
	flex: none;
	float:right;
	margin: 0 auto;
}
.products_list li a .name_wrp .icon img{
	height:60px;
}
.products_list li a .name_wrp .name{
	margin-right: 1em;
    font-size: 1.25em;
    font-weight: 700;
    color: #fff;
    flex: auto;
    max-height: 4.5em;
    overflow: hidden;
}
.select2 {
	width:100% !important;
}
.checkout .name_wrp{
	width:100px;
	height:100px;
	background-color: white !important;
}
.checkout .products_list li a .name_wrp .icon img{
	height:25px;
}
.checkout .products_list li{
	max-width:125px;
	opacity:80%;
}

.checkout .products_list li a{
	box-shadow:none;
	margin:0.2em;
}
.checkout .name_wrp .icon{
	position:absolute;
	top:0px;
	left:0px;
}
.checkout .name_wrp .checked{
	position:absolute;
	top:0px;
	right:0px;
	display:none;
}
.checkout .name_wrp .statusbadge{
	position:absolute;
	top:0px;
	right:0px;
}
.checkout .name_wrp .text{
	float: right;
    margin: 0 auto;
    font-weight: 700;
	font-size:12px;
    direction: ltr;
	width: 81px;
    text-align: center;
}
a.disabled{
	cursor: not-allowed;
}
.checkout .product_group .price{
	font-size:17px;
	text-align:center;
}
.product-icon img{
	max-width:20px;
}
@media (max-width: 420px) and (min-width: 400px) {
	.checkout .products_list li{
		margin-right:0%;
	}
}
@media (max-width: 400px) and (min-width: 380px) {
	.checkout .products_list li{
		margin-right:0%;
	}
}
@media (max-width: 380px) and (min-width: 360px) {
	.checkout .products_list li{
		margin-right:0%;
	}
}
@media (max-width: 360px) and (min-width: 340px) {
	.checkout .products_list li{
		margin-right:0%;
	}
}
@media (max-width: 340px) and (min-width: 320px) {
	.checkout .products_list li{
		margin-right:3%;
	}
}
@media (max-width: 320px) and (min-width: 310px) {
	.checkout .products_list li{
		margin-right:1%;
	}
}
@media (max-width: 310px) {
	.checkout .products_list li{
		margin: 0 auto;
	}
}
.product_group.disabled{
	opacity: 0.4;
}
.product_group.disabled.noopacity{
	opacity: 1;
}
.banner img{
	border-radius: 5px;
	max-width:368px;
	
}
#neworder .alert{
	width:100%;
}
.slider{
	width:100%;
	max-height:380px;
	overflow:hidden;
	box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
.slide-item{
	width:100%;
	overflow:hidden;
	background-size: cover !important;
	height: calc(100vw / 100 * 17);
	transition: background-image ease 1000ms;
}
@media (min-width: 1900px){
	.slide-item {
		height: calc((100vw / 100) * 21);
	}
}
@media (min-width: 1367px){
	.slide-item {
		height: calc((100vw / 100) * 19);
	}
}
@media (max-width: 991px) {
	.slide-item{
		height: calc((100vw / 100) * 27);
	}
}
@media (max-width: 600px) {
	.slide-item{
		height: calc((100vw / 100) * 30);
		background-size:100% calc((100vw / 100) * 30) !important;
	}
}
.processing-method img{
	max-width:21px;
}

</style>


@endsection