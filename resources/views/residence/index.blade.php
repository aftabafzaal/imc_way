@extends('layouts.app')
@section('title', 'Residences')
@section('content')
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Page(s)
        </h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        <div class="kt-subheader__group" id="kt_subheader_search">
            <span class="kt-subheader__desc" id="kt_subheader_total">
            {{$residences->total()}} Total</span>            
        </div>
        <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
            <div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:</div>
            <div class="btn-toolbar kt-margin-l-20">
                <button class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_delete_all">
                    Delete All
                </button>
            </div>
        </div>
    </div>
    <div class="kt-subheader__toolbar">
        <a href="#" class="">
        </a>
		<a href="{{ url('admin/residence/create') }}" class="btn btn-label-brand btn-bold">Create Residence </a>
		<a href="{{ url('admin/residence/section') }}" class="btn btn-label-brand btn-bold">Residence Sections</a>          
    </div>
</div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	@if(Session::has('message'))
	<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
	@endif
   <!--begin::Portlet-->
   <div class="kt-portlet kt-portlet--mobile">
      <div class="kt-portlet__body kt-portlet__body--fit">
         <!--begin: Datatable -->
         <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
            <table class="kt-datatable__table" style="display: block; min-height: 500px;">
               <thead class="kt-datatable__head">
			   <tr class="kt-datatable__row" style="left: 0px;">
                    <th data-field="RecordID" class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check">
                    <span style="width: 20px;">
                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid">
                            <input type="checkbox" class="parentChk">&nbsp;<span></span>
                        </label>
                    </span>
                    </th>				
                    <th class="kt-datatable__cell kt-datatable__cell--sort ">
                        <span style="width: 200px;">Title(EN)</span>						
                    </th>
                    <th class="kt-datatable__cell kt-datatable__cell--sort ">
                        <span style="width: 200px;">Title(AR)</span>						
                    </th> 
                    <th class="kt-datatable__cell kt-datatable__cell--sort ">
                        <span style="width: 200px;">Created Date</span>						
                        </th>                    
                    <th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                        <span style="width: 80px;">Actions</span>
                    </th>
				</tr>
               </thead>
               <tbody class="kt-datatable__body" style="">
				   @foreach($residences as $residence)
					  <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
					    <td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check" data-field="id">
                          <span style="width: 20px;"><label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                              <input type="checkbox" name="id[]" class="childBox" value="{{$residence->id}}">&nbsp;<span></span></label>
                            </span>
                        </td>
						<td class="kt-datatable__cell--sorted kt-datatable__cell" data-field="title_en">
							<span style="width: 200px;">
							    <span style="width: 206px;">{{$residence->title_en}}</span>
							</span>
                        </td>
                        <td class="kt-datatable__cell--sorted kt-datatable__cell" data-field="title_en">
                            <span style="width: 200px;">
                                <span style="width: 206px;">{{$residence->title_ar}}</span>
                            </span>
                        </td>
						 <td class="kt-datatable__cell"><span style="width: 206px;">{{date('d-m-Y H:i:s',strtotime($residence->created_at))}}</span></td>
						 <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
							<span style="overflow: visible; position: relative; width: 80px;">
							   <div class="dropdown">
								  <a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="flaticon-more-1"></i></a>								
								  <div class="dropdown-menu dropdown-menu-right">
									 <ul class="kt-nav">									   
										<li class="kt-nav__item"><a class="kt-nav__link" href="{!!url('admin/residence')!!}/{!!$residence->id!!}/edit"><i class="kt-nav__link-icon flaticon2-contract"></i><span class="kt-nav__link-text">Edit</span></a></li>
									 	<li onclick="deleteThis(this, {{$residence->id}})" class="kt-nav__item delete_user"><a class="kt-nav__link delete_user" href="javascript:void(0);"><i class="kt-nav__link-icon flaticon2-trash"></i><span class="kt-nav__link-text delete_user">Delete</span>
									 </ul>
								  </div>
							   </div>
							</span>
						 </td>
					  </tr>
				 @endforeach

				 @if(count($residences) == 0)
				 <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
					<td data-field="Country" class="kt-datatable__cell" colspan="4" align="center"><span style="width: 206px;">No records found</span>
					</td>
				 </tr>
                 @endif
                </tbody>
            </table>
            <div class="kt-datatable__pager kt-datatable--paging-loaded">
				{{ $residences->links() }}
                <div class="kt-datatable__pager-info">
                    <div class="dropdown bootstrap-select kt-datatable__pager-size" style="width: 80px;">
                        <select  onchange="getDropdownval(this);" class="selectpicker kt-datatable__pager-size" data-width="80px" data-selected="10" tabindex="-98">
                            <option value=""> Select</option>
                            <option value="10" {{(session()->get( 'recordvalue' ) == 10) ? 'selected' : ''}}>10</option>
                            <option value="20" {{(session()->get( 'recordvalue' ) == 20) ? 'selected' : ''}}>20</option>
                            <option value="30" {{(session()->get( 'recordvalue' ) == 30) ? 'selected' : ''}}>30</option>
                            <option value="50" {{(session()->get( 'recordvalue' ) == 50) ? 'selected' : ''}}>50</option>
                            <option value="100" {{(session()->get( 'recordvalue' ) == 100) ? 'selected' : ''}}>100</option>
                        </select>
                    </div>
                    <span class="kt-datatable__pager-detail">Showing {{$residences->firstItem()}} - {{$residences->lastItem()}} of {{$residences->total()}}</span>
                </div>
			</div>
         </div>
         <!--end: Datatable -->
      </div>
   </div>
   <!--end::Portlet-->
</div>
@stop
@section('script')
<script>
	function deleteThis(obj, id)
	{
		swal.fire({
			buttonsStyling: false,
			text: "Are you sure to delete this residence?",
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
					url: "{{url('admin/residence')}}/"+id,
					type: 'post',
					data: {'_method':'delete','_token' :'{{csrf_token()}}'},
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
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
					}
				});
			}
		});
	}
	

	setTimeout(function() {
       $('.successMessage').fadeOut('slow');
    }, 2000); 

	function checkAll() {
		$('#kt_subheader_group_selected_rows').html($('input[name="id[]"]').filter(':checked').length);
		$('#kt_subheader_search').addClass('kt-hidden');
		$('#kt_subheader_group_actions').removeClass('kt-hidden');
	}
	
	function unCheckAll() {
		$('#kt_subheader_group_selected_rows').html($('input[name="id[]"]').filter(':checked').length);
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
				if ($('input[name="id[]"]').filter(':checked').length == $('input[name="id[]"]').length) {
					$('.parentChk').prop('checked', true);
				}
			} else {
				$('#kt_subheader_group_selected_rows').html($('input[name="id[]"]').filter(':checked').length);
				if ( $('input[name="id[]"]').filter(':checked').length == 0 ) {
					unCheckAll();
					$('.parentChk').prop('checked', false);
				}
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
					text: "Are you sure to delete " + ids.length + " selected residences?",
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
							url: "{{url('admin/residence/deleteMultiple')}}",
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
