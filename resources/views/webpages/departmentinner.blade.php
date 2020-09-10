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
<!--banner start here-->
<!--banner start here-->
<section class="find-doctor find-doctors eye-block eye-block-bg">
	<div class="container">
		<div class="banner-in">
			<div class="banner-left">
				<h1 class="text-fff">
					{!!($language == "en")?$data['title_en']:$data['title_ar']!!}
				</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}">{!!($language == "en")?"Home":"الصفحة الرئيسية"!!}</a></li><li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}departments">{!!($language == "en")?"Departments":"قسم"!!}</a></li>
						<li class="breadcrumb-item active text-fff" aria-current="page"> {!!($language == "en")?$data['title_en']:$data['title_ar']!!}</li>
					</ol>
				</nav>
			</div>
		         @include('layouts.buttons')

		</div>
	</div>
	@include('layouts.squarebox')

</section>
<!--banner ends here-->
<section class="main-inner-sec pt-0 eye-center">
	<div class="accordion-block pb-0">
		<div class="container">
			<div class="content-flex department-services">
				<div class="row">

					<div class="col-md-12 col-lg-6">
						<p>
							{!!($language == "en")?$data['description_en']:$data['description_ar']!!}
						</p>
						<!--<div class="department-list">
							<h3 class="text-main"><b>Our Services</b></h3>
							<ul>
								<div class="row">
									<div class="col-md-8">
										{!!($language == "en")?$data['service_en']:$data['service_ar']!!}

									</div>
								</div>

							</ul>
						</div>-->
					</div>

					<div class="col-md-12 col-lg-6 pr-0">
						<div class="history-img new-shape-right">
							<?php
							$enImage= $helper->getImage($data['media_id']);
							 if(!empty($enImage)){
								 $img=env('BASE_URL').$enImage;
							 }else{
								 $img="http://18.216.80.91/IMC/public/images/department/32d17e56e07902b254dfad10d16fb36f0911f878998c136191af705e14102019083648_General-Pediatr.jpg";
							 }
							 ?>
							<img src="{{$img}}" alt="{!!($language == "en")?$data['title_en']:$data['title_ar']!!}" title="{!!($language == "en")?$data['title_en']:$data['title_ar']!!}">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- main section ends here-->
<!-- main section ends here-->
<section class="profile-sec depart-doc " style="padding: 20px 0 60px 0;">
	<div class="container">
		@if(isset($docotrsychairperson->title))
		<?php
		$enImage= $helper->getImage($docotrsychairperson->media_id_en);
		$ArabicImage= $helper->getImage($docotrsychairperson->media_id_ar);
	    $enattr= $helper->getimageattirbute($enImage);
        $Arattr= $helper->getimageattirbute($ArabicImage);


		 ?>
		<div class="accordion-block chairperson-block">
			<h3 class="text-main"><b>{!!($language == "en")?"Chairperson":"رئيس القسم" !!}</b></h3>
			<div class="chairperson-detail">
				<?php
				if($language == "en"){
				  ?>
				  <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{($language == "en")?$docotrsychairperson['title']:$docotrsychairperson['titleAr']}} {{($language == "en")?$docotrsychairperson->givenName:$docotrsychairperson->givenNameAr}}" title="{{($language == "en")?$docotrsychairperson['title']:$docotrsychairperson['titleAr']}} {{($language == "en")?$docotrsychairperson->givenName:$docotrsychairperson->givenNameAr}}">
				  <?php
				}else if($language == "ar"){
				     if($ArabicImage != ""){
				       ?>
				       <img src="{{env('BASE_URL')}}<?php echo $ArabicImage;?>" alt="{{($language == "en")?$docotrsychairperson['title']:$docotrsychairperson['titleAr']}} {{($language == "en")?$docotrsychairperson->givenName:$docotrsychairperson->givenNameAr}}" title="{{($language == "en")?$docotrsychairperson['title']:$docotrsychairperson['titleAr']}} {{($language == "en")?$docotrsychairperson->givenName:$docotrsychairperson->givenNameAr}}">
				       <?php
				     }else{
				       ?>
				       <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{($language == "en")?$docotrsychairperson['title']:$docotrsychairperson['titleAr']}} {{($language == "en")?$docotrsychairperson->givenName:$docotrsychairperson->givenNameAr}}" title="{{($language == "en")?$docotrsychairperson['title']:$docotrsychairperson['titleAr']}} {{($language == "en")?$docotrsychairperson->givenName:$docotrsychairperson->givenNameAr}}">
				       <?php
				     }
				    ?>
				    <?php
				}else{
				  ?>
				  <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{($language == "en")?$docotrsychairperson['title']:$docotrsychairperson['titleAr']}} {{($language == "en")?$docotrsychairperson->givenName:$docotrsychairperson->givenNameAr}}" title="{{($language == "en")?$docotrsychairperson['title']:$docotrsychairperson['titleAr']}} {{($language == "en")?$docotrsychairperson->givenName:$docotrsychairperson->givenNameAr}}">
				  <?php
				}
				?>
				<div class="detail-in">
					<h3 class="text-main"><a href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$docotrsychairperson->slug_en:$docotrsychairperson->slug_ar}}">{{($language == "en")?$docotrsychairperson['title']:$docotrsychairperson['titleAr']}} {{($language == "en")?$docotrsychairperson->givenName:$docotrsychairperson->givenNameAr}}</a></h3>
					<p>{{($language == "en")?$docotrsychairperson->specialitiesTxt:$docotrsychairperson->specialitiesTxtAr}}</p>
