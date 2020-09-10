@php
	use App\Helpers;
	$helper = new Helpers();
		$urllanguage=Request::segment(1);
	$url=Request::segment(2);
	if(	$urllanguage == "en"){
		$language='en';
	}elseif($urllanguage == "ar"){
			$language='ar';
	}else{
		$language='en';
	}
	//dd($urllanguage);
	if($url == "department"){
	  $url = "departments";
	}else if($url == "news"){
	$url = "news-article";
	}else if($url == "healthtips"){
	$url = "health-tips";
	}else if($url == "doctorsprofile"){
	$url = "doctors";
	}else if($url == null){
	$url = "home";
	}else{
	$url = $url;
	}
	
	$pagedata =$helper->getPagedata($url);
//dd($pagedata);
	
	@endphp
	<?php 
	if(!empty($pagedata)){
	    ?>
	   	<title>{{($language == "en")?$pagedata['page_title_en']:$pagedata['page_title_ar']}}</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=11">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
  <meta name="description" content="{{  ($language == "en") ? $pagedata['meta_desc_en'] : $pagedata['meta_desc_ar'] }}">
      <meta name="keywords" content="{{ ($language == "en") ? $pagedata['meta_keyword_en'] : $pagedata['meta_keyword_ar'] }}">
      <meta name="author" content="{{  ($language == "en") ?  $pagedata['author'] : $pagedata['author']}}">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
    }else{
        ?>
        <title>International Medical Center</title>
         <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=11">
        <meta http-equiv="X-UA-Compatible" content="IE=10">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php 
    }
?>