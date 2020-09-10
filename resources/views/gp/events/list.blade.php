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
  $helper = new App\Helpers();
  $getpage=$helper->getPagedata('event');
  $basedata=$helper->getPageBasedata('5');
	@endphp
@include('layouts.finalbanner')
<section class="main-inner-sec pt-0 event-center">
  <div class="container">

    <div class="row">
      <div class="col-md-7">
        <div class="event-banner">
          <img src="assets/images/Stroke-Academy-02.jpg">
        </div>
      </div>
      <div class="col-md-5">
        <div id="calendar"></div>
      </div>
    </div>
    <div class="event-search">
      <h4>Narrow your search</h4>
      <form>
        <div class="search-1">
          <div class="form-group">
            <p for="exampleInputEmail1">From Date</p>
            <input type="text" id="Fromdatepicker"  placeholder="DD:MM:YYYY">
          </div>
        </div>
        <div class="search-1">
          <div class="form-group">
            <p for="exampleInputEmail1">To Date</p>
            <input type="text" id="Todatepicker"  placeholder="DD:MM:YYYY">
          </div>
        </div>
        <div class="search-1">
          <div class="form-group">
            <p for="exampleFormControlSelect1">By Audience</p>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>- Any -</option>
              <option>Doctors/Physicians</option>
              <option>Employees</option>
              <option>Midwives</option>
              <option>Nurses</option>
              <option>Nutritionists</option>
              <option>Students</option>
              <option>Respiratory Therapists</option>
            </select>
          </div>
        </div>
        <div class="search-1">
          <div class="form-group">
            <p for="exampleFormControlSelect1">By Specialty</p>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>- Any -</option>
              <option>Assisted Reproductive Unit</option>
              <option>Associate Consultant, Sleep Medicine / Internal Medicine</option>
              <option>Cardiac Center</option>
              <option>Children's Health Center</option>
              <option>Diabetes Center</option>
              <option>Diet and Nutrition Clinic</option>
              <option>Musculoskeletal Center</option>
              <option>Oncology Center</option>
              <option>Pain &amp; Headache Center</option>
              <option>Plastic Surgery and Dermatology Center</option>
              <option>Women's Health Center</option>
            </select>
          </div>
        </div>
        <div class="search-btnin">
          <p for="exampleFormControlSelect1"></p>
          <button class="btn-search">Search</button>
        </div>
      </form>
    </div>
    <section class="update-block pb-0">
      <div class="container">
        <ul class="events-tab nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-Upcoming-tab" data-toggle="pill" href="#pills-Upcoming" role="tab" aria-controls="pills-Upcoming" aria-selected="true">Upcoming Events</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-Upcoming" role="tabpanel" aria-labelledby="pills-Upcoming-tab">
            <div class="row mb-5">

              <div class="col-md-12 col-lg-4">
                <div class="update-content event-content">
                  <div class="img-sec">
                    <img src="assets/images/event-banner/4th-IMC-Academy-02.jpg">
                  </div>
                  <div class="update-body">
                    <h5 class="text-blue">The 4th International IMC Family Medicine Confrence</h5>
                    <p class="update-date">Oct 29-31, 2019</p>
                    <p class="update-text">The 4th IMC family medicine conference is conducted by a number of national and international leading physicians....</p>
                    <div class="readmore"><a href="event-inner.html">Read More</a></div>
                  </div>
                </div>
              </div>


            </div>
          </div>

        </div>

        <div class="loadmore"><button>Load more</button></div>
      </div>
    </section>
  </div>
</section>

<!-- need section start here-->
@include('layouts.needadoctorsingle')
@endsection
