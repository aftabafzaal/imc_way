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
  @endphp
<!--banner start here-->
<?php
$helper = new App\Helpers();
$getpage=$helper->getPagedata('contact-us');
$basedata=$helper->getPageBasedata('');
?>
@include('layouts.finalbanner')
<!--banner ends here-->
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

<section class="main-inner-sec ">
  <div class="accordion-block">
    <div class="container">
      <div class=" contactus">
        <div class="row">
          <div class="col-md-4 p-0">
            <div class="contact-img">
              <img src="{{env('BASE_URL')}}images/Contact-Us-blue.jpg"  alt="{{ __('messages.contactusAlternate') }}" title="{{ __('messages.contactusTitle') }}">
            </div>
          </div>




          <div class="col-md-8 p-0">


  <div class="form-control alert alert-success alert-block suvessmessage" style="display:none">
 <!--  <button type="button" class="close" data-dismiss="alert">×</button>  -->
  <button type="button" class="close">×</button>
        <strong class="appendsucess"> Data has been submmited successfully </strong>
</div>


            <form class="form-career w-100 formsdata">
              <div class="form-group">
                <input type="text" class="form-control name" id="name" name="name" aria-describedby="name"
                placeholder="@if($language == 'ar') الاسم  @else Name @endif " required>
                <div class="alert alert-danger errorname" style="display: none;"></div>
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <input type="email" class="form-control email" id="email" placeholder="@if($language == 'ar') البريد الإلكتروني  @else Email @endif " name="email" required>
                <div class="alert alert-danger erroremail" style="display: none;"></div>

              </div>
              <div class="form-group">
                <input type="text" class="form-control phone" id="phone" placeholder="Mobile Number" name="mobile" required>
                <div class="alert alert-danger errorphone" style="display: none;"></div>

              </div>
              <div class="form-group">
                <input type="text" class="form-control subject" id="subject" placeholder="subject" name="subject" required>
                <div class="alert alert-danger errorsubject" style="display: none;"></div>

              </div>
              <div class="form-group">
                <textarea class="form-control message" placeholder="Message" id="message" rows="3" name="message" required></textarea>
                <div class="alert alert-danger errormessage" style="display: none;"></div>

              </div>


                <div class="form-group">
              <div class="container">
                 <div id="recaptcha"></div>
              </div>
               <div class="alert alert-danger print-error-capcha" style="display:none"></div>
  </div>

              <div class="text-center submit-btn">
            <a href="#" class="btn btn-primary submitsave"> @if($language == 'ar') إرسال  @else Submit @endif</a>

              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!--modal submit-->

<!-- main section ends here-->
@include('layouts.needadoctorsingle')
    <!-- <div class="loadmore"><button>Load more</button></div> -->
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


$(document).ready(function(){
  $(".submitsave").click(function(){
      $('#overlay').fadeIn();
    if(grecaptcha.getResponse() == "") {
              $(".print-error-capcha").css('display','block');
        $(".print-error-capcha").empty().append('reCAPTCHA is mandatory');
        $('#overlay').fadeOut();
            return false;
          }

     $.ajax({
    type: "POST",
    url: "{{url('/contsave')}}",
    data: jQuery(".formsdata").serialize(),
    cache: false,
    success:  function(data){
          if($.isEmptyObject(data.error)){
               $('#overlay').fadeOut();
              $(".suvessmessage").css('display','block');
              $('.formsdata')[0].reset();
              $(".errorname").css('display','none');
              $(".erroremail").css('display','none');
              $(".errormessage").css('display','none');
              $(".errorsubject").css('display','none');
              $(".errorphone").css('display','none');
                $(".print-error-capcha").css('display','none');
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

           if(msg['name']){
           $(".errorname").css('display','block');
           $(".errorname").empty().append(msg['name']);
           }
           if(msg['email']){
           $(".erroremail").css('display','block');
           $(".erroremail").empty().append(msg['email']);
           }
           if(msg['message']){
           $(".errormessage").css('display','block');
           $(".errormessage").empty().append(msg['message']);
           }
           if(msg['subject']){
           $(".errorsubject").css('display','block');
           $(".errorsubject").empty().append(msg['subject']);
           }
           if(msg['mobile']){
           $(".errorphone").css('display','block');
           $(".errorphone").empty().append(msg['mobile']);
           }

       }

  function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }

 function phone_validate(phno)
{
  var regexPattern=new RegExp(/^[0-9-+]+$/);
  if(!regexPattern.test(phno)) {
           return false;
        }else{
           return true;
        }
}



$(".close").click(function(){
   $(".suvessmessage").css('display','none')
});

});

//save_contactus
</script>




@endsection
