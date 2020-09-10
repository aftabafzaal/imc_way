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
  $getpage=$helper->getPagedata('show-leaderships');
  $basedata=$helper->getPageBasedata('1');
	@endphp
@include('layouts.latestbanner')

      <div class="leaders-profile-block">
        <div class="container">
          <?php
            if(!empty($data)){
                 $i=1;
               foreach($data as $key=>$v){
                   if($v['id'] == "11"){
                     $sub="1088";
                   }else if($v['id'] == "8"){
                      $sub="1503";
                    }else{
                      $sub="2000";
                   }
                   if($language != "en"){
                      $title =$v['name_ar'];
                      $created =$v['updated_at'];
                      $postion =$v['position_ar'];
                      $desc =$v['description_ar'];
                      $desgination=$v['designation_ar'];
                      //$icon =env('BASE_URL')."/images/leaderships/".$v['icon'];
                  }else{
                      $title =$v['name_en'];
                      $created =$v['updated_at'];
                      $postion =$v['position_en'];
                        //$icon =env('BASE_URL')."/images/leaderships/".$v['icon'];
                        $desgination=$v['designation_en'];
                      $desc =$v['description_en'];
                  }
                // if(empty($icon)){
                //   $icon ="assets/images/leader1.png";
                // }

								$enImage= $helper->getImage($v['media_id']);
								$enattr= $helper->getimageattirbute($enImage);
								if(!empty($enImage)){
								 $icon=	env('BASE_URL').$enImage;
								 $enattr=$enattr;
							 }else{
								 $icon="";
								 $enattr="";
							 }


             ?>
             <div class="profile-blockin">
               <div class="row">
                 <div class="col-lg-3 col-md-12">
                   <div class="leader-img-new">
                     <img src="{{$icon}}" alt="{{ __('messages.leadershipAlternate') }}" title="{{ __('messages.leadershipTitle') }}">
                   </div>
                 </div>
                 <div class="col-lg-9 col-md-12">
                   <div class="bio-block">
                     <h3>{{$title}}  <span class="text-green">{{$desgination}}</span></h3>
                     <h4 class="text-green">{{$postion}}</h4>
                     <!-- <p>{!!$desc!!}</p> -->
                       <p>{!!$desc !!}</p>


                   </div>
                 </div>
               </div>
             </div>
             <?php
             $i++;
           }
         }
         ?>

        </div>
      </div>


<!-- main section ends here-->
@include('layouts.commonfooter')
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


@endsection
