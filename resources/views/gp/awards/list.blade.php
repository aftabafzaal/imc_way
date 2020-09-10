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
  $helper = new App\Helpers();
  $getpage=$helper->getPagedata('awards-and-accreditations');
  $basedata=$helper->getPageBasedata('1');
	@endphp
@include('layouts.latestbanner')


<section class="main-inner-sec">
  <div class="container">
    <div class="History-block awards-block-new">
      <?php
        if(!empty($data)){
          $i =1;
        foreach($data as $key=>$v){
              if($language != "en"){
                 $title =$v['title_ar'];
                  $created =$v['updated_at'];
                    $description =$v['description_ar'];
              }else{
                  $title =$v['title_en'];
                  $created =$v['updated_at'];
                  $description =$v['description_en'];
              }
							$enImage= $helper->getImage($v['media_id']);
							$enattr= $helper->getimageattirbute($enImage);
							if(empty($enImage)){
								$icon =env('BASE_URL')."assets/pdf/SampleVideo_1280x720_1mb.mp4";
								$enattr= "";
							}else{
							 $icon=	env('BASE_URL').$enImage;
							 $enattr=$enattr;
							}

            if ($i % 2 == 0)
            {
               ?>
               <div class="row mb-5">
                 <div class="col-lg-6 col-md-6 wow fadeInLeft">
                   <div class="history-img">
                     <img src="<?php echo $icon ?>" alt="{{$title}}" title="{{$title}}">
                   </div>
                 </div>
                 <div class="col-lg-6 col-md-6 wow fadeInRight">
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
                <div class="col-lg-6 col-md-6 wow fadeInLeft">
                  <div class="history-element">
                    <h4 class="text-main">{{$title}}</h4>
                    {!!$description!!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInRight">
                  <div class="history-img">
				  <img src="<?php echo $icon ?>" alt="{{$title}}" title="{{$title}}">

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
    <!-- <div class="loadmore"><button>Load more</button></div> -->
    <div class="kt-datatable__pager kt-datatable--paging-loaded">
        <div class="kt-datatable__pager-info">
          {{ $data->links() }}
    @if($data->total() > $data->lastItem() )
      <span class="kt-datatable__pager-detail">Showing {{$data->firstItem()}} - {{$data->lastItem()}} of {{$data->total()}}</span>
    </div>
    @endif
  </div>

  </div>
</section>
<!-- need section start here-->
@include('layouts.needadoctorsingle')
@include('layouts.subscribe')

<!-- need section ends here-->
@endsection
