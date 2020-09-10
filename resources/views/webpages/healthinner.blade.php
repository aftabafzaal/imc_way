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
$helper = new App\Helpers();
$maindata=$helper->getPageBasedata('6');
$basedata=$helper->getMainBasedata('health-tips');
$url='health-tips';
@endphp
@include('layouts.innerPageLayout')
<!--banner ends here-->
<section class="health-inner-block">
  <div class="container">

    <div class="row">
      <div class="col-lg-6 col-md-12">
				<iframe width="853" height="480" src="{{$data['youtube_url']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="col-lg-6 col-md-12">
			<div class="health-inner">
				{!!($language == "en")?$data['description_en']:$data['description_ar']!!}
			</div>
      </div>
    </div>
  </div>
</section>

@include('layouts.needadoctorsingle')
@endsection
