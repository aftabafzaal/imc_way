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
$getpage=$helper->getPagedata('testimonial');
$basedata=$helper->getPageBasedata('2');
?>
@include('layouts.latestbanner2')
<!--banner ends here-->
<!-- story-block start here-->
@php
	$videoFormat = array("webm","mkv","flv","vob","ogv","ogg","drc","mng","avi","mov","qt","wmv","yuv","amv","mp4","mp2","mpeg","mpe","mpv","m4v","svi","3gp","3g2","mxf","roq","nsv","flv","f4v","f4p","f4a","f4b");
@endphp

<style>
.rc-anchor-pt{display:none;}

#recaptcha {
  display: inline-block;
  position: relative;
}

#recaptcha:after {
    content: "";
    display: block;
    position: absolute;
    z-index: 1;
    bottom: 3px;
    right: 5px;
    width: 100px;
    height: 70px;
    background-color: #f9f9f9;
}
</style>

@include('layouts.loader')
<section class="main-inner-sec story-block wow fadeInUp stories-sec-new">
	<div class="container">
		<div class="inner-title">
			<h3>{{($language == "en")?$testimonies_content['section_1']['title_en']:$testimonies_content['section_1']['title_ar']}}</h3>
			<p class="m-0">
				{!! ($language == "en")?$testimonies_content['section_1']['description_en']:$testimonies_content['section_1']['description_ar'] !!}
			</p>
		</div>
		<div class="testimonial-new">
			<div class="row mb-5 wow fadeInUp alltestimonial">
			    <input type="hidden" id="totalTestimonial" value="{{$totalTestimonal}}" />
				@if(isset($testimonials))
					@foreach ($testimonials as $testimonie)
						@php
						  $enImage= $helper->getImage($testimonie->media_id);
							if(!empty($enImage)){
								$extension = pathinfo($enImage, PATHINFO_EXTENSION);
								$media_type = in_array($extension,$videoFormat)?1:0;
							}else{
								$media_type = 0;
							}
						@endphp
						<div class="col-md-6 testimonial" style="padding:2px">
							<div class="feedbackin">
								<div class="thumbnail testimonial_thumbnail">
									@if($media_type &&  !empty($enImage) && empty($enImage))
										<video allowfullscreen controls="true">
											<source src="{{env('BASE_URL')}}{{$enImage}}" type="video/mp4">
										</video>
									@elseif(!empty($testimonie->youtube_url))
										<iframe allowfullscreen src="@if(isset($testimonie->youtube_url)) {{$testimonie->youtube_url}} @endif">
</iframe>
									@endif
								</div>
								<div class="feedback">
									<h4 class="text-main name">{{($language == "en")?$testimonie->name_en:$testimonie->name_ar}}</h4>
									<p>{!!($language == "en")?$testimonie->description_en:$testimonie->description_ar!!}</p>
								</div>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
			@if(count($testimonials)>2)
		<div class="loadmore"><button>{{($language == "en")?"Load more":"تحميل المزيد"}}</button></div>
		@endif
		<div class="accordion" id="accordionExample" style="margin-bottom: 15px;">
			<div class="btn-block" id="testform">
				<a data-toggle="collapse" data-target="#formtest" aria-expanded="true"
					aria-controls="formtest" class="btn-green btn btn-link">{{($language == "en")?"ADD YOUR TESTIMONIAL":"شاركنا تجربتك"}}</a>
			</div>
			@if(Session::has('message'))
			<p style="margin-top: 15px;" class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
			@endif
        </br>
			 <div class="alert alert-success alert-block suvessmessage" style="display:none">
  <button type="button" class="close" data-dismiss="alert">×</button>
        <strong class="appendsucess"> Data has been submmited successfully </strong>
