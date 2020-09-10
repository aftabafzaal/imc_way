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
<?php
$helper = new App\Helpers();
$getpage=$helper->getPagedata('health-tips');
$basedata=$helper->getPageBasedata('');
$url='health-tips';
?>
@include('layouts.finalbanner')
<!--banner ends here-->
<!-- main section start here-->
<section class="main-inner-sec health-blocknew">
	<div class="container">
		<div class="row ">
			<div class="col-md-4">
				<div class="health-blockleft">
					<form class="kt-margin-l-20" id="kt_subheader_search_form" action="{{ Config::get('variable.URL_LINK')}}health-tips" method="GET" role="search">
					<div class="health-searchbar">
						<input type="text" placeholder="{!!($language == "en")?"Search Your Health Tips:":"بحث نصائح صحتك"	!!}" name="q" value="{{session()->get( 'q' )}}">
						<i class="fa fa-search button_id" aria-hidden="true"></i>
					</div>
				</form>
					<div class="alphabet-sec">
						<label>{!!($language == "en")?"Search by Alphabets:":"بحث بالحروف الأبجدية"
						!!}</label>

						<?php
						if($language == "en"){
							?>
				 <ul class="alphabet-secin">
				<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips" data-alpha="">All</a></li>
				 <li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=a" data-alpha="a">{!!($language == "en")?"A":"ا"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=b" data-alpha="b">{!!($language == "en")?"B":"ب"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=c" data-alpha="c">{!!($language == "en")?"C":"ت"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=d" data-alpha="d">{!!($language == "en")?"D":"ث"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=e" data-alpha="e">{!!($language == "en")?"E":"ج"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=f" data-alpha="f">{!!($language == "en")?"F":"ح"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=g" data-alpha="g">{!!($language == "en")?"G":"خ"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=h" data-alpha="h">{!!($language == "en")?"H":"د"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=i" data-alpha="i">{!!($language == "en")?"I":"ذ"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=j" data-alpha="j">{!!($language == "en")?"J":"ر"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=k" data-alpha="k">{!!($language == "en")?"K":"ز"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=l" data-alpha="l">{!!($language == "en")?"L":"ك"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=m" data-alpha="m">{!!($language == "en")?"M":"ق"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=n" data-alpha="n">{!!($language == "en")?"N":"ف"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=o" data-alpha="o">{!!($language == "en")?"O":"غ"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=p" data-alpha="p">{!!($language == "en")?"P":"ع"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=q" data-alpha="q">{!!($language == "en")?"Q":"ظ"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=r" data-alpha="r">{!!($language == "en")?"R":"ط"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=s" data-alpha="s">{!!($language == "en")?"S":"ض"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=t" data-alpha="t">{!!($language == "en")?"T":"ص"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=u" data-alpha="u">{!!($language == "en")?"U":"ش"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=v" data-alpha="v">{!!($language == "en")?"V":"س"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=w" data-alpha="w">{!!($language == "en")?"W":"ن"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=x" data-alpha="x">{!!($language == "en")?"X":"ه"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=y" data-alpha="y">{!!($language == "en")?"Y":"و"!!}</a></li>
					<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=z" data-alpha="z">{!!($language == "en")?"Z":"ي"!!}</a></li>
				 </ul>
						<?php
					}else{
						?>
							<ul class="alphabet-secin">
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips" data-alpha="">الكل</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ا" data-alpha="ا">ا</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ب" data-alpha="ب">ب</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ت" data-alpha="ت">ت</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ث" data-alpha="ث">ث</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ج" data-alpha="ج">ج</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ح" data-alpha="ح">ح</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=خ" data-alpha="خ">خ</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=د" data-alpha="د">د</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ذ" data-alpha="ذ">ذ</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ر" data-alpha="ر">ر</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ز" data-alpha="ز">ز</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=س" data-alpha="س">س</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ش" data-alpha="ش">ش</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ص" data-alpha="ص">ص</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ض}" data-alpha="ض">ض</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ط" data-alpha="ط">ط</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ظ" data-alpha="ظ">ظ</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ع" data-alpha="ع">ع</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=غ" data-alpha="غ">غ</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ف" data-alpha="ف">ف</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ق" data-alpha="ق">ق</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ك" data-alpha="ك">ك</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ل" data-alpha="ل">ل</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=م" data-alpha="م">م</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ن" data-alpha="ن">ن</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ه" data-alpha="ه">ه</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=و" data-alpha="و">و</a></li>
								<li><a href="{{ Config::get('variable.URL_LINK')}}health-tips/?q=ي" data-alpha="ي">ي</a></li>
							</ul>
						<?php
					}?>

					</div>
					<h5>{!!($language == "en")?"Categories:":"التصنيفات"	!!}</h5>
					<ul>
						<li>
							<a href="{{Config::get('variable.URL_LINK')}}health-tips">
								<span>{!!($language == "en")?"All:":"الكل"	!!}</span>
								<span><b>(<?php echo $counall;?>)</b></span>
							</a>
						</li>
						<?php
						if(!empty($cat)){
							foreach($cat as $v1){
								 ?>
								 <li>
									 <a href="{{Config::get('variable.URL_LINK')}}health-tips?cat={{$v1->id}}">
										 <span>{!!($language == "en")?$v1->name_en:$v1->name_ar!!}</span>
									 </a>
								 </li>
								 <?php
							}
						}
						?>
					</ul>
				</div>
			</div>
			<div class="col-md-8">
				<div class="health-blockright">
					<a href=" {{($language == "en")?'https://healthtips.imc.med.sa/wellness':'https://healthtips.imc.med.sa/wellness/#/home/ar'}} " target="_blank" class="right-bg-img">
						<!-- <p class="category-title">Diet & Nutrition</p> -->
						<?php
                    		$enImage= $helper->getImage($content['section_1']['media_id_en']);
                    		 if(!empty($enImage)){
                    				$image= env("BASE_URL").$enImage;
                    		 }else{
                    			 $image= "";
                    		 }
                    		?>
						@if(!empty($image))
						<img src="{{$image}}" alt="{{ __('messages.healthTipAlternate') }}" title="{{ __('messages.healthTipTitle') }}">
						@else
						<img src="assets/images/diet1.jpg" alt="{{ __('messages.healthTipAlternate') }}" title="{{ __('messages.healthTipTitle') }}>

						@endif
						<div class="nutri-content-box">
						<a href="{{($language == "en")?'https://healthtips.imc.med.sa/wellness/#/home':'https://healthtips.imc.med.sa/wellness/#/home/ar'}}" target="_blank"><h5>{!!($language == "en")?$content['section_1']['title_en']:$content['section_1']['title_ar']!!}</h5></a>
							<p>{!!($language == "en")?$content['section_1']['description_en']:$content['section_1']['description_ar']!!}</p>
						</div>
					</a>
				</div>
			</div>
			<div class="health-element-newsec">
					<div class="row mb-5">
						<?php
						if(count($data)>0){
							foreach($data as $v){
							  ?>
								<div class="col-md-4">
									<div href="#" class="right-bg-img">
										<p class="category-title">{{($language == "en")?$v['category_en']:$v['category_ar']}}</p>
										<iframe frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen src="{{$v['youtube_url']}}"></iframe>
										<div class="nutri-content-box">
											<h6><a href="{{Config::get('variable.URL_LINK')}}healthtips/{{($language == "en")?$v->slug_en:$v->slug_ar}}">{{($language == "en")?$v['title_en']:$v['title_ar']}}</a></h6>
										</div>
										<!--<div class="hover-content-health">
											<p class="title-hover">Diet & Nutrition</p>
											<h6>{{($language == "en")?$v['title_en']:$v['title_ar']}}</h6>
											<a href="#">View Article</a>
										</div> -->
									</div>
								</div>

								<?php
							}
						}else{
							?>
								<h2>{{($language == "en")?"No record found.":"لا يوجد سجلات."}}</h2>
							<?php
						}
						?>
					</div>


					<!-- <nav class="pagenation-block" aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item"><a class="page-link" href="#">Previous</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">4</a></li>
							<li class="page-item"><a class="page-link" href="#">5</a></li>
							<li class="page-item"><a class="page-link" href="#">6</a></li>
							<li class="page-item"><a class="page-link" href="#">7</a></li>
							<li class="page-item"><a class="page-link" href="#">8</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
					</nav> -->
						<nav class="pagenation-block" aria-label="Page navigation example">
							<ul class="pagination">
	        	                {{-- <li>{{$data->links()}}</li> --}}
								{{ $data->appends(Request::except('page'))->links() }}
							</nav>

					</div>
			</div>
		</div>
	</div>
</section>
<!-- main section ends here-->

<!-- main section ends here-->
<!-- need section start here-->
@include('layouts.needadoctorsingle')

<!-- need section ends here-->
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$('.button_id').on('click',function(){

			 $('#kt_subheader_search_form').submit();
      });

	});

		</script>

@endsection
