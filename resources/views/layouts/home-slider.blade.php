
<!-- Include slider embed library -->
<?php include base_path()."/slider/revslider-standalone/embed.php"; ?>


<!-- Add CSS and JS libraries to html header -->
<?php RevSliderEmbedder::headIncludes(); ?>
@php
use App\Helpers;
$helper = new Helpers();
/*
	$url=Request::segment(1);
	if(	$url == "en"){
		 RevSliderEmbedder::putRevSlider("classicslider3"); 
	}elseif($url == "ar"){
		 RevSliderEmbedder::putRevSlider("arabic"); 
	}else{
		 RevSliderEmbedder::putRevSlider("classicslider3"); 
	}
        */
	@endphp
        
<!-- Insert slider with "slider1" alias to your page -->