</div>

			<div id="formtest" class="collapse" aria-labelledby="testform" data-parent="#accordionExample">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-main" id="test">{{($language == "en")?"Add your Testimonial":"شاركنا تجربتك"}}</h5>
					</div>
					<div class="modal-body">

						<p>{{($language == "en")?"Please note that your testimonial will be reviewed upon your submission.
							If approved it may take up to 72 hours to appear.":"يرجى ملاحظة أنه سيتم مراجعة شهادتك عند تقديمك.
إذا تمت الموافقة عليه ، فقد يستغرق ظهور ما يصل إلى 72 ساعة."}}
						</p>


						<form id="testimonialForm" class="testimonial-form" method="post" action="{{Config::get('variable.URL_LINK')}}testimonial" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<input type="text" class="form-control" id="name_en" name="name_en" placeholder="{{($language == "en")?"Enter name in english":"ادخل الاسم باللغة الانجليزية"}}" required>
								<div class="alert alert-danger error_name_en" style="display: none;"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="{{($language == "en")?"Enter name in arabic":"ادخل الاسم باللغة العربية"}}" required>
								<div class="alert alert-danger error_name_ar" style="display: none;"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="{{($language == "en")?"Enter your email":"Enter your email"}}" required>
								<div class="alert alert-danger error_email" style="display: none;"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="phone" name="phone" placeholder="{{($language == "en")?"Enter your phone":"Enter your phone"}}" required>
								<div class="alert alert-danger error_phone" style="display: none;"></div>
							</div>





							<div class="form-group">
								<textarea class="form-control" placeholder="{{($language == "en")?"Enter description in english":"ادخل الوصف باللغة الإنجليزية"}}"
									id="description_en" name="description_en" rows="3" required></textarea>
								<div class="alert alert-danger error_description_en" style="display: none;"></div>
							</div>
							<div class="form-group">
								<textarea class="form-control" placeholder="{{($language == "en")?"Enter description in arabic":"ادخل الوصف باللغة العربية"}}"
									id="description_ar" name="description_ar" rows="3" required></textarea>
								<div class="alert alert-danger error_description_ar" style="display: none;"></div>
								</div>
							<!-- <div class="form-group">
								<textarea class="form-control" placeholder="{{($language == "en")?"Testimonial in english":"تجربة المريض باللغة الانجليزية"}}"
									id="testimony_en" name="testimony_en" rows="3" required></textarea>
									<div class="alert alert-danger error_testimony_en" style="display: none;"></div>

							</div>
							<div class="form-group">
								<textarea class="form-control" placeholder="{{($language == "en")?"Testimonial in arabic":"تجربة المريض باللغة العربية"}}"
									id="testimony_ar" name="testimony_ar" rows="3" required></textarea>
										<div class="alert alert-danger error_testimony_ar" style="display: none;"></div>
								</div> -->
							<div class="form-group">
								<input type="file" class="form-control-file border-none"
									id="filecontrol" accept="video/*" name="video1" required>
								<small id="filecontrol" class="form-text text-muted">{{($language == "en")?"Allowed video":"الصورة المسموح بها والفيديو"}}</small>
								<div class="alert alert-danger error_video" style="display: none;"></div>

							</div>

							<div class="form-group">
								<label>I would like my story to be used for advocacy purposes </label>
								<div class="form-check">
										<input class="form-check-input" type="radio" name="is_advocacy" id="is_advocacy" value="Yes" checked>
										<label class="form-check-label" for="is_advocacy">
										 Yes
										</label>
									</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="is_advocacy" id="is_advocacy" value="No">
											<label class="form-check-label" for="is_advocacy">
												No
											</label>
										</div>
										<div class="alert alert-danger error_is_advocacy" style="display: none;"></div>

							</div>



							<div class="form-group">
								<label>I give IMC permission to share my story in its website, social media and printed materials. My full name will not be disclosed.  </label>
								<div class="form-check">
										<input class="form-check-input" type="radio" name="is_shareinfo" id="is_shareinfo" value="Yes" checked>
										<label class="form-check-label" for="is_shareinfo">
										 Yes
										</label>
									</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="is_shareinfo" id="is_shareinfo" value="No">
											<label class="form-check-label" for="is_shareinfo">
												No
											</label>
										</div>
										<div class="alert alert-danger error_is_shareinfo" style="display: none;"></div>
							</div>



							<div class="form-group">
									<label>Would you be willing to let us record your story in a video and take your photo for our promotional materials?   </label>
								 <div class="form-check">
										<input class="form-check-input" type="radio" name="is_record" id="is_record" value="Yes" checked>
										<label class="form-check-label" for="is_record">
										 Yes
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="is_record" id="is_record" value="No">
										<label class="form-check-label" for="is_record">
											No
										</label>
									</div>
									<div class="alert alert-danger error_is_record" style="display: none;"></div>
							</div>


							<div class="form-group form-check mute-input">
								<input type="checkbox" class="form-check-input" id="exampleCheck1" checked required>
								<label class="form-check-label" for="exampleCheck1">{{($language == "en")?"I have read and agree to
									the ":"لقد قرات ووافقت على ال"}}<a href="{{Config::get('variable.URL_LINK')}}terms-and-conditions">{{($language == "en")?"Terms and Conditions":"الأحكام والشروط"}}</a></label>
								<br>
								<div class="alert alert-danger error_terms" style="display: none;"></div>
					<!-- 			<span class="error_terms" style="color:red;"></span>	 -->
							</div>
					   <div class="form-group">
											<div class="container">
												 <div id="recaptcha"></div>
										 </div>
											 <div class="alert alert-danger print-error-capcha" style="display:none"></div>
					         </div>

							<button type="submit" class="btn-submit saveTestimonial">{{($language == "en")?"Submit":"إرسال"}}</button>
						</form>



					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- story-block ends here-->

@include('layouts.expertwithmakeanappoyment')

@endsection
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@section('script')
<script type="text/javascript">



function createRecaptcha() {
 grecaptcha.render("recaptcha", {sitekey: "6LedksUUAAAAAJQ9DE5OUZEkmzagIsnM_ho6aC9r", theme: "light"});
}
 createRecaptcha();

setTimeout(function() {
 $('.successMessage').fadeOut();
}, 5000 );


	$(".loadmore").click(function(){
		var offset = $('.testimonial').length;
		$('#overlay').fadeIn();
		$.ajax({
			url: "{{Config::get('variable.URL_LINK')}}testimonial/loadMore",
			type: 'post',
			data: {'offset':offset,'_token':'{{csrf_token()}}'},
			success: function(response) {
			     $('#overlay').fadeOut();
				if(response !=""){
					$('.alltestimonial').append(response);
				}
				var currentTestimonial = $('.testimonial').length;
				var totalTestimonial = $('#totalTestimonial').val();
				if(currentTestimonial == totalTestimonial){
					$('#overlay').fadeOut();

				}
			}
		});
	});

	$(".saveTestimonial").click(function(e){
		e.preventDefault();

		  $(".alert-danger").css('display','none');

		if(!$("#exampleCheck1").is(":checked")){
			$(document).find('.error_terms').css('display','block');
			$('.error_terms').html('please select terms and conditions');
			return false;
		}else{
			$('.error_terms').html('');
		}

		$('#overlay').fadeIn();
		// Get form
		var form = $('#testimonialForm')[0];
		// Create an FormData object
		var data = new FormData(form);
		var url = $("#testimonialForm").attr('action');
		$(this).prop("disabled", true);

		if(grecaptcha.getResponse() == "") {
              $(".print-error-capcha").css('display','block');
          $(".print-error-capcha").empty().append('reCAPTCHA is mandatory');
          	$(".saveTestimonial").removeProp("disabled");
          	$('#overlay').fadeOut();
            return false;
      }
		$.ajax({
			url: url,
			type: 'POST',
			enctype: 'multipart/form-data',
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			success: function(response) {
				if($.isEmptyObject(response.error)){
                            	$('#overlay').fadeOut();	
                            	$("#testimonialForm").trigger("reset");
									$(".saveTestimonial").removeProp("disabled");
									$(".suvessmessage").css('display','block');
									$('html, body').animate({ scrollTop: 0 }, 0);
							}else{
							     	$('#overlay').fadeOut();	
								$(".saveTestimonial").removeProp("disabled");
								$(".alert-danger").empty().css('display','none');
									printErrorMsg(response.error);
							}
			 }
		});


		function printErrorMsg (msg) {

             if(msg['name_en']){
             $(".error_name_en").css('display','block');
             $(".error_name_en").empty().append(msg['name_en']);
             }

						 if(msg['name_ar']){
						 $(".error_name_ar").css('display','block');
						 $(".error_name_ar").empty().append(msg['name_ar']);
						 }

						 if(msg['description_en']){
						 $(".error_description_en").css('display','block');
						 $(".error_description_en").empty().append(msg['description_en']);
						 }

						 if(msg['description_ar']){
						 $(".error_description_ar").css('display','block');
						 $(".error_description_ar").empty().append(msg['description_ar']);
						 }

						 if(msg['testimony_en']){
						 $(".error_testimony_en").css('display','block');
						 $(".error_testimony_en").empty().append(msg['testimony_en']);
						 }

						 if(msg['testimony_ar']){
						 $(".error_testimony_ar").css('display','block');
						 $(".error_testimony_ar").empty().append(msg['testimony_ar']);
						 }

              if(msg['video1']){
								$(".error_video").css('display','block');
							  $(".error_video").empty().append(msg['video1']);
             }

						 if(msg['email']){
					 		$(".error_email").css('display','block');
					 		$(".error_video").empty().append(msg['video1']);
					  }

						if(msg['phone']){
							$(".error_phone").css('display','block');
							$(".error_phone").empty().append(msg['phone']);
					 }




					 if(msg['is_advocacy']){
			 			$(".error_is_advocacy").css('display','block');
			 			$(".error_is_advocacy").empty().append(msg['is_advocacy']);
			 	 }


				 if(msg['is_shareinfo']){
					 $(".error_is_shareinfo").css('display','block');
					 $(".error_is_shareinfo").empty().append(msg['is_shareinfo']);
				}


				if(msg['is_record']){
					$(".error_is_record").css('display','block');
					$(".error_is_record").empty().append(msg['is_record']);
			 }
$(".saveTestimonial").removeProp("disabled");

         }

	});
</script>
@endsection
