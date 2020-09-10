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
<!--banner start here-->
<?php
$helper = new App\Helpers();
$getpage=$helper->getPagedata('residence');
$basedata=$helper->getPageBasedata('');
?>
@include('layouts.finalbanner')
<!--banner ends here-->
<!-- main section start here-->
<!-- main section start here-->
<section class="main-inner-sec">
	<div class="container">

		<div class="History-block residence-block">
			<div class="care-patient-sec mt-0">
				<h3><b>{!!($language == "en")?$content['section_1']['title_en']:$content['section_1']['title_ar']!!}</b></h3>
				<p>		{!!($language == "en")?$content['section_1']['description_en']:$content['section_1']['description_ar']!!}	</p>
			</div>
			<div class="row mb-5 ">
				<div class="col-lg-6 col-md-12 wow fadeInLeft">
					<div class="history-img new-shape-left">
					<!--	<img src="{{env('BASE_URL')}}assets/images/imc1.JPG" alt="{{ __('messages.residencyFrontImageAlternate') }}" title="{{ __('messages.residencyFrontImageTitle') }}">-->
				
						<iframe width="560" height="400" src="https://www.youtube.com/embed/-UN8VmWJRMU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				
					</div>
				</div>
				<div class="col-lg-6 col-md-12 wow  fadeInRight">
					<div class="history-element">
						<h4 class="text-main">{!!($language == "en")?$content['section_2']['title_en']:$content['section_2']['title_ar']!!}</h4>
                                 {!!($language == "en")?$content['section_2']['description_en']:$content['section_2']['description_ar']!!}</div>
			</div>

			<div class="program-block care-patient-sec-bg" style="width: 100%;">
				<div class="care-patient-sec">
					<h2>   {!!($language == "en")?"Programs":"البرامج"!!}  </h2>
					<div class="program-detail">
						<div class="row">
							<?php
								if(isset($data)){
									 foreach($data as $v){
                                         $append=$helper->getdepartment($v->page_id);
									     $enImage= $helper->getImage($v->media_id);
										 $enattr= $helper->getimageattirbute($enImage);
										 ?>
										 <div class="col-md-2">
											 <a href="{{Config::get('variable.URL_LINK')}}department/{{($language == "en")?$append->slug_en:$append->slug_ar}}" class="detail-in">
												 <img src="{{env('BASE_URL')}}{{$enImage}}" alt="{{ __('messages.residencyProgramImageAlternate') }}" title="{{ __('messages.residencyProgramImageTitle') }}">
												 <h4>{!!($language == "en")?$v['title_en']:$v['title_ar']!!}</h4>
											 </a>
										 </div>
										 <?php
									 }
							  	 }
							 ?>
						</div>
					</div>
				</div>
			</div>




			<div class="row mt-5" style="width: 100%;">
				<div class="col-lg-12 col-md-12 wow fadeInLeft">
					
					<div class="care-patient-sec-left">
						<div class="care-patient-sec m-0">
							<h2><b>{!!($language == "en")?$content['section_4']['title_en']:$content['section_4']['title_ar']!!}:</b></h2>
							{!!($language == "en")?$content['section_4']['description_en']:$content['section_4']['description_ar']!!}

			</div>

		</div>
		<div class="text-left">
				<h3 class="text-main"><b>{!!($language == "en")?$content['section_3']['title_en']:$content['section_3']['title_ar']!!}</b></h3>
						{!!($language == "en")?$content['section_3']['description_en']:$content['section_3']['description_ar']!!}
					</div>
	</div>
	</div>
</section>
<script>
	$('.list-header a').on('click', function(){
		$(this).addClass('active').siblings().removeClass('active');
	});
</script>
<!-- main section ends here-->
@include('layouts.commonfooter')


@endsection
