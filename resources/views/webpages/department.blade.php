@extends('layouts.home')
@section('content')
<!--banner start here-->
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
<section class="find-doctor find-doctors eye-block eye-block-bg">
	<div class="container">
		<div class="banner-in">
			<div class="banner-left">
				<h1 class="text-fff">
                       {{ __('messages.find_department') }}
					<h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}">{{ __('messages.home') }}</a></li>
						<li class="breadcrumb-item text-fff"><a class="text-fff" href="{{Config::get('variable.URL_LINK')}}/departments">
						{{ __('messages.departments') }}
							</a></li>
						<li class="breadcrumb-item active text-fff" aria-current="page">
                        {{ __('messages.find_department') }}
						</li>
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
			<!-- <form action="{{Config::get('variable.URL_LINK')}}search/departments"  method="POST"> -->
				<form id="formid">
				<div class="row">
					<div class="col-md-12 ">
						<div class="find-doc-ryt find-dox-new">
							<ul class="nav nav-tabs bg-main border-none" id="myTab" role="tablist">
							</ul>
							<div class="tab-content bg-main " style="padding: 20px;" id="myTabContent">
								<div class="tab-pane fade show active" id="Doctor" role="tabpanel" aria-labelledby="Doctor-tab">
									<p class="text-fff">{{ __('messages.search_dep_healine') }}</p>
							<div class="special-block">
										<div class="row">
											<div class="col-lg-6 col-md-12 wow fadeInLeft">
												<form class="form-doctor-name">
													<input type="hidden"  name="_token" value="{{ csrf_token() }}">
													<label style="color:white"> {{ __('messages.search_dep_name') }}	</label>
													<input class="form-control" id="departmentname" name="departmentname" placeholder="{{ __('messages.type_search_name') }}"  value="{{ old('departmentname') }}">
												</form>
											</div>
										</div>
										<input type="hidden" name="lng" value="{{$language}}"/>
										<div class="find-btn">
											<button id="searchDepartment" type="button" class="btnin">{{ __('messages.search_dep_button') }}</button>
										</div>
										<div class="alphabet-sec">
											<label>{{ __('messages.search_alphabet') }}</label>
											<?php
											if($language == "en"){
												?>
					      	 <ul class="alphabet-secin">
					       	<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/0" data-alpha="" class="getval">All</a></li>
						       <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/a" data-alpha="a" class="getval">{!!($language == "en")?"A":"ا"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/b" data-alpha="b" class="getval">{!!($language == "en")?"B":"ب"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/c" data-alpha="c" class="getval">{!!($language == "en")?"C":"ت"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/d" data-alpha="d" class="getval">{!!($language == "en")?"D":"ث"!!}</a></li>

						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/e" data-alpha="e" class="getval">{!!($language == "en")?"E":"ج"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/f" data-alpha="f" class="getval">{!!($language == "en")?"F":"ح"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/g" data-alpha="g" class="getval">{!!($language == "en")?"G":"خ"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/h" data-alpha="h" class="getval">{!!($language == "en")?"H":"د"!!}</a></li>


						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/i" data-alpha="i" class="getval">{!!($language == "en")?"I":"ذ"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/j" data-alpha="j" class="getval">{!!($language == "en")?"J":"ر"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/k" data-alpha="k" class="getval">{!!($language == "en")?"K":"ز"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/l" data-alpha="l" class="getval">{!!($language == "en")?"L":"ك"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/m" data-alpha="m" class="getval">{!!($language == "en")?"M":"ق"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/n" data-alpha="n" class="getval">{!!($language == "en")?"N":"ف"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/o" data-alpha="o" class="getval">{!!($language == "en")?"O":"غ"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/p" data-alpha="p" class="getval">{!!($language == "en")?"P":"ع"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/q" data-alpha="q" class="getval">{!!($language == "en")?"Q":"ظ"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/r" data-alpha="r" class="getval">{!!($language == "en")?"R":"ط"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/s" data-alpha="s" class="getval">{!!($language == "en")?"S":"ض"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/t" data-alpha="t" class="getval">{!!($language == "en")?"T":"ص"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/u" data-alpha="u" class="getval">{!!($language == "en")?"U":"ش"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/v" data-alpha="v" class="getval">{!!($language == "en")?"V":"س"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/w" data-alpha="w" class="getval">{!!($language == "en")?"W":"ن"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/x" data-alpha="x" class="getval">{!!($language == "en")?"X":"ه"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/y" data-alpha="y" class="getval">{!!($language == "en")?"Y":"و"!!}</a></li>
						        <li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/z" data-alpha="z" class="getval">{!!($language == "en")?"Z":"ي"!!}</a></li>
						       </ul>
											<?php
										}else{
											?>
												<ul class="alphabet-secin">
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/0" data-alpha="" class="getval">الكل</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ا" data-alpha="ا" class="getval">ا</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ب" data-alpha="ب"   class="getval">ب</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ت" data-alpha="ت"  class="getval">ت</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ث" data-alpha="ث"  class="getval">ث</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ج" data-alpha="ج"  class="getval">ج</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ح" data-alpha="ح"  class="getval">ح</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/خ" data-alpha="خ"  class="getval">خ</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/د" data-alpha="د"  class="getval">د</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ذ" data-alpha="ذ" class="getval">ذ</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ر" data-alpha="ر"  class="getval">ر</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ز" data-alpha="ز" class="getval">ز</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/س" data-alpha="س"  class="getval">س</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ش" data-alpha="ش"  class="getval">ش</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ص" data-alpha="ص"  class="getval">ص</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ض}" data-alpha="ض"  class="getval">ض</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ط" data-alpha="ط"  class="getval">ط</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ظ" data-alpha="ظ"  class="getval">ظ</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ع" data-alpha="ع"  class="getval">ع</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/غ" data-alpha="غ" class="getval">غ</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ف" data-alpha="ف"  class="getval">ف</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ق" data-alpha="ق"  class="getval">ق</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ك" data-alpha="ك"  class="getval">ك</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ل" data-alpha="ل"  class="getval">ل</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/م" data-alpha="م" class="getval">م</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ن" data-alpha="ن" class="getval">ن</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ه" data-alpha="ه" class="getval">ه</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/و" data-alpha="و" class="getval">و</a></li>
													<li><a href="{{ Config::get('variable.URL_LINK')}}search/departments/ي" data-alpha="ي"  class="getval">ي</a></li>
												</ul>
											<?php
										}?>

										</div>
									</div>
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
<section class="profile-sec ">
	<div class="container">
		<!-- <div class="accordion-block appoint-block-boxes"> -->
		<div class="accordion-block appoint-block-boxes">
			<div class="row departments">
				
			<?php

			 // foreach($result as $key=>$v){
				   ?>
					<!--  <div class="col-md-3">
						 <div class="admission-blocknew mb-2"> -->
							{{-- <h2 class="text-main">{{$key}}</h2> --}}
							 <?php
							   // foreach($v as $append){
									 ?>
									{{-- <a href="{{env('BASE_URL')}}department/{{$append->id}}" onmouseover="this.style.color='green'" onmouseout="this.style.color='#005a9c'" style="color: rgb(0, 90, 156);">{!!($language == "en")?$append->title_en:$append->title_ar!!}</a></p> --}}
									 <?php
								 // }
							 ?>
						 </div>
					 </div>
					 <?php
			 // }

			?>

			</div>
		</div>
	</div>

</section>
<!--profile ends here-->
@endsection
@section('script')
@if(!empty(request()->departmentname))
  <script type="text/javascript">


$('#formid').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
  
  	
     var lang  = "{{$language}}";
  	$(document).ready(function(){
  		var $profileurl = "{{url('/department/')}}/";
        	var depname = '{{request()->departmentname}}';  
        	var url = "{{url('/dpsearch/')}}"+'/'+depname+'/'+lang ;
        	getDepartmentList(depname);

        	$(document).on("click","#searchDepartment",function(){
		var searchName = $("#departmentname").val();

		getDepartmentList(searchName);
	});

$(document).on("click","a.getval",function(event){
		  event.preventDefault();
          var addressValue =$(this).attr('href').split('/');
         // var searchName =  addressValue['7'];
          var searchName = addressValue[addressValue.length - 1];
          //  alert(searchName);
         if(searchName){ getDepartmentList(searchName); }else{ getDepartmentList(searchName ="0"); }
		
	});

        	function getDepartmentList(depname){
        	$.ajax({
			url: "{{url('/dpsearch/')}}"+'/'+depname+'/'+lang,
			type:"GET",
			cache: false,
		   // dataType: 'json',
			//data:{"search_txt":name,"page":0,"item_count":"100"},
		//	headers: {"Content-Type": "application/json","Authorization":"Bearer imc_123_789_***_###"},
			success:function(response){
			
				$(".departments").empty().append(response);
				

			}
		});
        }
  	});


  </script>

@else
<script>


$('#formid').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

var lang  = "{{$language}}";

	$(document).ready(function(){
		var base = $(document).find('.base').val();

	var $profileurl = "{{url('/dpsearch/')}}/";
	getDepartmentList();

	var $searchKey = "{{\Request::input('departmentname','')}}";
	if($searchKey != ""){
		getDepartmentList($searchKey);
	}

	$(document).on("click","#searchDepartment",function(){
		var searchName = $("#departmentname").val();
            if(searchName){ getDepartmentList(searchName); }else{ getDepartmentList(searchName ="0"); }
	});

$(document).on("click","a.getval",function(event){
		  event.preventDefault();
        var addressValue =$(this).attr('href').split('/');
      //  var searchName =  addressValue['7'];       
          var searchName = addressValue[addressValue.length - 1];
		getDepartmentList(searchName);
	});


	function getDepartmentList(name){
          
       if (name == null){
           var name = 0;
      }
     
		$.ajax({
			url:base+"dpsearch/"+name+'/'+lang,
			type:"GET",

		  // dataType: 'json',
			//data:{"search_txt":name,"page":0,"item_count":"100"},
		//	headers: {"Content-Type": "application/json","Authorization":"Bearer imc_123_789_***_###"},
			success:function(response){				
				
             $(".departments").empty().append(response);
			}
		});
	}




});
</script>

  @endif

@endsection

