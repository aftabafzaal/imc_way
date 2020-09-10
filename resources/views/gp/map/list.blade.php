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
  $getpage=$helper->getPagedata('site-map');
  $basedata=$helper->getPageBasedata('2');
	@endphp
@include('layouts.finalbanner')
<!--banner ends here-->
<section class="profile-sec">
  <div class="container">

          <div class="accordion-block appoint-block-boxes">
            <div class="row">
                <?php
                use App\Helpers;
                $helper = new Helpers();
                if(!empty($data)){
                   foreach($data as $v){

                        ?>
                        <div class="col-md-4">
                          <div class="admission-blocknew">
                            <h4 class="text-main">{{($language == "en")?$v->title_en:$v->title_ar}}</h4>
                           <p>
                             <?php
                          $getsubmenu =$helper->getSubMenu($v->id);
                          if(!empty($getsubmenu)){
                             foreach($getsubmenu as $v1){
                               $link = "";
                               if($v1->type == 1){
                                 $link = $v1->link;
                               }else if($v1->type == 2 && !empty($v1->page_id)){
                                 $link = $helper->getPageUrl($v1->page_id);
                               }
                                ?>
                                <b><a href="{{$link}}" onMouseOver="this.style.color='green'"onMouseOut="this.style.color='#005a9c'" >{{($language == "en")?$v1->title_en:$v1->title_ar}} </b></a><br/>
                                <?php
                             }
                           }
                             ?>
                          </p>
                          </div>
                        </div>
                        <?php
                   }
                }
                ?>



      <div class="col-md-4">
        <div class="admission-blocknew">
        <h4 class="text-main">{{($language == "en")?"Useful Links":"وابط مفيدة"}}  </h4>  <p>
          <?php
          if(!empty($topmenu)){
            foreach($topmenu as $v){
                $link = "";
                if($v->type == 1){
                  $link = $v->link;
                }else if($v->type == 2 && !empty($v->page_id)){
                  $link = $helper->getPageUrl($v->page_id);
                }
              ?>
              <b><a href="{{$link}}" onMouseOver="this.style.color='green'"onMouseOut="this.style.color='#005a9c'" >{{($language == "en")?$v->title_en:$v->title_ar}} </b></a><br/>
              <?php
            }
          }
          ?>
          </p>
        </div>
      </div>





        </div>
      </section>

<!-- main section ends here-->
    <!-- <div class="loadmore"><button>Load more</button></div> -->

  </div>
</section>


@endsection
