@extends('layouts.home')
@section('content')
@php
	$url=Request::segment(1);
	if(	$url == "en"){
		$language='en';
	}elseif($url == "ar"){
			$language='ar';
	}else{
		$language='en';
	}
	@endphp
<!--banner start here-->
<section class="find-doctor find-doctors eye-block eye-block-bg">
	<div class="container">
		<div class="banner-in">
			<div class="banner-left">
				<h1 class="text-fff"> {!!($language == "en")?$data['name_en']:$data['name_ar']!!}
</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}">
{!!($language == "en")?'Home':"الصفحة الرئيسية"!!}</a></li>
						<li class="breadcrumb-item active text-fff" aria-current="page">  {!!($language == "en")?$data['name_en']:$data['name_ar']!!}
</li>
					</ol>
				</nav>
			</div>
		         @include('layouts.buttons')
		</div>
	</div>
	@include('layouts.squarebox')
</section>
         <?php 
         if(!empty($data['image1'])){
             ?>
             	<div class="imc-full-width-slider">
        		  <img src="{{env('BASE_URL')}}images/media/{{$data['image1']}}">
        		</div>
             <?php
         }
         ?>	
         <div class="imc-full-width-block">
             <!-- Include slider embed library -->
<?php include base_path()."/slider/revslider-standalone/embed.php"; ?>


<!-- Add CSS and JS libraries to html header -->
<?php RevSliderEmbedder::headIncludes(); ?>
<?php 
if(!empty($data['slideren']) || !empty($data['sliderAr'])){
	if(	$language == "en"){
		 RevSliderEmbedder::putRevSlider($data['slideren']); 
	}elseif($url == "ar"){
		 RevSliderEmbedder::putRevSlider($data['sliderAr']); 
		 }
}
	?>
	
			{!!($language == "en")?$data['content_en']:$data['content_ar']!!}
		</div>
		<!-- imc-full-width-block ends here-->
<!-- main section ends here-->
@include('layouts.needadoctorsingle')
 <!-- <div class="loadmore"><button>Load more</button></div> -->

  </div>
</section>


@endsection
