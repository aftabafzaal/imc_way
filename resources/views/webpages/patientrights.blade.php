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
$getpage=$helper->getPagedata('patientright');
$basedata=$helper->getPageBasedata('2');
?>
@include('layouts.latestbanner2')
	<!--banner ends here-->
	<!-- main section start here-->
	<section class="main-inner-sec patient-right-block">
		<div class="container">
			<div class="inner-title">
				<h3>{{($language == "en")?$patientrights_content['section_1']['title_en']:$patientrights_content['section_1']['title_ar']}}</h3>
			</div>
			<div class="accordion-block li-dot">
				<div class="row">
					@if(isset($patientrights))
						@foreach ($patientrights as $key => $patientright)
							@if($key <= 3)
								<div class="col-md-6" style="margin-bottom: 10px;">
									<div class="admission-blocknew">
										<h4 class="text-main"> {{($language == "en")?$patientright->title_en:$patientright->title_ar}} </h4>
										{!! ($language == "en")?$patientright->description_en:$patientright->description_ar !!}
									</div>
								</div>
							@else
								<div class="col-md-6">
									<div class="accordion" id="accordion{{$patientright->id}}">
										<div class="card">
											<div class="card-header" id="heading{{$patientright->id}}">
												<div class="header-in" data-toggle="collapse" data-target="#collapse{{$patientright->id}}" aria-expanded="true" aria-controls="collapse{{$patientright->id}}">
													<p>{{($language == "en")?$patientright->title_en:$patientright->title_ar}}</p>
													<i class="fa fa-plus" aria-hidden="true"></i>
												</div>
											</div>
											<div id="collapse{{$patientright->id}}" class="collapse" aria-labelledby="heading{{$patientright->id}}" data-parent="#accordion{{$patientright->id}}">
												<div class="card-body" style="min-height: 300px;max-height: 300px;overflow-y: auto;">
													{!! ($language == "en")?$patientright->description_en:$patientright->description_ar !!}
												</div>
											</div>
										</div>
									</div>
								</div>
							@endif
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>

	@include('layouts.subscribe')

@endsection
