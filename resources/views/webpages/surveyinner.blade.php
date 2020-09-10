@extends('layouts.app')
@section('title', 'Surveys')
@section('content')
@php
	$language = (Session::has("language"))?Session::get("language"):'en';
@endphp

<section class="main-inner-sec pb-5 care-partner">
	<div class="container">
		<div class="care-patient-sec m-0">
			<h2>Survey Questions</h2>
		</div>
		<!-- survey-element start here-->
		<section class="survey-element">
			<div class="container">

          <section class="survey-element">
			<div class="container">

			<?php
			if(!empty($question)) {
			$data=[];
			foreach($question as $v){
				 if(isset($v['question_parent']))
				 {
				  $data[$v['question_parent']][]= $v;
				 }else{
				  $data[]= $v;
				 }
			}

			  foreach($data as $key=>$v){
dd($key);
			?>
 <h3>@php echo $key ; @endphp</h3>

	     <?php   foreach($v as $qu){

				  ?>

				 @if($qu['question_type'] == '1')
				<div class="survey-in">
					<h4>{{$qu['question_en']}}</h4>
					<ul>

						@if(!empty($qu['answer_en']))
						<li>
							<img src="{{env('BASE_URL')}}assets/images/emoji/excellant.png">
							<a class="btn-select over-green">
                             {{($language == "en")?$qu['answer_en']:qu['answer_ar']}}</a>
						</li>
						@endif
						@if(!empty($qu['answer_en2']))
						<li>
							<img src="{{env('BASE_URL')}}assets/images/emoji/veryGood.png">
							<a class="btn-select over-green">{{($language == "en")?$qu['answer_en2']:qu['answer_ar2']}}</a>
						</li>
						@endif
						@if(!empty($qu['answer_en3']))
						<li>
							<img src="{{env('BASE_URL')}}assets/images/emoji/good.png">
							<a class="btn-select over-good">{{($language == "en")?$qu['answer_en3']:qu['answer_ar3']}}</a>
						</li>
						@endif
						@if(!empty($qu['answer_en4']))
						<li>
							<img src="{{env('BASE_URL')}}assets/images/emoji/Fair.png">
							<a class="btn-select ">  {{($language == "en")?$qu['answer_en4']:qu['answer_ar4']}} </a>
						</li>
						@endif
						@if(!empty($qu['answer_en5']))
						<li>
							<img src="{{env('BASE_URL')}}assets/images/emoji/Poor.png">
							<a class="btn-select ">{{($language == "en")?$qu['answer_en5']:qu['answer_ar5']}}</a>
						</li>
						@endif
						@if(!empty($qu['answer_en6']))
						<li>
							<img src="{{env('BASE_URL')}}assets/images/emoji/Apply.png">
							<a class="btn-select">{{($language == "en")?$qu['answer_en6']:qu['answer_ar6']}}</a>
						</li>
						@endif
					</ul>

              @elseif($qu['question_type'] == '2')
	               <h4>{{$qu['question_en']}}</h4>

	               <input type="text" name="answers">

	               @elseif($qu['question_type'] == '3')
	               <h4>{{$qu['question_en']}}</h4>

	               <div class="col-lg-9 col-xl-9">
                    <textarea name="answers"></textarea>

                   </div>

                    @elseif($qu['question_type'] == '4')

	               <div class="col-lg-9 col-xl-9">
                    <input placeholder="" id="title_en" name="answers" type="date" class="form-control " value="" autofocus="">
                   </div>

                    @elseif($qu['question_type'] == '5')

	               <h4>{{$qu['question_en']}}</h4>

	               <div class="col-lg-9 col-xl-9">
                    <input placeholder="" id="title_en" name="answers" type="time" class="form-control " value="" autofocus="">
                   </div>

                    @elseif($qu['question_type'] == '6')
	               <h4>{{$qu['question_en']}}</h4>

	               <div class="col-lg-9 col-xl-9">
                    <input placeholder="" id="title_en" name="answers" type="datetime-local" class="form-control " value="" autofocus="">
                   </div>


                  @endif
				</div>
           <a href="{{url('deleteQ/'.$qu['id'])}}" class="button">Delete Question</a>

			<?php } }    }

		?>
          			</div>
		</section>


		<!-- survey-element start here-->


		<!-- <div class="text-center submit-btn">
			<button type="button" class="btn btn-primary" id="demo" data-toggle="modal" data-target="#exampleModal">
				Submit
			</button>
		</div> -->
	</div>
