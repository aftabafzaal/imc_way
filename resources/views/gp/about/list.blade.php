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
@include('layouts.finalbanner')
<!--banner ends here-->
<section class="dr-profile-sec">
			<div class="container">
				<div class="survey-blocknew">
					<div class="care-patient-sec mt-0">
						<h2>{!!($language == "en")?$content['section_1']['title_en']:$content['section_1']['title_ar']!!}</h2>
						<p>{!!($language == "en")?$content['section_1']['description_en']:$content['section_1']['description_ar']!!}	</p>
					</div>
				</div>
				<div class="dr-profile-right">
					<div class="profile-titlein">
						<div class="profile-about">
						{!!($language == "en")?$data['description_en']:$data['description_ar']!!}
						</div>
					</div>
				</div>
			</div>
		</section>
<!-- main section ends here-->

@include('layouts.bottomneedadcotor')
    <!-- <div class="loadmore"><button>Load more</button></div> -->

  </div>
</section>


@endsection
