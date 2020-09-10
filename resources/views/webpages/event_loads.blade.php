@php
$helper = new App\Helpers();
	$url=Request::segment(1);
	if(	$url == "en"){
		$language='en';
	}elseif($url == "ar"){
			$language='ar';
	}else{
		$language='en';
	}
	@endphp
@isset($events)
	@foreach ($events as $event)
	@php
		$enImage= $helper->getImage($event->media_id_en);
		$arImage= $helper->getImage($event->media_id_ar);
		$enattr= $helper->getimageattirbute($enImage);
		$Arattr= $helper->getimageattirbute($arImage);
	 @endphp
	<div class="col-lg-4 col-md-6 event" style="margin-bottom: 40px;">
		<a href="{{Config::get('variable.URL_LINK')}}{{($language == "en")?"event/".$event->slug_en:"event/".$event->slug_ar}}" class="comingevent-box">
			<img src="{{env('BASE_URL')}}{{($language == "en")?$enImage:$arImage}}"  alt="{{($language == "en")?$event->title_en:$event->title_ar}}" title="{{($language == "en")?$event->title_en:$event->title_ar}}">
			<div class="event-text">
				<p style="margin-top:20px">{{($language == "en")?$event->title_en:$event->title_ar}}</p>
			</div>
			<div class="date-pic-box startdate ">
				<p>{{($language == "en")?'Start Date':'تاريخ البدء'}}  <span>{{!empty($event->event_start_date)?date('d M Y',strtotime($event->event_start_date)):""}}</span></p>
			</div>
			<div class="date-pic-box enddate">
				<p>{{($language == "en")?'End Date':'تاريخ الانتهاء'}}  <span>{{!empty($event->event_end_date)?date('d M Y',strtotime($event->event_end_date)):""}}</span></p>
			</div>
		</a>
	</div>
	@endforeach
@endisset