<div class="view-btn"><a class="view-profile" href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$docotrsychairperson->slug_en:$docotrsychairperson->slug_ar}}">{{($language == "en")?"View Profile":"عرض الملف"}}</a></div>
				</div>
			</div>
		</div>
		@endif
		@if(isset($docotrsconsultant) && count($docotrsconsultant) > 0)
		<div class="depart-docs-in">
			<h4>{!!($language == "en")?"Consultants":"الاستشاريون" !!}</h4>
			<div class="owl-carousel owl-carouse-doc-depart owl-theme">
				@foreach ($docotrsconsultant as $v)
			<?php
				$enImage= $helper->getImage($v['media_id_en']);
				$ArabicImage= $helper->getImage($v['media_id_ar']);
				$enattr= $helper->getimageattirbute($enImage);
			  $Arattr= $helper->getimageattirbute($ArabicImage);


				?>
					<div class="item">
						<div class="doctor-profile">
							<div class="dctr-img">
								<?php
								if($language == "en"){
									?>
									<img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
									<?php
								}else if($language == "ar"){
										 if($ArabicImage != ""){
											 ?>
											 <img src="{{env('BASE_URL')}}<?php echo $ArabicImage;?>" alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
											 <?php
										 }else{
											 ?>
											 <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
											 <?php
										 }
										?>
										<?php
								}else{
									?>
									<img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
									<?php
								}
								?>
								<div class="hover-content">
									<p> <span>{{($language == "en")?"Years of Experience":"سنوات الخبرة"}}</span></p>
									<p class="number-expe">{{$v->expYears}}</p>
									<p class="lang-in">{{($language == "en")?"Languages Spoken":"لغات التحدث"}}</p>
										<div class="lang-content">
									<?php
										if(!empty($v->languages)){
											foreach($v->languages as $languageee){
												?>
												<div class="lang-btn"><a href="#"><?php echo $languageee->language->name;?></a></div>
												<?php
											}
										}
									?>
									</div>
									<a class="view-profile" href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$v->slug_en:$v->slug_ar}}">{{($language == "en")?"View Profile":"عرض الملف"}}</a>
								</div>
							</div>
							<div class="profilein">
								<p class="d-name"><a href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$v->slug_en:$v->slug_ar}}">{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}</a></p>
								<p class="specail-in">
									{{($language == "en")?$v->specialitiesTxt:$v->specialitiesTxtAr}}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		@endif
		@if(isset($docotrsySeniorRegistrar) && count($docotrsySeniorRegistrar) > 0)
		<div class="depart-docs-in mt-4">
