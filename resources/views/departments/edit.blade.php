@extends('layouts.app')
@section('title', 'Edit StayingImc')
@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Edit Doctor
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('admin/doctors')}}" class="kt-subheader__breadcrumbs-link">
				Doctor 
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			Edit Doctor			
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('admin/doctors')}}" class="btn btn-default btn-bold">
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
	<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('admin/doctors')}}/id" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<!--begin: Form Wizard Step 1-->
		<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
			<div class="kt-heading kt-heading--md">Edit Doctor :</div>
			<div class="kt-section kt-section--first">
				<div class="kt-wizard-v4__form">
					<div class="row">
						<div class="col-xl-12">
							<div class="kt-section__body">
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label"> Name(En)</label>
									<div class="col-lg-9 col-xl-9">
									<input placeholder="Name in english " id="givenName" name="givenName" type="text" class="form-control {{ $errors->has('givenName') ? ' is-invalid' : '' }}" value="{{old('givenName')}}" autofocus>											
										@if ($errors->has('givenName'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('givenName') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label"> Name(Ar)</label>
									<div class="col-lg-9 col-xl-9">
									<input placeholder="Name in arabic " id="givenNameAr" name="givenNameAr" type="text" class="form-control {{ $errors->has('givenNameAr') ? ' is-invalid' : '' }}" value="{{old('givenNameAr')}}" autofocus>											
										@if ($errors->has('givenNameAr'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('givenNameAr') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label"> Family Name(En)</label>
									<div class="col-lg-9 col-xl-9">
									<input placeholder="Family Name in english " id="familyName" name="familyName" type="text" class="form-control {{ $errors->has('familyName') ? ' is-invalid' : '' }}" value="{{old('familyName')}}" autofocus>											
										@if ($errors->has('familyName'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('familyName') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label"> Family Name(Ar)</label>
									<div class="col-lg-9 col-xl-9">
									<input placeholder="Family Name in arabic " id="familyNameAr" name="familyNameAr" type="text" class="form-control {{ $errors->has('familyNameAr') ? ' is-invalid' : '' }}" value="{{old('familyNameAr')}}" autofocus>											
										@if ($errors->has('familyNameAr'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('familyNameAr') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label">Category</label>
									<div class="col-lg-9 col-xl-9">
										<select id="category" name="category"  class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}">
											<option value="">Select category </option>
											<option value="1">Registrar</option>
											<option value="2">Eye Center / Consultant</option>
											<option value="3">OB/Gyne</option>												
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label">Language</label>
									<div class="col-lg-9 col-xl-9">
										<select id="languages" name="languages"  class="form-control{{ $errors->has('languages') ? ' is-invalid' : '' }}">
											<option value="">Select language </option>
											@if(isset($languages))
												@foreach ($languages as $item)
													<option value="{{strtolower($item->id)}}">{{$item->descEn."/".$item->descAr}}</option>
												@endforeach
											@endif											
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label"> Expereince(En)</label>
									<div class="col-lg-9 col-xl-9">
									<input placeholder="Expereince in english " id="expereinceTxt" name="expereinceTxt" type="text" class="form-control {{ $errors->has('expereinceTxt') ? ' is-invalid' : '' }}" value="{{old('expereinceTxt')}}" autofocus>											
										@if ($errors->has('expereinceTxt'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('expereinceTxt') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label"> Expereince(Ar)</label>
									<div class="col-lg-9 col-xl-9">
									<input placeholder="Expereince in arabic " id="expereinceTxtAr" name="expereinceTxtAr" type="text" class="form-control {{ $errors->has('expereinceTxtAr') ? ' is-invalid' : '' }}" value="{{old('expereinceTxtAr')}}" autofocus>											
										@if ($errors->has('expereinceTxtAr'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('expereinceTxtAr') }}</strong>
											</span>
										@endif
									</div>
								</div>																		
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label"> Education(En)</label>
									<div class="col-lg-9 col-xl-9">
									<textarea id="educationTxt" name="educationTxt" placeholder="Education in english" id="educationTxt" class="form-control {{ $errors->has('educationTxt') ? ' is-invalid' : '' }}">{{old('educationTxt')}}</textarea>
									@if ($errors->has('educationTxt'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('educationTxt') }}</strong>
										</span>
									@endif
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label"> Education(Ar)</label>
									<div class="col-lg-9 col-xl-9">
									<textarea id="educationTxtAr" name="educationTxtAr" placeholder="Education in arabic" id="educationTxtAr" class="form-control {{ $errors->has('educationTxtAr') ? ' is-invalid' : '' }}">{{old('educationTxtAr')}}</textarea>
									@if ($errors->has('educationTxtAr'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('educationTxtAr') }}</strong>
										</span>
									@endif
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label"> Rating</label>
									<div class="col-lg-9 col-xl-9">
									<input placeholder="Rating" id="docRating" name="docRating" type="number" class="form-control {{ $errors->has('docRating') ? ' is-invalid' : '' }}" value="{{old('docRating')}}" autofocus>											
										@if ($errors->has('docRating'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('docRating') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-2 col-lg-2 col-form-label"> Image</label>
									<div class="col-lg-8 col-xl-8">											
										<input placeholder="Upload Image" id="docImg" name="docImg" type="text" class="form-control {{ $errors->has('docImg') ? ' is-invalid' : '' }}" value="{{old('docImg')}}" readonly>
										@if ($errors->has('docImg'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('docImg') }}</strong>
											</span>
										@endif
									</div>
									<div class="col-lg-1 col-xl-1">
											<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="docImg">Browse</button>
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
</div>
</div>
</div>
</div>
</div>
@stop
@section('script')
<script>
</script>
@stop
