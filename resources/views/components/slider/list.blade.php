@extends('layouts.app')

@section('title', 'Slider')

@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
			Slider Menu


            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">
				{{'total'}} Total</span>
                <form class="kt-margin-l-20" id="kt_subheader_search_form" action="{{url('')}}" method="GET" role="search">
                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
						<input type="text" class="form-control" placeholder="Search..." id="generalSearch" name="q" value="{{session()->get( 'q' )}}">
						<span class="kt-input-icon__icon kt-input-icon__icon--right">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect id="bound" x="0" y="0" width="24" height="24"></rect>
										<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
										<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero"></path>
									</g>
								</svg>

								<!--<i class="flaticon2-search-1"></i>-->
							</span>
						</span>
					</div>
                </form>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
                <div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:</div>
                <div class="btn-toolbar kt-margin-l-20">

                    <button class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_delete_all">
                        Delete All
                    </button>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
	            <a href="#" class="">
				</a>


        </div>

</div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	@if(Session::has('message'))
	<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
	@endif
	<div class="row">
	<div class="col-md-6">
   <!--begin::Portlet-->
   <div class="kt-portlet kt-portlet--mobile">
      <div class="kt-portlet__body kt-portlet__body--fit">
         <!--begin: Datatable -->
         <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
            <table class="kt-datatable__table" style="display: block;">
               <thead class="kt-datatable__head">
			   <tr class="kt-datatable__row" style="left: 0px;">

				<th data-field="MenuTitleEn" class="kt-datatable__cell kt-datatable__cell--sort " style="text-align: center;width:{{'$width'}}%;padding-left: 0;">
					<span>
					<a href="javascript:;">
						Name(EN)
						</a>
					<span>
				</th>
				<th data-field="MenuTitleAr" class="kt-datatable__cell kt-datatable__cell--sort " style="text-align: center;width:{{'$width'}}%;">
					<span>
						<a href="javascript:;">
							Name(AR)
						</a>
					<span>
				</th>
				<th data-field="MenuLink" class="kt-datatable__cell kt-datatable__cell--sort "  style="text-align: center;width:{{'$width'}}%;">
					<span >
						<a href="javascript:;">
							Desc(EN)
						</a>
					<span>
				</th>
				<th data-field="MenuLink" class="kt-datatable__cell kt-datatable__cell--sort "  style="text-align: center;width:{{'$width'}}%;">
					<span >
						<a href="javascript:;">
							Desc(AR)
						</a>
					<span>
				</th>
				<th data-field="MenuLink" class="kt-datatable__cell kt-datatable__cell--sort "  style="text-align: center;width:{{'$width'}}%;">
					<span >
						<a href="javascript:;">
							Photo
						</a>
					<span>
				</th>



				<th  style="text-align: center;width:{{'$width'}}%;" data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span>Actions</span></th>
				</tr>
               </thead>
               <tbody class="kt-datatable__body tbody_sortable" style="">
				  @foreach($slider as $sliders)
					  <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
					  <input type="hidden" name="chkID[]" class="childBox" value="{{$sliders->id}}">


						 <td style="text-align: center;width:20%;">
							<span>
							   <!-- <div class="kt-user-card-v2"> -->
							   <a href="#">
								  <span>{{ucfirst($sliders->name_en)}}</span>
							   </a>
							   <!-- </div> -->
							</span>
						 </td>

						 <td style="text-align: center;width:20%;">
							<span>
							   <!-- <div class="kt-user-card-v2"> -->
							   <a href="#">
								  <span>{{ucfirst($sliders->name_ar)}}</span>
							   </a>
							   <!-- </div> -->
							</span>
						 </td>

						 <td style="text-align: center;width:20%;">
							<span>
							   <!-- <div class="kt-user-card-v2"> -->
							   <a href="#">
								  <span>{{ucfirst($sliders->description_en)}}</span>
							   </a>
							   <!-- </div> -->
							</span>
						 </td>
						 <td style="text-align: center;width:20%;">
							<span>
							   <!-- <div class="kt-user-card-v2"> -->
							   <a href="#">
								  <span>{{ucfirst($sliders->description_ar)}}</span>
							   </a>
							   <!-- </div> -->
							</span>
						 </td>


						 <td style="text-align: center;width:20%;" >
						  <span style="width: 206px;">

						 	<img width="32" height="32" src="<?php echo url('/');?>/images/sliders/<?php echo $sliders->photo1;?>"></img>
						  </span>
						 </td>
						 <td style="text-align: center;width:20%;" data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
							<span style="overflow: visible; position: relative; ">
							   <div class="dropdown">
								  <a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="flaticon-more-1"></i></a>
								  <div class="dropdown-menu dropdown-menu-right">
									 <ul class="kt-nav">
										<li class="kt-nav__item"><a class="kt-nav__link" href="{{url('slider/edit', [$sliders->id])}}"><i class="kt-nav__link-icon flaticon2-contract"></i><span class="kt-nav__link-text">Edit</span></a></li>
									 	<li onclick="deleteThis(this, {{$sliders->id}})" class="kt-nav__item delete_user"><a class="kt-nav__link delete_user" href="javascript:void(0);"><i class="kt-nav__link-icon flaticon2-trash"></i><span class="kt-nav__link-text delete_user">Delete</span>
									 </ul>
								  </div>
							   </div>
							</span>
						 </td>
					  </tr>
				 @endforeach

				 @if($slider == "")
				 <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
					<td data-field="Country" class="kt-datatable__cell" colspan="4" align="center"><span style="width: 206px;">No records found</span>
					</td>
				 </tr>
				 @endif


               </tbody>
            </table>

         </div>
         <!--end: Datatable -->
      </div>
   </div>
   <!--end::Portlet-->
   </div>

   <!--add and edit portlet -->
   <div class="col-md-6">
	   <!--begin::Portlet-->
	   <div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
												Add Slider
												</h3>
											</div>
										</div>

										<!--begin::Form-->
										<form class="kt-form" method="POST" enctype="multipart/form-data" action="{{ url('admin/slider/create') }}" >
										@csrf

										<input type="hidden" name="id" value="<?php if(!empty($slider->id)){ echo $slider->id; }?> " >
											<div class="kt-portlet__body">


										<input type="hidden" name="parent_id" value="<?php if(!empty($slider)){ echo $slider; }?> " >
												<div class="form-group">
													<label>Name(EN)</label>
													<input type="text" required name="name_en" value="" class="form-control" aria-describedby="emailHelp" placeholder="Enter name in english">
												</div>
												<div class="form-group">
													<label>Name(AR)</label>
													<input type="text" required name="name_ar" value="" class="form-control" aria-describedby="emailHelp" placeholder="Enter name in arabic">
												</div>
												<div class="form-group">
													<label>Description(EN)</label>
													<input type="text" required name="description_en" value="" class="form-control" aria-describedby="emailHelp" placeholder="Enter description in english">
												</div>
												<div class="form-group">
													<label>Description(AR)</label>
													<input type="text" required name="description_ar" value="" class="form-control" aria-describedby="emailHelp" placeholder="Enter description in arabic">
												</div>
												<div class="form-group">
													<label>Image</label>
													<div></div>
													<div class="row">
														<div class="col-md-10">
															<div class="custom-file">
																<input  accept="image/*" type="file" class="custom-file-input" id="iconFile"  name="photo1"  value="<?php if(!empty($editmenu->icon)){ ?>{{$editmenu->icon}}<?php } ?>">
																<label class="custom-file-label LabeliconFile" for="iconFile">Choose image</label>
															</div>
														</div>
														<div class="col-md-2" style="text-align: center;margin-top: 5px;">
															<span><img style="<?php if(empty($editmenu->icon)){ ?>display:none;<?php } ?>" id="iconPreview" width="32"  height="32" src="<?php if(!empty($editmenu->icon)){ ?>{{$editmenu->icon}}<?php } ?>"></span>
														</div>
													</div>
												</div>







											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-primary">Save</button>
													<a href="{{ url('admin/slider/list') }}" class="btn btn-secondary" >Cancel</a>
												</div>
											</div>
										</form>

										<!--end::Form-->
									</div>
   </div>



   </div>