<h4>{!!($language == "en")?"Senior Registrar":"أخصائيون أُول"!!}</h4>
<div class="owl-carousel owl-carouse-doc-depart1 owl-theme">
				@foreach ($docotrsySeniorRegistrar as $v)
			<?php
				$enImage= $helper->getImage($v['media_id_en']);
				$ArabicImage= $helper->getImage($v['media_id_ar']);
				?>
					<div class="item">
						<div class="doctor-profile">
							<div class="dctr-img">
								<?php
								if($language == "en"){
								  ?>
								  <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
								  <?php
								}else if($language == "ar"){
								     if($ArabicImage != ""){
								       ?>
								       <img src="{{env('BASE_URL')}}<?php echo $ArabicImage;?>" alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
								       <?php
								     }else{
								       ?>
								       <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
								       <?php
								     }
								    ?>
								    <?php
								}else{
								  ?>
								  <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
								  <?php
								}
								?>
								<div class="hover-content">
									<p><span>{{($language == "en")?"Years of Experience":"سنوات الخبرة"}}</span></p>
									<p class="number-expe">{{$v->expYears}}</p>
									<p class="lang-in">{{($language == "en")?"Languages Spoken":"لغات التحدث"}}</p>
										<div class="lang-content">
									<?php
										if(!empty($v->languages)){
											foreach($v->languages as $language22){
												?>
												<div class="lang-btn"><a href="#"><?php echo $language22->language->name;?></a></div>
												<?php
											}
										}
									?>
									</div>
									<a class="view-profile" href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$v->slug_en:$v->slug_ar}}">{{($language == "en")?"View Profile":"عرض الملف"}}</a>
								</div>
							</div>
							<div class="profilein">
								<p class="d-name"><a href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$v->slug_en:$v->slug_ar}}">{{($language == "en")?$v['title']:$v['titleAr']}}  {{($language == "en")?$v['givenName']:$v['givenNameAr']}}</a></p>
								<p class="specail-in">
									{{($language == "en")?$v->specialitiesTxt:$v->specialitiesTxtAr}}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		@endif
		@if(isset($docotrsyRegistrar) && count($docotrsyRegistrar) > 0)
		<div class="depart-docs-in mt-4">
			<h4>{!!($language == "en")?"Registrar":"الأخصائيون" !!} </h4>
			<div class="owl-carousel owl-carouse-doc-depart2 owl-theme">
				@foreach ($docotrsyRegistrar as $v)
				<?php
					$enImage= $helper->getImage($v['media_id_en']);
					$ArabicImage= $helper->getImage($v['media_id_ar']);
					?>
					<div class="item">
						<div class="doctor-profile">
							<div class="dctr-img">
								<?php
								if($language == "en"){
								  ?>
								  <img src="{{env('BASE_URL')}}<?php echo $enImage;?>"  alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
								  <?php
								}else if($language == "ar"){
								     if($ArabicImage != ""){
								       ?>
								       <img src="{{env('BASE_URL')}}<?php echo $ArabicImage;?>" alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
								       <?php
								     }else{
								       ?>
								       <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
								       <?php
								     }
								    ?>
								    <?php
								}else{
								  ?>
								  <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}" title="{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}">
								  <?php
								}
								?>
								<div class="hover-content">
									<p><span>{{($language == "en")?"Years of Experience":"سنوات الخبرة"}}</span></p>
									<p class="number-expe">{{$v->expYears}}</p>
									<p class="lang-in">{{($language == "en")?"Languages Spoken":"لغات التحدث"}}</p>
										<div class="lang-content">
									<?php
										if(!empty($v->languages)){
											foreach($v->languages as $language3){
												?>
												<div class="lang-btn"><a href="#"><?php echo $language3->language->name;?></a></div>
												<?php
											}
										}
									?>
									</div>
									<a class="view-profile" href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$v->slug_en:$v->slug_ar}}">{{($language == "en")?"View Profile":"عرض الملف"}}</a>
								</div>
							</div>
							<div class="profilein">
								<p class="d-name"><a href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$v->slug_en:$v->slug_ar}}">{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}</a></p>
								<p class="specail-in">
									{{($language == "en")?$v->specialitiesTxt:$v->specialitiesTxtAr}}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		@endif
	</div>
</section>


	</div>
</section>
<!-- main section ends here-->
<!-- need section start here-->
@include('layouts.commonfooter')
@endsection
@section('script')
<script>
var slider= $('.owl-carouse-doc-depart');
  var amountHeaderImages = slider.find('img').length;
	console.log(amountHeaderImages);
$(".owl-carouse-doc-depart").owlCarousel({
	autoplay: true,
	loop: true,
	items: 4,
	nav: true,
	dots: false,
	autoplayHoverPause: true,
	loop: (amountHeaderImages > 3), // if only 1 item no loop
	responsiveClass: true,
    responsive: {
        0:{
          items: 1
        },
        574:{
          items: 2
        },
        768:{
          items: 3
        },
		1199:{
          items: 4
        }
    }
});
var slider= $('.owl-carouse-doc-depart1');
  var amountHeaderImages1 = slider.find('img').length;
$(".owl-carouse-doc-depart1").owlCarousel({
	autoplay: true,
	loop: true,
	items: 4,
	nav: true,
	dots: false,
	autoplayHoverPause: true,
	loop: (amountHeaderImages1 > 3), // if only 1 item no loop
	responsiveClass: true,
    responsive: {
        0:{
          items: 1
        },
        574:{
          items: 2
        },
        768:{
          items: 3
        },
		1199:{
          items: 4
        }
    }
});
var slider= $('.owl-carouse-doc-depart2');
  var amountHeaderImages2 = slider.find('img').length;
$(".owl-carouse-doc-depart2").owlCarousel({
	autoplay: true,
	loop: true,
	items: 4,
	nav: true,
	dots: false,
	autoplayHoverPause: true,
	loop: (amountHeaderImages2 > 3), // if only 1 item no loop
    responsiveClass: true,
    responsive: {
        0:{
          items: 1
        },
        574:{
          items: 2
        },
        768:{
          items: 3
        },
		1199:{
          items: 4
        }
    }
});
</script>

@endsection
