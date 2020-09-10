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
<?php
$helper = new App\Helpers();
$getpage=$helper->getPagedata('contact-us');
$basedata=$helper->getPageBasedata('');
?>
@include('layouts.finalbanner')
<!--banner ends here-->

<section class="main-inner-sec ">
  <div class="accordion-block">
    <div class="container">
      <div class=" contactus">
        <div class="row">
          <div class="col-md-4 p-0">
            <div class="contact-img">
              <img src="{{env('BASE_URL')}}images/Contact-Us-blue.jpg" alt="{{ __('messages.contactusAlternate') }}" title="{{ __('messages.contactusTitle') }}">
            </div>
          </div>
          <div class="col-md-8 p-0">
            <form class="form-career w-100 formsdata">
              <div class="form-group">
                <input type="text" class="form-control name" id="name" name="name" aria-describedby="name" placeholder="Name" required>
                 <span class="errorname" style="color:red;"></span>
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <input type="email" class="form-control email" id="email" placeholder="Email" name="email" required>
                <span class="erroremail" style="color:red;"></span>

              </div>
              <div class="form-group">
                <input type="text" class="form-control phone" id="phone" placeholder="Mobile Number" name="mobile" required>
                <span class="errorphone" style="color:red;"></span>

              </div>
              <div class="form-group">
                <input type="text" class="form-control subject" id="subject" placeholder="subject" name="subject" required>
                <span class="errorsubject" style="color:red;"></span>

              </div>
              <div class="form-group">
                <textarea class="form-control message" placeholder="Message: " id="message" rows="3" name="message" required></textarea>
                <span class="errormessage" style="color:red;"></span>

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
@section('script')
<script type="text/javascript">


$(document).ready(function(){
  $(".submitsave").click(function(){

    var name = $(document).find('.name').val();

  var email = $(document).find('.email').val();
  var phone = $(document).find('.phone').val();
  var subject = $(document).find('.subject').val();
  var message = $(document).find('.message').val();

  if(name == ""){
    $(document).find('.errorname').html('please enter the name');
    return false;
  }else{
    $(document).find('.errorname').html('');
  }
  if(email == ""){
    $(document).find('.erroremail').html('please enter the name');

    return false;
  }else{
      $(document).find('.erroremail').html('');
  }
  if(phone == ""){
    $(document).find('.errorphone').html('please enter the name');

    return false;
  }else{
      $(document).find('.errorphone').html('');
  }
  if(subject == ""){
    $(document).find('.errorsubject').html('please enter the name');

    return false;
  }else{
      $(document).find('.errorsubject').html('');
  }
  if(message == ""){
    $(document).find('.errormessage').html('please enter the name');

    return false;
  }else{
      $(document).find('.errormessage').html('');
  }

     $.ajax({
    type: "POST",
    url: "{{url('/contsave')}}",
    data: jQuery(".formsdata").serialize(),
    cache: false,
    success:  function(data){
      $('.formsdata')[0].reset();
     $("#PUBLICATIONS").modal("show");
    }
  });

  });
});

//save_contactus
</script>


  

@endsection
