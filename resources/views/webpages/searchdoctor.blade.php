
<div class="container">
				<div class="row">

					<?php
					use App\Helpers;
					$helper = new Helpers();
					if(!empty($data) and sizeof($data)){
						foreach($data as $v){
							$enImage= $helper->getImage($v['media_id_en']);
							$ArabicImage= $helper->getImage($v['media_id_ar']);

                          $enattr= $helper->getimageattirbute($enImage);
			           	  $Arattr= $helper->getimageattirbute($ArabicImage);




							?>
							<div class="col-lg-3 col-md-6">
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
												 foreach($v->languages as $languagee){
													 ?>
													 	<div class="lang-btn"><a href="#">

													 	    <?php

													 	       echo  $languagee->language->name;

													 	    ?>

													 	    </a></div>
													 <?php
												 }
											 }
											?>
											</div>

											@if($language == 'ar')
											<a class="view-profile" href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$v->slug_en:$v->slug_ar}}">{{($language == "en")?"View Profile":"عرض الملف"}}</a>
											@else
											<a class="view-profile" href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$v->slug_en:$v->slug_ar}}">{{($language == "en")?"View Profile":"عرض الملف"}}</a>
											@endif
										</div>
									</div>
									<div class="profilein">
										<p class="d-name">
											@if($language == 'ar' )
											<a  href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$v->slug_en:$v->slug_ar}}">{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}</a>
											@else
											<a href="{{Config::get('variable.URL_LINK')}}doctorsprofile/{{($language == "en")?$v->slug_en:$v->slug_ar}}">	{{($language == "en")?$v['title']:$v['titleAr']}} {{($language == "en")?$v['givenName']:$v['givenNameAr']}}</a>
											@endif
										</p><p class="specail-in">
										 {{($language == "en")?$v->specialitiesTxt:$v->specialitiesTxtAr}}</p>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } else { ?>

				      <div class="no-data-div">
				      	<div class="container">
				      		<h2 class="text-main text-center"><?php if($language == "ar"){ echo "لاتوجد بيانات";  }else{ echo "No Data Found"; } ?> </h2>
					      </div>
					  </div>
					<?php }?>
				</div>

				<nav class="pagenation-block" aria-label="Page navigation example">
					<ul class="pagination">
						@if(!empty($data) and sizeof($data))
						{{--  {{ $data->links() }} --}}
							{{ $data->appends(Request::except('page'))->links() }}
						@endif
					</ul>
				</nav>
			</div>
