@extends('layouts.app')
@section('title', 'Add Doctor')
@section('content')
<style>
.customTitle{
	flex: none;
    max-width: 185px;
}
.check{
	width: 70px;
    flex: none;
}
</style>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Add Doctor
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('admin/doctors')}}" class="kt-subheader__breadcrumbs-link">
				Doctor
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			Add Doctor
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
		{{-- Tab layout start --}}
		<form class="kt-form" id="addDoctorForm" action="{{url('admin/doctors')}}" method="POST" enctype="multipart/form-data" style="width:100%">
		@csrf
		<div class="kt-portlet__body" style="width:100%">
			<ul class="nav nav-tabs nav-fill" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#kt_tabs_1_1">Basic</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_2">Education</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_3">Experience</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">
					<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
						<div class="kt-heading kt-heading--md">Add Doctor :</div>
						<div class="kt-section kt-section--first">
							<div class="kt-wizard-v4__form">
								<div class="row">
									<div class="col-xl-12">
										<div class="kt-section__body">
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Doctor Code</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Doctor code" id="docCode" name="docCode" type="text" class="form-control {{ $errors->has('docCode') ? ' is-invalid' : '' }}" value="{{old('docCode')}}" autofocus>
													@if ($errors->has('docCode'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('docCode') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Title</label>
												<div class="col-lg-1 col-xl-1">
													<input placeholder="DR" id="title" name="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{old('title')}}">
													@if ($errors->has('title'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('title') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Title (Ar)</label>
												<div class="col-lg-1 col-xl-1">
													<input placeholder="" id="title" name="titleAr" type="text" class="form-control {{ $errors->has('titleAr') ? ' is-invalid' : '' }}" value="{{old('titleAr')}}">
													@if ($errors->has('titleAr'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('titleAr') }}</strong>
														</span>
													@endif
												</div>
											</div>
											
											
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Slug (en)</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="slug in english " id="title" name="slug_en" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{old('slug_en')}}">
													@if ($errors->has('slug_en'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('slug_en') }}</strong>
														</span>
													@endif
												</div>
											</div>

											
												<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Slug (ar)</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="slug in arabic" id="title" name="slug_ar" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{old('slug_ar')}}">
													@if ($errors->has('slug_ar'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('slug_ar') }}</strong>
														</span>
													@endif
												</div>
											</div>


									
											
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Name</label>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Name in english " id="givenName" name="givenName" type="text" class="form-control {{ $errors->has('givenName') ? ' is-invalid' : '' }}" value="{{old('givenName')}}" >
													@if ($errors->has('givenName'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('givenName') }}</strong>
														</span>
													@endif
												</div>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Name in arabic " id="givenNameAr" name="givenNameAr" type="text" class="form-control {{ $errors->has('givenNameAr') ? ' is-invalid' : '' }}" value="{{old('givenNameAr')}}">
													@if ($errors->has('givenNameAr'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('givenNameAr') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Father Name</label>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Father Name in english " id="fathersName" name="fathersName" type="text" class="form-control" >
												</div>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Father Name in arabic " id="fathersNameAr" name="fathersNameAr" type="text" class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Family Name</label>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Family Name in english " id="familyName" name="familyName" type="text" class="form-control" >
												</div>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Family Name in arabic " id="familyNameAr" name="familyNameAr" type="text" class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Title Description</label>
												<div class="col-lg-4 col-xl-4">
													<textarea placeholder="Description in english " id="titleDesc" name="titleDesc" type="text" class="form-control" ></textarea>
												</div>
												<div class="col-lg-4 col-xl-4">
													<textarea placeholder="Description in arabic " id="titleDescAr" name="titleDescAr" type="text" class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Department</label>
												<div class="col-lg-8 col-xl-8">
													<select id="department_id" name="department_id"  class="form-control">
														@isset($departments)
															@foreach ($departments as $department)
																<option value="{{$department->id}}">{{$department->title_en}}</option>
															@endforeach
														@endisset
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Category</label>
												<div class="col-lg-8 col-xl-8">
													<select id="category_id" name="category_id[]"  class="form-control" multiple>
														@isset($categories)
															@foreach ($categories as $category)
																<option value="{{$category->id}}">{{$category->name_en}}</option>
															@endforeach
														@endisset
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Gender</label>
												<div class="col-lg-8 col-xl-8">
													<select id="gender" name="gender"  class="form-control">
														<option value="M">Male</option>
														<option value="F">Female</option>
														<option value="O">Others</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Specialist(En)</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Specialist in english " id="specialitiesTxt" name="specialitiesTxt" type="text" class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Specialist(Ar)</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Specialist in arabic " id="specialitiesTxtAr" name="specialitiesTxtAr" type="text" class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Education(En)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="educationTxt" name="educationTxt" placeholder="Education in english"  class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Education(Ar)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="educationTxtAr" name="educationTxtAr" placeholder="Education in arabic"  class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Affilations(En)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="affilationsTxt" name="affilationsTxt" placeholder="Affilations in english"  class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Affilations(Ar)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="affilationsTxtAr" name="affilationsTxtAr" placeholder="Affilations in arabic" class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Research(En)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="researchTxt" name="researchTxt" placeholder="Research in english"  class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Research(Ar)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="researchTxtAr" name="researchTxtAr" placeholder="Research in arabic" class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Publications(En)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="publications" name="publications" placeholder="Publications in english" class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Publications(Ar)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="publications_ar" name="publications_ar" placeholder="Publications in arabic" class="form-control"></textarea>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Achievements & Career Highlights</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="a_c_highlights" name="a_c_highlights" placeholder="Achievements & Career Highlights" class="form-control"></textarea>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Achievements & Career Highlights Ar</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="a_c_highlights_Ar" name="a_c_highlights_Ar" placeholder="Achievements & Career Highlights Ar" class="form-control"></textarea>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Is Surgon</label>
												<div class="col-lg-8 col-xl-8">
													<input type="checkbox" class="is_surgon" name="is_surgon" value="1">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Licence En</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="licence_en" name="licence_en" placeholder="licence_en" class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Licence AR</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="licence_ar" name="licence_ar" placeholder="licence_ar" class="form-control"></textarea>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Membership en</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="membership_en" name="membership_en" placeholder="membership_en" class="form-control"></textarea>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Membership Ar</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="membership_ar" name="membership_ar" placeholder="membership_ar" class="form-control"></textarea>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Languages</label>
												<div class="col-lg-8 col-xl-8">
													<select id="languages" name="languages[]"  class="form-control {{ $errors->has('languages') ? ' is-invalid' : '' }}" multiple>
														@isset($languages)
															@foreach ($languages as $language)
																<option value="{{$language->id}}">{{$language->name}}</option>
															@endforeach
														@endisset
													</select>
													@if ($errors->has('languages'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('languages') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Doctor Designation(En)</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Doctor Designation" id="designation" name="designation" type="text" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}" value="{{old('designation')}}">
													@if ($errors->has('designation'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('designation') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Doctor Designation(Ar)</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Doctor Designation" id="designation_ar" name="designation_ar" type="text" class="form-control {{ $errors->has('designation_ar') ? ' is-invalid' : '' }}" value="{{old('designation_ar')}}">
													@if ($errors->has('designation_ar'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('designation_ar') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Doctor Rating</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Doctor rating" id="docRating" name="docRating" type="number" class="form-control {{ $errors->has('docRating') ? ' is-invalid' : '' }}" value="{{old('docRating')}}">
													@if ($errors->has('docRating'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('docRating') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Doctor Total Experience</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Doctor experiency in years" id="expYears" name="expYears" type="number" class="form-control {{ $errors->has('expYears') ? ' is-invalid' : '' }}" value="{{old('expYears')}}">
													@if ($errors->has('expYears'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('expYears') }}</strong>
														</span>
													@endif
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Image</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Upload Image" id="imgUrl" name="imgUrl" type="text" class="form-control {{ $errors->has('imgUrl') ? ' is-invalid' : '' }}" value="" readonly>
													@if ($errors->has('imgUrl'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('imgUrl') }}</strong>
														</span>
													@endif
												</div>
												<div class="col-lg-1 col-xl-1">
														<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="imgUrl">Browse</button>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Image(Ar)</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Upload Image" id="imgUrlAr" name="imgUrlAr" type="text" class="form-control {{ $errors->has('imgUrlAr') ? ' is-invalid' : '' }}" value="" readonly>
													@if ($errors->has('imgUrlAr'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('imgUrlAr') }}</strong>
														</span>
													@endif
												</div>
												<div class="col-lg-1 col-xl-1">
														<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="imgUrlAr">Browse</button>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Is Active</label>
												<div class="col-lg-8 col-xl-8">
													<input type="checkbox" class="isactive" name="isactive" value="1">
												</div>
											</div>
											<input type="hidden" name="dispOnPortal" value="1"/>
											<input type="hidden" name="dispOnWeb" value="1"/>
											<input type="hidden" name="certificate" value="-"/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="kt_tabs_1_2" role="tabpanel">
					<div class="row" style="margin-bottom:15px" >
						<div class="col-sm-4">
							<button class="btn btn-warning newEducation" type="button">Add New Education</button>
						</div>
					</div>
					<div class="educations">
						<div class="row" style="margin-bottom:10px">
							<div class="col-md-1">
								<input class="form-control fromDate" name="education[0][fromDate]" placeholder="From(En)">
							</div>
							<div class="col-md-1">
								<input class="form-control fromDateAr" name="education[0][fromDateAr]" placeholder="From(Ar)">
							</div>
							<div class="col-md-1">
								<input class="form-control toDate" name="education[0][toDate]" placeholder="To(En)">
							</div>
							<div class="col-md-1">
								<input class="form-control toDateAr" name="education[0][toDateAr]" placeholder="To(Ar)">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control title" name="education[0][title]" placeholder="Title English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control titleAr" name="education[0][titleAr]" placeholder="Title Arabic">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control title2" name="education[0][title2]" placeholder="Title2 English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control titleAr2" name="education[0][titleAr2]" placeholder="Title2 Arabic">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control subTitle" name="education[0][subTitle]" placeholder="Subtitle English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control subTitleAr" name="education[0][subTitleAr]" placeholder="SubTitle Arabic">
							</div>
							<div class="col-md-1 check">
								<label>Residency</label>
								<input type="checkbox" class="isResidency" name="education[0][isResidency]" value="1">
							</div>
							<div class="col-md-1 check">
								<label>Followship</label>
								<input type="checkbox" class="isfollowship" name="education[0][isfollowship]" value="1">
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="kt_tabs_1_3" role="tabpanel">
					<div class="row" style="margin-bottom:15px" >
						<div class="col-sm-4">
							<button class="btn btn-warning newExperience" type="button">Add New Experience</button>
						</div>
					</div>
					<div class="experiences">
						<div class="row" style="margin-bottom:10px">
							<div class="col-md-1">
								<input class="form-control fromDate" name="experience[0][fromDate]" placeholder="From(En)">
							</div>
							<div class="col-md-1">
								<input class="form-control fromDateAr" name="experience[0][fromDateAr]" placeholder="From(Ar)">
							</div>
							<div class="col-md-1">
								<input class="form-control toDate" name="experience[0][toDate]" placeholder="To(En)">
							</div>
							<div class="col-md-1">
								<input class="form-control toDateAr" name="experience[0][toDateAr]" placeholder="To(Ar)">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control title" name="experience[0][title]" placeholder="Title English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control titleAr" name="experience[0][titleAr]" placeholder="Title Arabic">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control title2" name="experience[0][title2]" placeholder="Title2 English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control titleAr2" name="experience[0][titleAr2]" placeholder="Title2 Arabic">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control subTitle" name="experience[0][subTitle]" placeholder="Subtitle English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control subTitleAr" name="experience[0][subTitleAr]" placeholder="SubTitle Arabic">
							</div>
							<div class="col-md-1 check">
								<label>Board</label>
								<input type="checkbox" class="isboard" name="experience[0][isboard]" value="1">
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="kt-form__actions" style="float: right;margin-right: 20px;">
			<input type="submit" value="Submit" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
		</div>
			<!--end: Form Actions -->
		</form>
		{{-- Tab layout end --}}
	</div>
	<div class="education" style="display:none">
		<div class="row" style="margin-bottom:10px">
			<div class="col-md-1">
				<input class="form-control fromDate" name="" placeholder="From(En)">
			</div>
			<div class="col-md-1">
				<input class="form-control fromDateAr" name="" placeholder="From(Ar)">
			</div>
			<div class="col-md-1">
				<input class="form-control toDate" name="" placeholder="To(En)">
			</div>
			<div class="col-md-1">
				<input class="form-control toDateAr" name="" placeholder="To(Ar)">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control title" name="" placeholder="Title English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control titleAr" name="" placeholder="Title Arabic">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control title2" name="" placeholder="Title2 English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control titleAr2" name="" placeholder="Title2 Arabic">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control subTitle" name="" placeholder="Subtitle English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control subTitleAr" name="" placeholder="SubTitle Arabic">
			</div>
			<div class="col-md-1 check">
				<label>Residency</label>
				<input type="checkbox" class="isResidency" name="" value="1">
			</div>
			<div class="col-md-1 check">
				<label>Followship</label>
				<input type="checkbox" class="isfollowship" name="" value="1">
			</div>
			<div class="col-md-1 check">
				<a class="btn btn-danger deleteNewEducations" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
			</div>
		</div>
	</div>
	<div class="experience" style="display:none">
		<div class="row" style="margin-bottom:10px">
			<div class="col-md-1">
				<input class="form-control fromDate" name="" placeholder="From(En)">
			</div>
			<div class="col-md-1">
				<input class="form-control fromDateAr" name="" placeholder="From(Ar)">
			</div>
			<div class="col-md-1">
				<input class="form-control toDate" name="" placeholder="To(En)">
			</div>
			<div class="col-md-1">
				<input class="form-control toDateAr" name="" placeholder="To(Ar)">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control title" name="" placeholder="Title English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control titleAr" name="" placeholder="Title Arabic">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control title2" name="" placeholder="Title2 English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control titleAr2" name="" placeholder="Title2 Arabic">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control subTitle" name="" placeholder="Subtitle English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control subTitleAr" name="" placeholder="SubTitle Arabic">
			</div>
			<div class="col-md-1 check">
				<label>Board</label>
				<input type="checkbox" class="isboard" name="" value="1">
			</div>
			<div class="col-md-1 check">
				<a class="btn btn-danger deleteNewExperience" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
@stop
@section('script')
<script src="{{ env('BASE_URL')}}/assets/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace('membership_en', {
});
CKEDITOR.replace( 'membership_ar', {
});

CKEDITOR.replace('licence_en', {
});
CKEDITOR.replace( 'licence_ar', {
});

CKEDITOR.replace('a_c_highlights', {
});
CKEDITOR.replace( 'a_c_highlights_Ar', {
});
CKEDITOR.replace( 'publications', {
});
CKEDITOR.replace( 'publications_ar', {
});




	$(document).ready(function(){
		$(".newEducation").on("click",function(){
			var count = $(".educations .row").length;
			var education	= $(".education .row").clone();
			education.find(".fromDate").attr("name","education["+count+"][fromDate]");
			education.find(".fromDateAr").attr("name","education["+count+"][fromDateAr]");
			education.find(".toDate").attr("name","education["+count+"][toDate]");
			education.find(".toDateAr").attr("name","education["+count+"][toDateAr]");
			education.find(".title").attr("name","education["+count+"][title]");
			education.find(".titleAr").attr("name","education["+count+"][titleAr]");
			education.find(".title2").attr("name","education["+count+"][title2]");
			education.find(".titleAr2").attr("name","education["+count+"][titleAr2]");
			education.find(".subTitle").attr("name","education["+count+"][subTitle]");
			education.find(".subTitleAr").attr("name","education["+count+"][subTitleAr]");
			education.find(".isResidency").attr("name","education["+count+"][isResidency]");
	   		education.find(".isfollowship").attr("name","education["+count+"][isfollowship]");
			$(".educations").append(education);
		});

		$(".newExperience").on("click",function(){
			var count = $(".experiences .row").length;
			var experience	= $(".experience .row").clone();
			//console.log(experience);
			experience.find(".fromDate").attr("name","experience["+count+"][fromDate]");
			experience.find(".fromDateAr").attr("name","experience["+count+"][fromDateAr]");
			experience.find(".toDate").attr("name","experience["+count+"][toDate]");
			experience.find(".toDateAr").attr("name","experience["+count+"][toDateAr]");
			experience.find(".title").attr("name","experience["+count+"][title]");
			experience.find(".titleAr").attr("name","experience["+count+"][titleAr]");
			experience.find(".title2").attr("name","experience["+count+"][title2]");
			experience.find(".titleAr2").attr("name","experience["+count+"][titleAr2]");
			experience.find(".subTitle").attr("name","experience["+count+"][subTitle]");
			experience.find(".subTitleAr").attr("name","experience["+count+"][subTitleAr]");
			experience.find(".isboard").attr("name","experience["+count+"][isboard]");
			$(".experiences").append(experience);
		});
		$(document).on("click",".deleteNewEducations",function(){
			$(this).closest(".row").remove();
		});
		$(document).on("click",".deleteNewExperience",function(){
			$(this).closest(".row").remove();
		});

		$(document).on("change","#deptCode",function(){
			var dept = $("#deptCode option:selected").text();
			var deptAr = $("#deptCode option:selected").data("arabic");
			$("#department").val(dept);
			$("#departmentAr").val(deptAr);
		});

	});
</script>
@stop
