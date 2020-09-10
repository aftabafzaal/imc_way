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

<style>
@media (max-width: 420px){
	.pagenation-block .pagination li.page-item:nth-child(1), .pagenation-block .pagination li.page-item:last-child {
		display: block;
	}
	.pagenation-block .pagination li.page-item {
		display: none;
	}
}
</style>

<!--banner start here-->
<section class="find-doctor find-doctors eye-block eye-block-bg">
	<div class="container">
		<div class="banner-in">
			<div class="banner-left">
				<h1 class="text-fff"> {{ __('messages.find_doctor') }}</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item text-fff"><a class="text-fff" href="{{ Config::get('variable.URL_LINK')  }}">{{ __('messages.home') }}</a></li>
						<li class="breadcrumb-item text-fff"><a class="text-fff" href="{{ Config::get('variable.URL_LINK')}}doctors">{{ __('messages.doctors') }}</a></li>
						<li class="breadcrumb-item active text-fff" aria-current="page">{{ __('messages.find_doctor') }}</li>
					</ol>
				</nav>
			</div>
		         @include('layouts.buttons')

		</div>
	</div>
	@include('layouts.squarebox')

</section>
<!--banner ends here-->
<section class="find-doc-element">
	<div class="container-fluid">
		<div class="find-doc-in">
			<form action="{{Config::get('variable.URL_LINK')}}search/doctors" method="get">
			<div class="row">
				<div class="col-md-12 ">
					<div class="find-doc-ryt find-dox-new">
						<div class="bg-main" style="padding: 20px;">
							<p class="text-fff">{{ __('messages.search_doc_headline') }}</p>
							<div class="special-block">
								<div class="row">
									<div class="col-lg-6 col-md-12 wow fadeInRight">
										<div class="select-block">
											<label>
											    {{ __('messages.search_language') }}</label>
											<select name="language" id="language" class="form-select color-grey">
												<option value=""> {{ __('messages.all') }}</option>
												@if(isset($languages))
													@foreach ($languages as $item)
														<option value="{{strtolower($item->id)}}" {{($searchLanguage == $item->id)? "selected":""}}>{{($language == "en")? strtoupper($item->full_en) : strtoupper($item->full_ar)}}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 wow fadeInLeft">

                                            <label style="color:white">
                                                {{ __('messages.search_department') }}
                                              </label>

											<select name="department_id" class="doctrname form-control" id="department_id" placeholder="Search by Department" >
                                                <option value="">{!!($language == "en")?"Select":"تحديد"!!}</option>
												@if(isset($department) and !empty($department))
												@foreach($department as $dp)
												<option value="{{$dp->id}}" @if(!empty(Request::input('department_id')  and Request::input('department_id') == $dp->id )) selected @endif>{!!($language == "en")?$dp->title_en:$dp->title_ar!!}</option>
                                                @endforeach
												@endif

											</select>
										<img src="">
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-lg-6 col-md-12 wow fadeInLeft">
											<label style="color:white">
											   {{ __('messages.search_docname') }}
											 </label>
	<input name="doctorname" class="doctrname form-control" id="doctorname" placeholder=
	{{ __('messages.name') }}
	
	"{{($language == "en")?"Name":"اسم"}}" value="@if(!empty(Request::input('doctorname'))){{Request::input('doctorname')}} @endif">
									</div>
								</div>
								<input type="hidden" name="lng" value="{{$language}}"/>
								<div class="find-btn">
                                <button id="searchDoctor" type="submit" class="btnin">
                                    {{ __('messages.search_doctor_button') }}
                                   </button>
                                </div>
							</div>
							<div class="alphabet-sec">
								<label>
								    {{ __('messages.search_alphabet') }}
								    </label>
                <?php
								if($language == "en"){
									?>
		      	 <ul class="alphabet-secin">
		       	<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/all" data-alpha="" class="getval">All</a></li>
			       <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/a" data-alpha="a" class="getval">{!!($language == "en")?"A":"ا"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/b" data-alpha="b" class="getval">{!!($language == "en")?"B":"ب"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/c" data-alpha="c" class="getval">{!!($language == "en")?"C":"ت"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/d" data-alpha="d" class="getval">{!!($language == "en")?"D":"ث"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/e" data-alpha="e" class="getval">{!!($language == "en")?"E":"ج"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/f" data-alpha="f" class="getval">{!!($language == "en")?"F":"ح"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/g" data-alpha="g" class="getval">{!!($language == "en")?"G":"خ"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/h" data-alpha="h" class="getval">{!!($language == "en")?"H":"د"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/i" data-alpha="i" class="getval">{!!($language == "en")?"I":"ذ"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/j" data-alpha="j" class="getval">{!!($language == "en")?"J":"ر"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/k" data-alpha="k" class="getval">{!!($language == "en")?"K":"ز"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/l" data-alpha="l" class="getval">{!!($language == "en")?"L":"ك"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/m" data-alpha="m" class="getval">{!!($language == "en")?"M":"ق"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/n" data-alpha="n" class="getval">{!!($language == "en")?"N":"ف"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/o" data-alpha="o" class="getval">{!!($language == "en")?"O":"غ"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/p" data-alpha="p" class="getval">{!!($language == "en")?"P":"ع"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/q" data-alpha="q" class="getval">{!!($language == "en")?"Q":"ظ"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/r" data-alpha="r" class="getval">{!!($language == "en")?"R":"ط"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/s" data-alpha="s" class="getval">{!!($language == "en")?"S":"ض"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/t" data-alpha="t" class="getval">{!!($language == "en")?"T":"ص"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/u" data-alpha="u" class="getval">{!!($language == "en")?"U":"ش"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/v" data-alpha="v" class="getval">{!!($language == "en")?"V":"س"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/w" data-alpha="w" class="getval">{!!($language == "en")?"W":"ن"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/x" data-alpha="x" class="getval">{!!($language == "en")?"X":"ه"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/y" data-alpha="y" class="getval">{!!($language == "en")?"Y":"و"!!}</a></li>
			        <li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/z" data-alpha="z" class="getval">{!!($language == "en")?"Z":"ي"!!}</a></li>
			       </ul>
								<?php
							}else{
								?>
									<ul class="alphabet-secin">
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/الكل " data-alpha="" class="getval">الكل</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ا" data-alpha="ا" class="getval">ا</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ب" data-alpha="ب"  class="getval">ب</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ت" data-alpha="ت"  class="getval">ت</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ث" data-alpha="ث"  class="getval">ث</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ج" data-alpha="ج"  class="getval">ج</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ح" data-alpha="ح"  class="getval">ح</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/خ" data-alpha="خ" class="getval">خ</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/د" data-alpha="د" class="getval">د</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ذ" data-alpha="ذ" class="getval">ذ</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ر" data-alpha="ر" class="getval">ر</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ز" data-alpha="ز"  class="getval">ز</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/س" data-alpha="س"  class="getval">س</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ش" data-alpha="ش"  class="getval">ش</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ص" data-alpha="ص"  class="getval">ص</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ض}" data-alpha="ض"  class="getval">ض</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ط" data-alpha="ط"  class="getval">ط</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ظ" data-alpha="ظ"  class="getval">ظ</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ع" data-alpha="ع"  class="getval">ع</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/غ" data-alpha="غ"  class="getval">غ</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ف" data-alpha="ف"   class="getval">ف</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ق" data-alpha="ق"  class="getval">ق</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ك" data-alpha="ك"  class="getval">ك</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ل" data-alpha="ل"  class="getval">ل</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/م" data-alpha="م"  class="getval">م</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ن" data-alpha="ن"  class="getval">ن</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ه" data-alpha="ه"  class="getval">ه</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/و" data-alpha="و"  class="getval">و</a></li>
										<li><a href="{{ Config::get('variable.URL_LINK')}}search/doctors/ي" data-alpha="ي"  class="getval">ي</a></li>
									</ul>
								<?php
							}?>

							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</section>

		<!--profile start here-->
		<section class="profile-sec" id = "results">
			
		</section>


@endsection


@section('script')

@if(empty(request()->language) and empty(request()->doctorname))
<script>
$(document).ready(function(){
 $.ajax({
  url: "{{Config::get('variable.URL_LINK')}}doctorsearch",
  cache: false,
  success: function(html){
  	//alert(html);
   $("#results").append(html);
  }
});
});
</script>
@endif
<script>
$(document).ready(function(){
$(document).on('click','a.page-link',function(event){
	 event.preventDefault();
	 var url = $(this).attr('href');
    $.ajax({
     url: url,
     cache: false,
	  success: function(html){  
	  	$("#results").empty().append(html); 
	   
	  }
});
});

$(document).on('click','a.getval',function(event){
	event.preventDefault();	  
    var addressValue =$(this).attr('href').split('/');    
   // var searchName =  addressValue['7'];   
      var searchName = addressValue[addressValue.length - 1];

    $.ajax({
     url: "{{Config::get('variable.URL_LINK')}}searchalphabet"+'/'+searchName,
     cache: false,
	  success: function(html){  
	  	$("#results").empty().append(html); 
	   
	  }
});
});


$(document).on('click','#searchDoctor',function(event){
	event.preventDefault();	  

	var language =  $("#language").val();
	var department_id =  $("#department_id").val();
	var doctorname    =  $("#doctorname").val();
	
    $.ajax({
     url: "{{Config::get('variable.URL_LINK')}}doctorsearch",
     cache: false,
     data:{'language':language,'department_id':department_id,'doctorname':doctorname},
	  success: function(html){  
	  	$("#results").empty().append(html); 
	   
	  }
});
});


});
</script>




@if(!empty(request()->language) && !empty(request()->doctorname))
 <script type="text/javascript">
$(document).ready(function(){		  
 $("#results").empty();
	var language =  "{{request()->language}}";	
	var doctorname    =  "{{request()->doctorname}}";	
	
    $.ajax({
     url: "{{Config::get('variable.URL_LINK')}}doctorsearch",
     cache: false,
     data:{'language':language,'doctorname':doctorname},
	  success: function(html){  
	  	$("#results").empty().append(html); 
	   
	  }
});
}); 	
 </script>
 @elseif(!empty(request()->language))
 <script>
 	$(document).ready(function(){	  
  $("#results").empty();
	var language =  "{{request()->language}}";	
	
    $.ajax({
     url: "{{Config::get('variable.URL_LINK')}}doctorsearch",
     cache: false,
     data:{'language':language},
	  success: function(html){  
	  	$("#results").empty();
	  	$("#results").empty().append(html); 
	   
	  }
});
});
 </script>
 @elseif(!empty(request()->doctorname))
  <script>
 	$(document).ready(function(){	 
      $("#results").empty();
	var doctorname =  "{{request()->doctorname}}";	
	
    $.ajax({
     url: "{{Config::get('variable.URL_LINK')}}doctorsearch",
     cache: false,
     data:{'doctorname':doctorname},
	  success: function(html){ 
	 	 $("#results").empty();
	  	$("#results").empty().append(html); 
	   
	  }
});
});
 </script>
@endif

<!-- Close Search -->

@endsection