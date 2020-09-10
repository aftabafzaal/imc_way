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
<section class="find-doctor find-doctors eye-block eye-block-bg">
	<div class="container">
		<div class="banner-in">
			<div class="banner-left">
				<h1 class="text-fff">
	{!!($language == "en")?"Find a Doctor":"ابحث عن طبيبك"!!}				</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
							<li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}">{!!($language == "en")?"Home":"الصفحة الرئيسية"!!}</a></li>
						<li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}doctors">{!!($language == "en")?"Doctors":"الأطباء"!!}</a></li>
						<li class="breadcrumb-item active text-fff" aria-current="page">{!!($language == "en")?"Doctor Profile":"ملف الطبيب"!!}</li>
					</ol>
				</nav>
			</div>
		         @include('layouts.buttons')

		</div>
	</div>
	@include('layouts.squarebox')
</section>
<!--banner ends here-->


<?php
    use App\Helpers;
   $helper = new Helpers();
		$category= $helper->getallcategory($data->id);
		$department= $helper->getalldepartment($data->id);
		$languagesData= $helper->getalllanguages($data->id);
		//dd($languagesData);
			$exp= $helper->getallexp($data->id);
			$expboard= $helper->getallexpboard($data->id);

		$education= $helper->getalleducation($data->id);
		$educationResidency= $helper->getalleducationResidence($data->id);
		$educationFollowship= $helper->getalleducationfollowship($data->id);

	?>
	<!--profile start here-->
	<section class="dr-profile-sec">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="dr-profile-left dr-profile-right">

						<div class="dr-profile-img">
						    	@php
                    				$enImage= $helper->getImage($data->media_id_en);
                    				$enattr= $helper->getimageattirbute($enImage);
                    				$arImage= $helper->getImage($data->media_id_ar);
                    				$Arattr= $helper->getimageattirbute($arImage);
                		       @endphp
                		       	<img src="{{env('BASE_URL')}}{{($language == "en")?$enImage:$enImage}}"   alt="{{($language == "en")?$data['title']:$data['titleAr']}} {{($language == "en")?$data['givenName']:$data['givenNameAr']}}" title="{{($language == "en")?$data['title']:$data['titleAr']}} {{($language == "en")?$data['givenName']:$data['givenNameAr']}}">
						</div>
						<h1 class="d-name">{{($language == "en")?$data['title']:$data['titleAr']}} {{($language == "en")?$data['givenName']:$data['givenNameAr']}} <span class="d-designation">{{$data->designation}}</span></h1>
						<p class="d-detail">
							<?php
							 /* if(!empty($category)){
									foreach($category as $v3){
										?>
										{{($language == "en")?$v3['name_en']:$v3['name_ar']}},
										<?php
									}
							 } */
							?>

					 	{!!($language == "en")?$data['titleDesc']:$data['titleDescAr']!!}</p>
						</p>
						<ul class="dr-element">
							<li>
								<p>{!!($language == "en")?"LANGUAGES SPOKEN":"لغات التحدث"!!}</p>
								<div class="element-in">
									<?php
									 if(!empty($languagesData)){
										 foreach($languagesData as $langgg){
											 ?>
											 <p class="lang" data-toggle="tooltip" data-placement="top" title="@php echo strtoupper($langgg->full_en); @endphp"><?php echo $langgg->name;?></p>
											 <?php
										 }
									 }
									?>
										</div>
							</li>
							<li style="border-left: 1px solid #005a9c;border-right: 1px solid #005a9c;padding: 0 10px;">
								<p>{!!($language == "en")?"SURGEON":"جرّاح"!!}</p>
								<div class="element-in">
									<?php
									   if($data->is_surgon == "0"){
											  $datachecknob= "fa-times";
										 }else{
											 $datachecknob="fa-check";
										 }
									?>
									<p class="lang"><i class="fa {{$datachecknob}}" aria-hidden="true"></i></p>
								</div>
							</li>
							<li>
								<p>{!!($language == "en")?"YEARS OF EXPERIENCE":"سنوات من الخبرة"!!}</p>
								<div class="element-in">
									<p class="lang">{{$data->expYears}}</p>
								</div>
							</li>

						</ul>
						<div class="rating-boc">
							<p>Rating</p>
							<div class="rating-stars">
								@for ($i = 1; $i <= 5; $i++)
									@if($data->docRating >= $i)
										<span class="fa fa-star checked"></span>
									@else
										<span class="fa fa-star"></span>
									@endif
								@endfor
							</div>
						</div>
          <?php
					if($data->is_appointment=="Yes"){
						?>
						<div class="book-appointment mt-3">
							<a href="{{env('imc_portal')}}" target="_blank">{!!($language == "en")?"Request an Appointment":"حجز موعد"!!}</a>
						</div>
						<?php
					}
					?>

						<!-- <ul class="load-user-data">
							<li>
								<a href="#">
									Download Profile
									<i class="fa fa-download" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									Print Profile
									<i class="fa fa-print" aria-hidden="true"></i>
								</a>
							</li>
						</ul> -->

					</div>

					@if($language == "en" && $data['a_c_highlights']!="")
						<div class="profile-titlein board-sec">
							<h3 class="text-main"><b>{!!($language == "en")?"Achievements & Career Highlights":"أبرز الانجازات"!!} </b></h3>
								{!!$data['a_c_highlights']!!}
						</div>
					@elseif($language == "ar" && $data['a_c_highlights_Ar']!="")
						<div class="profile-titlein board-sec">
							<h3 class="text-main"><b>{!!($language == "en")?"Achievements & Career Highlights":"أبرز الانجازات"!!} </b></h3>
								{!!$data['a_c_highlights_Ar']!!}
						</div>
					@endif

					@if($data['publications']!="")
					<ul class="load-user-data">
						<li>
							<a href="#"  data-toggle="modal" data-target="#PUBLICATIONS">
								{!!($language == "en")?"VIEW PUBLICATIONS BY THIS DOCTOR":"منشورات الطبيب"!!}
							</a>
						</li>
					</ul>
					@endif
				</div>
				<div class="col-md-7">
					<div class="dr-profile-right">
						@php  $items = array();  @endphp
						@if(count($education)>0 )
						<div class="profile-titlein doctor-profile-content">
							<div class="profile-title">
								<h3><b>{!!($language == "en")?"Education":"المؤهلات العلمية"!!}</b></h3>
							</div>
							<div class="profile-about">
								<ul>

											<?php
											if(count($education)>0){
												?>
												<p class="title"><b>{!!($language == "en")?"Medical School":""!!}</b></p>
												<?php
											foreach($education as $vedu){
											?>
												<p class="title"><b></b></p>
												<li>
													<div class="list-flex">
														<div class="flex-left">
																@if($vedu->fromDate!="")
																	<p class="text-green"><b>{{$vedu->fromDate}}{{($vedu->toDate!="")?" - ".$vedu->toDate:""}}</b></p>
																@else
																@endif
														</div>
														<div class="flex-right">
															<p><b>{{($language == "en")?$vedu['title']:$vedu['titleAr']}}</b></p>
															<p>{{($language == "en")?$vedu['title2']:$vedu['titleAr2']}}</p>
															<p>{{($language == "en")?$vedu['subTitle']:$vedu['subTitleAr']}}</p>
														</div>
													</div>
												</li>
											<?php
											}
											}
										?>
									<div class="accordion" id="accordionExample">

                 @if(!empty($education) )
										<div class="more-title" id="headingOne">
											<a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">{!!($language == "en")?"Hide/View Less":"عرض/ إخفاء المزيد"!!}<i class="fa fa-caret-down" aria-hidden="true"></i></a>
										</div>
										@endif
										<div id="collapseOne" class="collapse {{(count($education) == 0)?"show":""}}" aria-labelledby="headingOne" data-parent="#accordionExample">
											<?php
											if(count($educationResidency)>0){?>												<p class="title"><b>{!!($language == "en")?"Residency":"الإقامة"!!} </b></p>
<?php
											foreach($educationResidency as $rest){
											?>
												<p class="title"><b></b></p>
												<li>
													<div class="list-flex">
														<div class="flex-left">
																@if($rest->fromDate!="")
																	<p class="text-green"><b>{{$rest->fromDate}}{{($rest->toDate!="")?" - ".$rest->toDate:""}}</b></p>
																@else
																@endif
														</div>
														<div class="flex-right">
																	<p><b>{{($language == "en")?$rest['title']:$rest['titleAr']}}</b></p>
															<p>{{($language == "en")?$rest['title2']:$rest['titleAr2']}}</p>
															<p>{{($language == "en")?$rest['subTitle']:$rest['subTitleAr']}}</p>
														</div>
													</div>
												</li>
											<?php
											}
											}
										?>


										</div>
									</div>
								</ul>
							</div>
						</div>
						@endif


						@if(count($educationFollowship)>0)
						<div class="profile-titlein doctor-profile-content">
							<div class="profile-title">
								<h3><b>{!!($language == "en")?"Fellowships":"الزمالة"!!}</b> </h3>
							</div>
							<div class="profile-about">
								<ul>
									<?php
									if(count($educationFollowship)>0){
										 foreach($educationFollowship as $key1 => $v11){
												 ?>
												<li>
													<div class="list-flex">
														<div class="flex-left">
															@if($v11->fromDate!="")
																<p class="text-green"><b>{{$v11->fromDate}}{{($v11->toDate!="")?" - ".$v11->toDate:""}}</b></p>
															@else
															@endif
														</div>
														<div class="flex-right">
															<p><b>{{($language == "en")?$v11['title']:$v11['titleAr']}}</b></p>
															<p>{{($language == "en")?$v11['title2']:$v11['titleAr2']}}</p>
															<p>{{($language == "en")?$v11['subTitle']:$v11['subTitleAr']}}</p>
														</div>
													</div>
												</li>
												 <?php
												 if($key1 == 2){
													 break;
												 }
										 }
									}
									?>
									<div class="accordion" id="accordionExample">
										@if(isset($educationFollowship) &&  sizeof($educationFollowship) > 3 )
										<div class="more-title" id="headingtwo">
											<a data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">{!!($language == "en")?"Hide/View Less":"عرض/ إخفاء المزيد"!!} <i class="fa fa-caret-down" aria-hidden="true"></i></a>
										</div>
										@endif
										<div id="collapsetwo" class="collapse {{(count($educationFollowship) == 0)?"show":""}}" aria-labelledby="headingtwo" data-parent="#accordionExample">

											<?php
											if(count($educationFollowship)>0){
												foreach($educationFollowship as $key => $v11){
														if($key < 3){
															continue;
														}
														?>
														<li>
															<div class="list-flex">
																<div class="flex-left">
																	@if($v11->fromDate!="")
																		<p class="text-green"><b>{{$v11->fromDate}}{{($v11->toDate!="")?" - ".$v11->toDate:""}}</b></p>
																	@else
																	@endif
																</div>
																<div class="flex-right">
																	<p><b>{{($language == "en")?$v11['title']:$v11['titleAr']}}</b></p>
																	<p>{{($language == "en")?$v11['title2']:$v11['titleAr2']}}</p>
																	<p>{{($language == "en")?$v11['subTitle']:$v11['subTitleAr']}}</p>
																</div>
															</div>
														</li>
														<?php
												}
											}
											?>
										</div>
									</div>

								</ul>
							</div>
						</div>
						@endif


						@if(count($expboard)>0)
						<div class="profile-titlein doctor-profile-content">
						  <div class="profile-title">
						    <h3><b>{!!($language == "en")?"Board":"البورد"!!}</b> </h3>
						  </div>
						  <div class="profile-about">
						    <ul>
						      <?php
						      if(count($expboard)>0){
						         foreach($expboard as $key1 => $v11){
						             ?>
						            <li>
						              <div class="list-flex">
						                <div class="flex-left">
						                  @if($v11->fromDate!="")
						                    <p class="text-green"><b>{{$v11->fromDate}}{{($v11->toDate!="")?" - ".$v11->toDate:""}}</b></p>
						                  @else
						                  @endif
						                </div>
						                <div class="flex-right">
						                  <p><b>{{($language == "en")?$v11['title']:$v11['titleAr']}}</b></p>
						                  <p>{{($language == "en")?$v11['title2']:$v11['titleAr2']}}</p>
						                  <p>{{($language == "en")?$v11['subTitle']:$v11['subTitleAr']}}</p>
						                </div>
						              </div>
						            </li>
						             <?php
						             if($key1 == 2){
						               break;
						             }
						         }
						      }
						      ?>
						      <div class="accordion" id="accordionExample">
						        @if(isset($expboard) &&  sizeof($expboard) > 3 )
						        <div class="more-title" id="headingtwo">
						          <a data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">{!!($language == "en")?"Hide/View Less":"عرض/ إخفاء المزيد"!!} <i class="fa fa-caret-down" aria-hidden="true"></i></a>
						        </div>
						        @endif
						        <div id="collapsetwo" class="collapse {{(count($expboard) == 0)?"show":""}}" aria-labelledby="headingtwo" data-parent="#accordionExample">

						          <?php
						          if(count($expboard)>0){
						            foreach($expboard as $key => $v11){
						                if($key < 3){
						                  continue;
						                }
						                ?>
						                <li>
						                  <div class="list-flex">
						                    <div class="flex-left">
						                      @if($v11->fromDate!="")
						                        <p class="text-green"><b>{{$v11->fromDate}}{{($v11->toDate!="")?" - ".$v11->toDate:""}}</b></p>
						                      @else
						                      @endif
						                    </div>
						                    <div class="flex-right">
						                      <p><b>{{($language == "en")?$v11['title']:$v11['titleAr']}}</b></p>
						                      <p>{{($language == "en")?$v11['title2']:$v11['title2Ar']}}</p>
						                      <p>{{($language == "en")?$v11['subTitle']:$v11['subTitleAr']}}</p>
						                    </div>
						                  </div>
						                </li>
						                <?php
						            }
						          }
						          ?>
						        </div>
						      </div>

						    </ul>
						  </div>
						</div>
						@endif









						@if(count($exp)>0)
						<div class="profile-titlein doctor-profile-content">
							<div class="profile-title">
								<h3><b>{!!($language == "en")?"Work Experience":"المسيرة المهنية"!!}</b> </h3>
							</div>
							<div class="profile-about">
								<ul>
									<?php
									if(count($exp)>0){
										 foreach($exp as $key1 => $v11){
												 ?>
												<li>
													<div class="list-flex">
														<div class="flex-left">
															@if($v11->fromDate!="")
																<p class="text-green"><b>{{$v11->fromDate}}{{($v11->toDate!="")?" - ".$v11->toDate:""}}</b></p>
															@else
															@endif
														</div>
														<div class="flex-right">
															<p><b>{{($language == "en")?$v11['title']:$v11['titleAr']}}</b></p>
															<p>{{($language == "en")?$v11['title2']:$v11['titleAr2']}}</p>
															<p>{{($language == "en")?$v11['subTitle']:$v11['subTitleAr']}}</p>
														</div>
													</div>
												</li>
												 <?php
												 if($key1 == 2){
													 break;
												 }
										 }
									}
									?>
									<div class="accordion" id="accordionExample">
										@if(isset($exp) &&  sizeof($exp) > 3 )
										<div class="more-title" id="headingtwo">
											<a data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">{!!($language == "en")?"Hide/View Less ":"عرض/ إخفاء المزيد"!!}<i class="fa fa-caret-down" aria-hidden="true"></i></a>
										</div>
										@endif
										<div id="collapsetwo" class="collapse {{(count($exp) == 0)?"show":""}}" aria-labelledby="headingtwo" data-parent="#accordionExample">

											<?php
											if(count($exp)>0){
												foreach($exp as $key => $v11){
														if($key < 3){
															continue;
														}
														?>
														<li>
															<div class="list-flex">
																<div class="flex-left">
																	@if($v11->fromDate!="")
																		<p class="text-green"><b>{{$v11->fromDate}}{{($v11->toDate!="")?" - ".$v11->toDate:""}}</b></p>
																	@else
																	@endif
																</div>
																<div class="flex-right">
																	<p><b>{{($language == "en")?$v11['title']:$v11['titleAr']}}</b></p>
																	<p>{{($language == "en")?$v11['title2']:$v11['titleAr2']}}</p>
																	<p>{{($language == "en")?$v11['subTitle']:$v11['subTitleAr']}}</p>
																</div>
															</div>
														</li>
														<?php
												}
											}
											?>
										</div>
									</div>

								</ul>
							</div>
						</div>
						@endif

						@if($language == "en" && $data['membership_en']!="")
							<div class="profile-titlein board-sec">
								<ul>
									<h3 class="text-main"><b>{!!($language == "en")?"Membership":"العضوية"!!} </b></h3>
									{!!$data['membership_en']!!}
								</ul>
							</div>
						@elseif($language == "ar" && $data['membership_ar']!="")
							<div class="profile-titlein board-sec">
								<ul>
									<h3 class="text-main"><b>{!!($language == "en")?"Membership":"العضوية"!!}  </b></h3>
									{!!$data['membership_ar']!!}
								</ul>
							</div>
						@endif

						@if($language == "en" && $data['licence_en']!="")
							<div class="profile-titlein board-sec">
								<ul>
									<h3 class="text-main"><b>{!!($language == "en")?"License":"الرخصة"!!}</b></h3>
									{!!$data['licence_en']!!}
								</ul>
							</div>
						@elseif($language == "ar" && $data['licence_ar']!="")
							<div class="profile-titlein board-sec">
								<ul>
									<h3 class="text-main"><b>{!!($language == "en")?"License":"الرخصة"!!} </b></h3>
									{!!$data['licence_ar']!!}
								</ul>
							</div>
						@endif

					</div>
				</div>
			</div>
		</div>
	</section>

						<div class="modal fade" id="PUBLICATIONS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">{!!($language == "en")?"Publication By This Doctor":"نشر هذا الطبيب"!!}</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										{!! $data->publications !!}
										</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal">{!!($language == "en")?"Ok":"حسنا"!!}</button>
									</div>
								</div>
							</div>
						</div>

<!--profile ends here-->
@endsection
