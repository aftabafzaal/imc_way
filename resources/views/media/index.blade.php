@extends('layouts.app')
@section('title', 'Media Section')
@section('content')
<style>
.container { position: relative; width: 100px; height: 150px; float: left;}
.checkbox { position: absolute; top: 5px; left: 15px; }
</style>
@php
$videoFormat = array("webm","mkv","flv","vob","ogv","ogg","drc","mng","avi","mov","qt","wmv","yuv","amv","mp4","mp2","mpeg","mpe","mpv","m4v","svi","3gp","3g2","mxf","roq","nsv","flv","f4v","f4p","f4a","f4b");   	
@endphp
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Media Section
      </h3>
	  <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
		<div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:</div>
			<div class="btn-toolbar kt-margin-l-20">
				<button class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_delete_all">
					Delete All
				</button>
			</div>
		</div>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('admin/media')}}" class="kt-subheader__breadcrumbs-link">
				Media 
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			Add Media			
		</div>		
   </div>
   <div class="kt-subheader__toolbar">      
      <a href="{{url('admin/media')}}" class="btn btn-default btn-bold">Back </a>
   </div>
</div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="kt-wizard-v4" id="kt_apps_user_add_user" data-ktwizard-state="step-first">
		<div class="kt-portlet">
			<div class="kt-portlet__body kt-portlet__body--fit">
				<div class="kt-grid">
					<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">						
						<!--begin: Form Wizard Form-->
						<form class="kt-form" id="section_form" style="width: 95%;padding-top: 5px;padding-bottom: 5px" action="{{ url('admin/media')}}" method="POST" enctype="multipart/form-data">
						@csrf
						@if(Session::has('message'))
						<div class="row">
							<div class="col-xl-12">
								<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
							</div>
						</div>		
						@endif
						<div class="row">
							<div class="col-xl-12">m
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label"> File Upload</label>
									<div class="custom-file">
										<input type="file" class="custom-file-input {{ $errors->has('files') ? ' is-invalid' : '' }}" id="files"  name="files[]" multiple>
										<label class="custom-file-label LabeliconFile" for="files">Choose File </label>
										@if ($errors->has('files'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('files') }}</strong>
											</span>
										@endif
									</div>
									<div class="kt-form__actions" style="margin-top:10px;">
										<input type="submit" value="Upload" class="btn btn-brand btn-sm btn-wide kt-font-bold kt-font-transform-u">
									</div>
								</div>
							</div>
						</div>	
						</form>								
					</div>
				</div>
				<div class="kt-grid">
					<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">						
						<!--begin: Form Wizard Form-->
						<div class="row" style="width:97%">						
							@isset($allmedia)
								@foreach ($allmedia as $item)
								<div class="col-md-1" style="padding:5px">
									<div class="container">
										@php
											if(in_array($item->type,$videoFormat)){
												$imageUrl = env('BASE_URL').'images/media/video.png';
											}else{
												$imageUrl =  env('BASE_URL').'images/media/'.$item->filepath;
											}
											$position = strpos($item->filepath, '_');
											$original_filename = substr($item->filepath,$position+1,strlen($item->filepath));

										@endphp
										<img src="{{$imageUrl}}"  width="100px" height="100px"/>
										<span class="kt-header__topbar-welcome" style="word-break: break-word;">{{$original_filename}}</span> 
									<!--<span style="width: 20px;" class="checkbox"><label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">-->
									<!--	<input type="checkbox" name="id[]" class="childBox" value="{{$item->id}}">&nbsp;<span></span></label>-->
									<!--</span>-->
									</div>
								</div>	
								@endforeach
							@endisset							
						</div>							
					</div>
				</div>
				          {!! $allmedia->links() !!}

			</div>
		</div>				
	</div>
</div>
@stop
@section('script')
<script>
/* select template */
$(document).on('change', '.childBox', function(){
	var checkthis 	= $(this);
	var count = $('input[name="id[]"]').filter(':checked').length;
	$('#kt_subheader_group_selected_rows').html(count);
	if(count){
		$('#kt_subheader_group_actions').removeClass('kt-hidden');
	}else{
		$('#kt_subheader_group_actions').addClass('kt-hidden');
	}	
});
// delete all pages from this section
$('#kt_subheader_group_actions_delete_all').on('click', function() {
	// fetch selected IDs
	var ids = [];
	$('input[name="id[]"]').filter(':checked').map(function(i, chk) {
		ids.push($(chk).val());
	});

	if (ids.length > 0) {
		// learn more: https://sweetalert2.github.io/
		swal.fire({
			buttonsStyling: false,
			text: "Are you sure to delete " + ids.length + " selected media?",
			type: "danger",
			confirmButtonText: "Yes, delete!",
			confirmButtonClass: "btn btn-sm btn-bold btn-danger",
			showCancelButton: true,
			cancelButtonText: "No, cancel",
			cancelButtonClass: "btn btn-sm btn-bold btn-brand"
		}).then(function(result) {
			if (result.value) {
				$('.pageloader').show();
				$.ajax({
					url: "{{url('admin/media/deleteMultiple')}}",
					type: 'POST',
					data: {'_token' : '{{ csrf_token() }}', ids:ids},
					success: function(result) {
						$('.pageloader').hide();
						var newResult = JSON.parse(result);
						swal.fire({
							title: 'Deleted!',
							text: newResult.message,
							type: 'success',
						})
						setTimeout(function() {
							window.location.reload();
						}, 1500); 
					}
				});
			}
		});
	}
});
</script>
@stop
