@extends('layouts.app')
@section('title', 'Department Section')
@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Survey Section
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('admin/department')}}" class="kt-subheader__breadcrumbs-link">
				Survey
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			 Survey Sections
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('admin/department')}}" class="btn btn-default btn-bold">
      Back </a>
   </div>
</div>


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
<div class="kt-wizard-v4" id="kt_apps_user_add_user" data-ktwizard-state="step-first">
<div class="kt-portlet">
<div class="kt-portlet__body kt-portlet__body--fit">
<div class="kt-grid">
	<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

		<!--begin: Form Wizard Form-->
		<form class="kt-form" id="section_form">
		  @csrf
			<input type="hidden" name="page" value="department"/>
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">Page Sections:</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Sections</label>
										<div class="col-lg-9 col-xl-9">
											<select onchange="selectSection(this);" id="section" name="section"  class="form-control{{ $errors->has('template_id') ? ' is-invalid' : '' }}">
												<option value="">Select Section </option>
                        <option value="banner">Banner</option>
												<option value="section_1">Survey</option>
												<!-- <option value="section_2">Get the Right</option> -->
											</select>
										</div>
									</div>
                  <div class="ajaxdata">
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Title(En)</label>
										<div class="col-lg-9 col-xl-9">
                                        	<input placeholder="Title in english " id="title_en" name="title_en" type="text" class="form-control" value="" autofocus>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Title(Ar)</label>
										<div class="col-lg-9 col-xl-9">
                                            <input placeholder="Title in Arabic " id="title_ar" name="title_ar" type="text" class="form-control" value="" autofocus>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Descriptions(En)</label>
										<div class="col-lg-9 col-xl-9">
											<textarea class="form-control" id="description_en" name="description_en" placeholder="Content" id="description_en" class="form-control"></textarea>
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Descriptions(Ar)</label>
										<div class="col-lg-9 col-xl-9">
											<textarea class="form-control" id="description_ar" name="description_ar" placeholder="Content" id="description_ar" class="form-control"></textarea>
										</div>
									</div>
                </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-form__actions">
			   <input onclick="updateSection();" type="button" value="Submit" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
			</div>
		</form>

	</div>
</div>
</div>
</div>
</div>
</div>
@stop

      @section('script')
      <script src="{{ asset('unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
      <script>

      CKEDITOR.replace( 'description_en', {
      	height: 300,
      	width: 700
      });
      CKEDITOR.replace( 'description_ar', {
      	height: 300,
      	width: 700
      });


      /* select template */
      function selectTemplate(obj, type) {
        var thisvalue = obj.value; //$(obj).find("option:selected").text();
        if(type == 'en') {
          CKEDITOR.instances['description_en'].setData(thisvalue);
        } else {
          CKEDITOR.instances['description_ar'].setData(thisvalue);
        }
      }

      /* select template */

      function selectSection(obj) {
      	var section = obj.value;
      	var token = $("input[name='_token']").val();
      	var page = $("input[name='page']").val();
      	$.ajax({
      		url: "{{url('admin/department/getSectionContent')}}",
      		type:"POST",
      		data:{"_token":token,"page":page,"section":section},
      		success:function(response){
            $(".ajaxdata").html('');
            $(".ajaxdata").append(response);
      		}
      	})
      }

      function updateSection() {
      	var section = $("#section").val();
      	$("#description_en").text(CKEDITOR.instances['description_en'].getData());
      	$("#description_ar").text(CKEDITOR.instances['description_ar'].getData());
      //  $('#iconFile')[0].files[0];

      	if($("#section").val() == ""){
      		swal.fire({
      			title: 'Required',
      			text: "Please select section",
      			type: 'error',
      			buttonsStyling: false,
      			confirmButtonText: "OK",
      			confirmButtonClass: "btn btn-sm btn-bold btn-brand",
      		});
      	}else if($("#title_en").val() == ""){
      		swal.fire({
      			title: 'Required',
      			text: "Please enter title in english",
      			type: 'error',
      			buttonsStyling: false,
      			confirmButtonText: "OK",
      			confirmButtonClass: "btn btn-sm btn-bold btn-brand",
      		});
      	}else if($("#title_ar").val() == ""){
      		swal.fire({
      			title: 'Required',
      			text: "Please enter title in arabic",
      			type: 'error',
      			buttonsStyling: false,
      			confirmButtonText: "OK",
      			confirmButtonClass: "btn btn-sm btn-bold btn-brand",
      		});
      	}else{
      		$.ajax({
      			url: "{{url('admin/department/updateSectionContent')}}",
      			type:"POST",
      			data:$("#section_form").serialize(),
      			success:function(response){
      				response = JSON.parse(response);
      				if(response.status =="1"){
      					swal.fire({
      						title: 'Updated',
      						text: response.message,
      						type: 'success',
      						buttonsStyling: false,
      						confirmButtonText: "OK",
      						confirmButtonClass: "btn btn-sm btn-bold btn-brand",
      					});
      				}else{
      					swal.fire({
      						title: 'Error',
      						text: response.message,
      						type: 'error',
      						buttonsStyling: false,
      						confirmButtonText: "OK",
      						confirmButtonClass: "btn btn-sm btn-bold btn-brand",
      					});
      				}
      			}
      		})
      	}
      }
      </script>
      @stop
