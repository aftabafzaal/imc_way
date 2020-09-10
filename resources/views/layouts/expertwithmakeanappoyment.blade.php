<style>
.need-block .btn-appoint {
    padding: 10px 10px;
    transition: .4s ease;
    border-radius: 0px;
    border: 1px solid #e7e7e7;
}
</style>
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
<?php
use App\Helpers;
$helper = new Helpers();
$getcommonfooter =$helper->getcommonfooter();
?>
<section class="need-block">
  <div class="container">
    <div class="btn-block">{{-- <a href="{{$getcommonfooter['doc_link']}}" class="btn-blue">{{($language == "en")?$getcommonfooter['doc_en']:$getcommonfooter['doc_ar']}} </a> --}}
     <a href="{{Config::get('variable.URL_LINK')}}doctors" class="btn-blue">{{($language == "en")?$getcommonfooter['doc_en']:$getcommonfooter['doc_ar']}}</a></div>
    <h4 class="text-fff"><span class="d-block">{{($language == "en")?$getcommonfooter['get_en']:$getcommonfooter['get_ar']}}</h4>
    <div class="callus">
      <?php
if($language == "en"){
  ?>
  <a href="tel:{{$getcommonfooter['call_us']}}"><i class="fa fa-phone" aria-hidden="true"></i> {{($language == "en")?"Call Us":"اتصل بنا"}} : {{$getcommonfooter['call_us'] }}</a>
  <?php
}else{
  ?>
  <a href="tel:{{$getcommonfooter['call_us']}}"><i class="fa fa-phone" aria-hidden="true"></i>{{$getcommonfooter['call_us'] }} : {{($language == "en")?"Call Us":"اتصل بنا"}}</a>

  <?php
}
      ?>
    </div>
    <div class="mt-3 btn-block"><a class="btn-appoint" href="{{$getcommonfooter['appointment_link']}}" target="_blank">{{($language == "en")?$getcommonfooter['appointment_en'] : $getcommonfooter['appointment_ar'] }}</a></div>
  </div>
</section>