</section>


<!--modal submit-->
<div class="modal fade thankyou-popup" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Submission Successfull</h5>
				{{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button> --}}
			</div>
			<div class="modal-body">
				<h6><b>Thank you, your Submission has been Received.</b></h6>
			</div>
			<div class="modal-footer">
				{{-- <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">ok</button> --}}
			<a href="{{url('survey')}}" class="btn btn-primary">ok</a>
			</div>
		</div>
	</div>
</div>
<!-- main section ends here-->
<!-- need section start here-->


@include('layouts.needadoctorsingle')

<script src="{{env('BASE_URL')}}assets/js/wow.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{env('BASE_URL')}}assets/js/jquery.hislide.js"></script>
<script>
	$('.slide').hiSlide();

	$(document).ready(function(){
$("#demo").attr("disabled", true);
		$('.survey-element .survey-in:nth-child(1) ul li a').click(function(){
			$('.survey-element .survey-in ul li a').removeClass("bg-change");
			$(this).addClass("bg-change");
			$("#demo").attr("disabled", false);

		});
		$('.survey-element .survey-in:nth-child(2) ul li a').click(function(){
			$('.survey-element .survey-in ul li a').removeClass("bg-change1");
			$(this).addClass("bg-change1");
			$("#demo").attr("disabled", false);

		});
		$('.survey-element .survey-in:nth-child(3) ul li a').click(function(){
			$('.survey-element .survey-in ul li a').removeClass("bg-change2");
			$(this).addClass("bg-change2");
			$("#demo").attr("disabled", false);

		});
		$('.survey-element .survey-in:nth-child(4) ul li a').click(function(){
			$('.survey-element .survey-in ul li a').removeClass("bg-change3");
			$(this).addClass("bg-change3");
			$("#demo").attr("disabled", false);

		});
		$('.survey-element .survey-in:nth-child(5) ul li a').click(function(){
			$('.survey-element .survey-in ul li a').removeClass("bg-change4");
			$(this).addClass("bg-change4");
			$("#demo").attr("disabled", false);

		});
		$('.survey-element .survey-in:nth-child(6) ul li a').click(function(){
			$('.survey-element .survey-in ul li a').removeClass("bg-change5");
			$(this).addClass("bg-change5");
			$("#demo").attr("disabled", false);

		});
		$('.survey-element .survey-in:nth-child(7) ul li a').click(function(){
			$('.survey-element .survey-in ul li a').removeClass("bg-change6");
			$(this).addClass("bg-change6");
			$("#demo").attr("disabled", false);

		});
		$('.survey-element .survey-in:nth-child(8) ul li a').click(function(){
			$('.survey-element .survey-in ul li a').removeClass("bg-change7");
			$(this).addClass("bg-change7");
			$("#demo").attr("disabled", false);

		});
		$('.survey-element .survey-in:nth-child(9) ul li a').click(function(){
			$('.survey-element .survey-in ul li a').removeClass("bg-change8");
			$(this).addClass("bg-change8");
			$("#demo").attr("disabled", false);

		});
		$('.survey-element .survey-in:nth-child(10) ul li a').click(function(){
			$('.survey-element .survey-in ul li a').removeClass("bg-change9");
			$(this).addClass("bg-change9");
			$("#demo").attr("disabled", false);

		});
	});
</script>


<script>
	new WOW().init();
</script>
@endsection
