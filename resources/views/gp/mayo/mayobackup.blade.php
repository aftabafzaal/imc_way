@extends('layouts.home')
@section('content')
@section('content')
@include('layouts.banner')
<div class="wrapper mission-vision-new">
<section class="main-inner-sec pt-0 care-partner">
  <div class="container">
    <div class="care-partnerin">
      <div class="row">
        <div class="col-md-12 col-lg-4">
          <div class="care-sec-1">
            <div class="icon-bg">
              <p>  {!!($language == "en")?$content['section_1a']['title_en']:$content['section_1a']['title_ar']!!}<sup>st</sup></p>
            </div>
            <p>  {!!($language == "en")?$content['section_1a']['description_en']:$content['section_1a']['description_ar']!!}</p>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <div class="care-sec-1">
            <div class="icon-bg">
              <p>  {!!($language == "en")?$content['section_2a']['title_en']:$content['section_2a']['title_ar']!!}</p>
            </div>
            <p>  {!!($language == "en")?$content['section_2a']['description_en']:$content['section_2a']['description_ar']!!}</p>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <div class="care-sec-1">
            <div class="icon-bg">
              <p>  {!!($language == "en")?$content['section_3a']['title_en']:$content['section_3a']['title_ar']!!}</p>
            </div>
            <p>  {!!($language == "en")?$content['section_3a']['description_en']:$content['section_3a']['description_ar']!!}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="care-partnerin-2">
      <div class="partner-shape">
        <p class="quotes">
        {!!($language == "en")?$content['section_1']['description_en']:$content['section_1']['description_ar']!!}</h3>
      </p>
      </div>
    </div>
    <div class="care-patient-sec">
<h2>        {!!($language == "en")?$content['section_4']['title_en']:$content['section_4']['title_ar']!!}</h3>
</h2>
      <p>
        Because of our commitment to high quality, patient-centered care, IMC has been chosen as a member
        of the Mayo Clinic Care Network.
      </p>
      <h3>Here’s what this means for our patients:</h3>
    </div>

    <div class="consultant-block">
      <div class="row">
        <div class="col-md-3">
          <div class="consultant-blockin hvr-icon-grow-rotate">
            <div class="hvr-icon color-1"><i class="fa fa-question"></i></div>
            <h5>Ask Mayo Expert</h5>
            <p>
              Your doctor has special access to  the knowledge, expertise and resources of Mayo Clinic—the #1 ranked hospital in the United States  right here, close to home.
             </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="consultant-blockin hvr-icon-grow-rotate">
            <div class="hvr-icon color-2"><i class="fa fa-laptop"></i></div>
            <h5>eConsult</h5>
            <p>
              Your doctor has special access to  the knowledge, expertise and resources of Mayo Clinic—the #1 ranked hospital in the United States  right here, close to home.
             </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="consultant-blockin hvr-icon-grow-rotate">
            <div class="hvr-icon color-3"><i class="fa fa-laptop"></i></div>
            <h5>eTumor Board</h5>
            <p>
              Your doctor has special access to  the knowledge, expertise and resources of Mayo Clinic—the #1 ranked hospital in the United States  right here, close to home.
             </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="consultant-blockin hvr-icon-grow-rotate">
            <div class="hvr-icon color-4"><i class="fa fa-users"></i></div>
            <h5>Health Care Consulting</h5>
            <p>
              Your doctor has special access to  the knowledge, expertise and resources of Mayo Clinic—the #1 ranked hospital in the United States  right here, close to home.
             </p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<div class="bg-fff mayo-clini-sec">
  <div class="container">
    <div class="care-patient-sec m-0">
      <h2>        {!!($language == "en")?$content['section_2']['title_en']:$content['section_2']['title_ar']!!}</h3>
</h2>
      <p>
        {!!($language == "en")?$content['section_2']['description_en']:$content['section_2']['description_ar']!!}</h3>
      </p>

    </div>
  </div>
</div>
<div class="consultant-block care-patient-sec-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="care-patient-sec mt-0">
          <h2>        {!!($language == "en")?$content['section_3']['title_en']:$content['section_3']['title_ar']!!}</h3>
</h2>
<p>
  {!!($language == "en")?$content['section_3']['description_en']:$content['section_3']['description_ar']!!}</h3>
</p>
        </div>
      </div>
      <div class="col-md-12">
        <div class="intro-video">
          <iframe width="853" height="480" src="https://www.youtube.com/embed/0fVWpb932jw?list=PLYcsNUbw4_56E8MAxVJnKMelx5jR1lsbD" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>




    </div>

  </div>
</div>
<div class="faq-sec">
  <div class="container">
    <div class="care-patient-sec m-0">
      <h2><b>FAQs</b></h2>
    </div>
    <div class="faq-list">
      <div class="accordion" id="accordionExample">
        @if(isset($data))
          @foreach ($data as $key => $mayo)

        <div class="faq-list-in">
          <div class="list-header" id="heading{{$mayo->id}}">
            <a class="header-title" data-toggle="collapse" data-target="#collapse{{$mayo->id}}" aria-expanded="true" aria-controls="collapseOne">
              <span> {{($language == "en")?$mayo->title_en:$mayo->title_ar}}  </span>
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
          </div>
          <div id="collapse{{$mayo->id}}" class="collapse" aria-labelledby="heading{{$mayo->id}}" data-parent="#accordionExample">
            <div class="list-body">
            {!!($language == "en")?$mayo->description_en:$mayo->description_ar!!}
           </div>
          </div>
        </div>
        @endforeach
        @endif

      </div>
    </div>
  </div>
</div>
</div>
<!-- need section start here-->
@include('layouts.needadoctorsingle')
<!-- need section ends here-->

@endsection
