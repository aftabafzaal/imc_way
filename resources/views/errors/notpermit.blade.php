@extends('layouts.app')
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
<section class="main-inner-sec appointment-page">
		<div class="container">
			<div class="inner-title" style="padding: 100px 0;">
         <h3>You don't have permission . please contact admin.</h3>
			</div>
        </div>
 </section>

@endsection
