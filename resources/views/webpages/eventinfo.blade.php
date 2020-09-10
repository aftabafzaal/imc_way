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
//$getpage=$helper->getPagedata('');
$maindata=$helper->getPageBasedata('5');
$basedata=$helper->getMainBasedata('event');
$url='event';
?>
@include('layouts.innerPageLayout')

<!--banner ends here-->
<style>
.attent-block .attent-in p, .attent-block .attent-in ul li {
    text-align: left;
    margin-bottom: 7px;
}
.attent-block .attent-in ul li {
    position: relative;
    padding-left: 25px;
}
.attent-block .attent-in ul li::after {
    content: "\f068";
    color:
    #009b41;
    font-weight: bold;
    display: inline-block;
    width: 1em;
    position: absolute;
    top: 0px;
    font-family: Fontawesome;
    left: 0;
}
</style>
@isset($event->id)
<section class="banner-event-inner">
   
	@if(count($event->eventbanner)>0)
	<div class="owl-carousel owl-carousel-event owl-theme">
		@foreach ($event->eventbanner as $item)
		@php
			$enImage= $helper->getImage($item->media_id_en);
			$arImage= $helper->getImage($item->media_id_ar);
			$enattr= $helper->getimageattirbute($enImage);
			$Arattr= $helper->getimageattirbute($arImage);
		 @endphp
			<div class="item">
				<img src="{{env('BASE_URL')}}{{($language == "en")?$enImage:$arImage}}"  alt="{{ __('messages.eventInnerBannerAlternate') }}" title="{{ __('messages.eventInnerBannerTitle') }}">
			</div>
		@endforeach
	</div>
	@endif
</section>

