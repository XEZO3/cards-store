@extends('public._layout')
@section('content')

<style>
  .t-amd{height:100% !important;width:100% !important;
  margin-top:0px !important;max-height:100px !important;}

    

  .col-auto{padding-right:3px !important;padding-left:3px !important;max-width:150px !important;}
  @media(min-width:768px){.mySlides{height:220px !important}}
@media(min-width:350px){
.mySlides{
height:150px
}
}
.back{height:64% !important;
            }
.card-title{margin-bottom:0px !important}
    
.card-title {margin-bottom 0px !important}
.hid{overflow-x:hidden;}
.card-body{
  background-color: #27b8fd;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    color: white;
    font-size:small !important;
}
    @media (min-width:350px){
    .card-body{
        
    display: flex !important;
    flex-direction: column-reverse !important;
    align-items: center !important;
    justify-content: center !important;
    }
    .t-amd {
    width: 65px !important;
    height: 60px !important;
    margin-right: 3px !important;
    margin-top: 16.5% !important;
    }
    .card-title{font-size:100%;word-wrap:normal;}
    .card {
    width: 100px !important;
    height: 130px !important;
    margin: 0px !important;
    margin-bottom: 20px !important;}
}
@media (min-width: 400px){.card{width:122px !important;}}
    @media (min-width:600px){
      .t-amd {
    width: 75% !important;
    height: 75% !important;
    margin-right: 3px !important;
    margin-top: 10% !important;
}
.card-title{font-size:100%;word-wrap:normal;}
.card {
    width: 7.5rem !important;
    height: 150px !important;
}
}
@media (min-width:768px){
  .t-amd {
    width: 80px !important;
    height: 80px !important;
    margin-right: 3px !important;
    margin-top: 10% !important;
    }
.card-title{font-size:100%;word-wrap:normal;}
.card {
    width: 100% !important;
height: 120px !important;
}    .col-auto{flex: 0 0 12% !important;}
}
	.back{
		height: 80%;
		width:100%;
		text-align:center;
		background:url('{{URL::asset('storage/images/fixed/auGb13.webp')}}');
		background-repeat: no-repeat;
		background-size: cover;
		border-radius: 8px;
    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;

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
	 .search-input{padding: 0.375rem 0.75rem;
    width: calc(100% - 80px);
    margin-top: 1rem;
    margin-left: 10px;
    margin-right: 10px;
    border: 1px solid #ced4da;
    font-size: 0.95rem;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;}
    .search-input:focus{border-color:#007bff !important; box-shadow: 0px 0px 7px 0px #007bff;}
    .search-input:focus{outline:none;}
    .t-amd{height:100% !important;width:100% !important;
  margin-top:0px !important;max-height:100px !important;}
</style>

<div class="container-fluid">
	<div class="row  justify-content-center">
        @foreach($banner as $item)
		<img alt="banner name" class="mySlides " src="{{ asset("storage/" . $item['image']) }}"  style="width:100%;border-radius:10px">
		@endforeach
</div>
	</div>

 
<!--banner end-->
    
    <div style="direction: rtl;margin-left: 10px;">
        <form method="get" action="">
          
        <input type="text" name="name" class="search-input"><input type="submit" style="
    width: 60px;
    color: #fff;
    background-color: #007bff;
    border: 1px solid #007bff;
    cursor: pointer;
    text-align: center;
    font-weight: 400;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    border-radius: 0.25rem;
" value="بحث">
</form>
</div>
    
    <br>

<!--category-->
    <div class="form-group products">
        <div class="row justify-content-center ">
                
                    @foreach ($category as $item)
					<div class="col-auto">
					<a href="/cards/{{$item['id']}}" class="aa" style="color: black;" class="product_group">
						
					<div class="card  shadow-lg" style="width: 11.5rem;margin:20px;height:16rem">
						<div class="back" >
						<img class="t-amd" src="{{ asset('storage/'. $item['image']) }}" style="width: 55%;height:55%;margin-top:35px; border-radius: 10px;
						">
						</div>
						<div class="card-body" style="text-align: center;padding:0 !important">
						  <h5 class="card-title">{{$item['name']}}</h5>
						 
						</div>
					  </div>
					</a>
				</div>

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