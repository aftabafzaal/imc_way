@php
  use App\Helpers;
  $helper = new Helpers();
  $rightbars = $helper->getRightBars();
  $url=Request::segment(1);
	if(	$url == "en"){
		$language='en';
	}elseif($url == "ar"){
			$language='ar';
	}else{
		$language='en';
	}  @endphp
<div class="sticky-sidebar-btnnew" id="sticky-sidebar-btn">
   <ul class="sticky-bntnew">
     <li>
       <div class="hamburger hamburger--3dx">
         <div class="hamburger-box"></div>
         <div class="sticky-widgets">
           <div class="row m-0">
             <div class="col-12 p-0">
               <a href="{{$rightbars[0]['link']}}" class="widgets-sec" target="_blank">
                 <div class="icon"><img src="{{env('BASE_URL')}}/assets/images/appointment.png"></div>
                 <div class="widgets-text">{{($language == "en")?$rightbars[0]['title_en']:$rightbars[0]['title_ar']}}</div>
               </a>
             </div>
             <div class="col-12 p-0">
              {{-- <a href="{{$rightbars[2]['link']}}" class="widgets-sec"> --}}
                 <a href="{{ Config::get('variable.URL_LINK')}}doctors" class="widgets-sec">
                 <div class="icon"><img src="{{env('BASE_URL')}}/assets/images/fd1.png"></div>
                 <div class="widgets-text">{{($language == "en")?$rightbars[2]['title_en']:$rightbars[2]['title_ar']}}</div>
               </a>
             </div>
           </div>
           <div class="row m-0">
             <!--<div class="col-6 p-0">-->
             <!--   <a href="{{$rightbars[1]['link']}}"-->
             <!--     target="popup"  onclick="window.open('{{$rightbars[1]['link']}}','popup','width=1150,height=800'); return false;" class="widgets-sec">-->
             <!--    <div class="icon"><img src="{{env('BASE_URL')}}/images/Symptom_Checker-42.png"></div>-->
             <!--    <div class="widgets-text">{{($language == "en")?$rightbars[1]['title_en']:$rightbars[1]['title_ar']}}</div>-->
             <!--  </a>-->
             <!--</div>-->
              <div class="col-12 p-0">
              {{-- <a href="{{$rightbars[4]['link']}}" class="widgets-sec"> --}}
                <a href="{{Config::get('variable.URL_LINK')}}contact-us" class="widgets-sec">
                 <div class="icon"><img src="{{env('BASE_URL')}}/assets/images/fd5.png"></div>
                 <div class="widgets-text">{{($language == "en")?$rightbars[4]['title_en']:$rightbars[4]['title_ar']}}</div>
               </a>
             </div>
           </div>
         </div>
       </div>
     </li>
   </ul>
 </div>
 <script>
         function createPopupWin(pageURL, pageTitle,
                     popupWinWidth, popupWinHeight) {
             var left = (screen.width ) ;
             var top = (screen.height ) ;
             var myWindow = window.open(pageURL, pageTitle,
                     'resizable=yes, width=' + popupWinWidth
                     + ', height=' + popupWinHeight + ', top='
                     + top + ', left=' + left);
         }
     </script>
