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
@include('layouts.headercommon')
<style>
.rc-anchor-pt{display:none;}

#recaptcha {
  display: inline-block;
  position: relative;
}

#recaptcha:after {
    content: "";
    display: block;
    position: absolute;
    z-index: 1;
    bottom: 3px;
    right: 5px;
    width: 100px;
    height: 70px;
    background-color: #f9f9f9;
}
</style>

@include('layouts.loader')

<!--banner ends here-->
<section class="main-inner-sec ">
	<div class="accordion-block">
		<div class="container">
			<div class="admission-blocknew">
					<?php
					  if(!empty($data)){
							 foreach($data as $v){
					        if($language != "en"){
					            $heading1 =$v['title_ar'];
					            $description1 =$v['description_ar'];
					        }else{
					          $heading1 =$v['title_en'];
					            $description1 =$v['description_en'];
					        }
									?>
									 <h4 class="text-main">{{$heading1}}</h4>
								 	 {!!$description1!!}<br>
									<?php
					       }
					      ?>
      <?php
}
?>
@if(Session::has('message'))
<div class="pj">
<p style="margin-top: 15px;" class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
</div>
@endif


<div class="form-group">
	<div class="form-control alert alert-success alert-block suvessmessage" style="display:none">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong class="appendsucess"> </strong>
</div>
</div>

<!-- <form class="form-career formsdata" id="configform"> -->

	<form id="testimonialForm" class="form-career" method="post" action="{{Config::get('variable.URL_LINK')}}store" enctype="multipart/form-data">

	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">


	<select class="custom-select form-control" name="job">
  <option value="">@if($language != 'en') الوظائف    @else Job @endif</option>
      <?php
          if(!empty($jobs)){
              foreach($jobs as $j){
                   ?>
                   <option value="@if($language != 'en') {{$j->name_ar}}   @else {{$j->name_en}} @endif">@if($language != 'en') {{$j->name_ar}}   @else {{$j->name_en}} @endif</option>
                   <?php
              }
          }
      ?>
      </select>



		<div class="alert alert-danger print-error-msg" style="display:none"></div>
	</div>
	<div class="form-group">
		<input type="text" id="name" class="form-control" name="name" aria-describedby="name" placeholder="@if($language != 'en') الاسم   @else Name @endif" required>
		<div class="alert alert-danger print-error-msg1" style="display:none"></div>
	</div>
	<div class="form-group">
		<input type="email" class="form-control" id="email" name="email" placeholder="@if($language != 'en') البريد الإلكتروني     @else   Email @endif" required>
		<div class="alert alert-danger print-error-msg2" style="display:none"></div>
	</div>
	<div class="form-group">
