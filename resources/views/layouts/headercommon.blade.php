<section class="find-doctor find-doctors eye-block eye-block-bg">
  <div class="container">
    <div class="banner-in">
      <div class="banner-left">
        <h1 class="text-fff"><?php
         if(!empty($title)){
            echo $title;
         }
       ?></h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}">{!!($language == "en")?"Home":"الصفحة الرئيسية"!!}</a></li>
            <li class="breadcrumb-item active text-fff" aria-current="page"><?php
             if(!empty($title)){
                echo $title;
             }
           ?></li>
          </ol>
        </nav>
      </div>
      <div class="banner-right">
          @include('layouts.buttons')
        <!-- <ul>
          <li>
            <a href="#" style="font-size: 13px;" class="decrease">A-</a>
          </li>
          <li>
            <a href="#" style="font-size: 16px;" class="resetMe">A</a>
          </li>
          <li>
            <a href="#" class="increase">A+</a>
          </li>
          <li>
            <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
          </li>
          <li>
            <a href="#" class="printPage"><i class="fa fa-print" aria-hidden="true"></i></a>
          </li>
        </ul> -->
      </div>
    </div>
  </div>
  @include('layouts.squarebox')

</section>
