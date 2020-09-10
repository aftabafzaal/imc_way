<?php
use App\Helpers;
$helper = new Helpers();
$getfollowusContent =$helper->getfollowusContent();

if(isset($getfollowusContent) && !empty($getfollowusContent) && count((array)$getfollowusContent)>0){
  ?>
<section class="contact-block wow fadeInUp new-sec-add ">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-12">
        <div class="socail-sec-right wow fadeInLeft">
          <h3>{{ __('messages.subscribe_newsletter') }}</h3>
          <div class="form-group">
        <div class="form-control alert alert-success alert-block suvessmessage" style="display:none">
        <button type="button" class="close" data-dismiss="alert">×</button>
              <strong class="appendsucess"> Subscribe Sucessfully  </strong>
        </div>
        </div>
          <input type="email" class="form-control" id="subemail" aria-describedby="emailHelp" placeholder="{!!($language == "en")?"Enter email:":"ادخل البريد الإلكتروني
"!!}">

             <span class="erroremail" style="color:red;"></span>
             <span class="successemail" style="color:green;"></span>
          <div class="btn-new-sec"><a href="javascript:void(0)" class="subi">{{($language == "en")?"Subscribe":"الإشتراك"}}</a></div>

        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="app-block3">
          <h3>{{($language == "en")?$getfollowusContent->main_title_en:$getfollowusContent->main_title_ar}}</h3>
          <p>{!!($language == "en")?$getfollowusContent->description_en:$getfollowusContent->description_ar!!}</p>
          <ul class="new-socail-sec">
            <?php
            $helper = new Helpers();
             $getmiddlemenu =$helper->getmiddlemenu();
             ?>
            @if(!empty($getmiddlemenu)) <!--checks if the fourth topmenu item is empty -->
            @foreach($getmiddlemenu as $getmiddlemenu_) <!--if not empty loop to get fourth value-->
            <li>
             <a href="{{$getmiddlemenu_->link}}" target="_blank"><i class="{{$getmiddlemenu_->icon}}" aria-hidden="true"></i></a>
            </li>
              @endforeach
              @endif
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="app-block wow fadeInRight">
          <h3><span>{{ __('messages.download_patient_app') }}</span></h3>
          <ul class="new-socail-sec-play">
            <li>
              <a class="hvr-buzz-out" href="{{ __('messages.download_link_app_store') }}" target="_blank">
                <div  class="hover-none">
                  <i class="fa fa-apple" aria-hidden="true"></i>
                  <p>{{ __('messages.avaiable_on') }}<span class="d-block">{{ __('messages.app_store') }}</span></p>
                </div>
                <p class="click-content">{{($language == "en")?"Download":"تحميل التطبيق"}}</p>
              </a>
            </li>
            <li>
                <a class="hvr-buzz-out" href="{{ __('messages.download_link_google_store') }}" target="_blank">
                <div  class="hover-none">
                  <i class="fa fa-play" aria-hidden="true"></i>
                  <p>{{ __('messages.get_it') }}<span class="d-block">{{ __('messages.google_play') }}</span></p>
                </div>
                <p class="click-content">{{($language == "en")?"Download":"تحميل التطبيق"}}</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}
?>
