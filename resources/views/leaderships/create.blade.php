@extends('layouts.app')
@section('title', 'Add')
@section('content')
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         {{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Leaderships
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('leaderships/listing')}}" class="kt-subheader__breadcrumbs-link">
				Leaderships
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			{{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Leaderships
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('leaderships/listing')}}" class="btn btn-default btn-bold">
      Back </a>
   </div>
</div>


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
<div class="kt-wizard-v4" id="kt_apps_user_add_user" data-ktwizard-state="step-first">

<!--begin: Form Wizard Nav -->

<!--end: Form Wizard Nav -->
<div class="kt-portlet">
<div class="kt-portlet__body kt-portlet__body--fit">
<div class="kt-grid">
	<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

		<!--begin: Form Wizard Form-->
		<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('leaderships/store')}}" method="POST" enctype="multipart/form-data">
          @csrf
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">{{ (!empty($page) && $page !='') ? 'Edit' : 'Add' }} Leaderships :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">

									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Position(En)</label>
										<div class="col-lg-9 col-xl-9">
										<input style="display:none" name="id" value="{{ (!empty($page) && $page !='') ? $page->id : '' }}">
										<input placeholder="position" id="title_en" name="position_en" value="{{ (!empty($page) && $page !='') ? $page->position_en : '' }}" type="text" class="form-control{{ $errors->has('position_en') ? ' is-invalid' : '' }}" required autofocus>
										@if ($errors->has('position_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('position_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Position(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="position" id="position_ar" name="position_ar" value="{{ (!empty($page) && $page !='') ? $page->position_ar : '' }}" type="text" class="form-control{{ $errors->has('position_ar') ? ' is-invalid' : '' }}" required autofocus>
										@if ($errors->has('position_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('position_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>


                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label">Name(En)</label>
                    <div class="col-lg-9 col-xl-9">
                    <input style="display:none" name="id" value="{{ (!empty($page) && $page !='') ? $page->id : '' }}">
                    <input placeholder="name" id="name_en" name="name_en" value="{{ ( !empty($page) && $page !='') ? $page->name_en : '' }}" type="text" class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" required autofocus>
                    @if ($errors->has('name_en'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name_en') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label">Name(Ar)</label>
                    <div class="col-lg-9 col-xl-9">
                    <input placeholder="name" id="name_ar" name="name_ar" value="{{ (!empty($page) && $page !='') ? $page->name_ar : '' }}" type="text" class="form-control{{ $errors->has('name_ar') ? ' is-invalid' : '' }}" required autofocus>
                    @if ($errors->has('name_ar'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name_ar') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>



                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label">Designation(En)</label>
                    <div class="col-lg-9 col-xl-9">
                    <input style="display:none" name="id" value="{{ (!empty($page) && $page !='') ? $page->id : '' }}">
                    <input placeholder="name" id="designation_en" name="designation_en" value="{{ (!empty($page) && $page !='') ? $page->designation_en : '' }}" type="text" class="form-control{{ $errors->has('designation_en') ? ' is-invalid' : '' }}" autofocus>
                    @if ($errors->has('designation_en'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('designation_en') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label">Designation(Ar)</label>
                    <div class="col-lg-9 col-xl-9">
                    <input placeholder="name" id="designation_ar" name="designation_ar" value="{{ (!empty($page) && $page !='') ? $page->designation_ar : '' }}" type="text" class="form-control{{ $errors->has('designation_ar') ? ' is-invalid' : '' }}" autofocus>
                    @if ($errors->has('designation_ar'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('designation_ar') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>




                  <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12"> Description(En)</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                    <textarea placeholder="meta desc" id="description_en" name="description_en" maxlength="500" class="form-control{{ $errors->has('description_en') ? ' is-invalid' : '' }}" rows="8" required>{{ (!empty($page) && $page !='') ? $page->description_en : '' }}</textarea>
                    @if ($errors->has('description_en'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description_en') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12"> Description(Ar)</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                    <textarea  placeholder="meta desc"  id="description_ar" name="description_ar" maxlength="500" class="form-control{{ $errors->has('description_ar') ? ' is-invalid' : '' }}" rows="8" >{{ (!empty($page) && $page !='') ? $page->description_ar : '' }}</textarea>
                    @if ($errors->has('description_ar'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description_ar') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Image</label>
                    <div class="col-lg-8 col-xl-8">
                      <input placeholder="Upload Image" id="image1" name="image1" type="text" class="form-control {{ $errors->has('image1') ? ' is-invalid' : '' }}" value="{{old('image1')}}" readonly>
                      @if ($errors->has('image1'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('image1') }}</strong>
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
                  if(!empty($page)){
                  $enImage= $helper->getImage($page->media_id);
                  $img=env('BASE_URL').$enImage;
                  }else{
                      $img=[];
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


                  <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12"> Status</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">

                      <div class="kt-radio-inline">
                        <label class="kt-radio">
                          <input type="radio" value="1" name="is_active" <?php if(empty($editmenu->id)){ echo "checked"; }?> <?php if(!empty($editmenu->is_active) && $editmenu->is_active=="1"){ echo "checked"; }?>>Active
                          <span></span>
                        </label>
                        <label class="kt-radio">
                          <input type="radio" value="2" name="is_active" <?php if(!empty($editmenu->is_active) && $editmenu->is_active=="2"){ echo "checked"; }?>> Inactive
                          <span></span>
                        </label>
                      </div>

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
@section('script')

<script src="{{ env('BASE_URL')}}assets/unisharp/laravel-ckeditor/ckeditor.js"></script>


<script>
CKEDITOR.replace('description_en', {
  toolbar: [{
      name: 'document',
      items: ['Print']
    },
    {
      name: 'clipboard',
      items: ['Undo', 'Redo']
    },
    {
      name: 'styles',
      items: ['Format', 'Font', 'FontSize']
    },
    {
      name: 'colors',
      items: ['TextColor', 'BGColor']
    },
    {
      name: 'align',
      items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
    },
    '/',
    {
      name: 'basicstyles',
      items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
    },
    {
      name: 'links',
      items: ['Link', 'Unlink']
    },
    {
      name: 'paragraph',
      items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
    },
    {
      name: 'insert',
      items: ['Image', 'Table']
    },
    {
      name: 'tools',
      items: ['Maximize']
    },
    {
      name: 'editing',
      items: ['Scayt','Source']
    }
  ],
  extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',
  extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
  height: 560,
  removeDialogTabs: 'image:advanced;link:advanced'
});

CKEDITOR.replace('description_ar', {
  toolbar: [{
      name: 'document',
      items: ['Print']
    },
    {
      name: 'clipboard',
      items: ['Undo', 'Redo']
    },
    {
      name: 'styles',
      items: ['Format', 'Font', 'FontSize']
    },
    {
      name: 'colors',
      items: ['TextColor', 'BGColor']
    },
    {
      name: 'align',
      items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
    },
    '/',
    {
      name: 'basicstyles',
      items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
    },
    {
      name: 'links',
      items: ['Link', 'Unlink']
    },
    {
      name: 'paragraph',
      items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
    },
    {
      name: 'insert',
      items: ['Image', 'Table']
    },
    {
      name: 'tools',
      items: ['Maximize']
    },
    {
      name: 'editing',
      items: ['Scayt','Source']
    }
  ],
  extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',
  extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
  height: 560,
  removeDialogTabs: 'image:advanced;link:advanced'
});


/* select template */

function selectTemplate(obj, type) {

	var thisvalue = obj.value; //$(obj).find("option:selected").text();

	if(type == 'en') {

		CKEDITOR.instances['content_en'].setData(thisvalue);


	} else {

		CKEDITOR.instances['content_ar'].setData(thisvalue);
	}

}

</script>

@stop
