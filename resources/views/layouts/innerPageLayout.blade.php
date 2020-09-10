@php
	$url2=Request::segment(1);
	if(	$url2 == "en"){
		$language='en';
	}elseif($url2 == "ar"){
			$language='ar';
	}else{
		$language='en';
	}
	@endphp
<section class="find-doctor find-doctors eye-block eye-block-bg">
  <div class="container">
    <div class="banner-in">
      <div class="banner-left">
        <h1 class="text-fff">{!!($language == "en")?ucfirst($getpage['name_en']):ucfirst($getpage['name_ar'])!!}
         </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}">{!!($language == "en")?"Home":"الصفحة الرئيسية"!!}</a></li>
              <?php
              if(!empty($basedata)){
                ?>
             <li class="breadcrumb-item active text-fff" aria-current="page">   <a class="text-fff" href="{{Config::get('variable.URL_LINK')}}{{$url}}"> {!!($language == "en")?ucfirst($basedata['name_en']):ucfirst($basedata['name_ar'])!!}</a>
                <?php
               }
              ?>
            <li class="breadcrumb-item active text-fff" aria-current="page"> {!!($language == "en")?ucfirst($getpage['name_en']):ucfirst($getpage['name_ar'])!!}
          </li>
          </ol>
        </nav>
      </div>
      @include('layouts.buttons')
    </div>
  </div>
  @include('layouts.squarebox')
</section>
