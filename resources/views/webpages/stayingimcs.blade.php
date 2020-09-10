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
$getpage=$helper->getPagedata('stayingimc');
$basedata=$helper->getPageBasedata('2');
?>
@include('layouts.latestbanner2')
	<!--banner ends here-->
	<!-- main section start here-->
	@php
		$videoFormat = array("webm","mkv","flv","vob","ogv","ogg","drc","mng","avi","mov","qt","wmv","yuv","amv","mp4","mp2","mpeg","mpe","mpv","m4v","svi","3gp","3g2","mxf","roq","nsv","flv","f4v","f4p","f4a","f4b");
	@endphp
	<section class="patient-right-block">
		<div class="inner-title2 stay-imc-video mb-5">
			<iframe width="853" height="480" src="https://www.youtube.com/embed/K-SdPXJiHrA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="container">
			<div class="inner-title">
				<h3>{{($language == "en")?$stayingimcs_content['section_1']['title_en']:$stayingimcs_content['section_1']['title_ar']}}
				</h3>
			</div>
			<div class="stay-imc-content content-new">
				{!! ($language == "en")?$stayingimcs_content['section_1']['description_en']:$stayingimcs_content['section_1']['description_ar'] !!}
			</div>
			<div class="accordion-block">
				<div class="row">
					@if(isset($stayingimcs))
						@foreach ($stayingimcs as $key => $stayingimc)
						@php
							if(!empty($stayingimc->image1)){
								$image1_extension = pathinfo($stayingimc->image1, PATHINFO_EXTENSION);
								$image1_type = in_array($image1_extension,$videoFormat)?1:0;
							}
							if(!empty($stayingimc->image2)){
								$image2_extension = pathinfo($stayingimc->image2, PATHINFO_EXTENSION);
								$image2_type = in_array($image2_extension,$videoFormat)?1:0;
							}
							if(!empty($stayingimc->image3)){
								$image3_extension = pathinfo($stayingimc->image3, PATHINFO_EXTENSION);
								$image3_type = in_array($image3_extension,$videoFormat)?1:0;
							}
						@endphp
							<div class="admission-blocknew mb-2">
								<h4 class="text-main">{{($language == "en")?$stayingimc->title_en:$stayingimc->title_ar}}</h4>
								{!! ($language == "en")?$stayingimc->description_en:$stayingimc->description_ar !!}
								<div class="staying-video">
									<div class="container">
										<div class="row">
											@if(!empty($stayingimc->image1))
											<div class="col-md-4">
												<div class="video-sec">
													@if($image1_type)
														<video controls="false">
															<source src="{{asset('images/stayingimc/images/'.$stayingimc->image1)}}" type="video/mp4">
														</video>
													@else
														<img src="{{asset('images/stayingimc/images/'.$stayingimc->image1)}}" alt="{{ __('messages.stayingIMCImageAlternate') }}" title="{{ __('messages.stayingIMCImageTitle') }}">
													@endif
												</div>
											</div>
											@endif
											@if(!empty($stayingimc->image2))
											<div class="col-md-4">
												<div class="video-sec">
													@if($image2_type)
														<video controls="false">
															<source src="{{asset('images/stayingimc/images/'.$stayingimc->image2)}}" type="video/mp4">
														</video>
													@else
														<img src="{{asset('images/stayingimc/images/'.$stayingimc->image2)}}" alt="{{ __('messages.stayingIMCImageAlternate') }}" title="{{ __('messages.stayingIMCImageTitle') }}">
													@endif
												</div>
											</div>
											@endif
											@if(!empty($stayingimc->image3))
											<div class="col-md-4">
												<div class="video-sec">
													@if($image3_type)
														<video controls="false">
															<source src="{{asset('images/stayingimc/images/'.$stayingimc->image3)}}" type="video/mp4">
														</video>
													@else
														<img src="{{asset('images/stayingimc/images/'.$stayingimc->image3)}}" alt="{{ __('messages.stayingIMCImageAlternate') }}" title="{{ __('messages.stayingIMCImageTitle') }}">
													@endif
												</div>
											</div>
											@endif
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
		<div class="inner-title2 bg-img-home">
			<div class="container">
				<h3>{{($language == "en")?$stayingimcs_content['section_2']['title_en']:$stayingimcs_content['section_2']['title_ar']}}</h3>
				{!! ($language == "en")?$stayingimcs_content['section_2']['description_en']:$stayingimcs_content['section_2']['description_ar'] !!}
			</div>
		</div>
	</section>
	@include('layouts.subscribe')
@endsection
