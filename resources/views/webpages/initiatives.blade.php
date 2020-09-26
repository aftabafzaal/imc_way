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
$getpage = $helper->getPagedata('testimonial');
$basedata = $helper->getPageBasedata('2');
?>
<section class="find-doctor find-doctors eye-block eye-block-bg">
    <div class="container">
        <div class="banner-in">
            <div class="banner-left">
                <h1 class="text-fff"> {{($language == "en")? "Initiatives" :"المبادرات"}}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}">{!!($language == "en")?"Home":"الصفحة الرئيسية"!!}</a></li>
                        <li class="breadcrumb-item active text-fff" aria-current="page"><a  class="text-fff" href="{{Config::get('variable.URL_LINK')}}/about-us">{!!($language == "en")?"Initiatives":"المبادرات"!!}</a></li>

                        </li>
                    </ol>
                </nav>
            </div>
            @include('layouts.buttons')
        </div>
    </div>
    @include('layouts.squarebox')
</section>
<!--banner ends here-->
<!-- story-block start here-->
@php
$videoFormat = array("webm","mkv","flv","vob","ogv","ogg","drc","mng","avi","mov","qt","wmv","yuv","amv","mp4","mp2","mpeg","mpe","mpv","m4v","svi","3gp","3g2","mxf","roq","nsv","flv","f4v","f4p","f4a","f4b");
@endphp


@include('layouts.loader')

<section class="update-block">
    <div class="container">
        <div class="title">

        </div>
        <div class="row mb-5">
            <?php
            if (!empty($initiatives)) {
                foreach ($initiatives as $initiative) {

                    if ($language == "en") {
                        $title = $initiative->title_en;
                        $description = $initiative->brief_en;
                        $slug = $initiative->slug_en;
                    } else {
                        $title = $initiative->title_ar;
                        $description = $initiative->description_ar;
                        $slug = $initiative->description_en;
                    }
                    $image = env("BASE_URL");
                    $enImage = "";
                    if (!empty($initiative->media_id)) {


                        $enImage = $helper->getImage($initiative->media_id);
                        $image = $image . $enImage;
                    }
                    ?>
                    <div class="col-md-12 col-lg-4">
                        <div class="update-content">
                            <div class="img-sec"><a href="{{Config::get('variable.URL_LINK')}}initiatives/{{$slug}}"><img src="{{$image}}" alt="{{$title}}" title="{{$title}}"></a></div>
                            <div class="update-body">
                                <h5 class="text-blue"><a href="{{Config::get('variable.URL_LINK')}}initiatives/{{($language == "en")?$initiative->slug_en:$initiative->slug_ar}}"><?php echo $title; ?></a></h5>
                                <p class="update-date">{{!empty($initiative->start_at)?"".date('d M Y',strtotime($initiative->start_at)):""}}</p>
                                <p class="update-text"><a href="{{Config::get('variable.URL_LINK')}}initiatives/{{($language == "en")?$initiative->slug_en:$initiative->slug_ar}}"><?php echo $description; ?></a></p>
                                <div class="readmore"><a href="{{Config::get('variable.URL_LINK')}}initiatives/{{($language == "en")?$initiative->slug_en:$initiative->slug_ar}}">
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

    </div>

</div>
</section>

@endsection
@section('script')

@endsection