<select class="custom-select form-control" id="nationality" name="nationality">
<option value="">@if($language != 'en')  الجنسية   @else Nationality @endif </option>
<option value="@if($language != 'en') آروبا @else Aruba @endif">@if($language != 'en') آروبا @else Aruba @endif</option>
<option value="@if($language != 'en') أذربيجان @else Azerbaijan @endif">@if($language != 'en') أذربيجان @else Azerbaijan @endif </option>
<option value="@if($language != 'en') أرمينيا @else Armenia @endif"> @if($language != 'en') أرمينيا @else Armenia @endif</option>
<option value="@if($language != 'en') أسبانيا @else Spain @endif"> @if($language != 'en') أسبانيا @else Spain @endif</option>
<option value="@if($language != 'en') أستراليا @else Australia @endif"> @if($language != 'en') أستراليا @else Australia @endif</option>
<option value="@if($language != 'en') أفغانستان @else Afghanistan @endif">@if($language != 'en') أفغانستان @else Afghanistan @endif</option>
<option value="@if($language != 'en')ألبانيا @else Albania @endif">@if($language != 'en')ألبان يا @else Albania @endif</option>
<option value="@if($language != 'en')ألمانيا @else Germany @endif">@if($language != 'en')ألمان يا @else Germany @endif </option>
<option value="@if($language != 'en') أنجولا @else Angola @endif"> @if($language != 'en') أنجو لا @else Angola @endif</option>
<option value="@if($language != 'en') أورجواي @else Uruguay @endif"> @if($language != 'en') أورجواي @else Uruguay @endif</option>
<option value="@if($language != 'en') أوزبكستان @else Uzbekistan @endif"> @if($language != 'en') أوزبكستان @else Uzbekistan @endif</option>
<option value="@if($language != 'en')  أوغندا  @else Uganda @endif"> @if($language != 'en') أوغندا  @else Uganda @endif</option>
<option value="@if($language != 'en') أوكرانيا @else Ukraine @endif"> @if($language != 'en') أوكرانيا @else Ukraine @endif</option>
<option value="@if($language != 'en') أيرلندا @else Ireland @endif"> @if($language != 'en') أيرلندا @else Ireland @endif</option>
<option value="@if($language != 'en') أيسلندا @else Iceland @endif"> @if($language != 'en') أيسلندا @else Iceland @endif</option>
<option value="@if($language != 'en') اثيوبيا @else Ethiopia @endif"> @if($language != 'en') اثيوبيا @else Ethiopia @endif</option>
<option value="@if($language != 'en') اريتريا @else Eritrea @endif"> @if($language != 'en') اريتريا @else Eritrea @endif</option>
<option value="@if($language != 'en') استونيا @else Estonia @endif"> @if($language != 'en') استونيا @else Estonia @endif</option>
<option value="@if($language != 'en') الأرجنتين @else Argentina @endif">@if($language != 'en') الأرجنتين @else Argentina @endif</option>
<option value="@if($language != 'en') الأردن  @else Jordan @endif"> @if($language != 'en')  الأردن  @else Jordan @endif</option>
<option value="@if($language != 'en') الاكوادور @else Ecuador @endif">@if($language != 'en') الاكوادور @else Ecuador @endif </option>
<option value="@if($language != 'en') الامارات العربية المتحدة @else United Arab Emirates @endif">@if($language != 'en') الامارات العربية المتحدة @else United Arab Emirates @endif</option>
<option value="@if($language != 'en') الباهاما @else Bahamas @endif"> @if($language != 'en') الباهاما @else Bahamas @endif</option>
<option value="@if($language != 'en') البحرين @else Bahrain @endif"> @if($language != 'en') البحرين @else Bahrain @endif</option>
<option value="@if($language != 'en') البرازيل @else Brazil @endif">@if($language != 'en') البرازيل @else Brazil @endif </option>
<option value="@if($language != 'en') البرتغال @else Portugal @endif">@if($language != 'en') البرتغال @else Portugal @endif </option>
<option value="@if($language != 'en') الجابون @else Gabon @endif"> @if($language != 'en') الجابون @else Gabon @endif</option>
<option value="@if($language != 'en') الجزائر @else Algeria @endif"> @if($language != 'en') الجزائر @else Algeria @endif</option>
<option value="@if($language != 'en') الدانمرك @else Denmark @endif"> @if($language != 'en') الدانمرك @else Denmark @endif</option>
<option value="@if($language != 'en') الرأس الأخضر @else Cape Verde @endif">@if($language != 'en') الرأس الأخضر @else Cape Verde @endif</option>
<option value="@if($language != 'en') السلفادور @else El Salvador @endif">@if($language != 'en') السلفادور @else El Salvador @endif</option>
<option value="@if($language != 'en') السنغال @else Senegal @endif">@if($language != 'en') السنغال @else Senegal @endif </option>
<option value="@if($language != 'en') السودان @else Sudan @endif"> @if($language != 'en') السودان @else Sudan @endif</option>
<option value="@if($language != 'en') السويد  @else Sweden @endif"> @if($language != 'en') السويد @else Sweden @endif</option>
<option value="@if($language != 'en') الصومال @else Somalia @endif"> @if($language != 'en') الصومال  @else Somalia @endif</option>
<option value="@if($language != 'en') الصين @else China @endif"> @if($language != 'en') الصين @else China @endif</option>
<option value="@if($language != 'en') العراق @else Iraq @endif"> @if($language != 'en') العراق @else Iraq @endif</option>
<option value="@if($language != 'en') الفاتيكان @else Vatican City  @endif"> @if($language != 'en') الفاتيكان @else Vatican City @endif</option>
<option value="@if($language != 'en') الفيلبين @else Philippines @endif"> @if($language != 'en') الفيلبين @else Philippines @endif</option>
<option value="@if($language != 'en') الكاميرون @else Cameroon @endif">@if($language != 'en') الكاميرون @else Cameroon @endif</option>
<option value="@if($language != 'en') الكونغو - برازافيل @else Congo - Brazzaville @endif">@if($language != 'en') الكونغو - برازافيل @else Congo - Brazzaville @endif</option>
<option value="@if($language != 'en') الكويت @else Kuwait @endif"> @if($language != 'en') الكويت @else Kuwait @endif</option>
<option value="@if($language != 'en') المجر @else Hungary @endif"> @if($language != 'en') المجر @else Hungary @endif</option>
<option value="@if($language != 'en') المغرب @else Morocco @endif"> @if($language != 'en') المغرب @else Morocco @endif</option>
<option value="@if($language != 'en') المكسيك @else Mexico @endif"> @if($language != 'en') المكسيك @else Mexico @endif</option>
<option value="@if($language != 'en') المملكة العربية السعودية @else Saudi Arabia @endif">@if($language != 'en') المملكة العربية السعودية @else Saudi Arabia @endif</option>
<option value="@if($language != 'en') المملكة المتحدة @else United Kingdom  @endif">@if($language != 'en') المملكة المتحدة @else United Kingdom  @endif</option>
<option value="@if($language != 'en') النرويج @else Norway @endif"> @if($language != 'en') النرويج @else Norway @endif</option>
<option value="@if($language != 'en') النمسا @else Austria @endif">@if($language != 'en') النمسا @else Austria @endif</option>
<option value="@if($language != 'en') النيجر @else Niger @endif"> @if($language != 'en') النيجر @else Niger @endif</option>
<option value="@if($language != 'en') الهند @else India @endif"> @if($language != 'en') الهند @else India @endif</option>
<option value="@if($language != 'en') الولايات المتحدة الأمريكية @else United States @endif">@if($language != 'en') الولايات المتحدة الأمريكية @else United States @endif</option>
<option value="@if($language != 'en') اليابان @else Japan @endif"> @if($language != 'en') اليابان @else Japan @endif</option>
<option value="@if($language != 'en') اليمن @else Yemen @endif"> @if($language != 'en') اليمن @else Yemen @endif</option>
<option value="@if($language != 'en') اليونان @else Greece @endif"> @if($language != 'en') اليونان @else Greece @endif</option>
<option value="@if($language != 'en') اندونيسيا @else Indonesia @endif"> @if($language != 'en') اندونيسيا @else Indonesia @endif</option>
<option value="@if($language != 'en') ايران @else Iran @endif"> @if($language != 'en') ايران @else Iran @endif</option>
<option value="@if($language != 'en') ايطاليا @else Italy @endif"> @if($language != 'en') ايطاليا @else Italy @endif</option>
<option value="@if($language != 'en') باراجواي @else Paraguay @endif">@if($language != 'en') باراجواي @else Paraguay @endif</option>
<option value="@if($language != 'en') باكستان @else Pakistan @endif"> @if($language != 'en') باكستان @else Pakistan @endif</option>
<option value="@if($language != 'en') بروناي @else Brunei @endif">@if($language != 'en') بروناي @else Brunei @endif</option>
<option value="@if($language != 'en') بلجيكا @else Belgium @endif"> @if($language != 'en') بلجيكا @else Belgium @endif</option>
<option value="@if($language != 'en') بلغاريا @else Bulgaria @endif"> @if($language != 'en') بلغاريا @else Bulgaria @endif</option>
<option value="@if($language != 'en') بنجلاديش @else Bangladesh @endif"> @if($language != 'en') بنجلاديش @else Bangladesh @endif</option>
<option value="@if($language != 'en') بنما @else Panama @endif"> @if($language != 'en') بنما @else Panama @endif</option>
<option value="@if($language != 'en') بنين @else Benin @endif"> @if($language != 'en') بنين @else Benin @endif</option>
<option value="@if($language != 'en') بوركينا فاسو @else Burkina Faso @endif">@if($language != 'en') بوركينا فاسو @else Burkina Faso @endif</option>
<option value="@if($language != 'en') بولندا @else Poland @endif">@if($language != 'en') بولندا @else Poland @endif</option>
<option value="@if($language != 'en') بوليفيا @else Bolivia @endif">@if($language != 'en') بوليفيا @else Bolivia @endif</option>
<option value="@if($language != 'en') بيرو @else Peru @endif">@if($language != 'en') بيرو @else Peru @endif</option>
<option value="@if($language != 'en') تانزانيا @else Tanzania @endif">@if($language != 'en') تانزانيا @else Tanzania @endif</option>
<option value="@if($language != 'en') تايلند @else Thailand @endif">@if($language != 'en') تايلند @else Thailand @endif</option>
<option value="@if($language != 'en') تايوان @else Taiwan @endif">@if($language != 'en') تايوان @else Taiwan @endif</option>
<option value="@if($language != 'en') تركمانستان @else Turkmenistan @endif">@if($language != 'en') تركمانستان @else Turkmenistan @endif</option>
<option value="@if($language != 'en') تركيا @else Turkey @endif"> @if($language != 'en') تركيا @else Turkey @endif</option>
<option value="@if($language != 'en') تشاد @else Chad @endif"> @if($language != 'en') تشاد @else Chad @endif</option>
<option value="@if($language != 'en') توجو @else Togo @endif"> @if($language != 'en') توجو @else Togo @endif</option>
<option value="@if($language != 'en') تونس @else Tunisia @endif">@if($language != 'en') تونس @else Tunisia @endif </option>
<option value="@if($language != 'en') جامايكا @else Jamaica @endif"> @if($language != 'en') جامايكا @else Jamaica @endif</option>
<option value="@if($language != 'en') جزر أولان @else Åland Islands @endif">@if($language != 'en') جزر أولان @else Åland Islands @endif</option>
<option value="@if($language != 'en') جزر القمر @else Comoros @endif"> @if($language != 'en') جزر القمر @else Comoros @endif</option>
<option value="@if($language != 'en') جزر الملديف @else Maldives @endif"> @if($language != 'en') جزر الملديف @else Maldives @endif</option>
<option value="@if($language != 'en') جمهورية افريقيا الوسطى @else Central African Republic @endif">@if($language != 'en') جمهورية افريقيا الوسطى @else Central African Republic @endif</option>
<option value="@if($language != 'en') جمهورية التشيك @else Czechia @endif">@if($language != 'en') جمهورية التشيك @else Czechia @endif </option>
<option value="@if($language != 'en') جمهورية الدومينيك @else Dominican Republic @endif">@if($language != 'en') جمهورية الدومينيك @else Dominican Republic @endif</option>
<option value="@if($language != 'en') جمهورية الكونغو الديمقراطية @else Congo - Kinshasa @endif">@if($language != 'en') جمهورية الكونغو الديمقراطية @else Congo - Kinshasa @endif</option>
<option value="@if($language != 'en') جمهورية جنوب افريقيا @else South Africa @endif">@if($language != 'en') جمهورية جنوب افريقيا @else South Africa @endif</option>
<option value="@if($language != 'en') جواتيمالا @else Guatemala @endif"> @if($language != 'en') جواتيمالا @else Guatemala @endif</option>
<option value="@if($language != 'en') رومانيا @else Georgia @endif">@if($language != 'en') رومانيا @else Georgia @endif</option>
<option value="@if($language != 'en') روينيون @else Djibouti @endif">@if($language != 'en') روينيون @else Djibouti @endif</option>
<option value="@if($language != 'en') جيرسي @else Jersey @endif"> @if($language != 'en') جيرسي @else Jersey @endif</option>
<option value="@if($language != 'en') دومينيكا @else Dominica @endif"> @if($language != 'en') دومينيكا @else Dominica @endif</option>
<option value="@if($language != 'en') رواندا @else Rwanda @endif">@if($language != 'en') رواندا @else Rwanda @endif</option>
<option value="@if($language != 'en') روسيا @else Russia @endif"> @if($language != 'en') روسيا @else Russia @endif</option>
<option value="@if($language != 'en') روسيا البيضاء @else Belarus @endif"> @if($language != 'en') روسيا البيضاء @else Belarus @endif</option>
<option value="@if($language != 'en') رومانيا @else Romania @endif"> @if($language != 'en') رومانيا @else Romania @endif</option>
<option value="@if($language != 'en') روينيون @else Réunion @endif"> @if($language != 'en') روينيون @else Réunion @endif</option>
<option value="@if($language != 'en')زامبيا @else Zambia @endif">@if($language != 'en')زامبيا @else Zambia @endif </option>
<option value="@if($language != 'en')زيمبابوي @else Zimbabwe @endif"> @if($language != 'en')زيمبابوي @else Zimbabwe @endif</option>
<option value="@if($language != 'en')ساحل العاج @else Côte d’Ivoire @endif">@if($language != 'en')ساحل العاج @else Côte d’Ivoire @endif</option>
<option value="@if($language != 'en')ساموا @else Samoa @endif"> @if($language != 'en')ساموا @else Samoa @endif</option>
<option value="@if($language != 'en')سان مارينو @else San Marino @endif">@if($language != 'en')سان مارينو @else San Marino @endif</option>
<option value="@if($language != 'en')سريلانكا @else Sri Lanka @endif">@if($language != 'en')سريلانكا @else Sri Lanka @endif</option>
<option value="@if($language != 'en')سلوفاكيا @else Slovakia @endif"> @if($language != 'en')سلوفاكيا @else Slovakia @endif</option>
<option value="@if($language != 'en')سلوفينيا @else Slovenia @endif"> @if($language != 'en')سلوفينيا @else Slovenia @endif</option>
<option value="@if($language != 'en')سنغافورة @else Singapore @endif"> @if($language != 'en')سنغافورة @else Singapore @endif</option>
<option value="@if($language != 'en')سوازيلاند @else Eswatini @endif"> @if($language != 'en')سوازيلاند @else Eswatini @endif</option>
<option value="@if($language != 'en')سوريا @else Syria @endif"> @if($language != 'en')سوريا @else Syria @endif</option>
<option value="@if($language != 'en')سويسرا @else Switzerland @endif"> @if($language != 'en')سويسرا @else Switzerland @endif</option>
<option value="@if($language != 'en')سيشل @else Seychelles @endif"> @if($language != 'en')سيشل @else Seychelles @endif</option>
<option value="@if($language != 'en')شيلي @else Chile @endif"> @if($language != 'en')شيلي @else Chile @endif</option>
<option value="@if($language != 'en')طاجكستان @else Tajikistan @endif"> @if($language != 'en')طاجكستان @else Tajikistan @endif</option>
<option value="@if($language != 'en')عمان @else Oman @endif"> @if($language != 'en')عمان @else Oman @endif</option>
<option value="@if($language != 'en')غامبيا @else Gambia @endif"> @if($language != 'en')غامبيا @else Gambia @endif</option>
<option value="@if($language != 'en')  @else Ghana @endif"> @if($language != 'en')  @else Ghana @endif</option>
<option value="@if($language != 'en') غينيا @else Guinea @endif"> @if($language != 'en') غينيا @else Guinea @endif</option>
<option value="@if($language != 'en') فرنسا @else France @endif"> @if($language != 'en') فرنسا @else France @endif</option>
<option value="@if($language != 'en') فلسطين @else Palestinian @endif">@if($language != 'en') فلسطين @else Palestinian @endif</option>
<option value="@if($language != 'en') فنزويلا @else Venezuela @endif"> @if($language != 'en') فنزويلا @else Venezuela @endif</option>
<option value="@if($language != 'en') فنلندا @else Finland @endif">  @if($language != 'en') فنلندا @else Finland @endif</option>
<option value="@if($language != 'en') فيتنام @else Vietnam @endif"> @if($language != 'en') فيتنام @else Vietnam @endif</option>
<option value="@if($language != 'en') فيجي @else Fiji @endif"> @if($language != 'en') فيجي @else Fiji @endif</option>
<option value="@if($language != 'en') قبرص @else Cyprus @endif"> @if($language != 'en') قبرص @else Cyprus @endif</option>
<option value="@if($language != 'en') قطر @else Qatar @endif"> @if($language != 'en') قطر @else Qatar @endif</option>
<option value="@if($language != 'en') كازاخستان @else Kazakhstan @endif"> @if($language != 'en') كازاخستان @else Kazakhstan @endif</option>
<option value="@if($language != 'en') كرواتيا @else Croatia @endif"> @if($language != 'en') كرواتيا @else Croatia @endif</option>
<option value="@if($language != 'en') كمبوديا @else Cambodia @endif">  @if($language != 'en') كمبوديا @else Cambodia @endif</option>
<option value="@if($language != 'en') كندا @else Canada @endif"> @if($language != 'en') كندا @else Canada @endif</option>
<option value="@if($language != 'en') كوبا @else Cuba @endif"> @if($language != 'en') كوبا @else Cuba @endif</option>
<option value="@if($language != 'en') كوريا الجنوبية @else South Korea @endif"> @if($language != 'en') كوريا الجنوبية @else South Korea @endif</option>
<option value="@if($language != 'en')كوريا الشمالية @else North Korea @endif"> @if($language != 'en')كوريا الشمالية @else North Korea @endif</option>
<option value="@if($language != 'en') كوستاريكا @else Costa Rica @endif">  @if($language != 'en') كوستاريكا @else Costa Rica @endif</option>
<option value="@if($language != 'en') كولومبيا @else Colombia @endif">  @if($language != 'en') كولومبيا @else Colombia @endif</option>
<option value="@if($language != 'en') كينيا @else Kenya @endif">@if($language != 'en') كينيا @else Kenya @endif</option>
<option value="@if($language != 'en') لبنان @else Lebanon @endif"> @if($language != 'en') لبنان @else Lebanon @endif</option>
<option value="@if($language != 'en') لوكسمبورج @else Luxembourg @endif"> @if($language != 'en') لوكسمبورج @else Luxembourg @endif</option>
<option value="@if($language != 'en') ليبيا @else Libya @endif"> @if($language != 'en') ليبيا @else Libya @endif</option>
<option value="@if($language != 'en') ليبيريا @else Liberia @endif"> @if($language != 'en') ليبيريا @else Liberia @endif</option>
<option value="@if($language != 'en') ليتوانيا @else Lithuania @endif"> @if($language != 'en') ليتوانيا @else Lithuania @endif</option>
<option value="@if($language != 'en') مالطا @else Malta @endif">  @if($language != 'en') مالطا @else Malta @endif</option>
<option value="@if($language != 'en') مالي @else Mali @endif"> @if($language != 'en') مالي @else Mali @endif</option>
<option value="@if($language != 'en') ماليزيا @else Malaysia @endif"> @if($language != 'en') ماليزيا @else Malaysia @endif</option>
<option value="@if($language != 'en') مدغشقر @else Madagascar @endif">@if($language != 'en') مدغشقر @else Madagascar @endif </option>
<option value="@if($language != 'en') مصر @else Egypt @endif"> @if($language != 'en') مصر @else Egypt @endif</option>
<option value="@if($language != 'en') مقدونيا @else North Macedonia  @endif">  @if($language != 'en') مقدونيا @else North Macedonia  @endif </option>
<option value="@if($language != 'en') ملاوي @else Malawi @endif">  @if($language != 'en') ملاوي @else Malawi @endif</option>
<option value="@if($language != 'en') منغوليا @else Mongolia @endif"> @if($language != 'en') منغوليا @else Mongolia @endif</option>
<option value="@if($language != 'en') موريتانيا @else Mauritania @endif"> @if($language != 'en') موريتانيا @else Mauritania @endif</option>
<option value="@if($language != 'en') موريشيوس @else Mauritania @endif"> @if($language != 'en') موريشيوس @else Mauritania @endif</option>
<option value="@if($language != 'en') موزمبيق @else Mozambique @endif"> @if($language != 'en') موزمبيق @else Mozambique @endif</option>
<option value="@if($language != 'en') موناكو @else Monaco @endif">  @if($language != 'en') موناكو @else Monaco @endif</option>
<option value="@if($language != 'en') ميانمار @else Myanmar (Burma) @endif"> @if($language != 'en') ميانمار @else Myanmar (Burma) @endif</option>
<option value="@if($language != 'en') نيبال @else Nepal @endif"> @if($language != 'en') نيبال @else Nepal @endif</option>
<option value="@if($language != 'en') نيجيريا @else Nigeria @endif">@if($language != 'en') نيجيريا @else Nigeria @endif </option>
<option value="@if($language != 'en') نيكاراجوا @else Nicaragua @endif "> @if($language != 'en') نيكاراجوا @else Nicaragua @endif </option>
<option value="@if($language != 'en')نيوزيلانداا @else New Zealand  @endif"> @if($language != 'en')نيوزيلانداا @else New Zealand  @endif</option>
<option value="@if($language != 'en')هولندا @else Netherlands  @endif"> @if($language != 'en')هولندا @else Netherlands  @endif</option>
</select>

		<div class="alert alert-danger print-error-msg3" style="display:none"></div>
	</div>
	<div class="form-group">
	 <select class="custom-select form-control"  id="country"  name="residency">
    <option value="">@if($language != 'en') بلد الإقامة   @else Country of Residence @endif</option>
	<option value="@if($language != 'en') آروبا @else Aruba @endif">@if($language != 'en') آروبا @else Aruba @endif</option>
