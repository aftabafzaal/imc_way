@php
	$url=Request::segment(1);
	if(	$url == "en"){
		$language='en';
	}elseif($url == "ar"){
			$language='ar';
	}else{
		$language='en';
	}
	$videoFormat = array("webm","mkv","flv","vob","ogv","ogg","drc","mng","avi","mov","qt","wmv","yuv","amv","mp4","mp2","mpeg","mpe","mpv","m4v","svi","3gp","3g2","mxf","roq","nsv","flv","f4v","f4p","f4a","f4b");
@endphp
@if(isset($testimonials))
	@foreach ($testimonials as $testimonie)
	@php
		if(!empty($testimonie->video1)){
			$extension = pathinfo($testimonie->video1, PATHINFO_EXTENSION);
			$media_type = in_array($extension,$videoFormat)?1:0;
		}else{
			$media_type = 0;
		}
	@endphp
		<div class="col-md-6 testimonial" style="padding:2px">
			<div class="feedbackin">
					<div class="thumbnail testimonial_thumbnail">
						@if($media_type &&  !empty($testimonie->video1) && empty($testimonie->video1))
							<video allowfullscreen controls="true">
								<source src="{{asset('images/testimonials/'.$testimonie->video1)}}" type="video/mp4">
							</video>
						@elseif(!empty($testimonie->youtube_url))
							<iframe allowfullscreen src="@if(isset($testimonie->youtube_url)) {{$testimonie->youtube_url}} @endif">
						 </iframe>
						@endif
				</div>
				<div class="feedback">
					<h4 class="text-main name">{{($language == "en")?$testimonie->name_en:$testimonie->name_ar}}</h4>
					<p>{!!($language == "en")?$testimonie->description_en:$testimonie->description_ar!!}</p>
				</div>
			</div>
		</div>
	@endforeach
@endif
