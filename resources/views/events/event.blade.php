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
$getpage=$helper->getPagedata('event');
$basedata=$helper->getPageBasedata('5');
$url='event';
?>
@include('layouts.finalbanner')

<!--banner ends here-->
<!-- event start here-->
{{-- <section class="banner-event">
		<div class="item">
			<img src="{{asset('assets/images/event-inner/event1.jpg')}}">
		</div>
</section> --}}
<section class="banner-event-inner">
	@if(count($eventbanner)>0)
	<div class="owl-carousel owl-carousel-event owl-theme">
		@foreach ($eventbanner as $item)
			<div class="item">
				<a href="{{!empty($item->link)?$item->link:"#"}}">
					<img src="{{asset('images/events/banner/'.$item->image)}}">
				</a>
			</div>
		@endforeach
	</div>
	@endif
</section>
<section class="event-slider">
	<div class="container">
		<div class="owl-carousel owl-carousel-event-main owl-theme">
			@foreach ($eventDates as $date)
				<div class="item">
					<div class="event-date" data-date="{{Date('Y-m-d', strtotime($date))}}" style="cursor: pointer;">
						<p>{{Date('d', strtotime($date))}}</p>
					</div>
					<div class="month">
						<p>{{Date('M', strtotime($date))}}</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
<section class="form-event">
	<div class="container">
		<div class="eventform-in">
			<form id="search_event_form" action="{{url('/event/search')}}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token()}}" />
				<div class="form-group">
					<input type="text" class="form-control" name="name" aria-describedby="Title" placeholder="{{($language == "en")?'Search Title':'بحث العنوان'}}">
				</div>
				<div class="form-group">
					<input name="from_event" class="form-control"  type="text" id="from_event"  placeholder="{{($language == "en")?'Search From Date':'البحث من التاريخ'}}" autocomplete="off">
				</div>
				<div class="form-group">
					<input name="to_event" class="form-control"  type="text" id="to_event"  placeholder="{{($language == "en")?'Search To Date':'البحث في التاريخ'}}" autocomplete="off">
				</div>
				<div class="form-group">
					<button type="button" class="btn-search">{{($language == "en")?'Search':'بحث'}}</button>
					<!-- <button type="button" class="btn-search"><i class="fa fa-filter" aria-hidden="true"></i>{{($language == "en")?'Filter':'منقي'}}</button> -->
				</div>
			</form>
		</div>
	</div>
</section>

<section class="event-upcoming">
	<div class="container">
		@isset($events)
		<input type="hidden" id="totalEvents" value="{{$totalEvents}}" />
		<div class="row allevents">
			@foreach ($events as $event)
			<div class="col-lg-4 col-md-6 event" style="margin-bottom: 40px;">
				<a href="{{env('BASE_URL')}}event/{{($language == "en")?$event->slug_en:$event->slug_ar}}" class="comingevent-box">
					<img src="{{asset('images/events/')}}/{{($language == "en")?$event->image1:$event->image1Ar}}">
					<div class="event-text">
						<p style="margin-top:20px">{{($language == "en")?$event->title_en:$event->title_ar}}</p>
					</div>
					<div class="date-pic-box startdate ">
						<p>{{($language == "en")?'Start Date':'تاريخ البدء'}} <span>{{!empty($event->event_start_date)?date('d M Y',strtotime($event->event_start_date)):""}}</span></p>
					</div>
					<div class="date-pic-box enddate">
						<p>{{($language == "en")?'End Date':'تاريخ الانتهاء'}} <span>{{!empty($event->event_end_date)?date('d M Y',strtotime($event->event_end_date)):""}}</span></p>
					</div>
				</a>
			</div>
			@endforeach
		</div>
		<div class="loadmore" style="margin-top: 40px;margin-bottom: 0px !important; {{($totalEvents <= 3) ?'display:none':''}}"><button>{{($language == "en")?'Load more':'تحميل المزيد'}}</button></div>
		@endisset
	</div>
</section>
<!-- event ends here-->
@include('layouts.needadoctorsingle')

