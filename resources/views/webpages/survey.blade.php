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
<!--banner ends here-->
<section class="find-doctor find-doctors eye-block eye-block-bg">
    <div class="container">
      <div class="banner-in">
        <div class="banner-left">
          <h4 class="text-fff">{{($language == "en")?$content['banner']['title_en']:$content['banner']['title_ar']}}
 </h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}">Home</a></li>
              <li class="breadcrumb-item active text-fff" aria-current="page">{{($language == "en")?$content['banner']['title_en']:$content['banner']['title_ar']}}
 </li>
            </ol>
          </nav>
        </div>
        <div class="banner-right">
          <ul>
            <li>
              <a href="#" style="font-size: 13px;">A-</a>
            </li>
            <li>
              <a href="#" style="font-size: 16px;">A</a>
            </li>
            <li>
              <a href="#">A+</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-print" aria-hidden="true"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    @include('layouts.squarebox')
  </section>


			<section class="">
				<div class="container">
					<div class="survey-blocknew">
						<div class="care-patient-sec">
							<h2>{{($language == "en")?$content['section_1']['title_en']:$content['section_1']['title_ar']}}</h2>
							<p>{!! ($language == "en")?$content['section_1']['description_en']:$content['section_1']['description_ar'] !!}
							</p>
						</div>
						<div class="survey-sec">
							<div class="row">

								@if(isset($data))
									@foreach ($data as $survey)
								<div class="col-md-4">
									<a href="{{Config::get('variable.URL_LINK')}}survey/{{$survey->id}}" class="survey-box">
										<img src="{{Config::get('variable.URL_LINK')}}images/surveys/{{$survey->image}}" alt={{$survey->image}}>
										<h4 class="text-fff">{{($language == "en")?$survey['title_en']:$survey['title_ar']}}</h4>
									</a>
								</div>
								@endforeach
							@endif
							</div>

						</div>
					</div>
				</div>
			</section>

<!-- main section ends here-->
<!-- need section start here-->
@include('layouts.needadoctorsingle')

<!-- need section ends here-->
@endsection
