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
$getpage=$helper->getPagedata('patientlibrary');
$basedata=$helper->getPageBasedata('2');
?>
@include('layouts.latestbanner2')
<!--banner ends here-->
<!-- main section start here-->
<section class="main-inner-sec">
	<div class="container">
		<div class="inner-title">
			<h3>{{($language == "en")?$patientLibrary_content['section_1']['title_en']:$patientLibrary_content['section_1']['title_ar']}}</h3>
			{!! ($language == "en")?$patientLibrary_content['section_1']['description_en']:$patientLibrary_content['section_1']['description_ar'] !!}
		</div>
		<div class="accordion-block-vtab">
				<!-- <h3 class="more-text">Be more <span>specific</span></h3> -->
			<div class="row">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						@if(isset($patientLibraryCategories))
							@foreach ($patientLibraryCategories as $patientLibraryCategory)
								<a class="nav-link {{($patientLibraryCategory->id == 1)? 'active':''}}" id="v-pills-{{$patientLibraryCategory->id}}-tab" data-toggle="pill" href="#v-pills-{{$patientLibraryCategory->id}}" role="tab" aria-controls="v-pills-home" aria-selected="true">
									{{($language == "en")?$patientLibraryCategory->category_name_en:$patientLibraryCategory->category_name_ar}}
								</a>
							@endforeach
						@endif
					</div>
				</div>
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						@if(isset($patientLibraries))
							@foreach ($patientLibraries as $category_id => $patientLibrary)
								<div class="tab-pane fade show {{($category_id == 1)? 'active':''}}" id="v-pills-{{$category_id}}" role="tabpanel" aria-labelledby="v-pills-{{$category_id}}-tab">
									<div class="pdf-block">
										<div class="row">
											@foreach ($patientLibrary as $item)
												<div class="col-lg-4">
													<a href="{{asset('images/patientlibrary/files/'.$item['file'])}}" target="blank" class="pdf-in">
														<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
														<p>{{($language == "en")?$item['title_en']:$item['title_ar']}}</p>
													</a>
												</div>
											@endforeach
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
</section>
@include('layouts.subscribe')

@endsection
