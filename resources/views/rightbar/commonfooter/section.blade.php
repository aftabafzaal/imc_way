@extends('layouts.app')
@section('title', 'Rightbar Section')
@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Rightbar Section
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('admin/rightbar')}}" class="kt-subheader__breadcrumbs-link">
				Rightbar
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			Add Rightbar
		</div>
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
							<input type="hidden" name="page" value="rightbar"/>
							<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
								<div class="kt-heading kt-heading--md">Sections:</div>
								<div class="kt-section kt-section--first">
									<div class="kt-wizard-v4__form">
										<div class="row">
											<div class="col-xl-12">
												<div class="kt-section__body">
													<div class="form-group row">
														<label class="col-xl-2 col-lg-2 col-form-label"> Title(En)</label>
														<div class="col-lg-9 col-xl-9">
															<input placeholder="Title in english " id="title_en" name="get_en" type="text" class="form-control" value="{{$content->get_en}}" autofocus>
														</div>
													</div>
													<div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Title(Ar)</label>
														<div class="col-lg-9 col-xl-9">
															<input placeholder="Title in Arabic " id="title_ar" name="get_ar" type="text" class="form-control" value="{{$content->get_ar}}" autofocus>
														</div>
													</div>




                          <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Doctor(en)</label>
                            <div class="col-lg-9 col-xl-9">
                              <input placeholder="Title in Arabic " id="title_ar" name="doc_en" type="text" class="form-control" value="{{$content->doc_en}}" autofocus>
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Doctor(Ar)</label>
                            <div class="col-lg-9 col-xl-9">
                              <input placeholder="Title in Arabic " id="title_ar" name="doc_ar" type="text" class="form-control" value="{{$content->doc_ar}}" autofocus>
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Appointment(en)</label>
                            <div class="col-lg-9 col-xl-9">
                              <input placeholder="Title in Arabic " id="title_ar" name="appointment_en" type="text" class="form-control" value="{{$content->appointment_en}}" autofocus>
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Appointment(Ar)</label>
                            <div class="col-lg-9 col-xl-9">
                              <input placeholder="Title in Arabic " id="title_ar" name="appointment_ar" type="text" class="form-control" value="{{$content->appointment_ar}}" autofocus>
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label">Link </label>
                            <div class="col-lg-9 col-xl-9">
                              <input placeholder="Title in Arabic " id="title_ar" name="appointment_link" type="text" class="form-control" value="{{$content->appointment_link}}" autofocus>
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Call Us</label>
                            <div class="col-lg-9 col-xl-9">
                              <input placeholder="Title in Arabic " id="title_ar" name="call_us" type="text" class="form-control" value="{{$content->call_us}}" autofocus>
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
<script>

/* select template */



function updateSection() {
	var section = $("#section").val();
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
	}else if($("#link").val() == ""){
		swal.fire({
			title: 'Required',
			text: "Please enter link",
			type: 'error',
			buttonsStyling: false,
			confirmButtonText: "OK",
			confirmButtonClass: "btn btn-sm btn-bold btn-brand",
		});
	}else{
		$.ajax({
			url: "{{url('admin/finddoctorbottom/updateSectionContent')}}",
			type:"POST",
			data:$("#section_form").serialize(),
			success:function(response){
				response = JSON.parse(response);
				if(response.status){
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
