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
$getpage=$helper->getPagedata('about-us');
$basedata=$helper->getPageBasedata('1');
?>
@include('layouts.latestbanner')
<!--banner ends here-->
<?php
  if(!empty($data)){
        if($language != "en"){
            $heading1 =$data['heading1_ar'];
            $heading2 =$data['heading2_ar'];
            $heading3 =$data['heading3_ar'];
            $description1 =$data['description1_ar'];
            $description2 =$data['description2_ar'];
            $description3 =$data['description3_ar'];
        }else{
          $heading1 =$data['heading1_en'];
         $heading2 =$data['heading2_en'];
          $heading3 =$data['heading3_en'];
            $description1 =$data['description1_en'];
            $description2 =$data['description2_en'];
            $description3 =$data['description3_en'];
        }

			$enImage= $helper->getImage($data['media_id']);
			if(empty($enImage)){
				$icon ="assets/pdf/SampleVideo_1280x720_1mb.mp4";
			}else{
			 $icon=	env('BASE_URL').$enImage;
			}
      ?>
      <section class="main-inner-sec">
        <div class="inner-title">
          <h3>{!!($language == "en")?"An Overview":"نظرة عامة"!!}</h3>
        </div>
  			
        	<div class="row">
  			    <div class="col-lg-6 col-md-12 wow fadeInLeft" style="margin: 0 auto;">
					<div class="history-img new-shape-left">
					    <div class="intro-video">
  				<video poster="{{env('BASE_URL')}}images/Pic4.jpg" controls  muted>
  					<source src="{{$icon}}" type="video/mp4">
  					<source src="{{$icon}}" type="video/ogg">
  					
  						Your browser does not support the video tag.
  				</video>
        </div>
         </div> </div> </div>
        
          <div class="accordion-block">
    				<div class="container">
    					<div class="admission-blocknew">
    						<h4 class="text-main">{{$heading1}}</h4>
                  <p>{!!$description1!!}</p>
    					</div>
    					<div class="admission-blocknew">
    						<h4 class="text-main">{{$heading2}}</h4>
                <p>{!!$description2!!}</p>
			            </div>
    					<div class="admission-blocknew">
    						<h4 class="text-main">{{$heading3}}</h4>
                <p>{!!$description3!!}</p>
    					</div>
    				</div>
    			</div>
    		</section>
      <?php
}
?>



<!-- main section ends here-->
@include('layouts.needadoctorsingle')
    <!-- <div class="loadmore"><button>Load more</button></div> -->

  </div>
</section>


@endsection
