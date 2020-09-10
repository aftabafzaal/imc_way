@extends('layouts.app')
@section('title', 'Pages Section')
@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Footer Common Sections
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>

   </div>

</div>


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
<div class="kt-wizard-v4" id="kt_apps_user_add_user" data-ktwizard-state="step-first">
<div class="kt-portlet">
<div class="kt-portlet__body kt-portlet__body--fit">
<div class="kt-grid">
	<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

		<!--begin: Form Wizard Form-->
		<form class="kt-form" id="section_form" action="{{url('admin/pages/updateSectionContent')}}" method="post">
		  @csrf
			<input type="hidden" name="page" value="visitor"/>
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
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
                        <input placeholder="Title in Arabic" id="title_ar" name="get_ar" type="text" class="form-control" value="{{$content->get_ar}}" autofocus>
										</div>
									</div>
                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Doctor Button (En)</label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="doc_en" type="text" class="form-control" value="{{$content->doc_en}}" autofocus>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Doctor Button (Ar)</label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="doc_ar" type="text" class="form-control" value="{{$content->doc_ar}}" autofocus>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Doctor Link </label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="doc_link" type="text" class="form-control" value="{{$content->doc_link}}" autofocus>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Expert Button (En)</label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="expert_en" type="text" class="form-control" value="{{$content->expert_en}}" autofocus>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Expert Button (Ar)</label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="expert_ar" type="text" class="form-control" value="{{$content->expert_ar}}" autofocus>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Expert Link </label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="expert_link" type="text" class="form-control" value="{{$content->expert_link}}" autofocus>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Call us </label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="call_us" type="text" class="form-control" value="{{$content->call_us}}" autofocus>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Appointment Button (En)</label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="appointment_en" type="text" class="form-control" value="{{$content->appointment_en}}" autofocus>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Appointment Button (Ar)</label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="appointment_ar" type="text" class="form-control" value="{{$content->appointment_ar}}" autofocus>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Appointment Link </label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="appointment_link" type="text" class="form-control" value="{{$content->appointment_link}}" autofocus>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label">Make an Appointment Button (En)</label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="make_en" type="text" class="form-control" value="{{$content->make_en}}" autofocus>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Make an Appointment Button (Ar)</label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="make_ar" type="text" class="form-control" value="{{$content->make_ar}}" autofocus>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Make an Appointment Link </label>
                    <div class="col-lg-9 col-xl-9">
                        <input placeholder="Title in Arabic " id="title_ar" name="make_link" type="text" class="form-control" value="{{$content->make_link}}" autofocus>
                    </div>
                  </div>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-form__actions">
			   <button value="Submit" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
Submit</submit>
    	</div>
		</form>

	</div>
</div>
</div>
</div>
</div>
</div>
@stop
