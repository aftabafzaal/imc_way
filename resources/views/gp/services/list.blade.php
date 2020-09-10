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
  $getpage=$helper->getPagedata('medical-services');
  $basedata=$helper->getPageBasedata('1');
	@endphp
@include('layouts.latestbanner')
<!--banner ends here-->
<!-- main section start here-->
<link href="https://fonts.googleapis.com/css?family=Hind|Lato|Montserrat|Open+Sans+Condensed:300|Poppins|Roboto&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
<link href="https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff&display=swap" rel="stylesheet">
<?php
  if(isset($t) && !empty($t)){
        if($language != "en"){
           $parenttitle =$t['title_ar'];
           $parentdescription =$t['description_ar'];
        }else{
          $parenttitle =$t['title_en'];
          $parentdescription =$t['description_en'];
        }
    }else{
      $parenttitle="";
      $parentdescription="";
    }
  ?>

      <section class="main-inner-sec">
        <div class="container">
          <div class="inner-title">
            <h3>{{$parenttitle}}</h3>
            <p class="m-0">
           {{$parentdescription}}
            </p>
          </div>

          <div class="History-block services-new-block li-dot">

            <?php
              if(!empty($data)){
                $i =1;
              foreach($data as $key=>$v){
                    if($language != "en"){
                       $title =$v['title_ar'];
                       $subtitle =$v['subtitle_ar'];
                        $description =$v['description_ar'];
                    }else{
                        $title =$v['title_en'];
                        $subtitle =$v['subtitle_en'];

                        $description =$v['description_en'];
                    }

									$enImage= $helper->getImage($v['media_id']);
									if(!empty($enImage)){
									 $icon=	env('BASE_URL').$enImage;
								 }else{
									 $icon="";
								 }
                  if ($i % 2 == 0)
                  {
                     ?>
                     <div class="row mb-5">
                       <div class="col-lg-6 col-md-6 wow fadeInLeft">
                         <div class="history-img new-shape-left">
                           <img src="{{$icon}}" alt="{{$title}}" title="{{$title}}">
                         </div>
                       </div>
                       <div class="col-lg-6 col-md-12 wow fadeInRight">
                         <div class="history-element">
                           <h4 class="text-main">{{$title}}</h4>
                           {!! $description !!}
                         </div>
                       </div>
                     </div>
                     <?php
                  }
                  else
                  {
                    ?>
						<div class="service-img">
							<img src="{{$icon}}" alt="{{ __('messages.servicesAlternate') }}" title="{{ __('messages.servicesTitle') }}">

						</div>
						<div class="history-element service-text">
							<h4 class="text-main" style="display: none;">{{$title}}</h4>
							{!! $description !!}
						</div>
                    <?php
                  }
               ?>
               <?php
               $i = $i+1;
             }
            }
        ?>

          </div>
        </div>
      </section>



<!-- main section ends here-->
@include('layouts.commonfooter')
    <!-- <div class="loadmore"><button>Load more</button></div> -->

  </div>
</section>


@endsection
