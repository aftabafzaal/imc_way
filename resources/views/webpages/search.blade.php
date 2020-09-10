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
<!-- main section start here-->
<div class="accordion-block search-content">
	<div class="container">
		@if(isset($search_data) && count($search_data))
			@foreach ($search_data as $url => $page)
				@foreach ($page as $data)
					<div class="admission-blocknew search-contentin">
						<h4 class="text-main title">{{($language == "en")?$data->title_en:$data->title_ar}}</h4>
						{!!($language == "en")?$data->description_en:$data->description_ar!!}
						<a href="{{url('/'.$url)}}">  {{($language == "en")?"Read more ":"أقرأ المزيد"}}  </a>
					</div>
				@endforeach
			@endforeach
		@else
		<div class="admission-blocknew search-contentin" style="min-height: 100px;padding-top: 50px;">
			<h4 class="text-main title"> {{($language == "en")?"No search result found":"لا يوجد نتائج للبحث"}}   </h4>
		</div>
		@endif
	</div>
</div>
@include('layouts.subscribe')

@endsection