<section class="date-map-divider">
	<div class="container">
		<div class="divider-green">
			<div class="row">
				<div class="col-md-6">
					<div class="d-left bg-img">
						<div class="d-icon">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</div>
						<div class="d-content">
							<p>  Start Date:      {{!empty($event->event_start_date)?date('d M Y',strtotime($event->event_start_date)):""}}</p>
							<p>End Date: {{!empty($event->event_end_date)?date('d M Y',strtotime($event->event_end_date)):""}}</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="d-left">
						<div class="d-icon">
							<i class="fa fa-clock-o" aria-hidden="true"></i>
						</div>
						<div class="d-content">
							<p>{{!empty($event->event_start_time)?date('h:i a',strtotime($event->event_start_time)):""}}{{!empty($event->event_end_time)?"-".date('h:i a',strtotime($event->event_end_time)):""}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="location-detail">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="detail-left">
					<div class="detail-icon">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="detail-content">
						<p>{!!($language == "en")?$event->address_en:$event->address_ar!!}</p>
					</div>
				</div>
			</div>
		<div class="col-md-6">
				<div class="detail-right">
					<div class="contentin">
				<a href="tel:{{$event->phone}}">	<i class="fa fa-phone" aria-hidden="true"></i></a>
						<a href="tel:{{$event->phone}}"><p>{{$event->phone}}</p></a>
					</div>
					<div class="contentin">
					<a href="mailto:{{$event->email}}" target="_top"><i class="fa fa-envelope" aria-hidden="true"></i></a>
						<a href="mailto:{{$event->email}}" target="_top">	<p>{{$event->email}}</p></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@php
$fees="true";
@endphp

@if(count($event->eventcourses) > 0)
	@foreach ($event->eventcourses as $coursetest)
		@if(empty($coursetest->amount))
			@php
			$fees="false";	break;	
			@endphp
		@endif
	@endforeach
@endif

@if($fees=="true")
<section class="course-fee-block">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="course-title">
					<h3>{{($language == "en")?"Course Fee":"رسوم التسجيل"}}</h3>
				</div>
				<div class="row">
					@if(count($event->eventcourses) > 0)
						@foreach ($event->eventcourses as $course)
							@if(!empty($course->amount))
							<div class="col-md-6">
								<div class="course-detail">
									<p>{{($language == "en")?$course->name_en:$course->name_ar}} </p>
									<h3>{{$course->amount}}</h3>
									<!--<div class="vat">
										<h4>
										<?php  if(!empty($course->vat)){
											 echo $course->vat;
										}else{
											 echo "0";
										}?>%<span>VAT</span></h4>
									</div>-->
								</div>
							</div>
							@endif
						@endforeach
					@endif
				</div>
			</div>
		
			@if(isset($event->register_link))
			<div class="col-md-4">
				<div class="register-btn">
					<div class="btn-appointment">
						<a href="{{$event->register_link}}" target="_blank">{{($language == "en")?"Register Now":"سجل الآن"}}</a>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</section>
@endif
<section class="attent-block">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="attent-in">
					<!--<h3>Content</h3>-->
					<p>{!!($language == "en")?$event->content_en:$event->content_ar!!}</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="attent-in">
					<!--<h3>Who Should Attend?</h3>-->
					<p>{!!($language == "en")?$event->attend_en:$event->attend_ar!!}</p>
				</div>
			</div>
		</div>
		@php
			$pdf= $helper->getImage($event->media_pdf);
			$pdfName =env("BASE_URL").$pdf;
		 @endphp
		@if(!empty($pdf))
		<div class="booklet-block">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="booklet-btn">
						<a href="{{$pdfName}}" target="_blank">{{($language == "en")?"Download Event Booklet":"مزيد من التفاصيل عن هذه الدورة "}}<i class="fa fa-file-pdf-o" aria-hidden="true" download></i></a>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</section>

<section class="spearker-block">
	<div class="container">
		<div class="spearker-blockin">
			<div class="row">
				<div class="col-md-6 col-lg-4">

					@if(isset($event->eventspeakers) && count($event->eventspeakers) > 0)
					<div class="speaker-left">
						<h3>{{($language == "en")?"Speakers":"المتحدثون"}}</h3>
						<ul class="speaker-profiles">
							@foreach ($event->eventspeakers as $speaker)
							@php
								$enImage= $helper->getImage($speaker->media_id_en);
								$arImage= $helper->getImage($speaker->media_id_ar);
							 @endphp

								<li>
									<div class="porfile-img">
										<img src="{{env('BASE_URL')}}{{($language == "en")?$enImage:$arImage}}" style="width:170px;border-radius: 100%"  alt="{!!($language == "en")?$speaker->name_en:$speaker->name_ar!!}" title="{!!($language == "en")?$speaker->name_en:$speaker->name_ar!!}">
										<ul class="social-hover-icon">
											@if(!empty($speaker->facebook))
											<li>
												<a href="{{$speaker->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
											</li>
											@endif
											@if(!empty($speaker->twitter))
											<li>
												<a href="{{$speaker->twitter}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
											</li>
											@endif
											@if(!empty($speaker->instagram))
											<li>
												<a href="{{$speaker->instagram}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
											</li>
											@endif
											@if(!empty($speaker->youtube))
											<li>
												<a href="{{$speaker->youtube}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
											</li>
											@endif
										</ul>
									</div>
									<div class="speaker-profile-name">
										<h6>{!!($language == "en")?$speaker->name_en:$speaker->name_ar!!}</h6>
										<p>{!!($language == "en")?$speaker->title_en:$speaker->title_ar!!}</p>
										<p>{!!($language == "en")?$speaker->bio_en:$speaker->bio_ar!!}</p>
									</div>
								</li>
							@endforeach
						</ul>
					</div>
					@endif
				</div>
				@if(!empty($event->contact_en))
				<div class="col-md-6 col-lg-8">
					<div class="speaker-right">
						<div class="debit-img">
							<img src="{{asset('assets/images/event-inner/debit.png')}}">
						</div>
						<p>{!!($language == "en")?$event->contact_en:$event->contact_ar!!}</p>
					</div>
				</div>
				@endif
			</div>
		</div>

	</div>
</section>
@endisset
@endsection
@section('script')

@endsection
