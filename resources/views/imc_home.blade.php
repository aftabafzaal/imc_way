@extends('layouts.home')
@section('content')
@include('layouts.home-slider')
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
	$videoFormat = array("webm","mkv","flv","vob","ogv","ogg","drc","mng","avi","mov","qt","wmv","yuv","amv","mp4","mp2","mpeg","mpe","mpv","m4v","svi","3gp","3g2","mxf","roq","nsv","flv","f4v","f4p","f4a","f4b");
	@endphp
<?php
$helper = new App\Helpers();
$doclanguages =$helper->getdoclang();
?>
	<style>
	.double-line h3 {
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
    text-align: center;
}
.lang-arabic .double-line h3:before,
.lang-arabic .double-line h3:after {
    margin: 0 0 0 20px;
    flex: 1 0 20px;
    color:#43984b;
}

.double-line h3:before,
.double-line h3:after {
    content: '';
    border-top: 10px solid;
    margin: 0 20px 0 0;
    flex: 1 0 20px;
    color:#43984b;
}
.lang-arabic .double-line h3:after {
    margin: 0 20px 0 0;
}
.double-line h3:after {
    margin: 0 0 0 20px;
}
.update-block .double-line {
    max-width: 90%;
}
.appointment-box{
    margin-bottom:20px;
}
.appointment-box .card{ background: transparent;}
.appointment-box .card-header{
border-bottom:0!important;
background: #245a97 !important;
margin-top: 30px;
height: 30px;
border-radius: calc(0.8rem - 1px) calc(0.8rem - 1px) 0 0;
}
.appointment-box .card-header img{
    position: relative;
    top: -70px;
    z-index: 99;
    width: 150px;
}
.appointment-box .card-footer{
    background: #245a97;
    border-radius: 0 0 calc(0.8rem - 1px) calc(0.8rem - 1px);
    padding: 0.4rem 1.25rem;
    -webkit-box-shadow: 0px 0px 22px 0px rgba(153,153,153,0.56);
    -moz-box-shadow: 0px 0px 22px 0px rgba(153,153,153,0.56);
    box-shadow: 0px 0px 22px 0px rgba(153,153,153,0.56);
}
.appointment-box .card-body{
    background: #fff;padding-top: 50px;
}
.appointment-box .card-body .card-title{
    padding: 15px 5px;color:#245a97;line-height:1.7
}
.appointment-box .btn-primary{
    background:#44984c;border:#44984c;border-radius: 1.5rem;
}
.double-line .blue{color: #015a9b;}
@media (max-width: 1440px)
{
.update-block .double-line {
    max-width: 90%;
}

.update-block .double-line {
padding-top:20px !important;
}
}
@media (max-width: 574px)
{
.update-block .double-line h3
{
        margin: 0 auto 50px!important;
}
}
	</style>
		<!--banner ends here-->
		<!--banner ends here--><!-- new section -->
	    <section class="update-block wow fadeInUp" style="background:#efefef">
			<div class="title double-line">
				<h3 class=" wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
				    <span>{{($language == "en")?"Book your":"احجز"}}
				    <strong class="blue"> {{($language == "en")?"Appointment":"موعدك"}}</strong></span></h3>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-6 col-sm-12 appointment-box">
					    <div class="card text-center">
                            <div class="card-header"><img src="images/opd-icon.png"></div>
                            <div class="card-body">
                                <h4 class="card-title"> <span style="color:#9e2458"> {{($language == "en")?"In-person at IMC":"في عياداتنا الخارجية"}}
                                 </span><br>
                                      {{($language == "en")?"Clinics":"التي تعمل بكامل طاقتها "}} 
                                     </h4>
                                <a href="https://patientportal.imc.med.sa" target="_blank" class="btn btn-primary btn-lg">
                                    {{($language == "en")?"Book Now":"احجز الآن"}}
                                    </a>
                            </div>
                            <div class="card-footer text-muted"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 appointment-box">
                        <div class="card text-center">
                            <div class="card-header"><img src="images/tele-icon.png"></div>
                            <div class="card-body">
                                <h4 class="card-title"><span style="color:#9e2458">{{($language == "en")?"On your device at IMC":"في خدمة عافيتك أونلاين"}}
                                     </span><br> {{($language == "en")?"TeleMedicine":"للتواصل المرئي مع أطبائنا"}}
                                     </h4>
                                <a href={{$language."/telemedicine"}} class="btn btn-primary btn-lg">{{($language == "en")?"Book Now":"احجز الآن"}}</a>
                            </div>
                            <div class="card-footer text-muted"></div>
                        </div>
                    </div>
				</div>
			</div>
		</section>

<!-- End -->
<section class="find-doc-element">
			<div class="container-fluid">
				<div class="find-doc-in">
					<div class="row">
						<div class="p-0 col-lg-4 wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
							@include('layouts.healthip')
						</div>
						<div class="p-0 col-lg-8 wow fadeInRight">
							<div class="find-doc-ryt">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="Doctor-tab" data-toggle="tab" href="#Doctor" role="tab" aria-controls="Doctor" aria-selected="true">{{ __('messages.find_doctor') }}</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="Department-tab" data-toggle="tab" href="#Department" role="tab" aria-controls="Department" aria-selected="false">{{ __('messages.find_department') }}</a>
									</li>
								</ul>
								<div class="tab-content bg-main " style="padding: 20px; height: 300px;" id="myTabContent">
									<div class="tab-pane fade show active" id="Doctor" role="tabpanel" aria-labelledby="Doctor-tab">
										<form action="{{Config::get('variable.URL_LINK')}}doctors" method="GET">
											<p class="text-fff">{{ __('messages.search_doc_headline') }}</p>
											<div class="special-block">
												<div class="row">
												</div>
												<div class="row mt-3">
													<div class="col-lg-6 col-md-12 wow fadeInRight">
														<div class="select-block">
															<label style="padding-bottom: 5px;">{{ __('messages.search_language') }}</label>
															<select name="language" id="language" class="form-select color-grey">
																<option value="">{{ __('messages.all') }}</option>
																@if(isset($doclanguages))
																	@foreach ($doclanguages as $item)
																		<option value="{{$item->id}}">{{($language == "en")? strtoupper($item->full_en) : strtoupper($item->full_ar)}} </option>
																	@endforeach
																@endif
															</select>
														</div>
													</div>
													<div class="col-lg-6 col-md-12 wow fadeInRight">
														<form class="form-doctor-name">
															<label style="color:#fff">{{ __('messages.search_docname') }}</label>
															<input class="doctrname form-control" id="" name="doctorname" placeholder='{{ __('messages.name') }}'>
														</form>
													</div>

												</div>
												<input type="hidden" name="lng" value="{{$language}}"/>
												<div class="find-btn">
													<button type="submit" class="btnin">{{ __('messages.search_doctor_button') }}</button>
												</div>
											</div>
										</form>
									</div>
									<div class="tab-pane fade" id="Department" role="tabpanel" aria-labelledby="Department-tab">
										<form action="{{Config::get('variable.URL_LINK')}}departments" method="GET">
											<input type="hidden"  name="_token" value="{{ csrf_token() }}">
											<div class="special-block">
												<div class="row">
													<div class="col-lg-6 col-md-12">

															<label style="color:#fff">{{ __('messages.search_dep_name') }}</label>
															<input class="doctrname form-control" name="departmentname" id="" placeholder="{{ __('messages.type_search_name') }}">
														    <input type="hidden" name="lng" value="{{$language}}"/>
													</div>
												</div>
												<div class="find-btn">
													<button type="submit" class="btnin">{{ __('messages.search_dep_button') }}</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@foreach($Know_Imc as $Know_Imc_)
<?php
$enImage= $helper->getImage($Know_Imc_->media_id_photo);
$enVideo= $helper->getImage($Know_Imc_->media_id_video);
$enImage=env('BASE_URL').$enImage;
$enVideo=env('BASE_URL').$enVideo;

 ?>
		<?php
	$vTour_ar='<img src="assets/images/virtual-tour-home-ar.png" class="wow fadeInRight">';
	$vTour_en='<img src="assets/images/virtual-tour-home-en.png" class="wow fadeInLeft">';
	?>
	<section class="imc-gallery wow fadeInUp">
			<div class="container">
				<div class="galleryin about-imc">
					<div class="row m-0">
						<div class="col-lg-6 col-md-12">
							<div class="about-sec">
								<h3 class="text-main"><span class="d-block">{{($language == "en")?"About":"أعرف"}}</span> IMC</h3>
								<p>{!!($language == "en")?$Know_Imc_->knowdescription_en:$Know_Imc_->knowdescription_ar !!}</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="bed-sec">
						      <a href="https://my.matterport.com/show/?m=L8BKBzZx2QG" target="_blank">{!!($language == "en")?$vTour_en:$vTour_ar !!}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endforeach
		<!-- imc-gallery ends here-->
		<!-- update-block start here-->
		<?php

		//use App\Helpers;
		$helper = new  App\Helpers();
		$news=$helper->getnewsdata();
		?>
		@if(!empty($News))
		<section class="update-block wow fadeInUp">
			<div class="container">
				<div class="title">
					<h3 class="wow fadeInUp"><span>{{($language == "en")?$news->title_en:$news->title_ar}}</span></h3>
					<p>
					{!!($language == "en")?$news->description_en:$news->description_ar!!}
					</p>
				</div>
				<div class="row">
				@foreach($News as $new)
				<?php
				$enImage= $helper->getImage($new->media_id);
				$enImage=env('BASE_URL').$enImage;
            	$enattr= $helper->getimageattirbute($enImage);
				?>
					<div class="col-md-12 col-lg-4 wow slideInLeft">
						<div class="update-content">
						<div class="img-sec"><a href="{{Config::get('variable.URL_LINK')}}news/{{($language == "en")?$new->slug_en:$new->slug_ar}}"><img src="<?php echo $enImage;?>" style="width:350;height:233" alt="{{($language == "en")?$new->title_en:$new->title_ar}}" title="{{($language == "en")?$new->title_en:$new->title_ar}}"></a></div>
							<div class="update-body">
								<h5 class="text-blue"><a href="{{Config::get('variable.URL_LINK')}}news/{{($language == "en")?$new->slug_en:$new->slug_ar}}">{{($language == "en")?$new->title_en:$new->title_ar}}</a></h5>
								<p class="update-date"><a href="{{Config::get('variable.URL_LINK')}}news/{{($language == "en")?$new->slug_en:$new->slug_ar}}">{{!empty($new->date)?"".date('d M Y',strtotime($new->date)):""}}</a></p>
								<p class="update-text">{!!($language == "en")?$new->inner_title_en:$new->inner_title_ar!!}...
								<div class="readmore"><a href="{{Config::get('variable.URL_LINK')}}news/{{($language == "en")?$new->slug_en:$new->slug_ar}}">{{($language == "en")?"Read More":"أقرأ المزيد"}}</a></div>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
		</section>
		@endif
		<!-- story-block start here-->
		<!-- story-block start here-->
		<?php
		if(!empty($testimonies)){
			?>
	<!--	<section class="story-block">
			<div class="container">
				<div class="stories-sec">
					<div class="title">
						<h3 class="wow fadeInUp"><span>{{($language == "en")?"Patient Testimonial":"تجارب المرضى"}}</span></h3>
					</div>
					<div class="owl-carousel owl-carousel2new">
						@foreach($testimonies as $testimonies_)
						@php
							$videoFormat = array("webm","mkv","flv","vob","ogv","ogg","drc","mng","avi","mov","qt","wmv","yuv","amv","mp4","mp2","mpeg","mpe","mpv","m4v","svi","3gp","3g2","mxf","roq","nsv","flv","f4v","f4p","f4a","f4b");

							if(!empty($testimonies_->video1)){
								$extension = pathinfo($testimonies_->video1, PATHINFO_EXTENSION);
								$media_type = in_array($extension,$videoFormat)?1:0;
							}else{
								$media_type = 0;
							}
						@endphp
						<div class="item story-item">
							<div class="feedbackin">
								<div class="thumbnail">
									@if($media_type &&  !empty($testimonies_->video1) && empty($testimonies_->video1))
											<?php
											$enImage= $helper->getImage($testimonies_->media_id);
											$enImage=env('BASE_URL').$enImage;
											
											?>
										 <video controls="true">
											<source src="{{$enImage}}" type="video/mp4">
										</video>
									@elseif(!empty($testimonies_->youtube_url) &&  !empty($testimonies_->video1))
									<?php
			                    	$enImage= $helper->getImage($testimonies_->media_id);
				                    $enImage=env('BASE_URL').$enImage;
            	                    $enattr= $helper->getimageattirbute($enImage);
			                    	?>
				                    <a href="{{Config::get('variable.URL_LINK')}}testimonial"><img src="<?php echo $enImage ?>"></a>
										
									@endif
								</div>
								<div class="feedback">
									<h4 class="text-main name"><a href="{{Config::get('variable.URL_LINK')}}testimonial" class="">{{($language == "en")?$testimonies_->name_en:$testimonies_->name_ar}}</a></h4>
									<p><a href="{{Config::get('variable.URL_LINK')}}testimonial" class="">{!!($language == "en")?substr($testimonies_->description_en, 0, 140):substr($testimonies_->description_ar, 0, 140)!!}...</a></p>
									<p><a href="{{Config::get('variable.URL_LINK')}}testimonial" class="readmore">{{($language == "en")?"Read More":"أقرأ المزيد"}}</a></p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>
	 -->
	 <?php
 }
 ?>
		<!-- story-block ends here-->
		<!-- awards section start here-->
		<section class="awards-blocknew wow fadeInUp">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="link-with wow fadeInLeft">

							@if(!empty ($Affiliates))
							<h4>{{($language == "en")?"Care Network":"شبكة الرعاية"}}</h4>
							<p>{{($language == "en")?$Affiliates->title_en:$Affiliates->title_ar}}</p>
							<ul>
								<?php
								$enImage= $helper->getImage($Affiliates->media_id);
								$enImage=env('BASE_URL').$enImage;
								$enattr= $helper->getimageattirbute($enImage);
								?>
								<li>
									<a target="blank" href="{{Config::get('variable.URL_LINK')}}mayoclinic"><img src="<?php echo $enImage;?>" alt="{{ __('messages.mayoAlternate') }}" title="{{ __('messages.mayoTitle') }}"></a>
								</li>
							</ul>
							@endif
						</div>
					</div>
					<div class="col-lg-6">
						<div class="awards-block wow fadeInRight">
							<?php if(!empty($Award)){
								?>
							<h4>{{ __('messages.awards_accre') }}</h4>
							<div class="slide hi-slide">
								<div class="hi-prev "></div>
								<div class="hi-next "></div>
								<ul>
									<?php
									 foreach($Award as $Award_){
		 								$enImage= $helper->getImage($Award_->media_id);
		 								$enImage=str_replace(".", "_thumb.", $enImage);
		 								$enImage=env('BASE_URL').$enImage;
		 								$enattr= $helper->getimageattirbute($enImage);
									?>
									<li>
										<a href="{{Config::get('variable.URL_LINK')}}awards-and-accreditations" class="hvr-icon" >
										 <img src="<?php echo $enImage;?>" alt="{{($language == "en")?$Award_->title_en:$Award_->title_ar}}" title="{{($language == "en")?$Award_->title_en:$Award_->title_ar}}">
										 <p class="slide-title">{{($language == "en")?$Award_->title_en:$Award_->title_ar}}</p>
										</a>
									</li>
									<?php
								  }
								}
								?>
								<span class="setText"></span>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- awards section ends here-->

		<!-- contact-bg-block start here-->

	@include('layouts.subscribe')
	  

@endsection
