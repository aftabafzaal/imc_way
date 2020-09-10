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
  $getpage=$helper->getPagedata('news-article');
  $basedata=$helper->getPageBasedata('5');
  $url='news-article';
	@endphp
@include('layouts.finalbanner')
<section class="update-block">
  <div class="container">
    <div class="title">
      <h3>{{($language == "en")?$content['section_1']['title_en']:$content['section_1']['title_ar']}}</h3>
<p>    {!!($language == "en")?$content['section_1']['description_en']:$content['section_1']['description_ar']!!}
</p>
  </div>
    <div class="row mb-5">
    <?php
      if(!empty($data)){
      foreach($data as $key=>$v){
            if($language != "en"){
               $title =$v['title_ar'];
                $created =date('d M Y',strtotime($v->created_at));
                  $description =$v['inner_title_ar'];
                      $icon =$v['icon'];
            }else{
                $title =$v['title_en'];
                $created =date('d M Y',strtotime($v->created_at));
                $description =$v['inner_title_en'];
                  $icon =$v['icon'];
            }
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
               <div class="col-md-12 col-lg-4">
                 <div class="update-content">
                   <div class="img-sec"><a href="{{Config::get('variable.URL_LINK')}}news/{{($language == "en")?$v->slug_en:$v->slug_ar}}"><img src="{{$icon}}" alt="{{$title}}" title="{{$title}}"></a></div>
                   <div class="update-body">
                     <h5 class="text-blue"><a href="{{Config::get('variable.URL_LINK')}}news/{{($language == "en")?$v->slug_en:$v->slug_ar}}"><?php echo $title;?></a></h5>
                     <p class="update-date">{{!empty($v->date)?"".date('d M Y',strtotime($v->date)):""}}</p>
                     <p class="update-text"><a href="{{Config::get('variable.URL_LINK')}}news/{{($language == "en")?$v->slug_en:$v->slug_ar}}"><?php echo$description;?></a></p>
                     <div class="readmore"><a href="{{Config::get('variable.URL_LINK')}}news/{{($language == "en")?$v->slug_en:$v->slug_ar}}">
                          {{($language == "en")?'Read more':'اقرأ المزيد'}}
											 </a></div>
                     <!-- <div class="readmore"><a href="#">اقرأ المزيد</a></div> -->
                   </div>
                 </div>
               </div>
             <?php
           }
        }
      ?>
    </div>

    </div>
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


@endsection
