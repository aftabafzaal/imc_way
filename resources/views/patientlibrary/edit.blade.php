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
			<a href="{{url('admin/patientlibrary')}}" class="kt-subheader__breadcrumbs-link">
				Patient Library
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			Edit Patient Library
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('admin/patientlibrary')}}" class="btn btn-default btn-bold">
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
    <form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('admin/patientlibrary')}}/{{$patientlibrary->id}}" method="POST" enctype="multipart/form-data">
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
										<label class="col-xl-2 col-lg-2 col-form-label"> Library Category</label>
										<div class="col-lg-9 col-xl-9">
											<select onchange="selectSection(this);" id="category_id" name="category_id"  class="form-control">
												@if (isset($patientLibraryCategory))
													@foreach ($patientLibraryCategory as $category)
														<option value="{{$category->id}}" {{($category->id == $patientlibrary->category_id) ? "selected" : ""}}>{{$category->category_name_en}}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Title(En)</label>
										<div class="col-lg-9 col-xl-9">
                                        <input placeholder="Title in english " id="title_en" name="title_en" type="text" class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}" value="{{$patientlibrary->title_en}}" autofocus>
                                            @if ($errors->has('title_en'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('title_en') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Title(Ar)</label>
										<div class="col-lg-9 col-xl-9">
                                            <input placeholder="Title in Arabic " id="title_ar" name="title_ar" type="text" class="form-control {{ $errors->has('title_ar') ? ' is-invalid' : '' }} " value="{{$patientlibrary->title_ar}}" autofocus>
                                            @if ($errors->has('title_ar'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('title_ar') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>

                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Image</label>
                    <div class="col-lg-8 col-xl-8">
                      <input placeholder="Upload Image" id="image1" name="file" type="text" class="form-control {{ $errors->has('image1') ? ' is-invalid' : '' }}" value="{{old('file')}}" readonly>
                      @if ($errors->has('file'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('file') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="col-lg-1 col-xl-1">
                        <button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="image1">Browse</button>
                    </div>
                  </div>

                  <?php
                  $helper = new App\Helpers();
                  ?>
                  <?php
                  if(!empty($patientlibrary->media_id)){
                   $enImage= $helper->getImage($patientlibrary->media_id);
                   $img=env('BASE_URL').$enImage;
                  }else{
                    $img="";
                  }
                  ?>
                  @if(!empty($img))
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label"></label>
                    <div class="col-md-8">
                      <img id="iconPreview" width="150px" src="{{$img}}">
                    </div>
                  </div>
                  @endif

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
@section('script')
<script src="{{ asset('unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'description_en', {

});
CKEDITOR.replace( 'description_ar', {

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
</script>
@stop
