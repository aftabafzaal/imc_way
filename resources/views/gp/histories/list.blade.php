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
  $getpage=$helper->getPagedata('history');
  $basedata=$helper->getPageBasedata('1');
	@endphp

@include('layouts.latestbanner')
<!--banner ends here-->
<section class="main-inner-sec">
  <div class="container">
    <div class="History-block">
      <div class="title">
      					<h3 class="text-main mb-5"><b>{{($language == "en")?"EVERY NOBLE WORK HAS A REMARKABLE HISTORY ..":"ليس هناك عمل نبيل إلا وله ماضٍ عريق .."}}</b></h3>
      				</div>

              <?php
  if(!empty($data)){
    $i =1;
  foreach($data as $key=>$v){
        if($language != "en"){
           $title =$v['title_ar'];
            $year =$v['year'];
              $description =$v['description_ar'];
							$enImage= $helper->getImage($v['media_id_en']);

$enattr= $helper->getimageattirbute($enImage);
        }else{
            $title =$v['title_en'];
          $year =$v['year'];
            $description =$v['description_en'];
			$enImage= $helper->getImage($v['media_id_en']);
$enattr= $helper->getimageattirbute($enImage);
        }
				if(empty($enImage)){
					$icon =env('BASE_URL')."assets/pdf/SampleVideo_1280x720_1mb.mp4";
					$enattr="";
				}else{
				 $icon=	env('BASE_URL').$enImage;
				 $enattr=$enattr;
				}

      if ($i % 2 == 0)
      {
         ?>
         <div class="row mb-5">
           <div class="col-lg-6 col-md-12 wow fadeInLeft">
             <div class="history-img new-shape-left">
               <img src="<?php echo $icon;?>" alt="{{$title}}" title="{{$title}}">
             </div>
           </div>
           <div class="col-lg-6 col-md-12 wow fadeInRight">
             <div class="history-element">
               <h4 class="text-main">{{$title}}</h4>
                   {!!$description!!}
             </div>
           </div>
         </div>
         <?php
      }
      else
      {
        ?>
        <div class="row mb-5">
          <div class="col-lg-6 col-md-12 wow fadeInLeft">
            <div class="history-element">
              <h4 class="text-main">{{$year}}</h4>
            {!!$description!!}
            </div>
          </div>
          <div class="col-lg-6 col-md-12 wow fadeInRight">
            <div class="history-img new-shape-right">
              <img src="<?php  echo $icon;?>" alt="{{$title}}" title="{{$title}}">
            </div>
          </div>
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
