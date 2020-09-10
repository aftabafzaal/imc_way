
@extends('layouts.home')
@section('content')
@php
  $url=Request::segment(1);
  if( $url == "en"){
    $language='en';
  }elseif($url == "ar"){
      $language='ar';
  }else{
    $language='en';
  }
  $helper = new App\Helpers();
  $getpage=$helper->getPagedata('mayoclinic');
  $basedata=$helper->getPageBasedata('1');
  @endphp
@include('layouts.latestbanner')



<style>
/*.faq-list .faq-list-in  .active {
    display: block;
    transition: .5s ease;
}*/

.accordion .card-header:after {
    font-family: 'FontAwesome';
    content: "\f068";
    float: right;
}
.accordion .card-header.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\f067";
}
</style>




<section class="main-inner-sec pt-0 care-partner">
  <div class="mayo-imc-img">
   <!--  <img src="assets/images/care-partner/page-banner-ar.jpg"> -->
    @if($language != 'en')
      @if(!empty($content['banner']['icon_ar']))
    <?php  $enImage= $helper->getImage($content['banner']['media_id_ar']);
    	$enattr= $helper->getimageattirbute($enImage);
    ?>
    <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{ __('messages.mayoAlternate') }}" title="{{ __('messages.mayoTitle') }}">
    @else
    <?php    $enImage= $helper->getImage($content['banner']['media_id_en']);
    $enattr= $helper->getimageattirbute($enImage);
    ?>
    <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{ __('messages.mayoAlternate') }}" title="{{ __('messages.mayoTitle') }}">
    @endif
    @else
    <?php    $enImage= $helper->getImage($content['banner']['media_id_en']);
     $enattr= $helper->getimageattirbute($enImage);
    ?>
    <img src="{{env('BASE_URL')}}<?php echo $enImage;?>" alt="{{ __('messages.mayoAlternate') }}" title="{{ __('messages.mayoTitle') }}">
    @endif
  </div>
  <div class="container">
    <div class="care-partnerin">
      <div class="row">
        <div class="col-md-12 col-lg-4">
          <div class="care-sec-1">
            <div class="icon-bg">
              <p>{!!($language == "en")?$content['section_1a']['title_en']:$content['section_1a']['title_ar']!!}<sup>st</sup></p>
            </div>
            <p> {!!($language == "en")?$content['section_1a']['description_en']:$content['section_1a']['description_ar']!!}</p>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <div class="care-sec-1">
            <div class="icon-bg">
              <p>{!!($language == "en")?$content['section_2a']['title_en']:$content['section_2a']['title_ar']!!}</p>
            </div>
            <p>{!!($language == "en")?$content['section_2a']['description_en']:$content['section_2a']['description_ar']!!}</p>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <div class="care-sec-1">
            <div class="icon-bg">
              <p>{!!($language == "en")?$content['section_3a']['title_en']:$content['section_3a']['title_ar']!!}</p>
            </div>
            <p>{!!($language == "en")?$content['section_3a']['description_en']:$content['section_3a']['description_ar']!!}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="care-partnerin-2">
      <div class="partner-shape">
        <p class="quotes">
        {!!($language == "en")?$content['section_1']['description_en']:$content['section_1']['description_ar']!!}
        </p>
      </div>
    </div>
    <div class="care-patient-sec">
      <h3>        {!!($language == "en")?$content['section_4']['title_en']:$content['section_4']['title_ar']!!}
</h3>
      <p>
       {!!($language == "en")?$content['section_4']['description_en']:$content['section_4']['description_ar']!!}
      </p>
    </div>
    {!!($language == "en")?$content['section_6']['description_en']:$content['section_6']['description_ar']!!}
  </div>
</section>
<div class="bg-fff mayo-clini-sec">
  <div class="container">
    <div class="care-patient-sec m-0">
      <h3 class="text-main">     {!!($language == "en")?$content['section_2']['title_en']:$content['section_2']['title_ar']!!}</h3>
      <p>
           {!!($language == "en")?$content['section_2']['description_en']:$content['section_2']['description_ar']!!}
      </p>
      <div class="patient-btn">
        <!-- <a class="btn-in" href="#">Read More</a> -->
      </div>
    </div>
  </div>
</div>




<div class="consultant-block care-patient-sec-bg">
  <div class="container">
    <div class="row">
      <div class="care-patient-sec mt-0">
        <h3 class="text-main">     {!!($language == "en")?$content['section_3']['title_en']:$content['section_3']['title_ar']!!}</h3>
        <p>
           {!!($language == "en")?$content['section_3']['description_en']:$content['section_3']['description_ar']!!}
        </p>
      </div>
      {!!($language == "en")?$content['section_5']['description_en']:$content['section_5']['description_ar']!!}

    </div>

  </div>
</div>




<div class="faq-sec">
  <div class="container">
    <div class="care-patient-sec m-0">
      <h2><b>{!!($language == "en")?"FAQs":"الأسئلة الشائعة" !!}</b></h2>
    </div>
    <div class="faq-list">
      <div class="accordion" id="accordionExample">
        <?php
          if(isset($data)){
            $i=1;
             foreach($data as $key=>$mayo){
               ?>
               <div class="faq-list-in">
                 <div class="list-header" id="heading{{$mayo->id}}">

                       <a class="header-title collapsed" data-toggle="collapse" data-target="#collapse{{$mayo->id}}" aria-expanded="true" aria-controls="collapse{{$mayo->id}}">
                         <span>{{($language == "en")?$mayo->title_en:$mayo->title_ar}}</span>
                         <span class="toggle_icon"> <i class="fa fa-plus-circle" aria-hidden="true"></i> </span>
                        <span class="display_plus" style="display: none;"> <i class="fa fa-minus-circle" aria-hidden="true"></i> </span>
                        </a>
                        </div>
                        <div id="collapse{{$mayo->id}}" class="collapse" aria-labelledby="heading{{$mayo->id}}" data-parent="#accordionExample">
                        <div class="list-body">
                        {!!($language == "en")?$mayo->description_en:$mayo->description_ar!!}
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
  </div>
</div>

<!-- need section start here-->
@include('layouts.needadoctorsingle')
<!-- need section ends here-->

@endsection

@section('script')
<script>

$('.list-header ').click(function() {

   $('.list-header').find('.header-title').addClass('collapsed');
   $('.list-header').not($(this)).next('.collapse').removeClass('show');

  })





</script>


@endsection
