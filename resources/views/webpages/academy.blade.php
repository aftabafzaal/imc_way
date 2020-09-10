@extends('layouts.home')
@section('content')
@php
use App\Helpers;
$helper = new Helpers();
	$url=Request::segment(1);
	if(	$url == "en"){
		$language='en';
	}elseif($url == "ar"){
			$language='ar';
	}else{
		$language='en';
	}
	@endphp
<?php
$helper = new App\Helpers();
$getpage=$helper->getPagedata('academy');
$basedata=$helper->getPageBasedata('');
?>
@include('layouts.finalbanner')
<style>
.main-inner-sec {
    padding: 80px 0 0;
    position: relative;
    width: 100%;
    margin-top: -80px;
}
</style>
<section class="main-inner-sec patient-right-block">
	<div class="mayo-imc-img mb-5">
		<?php
		$enImage= $helper->getImage($content['section_1']['media_id_en']);
		 if(!empty($enImage)){
				$image= env("BASE_URL").$enImage;
				 $enattr= $helper->getimageattirbute($enImage);
		 }else{
			 $image= env("BASE_URL")."assets/images/care-partner/page-banner-en.jpg";
			  $enattr= "page-banner-en";
		 }
		?>
		<img src="{{$image}}" alt="{{ __('messages.academyAlternate') }}" title="{{ __('messages.academyTitle') }}">
	</div>
			<div class="container">
				<div class="inner-title">
					<h3>{!!($language == "en")?$content['section_1']['title_en']:$content['section_1']['title_ar']!!}</h3>
				</div>
				<div class="accordion-block">
					<div class="row mb-70">
						<div class="col-md-4">
							<div class="admission-blocknew">
								<h4 class="text-main">{!!($language == "en")?$content['section_2']['title_en']:$content['section_2']['title_ar']!!}</h4>
								<div class="li-dot">{!!($language == "en")?$content['section_2']['description_en']:$content['section_2']['description_ar']!!}</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="admission-blocknew">
								<h4 class="text-main">{!!($language == "en")?$content['section_3']['title_en']:$content['section_3']['title_ar']!!}</h4>
								<div class="li-dot">{!!($language == "en")?$content['section_3']['description_en']:$content['section_3']['description_ar']!!}</div>

							</div>
						</div>
						<div class="col-md-4">
							<div class="admission-blocknew">
								<h4 class="text-main">{!!($language == "en")?$content['section_4']['title_en']:$content['section_4']['title_ar']!!}</h4>
								<div class="li-dot">{!!($language == "en")?$content['section_4']['description_en']:$content['section_4']['description_ar']!!}</div>

							</div>
						</div>
					</div>
					<div class="row mb-70">
						<div class="col-md-6">
							<div class="admission-blocknew">
								<h4 class="text-main">{!!($language == "en")?$content['section_5']['title_en']:$content['section_5']['title_ar']!!}</h4>
								 <div class="li-dot">{!!($language == "en")?$content['section_5']['description_en']:$content['section_5']['description_ar']!!}</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="admission-blocknew">
								<h4 class="text-main">{!!($language == "en")?$content['section_6']['title_en']:$content['section_6']['title_ar']!!}</h4>
								<div class="li-dot">{!!($language == "en")?$content['section_6']['description_en']:$content['section_6']['description_ar']!!}</div>

							</div>
						</div>
					</div>
					<div class="row mb-70">
						<div class="col-md-12">
							<div class="admission-blocknew">
								<h4 class="text-main">{!!($language == "en")?$content['section_7']['title_en']:$content['section_7']['title_ar']!!}</h4>
								<div class="li-dot">{!!($language == "en")?$content['section_7']['description_en']:$content['section_7']['description_ar']!!}</div>

							</div>
						</div>
					</div>

					<div class="row mb-70">
						<div class="col-md-12">
							<div class="admission-blocknew">
								<h4 class="text-main">{!!($language == "en")?$content['section_8']['title_en']:$content['section_8']['title_ar']!!}</h4>
								<div class="li-dot">{!!($language == "en")?$content['section_8']['description_en']:$content['section_8']['description_ar']!!}</div>
							</div>
						</div>
					</div>
                    <div class="booklet-block">
                        <div class="row">
                          <div class="col-lg-6 col-md-12">
                            <div class="booklet-btn">
                              <a href="{{Config::get('variable.URL_LINK')}}event" target="_blank">{{($language == "en")?"List of Courses Available ":"الاطلاع على الدورات القادمة "}}</a>
                            </div>
                          </div>
                        </div>
                    </div>
				</div>
			</div>
		</section>




@include('layouts.subscribe')

@endsection
