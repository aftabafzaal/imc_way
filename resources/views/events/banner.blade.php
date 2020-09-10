@extends('layouts.app')
@section('title',  '  Events Banners')
@section('content')
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
	<div class="kt-subheader__main">
		<h3 class="kt-subheader__title">
			Event Banners
			</h3>
	</div>
	<div class="kt-subheader__toolbar">
      <a href="{{url('events/listing')}}" class="btn btn-default btn-bold">
      Back </a>
   </div>
</div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	@if(Session::has('message'))
	<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
	@endif
	<div class="row">
		<div class="col-md-12">
			<!--begin::Portlet-->
			<div class="kt-portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">Banners</h3>
					</div>
				</div>
				<!--begin::Form-->
				<form class="kt-form" method="POST" action="{{ url('events/bannerUpdate') }}" >
				@csrf
					<div class="kt-portlet__body">
						<div class="row">
							<div class="col-md-1">
								<button type="button" class="addBanner btn btn-sm btn-primary">Add Banner</button> 
							</div>
						</div>	
						<div class="banners">
							@if (isset($eventbanner) && $eventbanner != null && count($eventbanner)>0)
								@foreach ($eventbanner as $key => $item)
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Banner {{$key+1}}</label>
										<div class="col-lg-2 col-xl-2">											
											<input placeholder="Title" name="banners[{{$key}}][title]" type="text" class="form-control" value="{{$item->title}}">
										</div>
										<div class="col-lg-2 col-xl-2">											
											<input placeholder="link" name="banners[{{$key}}][link]" type="text" class="form-control" value="{{$item->link}}">
										</div>
										<div class="col-lg-2 col-xl-2">											
										<input placeholder="Upload Image" id="banner_image_{{$key}}" name="banners[{{$key}}][image]" 		type="text" class="form-control" value="{{$item->image}}" readonly>
										</div>
										<div class="col-lg-1 col-xl-1">
												<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="banner_image_{{$key}}">Browse</button>
										</div>	
										@if($key > 0)
											<div class="col-md-1">
												<a class="btn btn-danger removeBanner" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
											</div>	
										@endif						
									</div>
								@endforeach
							@else
								<div class="form-group row">
									<label class="col-form-label col-lg-2">Banner 1</label>
									<div class="col-lg-2 col-xl-2">											
										<input placeholder="Title" name="banners[0][title]" type="text" class="form-control" value="" required>
									</div>
									<div class="col-lg-2 col-xl-2">											
										<input placeholder="link" name="banners[0][link]" type="text" class="form-control" value="" required>
									</div>
									<div class="col-lg-2 col-xl-2">											
									<input placeholder="Upload Image" id="banner_image_0" name="banners[0][image]" type="text" class="form-control" value="" readonly required>
									</div>
									<div class="col-lg-1 col-xl-1">
											<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="banner_image_0">Browse</button>
									</div>				
								</div>
							@endif	
						</div>	
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
		</div>
   </div>
</div>
<div class="form-group row newBanner" style="display:none">
	<label class="col-form-label col-lg-2 label">Banner 1</label>
	<div class="col-lg-2 col-xl-2">											
		<input placeholder="Title" type="text" class="form-control title" value="">
	</div>
	<div class="col-lg-2 col-xl-2">											
		<input placeholder="link" type="text" class="form-control link" value="">
	</div>
	<div class="col-lg-2 col-xl-2">											
	<input placeholder="Upload Image" type="text" class="form-control image" value="" readonly>
	</div>
	<div class="col-lg-1 col-xl-1">
			<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" >Browse</button>
	</div>	
	<div class="col-md-1">
		<a class="btn btn-danger removeBanner" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
	</div>			
</div>
@stop
@section('script')
<script>
$(document).on("click",".addBanner",function(){
	$totalBanner = $(".banners").find(".row").length;
	$banner = $(".newBanner").clone();
	$banner.removeClass("newBanner");
	$banner.removeAttr("style");	
	$banner.find(".label").text("Banner "+($totalBanner+1));
	$banner.find(".title").attr("name","banners["+$totalBanner+"][title]");
	$banner.find(".link").attr("name","banners["+$totalBanner+"][link]");
	$banner.find(".image").attr("name","banners["+$totalBanner+"][image]");
	$banner.find(".image").attr("id","banner_image_"+$totalBanner);
	$banner.find(".mediaModel").data("control","banner_image_"+$totalBanner);
	$(".banners").append($banner);		
});
$(document).on("click",".removeBanner",function(){
	$(this).closest(".row").remove();
});
</script>
@stop
