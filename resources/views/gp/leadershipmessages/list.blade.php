@extends('layouts.home')
@section('content')
<!--banner start here-->
@php
	$url=Request::segment(1);
	if(	$url == "en"){
		$language='en';
	}elseif($url == "ar"){
			$language='ar';
	}else{
		$language='en';
	}
  $helper = new App\Helpers();
  $getpage=$helper->getPagedata('leadership-messages');
  $basedata=$helper->getPageBasedata('1');
	@endphp
@include('layouts.latestbanner')
<link href="https://fonts.googleapis.com/css?family=Hind|Lato|Montserrat|Open+Sans+Condensed:300|Poppins|Roboto&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff&display=swap" rel="stylesheet">
<?php
  if(!empty($data)){
        // $parenttitle =$data['parent_title_ar'];
        //    $parentdescription =$data['parent_description_ar'];
        //    $title =$data['title_ar'];
        //    $parentsubtitle =$data['subtitle_ar'];
        //    $description =$data['description_ar'];
        //    $signture =$data['signature'];
        //     $created =$data['updated_at'];
        //     $designation =$data['designation_ar'];
        //     $icon ="/images/leaderships/".$data['icon'];
        if($language != "en"){
           $parenttitle =$data['parent_title_ar'];
           $parentdescription =$data['parent_description_ar'];
           $title =$data['title_ar'];
           $parentsubtitle =$data['subtitle_ar'];
           $description =$data['description_ar'];
           $signture =$data['signature'];
            $created =$data['updated_at'];
            $designation =$data['designation_ar'];
        }else{
          $parenttitle =$data['parent_title_en'];
          $parentdescription =$data['parent_description_en'];
          $title =$data['title_en'];
          $parentsubtitle =$data['subtitle_en'];
          $description =$data['description_en'];
          $signture =$data['signature'];
          $designation =$data['designation_en'];
        }

				$enImage= $helper->getImage($data['media_id']);
				$enattr= $helper->getimageattirbute($enImage);
				if(empty($enImage)){
					$icon =env('BASE_URL')."assets/pdf/SampleVideo_1280x720_1mb.mp4";
					$enattr="";
				}else{
				 $icon=	env('BASE_URL').$enImage;
				 $enattr=$enattr;
				}


      ?>

         		<!--banner ends here-->
         		<!-- main section start here-->
         		<section class="main-inner-sec">
         			<div class="container">
         				<div class="inner-title">
         					<h3>{{$parenttitle}}</h3>
         					<p class="mb-0">{{$parentdescription}}</p>		</div>
         				<div class="ceo-profile">
         					<div class="row">
         						<div class="col-lg-5 col-md-12">
         							<div class="profilein">
         								<h4 class="text-main">{{$title}}  <span>{{$designation}}</span></h4>
         								<p>{{$parentsubtitle}}</p>
                      	</div>
         							<div class="doctr-text">
                     <div class="doctr-text">
                     {!! $description !!}
  						      	</div>
         							<p class="signature">{{$signture}}</p>
         							</div>
         						</div>
         						<div class="col-lg-7 col-md-12">
         							<div class="profile-pic">
         								<img src="<?php  echo $icon;?>" alt="{{$title}}" title="{{$title}}">
         							</div>
         						</div>
         					</div>
         				</div>
         			</div>
         		</section>

      <?php
  }
   ?>

<!-- main section ends here-->
@include('layouts.subscribe')

    <!-- <div class="loadmore"><button>Load more</button></div> -->

  </div>
</section>


@endsection
