@extends('layouts.app')
@section('title', 'Edit Patient Library')
@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Edit Patient Library
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('admin/patientlibrarycategory')}}" class="kt-subheader__breadcrumbs-link">
				Patient Library 
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			Edit Patient Library			
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('admin/patientlibrarycategory')}}" class="btn btn-default btn-bold">
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
    <form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('admin/patientlibrarycategory')}}/{{$patientlibrarycategory->id}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">Edit Patient Library Details :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Category Name(En)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="Category name in english " id="category_name_en" name="category_name_en" type="text" class="form-control {{ $errors->has('category_name_en') ? ' is-invalid' : '' }}" value="{{$patientlibrarycategory->category_name_en}}" autofocus>											
											@if ($errors->has('category_name_en'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('category_name_en') }}</strong>
												</span>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Category Name(Ar)</label>
										<div class="col-lg-9 col-xl-9">
											<input placeholder="Category name in arabic " id="category_name_ar" name="category_name_ar" type="text" class="form-control {{ $errors->has('category_name_ar') ? ' is-invalid' : '' }} " value="{{$patientlibrarycategory->category_name_ar}}" autofocus>											
											@if ($errors->has('category_name_ar'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('category_name_ar') }}</strong>
												</span>
											@endif
										</div>
									</div>							
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end: Form Wizard Step 1-->
			<!--begin: Form Actions -->
			<div class="kt-form__actions">
			   <input type="submit" value="Submit" name="submit" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
			</div>
			<!--end: Form Actions -->
		</form>
		<!--end: Form Wizard Form-->
	</div>
</div>
</div>
</div>
</div>
</div>
@stop

