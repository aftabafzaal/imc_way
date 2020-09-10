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
$getpage=$helper->getPagedata('benefit');
$basedata=$helper->getPageBasedata('2');
?>
@include('layouts.latestbanner2')

<!--banner ends here-->
<section class="main-inner-sec">
	<div class="container">
		<div class="inner-title">
			<h3>{{($language == "en")?$benefit_content['section_1']['title_en']:$benefit_content['section_1']['title_ar']}}</h3>
			<p class="m-0">
				{!! ($language == "en")?$benefit_content['section_1']['description_en']:$benefit_content['section_1']['description_ar'] !!}
			</p>
		</div>
		<div class="History-block benefits-new-block">
			@if(isset($benefits))
				@foreach ($benefits as $key => $benefit)
					@if(($key % 2) == 0)
					<div class="row mb-5">
						<div class="col-lg-6 col-md-12">
							<div class="history-element">
								<h4 class="text-main">{{($language == "en")?$benefit->title_en:$benefit->title_ar}}</h4>
								{!! ($language == "en")?$benefit->description_en:$benefit->description_ar !!}
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="history-img new-shape-right">
								<?php
								$helper = new App\Helpers();
								?>
								<?php
								$enImage= $helper->getImage($benefit->media_id);
								$img=env('BASE_URL').$enImage;
								?>
								<img src="{{$img}}">
							</div>
						</div>
					</div>
					@else
					<div class="row mb-5">
						<div class="col-lg-6 col-md-6">
							<div class="history-img new-shape-left">
								<?php
								$helper = new App\Helpers();
								?>
								<?php
								$enImage= $helper->getImage($benefit->media_id);
								$img=env('BASE_URL').$enImage;
								?>
								<img src="{{$img}}">
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="history-element">
									<h4 class="text-main">{{($language == "en")?$benefit->title_en:$benefit->title_ar}}</h4>
									{!! ($language == "en")?$benefit->description_en:$benefit->description_ar !!}
							</div>
						</div>
					</div>
					@endif
				@endforeach
			@endif
		</div>
	</div>
</section>
<!-- main section ends here-->
<!-- need section start here-->
<!-- <section class="need-block">
	<div class="container">
		<h4 class="text-fff"><span class="d-block">{{($language == "en")?$benefit_content['section_2']['title_en']:$benefit_content['section_2']['title_ar']}}</span></h4>
		{!! ($language == "en")?$benefit_content['section_2']['description_en']:$benefit_content['section_2']['description_ar'] !!}
	</div>
</section> -->
@include('layouts.needadoctorsingle')

<!-- need section ends here-->
<!-- contact-bg-block start here-->
<section class="contact-block wow fadeInUp">
	<div class="container">
		<div class="row">
			<div class="cool-md-12 col-lg-4 wow slideInLeft">
				<div class="contact-element">
					<div class="element-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
					<h4>{{($language == "en")?$benefit_content['section_3']['title_en']:$benefit_content['section_3']['title_ar']}}</h4>
					{!! ($language == "en")?$benefit_content['section_3']['description_en']:$benefit_content['section_3']['description_ar'] !!}
				</div>
			</div>
			<div class="cool-md-12 col-lg-4">
				<div class="contact-element">
					<div class="element-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
					<h4>{{($language == "en")?$benefit_content['section_4']['title_en']:$benefit_content['section_4']['title_ar']}}</h4>
					{!! ($language == "en")?$benefit_content['section_4']['description_en']:$benefit_content['section_4']['description_ar'] !!}
				</div>
			</div>
			<div class="cool-md-12 col-lg-4 wow slideInRight">
				<div class="contact-element">
					<div class="element-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
					<h4>{{($language == "en")?$benefit_content['section_5']['title_en']:$benefit_content['section_5']['title_ar']}}</h4>
					{!! ($language == "en")?$benefit_content['section_5']['description_en']:$benefit_content['section_5']['description_ar'] !!}
				</div>
			</div>
		</div>
	</div>
</section>
<!-- contact-bg-block ends here-->
@endsection
