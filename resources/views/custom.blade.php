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
				<h4 class="text-fff"> {!!($language == "en")?$data['name_en']:$data['name_ar']!!}
</h4>
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

<!--<section class="main-inner-sec pt-0 care-partner">-->
<!--  <div class="mayo-imc-img">-->
<!--  <img src="{{env('BASE_URL')}}media/{{$data['image1']}}">-->
<!--  </div>-->
<!-- </section>-->
 
<!--banner ends here-->
<section class="dr-profile-sec">
			<div class="container">
				<div class="survey-blocknew">
					<div class="care-patient-sec mt-0">
						<h2>{!!($language == "en")?$data['name_en']:$data['name_ar']!!}</h2>
					</div>
				</div>
				<div class="dr-profile-right">
					<div class="profile-titlein">
						<div class="profile-about">
						{!!($language == "en")?$data['content_en']:$data['content_ar']!!}
						</div>
					</div>
				</div>
			</div>
		</section>
<!-- main section ends here-->
@include('layouts.needadoctorsingle')
    <!-- <div class="loadmore"><button>Load more</button></div> -->

  </div>
</section>


@endsection
