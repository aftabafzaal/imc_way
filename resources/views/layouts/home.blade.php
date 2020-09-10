<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="ahrefs-site-verification" content="2b4cc9a1039d9fb3633eee59043859334bd08a0085e7203cf5912e1785161532">
        @include('layouts.meta')
        <link rel="shortcut icon" href="{{env('BASE_URL')}}assets/images/favicon.ico" type="{{env('BASE_URL')}}assets/images/favicon.icon" />
        <!--google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Hind|Lato|Montserrat|Open+Sans+Condensed:300|Poppins|Roboto&display=swap" rel="stylesheet" defer>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{env('BASE_URL')}}assets/font-awesome/css/font-awesome.css" defer>
        <link rel="stylesheet" href="{{env('BASE_URL')}}assets/font/stylesheet.css">
        <link rel="stylesheet" href="{{env('BASE_URL')}}assets/css/owl.theme.default.css">
        <link rel="stylesheet" href="{{env('BASE_URL')}}assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{env('BASE_URL')}}assets/css/animate.min.css">
        <link rel="stylesheet" href="{{env('BASE_URL')}}assets/css/hover.min.css" defer async>
        <link rel="stylesheet" href="{{env('BASE_URL')}}assets/css/hamburgers.css" defer async>
        <link rel="stylesheet" href="{{env('BASE_URL')}}assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{env('BASE_URL')}}assets/css/style.css">
        <link rel="stylesheet" href="{{env('BASE_URL')}}assets/css/responsive.css">
        <link rel="stylesheet" href="{{env('BASE_URL')}}assets/css/calender.css" defer>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" defer />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" defer></script>
        @include('layouts.googleanalytics')

        <style>
            body{
                padding: 0!important;
            }
            .st-custom-button[data-network] {
                background-color: #0adeff;
                display: inline-block;
                padding: 5px 10px;
                cursor: pointer;
                font-weight: bold;
                color: #fff;

                &:hover, &:focus {
                    text-decoration: underline;
                    background-color: #00c7ff;
                }


                /* sticky footer / By Amani */
                @media (min-width: 768px) { .footer-sticky{display:none !important;visibility: hidden;}}
                @media (max-width: 768px)
                    {
                    .footer-sticky{
                        position:fixed;
                        padding-bottom:0px;
                        bottom:0px;
                        display:none;
                        z-index:1000;
                        width:100%;
                        color:#FFF;
                    }
                    .downloadapp:hover {
                        background-color: #3e8e41;
                    }}
                .footer-sticky .box-1{width: 50%;background-color: #ac0a58;padding: 15px 0px 10px;margin: 0;text-align: left;}
                .footer-sticky .icon{width: 40%;float: left;text-align: right;padding: 0;}
                .footer-sticky a{display:block;color:#FFF}
                .footer-sticky a:hover{background-color:#005a9c !important;}
                .footer-sticky .box-2{width: 50%;background-color: #009b41;padding: 15px 0px 10px;margin: 0;text-align: left;  }
                .footer-sticky .fa-calendar
                {font-size: 30px; padding-right: 10px; color:#FFF;text-align: right;padding-top:3px}
                .footer-sticky .fa-mobile{font-size: 44px; padding-right: 10px; color:#FFF;text-align: right;margin-top:-3px;}
                .footer-sticky .heading{width: 60%;float: left;padding-left: 0;}
                .footer-sticky .heading span{text-align:center;pading-top:5px;color:#FFF;}
                .lang-arabic .footer-sticky .heading
                {width: 60%;float: right;padding-right: 0;}
                .lang-arabic .footer-sticky .fa-mobile
                {font-size: 44px; padding-left: 10px; color:#FFF;text-align: left;margin-top: 2px;}
                .lang-arabic .footer-sticky .fa-calendar
                {font-size: 30px; padding-left: 10px; color:#FFF;text-align: left;padding-top:3px;margin-top: 5px;}
                .lang-arabic .footer-sticky .box-2{width: 50%;background-color: #009b41;padding: 5px 0px 2px;margin: 0;text-align: right;  }
                .lang-arabic .footer-sticky .icon{width: 40%;float: right;text-align: left;padding: 0;}
                .lang-arabic .footer-sticky .box-1{width: 50%;background-color: #ac0a58;padding: 5px 0px 2px;margin: 0;text-align: right;  }
                /* End-sticky footer / By Amani */

            </style>

            <!-- wrapper ends here-->
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->

            <script src="{{env('BASE_URL')}}assets/js/jquery.min.js"></script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="{{env('BASE_URL')}}assets/js/custom.js"></script>
            <!-- jQuery library -->
            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
            <script src="{{env('BASE_URL')}}assets/js/bootstrap-datetimepicker.js"></script>
            <script src="{{env('BASE_URL')}}assets/js/owl.carousel.js"></script>
            <script src="{{env('BASE_URL')}}assets/js/wow.js" defer></script>

            <?php
            $url = Request::segment(1);
            if ($url == "en") {
                ?>
                <script src="{{env('BASE_URL')}}assets/js/jquery.hislide.js"></script>
                <?php
            } elseif ($url == "ar") {
                ?>
                <script src="{{env('BASE_URL')}}assets/js/arabic_jquery.hislide.js"></script>
                <?php
            } else {
                ?>
                <script src="{{env('BASE_URL')}}assets/js/jquery.hislide.js"></script>
                <?php
            }
            ?>
        </head>

        @php
        use App\Helpers;
        $helper = new Helpers();
        $logo =$helper->getlogo();
        $rightbars = $helper->getRightBars();
        $url=Request::segment(1);
        if(	$url == "en"){
        $language='en';
        }elseif($url == "ar"){
        $language='ar';
        }else{
        $language='en';
        }
        app()->setLocale($language);
        @endphp
        <?php
        if ($language != "en") {
            echo "<body class='lang-arabic'>";
        } else {
            echo "<body>";
        }
        ?>
        <?php
        $base = Config::get('variable.URL_LINK');
        ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXXLSPD"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
                          <!-- End Google Tag Manager (noscript) -->
                          <input type ="hidden"  class="base" value="<?php echo $base; ?>">
                          <!-- wrapper start here-->
                          <div class="wrapper">
                              <div class="header-toprowin1">
                                  <div class="header-toprow bg-green pad-8">
                                      <div class="container">
                                          <div class="row-flex">
                                              <ul class="left-ul">
                                                  <div class="btn-appointment mr-3 mobile-show">
                                                      <a href="{{env('imc_portal')}}"  target="_blank">{{($language == "en")?"Request an Appointment":"حجز موعد"}}</a>
                                                  </div>
                                                  <?php
                                                  $gettopmenu = $helper->gettopmenu();
                                                  $getmiddlemenu = $helper->getmiddlemenu();
                                                  $getMenu = $helper->getMenu();
                                                  ?>
                                                  @if(!empty($gettopmenu)) <!--checks if the fourth topmenu item is empty -->
                                                  @foreach($gettopmenu as $values) <!--if not empty loop to get fourth value-->
                                                  @php
                                                  $link = "";
                                                  if($values->type == 1){
                                                  $link = $values->link;
                                                  }else if($values->type == 2 && !empty($values->page_id)){
                                                  $link = $helper->getPageUrl($values->page_id);
                                                  }
                                                  if($values->target_blank == "Yes"){
                                                  $blank="_blank";
                                                  }else{
                                                  $blank="";
                                                  }
                                                  @endphp
                                                  <li>
                                                      <a href="{{$link}}" target="{{$blank}}"><i class="{{$values->icon}}" aria-hidden="true"></i>
                                                          <span>{{($language == "en")?$values->title_en:$values->title_ar}}
                                                          </span></a>
                                                  </li>
                                                  @endforeach<!--end of fourth loop-->
                                                  @endif <!--End of empty check -->
                                              </ul>

                                              <ul class="scroll-show-icon">
                                                  @if(!empty($getmiddlemenu)) <!--checks if the fourth topmenu item is empty -->
                                                  @foreach($getmiddlemenu as $getmiddlemenu_) <!--if not empty loop to get fourth value-->
                                                  <li>
                                                      <a href="{{$getmiddlemenu_->link}}" target="_blank"><i class="{{$getmiddlemenu_->icon}}" aria-hidden="true"></i></a>
                                                  </li>
                                                  @endforeach
                                                  @endif
                                              </ul>
                                              <div class="select-header-lang">
                                                  <?php
                                                  $url = Request::segment(1);
                                                  if ($url == "en") {
                                                      $url = str_replace("/en", "/ar", Request::url());
                                                      ?>
                                                      <a href={{$url}}>العربية</a>
                                                      <?php
                                                  } elseif ($url == "ar") {
                                                      $url = str_replace("/ar", "/en", Request::url());
                                                      ?>
                                                      <a href={{$url}}>English</a>
                                                      <?php
                                                  } else {
                                                      if (Request::segment(1) != null) {
                                                          $url = str_replace(Request::segment(1), "ar/" . Request::segment(1), Request::url());
                                                      } else {
                                                          $url = Request::url() . "/ar/";
                                                      }
                                                      ?>
                                                      <a href={{$url}}>العربية</a>
                                                      <?php
                                                  }
                                                  ?>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- header-toprow start here-->
                                  <div class="header-toprow">
                                      <div class="container">
                                          <div class="header-toprowin">
                                              <nav class="navbar navbar-expand-lg navbar-light">
                                                  <div class="nav-flex">
                                                      @if(!empty ($Settings)) <!--checks if settings data is set-->
                                                      @foreach($Settings as $Settings_) <!--Setting data contain top logo data-->
                                                      <a class="navbar-brand pr-5" href="{{ Config::get('variable.URL_LINK')}}" title="{{ __('messages.logo_title') }}">
                                                          <img src="{{$logo}}" alt="{{ __('messages.logo_attribute') }}">
                                                      </a>
                                                      @endforeach <!--end of Setting loop-->
                                                      @endif <!--End of Setting check-->

                                                      <div class="hamburger"  onclick="openNav()">
                                                          <div class="hamburger-box">
                                                              <div class="hamburger-inner"></div>
                                                          </div>
                                                      </div>

                                                  </div>
                                                  <div class="header-right">
                                                      <div class="btn-appointment mr-3">
                                                          <a href="{{env('imc_portal')}}"  target="_blank">{{($language == "en")?"Request an Appointment":"حجز موعد"}}</a>
                                                      </div>
                                                      <form action="{{Config::get('variable.URL_LINK')}}search" method="GET">
                                                          <div class="input-box">
                                                              <input name="searchText" class="search-box" placeholder="{{($language == "en")?"Search":"بحث"}}" required>
                                                              <input type="hidden" name="lng" value="{{$language}}"/>
                                                              <button type="submit"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                                                          </div>
                                                      </form>
                                                      <ul>
                                                          @if(!empty($getmiddlemenu)) <!--checks if the fourth topmenu item is empty -->
                                                          @foreach($getmiddlemenu as $getmiddlemenu_) <!--if not empty loop to get fourth value-->
                                                          @php
                                                          $link = $getmiddlemenu_->link;
                                                          @endphp
                                                          <li>
                                                              <a href="{{$link}}" target="_blank"><i class="{{$getmiddlemenu_->icon}}" aria-hidden="true"></i></a>
                                                          </li>
                                                          @endforeach
                                                          @endif
                                                      </ul>
                                                  </div>
                                                  <div class="row-flex">
                                                      <ul class="left-ul">
                                                          @if(!empty($gettopmenu)) <!--checks if the fourth topmenu item is empty -->
                                                          @foreach($gettopmenu as $values) <!--if not empty loop to get fourth value-->
                                                          @php
                                                          $link = "";
                                                          if($values->type == 1){
                                                          $link = $values->link;
                                                          }else if($values->type == 2 && !empty($values->page_id)){
                                                          $link = $helper->getPageUrl($values->page_id);
                                                          }
                                                          if($values->target_blank == "Yes"){
                                                          $blank="_blank";
                                                          }else{
                                                          $blank="";
                                                          }
                                                          @endphp
                                                          <li>
                                                              <a href="{{$link}}" target="{{$blank}}"><i class="{{$values->icon}}" aria-hidden="true"></i>
                                                                  <span> {{($language == "en")?$values->title_en:$values->title_ar}}</span></a>
                                                          </li>
                                                          @endforeach<!--end of fourth loop-->
                                                          @endif <!--End of empty check -->
                                                      </ul>

                                                      <div class="select-header-lang">
                                                          <?php
                                                          $url = Request::segment(1);
                                                          if ($url == "en") {
                                                              $url = str_replace("/en", "/ar", Request::url());
                                                              ?>
                                                              <a href={{$url}}>العربية</a>
                                                              <?php
                                                          } elseif ($url == "ar") {
                                                              $url = str_replace("/ar", "/en", Request::url());
                                                              ?>
                                                              <a href={{$url}}>English</a>
                                                              <?php
                                                          } else {
                                                              if (Request::segment(1) != null) {
                                                                  $url = str_replace(Request::segment(1), "ar/" . Request::segment(1), Request::url());
                                                              } else {
                                                                  $url = Request::url() . "/ar/";
                                                              }
                                                              ?>
                                                              <a href={{$url}}>العربية</a>
                                                              <?php
                                                          }
                                                          ?>
                                                      </div>
                                                  </div>
                                              </nav>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- header-toprow ends here-->

                                  <div class="menu-header">
                                      <div class="container">
                                          <nav class="navbar navbar-expand-lg navbar-light">
                                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                  <ul class="navbar-nav ml-auto ">

                                                      @if(!empty ($Mainmenu_1)) <!--Check if the first main menu has data-->
                                                      @foreach($Mainmenu_1 as $Mainmenu_1_)
                                                      @php
                                                      $link = "";
                                                      if($Mainmenu_1_->type == 1){
                                                      $link = $Mainmenu_1_->link;
                                                      }else if($Mainmenu_1_->type == 2 && !empty($Mainmenu_1_->page_id)){
                                                      $link = $helper->getPageUrl($Mainmenu_1_->page_id);
                                                      }


                                                      @endphp
                                                      <li class="nav-item">
                                                          <a class="nav-link <?php if (Request::url() == url('about-us') || Request::url() == url('awards-and-accreditations') || Request::url() == url('show-leaderships') || Request::url() == url('mayoclinic') || Request::url() == url('history') || Request::url() == url('leadership-messages') || Request::url() == url('medical-services') || Request::url() == url('/')) {
                                                              echo 'active';
                                                          } ?>" href="{{$link}}">
                                                              {{($language == "en")?$Mainmenu_1_->title_en:$Mainmenu_1_->title_ar}}
                                                          </a>
                                                          <ul class="nav-submenu">
                                                              <div class="row"> <!--this conatins the first main menu sub menu-->
                                                                  @if(!empty ($Mainmenu_1_sub)) <!--checks if first main menu sub menu has data-->
                                                                  @foreach($Mainmenu_1_sub as $Mainmenu_1_sub_)
                                                                  @php
                                                                  $link = "";
                                                                  if($Mainmenu_1_sub_->type == 1){
                                                                  $link = $Mainmenu_1_sub_->link;
                                                                  }else if($Mainmenu_1_sub_->type == 2 && !empty($Mainmenu_1_sub_->page_id)){
                                                                  $link = $helper->getPageUrl($Mainmenu_1_sub_->page_id);
                                                                  }
                                                                  if($Mainmenu_1_sub_->target_blank == "Yes"){
                                                                  $blank="_blank";
                                                                  }else{
                                                                  $blank="";
                                                                  }
                                                                  @endphp
                                                                  <div class="col-md-6">
                                                                      <li>
                                                                          <a href="{{$link}}" target="{{$blank}}">
                                                                              <span>
                                                                                  {{($language == "en")?$Mainmenu_1_sub_->title_en:$Mainmenu_1_sub_->title_ar}}
                                                                              </span>
                                                                          </a>
                                                                      </li>
                                                                  </div>
                                                                  @endforeach
                                                                  @endif <!--If no data on first main menu, sub menu then nothing shown-->
                                                              </div>
                                                          </ul>
                                                      </li>
                                                      @endforeach
                                                      @endif<!--If no data on first main menu then sub menu is not shown for it-->
                                                      @if(!empty ($Mainmenu_2)) <!--checks if second main menu has data-->
                                                      @foreach($Mainmenu_2 as $Mainmenu_2_)
                                                      @php
                                                      $link = "";
                                                      if($Mainmenu_2_->type == 1){
                                                      $link = $Mainmenu_2_->link;
                                                      }else if($Mainmenu_2_->type == 2 && !empty($Mainmenu_2_->page_id)){
                                                      $link = $helper->getPageUrl($Mainmenu_2_->page_id);
                                                      }

                                                      @endphp
                                                      <li class="nav-item ">
                                                          <a class="nav-link <?php if (Request::url() == url('testimonial') || Request::url() == url('location') || Request::url() == url('visitor') || Request::url() == url('patientright') || Request::url() == url('stayingimc') || Request::url() == url('appointment')) {
                                                              echo 'active';
                                                          } ?>" href="{{$link}}">
                                                              {{($language == "en")?$Mainmenu_2_->title_en:$Mainmenu_2_->title_ar}}
                                                          </a>
                                                          @if(!empty($Mainmenu_2_sub) && count($Mainmenu_2_sub)>0)<!--checks if second main menu sub menu has data-->
                                                          <ul class="nav-submenu">
                                                              <div class="row"><!--this conatins the second main menu sub menu-->
                                                                  @foreach($Mainmenu_2_sub as $Mainmenu_2_sub_)
                                                                  @php
                                                                  $link = "";
                                                                  if($Mainmenu_2_sub_->type == 1){
                                                                  $link = $Mainmenu_2_sub_->link;
                                                                  }else if($Mainmenu_2_sub_->type == 2 && !empty($Mainmenu_2_sub_->page_id)){
                                                                  $link = $helper->getPageUrl($Mainmenu_2_sub_->page_id);
                                                                  }
                                                                  if($Mainmenu_2_sub_->target_blank == "Yes"){
                                                                  $blank="_blank";
                                                                  }else{
                                                                  $blank="";
                                                                  }
                                                                  @endphp
                                                                  <div class="col-md-6">
                                                                      <li>
                                                                          <a href="{{$link}}" target="{{$blank}}">
                                                                              <span>
                                                                                  {{($language == "en")?$Mainmenu_2_sub_->title_en:$Mainmenu_2_sub_->title_ar}}
                                                                              </span>
                                                                          </a>
                                                                      </li>
                                                                  </div>
                                                                  @endforeach
                                                              </div>
                                                          </ul>
                                                          @endif<!--If no data on second main menu, sub menu then nothing shown-->
                                                      </li>
                                                      @endforeach
                                                      @endif<!--If no data on second main menu then sub menu is not shown for it-->


                                                      @if(!empty ($Mainmenu_3))<!--checks if third main menu has data-->
                                                      @foreach($Mainmenu_3 as $Mainmenu_3_)
                                                      @php
                                                      $link = "";
                                                      if($Mainmenu_3_->type == 1){
                                                      $link = $Mainmenu_3_->link;
                                                      }else if($Mainmenu_3_->type == 2 && !empty($Mainmenu_3_->page_id)){
                                                      $link = $helper->getPageUrl($Mainmenu_3_->page_id);
                                                      }
                                                      @endphp
                                                      <li class="nav-item">
                                                          <a class="nav-link <?php if (Request::url() == url('doctors') || Request::is('doctorsprofile/*')) {
                                                              echo 'active';
                                                          } ?>" href="{{$link}}">
                                                              {{($language == "en")?$Mainmenu_3_->title_en:$Mainmenu_3_->title_ar}}
                                                          </a>
                                                          @if(!empty($Mainmenu_3_sub) && count($Mainmenu_3_sub)>0)<!--checks if second main menu sub menu has data-->
                                                          <ul class="nav-submenu">
                                                              <div class="row"><!--this conatins the second main menu sub menu-->
                                                                  @foreach($Mainmenu_3_sub as $Mainmenu_3_sub_)
                                                                  @php
                                                                  $link = "";
                                                                  if($Mainmenu_3_sub_->type == 1){
                                                                  $link = $Mainmenu_3_sub_->link;
                                                                  }else if($Mainmenu_3_sub_->type == 2 && !empty($Mainmenu_3_sub_->page_id)){
                                                                  $link = $helper->getPageUrl($Mainmenu_3_sub_->page_id);
                                                                  }
                                                                  if($Mainmenu_3_sub_->target_blank == "Yes"){
                                                                  $blank="_blank";
                                                                  }else{
                                                                  $blank="";
                                                                  }

                                                                  @endphp
                                                                  <div class="col-md-12">
                                                                      <li>
                                                                          <a href="{{$link}}" target="{{$blank}}">
                                                                              <span>
                                                                                  {{($language == "en")?$Mainmenu_3_sub_->title_en:$Mainmenu_3_sub_->title_ar}}
                                                                              </span>
                                                                          </a>
                                                                      </li>
                                                                  </div>
                                                                  @endforeach
                                                              </div>
                                                          </ul>
                                                          @endif<!--If no data on second main menu, sub menu then nothing shown-->

                                                      </li>
                                                      @endforeach <!--third main menu has no submenu-->
                                                      @endif<!--If no data on third main menu then sub menu is not shown for it-->



                                                      @if(!empty ($Mainmenu_4))<!--checks if the fouth menu has data-->
                                                      @foreach($Mainmenu_4 as $Mainmenu_4_)
                                                      @php
                                                      $link = "";
                                                      if($Mainmenu_4_->type == 1){
                                                      $link = $Mainmenu_4_->link;
                                                      }else if($Mainmenu_4_->type == 2 && !empty($Mainmenu_4_->page_id)){
                                                      $link = $helper->getPageUrl($Mainmenu_4_->page_id);
                                                      }
                                                      @endphp
                                                      <li class="nav-item">
                                                          <a class="nav-link <?php if (Request::url() == url('departments') || Request::is('department/*') || Request::is('search/department/*')) {
                                                              echo 'active';
                                                          } ?>" href="{{$link}}">
                                                              {{($language == "en")?$Mainmenu_4_->title_en:$Mainmenu_4_->title_ar}}
                                                          </a>

                                                          @if(!empty($Mainmenu_4_sub) && count($Mainmenu_4_sub)>0)<!--checks if second main menu sub menu has data-->
                                                          <ul class="nav-submenu">
                                                              <div class="row"><!--this conatins the second main menu sub menu-->
                                                                  <div class="col-md-12">
                                                                      @foreach($Mainmenu_4_sub as $Mainmenu_4_sub_)
                                                                      @php
                                                                      $link = "";
                                                                      if($Mainmenu_4_sub_->type == 1){
                                                                      $link = $Mainmenu_4_sub_->link;
                                                                      }else if($Mainmenu_4_sub_->type == 2 && !empty($Mainmenu_4_sub_->page_id)){
                                                                      $link = $helper->getPageUrl($Mainmenu_4_sub_->page_id);
                                                                      }
                                                                      if($Mainmenu_4_sub_->target_blank == "Yes"){
                                                                      $blank="_blank";
                                                                      }else{
                                                                      $blank="";
                                                                      }

                                                                      @endphp
                                                                      <li>
                                                                          <a href="{{$link}}" target="{{$blank}}">
                                                                              <span>
                                                                                  {{($language == "en")?$Mainmenu_4_sub_->title_en:$Mainmenu_4_sub_->title_ar}}
                                                                              </span>
                                                                          </a>
                                                                      </li>
                                                                      @endforeach
                                                                  </div>
                                                              </div>
                                                          </ul>
                                                          @endif<!--If no data on second main menu, sub menu then nothing shown-->

                                                      </li>
                                                      @endforeach <!--fourth main menu has no submenu-->
                                                      @endif <!--If no data on third main menu then sub menu is not shown for it-->





                                                      @if(!empty ($Mainmenu_5))<!--checks if the fouth menu has data-->
                                                      @foreach($Mainmenu_5 as $Mainmenu_5_)
                                                      @php
                                                      $link = "";
                                                      if($Mainmenu_5_->type == 1){
                                                      $link = $Mainmenu_5_->link;
                                                      }else if($Mainmenu_5_->type == 2 && !empty($Mainmenu_5_->page_id)){
                                                      $link = $helper->getPageUrl($Mainmenu_5_->page_id);
                                                      }
                                                      @endphp
                                                      <li class="nav-item">
                                                          <a class="nav-link  <?php if (Request::url() == url('event') || Request::url() == url('news-article') || Request::is('event/*') || Request::is('news/*')) {
                                                              echo 'active';
                                                          } ?>" href="{{$link}}">
                                                              {{($language == "en")?$Mainmenu_5_->title_en:$Mainmenu_5_->title_ar}}
                                                          </a>
                                                          @if(!empty($Mainmenu_5_sub) && count($Mainmenu_5_sub)>0)<!--checks if second main menu sub menu has data-->
                                                          <ul class="nav-submenu">
                                                              <div class="row"><!--this conatins the second main menu sub menu-->
                                                                  <div class="col-md-12">
                                                                      @foreach($Mainmenu_5_sub as $Mainmenu_5_sub_)
                                                                      @php
                                                                      $link = "";
                                                                      if($Mainmenu_5_sub_->type == 1){
                                                                      $link = $Mainmenu_5_sub_->link;
                                                                      }else if($Mainmenu_5_sub_->type == 2 && !empty($Mainmenu_5_sub_->page_id)){
                                                                      $link = $helper->getPageUrl($Mainmenu_5_sub_->page_id);
                                                                      }
                                                                      if($Mainmenu_5_sub_->target_blank == "Yes"){
                                                                      $blank="_blank";
                                                                      }else{
                                                                      $blank="";
                                                                      }
                                                                      @endphp
                                                                      <li>
                                                                          <a href="{{$link}}" target="{{$blank}}">
                                                                              <span>
                                                                                  {{($language == "en")?$Mainmenu_5_sub_->title_en:$Mainmenu_5_sub_->title_ar}}
                                                                              </span>
                                                                          </a>
                                                                      </li>
                                                                      @endforeach
                                                                  </div>
                                                              </div>
                                                          </ul>
                                                          @endif<!--If no data on second main menu, sub menu then nothing shown-->
                                                      </li>
                                                      @endforeach <!--fourth main menu has no submenu-->
                                                      @endif <!--If no data on third main menu then sub menu is not shown for it-->

                                                      @if(!empty ($Mainmenu_6))<!--checks if the fouth menu has data-->
                                                      @foreach($Mainmenu_6 as $Mainmenu_6_)
                                                      @php
                                                      $link = "";
                                                      if($Mainmenu_6_->type == 1){
                                                      $link = $Mainmenu_6_->link;
                                                      }else if($Mainmenu_6_->type == 2 && !empty($Mainmenu_6_->page_id)){
                                                      $link = $helper->getPageUrl($Mainmenu_6_->page_id);
                                                      }
                                                      @endphp
                                                      <li class="nav-item">
                                                          <a class="nav-link  <?php if (Request::url() == url('health-tips') || Request::is('healthtips/*')) {
                                                              echo 'active';
                                                          } ?>" href="{{$link}}">
                                                              {{($language == "en")?$Mainmenu_6_->title_en:$Mainmenu_6_->title_ar}}
                                                          </a>

                                                          @if(!empty($Mainmenu_6_sub) && count($Mainmenu_6_sub)>0)<!--checks if second main menu sub menu has data-->
                                                          <!-- <ul class="nav-submenu">
                                                                  <div class="row">
                                                                                  <div class="col-md-6">
                                                                  @foreach($Mainmenu_6_sub as $Mainmenu_6_sub_)
                                                                  @php
                                                                          $link = "";
                                                                          if($Mainmenu_6_sub_->type == 1){
                                                                                  $link = $Mainmenu_6_sub_->link;
                                                                          }else if($Mainmenu_6_sub_->type == 2 && !empty($Mainmenu_6_sub_->page_id)){
                                                                                  $link = $helper->getPageUrl($Mainmenu_6_sub_->page_id);
                                                                          }
                                                                  @endphp
                                                                          <li>
                                                                                  <a href="{{$link}}">
                                                                                          <span>
                                                                                                  {{($language == "en")?$Mainmenu_6_sub_->title_en:$Mainmenu_6_sub_->title_ar}}
                                                                                          </span>
                                                                                  </a>
                                                                          </li>
                                                                  @endforeach
                                                          </div>
                                                          </div>
                                                  </ul> -->
                                                          @endif<!--If no data on second main menu, sub menu then nothing shown-->

                                                      </li>
                                                      @endforeach <!--fourth main menu has no submenu-->
                                                      @endif <!--If no data on third main menu then sub menu is not shown for it-->

                                                  </ul>
                                              </div>
                                          </nav>
                                      </div>
                                  </div>
                              </div>
                              <!--header ends here-->

                              <!--sidebar offcanvas start here-->
                              <div id="mySidenav" class="sidenav">
                                  <ul class="accordion" id="accordionExample">
                                      <li class="sidemenu">
                                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                      </li>
<?php
if (!empty($getMenu)) {
    $i = 1;
    foreach ($getMenu as $v) {
        ?>
                                              <li class="sidemenu" id="<?php echo "sidemenu" . $i; ?>">
                                                  <a data-toggle="collapse" data-target="
        <?php if ($i == "1") {
            $set = "One";
        } else {
            $set = $i;
        }echo "#collapse" . $set; ?>" aria-expanded="true" aria-controls="<?php if ($i == "1") {
                                                  $set = "One";
                                              } else {
                                                  $set = $i;
                                              }echo "collapse" . $set; ?>">
                                                      <span>
                                                          {{($language == "en")?$v['title_en']:$v['title_ar']}}
                                                      </span>
                                                      <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                  </a>
                                              </li>
        <?php
        $getsubmenu = $helper->getSubMenu($v->id);
        if (!empty($getsubmenu)) {
            ?>
                                                  <div id="<?php if ($i == "1") {
                                          $set = 'One';
                                      } else {
                                          $set = $i;
                                      }echo 'collapse' . $set; ?>" class="collapse sidemenu-submenu" aria-labelledby="<?php echo "sidemenu" . $i; ?>" data-parent="#accordionExample">
                                                      <ul>
            <?php
            foreach ($getsubmenu as $sub) {
                $link = "";
                if ($sub['type'] == 1) {
                    $link = $sub['link'];
                } else if ($sub['type'] == 2 && !empty($sub['page_id'])) {
                    $link = $helper->getPageUrl($sub['page_id']);
                }
                ?>
                                                              <li><a href="{{$link}}"><span>{{($language == 'en')?$sub['title_en']:$sub['title_ar']}}</soan></a>	</li>
                <?php
            }
            ?>
                                                      </ul>
                                                  </div>
            <?php
        }
        $i = $i + 1;
    }
}
?>
                                  </ul>
                              </div>
                              <!--sidebar offcanvas ends here-->
                              <!-- Center -->


                              @include('layouts.squarebox')

                              @yield('content')

                              <!-- footer start here-->
                              <footer class="footer-block wow fadeInUp">
                                  <div class="footer-in">
                                      <div class="container">
                                          <div class="row">

                                              <div class="col-lg-3 col-md-6 col-sm-12">
                                                  <div class="footerin ist-sec">
                                                      @if(!empty ($footermenu_1) && count($footermenu_1)>0)<!--Check if Footer1menu heading has data-->
                                                      @foreach($footermenu_1 as $footermenu_1_)
                                                      <div class="footer-title" id="Footer1">
                                                          <h5>{{($language == "en")?$footermenu_1_->title_en:$footermenu_1_->title_ar}}</h5>
                                                      </div>
                                                      @endforeach
                                                      <ul> <!--This is not shown if no heading for Footer1 menu-->
                                                          @if(!@empty ($footermenu_1_sub))<!--check for submenu 1 footer data-->
                                                          @foreach($footermenu_1_sub as $footermenu_1_sub_)
                                                          @php
                                                          $link = "";
                                                          if($footermenu_1_sub_->type == 1){
                                                          $link = $footermenu_1_sub_->link;
                                                          }else if($footermenu_1_sub_->type == 2 && !empty($footermenu_1_sub_->page_id)){
                                                          $link = $helper->getPageUrl($footermenu_1_sub_->page_id);
                                                          }
                                                          if($footermenu_1_sub_->target_blank == "Yes"){
                                                          $blank="_blank";
                                                          }else{
                                                          $blank="";
                                                          }
                                                          @endphp
                                                          <li><a href="{{$link}}" target="{{$blank}}">
                                                                  {{($language == "en")?$footermenu_1_sub_->title_en:$footermenu_1_sub_->title_ar}}
                                                              </a></li>
                                                          @endforeach
                                                          @elseif (empty($footermenu_1_sub))
                                                          <script type="text/javascript">
                                                              document.getElementById('#Footer1').style.display = 'none';
                                                          </script>
                                                          @endif
                                                      </ul>
                                                      @elseif (empty($footermenu_1))
                                                      <div class="footer-title" style="display:none">
                                                      </div>
                                                      @else
                                                      <div class="footer-title" style="display:none">
                                                      </div>
                                                      @endif
                                                  </div>
                                              </div>
                                              <div class="col-lg-3 col-md-6 col-sm-12">
                                                  <div class="footerin 2nd-sec">
                                                      @if(!empty ($footermenu_2) && count($footermenu_2)>0)<!--Check if Footer2menu heading has data-->
                                                      @foreach($footermenu_2  as $footermenu_2_)
                                                      <div class="footer-title" id="Footer2">
                                                          <h5>
                                                              {{($language == "en")?$footermenu_2_->title_en:$footermenu_2_->title_ar}}
                                                          </h5>
                                                      </div>
                                                      @endforeach
                                                      <ul><!--This is not shown if no heading for Footer2 menu-->
                                                          @if(!empty ($footermenu_2_sub))<!--check for submenu 2 footer data-->
                                                          @foreach($footermenu_2_sub as $footermenu_2_sub_)
                                                          @php
                                                          $link = "";
                                                          if($footermenu_2_sub_->type == 1){
                                                          $link = $footermenu_2_sub_->link;
                                                          }else if($footermenu_2_sub_->type == 2 && !empty($footermenu_2_sub_->page_id)){
                                                          $link = $helper->getPageUrl($footermenu_2_sub_->page_id);
                                                          }
                                                          if($footermenu_2_sub_->target_blank == "Yes"){
                                                          $blank="_blank";
                                                          }else{
                                                          $blank="";
                                                          }
                                                          @endphp
                                                          <li><a href="{{$link}}" target="{{$blank}}">
                                                                  {{($language == "en")?$footermenu_2_sub_->title_en:$footermenu_2_sub_->title_ar}}
                                                              </a></li>
                                                          @endforeach
                                                          @elseif(empty ($footermenu_2_sub))
                                                          <script type="text/javascript">
                                                              document.getElementById('#Footer2').style.display = 'none';
                                                          </script>
                                                          @endif
                                                      </ul>
                                                      @elseif(@empty ($footermenu_2))
                                                      <div class="footer-title">
                                                          <h5></h5>
                                                      </div>
                                                      @endif<!--End of Footer2menu heading check if has data-->
                                                      @php
                                                      $footermenu_4 =$helper->footermenu_4();
                                                      $footermenu_4_sub =$helper->footermenu_4_sub();
                                                      @endphp
                                                      @if(!empty ($footermenu_4) && count($footermenu_4)>0)<!--Check if Footer2menu heading has data-->
                                                      @foreach($footermenu_4  as $footermenu_4_)
                                                      <div class="footer-title" id="Footer2">
                                                          <h5>
                                                              {{($language == "en")?$footermenu_4_->title_en:$footermenu_4_->title_ar}}
                                                          </h5>
                                                      </div>
                                                      @endforeach
                                                      <ul><!--This is not shown if no heading for Footer2 menu-->
                                                          @if(!empty ($footermenu_4_sub))<!--check for submenu 2 footer data-->
                                                          @foreach($footermenu_4_sub as $footermenu_4_sub_)
                                                          @php
                                                          $link = "";
                                                          if($footermenu_4_sub_->type == 1){
                                                          $link = $footermenu_4_sub_->link;
                                                          }else if($footermenu_4_sub_->type == 2 && !empty($footermenu_4_sub_->page_id)){
                                                          $link = $helper->getPageUrl($footermenu_4_sub_->page_id);
                                                          }
                                                          if($footermenu_4_sub_->target_blank == "Yes"){
                                                          $blank="_blank";
                                                          }else{
                                                          $blank="";
                                                          }
                                                          @endphp
                                                          <li><a href="{{$link}}" target="{{$blank}}">
                                                                  {{($language == "en")?$footermenu_4_sub_->title_en:$footermenu_4_sub_->title_ar}}
                                                              </a></li>
                                                          @endforeach
                                                          @elseif(empty ($footermenu_4_sub_))
                                                          <script type="text/javascript">
                                                              document.getElementById('#Footer2').style.display = 'none';
                                                          </script>
                                                          @endif
                                                      </ul>
                                                      @elseif(@empty ($footermenu_4))
                                                      <div class="footer-title">
                                                          <h5></h5>
                                                      </div>
                                                      @endif<!--End of Footer2menu heading check if has data-->

                                                      @php
                                                      $footermenu_5 =$helper->footermenu_5();
                                                      $footermenu_5_sub =$helper->footermenu_5_sub();
                                                      @endphp
                                                      @if(!empty ($footermenu_5) && count($footermenu_5)>0)<!--Check if Footer2menu heading has data-->
                                                      @foreach($footermenu_5  as $footermenu_5_)
                                                      <div class="footer-title" id="Footer2">
                                                          <h5>
                                                              {{($language == "en")?$footermenu_5_->title_en:$footermenu_5_->title_ar}}
                                                          </h5>
                                                      </div>
                                                      @endforeach
                                                      <ul><!--This is not shown if no heading for Footer2 menu-->
                                                          @if(!empty ($footermenu_5_sub))<!--check for submenu 2 footer data-->
                                                          @foreach($footermenu_5_sub as $footermenu_5_sub_)
                                                          @php
                                                          $link = "";
                                                          if($footermenu_5_sub_->type == 1){
                                                          $link = $footermenu_5_sub_->link;
                                                          }else if($footermenu_5_sub_->type == 2 && !empty($footermenu_5_sub_->page_id)){
                                                          $link = $helper->getPageUrl($footermenu_5_sub_->page_id);
                                                          }
                                                          if($footermenu_5_sub_->target_blank == "Yes"){
                                                          $blank="_blank";
                                                          }else{
                                                          $blank="";
                                                          }
                                                          @endphp
                                                          <li><a href="{{$link}}" target="{{$blank}}">
                                                                  {{($language == "en")?$footermenu_5_sub_->title_en:$footermenu_5_sub_->title_ar}}
                                                              </a></li>
                                                          @endforeach
                                                          @elseif(empty ($footermenu_5_sub_))
                                                          <script type="text/javascript">
                                                              document.getElementById('#Footer2').style.display = 'none';
                                                          </script>
                                                          @endif
                                                      </ul>
                                                      @elseif(@empty ($footermenu_5))
                                                      <div class="footer-title">
                                                          <h5></h5>
                                                      </div>
                                                      @endif<!--End of Footer2menu heading check if has data-->
                                                  </div>
                                              </div>
                                              <div class="col-lg-3 col-md-6 col-sm-12">
                                                  <div class="footerin 4th-sec">
                                                      @if(!empty ($footermenu_3) && count($footermenu_3)>0)<!--Check if Footer3menu heading has data-->
                                                      @foreach($footermenu_3  as $footermenu_3_)
                                                      <div class="footer-title">
                                                          <h5>
                                                              {{($language == "en")?$footermenu_3_->title_en:$footermenu_3_->title_ar}}
                                                          </h5>
                                                      </div>
                                                      @endforeach

                                                      <ul>
                                                          @foreach($footermenu_3_sub as $footermenu_3_sub_)
                                                          @php
                                                          $link = "";
                                                          if($footermenu_3_sub_->type == 1){
                                                          $link = $footermenu_3_sub_->link;
                                                          }else if($footermenu_3_sub_->type == 2 && !empty($footermenu_3_sub_->page_id)){
                                                          $link = $helper->getPageUrl($footermenu_3_sub_->page_id);
                                                          }
                                                          if($footermenu_3_sub_->target_blank == "Yes"){
                                                          $blank="_blank";
                                                          }else{
                                                          $blank="";
                                                          }
                                                          @endphp
                                                          <li><a href="{{$link}}" target="{{$blank}}">
                                                                  {{($language == "en")?$footermenu_3_sub_->title_en:$footermenu_3_sub_->title_ar}}
                                                              </a></li>
                                                          @endforeach
                                                      </ul>
                                                      @endif
                                                  </div>
                                              </div>
                                              <div class="col-lg-3 col-md-6 col-sm-12">
                                                  <div class="footerin ist-sec">



                                                      @if(!empty($footerContact)){
                                                      @foreach($footerContact as $footerContact_)
                                                      <div class="footer-title">
                                                          <h5>
                                                              {{($language == "en")?$footerContact_->main_title_en:$footerContact_->main_title_ar}}
                                                          </h5>
                                                      </div>
                                                      <ul class="get">
                                                          <li>
                                                              <i class="fa fa-phone" aria-hidden="true"></i>
                                                              <a href="tel:{{$footerContact_->phone}}">{{$footerContact_->phone}}</a>
                                                          </li>
                                                          <li>
                                                              <i class="fa fa-envelope" aria-hidden="true"></i>
                                                              <a href="mailto:{{$footerContact_->email}}">{{$footerContact_->email}}</a>
                                                          </li>
                                                          {{-- <li>
 								<i class="fa fa-map-marker" aria-hidden="true"></i>
 								<a href="{{Config::get('variable.URL_LINK')}}location"><span> {!!($language == "en")?$footerContact_->address:$footerContact_->address_Ar!!}</span></a>
                                                          </li> --}}
                                                          @if($footerContact_->addresses)
                                                          @foreach ($footerContact_->addresses as $item)
                                                          <li>
                                                              <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                              <a href="{{Config::get('variable.URL_LINK')}}location/<?php echo $item->lat; ?>/<?php echo $item->lng; ?>"><span> {!!($language == "en")?$item->address_en:$item->address_ar!!}</span></a>
                                                          </li>
                                                          @endforeach
                                                          @endif
                                                          <li>
                                                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                              <a href="#"><span>{!!($language == "en")?$footerContact_->time:$footerContact_->time_Ar!!}</a>
                                                          </li>
                                                      </ul>
                                                      @endforeach
                                                      @endif
                                                  </div>
                                              </div>

                                          </div>
                                      </div>
                                  </div>


                                  <div class="foot-bottom-row">
                                      <div class="container">
                                          <div class="foot-bottomin">
                                              <ul>
<?php
$getfooterlinks = $helper->getfooterlinks();
?>
                                                  @if(!empty ($getfooterlinks))
                                                  @foreach($getfooterlinks as $getfooterlinks_)
<?php $link = $helper->getPageUrl($getfooterlinks_->id); ?>
                                                  <li ><a href="{{$link}}">
                                                          {{($language == "en")?$getfooterlinks_->name_en:$getfooterlinks_->name_ar}}</a>
                                                  </li>
                                                  @endforeach
                                                  @endif
                                              </ul>
                                              @if(!empty ($Bootomfooter))
                                              @foreach($Bootomfooter as $Bootomfooter_)
                                              <p class="m-0">{{($language == "en")?$Bootomfooter_->copyright_en:$Bootomfooter_->copyright_ar}}</p>
                                              @endforeach
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  <a id="button"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                              </footer>
                              <!-- footer ends here-->
                              <!-- modals start here-->
                              <!-- modals ends here-->
                          </div>

                          <div class="modal fade thankyou-popup show" id="PUBLICATIONS" tabindex="-1" role="dialog" aria-labelledby="newsletter" aria-modal="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Submission Successfully</h5>
                                      </div>
                                      <div class="modal-body">
                                          <h6><b>Thank you, your Submission has been Received.</b></h6>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                      </div>
                                  </div>
                              </div>
                          </div>



                          <!-- Social Pop Up -->

                          <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                      <div class="modal-body">

                                          <div data-network="twitter" class="st-custom-button"><i class="fa fa-twitter" aria-hidden="true"></i> </div>

                                          <div data-network="facebook" class="st-custom-button"><i class="fa fa-facebook-f"></i> </div>

                                          <div data-network="email" class="st-custom-button">
                                              <i class="fa fa-envelope"></i></div>

                                          <div data-network="linkedin" class="st-custom-button"><i class="fa fa-linkedin"></i></div>

                                          <div data-network="blogger" class="st-custom-button"><i class="fa fa-newspaper-o" aria-hidden="true"></i></div>

                                          <div data-network="whatsapp" class="st-custom-button"><i class="fa fa-whatsapp"></i></div>

                                          <div data-network="sms" class="st-custom-button"><i class="fa fa-envelope" aria-hidden="true"></i>
                                          </div>


                                          <div data-network="pinterest" class="st-custom-button"><i class="fa fa-pinterest"></i></div>

                                          <div data-network="print" class="st-custom-button"><i class="fa fa-print"></i></div>

                                          <div data-network="reddit" class="st-custom-button"><i class="fa fa-reddit"></i></div>



                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <!-- Close -->


                          <!-- share popups start here-->
                          <div class="modal hide fade share-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">{{($language == "en")?"Share this with your friends":"شارك هذا مع أصدقائك"}}</h5>
                                          <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <textarea placeholder="Write your Comment here..." class="form-control" id="exampleFormControlTextarea1" rows="3" style="display:none"></textarea>
                                          <ul class="socailicon-img">
                                              <li>
                                                  <a href="http://www.facebook.com/sharer.php?u={{url()->current()}}" target="_blank">
                                                      <img src="{{env('BASE_URL')}}assets/images/icon-img/facebook.png">
                                                  </a>
                                              </li>
                                              <li>
                                                  <a href="https://plus.google.com/share?url={{url()->current()}}" target="_blank">
                                                      <img src="{{env('BASE_URL')}}assets/images/icon-img/google.png">
                                                  </a>
                                              </li>
                                              <li>
                                                  <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->current()}}" target="_blank">
                                                      <img src="{{env('BASE_URL')}}assets/images/icon-img/linkedin.png">
                                                  </a>
                                              </li>

                                              <li>
                                                  <a href="https://twitter.com/share?url={{url()->current()}}" target="_blank">
                                                      <img src="{{env('BASE_URL')}}assets/images/icon-img/twitter.png">
                                                  </a>
                                              </li>

                                              <!-- <li>
                                                      <a href="javascript:;" onclick="window.print()">
                                                              <img src="{{env('BASE_URL')}}assets/images/icon-img/print.png">
                                                      </a>
                                              </li> -->
                                              <li>
                                                  <a href="javascript:;" onclick="print_page()">
                                                      <img src="{{env('BASE_URL')}}assets/images/icon-img/print.png">
                                                  </a>
                                              </li>

                                              <li>
                                                  <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
                                                      <img src="{{env('BASE_URL')}}assets/images/icon-img/pinterest.png">
                                                  </a>
                                              </li>


                                              <li>
                                                  <a  href="https://bufferapp.com/add?url={{url()->current()}}&amp;text=IMC" target="_blank">
                                                      <img src="{{env('BASE_URL')}}assets/images/icon-img/buffer.png">
                                                  </a>
                                              </li>
                                              <!--<li>-->
                                              <!--	<a href="http://www.digg.com/submit?phase=2&url={{url()->current()}}" target="_blank">-->
                                              <!--		<img src="{{env('BASE_URL')}}assets/images/icon-img/diggit.png">-->
                                              <!--	</a>-->
                                              <!--</li>-->
                                              <!--<li>-->
                                              <!--	<a href="mailto:?Subject=IMC&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 {{url()->current()}}">-->
                                              <!--		<img src="{{env('BASE_URL')}}assets/images/icon-img/email.png">-->
                                              <!--	</a>-->
                                              <!--</li>-->

                                              <li>
                                                  <a href="http://reddit.com/submit?url={{url()->current()}}&amp;title=IMC" target="_blank">
                                                      <img src="{{env('BASE_URL')}}assets/images/icon-img/reddit.png">
                                                  </a>
                                              </li>
                                              <li>
                                                  <a href="http://www.stumbleupon.com/submit?url={{url()->current()}}&amp;title=IMC" target="_blank">
                                                      <img src="{{env('BASE_URL')}}assets/images/icon-img/stumbleupon.png">
                                                  </a>
                                              </li>
                                              <!--<li>-->
                                              <!--	<a href="http://www.tumblr.com/share/link?url={{url()->current()}}&amp;title=IMC" target="_blank">-->
                                              <!--		<img src="{{env('BASE_URL')}}assets/images/icon-img/tumblr.png">-->
                                              <!--	</a>-->
                                              <!--</li>-->
                                              <li>
                                                  <a href="http://vkontakte.ru/share.php?url={{url()->current()}}" target="_blank">
                                                      <img src="{{env('BASE_URL')}}assets/images/icon-img/vk.png">
                                                  </a>
                                              </li>
                                              <li>
                                                  <a  href="http://www.yummly.com/urb/verify?url={{url()->current()}}&amp;title=IMC" target="_blank">
                                                      <img src="{{env('BASE_URL')}}assets/images/icon-img/yummly.png">
                                                  </a>
                                              </li>
                                          </ul>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary closedata" data-dismiss="modal">{{($language == "en")?"Close":"قريب"}}</button>
                                          <!--<button type="button" class="btn btn-primary">Share</button>-->
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Sticky footer on scroll -->
                          <div class="footer-sticky">
                              <div class="row">
                                  <!-- Col 1-->
                                  <a href="https://patientportal.imc.med.sa/" target="_blank" class="box-1">
                                      <div class="col-md-6">
                                          <div class="col-md-3 icon"><i class="fa fa-calendar"></i></div>
                                          <div class="col-md-9 heading" >
                                              <span>{{($language == "en")?"Request an":"احجز موعدك"}}<br>
                                                  {{($language == "en")?"Appointment":"في عياداتنا"}}
                                              </span>
                                          </div>
                                      </div>
                                  </a>
                                  <!-- Col 2 -->
                                  <a href="https://qrstud.io/myimcapp" target="_blank" class="box-2">
                                      <div class="col-md-6">
                                          <div class="col-md-3 icon">
                                              <i class="fa fa-mobile"></i>
                                          </div>
                                          <div class="col-md-9 heading">
                                              <span>{{($language == "en")?"Download":"حمل تطبيق"}}<br>
                                                  {{($language == "en")?"My IMC App":"My IMC"}}</span>
                                          </div>
                                      </div>
                                  </a>
                                  <!-- -->
                              </div>
                          </div>
                          <!-- Sticky footer on scroll -->
                          <script type='text/javascript'>
                              $(function () {
                                  //Keep track of last scroll
                                  var lastScroll = 0;
                                  $(window).scroll(function (event) {
                                      //Sets the current scroll position
                                      var st = $(this).scrollTop();

                                      //Determines up-or-down scrolling
                                      if (st > lastScroll) {
                                          $(".footer-sticky").css("display", 'inline')
                                      }
                                      if (st == 0) {
                                          $(".footer-sticky").css("display", 'none')
                                      }
                                      //Updates scroll position
                                      lastScroll = st;
                                  });
                              });
                          </script>
                          <!-- End/sticky footer on scroll -->
                          <!-- share popups start here #2-->

                          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" defer></script>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" defer></script>
                          <script src="{{env('BASE_URL')}}assets/js/custom.js"></script>
                          <!-- jQuery library -->
                          <!-- Latest compiled JavaScript -->
                          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
                          <script src="{{env('BASE_URL')}}assets/js/bootstrap-datetimepicker.js" defer></script>
                          <script src="{{env('BASE_URL')}}assets/js/owl.carousel.js"></script>
                          <script src="{{env('BASE_URL')}}assets/js/wow.js" defer></script>

<?php
$url = Request::segment(1);
if ($url == "en") {
    ?>
                              <script src="{{env('BASE_URL')}}assets/js/jquery.hislide.js"></script>
    <?php
} elseif ($url == "ar") {
    ?>
                              <script src="{{env('BASE_URL')}}assets/js/arabic_jquery.hislide.js"></script>
    <?php
} else {
    ?>
                              <script src="{{env('BASE_URL')}}assets/js/jquery.hislide.js"></script>
    <?php
}
?>

                          <script>
                             $('.slide').hiSlide();
                          </script>
                          <script>
                              new WOW().init();
                          </script>
                          <script>
                              $(document).ready(function () {
                                  var base = $(document).find('.base').val();
                                  $('.subi').click(function () {
                                      var email = $(document).find('#subemail').val();
                                      var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
                                      if (re.test(email)) {
                                          $(document).find('.erroremail').html('');
                                          $(document).find('.successemail').html("");
                                          $.ajax({
                                              type: "GET",
                                              dataType: "json",
                                              url: base + "subscribe/" + email,
                                              success: function (data) {
                                                  //alert(data)
                                                  $(document).find('#subemail').val("");
                                                  $(".suvessmessage").css('display', 'block');
                                                  //swal('Subscribe Successfully');

                                                  // $("#PUBLICATIONS").modal("show");
                                              }
                                          });
                                      } else {
                                          $(document).find('.erroremail').html('');
                                          $(document).find('.successemail').html("");
                                          $(document).find('.erroremail').append("Please enter the valid email.");
                                          return false;
                                      }
                                  });

                                  var owl = $('.owl-carousel');
                                  owl.owlCarousel({
                                      items: 1,
                                      loop: true,
                                      nav: false,
                                      dots: true,
                                      fluidSpeed: true,
                                      autoplayTimeout: 10000,
                                      autoplay: true
                                  });
                              })
                              $(".owl-carousel2new").owlCarousel({
                                  autoplay: false,
                                  loop: true,
                                  items: 2,
                                  nav: false,
                                  autoplayHoverPause: true,
                                  responsive: {
                                      0: {
                                          items: 1,
                                      },
                                      600: {
                                          items: 1,
                                          nav: false
                                      },
                                      991: {
                                          items: 2,
                                      }
                                  }
                              });
                              $(".owl-carousel2").owlCarousel({
                                  autoplay: false,
                                  loop: true,
                                  items: 4,
                                  nav: false,
                                  autoplayHoverPause: true,
                                  animateOut: 'slideOutUp',
                                  animateIn: 'slideInUp'
                              });
                              $(".owl-carousel-services").owlCarousel({
                                  autoplay: true,
                                  loop: true,
                                  items: 5,
                                  nav: false,
                                  dots: true,
                                  autoplayHoverPause: true,
                                  animateOut: 'slideOutUp',
                                  animateIn: 'slideInUp'
                              });
                              $(".owl-carousel3").owlCarousel({
                                  autoplay: true,
                                  loop: true,
                                  items: 2,
                                  nav: false,
                                  autoplayHoverPause: true
                              });



                              $(document).ready(function () {

                                  var originalSize = $('div').css('font-size');

                                  // reset

                                  $(".resetMe").click(function () {

                                      $('div').css('font-size', originalSize);
                                      $('p').css('font-size', originalSize);
                                      $('h4').css('font-size', originalSize);
                                      $('h3').css('font-size', originalSize);
                                      $('h5').css('font-size', originalSize);
                                      $('span').css('font-size', originalSize);
                                      $('li').css('font-size', originalSize);

                                      count = 0;
                                      clickscount = 0;
                                  });



                                  // Increase Font Size
                                  var count = 0;

                                  $(".increase").click(function () {

                                      count += 1;
                                      //alert(count);
                                      if (count < 3) {
                                          var p = $('p').css('font-size');
                                          var head = $('h4').css('font-size');
                                          var hh = $('h3').css('font-size');
                                          var heads = $('h5').css('font-size');
                                          var span = $('span').css('font-size');
                                          var li = $('li').css('font-size');
                                          var currentSize = $('div').css('font-size');

                                          var currentSize = parseFloat(currentSize) * 1.2;

                                          $('div').css('font-size', currentSize);
                                          $('p').css('font-size', currentSize);
                                          $('h4').css('font-size', currentSize);
                                          $('h3').css('font-size', currentSize);
                                          $('h5').css('font-size', currentSize);
                                          $('span').css('font-size', currentSize);
                                          $('li').css('font-size', currentSize);
                                          return false;
                                      }

                                  });



                                  // Decrease Font Size
                                  var clickscount = 0;
                                  $(".decrease").click(function () {
                                      clickscount += 1;


                                      if (clickscount <= 3) {
                                          var p = $('p').css('font-size');
                                          var head = $('h4').css('font-size');
                                          var currentFontSize = $('div').css('font-size');
                                          var hh = $('h3').css('font-size');
                                          var heads = $('h5').css('font-size');
                                          var span = $('span').css('font-size');
                                          var currentSize = $('div').css('font-size');
                                          var li = $('li').css('font-size');
                                          if (currentSize != "12.8px") {
                                              var currentSize = parseFloat(currentSize) * 0.8;
                                          } else {
                                              var currentSize = parseFloat(currentSize);
                                          }
                                          $('div').css('font-size', currentSize);
                                          $('p').css('font-size', currentSize);
                                          $('h4').css('font-size', currentSize);
                                          $('h3').css('font-size', currentSize);
                                          $('h5').css('font-size', currentSize);
                                          $('span').css('font-size', currentSize);
                                          $('li').css('font-size', currentSize);
                                          return false;
                                      }
                                  });



                                  $(".printPage").click(function () {
                                      window.print();

                                  });
                                  // Close

                              });


                         // print hide Share button Pop up
                              function print_page() {

                                  $('#exampleModal').modal('hide');

                                  $('.closedata').click();
                                  var ButtonControl = document.getElementById("exampleModal");
                                  ButtonControl.style.visibility = "";
                                  window.print();
                              }

                         // Close Popup

                          </script>

                          <!-- CRM Tarking -->
                          <script type="text/javascript" src="https://analytics-eu.clickdimensions.com/ts.js" ></script>

                          <script type="text/javascript">
                              var cdAnalytics = new clickdimensions.Analytics('analytics-eu.clickdimensions.com');
                              cdAnalytics.setAccountKey('aYdDgXUaaWkqU8xlf5P3g9');
                              cdAnalytics.setDomain('imc.med.sa');
                              cdAnalytics.setScore(typeof (cdScore) == "undefined" ? 0 : (cdScore == 0 ? null : cdScore));
                              cdAnalytics.trackPage();
                          </script>
                          <!-- CRM Tarking -->

                          @yield('script')
        </body>
    </html>
