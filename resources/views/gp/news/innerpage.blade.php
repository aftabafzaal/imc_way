@extends('layouts.home')
@section('content')
@php
	$url=Request::segment(1);
	if($url == "en"){
		$language='en';
	}elseif($url == "ar"){
			$language='ar';
	}else{
		$language='en';
	}
	$helper = new App\Helpers();
	$maindata=$helper->getPageBasedata('5');
	$basedata=$helper->getMainBasedata('news-article');
	$url='news-article';
	@endphp
@include('layouts.innerPageLayout')
<!--banner ends here-->
<section class="update-block news-inner-block">
	<div class="container">
		<div class="survey-blocknew">

<h2 class="text-main text-center mb-5">{{($language == "en")?$data['inner_title_en']:$data['inner_title_ar']}}</h2>


<?php
  if(!empty($data['embed_url'])){
		?>
		<div class="news-inner-media mb-5">
			<iframe width="853" height="480" src="{{$data['embed_url']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<?php
	}else{
		$enImage= $helper->getImage($data['media_id']);
		if(!empty($enImage)){
		 $icon=	env('BASE_URL').$enImage;
	 }else{
		 $icon="";
	 }
		?>
		<div class="img-sec"><img src="<?php echo $icon;?>"  height="400" alt="{{($language == "en")?$data['inner_title_en']:$data['inner_title_ar']}}" title="{{($language == "en")?$data['inner_title_en']:$data['inner_title_ar']}}"></div>
		<?php
	}
?>
<br></br>
	{!!($language == "en")?$data['description_en']:$data['description_ar']!!}
		</div>
	</div>
</section><!-- main section ends here-->

@include('layouts.needadoctorsingle')
@endsection
