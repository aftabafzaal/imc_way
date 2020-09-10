@php
	use App\Helpers;
	$helper = new Helpers();
	$url=Request::segment(2);
	$pagedata =$helper->getPagedata($url);
	if(	$url == "en"){
		$language='en';
	}elseif($url == "ar"){
			$language='ar';
	}else{
		$language='en';
	}
	@endphp
	<?php
	if(!empty($pagedata['google_analytics'])){
	    ?>
			 <span>
          {!! $pagedata['google_analytics'] !!}
				</span>
    <?php
    }else{
        ?>
        <!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-86759067-1', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PXXLSPD');</script>
<!-- End Google Tag Manager -->
<!-- -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-86759067-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-86759067-1');
  gtag('config', 'UA-86759067-1', { 'send_page_view': false });
  gtag('event', <action>, {
  'event_category': <category>,
  'event_label': <label>,
  'value': <value>
});
</script>
        <?php
    }
?>