<option value="@if($language != 'en') أذربيجان @else Azerbaijan @endif">@if($language != 'en') أذربيجان @else Azerbaijan @endif </option>
<option value="@if($language != 'en') أرمينيا @else Armenia @endif"> @if($language != 'en') أرمينيا @else Armenia @endif</option>
<option value="@if($language != 'en') أسبانيا @else Spain @endif"> @if($language != 'en') أسبانيا @else Spain @endif</option>
<option value="@if($language != 'en') أستراليا @else Australia @endif"> @if($language != 'en') أستراليا @else Australia @endif</option>
<option value="@if($language != 'en') أفغانستان @else Afghanistan @endif">@if($language != 'en') أفغانستان @else Afghanistan @endif</option>
<option value="@if($language != 'en')ألبانيا @else Albania @endif">@if($language != 'en')ألبان يا @else Albania @endif</option>
<option value="@if($language != 'en')ألمانيا @else Germany @endif">@if($language != 'en')ألمان يا @else Germany @endif </option>
<option value="@if($language != 'en') أنجولا @else Angola @endif"> @if($language != 'en') أنجو لا @else Angola @endif</option>
<option value="@if($language != 'en') أورجواي @else Uruguay @endif"> @if($language != 'en') أورجواي @else Uruguay @endif</option>
<option value="@if($language != 'en') أوزبكستان @else Uzbekistan @endif"> @if($language != 'en') أوزبكستان @else Uzbekistan @endif</option>
<option value="@if($language != 'en')  أوغندا  @else Uganda @endif"> @if($language != 'en') أوغندا  @else Uganda @endif</option>
<option value="@if($language != 'en') أوكرانيا @else Ukraine @endif"> @if($language != 'en') أوكرانيا @else Ukraine @endif</option>
<option value="@if($language != 'en') أيرلندا @else Ireland @endif"> @if($language != 'en') أيرلندا @else Ireland @endif</option>
<option value="@if($language != 'en') أيسلندا @else Iceland @endif"> @if($language != 'en') أيسلندا @else Iceland @endif</option>
<option value="@if($language != 'en') اثيوبيا @else Ethiopia @endif"> @if($language != 'en') اثيوبيا @else Ethiopia @endif</option>
<option value="@if($language != 'en') اريتريا @else Eritrea @endif"> @if($language != 'en') اريتريا @else Eritrea @endif</option>
<option value="@if($language != 'en') استونيا @else Estonia @endif"> @if($language != 'en') استونيا @else Estonia @endif</option>
<option value="@if($language != 'en') الأرجنتين @else Argentina @endif">@if($language != 'en') الأرجنتين @else Argentina @endif</option>
<option value="@if($language != 'en') الأردن  @else Jordan @endif"> @if($language != 'en')  الأردن  @else Jordan @endif</option>
<option value="@if($language != 'en') الاكوادور @else Ecuador @endif">@if($language != 'en') الاكوادور @else Ecuador @endif </option>
<option value="@if($language != 'en') الامارات العربية المتحدة @else United Arab Emirates @endif">@if($language != 'en') الامارات العربية المتحدة @else United Arab Emirates @endif</option>
<option value="@if($language != 'en') الباهاما @else Bahamas @endif"> @if($language != 'en') الباهاما @else Bahamas @endif</option>
<option value="@if($language != 'en') البحرين @else Bahrain @endif"> @if($language != 'en') البحرين @else Bahrain @endif</option>
<option value="@if($language != 'en') البرازيل @else Brazil @endif">@if($language != 'en') البرازيل @else Brazil @endif </option>
<option value="@if($language != 'en') البرتغال @else Portugal @endif">@if($language != 'en') البرتغال @else Portugal @endif </option>
<option value="@if($language != 'en') الجابون @else Gabon @endif"> @if($language != 'en') الجابون @else Gabon @endif</option>
<option value="@if($language != 'en') الجزائر @else Algeria @endif"> @if($language != 'en') الجزائر @else Algeria @endif</option>
<option value="@if($language != 'en') الدانمرك @else Denmark @endif"> @if($language != 'en') الدانمرك @else Denmark @endif</option>
<option value="@if($language != 'en') الرأس الأخضر @else Cape Verde @endif">@if($language != 'en') الرأس الأخضر @else Cape Verde @endif</option>
<option value="@if($language != 'en') السلفادور @else El Salvador @endif">@if($language != 'en') السلفادور @else El Salvador @endif</option>
<option value="@if($language != 'en') السنغال @else Senegal @endif">@if($language != 'en') السنغال @else Senegal @endif </option>
<option value="@if($language != 'en') السودان @else Sudan @endif"> @if($language != 'en') السودان @else Sudan @endif</option>
<option value="@if($language != 'en') السويد  @else Sweden @endif"> @if($language != 'en') السويد @else Sweden @endif</option>
<option value="@if($language != 'en') الصومال @else Somalia @endif"> @if($language != 'en') الصومال  @else Somalia @endif</option>
<option value="@if($language != 'en') الصين @else China @endif"> @if($language != 'en') الصين @else China @endif</option>
<option value="@if($language != 'en') العراق @else Iraq @endif"> @if($language != 'en') العراق @else Iraq @endif</option>
<option value="@if($language != 'en') الفاتيكان @else Vatican City  @endif"> @if($language != 'en') الفاتيكان @else Vatican City @endif</option>
<option value="@if($language != 'en') الفيلبين @else Philippines @endif"> @if($language != 'en') الفيلبين @else Philippines @endif</option>
<option value="@if($language != 'en') الكاميرون @else Cameroon @endif">@if($language != 'en') الكاميرون @else Cameroon @endif</option>
<option value="@if($language != 'en') الكونغو - برازافيل @else Congo - Brazzaville @endif">@if($language != 'en') الكونغو - برازافيل @else Congo - Brazzaville @endif</option>
<option value="@if($language != 'en') الكويت @else Kuwait @endif"> @if($language != 'en') الكويت @else Kuwait @endif</option>
<option value="@if($language != 'en') المجر @else Hungary @endif"> @if($language != 'en') المجر @else Hungary @endif</option>
<option value="@if($language != 'en') المغرب @else Morocco @endif"> @if($language != 'en') المغرب @else Morocco @endif</option>
<option value="@if($language != 'en') المكسيك @else Mexico @endif"> @if($language != 'en') المكسيك @else Mexico @endif</option>
<option value="@if($language != 'en') المملكة العربية السعودية @else Saudi Arabia @endif">@if($language != 'en') المملكة العربية السعودية @else Saudi Arabia @endif</option>
<option value="@if($language != 'en') المملكة المتحدة @else United Kingdom  @endif">@if($language != 'en') المملكة المتحدة @else United Kingdom  @endif</option>
<option value="@if($language != 'en') النرويج @else Norway @endif"> @if($language != 'en') النرويج @else Norway @endif</option>
<option value="@if($language != 'en') النمسا @else Austria @endif">@if($language != 'en') النمسا @else Austria @endif</option>
<option value="@if($language != 'en') النيجر @else Niger @endif"> @if($language != 'en') النيجر @else Niger @endif</option>
<option value="@if($language != 'en') الهند @else India @endif"> @if($language != 'en') الهند @else India @endif</option>
<option value="@if($language != 'en') الولايات المتحدة الأمريكية @else United States @endif">@if($language != 'en') الولايات المتحدة الأمريكية @else United States @endif</option>
<option value="@if($language != 'en') اليابان @else Japan @endif"> @if($language != 'en') اليابان @else Japan @endif</option>
<option value="@if($language != 'en') اليمن @else Yemen @endif"> @if($language != 'en') اليمن @else Yemen @endif</option>
<option value="@if($language != 'en') اليونان @else Greece @endif"> @if($language != 'en') اليونان @else Greece @endif</option>
<option value="@if($language != 'en') اندونيسيا @else Indonesia @endif"> @if($language != 'en') اندونيسيا @else Indonesia @endif</option>
<option value="@if($language != 'en') ايران @else Iran @endif"> @if($language != 'en') ايران @else Iran @endif</option>
<option value="@if($language != 'en') ايطاليا @else Italy @endif"> @if($language != 'en') ايطاليا @else Italy @endif</option>
<option value="@if($language != 'en') باراجواي @else Paraguay @endif">@if($language != 'en') باراجواي @else Paraguay @endif</option>
<option value="@if($language != 'en') باكستان @else Pakistan @endif"> @if($language != 'en') باكستان @else Pakistan @endif</option>
<option value="@if($language != 'en') بروناي @else Brunei @endif">@if($language != 'en') بروناي @else Brunei @endif</option>
<option value="@if($language != 'en') بلجيكا @else Belgium @endif"> @if($language != 'en') بلجيكا @else Belgium @endif</option>
<option value="@if($language != 'en') بلغاريا @else Bulgaria @endif"> @if($language != 'en') بلغاريا @else Bulgaria @endif</option>
<option value="@if($language != 'en') بنجلاديش @else Bangladesh @endif"> @if($language != 'en') بنجلاديش @else Bangladesh @endif</option>
<option value="@if($language != 'en') بنما @else Panama @endif"> @if($language != 'en') بنما @else Panama @endif</option>
<option value="@if($language != 'en') بنين @else Benin @endif"> @if($language != 'en') بنين @else Benin @endif</option>
<option value="@if($language != 'en') بوركينا فاسو @else Burkina Faso @endif">@if($language != 'en') بوركينا فاسو @else Burkina Faso @endif</option>
<option value="@if($language != 'en') بولندا @else Poland @endif">@if($language != 'en') بولندا @else Poland @endif</option>
<option value="@if($language != 'en') بوليفيا @else Bolivia @endif">@if($language != 'en') بوليفيا @else Bolivia @endif</option>
<option value="@if($language != 'en') بيرو @else Peru @endif">@if($language != 'en') بيرو @else Peru @endif</option>
<option value="@if($language != 'en') تانزانيا @else Tanzania @endif">@if($language != 'en') تانزانيا @else Tanzania @endif</option>
<option value="@if($language != 'en') تايلند @else Thailand @endif">@if($language != 'en') تايلند @else Thailand @endif</option>
<option value="@if($language != 'en') تايوان @else Taiwan @endif">@if($language != 'en') تايوان @else Taiwan @endif</option>
<option value="@if($language != 'en') تركمانستان @else Turkmenistan @endif">@if($language != 'en') تركمانستان @else Turkmenistan @endif</option>
<option value="@if($language != 'en') تركيا @else Turkey @endif"> @if($language != 'en') تركيا @else Turkey @endif</option>
<option value="@if($language != 'en') تشاد @else Chad @endif"> @if($language != 'en') تشاد @else Chad @endif</option>
<option value="@if($language != 'en') توجو @else Togo @endif"> @if($language != 'en') توجو @else Togo @endif</option>
<option value="@if($language != 'en') تونس @else Tunisia @endif">@if($language != 'en') تونس @else Tunisia @endif </option>
<option value="@if($language != 'en') جامايكا @else Jamaica @endif"> @if($language != 'en') جامايكا @else Jamaica @endif</option>
<option value="@if($language != 'en') جزر أولان @else Åland Islands @endif">@if($language != 'en') جزر أولان @else Åland Islands @endif</option>
<option value="@if($language != 'en') جزر القمر @else Comoros @endif"> @if($language != 'en') جزر القمر @else Comoros @endif</option>
<option value="@if($language != 'en') جزر الملديف @else Maldives @endif"> @if($language != 'en') جزر الملديف @else Maldives @endif</option>
<option value="@if($language != 'en') جمهورية افريقيا الوسطى @else Central African Republic @endif">@if($language != 'en') جمهورية افريقيا الوسطى @else Central African Republic @endif</option>
<option value="@if($language != 'en') جمهورية التشيك @else Czechia @endif">@if($language != 'en') جمهورية التشيك @else Czechia @endif </option>
<option value="@if($language != 'en') جمهورية الدومينيك @else Dominican Republic @endif">@if($language != 'en') جمهورية الدومينيك @else Dominican Republic @endif</option>
<option value="@if($language != 'en') جمهورية الكونغو الديمقراطية @else Congo - Kinshasa @endif">@if($language != 'en') جمهورية الكونغو الديمقراطية @else Congo - Kinshasa @endif</option>
<option value="@if($language != 'en') جمهورية جنوب افريقيا @else South Africa @endif">@if($language != 'en') جمهورية جنوب افريقيا @else South Africa @endif</option>
<option value="@if($language != 'en') جواتيمالا @else Guatemala @endif"> @if($language != 'en') جواتيمالا @else Guatemala @endif</option>
<option value="@if($language != 'en') رومانيا @else Georgia @endif">@if($language != 'en') رومانيا @else Georgia @endif</option>
<option value="@if($language != 'en') روينيون @else Djibouti @endif">@if($language != 'en') روينيون @else Djibouti @endif</option>
<option value="@if($language != 'en') جيرسي @else Jersey @endif"> @if($language != 'en') جيرسي @else Jersey @endif</option>
<option value="@if($language != 'en') دومينيكا @else Dominica @endif"> @if($language != 'en') دومينيكا @else Dominica @endif</option>
<option value="@if($language != 'en') رواندا @else Rwanda @endif">@if($language != 'en') رواندا @else Rwanda @endif</option>
<option value="@if($language != 'en') روسيا @else Russia @endif"> @if($language != 'en') روسيا @else Russia @endif</option>
<option value="@if($language != 'en') روسيا البيضاء @else Belarus @endif"> @if($language != 'en') روسيا البيضاء @else Belarus @endif</option>
<option value="@if($language != 'en') رومانيا @else Romania @endif"> @if($language != 'en') رومانيا @else Romania @endif</option>
<option value="@if($language != 'en') روينيون @else Réunion @endif"> @if($language != 'en') روينيون @else Réunion @endif</option>
<option value="@if($language != 'en')زامبيا @else Zambia @endif">@if($language != 'en')زامبيا @else Zambia @endif </option>
<option value="@if($language != 'en')زيمبابوي @else Zimbabwe @endif"> @if($language != 'en')زيمبابوي @else Zimbabwe @endif</option>
<option value="@if($language != 'en')ساحل العاج @else Côte d’Ivoire @endif">@if($language != 'en')ساحل العاج @else Côte d’Ivoire @endif</option>
<option value="@if($language != 'en')ساموا @else Samoa @endif"> @if($language != 'en')ساموا @else Samoa @endif</option>
<option value="@if($language != 'en')سان مارينو @else San Marino @endif">@if($language != 'en')سان مارينو @else San Marino @endif</option>
<option value="@if($language != 'en')سريلانكا @else Sri Lanka @endif">@if($language != 'en')سريلانكا @else Sri Lanka @endif</option>
<option value="@if($language != 'en')سلوفاكيا @else Slovakia @endif"> @if($language != 'en')سلوفاكيا @else Slovakia @endif</option>
<option value="@if($language != 'en')سلوفينيا @else Slovenia @endif"> @if($language != 'en')سلوفينيا @else Slovenia @endif</option>
<option value="@if($language != 'en')سنغافورة @else Singapore @endif"> @if($language != 'en')سنغافورة @else Singapore @endif</option>
<option value="@if($language != 'en')سوازيلاند @else Eswatini @endif"> @if($language != 'en')سوازيلاند @else Eswatini @endif</option>
<option value="@if($language != 'en')سوريا @else Syria @endif"> @if($language != 'en')سوريا @else Syria @endif</option>
<option value="@if($language != 'en')سويسرا @else Switzerland @endif"> @if($language != 'en')سويسرا @else Switzerland @endif</option>
<option value="@if($language != 'en')سيشل @else Seychelles @endif"> @if($language != 'en')سيشل @else Seychelles @endif</option>
<option value="@if($language != 'en')شيلي @else Chile @endif"> @if($language != 'en')شيلي @else Chile @endif</option>
<option value="@if($language != 'en')طاجكستان @else Tajikistan @endif"> @if($language != 'en')طاجكستان @else Tajikistan @endif</option>
<option value="@if($language != 'en')عمان @else Oman @endif"> @if($language != 'en')عمان @else Oman @endif</option>
<option value="@if($language != 'en')غامبيا @else Gambia @endif"> @if($language != 'en')غامبيا @else Gambia @endif</option>
<option value="@if($language != 'en')  @else Ghana @endif"> @if($language != 'en')  @else Ghana @endif</option>
<option value="@if($language != 'en') غينيا @else Guinea @endif"> @if($language != 'en') غينيا @else Guinea @endif</option>
<option value="@if($language != 'en') فرنسا @else France @endif"> @if($language != 'en') فرنسا @else France @endif</option>
<option value="@if($language != 'en') فلسطين @else Palestinian @endif">@if($language != 'en') فلسطين @else Palestinian @endif</option>
<option value="@if($language != 'en') فنزويلا @else Venezuela @endif"> @if($language != 'en') فنزويلا @else Venezuela @endif</option>
<option value="@if($language != 'en') فنلندا @else Finland @endif">  @if($language != 'en') فنلندا @else Finland @endif</option>
<option value="@if($language != 'en') فيتنام @else Vietnam @endif"> @if($language != 'en') فيتنام @else Vietnam @endif</option>
<option value="@if($language != 'en') فيجي @else Fiji @endif"> @if($language != 'en') فيجي @else Fiji @endif</option>
<option value="@if($language != 'en') قبرص @else Cyprus @endif"> @if($language != 'en') قبرص @else Cyprus @endif</option>
<option value="@if($language != 'en') قطر @else Qatar @endif"> @if($language != 'en') قطر @else Qatar @endif</option>
<option value="@if($language != 'en') كازاخستان @else Kazakhstan @endif"> @if($language != 'en') كازاخستان @else Kazakhstan @endif</option>
<option value="@if($language != 'en') كرواتيا @else Croatia @endif"> @if($language != 'en') كرواتيا @else Croatia @endif</option>
<option value="@if($language != 'en') كمبوديا @else Cambodia @endif">  @if($language != 'en') كمبوديا @else Cambodia @endif</option>
<option value="@if($language != 'en') كندا @else Canada @endif"> @if($language != 'en') كندا @else Canada @endif</option>
<option value="@if($language != 'en') كوبا @else Cuba @endif"> @if($language != 'en') كوبا @else Cuba @endif</option>
<option value="@if($language != 'en') كوريا الجنوبية @else South Korea @endif"> @if($language != 'en') كوريا الجنوبية @else South Korea @endif</option>
<option value="@if($language != 'en')كوريا الشمالية @else North Korea @endif"> @if($language != 'en')كوريا الشمالية @else North Korea @endif</option>
<option value="@if($language != 'en') كوستاريكا @else Costa Rica @endif">  @if($language != 'en') كوستاريكا @else Costa Rica @endif</option>
<option value="@if($language != 'en') كولومبيا @else Colombia @endif">  @if($language != 'en') كولومبيا @else Colombia @endif</option>
<option value="@if($language != 'en') كينيا @else Kenya @endif">@if($language != 'en') كينيا @else Kenya @endif</option>
<option value="@if($language != 'en') لبنان @else Lebanon @endif"> @if($language != 'en') لبنان @else Lebanon @endif</option>
<option value="@if($language != 'en') لوكسمبورج @else Luxembourg @endif"> @if($language != 'en') لوكسمبورج @else Luxembourg @endif</option>
<option value="@if($language != 'en') ليبيا @else Libya @endif"> @if($language != 'en') ليبيا @else Libya @endif</option>
<option value="@if($language != 'en') ليبيريا @else Liberia @endif"> @if($language != 'en') ليبيريا @else Liberia @endif</option>
<option value="@if($language != 'en') ليتوانيا @else Lithuania @endif"> @if($language != 'en') ليتوانيا @else Lithuania @endif</option>
<option value="@if($language != 'en') مالطا @else Malta @endif">  @if($language != 'en') مالطا @else Malta @endif</option>
<option value="@if($language != 'en') مالي @else Mali @endif"> @if($language != 'en') مالي @else Mali @endif</option>
<option value="@if($language != 'en') ماليزيا @else Malaysia @endif"> @if($language != 'en') ماليزيا @else Malaysia @endif</option>
<option value="@if($language != 'en') مدغشقر @else Madagascar @endif">@if($language != 'en') مدغشقر @else Madagascar @endif </option>
<option value="@if($language != 'en') مصر @else Egypt @endif"> @if($language != 'en') مصر @else Egypt @endif</option>
<option value="@if($language != 'en') مقدونيا @else North Macedonia  @endif">  @if($language != 'en') مقدونيا @else North Macedonia  @endif </option>
<option value="@if($language != 'en') ملاوي @else Malawi @endif">  @if($language != 'en') ملاوي @else Malawi @endif</option>
<option value="@if($language != 'en') منغوليا @else Mongolia @endif"> @if($language != 'en') منغوليا @else Mongolia @endif</option>
<option value="@if($language != 'en') موريتانيا @else Mauritania @endif"> @if($language != 'en') موريتانيا @else Mauritania @endif</option>
<option value="@if($language != 'en') موريشيوس @else Mauritania @endif"> @if($language != 'en') موريشيوس @else Mauritania @endif</option>
<option value="@if($language != 'en') موزمبيق @else Mozambique @endif"> @if($language != 'en') موزمبيق @else Mozambique @endif</option>
<option value="@if($language != 'en') موناكو @else Monaco @endif">  @if($language != 'en') موناكو @else Monaco @endif</option>
<option value="@if($language != 'en') ميانمار @else Myanmar (Burma) @endif"> @if($language != 'en') ميانمار @else Myanmar (Burma) @endif</option>
<option value="@if($language != 'en') نيبال @else Nepal @endif"> @if($language != 'en') نيبال @else Nepal @endif</option>
<option value="@if($language != 'en') نيجيريا @else Nigeria @endif">@if($language != 'en') نيجيريا @else Nigeria @endif </option>
<option value="@if($language != 'en') نيكاراجوا @else Nicaragua @endif "> @if($language != 'en') نيكاراجوا @else Nicaragua @endif </option>
<option value="@if($language != 'en')نيوزيلانداا @else New Zealand  @endif"> @if($language != 'en')نيوزيلانداا @else New Zealand  @endif</option>
<option value="@if($language != 'en')هولندا @else Netherlands  @endif"> @if($language != 'en')هولندا @else Netherlands  @endif</option>

   </select>
		<div class="alert alert-danger print-error-msg4" style="display:none"></div>

	</div>
	<div class="form-group">
		<input  type="text" id="inputMobile" class="form-control" name="number" placeholder="@if($language != 'en') رقم الهاتف    @else Phone Number @endif" required>
		<div class="alert alert-danger print-error-msg5" style="display:none"></div>
	</div>

	<div class="form-group">
		<input  type="file" id="resumes" class="form-control" name="resumes" placeholder="@if($language != 'en') Upload Resume  @else Upload Resume @endif" accept=".doc, .docx,.ppt, .pptx,.txt,.pdf" required>
		<div class="alert alert-danger print-error-msg6" style="display:none"></div>
	</div>
	<div class="container">
	    <div id="recaptcha"></div>
	</div>
		<div class="alert alert-danger print-error-capcha" style="display:none"></div>



	<div class="form-group">
    <a href="#" class="btn btn-primary submitsave"> @if($language == 'ar') إرسال  @else Submit @endif</a>	</div>
