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
<?php
$helper = new App\Helpers();
$getpage=$helper->getPagedata('visitor');
$basedata=$helper->getPageBasedata('2');
?>
@include('layouts.latestbanner2')
<!--banner ends here-->
<!-- main section start here-->
<section class="main-inner-sec">
	<div class="container">
		<div class="news-inner-media mb-5">
			<div class="row">
				<div class="col-md-7">
					<div class="visit-video">
						<!-- <iframe width="988" height="556" src="https://www.youtube.com/embed/EyNxuODhLnc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
						<iframe width="988" height="556" src="https://www.youtube.com/embed/EyNxuODhLnc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					
					</div>
				</div>
				<div class="col-md-5">
					<div class="visit-right-block">
					<h3 class="text-main">{{($language == "en")? $visitor_content['section_1']['title_en']: $visitor_content['section_1']['title_ar']}}</h3>
					{!! ($language == "en")?$visitor_content['section_1']['description_en']:$visitor_content['section_1']['description_ar'] !!}

					</div>
				</div>
			</div>

		</div>
		<!-- <div class="inner-title">
			<h3>{{($language == "en")?$visitor_content['section_1']['title_en']:$visitor_content['section_1']['title_ar']}}</h3>
			<p class="m-0">
				{!! ($language == "en")?$visitor_content['section_1']['description_en']:$visitor_content['section_1']['description_ar'] !!}
			</p>
		</div> -->

		<div class="accordion-block visitor-block visit-new li-dot">
			<div class="row">
				<div class="accordion" >
					@if(isset($visitors))
						@foreach ($visitors as $visitor)
								<h4 class="text-main">{{($language == "en")?$visitor->title_en:$visitor->title_ar}}</h4>
								<div class="card-body">
									{!! ($language == "en")?$visitor->description_en:$visitor->description_ar !!}
								</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
<!-- main section ends here-->
<!--need-block start here-->
@include('layouts.commonfooter')

@endsection