</div>

@stop
@section('script')

<script>

	function deleteThis(obj, id)
	{
		swal.fire({
			buttonsStyling: false,

			text: "Are you sure to delete this page?",
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
					url: "<?php echo url('slider/delete-single-page'); ?>",
					type: 'POST',
					data: {'_token' : '{{ csrf_token() }}', id:id},
					success: function(result) {
						$('.pageloader').hide();
						var newResult = JSON.parse(result);

						swal.fire({
							title: 'Deleted!',
							text: newResult.message,
							type: 'success',
							buttonsStyling: false,
							confirmButtonText: "OK",
							confirmButtonClass: "btn btn-sm btn-bold btn-brand",
						})
						$(obj).parents('.kt-datatable__row').remove();
					}
				});
			}
		});
	}



	setTimeout(function() {
       $('.successMessage').fadeOut('slow');
    }, 2000);

	function checkAll() {
		$('#kt_subheader_group_selected_rows').html($('input[name="chkID[]"]').filter(':checked').length);
		$('#kt_subheader_search').addClass('kt-hidden');
		$('#kt_subheader_group_actions').removeClass('kt-hidden');
	}

	function unCheckAll() {
		$('#kt_subheader_group_selected_rows').html($('input[name="chkID[]"]').filter(':checked').length);
		$('#kt_subheader_search').removeClass('kt-hidden');
		$('#kt_subheader_group_actions').addClass('kt-hidden');
	}

	$(document).ready(function() {
		$(document).on('change', '.parentChk', function(){
			var checkthis 	= $(this);

			if (checkthis.is(':checked')) {
				$('.childBox').prop('checked', true);
				checkAll();
			} else {
				$('.childBox').prop('checked', false);
				unCheckAll();
			}

		});

		$(document).on('change', '.childBox', function(){
			var checkthis 	= $(this);

			if (checkthis.is(':checked')) {
				checkAll();

				if ($('input[name="chkID[]"]').filter(':checked').length == $('input[name="chkID[]"]').length) {
					$('.parentChk').prop('checked', true);
				}
			} else {
				$('#kt_subheader_group_selected_rows').html($('input[name="chkID[]"]').filter(':checked').length);
				if ( $('input[name="chkID[]"]').filter(':checked').length == 0 ) {
					unCheckAll();
					$('.parentChk').prop('checked', false);
				}
			}
		});

		// delete all pages from this section
		$('#kt_subheader_group_actions_delete_all').on('click', function() {
			// fetch selected IDs
			var ids = [];

			$('input[name="chkID[]"]').filter(':checked').map(function(i, chk) {
				ids.push($(chk).val());
			});

			if (ids.length > 0) {
				// learn more: https://sweetalert2.github.io/
				swal.fire({
					buttonsStyling: false,

					text: "Are you sure to delete " + ids.length + " selected pages?",
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
							url: "<?php echo url('slider'); ?>" + '/delete-multiple-pages',
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

	});


	function getDropdownval(obj) {

			var $url = $(location). attr("href");
			if($url.indexOf("key") != -1 || $url.indexOf("?page") != -1) { // if url is working with keys

				if($url.indexOf("recordvalue") != -1) {

					$url = updateQueryStringParameter($url, 'recordvalue', obj.value);
				}

				if($url.indexOf("recordvalue") == -1) { // if record value is not available in url
					$url = $url + '&recordvalue=' + obj.value;
				}

			} else {

				if($url.indexOf("recordvalue") != -1) {
					$url = updateQueryStringParameter($url, 'recordvalue', obj.value);
				}

				if($url.indexOf("recordvalue") == -1) { // if record value is not available in url
					$url = $url + '?recordvalue=' + obj.value;
				}

			}

			window.location.href =  $url;
	}

	function updateQueryStringParameter(uri, key, value) {
			var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
			var separator = uri.indexOf('?') !== -1 ? "&" : "?";
			if (uri.match(re)) {
			return uri.replace(re, '$1' + key + "=" + value + '$2');
			}
			else {
			return uri + separator + key + "=" + value;
			}
	}

   </script>
@stop
