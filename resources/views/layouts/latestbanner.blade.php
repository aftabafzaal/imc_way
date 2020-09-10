<section class="find-doctor find-doctors eye-block eye-block-bg">
  <div class="container">
    <div class="banner-in">
      <div class="banner-left">
        <h1 class="text-fff">{!!($language == "en")?ucfirst($getpage['name_en']):ucfirst($getpage['name_ar'])!!}
         </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}">{!!($language == "en")?"Home":"الصفحة الرئيسية"!!}</a></li>
            <li class="breadcrumb-item active text-fff" aria-current="page"><a  class="text-fff" href="{{Config::get('variable.URL_LINK')}}/about-us">{!!($language == "en")?ucfirst($basedata['title_en']):ucfirst($basedata['title_ar'])!!}</a></li>
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