</form>
</div>
</div>
</div>
</section>
@include('layouts.needadoctorsingle')
  </div>
</section>
@endsection
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@section('script')
<script type="text/javascript">

function createRecaptcha() {
	grecaptcha.render("recaptcha", {sitekey: "6LedksUUAAAAAJQ9DE5OUZEkmzagIsnM_ho6aC9r", theme: "light"});
}
 createRecaptcha();

//save_contactus
$(document).ready(function(){
$(".submitsave").click(function(e){
$(".alert-danger").css('display','none');
        	$('#overlay').fadeIn();
		// Get form
		var form = $('#testimonialForm')[0];
		// Create an FormData object
		var data = new FormData(form);
		var url = $("#testimonialForm").attr('action');

	     	$(this).prop("disabled", true);
    		if(grecaptcha.getResponse() == "") {
              	 $(".print-error-capcha").css('display','block');
    			 $(".print-error-capcha").empty().append('reCAPTCHA is mandatory');
    			 $('#overlay').fadeOut();
    	         return false;
              }

		$.ajax({
			url: url,
			type: 'POST',
			enctype: 'multipart/form-data',
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			success: function(data) {
			    $('#overlay').fadeOut();
			      	if($.isEmptyObject(data.error)){
			    		 $(".suvessmessage").css('display','block');
                    $(".appendsucess").append(data.success);
                     $('#testimonialForm')[0].reset();
                     $('html, body').animate({ scrollTop: 0 }, 0);
                    }else{
                        $('#overlay').fadeOut();
                    	$(".alert-danger").empty().css('display','none');
                        printErrorMsg(data.error);
                    }
		    	}
		});

	});



   function printErrorMsg (msg) {

            if(msg['job']){
            $(".print-error-msg").css('display','block');
            $(".print-error-msg").empty().append(msg['job']);
            }
            if(msg['name']){
            $(".print-error-msg1").css('display','block');
            $(".print-error-msg1").empty().append(msg['name']);
            }
             if(msg['email']){
             $(".print-error-msg2").css('display','block');
             $(".print-error-msg2").empty().append(msg['email']);
            }
              if(msg['nationality']){
              $(".print-error-msg3").css('display','block');
              $(".print-error-msg3").empty().append(msg['nationality']);
            }
             if(msg['residency']){
              $(".print-error-msg4").css('display','block');
              $(".print-error-msg4").empty().append(msg['residency']);
            }
            if(msg['number']){
              $(".print-error-msg5").css('display','block');
              $(".print-error-msg5").empty().append(msg['number']);
            }

             if(msg['resume']){
              $(".print-error-msg6").css('display','block');
              $(".print-error-msg6").empty().append(msg['resume']);
            }

        }

       });

setTimeout(function() {
    $('.pj').fadeOut('fast');
}, 1000);

</script>



@endsection