@endsection
@section('script')
<script type="text/javascript">
	var selectedDate="";
	$( function() {
		$( "#from_event" ).datepicker({
			dateFormat: "mm-dd-yy",
			duration: "fast",
			autoclose: true
		});
	});
	$( function() {
		$( "#to_event" ).datepicker({
			dateFormat: "mm-dd-yy"
		,	duration: "fast",
			autoclose: true
		});
	});

	$('.slide').hiSlide();
	var owl = $('.owl-carousel-event-main');
	owl.owlCarousel({
		items: 6,
		loop: false,
		nav: false,
		dots: true,
		fluidSpeed:true,
		autoplayTimeout: 5000,
		autoplay: true,
		responsive:{
     		0:{
     			items:1,
     		},
     		600:{
     			items:3,
     			nav:false
     		},
     		991:{
     			items:6,
     		}
     	}
	});

	$(".loadmore").click(function(){
		var offset = $('.event').length;
		$('.pageloader').show();
		$.ajax({
			url: "{{url('/event/loadMore')}}",
			type: 'post',
			data: $("#search_event_form").serialize()+ "&event_date="+selectedDate+"&offset="+offset+"&_token="+'{{csrf_token()}}',
			success: function(response) {
				$('.pageloader').hide();
				if(response !=""){
					$('.allevents').append(response.eventsContent);
					$('#totalEvents').val(response.eventsTotal);
				}
				var currentEvents = $('.event').length;
				var totalEvents = $('#totalEvents').val();

				if(currentEvents == totalEvents){
					$(".loadmore").hide();
				}
			}
		});
	});

	$(".btn-search").click(function(){
		var offset = 0;
		$('.pageloader').show();
		$.ajax({
			url: "{{url('/event/loadMore')}}",
			type: 'post',
			data: $("#search_event_form").serialize()+ "&offset="+offset+"&_token="+'{{csrf_token()}}',
			success: function(response) {
				$('.pageloader').hide();
				if(response == ""){
					$('.allevents').html("<h3 style='padding: 15px'>No Events Found</h3>")
					$(".loadmore").hide();
				}else{
					$('.allevents').html(response.eventsContent);
					$('#totalEvents').val(response.eventsTotal);
					$(".loadmore").show();
				}

				var currentEvents = $('.event').length;
				var totalEvents = $('#totalEvents').val();

				if(currentEvents == totalEvents){
					$(".loadmore").hide();
				}
			}
		});
	});

	$("#calendar").datepicker({
		todayHighlight: true,
		weekStart: 1
	}).on({'changeDate': function(e) {
		var offset = 0;
		selectedDate = e.date.toDateString();
		$('.pageloader').show();
		$.ajax({
			url: "{{url('/event/loadMore')}}",
			type: 'post',
			data: {"event_date":e.date.toDateString(),"offset":offset,"_token":'{{csrf_token()}}'},
			success: function(response) {
				$('.pageloader').hide();
				if(response == ""){
					$('.allevents').html("<h3 style='padding: 15px'>No Events Found</h3>")
					$(".loadmore").hide();
				}else{
					$('.allevents').html(response.eventsContent);
					$('#totalEvents').val(response.eventsTotal);
					$(".loadmore").show();
				}

				var currentEvents = $('.event').length;
				var totalEvents = $('#totalEvents').val();

				if(currentEvents == totalEvents){
					$(".loadmore").hide();
				}
			}
		});
	}
	});

	$(document).on("click",".event-date",function(){
		var offset = 0;
		selectedDate = $(this).data("date");
		$('.pageloader').show();
		$.ajax({
			url: "{{url('/event/loadMore')}}",
			type: 'post',
			data: {"event_date":selectedDate,"offset":offset,"_token":'{{csrf_token()}}'},
			success: function(response) {
				$('.pageloader').hide();
				if(response == ""){
					$('.allevents').html("<h3 style='padding: 15px'>No Events Found</h3>")
					$(".loadmore").hide();
				}else{
					$('.allevents').html(response.eventsContent);
					$('#totalEvents').val(response.eventsTotal);
					$(".loadmore").show();
				}

				var currentEvents = $('.event').length;
				var totalEvents = $('#totalEvents').val();

				if(currentEvents == totalEvents){
					$(".loadmore").hide();
				}
			}
		});
	});
</script>
@endsection
