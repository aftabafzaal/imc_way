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
$getpage=$helper->getPagedata('appointment');
$basedata=$helper->getPageBasedata('2');
?>
@include('layouts.latestbanner2')
	<!--banner ends here-->
	<!-- main section start here-->
	<section class="main-inner-sec appointment-page">
		<div class="container">
			<div class="inner-title">
				<h3>{{($language == "en")?$appointment_content['section_1']['title_en']:$appointment_content['section_1']['title_ar']}}</h3>
				<p class="m-0">
					{!! ($language == "en")?$appointment_content['section_1']['description_en']:$appointment_content['section_1']['description_ar'] !!}
				</p>
			</div>
		</div>
		<div class="process-block new-process-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="admission-blocknew admission-blocknew1 process-titlenew wow fadeInLeft">
							<h5 class="text-main">{{($language == "en")?$appointment_content['section_2']['title_en']:$appointment_content['section_2']['title_ar']}}</h5>
							{!! ($language == "en")?$appointment_content['section_2']['description_en']:$appointment_content['section_2']['description_ar'] !!}
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="process-titlenew new-border-box visiting-box wow fadeInRight">
							<h3 class="text-main">{{($language == "en")?$appointment_content['section_3']['title_en']:$appointment_content['section_3']['title_ar']}}</h3>
							{!! ($language == "en")?$appointment_content['section_3']['description_en']:$appointment_content['section_3']['description_ar'] !!}
							<ul class="new-socail-sec-play eng">
								<li>
									<a class="hvr-buzz-out" href="https://apps.apple.com/sa/app/my-imc/id1491751418" target="_blank">
										<i class="fa fa-apple" aria-hidden="true"></i>
										<p>Available on the <span class="d-block">App Store</span></p>
										<p class="click-content">Download App</p>
									</a>
								</li>
								<li>
									<a class="hvr-buzz-out" href="https://play.google.com/store/apps/details?id=sa.med.imc.myimc" target="_blank">
										<i class="fa fa-play" aria-hidden="true"></i>
										<p>get it on <span class="d-block">Google Play</span></p>
										<p class="click-content">Download App</p>
									</a>
								</li>
							</ul>
							<ul class="new-socail-sec-play ar">
								<li>
									<a class="hvr-buzz-out" href="https://apps.apple.com/sa/app/my-imc/id1491751418" target="_blank">
										<i class="fa fa-apple" aria-hidden="true"></i>
										<p>متوفر على <span class="d-block">متجر التطبيقات</span></p>
										<p class="click-content">تحميل التطبيق</p>
									</a>
								</li>
								<li>
									<a class="hvr-buzz-out" href="https://play.google.com/store/apps/details?id=sa.med.imc.myimc" target="_blank">
										<i class="fa fa-play" aria-hidden="true"></i>
										<p>الحصول عليها<span class="d-block">تطبيقات جوجل</span></p>
										<p class="click-content">تحميل التطبيق</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="bring-icon">
				<h2 class="text-main">
			    {{($language == "en")?$appointment_content['section_4']['title_en']: $appointment_content['section_4']['title_ar'] }}</h2>
				{!! ($language == "en")?$appointment_content['section_4']['description_en']: $appointment_content['section_4']['description_ar'] !!}
			</div>
			<div class="accordion-block appoint-block-boxes">
				<div class="row">
					@if(isset($appointments))
						@foreach ($appointments as $appointment)
							<div class="col-md-12" style="margin-bottom: 10px;">
								<div class="admission-blocknew">
									<h4 class="text-main">{{($language == "en")?$appointment->title_en:$appointment->title_ar}}</h4>
									{!! ($language == "en")?$appointment->description_en:$appointment->description_ar !!}
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>
	<!-- main section ends here-->
	<!-- need-block start here-->
	@include('layouts.bottomneedadcotor')

	<!-- need-block ends here-->
@endsection
